<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KulinerModel;
use App\KecamatanModel;
use Image;

class KulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kuliner = KulinerModel::all();
      // echo "<pre>";
      // var_dump($kuliners);
      return view ('admin_kuliner_list', [
        'data' => $kuliner
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $DaftarKecamatan = KecamatanModel::all();
      return view ('admin_kuliner_tambah', [
        'data' => new KulinerModel(), 'kec' => $DaftarKecamatan
      ]);
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
        'namaKuliner' => 'required',
        'alamatKuliner' => 'required',
        'kecamatanKuliner' => 'required',
        'kodePosKuliner' => 'required',
        'lintangKuliner' => 'required',
        'bujurKuliner' => 'required',
        'tarifAtas' => 'required|integer',
        'tarifBawah' => 'required|integer',
        'deskripsiKuliner' => 'required',
        'verify' => 'required',
      ));

      $kuliner = new KulinerModel();
      $kuliner->nama = $request->input('namaKuliner');
      $kuliner->alamat = $request->input('alamatKuliner');
      $kuliner->kecamatan = $request->input('kecamatanKuliner');
      $kuliner->kode_pos = $request->input('kodePosKuliner');
      $kuliner->kota = 'Jember';
      $kuliner->latitude = $request->input('lintangKuliner');
      $kuliner->longitude = $request->input('bujurKuliner');
      $kuliner->tarif_atas = $request->input('tarifAtas');
      $kuliner->tarif_bawah = $request->input('tarifBawah');
      $kuliner->deskripsi = $request->input('deskripsiKuliner');
      $kuliner->verified = $request->input('verify');

      //Save image
      if ($request->hasfile('gambarKuliner')) {
        $image = $request->file('gambarKuliner');
        $filename = time() . $image->getClientOriginalName();
        $location = public_path('image/kuliner/'.$filename);
        Image::make($image)->save($location);

        $kuliner->image = $filename;
      }

      // dd($request->all());
      try {
        $kuliner->save();
      } catch (Exception $e) {
        report($e);
        return false;
      }

      return redirect('/kuliner_admin');
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
      $DaftarKecamatan = KecamatanModel::all();
      return view ('admin_kuliner_ubah', [
        'data' => KulinerModel::findOrFail($id), 'kec' => $DaftarKecamatan
      ]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $kuliner = KulinerModel::findOrFail($id);
      $kuliner->nama = $request->input('namaKuliner');
      $kuliner->alamat = $request->input('alamatKuliner');
      $kuliner->kecamatan = $request->input('kecamatanKuliner');
      $kuliner->kode_pos = $request->input('kodePosKuliner');
      $kuliner->kota = 'Jember';
      $kuliner->latitude = $request->input('lintangKuliner');
      $kuliner->longitude = $request->input('bujurKuliner');
      $kuliner->tarif_atas = $request->input('tarifAtas');
      $kuliner->tarif_bawah = $request->input('tarifBawah');
      $kuliner->deskripsi = $request->input('deskripsiKuliner');
      $kuliner->verified = $request->input('verify');

      if ($request->hasfile('gambarKuliner')) {
        $image = $request->file('gambarKuliner');
        $filename = time() . $image->getClientOriginalName();
        $location = public_path('image/kuliner/'.$filename);
        Image::make($image)->save($location);

        $kuliner->image = $filename;
      }

      // dd($request->all());
      try {
        $kuliner->save();
      } catch (Exception $e) {
        report($e);
        return false;
      }

        return redirect('/kuliner_admin');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hotel = KulinerModel::findOrFail($id);
      $hotel->delete();
      return redirect('/kuliner_admin');
    }
}
