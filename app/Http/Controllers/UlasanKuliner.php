<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KulinerComment;
use App\KulinerModel;
use Session;

class UlasanKuliner extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kuliner = KulinerModel::all();
      return view('RKuliner.kuliner', ['data' => $kuliner]);
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
        'kuliner_id' => 'required'
      ));

      $hotel = KulinerModel::find($kuliner_id);

      $comment = new HotelComment();
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

      return redirect()->route('Kuliner.show', [$kuliner->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $kuliner = KulinerModel::findOrFail($id);
      $comment = KulinerComment::where('kuliner_id', $id)
      ->whereColumn('created_at', 'updated_at')->get();
      $agreed = KulinerComment::where('kuliner_id', $id)
      ->where('approved', '1')->get();
      $rejected = KulinerComment::where('kuliner_id', $id)
      ->where('approved', '0')->get();
      return view('RKuliner.list', ['kuliner' => $kuliner, 'setuju' => $agreed, 'tolak' => $rejected, 'proses' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comment = KulinerComment::findOrFail($id);
      $hotel = KulinerModel::findOrFail($comment->kuliner_id)->get();
      return view('RKuliner.kuliner', ['data' => $comment, 'kuliner' => $kuliner]);
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
      $comment = KulinerComment::findOrFail($id);
      $comment->approved = $request->input('verify');
      $comment->updated_at = now();
      try {
        $comment->save();
      } catch (Exception $e) {
        report($e);
        return false;
      }

      return redirect()->back()->with(['success' => 'Berhasil disetujui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $comment = KulinerComment::findOrFail($id);
      $hotel_id = $comment->kuliner_id;
      $comment->delete();
      return redirect()->back()->with(['success' => 'Berhasil dihapus']);
    }
}
