<?php

namespace App\Http\Controllers;

use App\Category;
use App\Setting;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index(){
        $setting                        = Setting::find(1);
        $category                       = Category::get();
        return view('website.landingpage',compact(['setting','category']));
    }
     
}
