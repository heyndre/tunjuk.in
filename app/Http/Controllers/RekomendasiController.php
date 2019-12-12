<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\WisataModel;
use App\HotelModel;

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
        $messages = [
            'after:yesterday' => ':Tanggal anda tidak sesuai',
            'after_or_equal:checkIn' => ':Tanggal Selesai tidak boleh kurang dari Tanggal Mulai'
        ];
        $this->validate($request,[
            'checkIn' => 'after:yesterday',
            'checkOut' => 'after_or_equal:checkIn'
        ],$messages);
        $person = $request->input('person');
        $start = date( 'm/d/Y', strtotime($request->input('checkIn')));
        $str = new DateTime($start);
        $finish = date('m/d/Y', strtotime($request->input('checkOut')));
        $fin = new DateTime($finish);
        $datediff = date_diff($str, $fin);
//        dd($datediff);
        if ($datediff->days == '0') {
            $bWisata = $request->input('biayaWisata')/$person;
            $bHotel = $request->input('biayaHotel')/$person;
            $bKuliner = $request->input('biayaKuliner')/$person;
        } else {
            $bWisata = $request->input('biayaWisata')/$person/$datediff->days;
            $bHotel = $request->input('biayaHotel')/$person/$datediff->days;
            $bKuliner = $request->input('biayaKuliner')/$person/$datediff->days;
        }
//        dd($bWisata);
        $match = ['category_id' => $request->type];
        $wisata = WisataModel::where($match)->get();
        $hasil = DB::table('wisata')
            ->where('category_id','=', $request->type)
            ->where('verified', '=', '1')
            ->where('tarif_atas', '<=', $request->biayaWisata)
            ->get();
        $kat = CategoryModel::all();
        $input = array(
            'bWisata' =>$bWisata,
            'bHotel' => $bHotel,
            'bKuliner' => $bKuliner,
            'biayaWisata' => $request->input('biayaWisata'),
            'biayaHotel' => $request->input('biayaHotel'),
            'biayaKuliner' => $request->input('biayaKuliner'),
            'person' => $person,
            'start' => $start,
            'finish' => $finish,
            'durasi' => $datediff->days,
            'kategori' => $request->type
        );
