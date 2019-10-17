<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\WisataModel;
use App\CategoryModel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kat = CategoryModel::all();
        return view('admin_kategori_list', ['data' => $kat
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_kategori_tambah', [
          'data' => new CategoryModel()
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
          'namaKategori' => 'required',
        ));

        $kat = new CategoryModel();
        $kat->category_name = $request->input('namaKategori');

        try {
          $kat->save();
        } catch (Exception $e) {
          report($e);
          return false;
        }

        return redirect('/kategori_admin');
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
        return view('admin_kategori_ubah', [
          'data' => CategoryModel::findOrFail($id)
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
        $kat = CategoryModel::findOrFail($id);
        $kat->category_name = $request->input('namaKategori');

        try {
          $kat->save();
        } catch (Exception $e) {
          report($e);
          return false;
        }

        return redirect('/kategori_admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kat = CategoryModel::findOrFail($id);
        $kat->delete();
        return redirect('/kategori_admin');
    }
}
