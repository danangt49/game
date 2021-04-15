<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Activity;
use App\Match;
use App\Game;
use App\Player;
use App\User;

class GamesController extends BaseController {
    
    public function index(Request $request) {
      
        $displays = Game::select('id', 'title')->get();
        return $this->sendResponse($displays, 'Data Game Berhasil Didapatkan.z');
    }
    
    public function game_pc(Request $request) {
      
        $displays = Game::select('id', 'title', 'picture')->where('category_id', 1)->get();
        return $this->sendResponse($displays, 'Data Game PC Berhasil Didapatkan.z');
    }
    
    public function game_mobile(Request $request) {
      
        $displays = Game::select('id', 'title', 'picture')->where('category_id', 2)->get();
        return $this->sendResponse($displays, 'Data Game Mobile Berhasil Didapatkan.z');
    }
    
    public function peringkat(Request $request) {
        
        $nama_game = Game::where('id', $request->id)->selectRaw("title")->pluck('title');
        $nama_game = str_replace(array('[',']'),'',$nama_game);
        $nama_game = json_decode($nama_game);
        
        $highest_win_rate = [
            "id" => "1",
            "name_category" => "Tingkat Kemenangan Tertinggi",
            "player" => User::select('username', 'score')->orderBy('score', 'desc')->get()
        ];
        
        $most_win = [
            "id" => "2",
            "name_category" => "Paling Sering Menang",
            "player" => User::select('username', 'score')->orderBy('score', 'desc')->get()
        ];
        
        $most_useless_player = [
            "id" => "3",
            "name_category" => "Pemain Paling Tidak Berguna",
            "player" => User::select('username', 'score')->orderBy('score', 'desc')->get()
        ];
        
        $data = [
            "id" => "1",
            "nama_game" => $nama_game,
            "type_ranking" => [
                $highest_win_rate, $most_win, $most_useless_player
            ]
        ];
      
        
        return $this->sendResponse($data, 'Data Peringkat Game Berhasil Didapatkan.z');
    }
    
    public function pemain_teratas(Request $request) {
        
        $top_player = [
            "id" => "1",
            "player" => User::select('id', 'username', 'score')->get()
        ];
        
        $data = [
            "id" => "1",
            "top_palyer" => User::select('id', 'username', 'score')->orderBy('score', 'desc')->get()
        ];
      
        
        return $this->sendResponse($data, 'Data Peringkat Game Berhasil Didapatkan.x');
    }

    // AKTIF -> UPCOMING / START
    public function matchUpcoming(Request $request) {
      
        $displays = Match::select('matches.id', 'matches.game_id', 'matches.match_name', 'matches.room', 'matches.room_password', 'matches.team', 'matches.maps', 'matches.mode', 'matches.match_schedule', 'matches.prize', 'matches.fee', 'matches.match_type', 'matches.players as total_pemain', 'matches.link', 'matches.picture')
        ->where('status', 'upcoming')->with(['players' => function($query) { 
            $query->select('players.*', 'users.*')->join('users', 'users.id', 'players.user_id')->get();
        }])
        ->where('matches.game_id', $request->game_id)
        ->get();
        
        return $this->sendResponse($displays, 'Data Game Match Upcoming Berhasil Didapatkan.z');
    }
    
    public function matchOngoingOrActive(Request $request) {
      
        $displays = Match::select('matches.id', 'matches.game_id', 'matches.match_name', 'matches.room', 'matches.room_password', 'matches.team', 'matches.maps', 'matches.mode', 'matches.match_schedule', 'matches.prize', 'matches.fee', 'matches.match_type', 'matches.players as total_pemain', 'matches.link', 'matches.picture')
        ->where('status', 'active')->with(['players' => function($query) { 
            $query->select('players.*', 'users.username')->join('users', 'users.id', 'players.user_id')->get();
        }])
        ->where('matches.game_id', $request->game_id)
        ->get();
            
        return $this->sendResponse($displays, 'Data Game Match Ongoing Berhasil Didapatkan.x');
    }
    
    public function matchComplete(Request $request) {
      
        $displays = Match::select('matches.id', 'matches.game_id', 'matches.match_name', 'matches.room', 'matches.room_password', 'matches.team', 'matches.maps', 'matches.mode', 'matches.match_schedule', 'matches.prize', 'matches.fee', 'matches.match_type', 'matches.players as total_pemain', 'matches.link', 'matches.picture')
        ->where('status', 'complete')->with(['players' => function($query) { 
            $query->select('players.*', 'users.*')->join('users', 'users.id', 'players.user_id')->get();
        }])
        ->where('matches.game_id', $request->game_id)
        ->get();
            
        return $this->sendResponse($displays, 'Data Game Match Complete Berhasil Didapatkan.y');
    }
    
    public function ifImJoinThisMatch(Request $request) {
        
        $ifImPlayerInThatMatch = Player::where('user_id', $request->user()->id)->where('match_id', $request->match_id)->first();
        $user = User::where('id', $request->user()->id)->first();
        
        $ifIm;
        
        if($ifImPlayerInThatMatch) {
            $ifIm = [
                "game_id" => $user->game_id,
                "ifIm" => true
            ];
        } else {
            $ifIm = [
                "game_id" => $user->game_id,
                "ifIm" => false
            ];
        }
        
        return $this->sendResponse($ifIm, 'Data Game Match Complete Berhasil Didapatkan.y');
    }
    
}
