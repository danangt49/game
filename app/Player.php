<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';
    protected $fillable = ['id','user_id','match_id','gameid','in_game_name', 'place','place_point','killed','kill_win','win_prize','bonus','total','refund', 'team'];

    public function matches(){
        return $this->hasOne('App\Matches', 'id', 'players.match_id') ;
    }
}
