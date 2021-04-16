<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'username ', 'email', 'password', 'phone', 'date', 'province', 'gender', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlist(){
       return $this->hasMany(Wishlist::class);
    }
    public function vouchers(){
    	return $this->hasMany(Voucher::class);
    }

    public function tournaments(){
        return $this->belongsToMany(Tournament::class, 'tournaments');
    }
    
    public function reference(){
        return $this->hasMany(Reference::class);
    }
    
}
