<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Citaci;
use App\Activity;

class CitaciController extends BaseController
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        $activity = new Activity;
        $activity->user_id = $user->id;
        $activity->description_activity = "Mengakses Data Citaci Pada Aplikasi Unisma FEB Digital Library";
        $activity->menu_name = 'Citaci';
        $activity->save();
        
        $citacis = Citaci::where('access', 'public')->get();
        return $this->sendResponse($citacis, 'Citasi successfully.');
    }
    
    public function citaciTeratas(Request $request)
    {
        $user = $request->user();
        
        $activity = new Activity;
        $activity->user_id = $user->id;
        $activity->description_activity = "Mengakses Data Teratas Citaci Pada Aplikasi Unisma FEB Digital Library";
        $activity->menu_name = 'Citaci';
        $activity->save();
        
        $citacis = Citaci::orderBy('read', 'desc')->where('access', 'public')->limit(5)->get();
        return $this->sendResponse($citacis, 'All Citasi successfully.');
    }
    
    public function readCitaci($id, Request $request){
        $user = $request->user();        
        
        $nama_sitasi = Citaci::where('id', $id)->where('access', 'public')->selectRaw("title")->pluck('title');
        $nama_sitasi = str_replace(array('[',']'),'',$nama_sitasi);
        $nama_sitasi = json_decode($nama_sitasi);
        
        $activity = new Activity;
        $activity->user_id = $user->id;
        $activity->description_activity = "Membaca Citaci $nama_sitasi Pada Aplikasi Unisma FEB Digital Library";
        $activity->menu_name = 'Citaci';
        $activity->save();
        
        $books = Citaci::where('id', $id)->where('access', 'public')->increment('read');
        return $this->sendResponse($books, 'Read Citasi successfully.');
    }
}