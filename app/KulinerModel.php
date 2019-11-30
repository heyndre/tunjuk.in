<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KulinerModel extends Model
{
    protected $table = 'kuliner';
    protected $primaryKey = 'id';

    public function jenis_kuliner() {
        return $this->belongsTo('App\JenisKuliner');
      }
}
