<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelComment extends Model
{
  protected $table = 'hotel_comments';
  protected $primaryKey = 'id';

  public function hotel() {
    return $this->belongsTo('App/HotelModel');
  }

  public function users() {
    return $this->belongsTo('App\User', 'user_id');
  }
}
