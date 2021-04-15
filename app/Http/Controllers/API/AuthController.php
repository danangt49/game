<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Activity;
use App\Reference;
use App\Wallet;
use App\Money;
use App\User;
use Validator;
use Auth;
use Carbon\Carbon;

class AuthController extends BaseController
{

    public function signup(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
        ]);
    
        if($validator->fails()){
            return $this->sendError('Email Sudah Terdaftar.', $validator->errors());
        }
        
        $referensi = User::where('referal_code', $request->referal_code)->first();
        
        $data;
        
        if($request->referal_code && $referensi) {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->name;
            $user->email = $request->email;
            $user->referal_code = Str::random(10);
            $user->password = bcrypt($request->password);
            $user->province = $request->province;
            $user->game_id = rand(100000, 999999);
            $user->save();
            
            $ref = new Reference();
            $ref->user_id = $user->id;
            $ref->reference_id = $referensi->id;
            $ref->save();
            
            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->wallet_number = rand(1000, 9999)." ".rand(1000, 9999)." ".rand(1000, 9999)." ".rand(1000, 9999);
            $wallet->save();
            
            $money = new Money();
            $money->wallet_id = $wallet->id;
            $money->save();
            
            $refUser = Money::join('wallets', 'wallets.id', 'money.wallet_id')->where('user_id', $referensi->id);
            $refUser->increment('earning_amount', 500);
        
            return $this->sendResponse($user, 'User register successfully and referal saved');
            
        } else if ($request->referal_code && !$referensi) {
            return $this->sendErrorInputNotValid('Kode Referensi Sudah Ditemukan.', '');
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->name;
            $user->email = $request->email;
            $user->referal_code = Str::random(10);
            $user->password = bcrypt($request->password);
            $user->province = $request->province;
            $user->game_id = rand(100000, 999999);
            $user->save();
            
            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->wallet_number = rand(1000, 9999)." ".rand(1000, 9999)." ".rand(1000, 9999)." ".rand(1000, 9999);
            $wallet->save();
            
            $money = new Money();
            $money->wallet_id = $wallet->id;
            $money->save();
            
            return $this->sendResponse($user, 'User register successfully.x');
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
        return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->save();

        // dd($token);

        $success['token_type'] =  'Bearer';
        $success['access_token'] =  $tokenResult->accessToken;
        $success['expires_at'] =  Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
        
        // $activity = new Activity;
        // $activity->user_id = $user->id;
        // $activity->description_activity = 'Berhasil Melakukan Login Pada Aplikasi Unisma FEB Digital Library';
        // $activity->menu_name = 'Login';
        // $activity->save();

        return $this->sendResponse($success, 'User login successfully.');
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return $this->sendResponse('Successfully logged out');
    }

    public function user(Request $request) {
        return $this->sendResponse($request->user(), 'User Profile');
    }
    
    public function userBalance(Request $request) {
        
        $user = User::select('users.id', 'wallets.win_amount', 'money.token_amount', 'money.point_amount', 'money.ticket_amount', 'money.earning_amount')
        ->join('wallets', 'wallets.user_id', 'users.id')
        ->join('money', 'wallets.id', 'money.wallet_id')
        ->where('users.id', $request->user()->id)->first();
        
        return $this->sendResponse($user, 'User userBalance');
    }
    
    // public function broaduser(Request $request) {
    //     return $this->sendResponse($request->user(), 'successfully');
    // }

    // public function simpanUser(Request $request){
    //     $update = User::find($request->user()->id);
    //     $update->name = $request->name;
    //     $update->email = $request->email;
    //     $update->phone = $request->phone;
    //     $update->save();
    //     // return response()->json($update, 'Success');
    //     return $this->sendResponse($update, 'Success');
    // }

    public function updateUserInfo(Request $request){
        $update = User::find($request->user()->id);
        $input = $request->all();
        $update->fill($input)->save();
        
        return $this->sendResponse($update, 'Update Info User Success');
    }

    // public function updatePassword(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'password' => 'required',
    //         'c_password' => 'required|same:password',
    //     ]);

    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());
    //     }

    //     $update = User::find($request->user()->id);
    //     $update->password = bcrypt($request->password);
    //     $update->save();

    //     return $this->sendResponse($update, 'Success');
    // }

    public function change_password(Request $request) {
        $input = $request->all();
        // $email = User::find($input->email);
        $user = User::where('email', $request->email)->first();
        $password = $user->password;
        $email = $user->password;
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            // $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
            return $this->sendResponseFailed($validator->errors()->first(), 'Failed');
        } else {
            try {
                if ((Hash::check(request('old_password'), $password)) == false) {
                    // $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
                    return $this->sendResponseFailed("Password Lama Yang Anda Masukan Salah.", 'Failed');
                } else if ((Hash::check(request('new_password'), $password)) == true) {
                    return $this->sendResponseFailed("Silahkan Masukan Konfirmasi Password Baru Dengan Benar Untuk Dapat Melanjutkan", 'Failed');
                    // $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
                } else {
                    $update = User::where('email', $request->email)->first();
                    $update->password = bcrypt($request->new_password);
                    $update->save();
                    return $this->sendResponse("Password Berhasil Diperbarui.", 'Success');
                    // $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => User::where('email', $request->email)->first());
                }
            } catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => array());
            }
        }
        return $this->sendResponse($arr, 'Success');
    }
}
