<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rekomen.list_rekomen');
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
        $match = ['category_id' => $request->type];
        $wisata = DB::table('wisata')
        ->where($match)
        ->get();
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
        foreach ($wisata as $key) {
            if ($key->tarif_atas > $request->input('biayaWisata')) {
            } else {
                $latFrom = deg2rad(floatval($key->latitude));
                $lonFrom = deg2rad(floatval($key->longitude));
                foreach ($hotel as $k) {
                    $latTo = deg2rad(floatval($k->latitude));
                    $lonTo = deg2rad(floatval($k->longitude));
                    $latDelta = $latTo - $latFrom;
                    $lonDelta = $lonTo - $lonFrom;
                    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
                    $result = $angle * $earthRadius;
                    if ($result > 2500) {
                    } else {
                        if ($k->tarif_atas > $request->biayaHotel) {
                        } else {
                            $tempHotel[0][] = $k->id;
                            $tempHotel[1][] = $result;
                        }
                    }
                }
//                echo "hotel";
//                print_r($tempHotel);
//                for ($row = 0; $row < 2; $row++) {
//                    echo "<p><b>Row number $row</b></p>";
//                    echo "<ul>";
//                    for ($col = 0; $col < 2; $col++) {
//                        echo "<li>".$tempHotel[$row][$col]."</li>";
//                    }
//                    echo "</ul>";
//                }
            }
        }
//            FIND KULINER AFTER FINDING HOTEL
            foreach ($wisata as $ke) {
//                dd($wisata);
                if ($key->tarif_atas > $request->input('biayaWisata')) {
                } else {
//                    dd($request->input('biayaWisata'));
                    $latFromK = deg2rad(floatval($ke->latitude));
                    $lonFromK = deg2rad(floatval($ke->longitude));
                    foreach ($kuliner as $ky) {
//                        dd($kuliner);
                        $latToK = deg2rad(floatval($ky->latitude));
                        $lonToK = deg2rad(floatval($ky->longitude));
                        $latDeltaK = $latToK - $latFromK;
                        $lonDeltaK = $lonToK - $lonFromK;
                        $angleKuliner = 2 * asin(sqrt(pow(sin($latDeltaK / 2), 2) +
                                cos($latFromK) * cos($latToK) * pow(sin($lonDeltaK / 2), 2)));
                        $resultKuliner = $angleKuliner * $earthRadius;
//                        dd($resultKuliner);
                        if ($resultKuliner > 2500) {
                        } else {
                            if ($ky->tarif_atas > $request->biayaKuliner) {
                            } else {
                                $tempKuliner[0][] = $ky->id;
                                $tempKuliner[1][] = $resultKuliner;
                            }
                        }
                    }
//                    dd($ky->id);
//                    echo "kuliner";
//                    print_r($tempKuliner);
//                    for ($row = 0; $row < 2; $row++) {
//                        echo "<p><b>Row number $row</b></p>";
//                        echo "<ul>";
//                        for ($col = 0; $col < 1; $col++) {
//                            echo "<li>".$tempKuliner[$row][$col]."</li>";
//                        }
//                        echo "</ul>";
//                    }
                }
            }



        // dd($request);
        // dd($wisata);
//        return view('rekomen.list_rekomen');
    }

    // Haversine Formula for calculating distance
    function haversineGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
      {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
          cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
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
