<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends BaseController
{
    public function getActivityUsers(){
        $activity = Activity::all();

        return $this->sendResponse($activity, 'Get Acivity User Successfully.');
    }
}
