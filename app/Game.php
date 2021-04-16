<?php

namespace App;
use App\Filters\Games\gamesFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model {

  protected $table = 'games';
  protected $fillable = ['id','title','description','category_id','picture', 'logo','statusgame', 'slug'];

  public function scopeFilter(Builder $builder, $request){
      return (new gamesFilter($request))->filter($builder);
  }

  public function category() {
      return $this->belongsTo('App\Category', 'category_id');
  }

  public function wishlist(){
     return $this->hasMany(Wishlist::class);
  }

  public function displays(){
     return $this->belongsToMany(Display::class, 'Game_displays');
  }

  public function gameCat() {
    return $this->belongsTo('App\GameCategory', 'category_id');
  }

   
}
