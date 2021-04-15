<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends BaseController
{
    public function index() {
        
        return $this->sendResponse(Blog::select('id', 'judul', 'konten', 'gambar', 'created_at')->get(), 'Blog successfully.');
    }
}
