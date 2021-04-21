<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    public $table = "ads";
    public $fillable = ['id', 'picture', 'created_at','updated_at'];
}
