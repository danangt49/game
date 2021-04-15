<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Carbon\Carbon;

class AuthController extends BaseController
{

    public function signup(Request $request) {
         $validator = Validator::make($request->all(), [
             'name' => 'required',
             'email' => 'required|email|unique:users',
             'password' => 'required',
             'c_password' => 'required|same:password',
         ]);

         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors());
         }

         $user = new User([
             'name' => $request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password)
         ]);
         $user->save();


         return $this->sendResponse($user, 'User register successfully.');
    }

    public function login(Request $request) {
        $input = $request->all();
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if (!Auth::attempt(['email' => $input['email'], 'password' => $input['password'], 'is_admin' => ['1'], ]))
            return $this->sendError('Unauthorised.', 'Unauthorised');

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->save();

        // dd($token);

        $success['token_type'] =  'Bearer';
        $success['access_token'] =  $tokenResult->accessToken;
        $success['expires_at'] =  Carbon::parse(
            $tokenResult->token->expires_at
        )->toDateTimeString();

        return $this->sendResponse($success, 'User login successfully.');
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return $this->sendResponse('Successfully logged out');
    }

    public function user(Request $request) {
        return $this->sendResponse($request->user(), 'User Profile');
    }
    public function broaduser(Request $request) {
        return $this->sendResponse($request->user(), 'successfully');
    }

    public function simpanUser(Request $request){
        $update = User::find($request->user()->id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->save();
        // return response()->json($update, 'Success');
        return $this->sendResponse($update, 'Success');
    }

    public function simpanUser2(Request $request){
        $update = User::find($request->user()->id);
        $input = $request->all();
        $update->fill($input)->save();
        // return response()->json($update, 'Success');
        return $this->sendResponse($update, 'Success');
    }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $update = User::find($request->user()->id);
        $update->password = bcrypt($request->password);
        $update->save();

        return $this->sendResponse($update, 'Success');
    }

    public function change_password(Request $request)
    {
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
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            try {
                if ((Hash::check(request('old_password'), $password)) == false) {
                    $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
                } else if ((Hash::check(request('new_password'), $password)) == true) {
                    $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
                } else {
                    $update = User::where('email', $request->email)->first();
                    $update->password = bcrypt($request->new_password);
                    $update->save();
                    $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => User::where('email', $request->email)->first());
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
