<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // public $table = "blogs";
    // protected $fillable = ['judul','slug','kategori','konten','penulis','status','gambar','show_penulis','caption','meta_deksripsi','meta_keyword', 'created_at', 'id'];
    
    public $table = "blogs";
    protected $guarded = [];
}