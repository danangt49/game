<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\City;
use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $city                = City::all();
        $province            = Province::all();
        return view('admin.province.home', ['city' => $city, 'province' => $province]);
    }
}
