<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\BookCategory;
use App\Book;

class BookController extends BaseController
{
    public function getAllBooks(){
        $books = Book::all();
        return $this->sendResponse($books, 'Books successfully.');
    }
    
    public function simpan(Request $request)
    {
        if($request->hasFile('files') || $request->hasFile('picture')){
            $request->file('files')->move('public/asset/files',$request->file('files')->getClientOriginalName());
            $file_uplod = $request->file('files')->getClientOriginalName();
            $request->file('picture')->move('public/asset/book',$request->file('picture')->getClientOriginalName());
            $gambar     = $request->file('picture')->getClientOriginalName();
           
            $data_insert = [
                'category_id'	    => $request->category_id,
                'title'             => $request->title,
                'description'		=> $request->description,
                'picture'	        => $gambar,
                'penerbit'          => $request->penerbit,
              
                'author'            => $request->author,
                'files'             => $file_uplod,
                'publish_at'	    => $request->publish_at,
                'halaman'           => $request->halaman,
                'isbn'  	          => $request->isbn,
              
                'bahasa'            => $request->bahasa,
                'harga_sewa'        => $request->harga_sewa,
                'harga_pinjam'      => $request->harga_pinjam,
                'harga_beli'        => $request->harga_beli,
                'qty_sewa'          => $request->qty_sewa,
              
                'qty_pinjam'        => $request->qty_pinjam,
                'qty_beli'          => $request->qty_beli,
                'min_sewa'          => $request->min_sewa,
                'min_pinjam'        => $request->min_pinjam
            ];
        }
        
        Book::create($data_insert);
        
        $book = Book::where('description', $request->description)->orderBy('id', 'desc')->limit(1)->selectRaw("id")->pluck('id');
        $id_book = str_replace(array('[',']'),'',$book);
        
        $book_cats = json_decode($request->book_category);
        
        foreach($book_cats as $book_cat){
            $simpan = new BookCategory();
            $simpan->book_id = $id_book;
            $simpan->category_id = $book_cat->category_id;
            $simpan->save();
        }
        
        return $this->sendResponse($simpan, 'Input Books successfully.');
    }
    
    public function delete($id){
        $book = Book::find($id);
        $book->delete();
        
        return $this->sendResponse($book, 'Delete Book successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $imglama	   = $request->picturelama;
        $fileslama	 = $request->fileslama;

        if($request->file('files') && $request->file('picture')){
            $request->file('files')->move('public/asset/files',$request->file('files')->getClientOriginalName());
            $file_uplod = $request->file('files')->getClientOriginalName();
            $request->file('picture')->move('public/asset/book',$request->file('picture')->getClientOriginalName());
            $gambar     = $request->file('picture')->getClientOriginalName();
            
            $data_insert = [
                'category_id'	    => $request->id_kategori,
                'title'             => $request->title,
                'description'		=> $request->description,
                'picture'	        => $gambar,
                'penerbit'          => $request->penerbit,
                'author'            => $request->author,
                'files'             => $file_uplod,
                'publish_at'	    => $request->publish_at,
                'halaman'           => $request->halaman,
                'isbn'  	        => $request->isbn,
                'bahasa'            => $request->bahasa,
                'harga_sewa'        => $request->harga_sewa,
                'harga_pinjam'      => $request->harga_pinjam,
                'harga_beli'        => $request->harga_beli,
                'qty_sewa'          => $request->qty_sewa,
                'qty_pinjam'        => $request->qty_pinjam,
                'qty_beli'          => $request->qty_beli,
                'min_sewa'          => $request->min_sewa,
                'min_pinjam'        => $request->min_pinjam
            ];
        } else if($request->file('files')){
            $request->file('files')->move('public/asset/files',$request->file('files')->getClientOriginalName());
            $file_uplod = $request->file('files')->getClientOriginalName();
            
            $data_insert = [
                'category_id'	    => $request->id_kategori,
                'title'             => $request->title,
                'description'		=> $request->description,
                'picture'	        => $imglama,
                'penerbit'          => $request->penerbit,
                'author'            => $request->author,
                'files'             => $file_uplod,
                'publish_at'	    => $request->publish_at,
                'halaman'           => $request->halaman,
                'isbn'  	        => $request->isbn,
                'bahasa'            => $request->bahasa,
                'harga_sewa'        => $request->harga_sewa,
                'harga_pinjam'      => $request->harga_pinjam,
                'harga_beli'        => $request->harga_beli,
                'qty_sewa'          => $request->qty_sewa,
                'qty_pinjam'        => $request->qty_pinjam,
                'qty_beli'          => $request->qty_beli,
                'min_sewa'          => $request->min_sewa,
                'min_pinjam'        => $request->min_pinjam
            ];
        } else if($request->file('picture')){
            $request->file('picture')->move('public/asset/book',$request->file('picture')->getClientOriginalName());
            $gambar     = $request->file('picture')->getClientOriginalName();
            
            $data_insert = [
                'category_id'	    => $request->id_kategori,
                'title'             => $request->title,
                'description'		=> $request->description,
                'picture'	        => $gambar,
                'penerbit'          => $request->penerbit,
                'author'            => $request->author,
                'files'             => $fileslama,
                'publish_at'	    => $request->publish_at,
                'halaman'           => $request->halaman,
                'isbn'  	        => $request->isbn,
                'bahasa'            => $request->bahasa,
                'harga_sewa'        => $request->harga_sewa,
                'harga_pinjam'      => $request->harga_pinjam,
                'harga_beli'        => $request->harga_beli,
                'qty_sewa'          => $request->qty_sewa,
                'qty_pinjam'        => $request->qty_pinjam,
                'qty_beli'          => $request->qty_beli,
                'min_sewa'          => $request->min_sewa,
                'min_pinjam'        => $request->min_pinjam
            ];
        } else {
            $data_insert = [
                'category_id'	    => $request->id_kategori,
                'title'             => $request->title,
                'description'	    => $request->description,
                'picture'	        => $imglama,
                'penerbit'          => $request->penerbit,
                'author'            => $request->author,
                'files'             => $fileslama,
                'publish_at'	    => $request->publish_at,
                'halaman'           => $request->halaman,
                'isbn'  	        => $request->isbn,
                'bahasa'            => $request->bahasa,
                'harga_sewa'        => $request->harga_sewa,
                'harga_pinjam'      => $request->harga_pinjam,
                'harga_beli'        => $request->harga_beli,
                'qty_sewa'          => $request->qty_sewa,
                'qty_pinjam'        => $request->qty_pinjam,
                'qty_beli'          => $request->qty_beli,
                'min_sewa'          => $request->min_sewa,
                'min_pinjam'        => $request->min_pinjam
            ];
        }
        
        Book::where('id','=',$id)->update($data_insert);
        
        return $this->sendResponse($data_insert, 'Update Book successfully.');
    }
}
