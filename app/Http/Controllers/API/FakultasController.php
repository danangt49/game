<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends BaseController
{
    public function index(){
        $fakultas = Fakultas::all();
        
        return $this->sendResponse($fakultas, 'Fakultas successfully.');
    }
}
