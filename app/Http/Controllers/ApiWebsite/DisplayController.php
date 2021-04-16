<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Display;

class DisplayController extends BaseController
{
    public function getAllDisplays(){
        $display = Display::all();

        return $this->sendResponse($display, 'Display successfully.');
    }
    
    public function simpan(Request $request)
    {
        $display                   = new Display;
        $display->title_display    = $request->title_display;
        $display->subtitle_display = $request->subtitle_display;
        $display->save();

        return $this->sendResponse($display, 'Simpan Display successfully.');
    }
    
    public function delete($id)
    {
        $display = Display::find($id);
        $display->delete();

        return $this->sendResponse($display, 'Hapus Display successfully.');
    }
    
    public function update(Request $request,$id)
    {
        $display = Display::find($id);
        $display->update($request->all());

        return $this->sendResponse($display, 'Update Display successfully.');
    }
}
