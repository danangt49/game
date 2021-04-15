<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function matches(){
        return $this->belongsTo('App\Matches', 'match_id');
      }
}
