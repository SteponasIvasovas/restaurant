<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  protected $fillable = [
    'user_id',
    'person_count',
    'time',
    'date'
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }
}
