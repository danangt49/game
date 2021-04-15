<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Nominal;

class NominalController extends BaseController
{
    public function index(){
        $nominal = Nominal::orderBy('nominal', 'asc')->get();
        
        return $this->sendResponse($nominal, 'Nominal successfully.');
    }
}