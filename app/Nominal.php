<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nominal extends Model
{
    public $table = "nominals";
    public $fillable = ['id','nominal', 'created_at','updated_at'];
}
