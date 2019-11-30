<?php

namespace App\Http\Controllers;

use App\KulinerComment;
use App\KulinerModel;
use Illuminate\Http\Request;

class CommentKuliner extends Controller
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
        $hotel = KulinerModel::find($kuliner_id);
  
          $comment = new KulinerComment();
          $comment->user_id = $request->input('user_id');
          $comment->kuliner_id = $request->input('kuliner_id');
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
  
          return redirect()->route('Detail_Kuliner', [$kuliner->id]);
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
