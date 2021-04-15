<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Prodi;

class ProdiController extends BaseController
{
    public function index(){
        $prodi = Prodi::all();
        
        return $this->sendResponse($prodi, 'Fakultas successfully.');
    }
}
