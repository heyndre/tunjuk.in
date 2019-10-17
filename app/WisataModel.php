<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WisataModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'wisata';

    public function cat() {
      return $this->belongsTo('App\CategoryModel');
    }
}
