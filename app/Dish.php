<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
  protected $fillable = [
    'title',
    'photo',
    'description',
    'price',
    'menu_id'
  ];
}
