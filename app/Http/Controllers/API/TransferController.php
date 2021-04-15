<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Activity;
use App\Transfer;
use App\UserTransactionToken;

class TransferController extends BaseController
{
    public function index($id){
        
        $transfer = Transfer::where('user_id', $id)->orderBy('id', 'desc')->take(5)->get();
        
        return $this->sendResponse($transfer, 'Data Transfer successfully.');
    }
    
    public function create(Request $request){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(10000, 99999). mt_rand(10000, 99999). $characters[rand(0, strlen($characters) - 1)];
        $code = str_shuffle($pin);
        $code = "TR$code";
        
        if($request->hasFile('picture')){
            
            // $destinationPath = 'public/asset/buktibayar/thumbnail';
            // $image           = $request->file('picture');
            // $img             = Image::make($image->getRealPath());
            // $img->resize(100,100,function($constraint){
            //     $constraint->aspectRatio();
            // })->save($destinationPath.'/'.$request->file('picture')->getClientOriginalName());
            
            $ext = $request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move('public/asset/buktibayar/', "$code.$ext");
            $data = [
                'image'             => "$code.$ext",
                "user_id"           => $request->user_id,
                "code"              => $code,
                "nominal"           => $request->nominal,
                "bank"              => $request->bank,
                "catatan"           => $request->catatan,
                "kode_voucher"      => Str::random(10),
                "status_voucher"    => 0,
            ];
        } else {
            $data = "Transaction Failed";
            return $this->sendError($data, 'Data Transfer Failed.');
        }
        
        Transfer::create($data);
        
        return $this->sendResponse($data, 'Data Transfer successfully.');
    }
    
    public function redeem(Request $request, $id){
      $user = $request->user();
      $voucher = Transfer::where('kode_voucher', $id)->where('status', 1)->where('status_voucher', 0)->first();
      $history = new Transfer;
      if($voucher){
        $user->token = $user->token + $voucher->nominal;
        $user->save();

        $update = Transfer::where('kode_voucher', $id)->update(['status_voucher' => 1]);
        
        // $activity = new Activity;
        // $activity->user_id = $user->id;
        // $activity->description_activity = 'Berhasil Me-redeem Voucher';
        // $activity->menu_name = 'Voucher';
        // $activity->save();
        
        return $this->sendResponse($voucher, 'Voucher redeem successfully.');
        
      } else {
        return $this->sendError('Voucher not found.', [
          'message' => 'Voucher tidak ditemukan'
        ]);
      }
    }
}