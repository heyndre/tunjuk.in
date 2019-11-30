<?php

namespace App\Http\Controllers;

use App\WisataModel;
use Illuminate\Http\Request;
use App\WisataComment;
use Session;

class CommentWisata extends Controller
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
    public function store(Request $request)
    {
        $this->validate($request, array(
            'tanggalKunjung' => 'required',
            'ulasan_singkat' => 'required',
            'review' => 'required',
            'user_id' => 'required',
            'wisata_id' => 'required'
          ));
  
          $hotel = WisataModel::find($hotel_id);
  
          $comment = new HotelComment();
          $comment->user_id = $request->input('user_id');
          $comment->wisata_id = $request->input('wisata_id');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
