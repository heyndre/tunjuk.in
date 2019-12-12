<?php

namespace App\Http\Controllers;

use App\WisataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FindWisataRek extends Controller
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
        $start = date( 'm/d/Y', strtotime($request->input('checkIn')));
        $str = new DateTime($start);
        $finish = date('m/d/Y', strtotime($request->input('checkOut')));
        $fin = new DateTime($finish);
        $datediff = date_diff($str, $fin);
        $bWisata = $request->input('biayaWisata')/$request->input('person')/$datediff->days;
        $bHotel = $request->input('biayaHotel')/$request->input('person')/$datediff->days;
        $bKuliner = $request->input('biayaKuliner')/$request->input('person')/$datediff->days;
//        dd($bWisata);
        $match = ['category_id' => $request->type];
//        $wisata = DB::table('wisata')
//        ->where($match)
//        ->get();
        $wisata = WisataModel::where($match)->get();
        $hotel = DB::table('hotel')
            ->get();
        $match2 = ['verified' => '1'];
        $kuliner = DB::table('kuliner')
            ->where($match2)
            ->get();
        $earthRadius = 6371000;
        $diff = array();
        $tempKuliner = array();
        $tempHotel = array();
        $tempWisata = array();
        $cWisata = 0;
        $cHotel = 0;
        $cKuliner = 0;
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
