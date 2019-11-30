<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WisataComment extends Model
{
    protected $table = 'wisata_comments';
    protected $primaryKey = 'id';
  
    public function hotel() {
      return $this->belongsTo('App\WisataModel');
    }
  
    public function users() {
      return $this->belongsTo('App\User', 'user_id');
    }
}
