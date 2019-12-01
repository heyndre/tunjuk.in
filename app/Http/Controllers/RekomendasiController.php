<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

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
        $start = date( 'm/d/Y', strtotime($request->input('checkIn')));
        $str = new DateTime($start);
        $finish = date('m/d/Y', strtotime($request->input('checkOut')));
        $fin = new DateTime($finish);
        $datediff = date_diff($str, $fin);
//        dd($datediff);
        $bWisata = $request->input('biayaWisata')/$request->input('person')/$datediff->days;
        $bHotel = $request->input('biayaHotel')/$request->input('person')/$datediff->days;
        $bKuliner = $request->input('biayaKuliner')/$request->input('person')/$datediff->days;
//        dd($bWisata);
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
        $tempWisata = array();
        $cWisata = 0;
        $cHotel = 0;
        $cKuliner = 0;
                foreach ($wisata as $w) {
                    $avgWisata = ($w->tarif_atas + $w->tarif_bawah)/2;
                    if ($avgWisata > $bWisata) {
                    } else {
                        $tempWisata[0][] = $w->id;
                        if ($avgWisata > 125000) {
                            $tempWisata[1][] = 0;
                        } elseif ($avgWisata <= 25000) {
                            $tempWisata[1][] = 100;
                        } elseif ($avgWisata <= 50000) {
                            $tempWisata[1][] = 80;
                        } elseif ($avgWisata <= 75000) {
                            $tempWisata[1][] = 60;
                        } elseif ($avgWisata <= 100000) {
                            $tempWisata[1][] = 40;
                        } else {
                            $tempWisata[1][] = 20;
                        }
                        //SET STARTING POINT TO CALCULATE DISTANCE
                        $latFrom = deg2rad(floatval($w->latitude));
                        $lonFrom = deg2rad(floatval($w->longitude));
                        //FIND HOTEL
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
                                $avgHotel = ($k->tarif_atas + $k->tarif_bawah)/2;
//                        dd($avgHotel);
                                if ($k->tarif_bawah > $bHotel) {
                                } else {
                                    $tempHotel[$cHotel][0] = $k->id;
                                    $tempHotel[$cHotel][1] = $result;
                                    if ($result <= 1000) {
                                        $tempHotel[$cHotel][2] = 100;
                                    } elseif ($result <= 1500) {
                                        $tempHotel[$cHotel][2] = 80;
                                    } elseif ($result <= 2000) {
                                        $tempHotel[$cHotel][2] = 60;
                                    } else {
                                        $tempHotel[$cHotel][2] = 40;
                                    }
                                    if ($avgHotel > 500000) {
                                        $tempHotel[$cHotel][3] = 0;
                                    } elseif ($avgHotel <= 200000) {
                                        $tempHotel[$cHotel][3] = 100;
                                    } elseif ($avgHotel <= 250000) {
                                        $tempHotel[$cHotel][3] = 90;
                                    } elseif ($avgHotel <= 300000) {
                                        $tempHotel[$cHotel][3] = 80;
                                    } elseif ($avgHotel <= 350000) {
                                        $tempHotel[$cHotel][3] = 70;
                                    } elseif ($avgHotel <= 400000) {
                                        $tempHotel[$cHotel][3] = 60;
                                    } elseif ($avgHotel <= 450000) {
                                        $tempHotel[$cHotel][3] = 50;
                                    } else {
                                        $tempHotel[$cHotel][3] = 40;
                                    }
                                }
                            }
                            $cHotel++;
                        }
                        //FIND KULINER
                        foreach ($kuliner as $ky) {
//                        dd($kuliner);
                            $latToK = deg2rad(floatval($ky->latitude));
                            $lonToK = deg2rad(floatval($ky->longitude));
                            $latDeltaK = $latToK - $latFrom;
                            $lonDeltaK = $lonToK - $lonFrom;
                            $angleKuliner = 2 * asin(sqrt(pow(sin($latDeltaK / 2), 2) +
                                    cos($latFrom) * cos($latToK) * pow(sin($lonDeltaK / 2), 2)));
                            $resultKuliner = $angleKuliner * $earthRadius;
//                        dd($resultKuliner);
                            if ($resultKuliner > 2500) {
                            } else {
                                $avgKuliner = ($ky->tarif_atas + $ky->tarif_bawah)/2;
//                        dd($avgKuliner);
                                if ($ky->tarif_bawah > $bKuliner) {
                                    echo "fail";
                                } else {
                                    $tempKuliner[][0] = $ky->id;
                                    $tempKuliner[][1] = $resultKuliner;
                                    if ($resultKuliner <= 1000) {
                                        $tempKuliner[][2] = 100;
                                    } elseif ($resultKuliner <= 1500) {
                                        $tempKuliner[][2] = 80;
                                    } elseif ($resultKuliner <= 2000) {
                                        $tempKuliner[][2] = 60;
                                    } else {
                                        $tempKuliner[][2] = 40;
                                    }
                                    if ($avgKuliner > 500000) {
                                        $tempKuliner[][3] = 0;
                                    } elseif ($avgKuliner <= 200000) {
                                        $tempKuliner[][3] = 100;
                                    } elseif ($avgKuliner <= 250000) {
                                        $tempKuliner[][3] = 90;
                                    } elseif ($avgKuliner <= 300000) {
                                        $tempKuliner[][3] = 80;
                                    } elseif ($avgKuliner <= 350000) {
                                        $tempKuliner[][3] = 70;
                                    } elseif ($avgKuliner <= 400000) {
                                        $tempKuliner[][3] = 60;
                                    } elseif ($avgKuliner <= 450000) {
                                        $tempKuliner[][3] = 50;
                                    } else {
                                        $tempKuliner[][3] = 40;
                                    }
                                }
                            }
                        }
//                        Echo Hotel
                        echo "hotel<br>";
                print_r($tempHotel);
//                        Echo Kuliner
                        echo "<br>kuliner<br>";
                    print_r($tempKuliner);
//                    Echo Wisata
                        echo "<br>wisata<br>";
                        print_r($tempWisata);
                    }
//                    Normalisasi Bobot
                    $cHotel = (count($tempHotel, COUNT_RECURSIVE) - count($tempHotel))/2;
                    echo $cHotel."<br>";
                    $v = sizeof($tempHotel);
//                    dd($v);
                    for ($a=0; $a < sizeof($tempHotel); $a++) {
                        if ($tempHotel[$a][0] == null) {

                        } else {
                            echo $tempHotel[$a][3]." $a <br>";
                            $tempHotel[$a][4] = ($tempHotel[$a][3]) * 0.6;
                            echo $tempHotel[$a][4]." $a <br>";
                        }

                    }
                }

            }



        // dd($request);
        // dd($wisata);
//        return view('rekomen.list_rekomen');


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
