<?php

namespace App\Http\Controllers\MOBILE;   
use App\Http\Controllers\Controller;

use App\MenuItems;
use App\Page;
use App\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request){
        $cekslug                    = $request->segment(1);
        $slug                       = $request->path('');
        $sql						= MenuItems::where('link',$slug)->get();
        if ($sql->count() > 0 ){	
            $setting                = Setting::find(1);
            $page					= Page::where('pages_seo',$slug)->where('status',1)->take(1)->get();
            $url					= Page::find($page[0]['id']);
			$template 				= $this->cari_template($slug); 
            /*---------------PAGE---------------*/
            $data['judul']				= 'HIU';
            $data['situs']			= $setting['nama'];
            $data['title']			= $url['nama_laman'];
            $data['konten']			= $url['konten'];
            $data['meta_deskripsi']	= $url['meta_deskripsi'];
            $data['meta_keyword']	= $url['meta_keyword'];
            $data['data1']          = $url['pages_seo'];
            
            $data['logo']			= $setting['logo'];
            $data['favicon']		= $setting['favicon'];
            $data['deskripsi_web']	= $setting['deskripsi_situs'];
            $data['telp']			= $setting['telepon'];
            $data['email']			= $setting['email_website'];
            $data['alamat']			= $setting['alamat'];
            $data['author']			= $setting['pemilik'];
            $data['website']		= $setting['website'];
            $data['tema']			= $setting['tema'];
            $data['facebook']		= $setting['facebook'];
            $data['instagram']		= $setting['instagram'];
            $data['twitter']		= $setting['twitter'];
            $data['youtube']		= $setting['youtube'];

            return view('website.mobile.'.$template.'')->with($data);
        }
        else if($cekslug =='public'){
            abort(404);
        }
        else{
            abort(404);
        }
    }
    public function profil(Request $request){
		
		$slug						= $request->path();
		$setting                    = Setting::find(1);
        
        $data['judul']				= 'HIU';
		$data['situs']				= $setting['nama'];
		$data['title']				= $slug;
        
        $data['logo']				= $setting['logo'];
        $data['favicon']			= $setting['favicon'];
        $data['telp']				= $setting['telepon'];
		$data['email']				= $setting['email_website'];
		$data['alamat']				= $setting['alamat'];
		$data['author'	]			= $setting['pemilik'];
		$data['deskripsi_web']		= $setting['deskripsi_situs'];
		$data['website']			= $setting['website'];
		$data['tema']				= $setting['tema'];
		$data['facebook']			= $setting['facebook'];
		$data['instagram']			= $setting['instagram'];
		$data['twitter'	]			= $setting['twitter'];
		$data['youtube']			= $setting['youtube'];

		return view('website.mobile.profil')->with($data);
	}
    public function kontak(Request $request){
		
		$slug						= $request->path();
		$setting                    = Setting::find(1);
        	
        $data['judul']				= 'HIU';
		$data['situs']				= $setting['nama'];
		$data['title']				= $slug;
        
        $data['logo']				= $setting['logo'];
        $data['favicon']			= $setting['favicon'];
        $data['telp']				= $setting['telepon'];
		$data['email']				= $setting['email_website'];
		$data['alamat']				= $setting['alamat'];
		$data['author'	]			= $setting['pemilik'];
		$data['deskripsi_web']		= $setting['deskripsi_situs'];
		$data['website']			= $setting['website'];
		$data['tema']				= $setting['tema'];
		$data['facebook']			= $setting['facebook'];
		$data['instagram']			= $setting['instagram'];
		$data['twitter'	]			= $setting['twitter'];
		$data['youtube']			= $setting['youtube'];
		
        $data['meta_deskripsi']		= $setting['meta_deskripsi'];
        $data['meta_keyword']		= $setting['meta_keyword'];
        
		$data['jskontak']           = true;
		return view('website.mobile.contact')->with($data);
	}
    // public function kirimpesan(Request $request){
		
	// 	$nama                       = $request->input('name');
	// 	$email                      = $request->input('email');
	// 	$subjek                     = $request->input('subjek');
	// 	$pesan                      = $request->input('pesan');
        
    //     $kontak                     = Contact::create([
    //         'nama'                  =>$nama,
    //         'email'                 =>$email,
    //         'subjek'                =>$subjek,
    //         'pesan'                 =>$pesan,
    //         'status'                =>0,
    //     ]);
    //     if($kontak){
    //         return response()->json([
    //             'success'=>true,
    //             'message'=>'Pesan terkirim !'
    //         ],201);
    //     }else{
    //         return response()->json([
    //             'success'=>false,
    //             'message'=>'Pesan Gagal !'
    //         ],400);
    //     }
	// }
    public function cari_template($slug){
        $t                          = Page::where('pages_seo',$slug)->get();
        if($t->count() > 0){
			foreach($t as $h){
				$hasil              = $h->layout;
			}
		}else{
			$hasil                  = '';
		}
		return $hasil;
    }
}
