<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'category_id';

    public function destination() {
      return $this->hasMany('App\WisataModel');
    }
}
