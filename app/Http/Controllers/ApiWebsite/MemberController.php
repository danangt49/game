<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\User;

class MemberController extends BaseController
{
    public function getAllMember(){
        $member = User::where('is_admin', '0')->get();

        return $this->sendResponse($member, 'Member successfully.');
    }
}
