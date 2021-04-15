<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Match;
use App\Game;
use App\Player;

class PlayerController extends BaseController
{
    public function index(Request $request) {
        $user = $request->user();
        
        $display = Player::select('players.*', 'matches.match_name', 'matches.match_schedule', 'games.title', 'games.picture')
        ->join('games', 'games.id', 'players.gameid')
        ->join('matches', 'matches.id', 'players.match_id')
        ->where('players.user_id', $user->id)
        ->where('matches.status', 'complete')
        ->get();
        
        return $this->sendResponse($display, 'Player successfully.');
    }
}
