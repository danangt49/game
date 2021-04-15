<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Activity;
use App\Category;

class CategoryController extends BaseController {
    
    public function index(Request $request) {
        $user = $request->user();
        $categories = Category::orderBy('id', 'asc')->get();
      
        $activity = new Activity;
        $activity->user_id = $user->id;
        $activity->description_activity = "Mengakses Halaman Categories Pada Aplikasi Unisma FEB Digital Library";
        $activity->menu_name = 'Categories';
        $activity->save();
      
        return $this->sendResponse($categories, 'Categories successfully.');
    }

    public function categoryUnisma(Request $request) {
      $categories = Category::orderBy('id', 'asc')->take($request->limit)->get();
      //$categories = Category::orderBy('id', 'asc')->take(8)->get();
      return $this->sendResponse($categories, 'Category Unisma successfully');
    }

    public function categoryUnismaUnli(Request $request) {
      $categories = Category::orderBy('id', 'asc')->get();
      return $this->sendResponse($categories, 'Category Unisma successfully');
    }
    // public function index(Request $request) {
    //   $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();
    //   return $this->sendResponse($categories, 'Categories successfully.');
    // }

    // public function categoryUnisma(Request $request){
    //   $categories = Category::whereNotNull('parent_id')->take(8)->get();
    //   return $this->sendResponse($categories, 'Category Unisma successfully');
    // }

    // public function categoryUnismaUnli(Request $request){
    //   $categories = Category::whereNotNull('parent_id')->get();
    //   return $this->sendResponse($categories, 'Category Unisma successfully');
    // }
}
