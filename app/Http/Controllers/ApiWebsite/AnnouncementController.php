<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends BaseController
{
    public function getAll(){
        $announ = Announcement::all();
        return $this->sendResponse($announ, 'Announcement successfully.');
    }
        
    public function simpan(Request $request){
        $announ = new Announcement();
        $announ->message = $request->message;
        $announ->save();

        return $this->sendResponse($announ, 'Simpan Announcement successfully.');
    }
    
    public function update(Request $request,$id)
    {
        $data = [
            'message'	                => $request->message
        ];
        
        $announ = Announcement::where('id',$id)->update($data);
        
        return $this->sendResponse($announ, 'Update Announcement successfully.');
    }
    
    public function delete($id){
        $announ = Announcement::find($id);
        $announ->delete();

        return $this->sendResponse($announ, 'Hapus Announcement successfully.');
    }

}
