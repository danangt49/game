<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Activity;
use App\Setting;

class SettingController extends BaseController
{
    
    public function index(Request $request) {
        // $user = $request->user();
        
        // $activity = new Activity;
        // $activity->user_id = $user->id;
        // $activity->description_activity = 'Mengakses Halaman Tentang Pada Applikasi Unisma FEB Digital Library';
        // $activity->menu_name = 'Tentang';
        // $activity->save();
      
        $displays = Setting::select('nama', 'telepon', 'website', 'email_website', 'facebook', 'twitter', 'instagram', 'youtube')->get();
        return $this->sendResponse($displays, 'Data Setting Berhasil Didapatkan.');
    }
    
}
