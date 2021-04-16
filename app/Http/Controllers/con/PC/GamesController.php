<?php
namespace App\Http\Controllers\PC;   
use App\Http\Controllers\Controller;

use App\Game;
use App\Libraries\Applib;
use App\Player;
use App\Matches;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GamesController extends Controller
{
   public function index(Request $request){
    $setting                        = Setting::find(1);
    $slug						    = $request->segment(2);
    $uri						    = Game::where('slug',$slug)->take(1)->get();
    
    if($uri->count() > 0){
        $url						= Game::find($uri[0]['id']);
        $setting					= Setting::find(1);
        
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
        $data['data1']		    	= 'GAME MOBILE';
        $data['data2']		    	= $url['slug'];
        
        $idgame                     = Applib::carigameID($slug);
        $data['all']                = Matches::where('game_id', $idgame)->orderBy('created_at', 'DESC')->Paginate(9);
        $data['top']                = Player::select('players.user_id', DB::raw('SUM(players.total) as sum'))
                                    ->where('players.gameid', $idgame)
                                    ->groupBy('players.user_id')
                                    ->orderBy('sum','DESC')
                                    ->take(10)
                                    ->get();
        $data['complete']               = Matches::where('game_id', $idgame)->where('status', 'complete')->orderBy('created_at', 'DESC')->Paginate(9);
        
    return view('website.pc.games',compact(['idgame']))->with($data);

    } else{
        abort(404);
    }
   }

    
}
