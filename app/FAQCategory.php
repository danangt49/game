<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    protected $table = "faq_category";

    protected $fillable = ['id', 'nama_kategori', 'created_at', 'deleted_at'];

    public function faq() {
        return $this->hasMany('App\FAQ', 'faqcategory_id');
    }
}
