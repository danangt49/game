<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = "wallets";
    public $guarded = [];

    public function money(){
        return $this->hasMany(Money::class);
    }
}
