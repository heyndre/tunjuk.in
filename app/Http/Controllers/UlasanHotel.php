<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotelComment;
use App\HotelModel;
use Session;

class UlasanHotel extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $hotel_id)
    {
      $this->validate($request, array(
        'tanggalKunjung' => 'required',
        'ulasan_singkat' => 'required',
        'review' => 'required',
        'user_id' => 'required',
        'hotel_id' => 'required'
      ));

      $hotel = HotelModel::find($hotel_id);

      $comment = new HotelComment();
      $comment->user_id = $request->input('user_id');
      $comment->hotel_id = $request->input('hotel_id');
      $comment->tanggal_visitasi = $request->input('tanggalKunjung');
      $comment->judul = $request->input('ulasan_singkat');
      $comment->detail = $request->input('review');
      $comment->approved = true;

      try {
        $comment->save();
      } catch (Exception $e) {
        report($e);
        return false;
      }
      Session::flash('success', 'Review telah ditambahkan');

      return redirect()->route('Hotel.show', [$hotel->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = HotelComment::findOrFail($id);
        $hotel = HotelModel::findOrFail($comment->hotel_id)->get();
        return view('UlasanAdmin.hotel', ['data' => $comment, 'hotel' => $hotel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = HotelComment::findOrFail($id);
        $comment->approved = $request->input('verify');
        try {
          $comment->save();
        } catch (Exception $e) {
          report($e);
          return false;
        }
        return redirect()->route('Hotel.show', [$comment->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = HotelComment::findOrFail($id);
        $hotel_id = $comment->hotel_id;
        $comment->delete();
        return redirect()->route('Hotel.show', [$hotel_id]);
    }
}
