<?php
namespace App\Http\Controllers\MOBILE;   
use App\Http\Controllers\Controller;

use App\Game;
use App\Matches;
use App\Setting;
use Illuminate\Http\Request;

class ScheduleController extends Controller
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
        
        $data['data1']			    = 'JADWAL';
        $data['all']                = Matches::join('games', 'matches.game_id', 'games.id')
                                        ->where('games.category_id', '2')
                                        ->orderBy('matches.created_at', 'DESC')
                                        ->get();
        $data['upcoming']           = Matches::join('games', 'matches.game_id', 'games.id')
                                        ->where('games.category_id', '2')
                                        ->where(function ($query) {
                                            $query->where('matches.status', 'upcoming');
                                        })
                                        ->orderBy('matches.created_at', 'DESC')
                                        ->get();
                                        
        $data['complete']           = Matches::join('games', 'matches.game_id', 'games.id')
                                        ->where('games.category_id', '2')
                                        ->where(function ($query) {
                                            $query->where('matches.status', 'complate');
                                        })
                                        ->orderBy('matches.created_at', 'DESC')
                                        ->get();
                                        
        return view('website.mobile.schedule')->with($data);
    }
    
    public function tampil(Request $request){
        $slug						    = $request->segment(2);
		$uri						    = Matches::where('slug',$slug)->take(1)->get();
        if($uri->count() > 0){
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
            
            $data['data1']			    = 'DETAIL TURNAMENT';
            $data['match']              = Matches::where('slug', $slug)->first();
        
        return view('website.mobile.details-turnament')->with($data);
        }else{
			abort(404);
		}
    }
}
