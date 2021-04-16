<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    protected $table = 'matches';
    protected $fillable = ['id','game_id','room','room_password', 'match_name','description','match_schedule','kill','fee','players','link','prize','team','match_type','mode','picture', 'logo', 'status', 'maps'];
    public function game() {
        return $this->hasMany('App\Game', 'game_id');
    }

    public function tournaments(){
        return $this->belongsToMany(Tournament::class, 'tournaments');
    }
    
    public function players(){
        return $this->hasMany(Player::class);
    }
}
