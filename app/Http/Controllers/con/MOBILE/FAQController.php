<?php
namespace App\Http\Controllers\MOBILE;   
use App\Http\Controllers\Controller;

use App\FAQ;
use App\Setting;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(){
        $setting                    = Setting::find(1);
        
        $data['judul']				= 'HIU';
        $data['logo']				= $setting['logo'];
        $data['favicon']			= $setting['favicon'];
        $data['situs']				= $setting['nama'];
        $data['title']				= $setting['nama'];
        $data['slogan']				= $setting['slogan'];
        $data['deskripsi_web']		= $setting['deskripsi_situs'];
        $data['meta_deskripsi']		= $setting['meta_deskripsi'];
        $data['meta_keyword']		= $setting['meta_keyword'];
        $data['telp']				= $setting['telepon'];
        $data['email']				= $setting['email_website'];
        $data['alamat']				= $setting['alamat'];
        $data['author']				= $setting['pemilik'];
        $data['website']			= $setting['website'];
        $data['facebook']			= $setting['facebook'];
        $data['instagram']			= $setting['instagram'];
        $data['twitter']			= $setting['twitter'];
        $data['youtube']			= $setting['youtube'];
        $data['data1']			    = 'FAQ';
        $data['data_faq']			= FAQ::get();

        return view('website.mobile.faq')->with($data);
    }
}
