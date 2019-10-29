<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\HotelModel;
use App\KecamatanModel;
use App\HotelComment;
use Image;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $hotels = HotelModel::all();
      $comment = HotelComment::all();
      // echo "<pre>";
      // var_dump($hotels);
      return view ('admin_hotel_list', [
        'data' => $hotels, 'comm' => $comment
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
        return view ('admin_hotel_tambah', [
          'data' => new HotelModel(), 'kec' => $DaftarKecamatan
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
          'namaHotel' => 'required',
          'alamatHotel' => 'required',
          'kecamatanHotel' => 'required',
          'kodePosHotel' => 'required',
          'lintangHotel' => 'required',
          'bujurHotel' => 'required',
          'tarifAtas' => 'required|integer',
          'tarifBawah' => 'required|integer',
          'deskripsiHotel' => 'required',
          'verify' => 'required',
        ));

        $hotel = new HotelModel();
        $hotel->nama = $request->input('namaHotel');
        $hotel->alamat = $request->input('alamatHotel');
        $hotel->kecamatan = $request->input('kecamatanHotel');
        $hotel->kode_pos = $request->input('kodePosHotel');
        $hotel->kota = 'Jember';
        $hotel->latitude = $request->input('lintangHotel');
        $hotel->longitude = $request->input('bujurHotel');
        $hotel->tarif_atas = $request->input('tarifAtas');
        $hotel->tarif_bawah = $request->input('tarifBawah');
        $hotel->deskripsi = $request->input('deskripsiHotel');
        $hotel->verified = $request->input('verify');

        //Save image
        if ($request->hasfile('gambarHotel')) {
          $image = $request->file('gambarHotel');
          $filename = time() . $image->getClientOriginalName();
          $location = public_path('image/hotel/'.$filename);
          Image::make($image)->save($location);

          $hotel->image = $filename;
        }

        // dd($request->all());
        try {
          $hotel->save();
        } catch (Exception $e) {
          report($e);
          return false;
        }

        return redirect('/hotel_admin');
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
        return view ('admin_hotel_ubah', [
          'data' => HotelModel::findOrFail($id), 'kec' => $DaftarKecamatan
        ]);
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
      $hotel = HotelModel::findOrFail($id);
      $hotel->nama = $request->input('namaHotel');
      $hotel->alamat = $request->input('alamatHotel');
      $hotel->kecamatan = $request->input('kecamatanHotel');
      $hotel->kode_pos = $request->input('kodePosHotel');
      $hotel->kota = 'Jember';
      $hotel->latitude = $request->input('lintangHotel');
      $hotel->longitude = $request->input('bujurHotel');
      $hotel->tarif_atas = $request->input('tarifAtas');
      $hotel->tarif_bawah = $request->input('tarifBawah');
      $hotel->deskripsi = $request->input('deskripsiHotel');
      $hotel->verified = $request->input('verify');

      if ($request->hasfile('gambarHotel')) {
        $image = $request->file('gambarHotel');
        $filename = time() . $image->getClientOriginalName();
        $location = public_path('image/hotel/'.$filename);
        Image::make($image)->save($location);

        $hotel->image = $filename;
      }

      try {
        $hotel->save();
      } catch (Exception $e) {
        report($e);
        return false;
      }

        return redirect('/hotel_admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = HotelModel::findOrFail($id);
        $hotel->delete();
        return redirect('/hotel_admin');
    }
}
