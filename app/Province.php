<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $table = "provinces";
    protected $primary_key = 'id';
    protected $fillable     =['id','nama_propinsi'];

    public function city(){
        return $this->hasMany('App\City');
    }
}
