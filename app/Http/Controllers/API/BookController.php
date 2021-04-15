<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Book;
use App\BookCategory;
use App\Category;
use App\Wishlist;
use App\Filedetail;
use App\Filepage;
use App\Transaction;
use App\Activity;
use Carbon\Carbon;

class BookController extends BaseController {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function readBook($id, Request $request){
        $user = $request->user();        
        
        $nama_buku = Book::where('id', $id)->selectRaw("title")->pluck('title');
        $nama_buku = str_replace(array('[',']'),'',$nama_buku);
        $nama_buku = json_decode($nama_buku);
        
        $activity = new Activity;
        $activity->user_id = $user->id;
        $activity->description_activity = "Membaca Data Buku Dengan Judul $nama_buku Pada Aplikasi Unisma FEB Digital Library";
        $activity->menu_name = 'Book';
        $activity->save();
        
        $books = Book::where('id', $id)->increment('read');
        return $this->sendResponse($books, 'Read Book successfully.');
    }
    
    public function index() {
        $books = Category::with('books')->get();
        return $this->sendResponse($books, 'Book successfully.');
    }
    
    public function allBook() {
        $books = Book::where('bukufisik', '=', 'true')->inRandomOrder()->limit(20)->get();
        return $this->sendResponse($books, 'Book successfully.');
        // $books = Category::with('books')->get();
        // return $this->sendResponse($books, 'Book successfully.');
    }

    public function similarBook($id){
        $book = Book::find($id);
        $books = Book::where('category_id', '=', $book->category_id)->inRandomOrder()->limit(10)->get();
        return $this->sendResponse($books, 'Book successfully.');
    }

    public function postBookmark(Request $request, $id){
        $user = $request->user();
      
        $cek = Wishlist::where([['user_id', $user->id],['book_id', $id]])->first();
      
        $nama_buku = Book::where('id', $id)->selectRaw("title")->pluck('title');
        $nama_buku = str_replace(array('[',']'),'',$nama_buku);
        $nama_buku = json_decode($nama_buku);
      
        if($cek){
            $activity = new Activity;
            $activity->user_id = $user->id;
            $activity->description_activity = "Melakukan Unbookmark Untuk Buku $nama_buku Pada Aplikasi Unisma FEB Digital Library";
            $activity->menu_name = 'Book';
            $activity->save();
              
            $wishlist = Wishlist::find($cek->id);
            $wishlist->delete();
        } else {
            
            $activity = new Activity;
            $activity->user_id = $user->id;
            $activity->description_activity = "Melakukan Bookmark Untuk Buku $nama_buku Pada Aplikasi Unisma FEB Digital Library";
            $activity->menu_name = 'Book';
            $activity->save();
            
            $wishlist = new Wishlist;
            $wishlist->user_id = $user->id;
            $wishlist->book_id = $id;
            $wishlist->save();
        }

      return $this->sendResponse($wishlist, 'Wishlist successfully');
    }

    public function cekBookmark(Request $request, $id){
        $user = $request->user();
        $cek = Wishlist::where([['user_id', $user->id],['book_id', $id]])->first();
        $cek2 = Wishlist::where('book_id', $id)->get();
        $total = $cek2->count();
        if($cek){
          $checked = [
            "bookmark" => true,
            "total" => $total
          ];
        }else{
          $checked = [
            "bookmark" => false,
            "total" => $total
          ];
        }

        return $this->sendResponse($checked, 'Wishlist successfully');
    }

    public function koleksiBook(Request $request){
      $user = $request->user();
      $koleksi = Book::with('wishlist')
      ->whereHas('wishlist', function($q) use ($user){
          $q->where('user_id', $user->id);
      })->get();
      return $this->sendResponse($koleksi, 'Koleksi successfully');
    }

    // public function koleksi2Book(Request $request){
    //   $user = $request->user();
    //   $dt = Carbon::now();
    //   $koleksi = Transaction::with('books')
    //   ->where('user_id', $user->id)
    //   ->get();
    //   return $this->sendResponse($koleksi, 'Semua Koleksi successfully');
    // }

    public function koleksi2Book(Request $request){
        $user = $request->user();
        $dt = Carbon::now();
        $koleksi = Transaction::with('books')
        ->where('user_id', $user->id)
        ->where(function ($query) {
        $query->where('expired_at', '=', null)
              ->orWhere('expired_at', '>=', Carbon::now());
        })->get();
      
        $activity = new Activity;
        $activity->user_id = $user->id;
        $activity->description_activity = "Mengakses Halaman Koleksi Pada Aplikasi Unisma FEB Digital Library";
        $activity->menu_name = 'Book';
        $activity->save();
      
        return $this->sendResponse($koleksi, 'Semua Koleksi successfully');
    }

    public function show($id) {
        $book = Book::with('category')->find($id);
        return $this->sendResponse($book, 'Book successfully.');
    }

    public function proses(){
      $books = Book::get();
      foreach($books as $book){
          $parser = new \Smalot\PdfParser\Parser();
          $pdf    = $parser->parseFile(public_path().'/asset/files/'.$book->files);

          // Retrieve all pages from the pdf file.
          $pages  = $pdf->getPages();
          ini_set('memory_limit', '-1');
          foreach ($pages as $key => $page) {
              $pageinput = new Filepage;
              $pageinput->book_id = $book->id;
              $pageinput->page_number = $key+1;
              $pageinput->content = preg_replace( "/\r|\n/", " ", strip_tags($page->getText()));
              $pageinput->save();
            }
        }
    }
    public function getproses(){

      $string="Logging 23 Initialize and getting started with React Native project 23 Start React Native Packager 24 Add android project for your app 24 Chapter 5: Components 25 Examples 25 Basic Component 25 Stateful Component 25 Stateless Component 25 Chapter 6: Create a shareable APK for android 27 Introduction 27 Remarks 27 Examples 27 Create a key to sign the APK 27 Once the key is generated, use it to generate the installable build: 27 Generate the build using gradle 27 Upload or share the generated APK 27 Chapter 7: Custom Fonts 29 Examples 29 Steps to use custom fonts in React Native (Android) 29 Steps to use custom fonts in React Native (iOS) 29 Custom fonts for both Android and IOS 30 Android 31 iOS 31 Chapter 8: Debugging 33 Syntax 33 Examples 33 Start Remote JS Debugging in Android 33 Using console.log() 33 Chapter 9: ESLint in react-native 34 Introduction 34 Examples 34";

      $result=preg_split('/Chapter/',$string);
      if(count($result)>1){
        foreach($result as $data){
          dd(str_word_count($data));
        }
        $result_split=explode(' ',$result[1]);
      }
      // return $matches[0];
    }

}
