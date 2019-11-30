<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKuliner extends Model
{
    protected $table = 'category_kuliner';
    protected $primaryKey = 'id';

    public function kuliner() {
      return $this->hasMany('App\KulinerModel');
    }
}