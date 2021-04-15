<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $fillable = ['id', 'user_id', 'description_activity', 'menu_name', 'created_at', 'updated_at'];
    
    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
