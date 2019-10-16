<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotelModel;

class HotelCatalog extends Controller
{
  public function index () {
    $hotels = HotelModel::where('verified','1')->get();
    return view ('HotelList', [
      'data' => $hotels
    ]);
  }

  public function show ($id) {
    $hotels = HotelModel::findOrFail($id);
    return view('HotelDetail', ['data' => $hotels]);
  }

}
