<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WisataModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'wisata';

    public function category() {
      return $this->belongsTo('App\CategoryModel', 'category_id');
    }
}
