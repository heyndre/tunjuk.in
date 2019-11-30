<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WisataModel;
use App\CategoryModel;
use App\WisataComment;

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
    $property = ['wisata_id' => $id, 'approved' => '1'];
    $comment = WisataComment::where($property)->get();
    $count = WisataComment::where($property)->count();
    return view('WisataDetail', ['data' => $destination, 'jumlah' => $count, 'comments' => $comment]);
  }

}
