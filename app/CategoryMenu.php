<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryMenu extends Model
{
    public $table = "categories_menu";
    protected $fillable = ['kategori','_parent','_slug','status'];
}
