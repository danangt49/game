<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\FAQCategory;
use App\Activity;
use App\FAQ;

class FAQController extends BaseController
{
    public function index(Request $request) {
        $user = $request->user();
        
        // $activity = new Activity;
        // $activity->user_id = $user->id;
        // $activity->description_activity = 'Mengakses Halaman FAQ Pada Aplikasi Unisma FEB Digital Library';
        // $activity->menu_name = 'FAQ';
        // $activity->save();
        
        $faq = FAQ::select('title', 'deskripsi')->get();
        return $this->sendResponse($faq, 'Faq successfully.');
    }
}
