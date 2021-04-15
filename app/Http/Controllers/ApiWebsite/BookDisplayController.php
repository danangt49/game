<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\BookDisplay;

class BookDisplayController extends BaseController
{
    public function getAllBookDisplay(){
        $book_display = BookDisplay::with(['books', 'displays'])->where('book_displays.display_id', '!=', '1')->get();
        
        return $this->sendResponse($book_display, 'Books successfully.');
    }
    
    public function simpan(Request $request)
    { 
        $data_insert = [
            'book_id'	      => $request->book_id,
            'display_id'	  => $request->display_id,
        ];
        
        $bookdisplay = new BookDisplay;
        $bookdisplay->book_id = $request->book_id;
        $bookdisplay->display_id = $request->display_id;
        $bookdisplay->save();
        
        return $this->sendResponse($bookdisplay, 'Books Display successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $data_insert = [
            'book_id'	      => $request->book_id,
            'display_id'	  => $request->display_id,
        ];
        
        BookDisplay::where('id','=',$id)->update($data_insert);
        
        return $this->sendResponse($data_insert, 'Update Books Display successfully.');
    }
    
    public function delete($id) 
    {
        $hapus= BookDisplay::find($id);
        $hapus->delete();
        
        return $this->sendResponse($hapus, 'Hapus Books Display successfully.');
    }
}
