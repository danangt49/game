<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = "vouchers";

    protected $fillable = ['id', 'user_id', 'title', 'code', 'used', 'nominal', 'expired_at', 'created_at', 'updated_at'];
   
    public function users(){
    	return $this->belongsTo(User::class,'user_id');
    }
}