//        dd($this->budgetWisata);
//        dd($input);
        return view('rekomen.list_rekomen',[ 'wisata' => $hasil, 'category' => $kat])->with('input', $input);
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

    public function rekHotel( Request $input)
    {
//        dd($input);
        $messages = [
            'after:yesterday' => ':Tanggal anda tidak sesuai',
            'after_or_equal:checkIn' => ':Tanggal Selesai tidak boleh kurang dari Tanggal Mulai'
        ];
        $this->validate($input,[
            'checkIn' => 'after:yesterday',
            'checkOut' => 'after_or_equal:checkIn'
        ],$messages);
        $id = $input->WisataID;
        $hasil = DB::table('wisata as w')
            ->join('hotel as h', 'h.kota', '=', 'w.kota')
            ->select('w.*', 'h.*', DB::raw("6371000 * acos(cos(radians(w.latitude))
                      * cos(radians(h.latitude))
                      * cos(radians(h.longitude) - radians(w.longitude))
                      + sin(radians(w.latitude))
                      * sin(radians(h.latitude))) AS distance"))
            ->where('w.id','=',$id)
            ->where('h.verified', '=', '1')
            ->where('h.tarif_atas', '<=', $input->biayaHotel)
            ->where(DB::raw("6371000 * acos(cos(radians(w.latitude))
                      * cos(radians(h.latitude))
                      * cos(radians(h.longitude) - radians(w.longitude))
                      + sin(radians(w.latitude))
                      * sin(radians(h.latitude)))"), '<=', '2500')
            ->orderBy("distance")
            ->get();
        $kat = CategoryModel::all();
//        dd($input);
//         dd($hasil);
//        dd($id);
        return view('rekomen.list_rekomen_hotel', ['hasil' => $hasil, 'category' => $kat])->with('input', $input);
    }

    public function kuliner(Request $input) {
//        dd($input);
        $messages = [
            'after:yesterday' => ':Tanggal anda tidak sesuai',
            'after_or_equal:checkIn' => ':Tanggal Selesai tidak boleh kurang dari Tanggal Mulai'
        ];
        $this->validate($input,[
            'checkIn' => 'after:yesterday',
            'checkOut' => 'after_or_equal:checkIn'
        ],$messages);
        $id = $input->HotelID;
        $hasil = DB::table('wisata as w')
            ->join('kuliner as k', 'k.kota', '=', 'w.kota')
            ->select('w.*', 'k.*',
                DB::raw("6371000 * acos(cos(radians(w.latitude))
                      * cos(radians(k.latitude))
                      * cos(radians(k.longitude) - radians(w.longitude))
                      + sin(radians(w.latitude))
                      * sin(radians(k.latitude))) AS distance"))
            ->where('w.id','=',$id)
            ->where('k.verified', '=', '1')
            ->where('k.tarif_atas', '<=', $input->biayaKuliner)
            ->where(DB::raw("6371000 * acos(cos(radians(w.latitude))
                      * cos(radians(k.latitude))
                      * cos(radians(k.longitude) - radians(w.longitude))
                      + sin(radians(w.latitude))
                      * sin(radians(k.latitude)))"), '<=', '2500')
            ->orderBy("distance")
            ->get();
        $kat = CategoryModel::all();
//        dd($input);
//         dd($hasil);
//        dd($id);
        return view('rekomen.list_rekomen_kuliner', ['hasil' => $hasil, 'category' => $kat])->with('input', $input);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function final(Request $input)
    {
//        $assJarakKuliner=0;
//        $assJarakHotel=0;
//        $assBiayaKuliner=0;
//        $assBiayaHotel=0;
//        $assBiayaWisata=0;
//        $accWisata='';
//        $accKuliner='';
//        $accHotel='';
        if (is_null($input->WisataID)) {
            return redirect('landing');
        } else {
            $accWisata = DB::table('wisata')->where('id', '=', $input->WisataID)->first();
            if (is_null($input->HotelID)) {

            } else {
                $accHotel = DB::table('hotel')->where('id', '=', $input->HotelID)->first();
            }
            if (is_null($input->KulinerID)) {

            } else {
                $accKuliner = DB::table('kuliner')->where('id', '=', $input->KulinerID)->first();
            }
        }
        //Penilaian dan Pembobotan Jarak Hotel terhadap Tempat Wisata
        if ($input->jarakHotel > 0) {
            if ($input->jarakHotel <= 1000) {
                $assJarakHotel = 100*0.6;
            } elseif ($input->jarakHotel <= 1500) {
                $assJarakHotel = 80*0.6;
            } elseif ($input->jarakHotel <= 2000) {
                $assJarakHotel = 60*0.6;
            } elseif ($input->jarakHotel <= 2500) {
                $assJarakHotel = 40*0.6;
            } else {
                $assJarakHotel = 0;
            }
        }
        //Penilaian dan Pembobotan Jarak Kuliner terhadap Tempat Wisata
        if ($input->jarakKuliner > 0) {
            if ($input->jarakKuliner <= 1000) {
                $assJarakKuliner = 100*0.6;
            } elseif ($input->jarakKuliner <= 1500) {
                $assJarakKuliner = 80*0.6;
            } elseif ($input->jarakKuliner <= 2000) {
                $assJarakKuliner = 60*0.6;
            } elseif ($input->jarakKuliner <= 2500) {
                $assJarakKuliner = 40*0.6;
            } else {
                $assJarakKuliner = 0;
            }
        }
        //Penilaian dan Pembobotan tarif Kuliner
        if ($input->biayaKuliner > 0) {
            if ($input->costKuliner <= 35000) {
                $assBiayaKuliner = 100*0.1;
            } elseif ($input->costKuliner <= 60000) {
                $assBiayaKuliner = 80*0.1;
            } elseif ($input->costKuliner <= 85000) {
                $assBiayaKuliner = 60*0.1;
            } elseif ($input->costKuliner <= 105000) {
                $assBiayaKuliner = 40*0.1;
            } elseif ($input->costKuliner <= 125000) {
                $assBiayaKuliner = 20*0.1;
            } else {
                $assBiayaKuliner = 0;
            }
        }
        //Penilaian tarif Hotel
        if ($input->biayaHotel > 0) {
            if ($input->costHotel <= 35000) {
                $assBiayaHotel = 100*0.1;
            } elseif ($input->costHotel <= 60000) {
                $assBiayaHotel = 80*0.1;
            } elseif ($input->costHotel <= 85000) {
                $assBiayaHotel = 60*0.1;
            } elseif ($input->costHotel <= 105000) {
                $assBiayaHotel = 40*0.1;
            } elseif ($input->costHotel <= 125000) {
                $assBiayaHotel = 20*0.1;
            } else {
                $assBiayaHotel = 0;
            }
        }
        //Penilaian tarif Wisata
        if ($input->biayaWisata > 0) {
            if ($input->costWisata <= 35000) {
                $assBiayaWisata = 100*0.2;
            } elseif ($input->costWisata <= 60000) {
                $assBiayaWisata = 80*0.2;
            } elseif ($input->costWisata <= 85000) {
                $assBiayaWisata = 60*0.2;
            } elseif ($input->costWisata <= 105000) {
                $assBiayaWisata = 40*0.2;
            } elseif ($input->costWisata <= 125000) {
                $assBiayaWisata = 20*0.2;
            } else {
                $assBiayaWisata = 0;
            }
        }
        //NILAI AKHIR
        $accJarak = ($assJarakHotel + $assJarakKuliner)/2;
        $accRekomen = $assBiayaWisata + $assBiayaHotel + $assBiayaKuliner + $accJarak;
        $kat = CategoryModel::all();
//        dd($accHotel);
        return view('rekomen.final', ['rekom' => $accRekomen, 'hasilWisata' => $accWisata, 'hasilHotel' => $accHotel, 'hasilKuliner' => $accKuliner, 'category' => $kat])->with('input', $input);
//        dd($accHotel);
//        echo $accWisata;
//        echo $accKuliner;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
