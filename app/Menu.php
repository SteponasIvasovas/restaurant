<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //apibreziam kuriuos laukelius galima pildyti duomenu bazeje
    protected $fillable = [
      'title'
    ];

    public function dishes() {
      return $this->hasMany('App\Dish');
    }
}
