<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){		
        $setting                    = Setting::find(1);
       
        // $fitur						= Setting::find(1);
        // $data['logo']				= $setting['logo'];
        // $data['favicon']			= $setting['favicon'];
        // $data['situs']				= $setting['nama'];
        // $data['title']				= $setting['nama'];
        // $data['slogan']				= $setting['slogan'];
        // $data['deskripsi_web']		= $setting['deskripsi_situs'];
        // $data['meta_deskripsi']		= $setting['meta_deskripsi'];
        // $data['meta_keyword']		= $setting['meta_keyword'];
        // $data['telp']				= $setting['telepon'];
        // $data['email']				= $setting['email_website'];
        // $data['alamat']				= $setting['alamat'];
        // $data['author']				= $setting['pemilik'];
        // $data['website']			= $setting['website'];
        // $data['facebook']			= $setting['facebook'];
        // $data['instagram']			= $setting['instagram'];
        // $data['twitter']			= $setting['twitter'];
        // $data['youtube']			= $setting['youtube'];
        // $data['linkedin']			= $setting['linkedin'];
        
        // $data['l_title']			= $fitur['judul'];
        // $data['l_deskripsi']	    = $fitur['deskripsi'];
        // $data['l_link']	            = $fitur['link'];
        // $data['l_button']	        = $fitur['text_link'];
        // $data['l_image']	        = $fitur['gambar'];

        // $data['fitur1']				= $fitur['judulfitur1'];
        // $data['fitur2']				= $fitur['judulfitur2'];
        // $data['fitur3']				= $fitur['judulfitur3'];
       
        // $data['desk1']				= $fitur['konten1'];
        // $data['desk2']				= $fitur['konten2'];
        // $data['desk3']				= $fitur['konten3'];
       
        // $data['link1']				= $fitur['link1'];
        // $data['link2']				= $fitur['link2'];
        // $data['link3']				= $fitur['link3'];
       
        // $data['textlink1']			= $fitur['text_link1'];
        // $data['textlink2']			= $fitur['text_link2'];
        // $data['textlink3']			= $fitur['text_link3'];
       
        // $data['subperusahaan']      = Sub::get();
        // $data['produklayanan']      = Produk::get();
        // $data['testimoni']          = Testimonial::orderBy('id','ASC')->take(1)->get();
        // $data['partner']            = Partner::get();
        // $data['blog']               = Blog::where('publish','true')->orderBy('id','DESC')->take(3)->get();
        return view('welcome');
    }
}
