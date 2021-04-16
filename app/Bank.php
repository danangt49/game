<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public $table = "banks";
    public $fillable = ['id','name','rekening','pemilik', 'picture','created_at','updated_at'];
}
