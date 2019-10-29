<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WisataComment;
use App\WisataModel;
use Session;

class UlasanWisata extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $wisata = WisataModel::all();
      return view('RWisata.wisata', ['data' => $wisata]);
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
    public function store(Request $request, $wisata_id)
    {
      $this->validate($request, array(
        'tanggalKunjung' => 'required',
        'ulasan_singkat' => 'required',
        'review' => 'required',
        'user_id' => 'required',
        'wisata_id' => 'required'
      ));

      $wisata = WisataModel::find($wisata_id);

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

      return redirect()->route('Wisata.show', [$wisata->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $wisata = WisataModel::findOrFail($id);
      $comment = WisataComment::where('wisata_id', $id)
      ->whereColumn('created_at', 'updated_at')->get();
      $agreed = WisataComment::where('wisata_id', $id)
      ->where('approved', '1')->get();
      $rejected = WisataComment::where('wisata_id', $id)
      ->where('approved', '0')->get();
      return view('RWisata.list', ['wisata' => $wisata, 'setuju' => $agreed, 'tolak' => $rejected, 'proses' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comment = WisataComment::findOrFail($id);
      $hotel = WisataModel::findOrFail($comment->wisata_id)->get();
      return view('RHotel.hotel', ['data' => $comment, 'wisata' => $wisata]);
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
      $comment = WisataComment::findOrFail($id);
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
      $comment = WisataComment::findOrFail($id);
      $wisata_id = $comment->wisata_id;
      $comment->delete();
      return redirect()->back()->with(['success' => 'Berhasil dihapus']);
    }
}
