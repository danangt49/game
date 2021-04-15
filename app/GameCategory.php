<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
  public $fillable = ['id', 'Game_id', 'category_id', 'created_at', 'updated_at'];
}
