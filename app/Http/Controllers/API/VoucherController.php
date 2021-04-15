<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\UserTransactionToken;
use App\Transfer;
use App\Wallet;
use App\Activity;
use App\Voucher;

class VoucherController extends BaseController
{
    public function redeem(Request $request){
        $user = $request->user();
        
        $wallet = Wallet::where('user_id', $user->id)->first();
        
        $voucher = Voucher::select('id', 'code', 'nominal', 'used')->where('code', $request->code)->where('used', 'false')->first();
        
        if($voucher){
        
        $wallet->increment('win_amount', $voucher->nominal);
        
        $voucher->update(['used' => 'true']);
        
        return $this->sendResponse('Success', 'Redeem Code Successfully.');
        
        } else {
          
            $code_transfer = Transfer::select('id', 'kode_voucher as code', 'nominal', 'status_voucher')->where('kode_voucher', $request->code)->where('status_voucher', 0)->first();
            
            if($code_transfer) {
        
                $wallet->increment('win_amount', $code_transfer->nominal);
        
                $code_transfer->update(['status_voucher' => 1]);
                
                return $this->sendResponse('Success', 'Redeem Code Successfully.');
            } else {
                return $this->sendResponseFailed('Failed', 'Redeem Code Failed.');
            }
        }
    }
    
}
