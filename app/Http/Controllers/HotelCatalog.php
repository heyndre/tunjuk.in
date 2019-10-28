<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotelModel;
use App\HotelComment;

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
    $comment = HotelComment::where('hotel_id', $id)->get();
    $count = HotelComment::where('hotel_id', $id)->count();
    return view('HotelDetail', ['data' => $hotels, 'comments' => $comment, 'jumlah' => $count]);
  }

}
