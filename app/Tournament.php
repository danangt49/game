<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
  protected $table = 'tournaments';
  protected $fillable = ['id','user_id','match_id','game_id'];
}
