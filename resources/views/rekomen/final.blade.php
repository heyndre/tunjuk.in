@extends ('template_user')

@section('page_title')
    Rekomendasi Liburan - Pilih Kuliner
@endsection

@section ('page_head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
@endsection

@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url({{asset('images/image_5.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                 data-scrollax-parent="true">
                <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <!-- <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Hotel</span></p> -->
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hasil Rekomendasi Liburan Anda</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h3>Kriteria pencarian :</h3>
            <form action="" class="search-destination" method="">
                @csrf
                <div class="row">
                    <div class="col-md align-items-end">
                        <div class="form-group">
                            <label for="#">Jenis Wisata</label>
                            <div class="form-field">
                                <select name="type" id="" class="form-control">
                                    @foreach ($category as $kat)
                                        @if($kat['category_id'] == $input['kategori'])
                                        <option value="{{$kat['category_id']}}" selected>{{$kat['category_name']}}</option>
                                        @else
                                        <option value="{{$kat['category_id']}}">{{$kat['category_name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="#">Tanggal mulai</label>
                            <div class="form-field">
                                <div class="icon"><span class="icon-map-marker"></span></div>
                                <input type="text" class="form-control checkin_date" placeholder="Mulai" name="checkIn" value="{{$input['start']}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md align-items-end">
                        <div class="form-group">
                            <label for="#">Jumlah pelancong</label>
                            <div class="form-field">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="person" id="" class="form-control" disabled>
                                        <?php $person = $input['person']?>
                                        @for($i=1; $i <5; $i++ )
                                            @if($i == $person)
                                                <option value="{{$i}}" selected>{{$i}}</option>
                                            @else
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endif
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="#">Tanggal selesai</label>
                            <div class="form-field">
                                <div class="icon"><span class="icon-map-marker"></span></div>
                                <input type="text" class="form-control checkout_date" placeholder="Selesai" name="checkOut" value="{{$input['finish']}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md align-items-end">
                        <div class="form-group">
                            <label for="#">Biaya yang disiapkan</label>
                            <div class="slidecontainer">
                                {{-- <input type="range" min="100000" max="1000000" value="250000" class="slider" name="biaya" id="myRange" step="50000">
                                <p>Biaya: Rp.<span id="demo"></span></p> --}}
                                <p>Biaya Wisata</p>
                                <input type="number" placeholder="Biaya Wisata" name="biayaWisata" min="1" value="{{$input['biayaWisata']}}" required disabled>
                                <p>Biaya Hotel</p>
                                <input type="number" placeholder="Biaya Hotel" name="biayaHotel" min="0" value="{{$input['biayaHotel']}}" required disabled>
                                <p>Biaya Kuliner</p>
                                <input type="number" placeholder="Biaya Kuliner" name="biayaKuliner" min="0" value="{{$input['biayaKuliner']}}" required disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <h6></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="text-align: center;"><h3>Tingkat Rekomendasi : {{$rekom}}/100</h3>
    <br>
        @if($rekom >= 81)
            <h3>Sangat Direkomendasikan!</h3>
            {{$rate=5}}
        @elseif($rekom > 71)
            <h3>Direkomendasikan :)</h3>
            {{$rate=4}}
            @elseif($rekom >= 61)
            <h3>Cukup Direkomendasikan.</h3>
            {{$rate=3}}
            @else
            <h3>Kurang Direkomendasikan</h3>
            {{$rate=2}}
        @endif
            <p class="rate">
                @for ($i=1; $i <= $rate; $i++)
                    <i class="icon-star"></i>
                @endfor
                @for ($o = $i; $o <= 5; $o++)
                    <i class="icon-star-o"></i>
                @endfor
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm col-md-6 col-lg-4 ftco-animate">
        <div class="destination">
            <h3>Tempat Wisata Disarankan</h3>
            <a href="{{route('Detail_Wisata', ['Detail_Wisata' => $hasilWisata->id])}}" target="_blank"
               class="img img-2 d-flex justify-content-center align-items-center"
               style="background-image: url({{asset('image/wisata/'.$hasilWisata->image)}})">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="icon-link"></span>
                </div>
            </a>
            <div class="text p-3">
                <div class="d-flex">
                    <div class="one">
                        <h3>{{$hasilWisata->nama}}</h3>
                    </div>
                    <div class="two">
                        <?php $tarifatas = number_format($hasilWisata->tarif_atas);
                        $tarifbawah = number_format($hasilWisata->tarif_bawah);
                        $tarifavg = number_format($input->costWisata)
                        ?>
                        <span class="price per-price">Rp.{{$tarifbawah}} <br><small>Mulai dari</small></span>
                            <span class="price per-price">Rp.{{$tarifatas}} <br><small>Hingga</small></span>
                    </div>
                </div>
                <p>{{$hasilWisata->alamat}}</p>
                <hr>
                <p class="bottom-area d-flex">
                    <span><i class="icon-map-o"></i> {{$hasilWisata->kecamatan}}, {{$hasilWisata->kota}}</span>
                </p>
                <p class="bottom-area d-flex">
                    <span><i class="ml-auto"></i> <a href="{{route('Detail_Wisata', ['Detail_Wisata' => $hasilWisata->id])}}" target="_blank">Lihat Detail Wisata</a></span>
                </p>
            </div>
        </div>
        </div>
        <div class="col-sm col-md-6 col-lg-4 ftco-animate">
            <div class="destination">
                <h3>Penginapan disarankan</h3>
                <a href="{{route('Detail_Hotel', ['Detail_Hotel' => $hasilHotel->id])}}" target="_blank"
                   class="img img-2 d-flex justify-content-center align-items-center"
                   style="background-image: url({{asset('image/hotel/'.$hasilHotel->image)}})">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="icon-link"></span>
                    </div>
                </a>
                <div class="text p-3">
                    <div class="d-flex">
                        <div class="one">
                            <h3>{{$hasilHotel->nama}}</h3>
                            <p class="rate">
                                @for ($i=1; $i <= $hasilHotel->rating; $i++)
                                    <i class="icon-star"></i>
                                @endfor
                                @for ($o = $i; $o <= 5; $o++)
                                    <i class="icon-star-o"></i>
                                @endfor
                            </p>
                        </div>
                        <div class="two">
                            <?php $tarifatas = number_format($hasilHotel->tarif_atas);
                            $tarifbawah = number_format($hasilHotel->tarif_bawah);
                            $tarifavg = number_format($input->costHotel)
                            ?>
                            <span class="price per-price">Rp.{{$tarifbawah}} <br><small>Mulai dari</small></span>
                            <span class="price per-price">Rp.{{$tarifatas}} <br><small>Hingga</small></span>
                        </div>
                    </div>
                    <p>{{$hasilHotel->alamat}}</p>
                    <hr>
                    <p class="bottom-area d-flex">
                        <span><i class="icon-map-o"></i> {{$hasilHotel->kecamatan}}, {{$hasilHotel->kota}}</span>
                    </p>
                    <p class="bottom-area d-flex">
                        <span><i class="ml-auto"></i> <a href="{{route('Detail_Hotel', ['Detail_Hotel' => $hasilHotel->id])}}" target="_blank">Lihat Detail Hotel</a></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm col-md-6 col-lg-4 ftco-animate">
            <div class="destination">
                <h3>Wisata Kuliner disarankan</h3>
                <a href="{{route('Detail_Kuliner', ['Detail_Kuliner' => $hasilKuliner->id])}}" target="_blank"
                   class="img img-2 d-flex justify-content-center align-items-center"
                   style="background-image: url({{asset('image/kuliner/'.$hasilKuliner->image)}})">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="icon-link"></span>
                    </div>
                </a>
                <div class="text p-3">
                    <div class="d-flex">
                        <div class="one">
                            <h3>{{$hasilKuliner->nama}}</h3>
                        </div>
                        <div class="two">
                            <?php $tarifatas = number_format($hasilKuliner->tarif_atas);
                            $tarifbawah = number_format($hasilKuliner->tarif_bawah);
                            $tarifavg = number_format($input->costKuliner)
                            ?>
                            <span class="price per-price">Rp.{{$tarifbawah}} <br><small>Mulai dari</small></span>
                            <span class="price per-price">Rp.{{$tarifatas}} <br><small>Hingga</small></span>
                        </div>
                    </div>
                    <p>{{$hasilHotel->alamat}}</p>
                    <hr>
                    <p class="bottom-area d-flex">
                        <span><i class="icon-map-o"></i> {{$hasilKuliner->kecamatan}}, {{$hasilKuliner->kota}}</span>
                    </p>
                    <p class="bottom-area d-flex">
                        <span><i class="ml-auto"></i> <a href="{{route('Detail_Kuliner', ['Detail_Kuliner' => $hasilKuliner->id])}}" target="_blank">Lihat Detail Kuliner</a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="map"  style=" height: 540px;"></div>
    </div>

    <script>
        var map = L.map('map', {scrollWheelZoom:false}).setView([{{ $hasilWisata-> latitude}}, {{ $hasilWisata -> longitude }}], 23);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var Kuliner = [{{ $hasilKuliner-> latitude}}, {{ $hasilKuliner -> longitude }}];
        var locations = [
            ["Wisata",{{ $hasilWisata-> latitude}}, {{ $hasilWisata -> longitude }}],
            ["Hotel",{{ $hasilHotel-> latitude}}, {{ $hasilHotel -> longitude }}],
            ["Kuliner",{{ $hasilKuliner-> latitude}}, {{ $hasilKuliner -> longitude }}]
        ];
        console.log(locations);
        for (var i = 0; i < locations.length; i++) {
            marker = new L.marker([locations[i][1],locations[i][2]])
                .bindPopup(locations[i][0])
                .addTo(map);
        }
    </script>
@endsection
