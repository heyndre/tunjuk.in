<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KulinerModel;
use App\JenisKuliner;
use Illuminate\Support\Facades\DB;

class KulinerCatalog extends Controller
{
  public function index () {
    // $kuliner = KulinerModel::where('verified','1')->get();
    $kuliner = DB::table('kuliner')->where('verified','1')->join('category_kuliner', 'category_kuliner.id_jk', '=', 'kuliner.jenis')->get();
    return view ('KulinerList', [
      'data' => $kuliner
    ]);
  }

  public function show ($id) {
    // $kuliner = KulinerModel::findOrFail($id);
    $kuliner = DB::table('kuliner')->where('verified','1')->where('id', '=', $id)->join('category_kuliner', 'category_kuliner.id_jk', '=', 'kuliner.jenis')->first();
    $property = ['kuliner_id' => $id, 'approved' => '1'];
    $count = DB::table('kuliner_comments')->where($property)->count();
    $comment = DB::table('kuliner_comments')->where($property)->get();
    // dd($kuliner);
    return view('KulinerDetail', ['data' => $kuliner, 'jumlah' => $count, 'comments' => $comment]);
  }
}
