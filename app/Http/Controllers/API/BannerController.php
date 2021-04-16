<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Banner;

class BannerController  extends BaseController
{
    public function index(){
        $banner = Banner::where('publish', 'true')->get();
        
        return $this->sendResponse($banner, 'Banner successfully.');
    }
}