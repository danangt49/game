<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    public $table = "references";
    public $guarded = [];
    
    public function users(){
        return $this->hasMany(User::class);
    }
}
