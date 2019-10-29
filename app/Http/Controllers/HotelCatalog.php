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
    $property = ['hotel_id' => $id, 'approved' => '1'];
    $comment = HotelComment::where($property)->get();
    $count = HotelComment::where($property)->count();
    return view('HotelDetail', ['data' => $hotels, 'comments' => $comment, 'jumlah' => $count]);
  }

}
