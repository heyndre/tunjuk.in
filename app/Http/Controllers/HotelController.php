<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\HotelModel;

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
      // echo "<pre>";
      // var_dump($hotels);
      return view ('admin_hotel_list', [
        'data' => $hotels
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin_hotel_tambah', [
          'data' => new HotelModel(),
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
        $hotel = new HotelModel();
        $hotel->nama = $request->input('namaHotel');
        $hotel->alamat = $request->input('alamatHotel');
        $hotel->kecamatan = $request->input('kecamatanHotel');
        $hotel->kode_pos = $request->input('kodePosHotel');
        $hotel->kota = $request->input('kotaHotel');
        $hotel->latitude = $request->input('lintangHotel');
        $hotel->longitude = $request->input('bujurHotel');
        $hotel->tarif_atas = $request->input('tarifAtas');
        $hotel->tarif_bawah = $request->input('tarifBawah');
        $hotel->verified = $request->input('verify');

        // dd($request->all());
        $hotel->save();
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
        return view ('admin_hotel_ubah', [
          'data' => HotelModel::findOrFail($id)
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
      $hotel->kota = $request->input('kotaHotel');
      $hotel->latitude = $request->input('lintangHotel');
      $hotel->longitude = $request->input('bujurHotel');
      $hotel->tarif_atas = $request->input('tarifAtas');
      $hotel->tarif_bawah = $request->input('tarifBawah');
      $hotel->verified = $request->input('verify');

      $hotel->save();
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
