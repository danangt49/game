<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Wallet;
use App\Transfer;
use App\Money;

class WalletController extends BaseController
{
    public function index(Request $request) {
        $user = $request->user();
        
        $wallet = Wallet::where('user_id', $user->id)->with('money')->first();
        $histories = Transfer::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        $display = [
            "wallet" => $wallet,
            "histories" => $histories
        ];
        
        return $this->sendResponse($display, 'Wallet successfully.');
    }
}
