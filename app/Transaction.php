<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function books(){
      return $this->belongsTo('App\Book', 'book_id');
    }
}
