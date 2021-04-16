<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = "cities";
    protected $primary_key  = 'id_kabkota';
    protected $fillable     =['id','nama_kabkota'];

    public function province() {
        return $this->belongsTo('App\Province');
    }
}
