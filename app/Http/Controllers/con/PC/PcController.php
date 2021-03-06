<?php
namespace App\Http\Controllers\PC;   
use App\Http\Controllers\Controller;

use App\Player;
use App\Matches;
use App\Blog;
use App\Game;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PcController extends Controller
{
    public function index(){
      $setting                  = Setting::find(1);
        
      $data['judul']				    = 'HIU';
      $data['logo']				      = $setting['logo'];
      $data['favicon']			    = $setting['favicon'];
      $data['situs']				    = $setting['nama'];
      $data['title']				    = $setting['nama'];
      $data['slogan']				    = $setting['slogan'];
      $data['deskripsi_web']		= $setting['deskripsi_situs'];
      $data['meta_deskripsi']		= $setting['meta_deskripsi'];
      $data['meta_keyword']		  = $setting['meta_keyword'];
      $data['telp']				      = $setting['telepon'];
      $data['email']				    = $setting['email_website'];
      $data['alamat']				    = $setting['alamat'];
      $data['author']				    = $setting['pemilik'];
      $data['website']			    = $setting['website'];
      $data['facebook']			    = $setting['facebook'];
      $data['instagram']			  = $setting['instagram'];
      $data['twitter']			    = $setting['twitter'];
      $data['youtube']			    = $setting['youtube'];
  
  
      $data['game']             = Game::where('category_id', '=', '1')->get();
      $data['blog']             = Blog::orderBy('id','DESC')->take(5)->get();
        return view('website.pc.pc')->with($data);
    }
    
    public function list(){
      $setting                  = Setting::find(1);
        
      $data['judul']				    = 'HIU';
      $data['logo']				      = $setting['logo'];
      $data['favicon']			    = $setting['favicon'];
      $data['situs']				    = $setting['nama'];
      $data['title']				    = $setting['nama'];
      $data['slogan']				    = $setting['slogan'];
      $data['deskripsi_web']		= $setting['deskripsi_situs'];
      $data['meta_deskripsi']		= $setting['meta_deskripsi'];
      $data['meta_keyword']		  = $setting['meta_keyword'];
      $data['telp']				      = $setting['telepon'];
      $data['email']				    = $setting['email_website'];
      $data['alamat']				    = $setting['alamat'];
      $data['author']				    = $setting['pemilik'];
      $data['website']			    = $setting['website'];
      $data['facebook']			    = $setting['facebook'];
      $data['instagram']			  = $setting['instagram'];
      $data['twitter']			    = $setting['twitter'];
      $data['youtube']			    = $setting['youtube'];
      
      $data['data']			        = 'GAME PC';
      $listgame                 = Game::where('category_id', '=', '1')->get();
      $data['game']             = Game::where('category_id', '=', '1')->get();
      $data['matches']          = Matches::get();
      $data['top']              = Player::select('players.user_id', DB::raw('SUM(players.total) as sum'))->where('players.gameid', '=', 'user_id')->groupBy('players.user_id')->orderBy('sum','DESC')->get();
        return view('website.pc.listgame',compact(['listgame']))->with($data);
    }
    
}
