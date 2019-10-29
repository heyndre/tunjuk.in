<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelModel extends Model
{
    protected $table = 'hotel';
    protected $primaryKey = 'id';

    public function comments() {
      return $this->hasMany('App\HotelComment');
    }
}
