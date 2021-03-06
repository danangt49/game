<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = "announcements";
    protected $fillable = ['id','message', 'created_at', 'updated_at'];
}
