<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Voucher;

class VoucherController extends BaseController
{
    public function getAllVoucher(){
        $voucher = Voucher::all();

        return $this->sendResponse($voucher, 'Vouchers successfully.');
    }
    
    public function simpan(Request $request){
        $voucher                    = new voucher;
        $voucher->title             = $request->title;
        $voucher->code              = $request->code;
        $voucher->token_amount      = $request->token_amount;
        $voucher->expired_at        = $request->datepicker;
        $voucher->save();

        return $this->sendResponse($voucher, 'Simpan Vouchers successfully.');
    }
    
    public function update(Request $request,$id)
    {
        $data = [
            'title'	                => $request->title,
            'code'	                => $request->code,
            'token_amount'	        => $request->token_amount,
            'expired_at'	        => $request->expired_at,
        ];
        
        $voucher = Voucher::where('id',$id)->update($data);
        
        return $this->sendResponse($voucher, 'Update Voucher successfully.');
    }
    
    public function delete($id){
        $voucher = voucher::find($id);
        $voucher->delete();

        return $this->sendResponse($voucher, 'Hapus Vouchers successfully.');
    }
}
