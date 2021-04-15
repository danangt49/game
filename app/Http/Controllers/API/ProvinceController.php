<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\City;
use App\Province;

class ProvinceController extends BaseController {
    
    public function index() {
        
        return $this->sendResponse(Province::select('id', 'nama_propinsi')->get(), 'PROVINSI successfully.');
    }
}