<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WisataModel;
use App\CategoryModel;

class WisataCatalog extends Controller
{
  public function index () {
    $destination = WisataModel::where('verified','1')->get();
    return view ('WisataList', [
      'data' => $destination
    ]);
  }

  public function show ($id) {
    $destination = WisataModel::findOrFail($id);
    return view('WisataDetail', ['data' => $destination]);
  }

}
