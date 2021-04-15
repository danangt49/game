<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingVoucher extends Model
{

    public $table       = "setting_vouchers";
    public $fillable    = ['jenis','nominal'];

}
