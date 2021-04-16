<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTransactionToken extends Model
{
    protected $table = 'user_transaction_token';

    protected $fillable = ['id', 'user_id', 'voucher_id', 'created_at', 'updated_at'];

    public function voucher(){
        return $this->belongsTo('App\Voucher', 'voucher_id');
    }

}
