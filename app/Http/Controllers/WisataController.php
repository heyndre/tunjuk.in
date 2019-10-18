<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\WisataModel;
use App\CategoryModel;
use App\KecamatanModel;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = CategoryModel::all();
        $wisata = WisataModel::all();
        return view('admin_wisata_list', ['category' => $cat, 'data' => $wisata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = CategoryModel::all();
        $DaftarKecamatan = KecamatanModel::all();
        return view('admin_wisata_tambah', [
          'kategori' => $cat, 'wisata', 'data' => new CategoryModel(), 'kec' => $DaftarKecamatan
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
      $destination = new WisataModel();
      $destination->nama = $request->input('namaWisata');
      $destination->alamat = $request->input('alamatWisata');
      $destination->kecamatan = $request->input('kecamatanWisata');
      $destination->kode_pos = $request->input('kodePosWisata');
      $destination->kota = 'Jember';
      $destination->latitude = $request->input('lintangWisata');
      $destination->longitude = $request->input('bujurWisata');
      $destination->tarif_atas = $request->input('tarifAtas');
      $destination->tarif_bawah = $request->input('tarifBawah');
      $destination->deskripsi = $request->input('deskripsiWisata');
      $destination->category_id = $request->input('kategoriWisata');
      $destination->verified = $request->input('verify');

      //Save image
      if ($request->hasfile('gambarWisata')) {
        $image = $request->file('gambarWisata');
        $filename = time() . $image->getClientOriginalName();
        $location = public_path('image/wisata/'.$filename);
        Image::make($image)->save($location);

        $destination->image = $filename;
      }

      // dd($request->all());
      try {
        $destination->save();
      } catch (Exception $e) {
        report($e);
        return false;
      }

      return redirect('/wisata_admin');
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
        $DaftarKategori = CategoryModel::all();
        return view('admin_wisata_ubah', [
          'data' => WisataModel::findOrFail($id), 'kec' => $DaftarKecamatan,
          'kategori' => $DaftarKategori
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
      $destination = WisataModel::findOrFail($id);
      $destination->nama = $request->input('namaWisata');
      $destination->alamat = $request->input('alamatWisata');
      $destination->kecamatan = $request->input('kecamatanWisata');
      $destination->kode_pos = $request->input('kodePosWisata');
      $destination->kota = 'Jember';
      $destination->latitude = $request->input('lintangWisata');
      $destination->longitude = $request->input('bujurWisata');
      $destination->tarif_atas = $request->input('tarifAtas');
      $destination->tarif_bawah = $request->input('tarifBawah');
      $destination->deskripsi = $request->input('deskripsiWisata');
      $destination->category_id = $request->input('kategoriWisata');
      $destination->verified = $request->input('verify');

      if ($request->hasfile('gambarWisata')) {
        $image = $request->file('gambarWisata');
        $filename = time() . $image->getClientOriginalName();
        $location = public_path('image/wisata/'.$filename);
        Image::make($image)->save($location);

        $destination->image = $filename;
      }

      try {
        $destination->save();
      } catch (Exception $e) {
        report($e);
        return false;
      }

        return redirect('/wisata_admin');
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
