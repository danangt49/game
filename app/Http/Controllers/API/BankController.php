<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Bank;

class BankController extends BaseController
{
    public function index(){
        $bank = Bank::all();
        
        return $this->sendResponse($bank, 'Bank successfully.');
    }
}