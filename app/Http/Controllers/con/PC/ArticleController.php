<?php
namespace App\Http\Controllers\PC;   
use App\Http\Controllers\Controller;

use App\Blog;
use App\CategoryMenu;
use App\Setting;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request){
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

        $slug						= $request->path();
		$data['title']				= $slug;
		$data['data']				= 'ARTICLE';
		$data['populerside']        = Blog::orderBy('hits', 'DESC')->take(5)->get();
		$data['populer'] 	        = Blog::orderBy('hits','DESC')->take(5)->get();
		$data['blog'] 			    = Blog::orderBy('id','DESC')->Paginate(2);
		$data['kategori'] 			= CategoryMenu::get();

        return view('website.pc.blog')->with($data);
    }

    public function category(Request $request){
		$setting					= Setting::find(1);
		$data['judul']				= 'HIU';
		$data['situs']				= $setting['nama'];
		$data['logo']				= $setting['logo'];
		$data['favicon']			= $setting['favicon'];
		$data['telp']				= $setting['telepon'];
		$data['email']				= $setting['email_website'];
		$data['alamat']				= $setting['alamat'];
		$data['author'	]			= $setting['pemilik'];
		$data['deskripsi_web']		= $setting['deskripsi_situs'];
		$data['meta_deskripsi']		= $setting['meta_deskripsi'];
		$data['meta_keyword']		= $setting['meta_keyword'];
		$data['website']			= $setting['website'];
		$data['facebook']			= $setting['facebook'];
		$data['instagram']			= $setting['instagram'];
		$data['twitter'	]			= $setting['twitter'];
		$data['youtube']			= $setting['youtube'];
		
		$slug						= $request->segment(2);
		$uri						= Blog::where('kategori',$slug)->take(1)->get();
		if($uri->count() > 0 ){
			$url					= Blog::find($uri[0]['id']);
			$data['title']			= $url['kategori'];
			$data['baru'] 	        = Blog::orderBy('id','DESC')->take(2)->get();
			$data['blogkategori'] 	= Blog::where('kategori',$slug)->Paginate(5);
			$data['kategori'] 		= CategoryMenu::get();
			return view('website.pc.blog')->with($data);
		}else{
			return redirect('/news');
		}
	}
	
	public function detail(Request $request){		
		$slug						    = $request->segment(3);
		$uri						    = Blog::where('slug',$slug)->take(1)->get();
		if($uri->count() > 0){
			$url						= Blog::find($uri[0]['id']);
			$setting					= Setting::find(1); 		
			
			$data['judul']				= 'HIU';
			$data['title']				= $url['judul'].' - '.$setting['nama'];
			$data['data1']				= 'Artikel';
			$data['titleblog']			= $url['judul'];
			$data['detail']				= Blog::find($url['id']);
			$data['meta_deskripsi']		= $url['meta_deskripsi'];
			$data['meta_keyword']		= $url['meta_keyword'];
			
			$data['situs']				= $setting['nama'];
			$data['logo']				= $setting['logo'];
			$data['favicon']			= $setting['favicon'];
			$data['telp']				= $setting['telepon'];
			$data['email']				= $setting['email_website'];
			$data['alamat']				= $setting['alamat'];
			$data['author'	]			= $setting['pemilik'];
			$data['deskripsi_web']		= $setting['deskripsi_situs'];
			$data['website']			= $setting['website'];
			$data['facebook']			= $setting['facebook'];
			$data['instagram']			= $setting['instagram'];
			$data['twitter'	]			= $setting['twitter'];
			$data['youtube']			= $setting['youtube'];
			
			$data['populer'] 	        = Blog::orderBy('hits')->take(5)->get();
			$data['baru'] 	            = Blog::orderBy('id','DESC')->take(2)->get();
			$data['kategori'] 			= CategoryMenu::get();
			
			return view('website.pc.blog-detail')->with($data);
			
		}
		else{
			abort(404);
		}
	}
}
