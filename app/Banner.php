<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $table = "banners";
    public $fillable = ['id','name', 'publish', 'picture', 'created_at','updated_at'];
}
