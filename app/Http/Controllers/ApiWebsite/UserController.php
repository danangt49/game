<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use App\User;

class UserController extends BaseController
{
    public function change_password(Request $request){
        // $input = $request->all();
        // $email = User::find($input->email);
        $user = User::find(1)->first();
        // $password = $user->password;
        // $email = $user->password;
        // $rules = array(
        //     'old_password' => 'required',
        //     'new_password' => 'required|min:6',
        //     'confirm_password' => 'required|same:new_password',
        // );
        // $validator = Validator::make($input, $rules);
        // if ($validator->fails()) {
        //     $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        // } else {
        //     try {
        //         if ((Hash::check(request('old_password'), $password)) == false) {
        //             $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
        //         } else if ((Hash::check(request('new_password'), $password)) == true) {
        //             $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
        //         } else {
        //             $update = User::where('email', $request->email)->first();
        //             $update->password = bcrypt($request->new_password);
        //             $update->save();
        //             $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => User::where('email', $request->email)->first());
        //         }
        //     } catch (\Exception $ex) {
        //         if (isset($ex->errorInfo[2])) {
        //             $msg = $ex->errorInfo[2];
        //         } else {
        //             $msg = $ex->getMessage();
        //         }
        //         $arr = array("status" => 400, "message" => $msg, "data" => array());
        //     }
        // }

        return $this->sendResponse($user, 'Change Password successfully.');
    }
}
