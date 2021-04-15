<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
  public $fillable = ['category_name', 'category_slug','category_picture', 'parent_id'];

  public function parent(){
      return $this->belongsTo('App\Category', 'parent_id');
  }
  public function children(){
      return $this->hasMany('App\Category', 'parent_id', 'id') ;
  }
  public function childrenRecursive(){
     return $this->children()->with('childrenRecursive');
  }
  public function games(){
    return $this->hasMany('App\Game');
  }
}