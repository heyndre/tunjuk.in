<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KulinerModel;

class KulinerCatalog extends Controller
{
  public function index () {
    $kuliner = KulinerModel::where('verified','1')->get();
    return view ('KulinerList', [
      'data' => $kuliner
    ]);
  }

  public function show ($id) {
    $kuliner = KulinerModel::findOrFail($id);
    return view('KulinerDetail', ['data' => $kuliner]);
  }
}
