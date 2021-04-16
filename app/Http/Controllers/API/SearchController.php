<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Book;
use App\Citaci;
use App\Activity;
use App\Filepage;
class SearchController extends BaseController
{

    public function show(Request $request) {
        $user = $request->user();
        
        $activity = new Activity;
        $activity->user_id = $user->id;
        $activity->description_activity = "Mengakses Pencarian Data Buku Dengan Kata Kunci ' $request->title ' Pada Aplikasi Unisma FEB Digital Library";
        $activity->menu_name = 'Book';
        $activity->save();
        
        $books = Book::filter($request)->get();
        return $this->sendResponse($books, 'Book successfully.');
    }
    
    public function showCitaci(Request $request) {
        $user = $request->user();
        
        $activity = new Activity;
        $activity->user_id = $user->id;
        $activity->description_activity = "Mengakses Pencarian Data Sitasi Dengan Kata Kunci ' $request->title ' Pada Aplikasi Unisma FEB Digital Library";
        $activity->menu_name = 'Citaci';
        $activity->save();
        
        $books = Citaci::filter($request)->get();
        return $this->sendResponse($books, 'Citaci successfully.');
    }

    public function searchText(Request $request){
      $texts = Filepage::where([['book_id', $request['book']], ['content', 'LIKE', "%{$request['query']}%"]])
            ->orderBy('page_number', 'ASC')
            ->get();
            // $texts = [];
      if(count($texts) == 0){
        $text = [];
      }else{
        foreach($texts as $data){
          $removehtml = str_replace("\n",' ', strip_tags($data->content));
          $text[] =array(
              "content" => $removehtml,
              "page_number" => $data->page_number,
              "book_id" => $data->book_id
          ); 
        }
      }
      return $this->sendResponse($text, 'Text successfully.');
    }
}