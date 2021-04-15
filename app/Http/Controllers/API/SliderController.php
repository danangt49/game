<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Activity;
use App\Slider;

class SliderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sliderHome(Request $request) {
        // $user = $request->user();
        
        // $activity = new Activity;
        // $activity->user_id = $user->id;
        // $activity->description_activity = 'Mengaskses Halaman Tentang Pada Applikasi Unisma FEB Digital Library';
        // $activity->menu_name = 'Tentang';
        // $activity->save();
      
        $slider = Slider::selectRaw("picture")->where('part', 'home')->where('publish', 'true')->pluck('picture');
        
        $data = [
            "image" => $slider
        ];
        
        return $this->sendResponse($data, 'Data Slider Berhasil Didapatkan.');
    }
    
    public function sliderBliblio(Request $request) {
        // $user = $request->user();
        
        // $activity = new Activity;
        // $activity->user_id = $user->id;
        // $activity->description_activity = 'Mengaskses Halaman Tentang Pada Applikasi Unisma FEB Digital Library';
        // $activity->menu_name = 'Tentang';
        // $activity->save();
      
        $slider = Slider::selectRaw("picture")->where('part', 'library')->where('publish', 'true')->pluck('picture');
        
        $data = [
            "image" => $slider
        ];
        
        return $this->sendResponse($data, 'Data Slider Bliblio Berhasil Didapatkan.');
    }
}