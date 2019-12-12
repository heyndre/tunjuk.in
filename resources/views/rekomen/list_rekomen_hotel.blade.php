@extends ('template_user')

@section('page_title')
    Rekomendasi Liburan - Pilih Hotel
@endsection

@section('page_head')

@endsection

@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url({{asset('images/image_5.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                 data-scrollax-parent="true">
                <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <!-- <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Hotel</span></p> -->
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"></h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Kriteria pencarian :</h3>
                    <form action="{{route('rekomendasi.store')}}" class="search-destination" method="POST">
                        @csrf
                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                                        <input type="text" class="form-control checkin_date" placeholder="Mulai" name="checkIn" value="{{$input['start']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">Jumlah pelancong</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="person" id="" class="form-control">
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
                                        <input type="text" class="form-control checkout_date" placeholder="Selesai" name="checkOut" value="{{$input['finish']}}">
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
                                        <input type="number" placeholder="Biaya Wisata" name="biayaWisata" min="1" value="{{$input['biayaWisata']}}" required>
                                        <p>Biaya Hotel</p>
                                        <input type="number" placeholder="Biaya Hotel" name="biayaHotel" min="0" value="{{$input['biayaHotel']}}" required>
                                        <p>Biaya Kuliner</p>
                                        <input type="number" placeholder="Biaya Kuliner" name="biayaKuliner" min="0" value="{{$input['biayaKuliner']}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-field">
                                        <input type="submit" value="Search" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h6></h6>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>Pilih hotel:</h3>
                    @if(count($hasil) == 0)
                        Tidak ada hasil yang sesuai,
                        <form action="{{route('rekomendasi.kuliner')}}" method="post">
                            @csrf
                            {{--                                        <input type="hidden" name="HotelID" id="HotelID" value="{{$value->id}}">--}}
                            <input type="hidden" name="WisataID" id="WisataID" value="{{$input['WisataID']}}">
                            <input type="hidden" value="{{$input['bWisata']}}" name="bWisata">
                            <input type="hidden" value="{{$input['bKuliner']}}" name="bKuliner">
                            <input type="hidden" value="{{$input['bHotel']}}" name="bHotel">
                            <input type="hidden" value="{{$input['biayaWisata']}}" name="biayaWisata">
                            <input type="hidden" value="{{$input['biayaKuliner']}}" name="biayaKuliner">
                            <input type="hidden" value="{{$input['biayaHotel']}}" name="biayaHotel">
                            <input type="hidden" value="{{$input['person']}}" name="person">
                            <input type="hidden" value="{{$input['start']}}" name="start">
                            <input type="hidden" value="{{$input['finish']}}" name="finish">
                            <input type="hidden" value="{{$input['jarakHotel']}}" name="jarakHotel">
                            <input type="hidden" value="{{$input['costHotel']}}" name="costHotel">
                            <input type="hidden" value="{{$input['kategori']}}" name="kategori">
                            <input type="submit" class="ml-auto" value="Lanjutkan ke Pilih Kuliner">
                        </form>
                        Atau ulangi pencarian anda!
                    @else
                    @foreach($hasil as $value)
                        <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                            <div class="destination">
                                <a href="{{route('Detail_Hotel', ['Detail_Hotel' => $value->id])}}"
                                   class="img img-2 d-flex justify-content-center align-items-center"
                                   style="background-image: url({{asset('image/hotel/'.$value->image)}})">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-link"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <div class="d-flex">
                                        <div class="one">
                                            <h3>{{$value->nama}}</h3>
                                            <p class="rate">
                                                @for ($i=1; $i <= $value->rating; $i++)
                                                    <i class="icon-star"></i>
                                                @endfor
                                                @for ($o = $i; $o <= 5; $o++)
                                                    <i class="icon-star-o"></i>
                                                @endfor
                                            </p>
                                        </div>
                                        <div class="two">
                                            <?php $tariff = number_format($value->tarif_bawah)?>
                            <span class="price per-price">Rp.{{$tariff}} <br><small>Mulai
                                    dari</small></span>
                                        </div>
                                    </div>
                                    <p>{{$value->alamat}}</p>
                                    <hr>
                                    <p class="bottom-area d-flex">
                                        <span><i class="icon-map-o"></i> {{$value->kecamatan}}, {{$value->kota}}</span>
                                    <?php $jarak = number_format($value->distance, 2) ?>
                                    <p>Jarak Hotel : {{$jarak}} meter dari wisata</p>
                                    <form action="{{route('rekomendasi.kuliner', ['rekomendasi' => $value->id])}}" method="post">
                                        @csrf
{{--                                        <input type="hidden" name="HotelID" id="HotelID" value="{{$value->id}}">--}}
                                        <input type="hidden" name="WisataID" id="WisataID" value="{{$input['WisataID']}}">
                                        <input type="hidden" name="HotelID" id="HotelID" value="{{$value->id}}">
                                        <input type="hidden" value="{{$input['bWisata']}}" name="bWisata">
                                        <input type="hidden" value="{{$input['bKuliner']}}" name="bKuliner">
                                        <input type="hidden" value="{{$input['bHotel']}}" name="bHotel">
                                        <input type="hidden" value="{{$input['biayaWisata']}}" name="biayaWisata">
                                        <input type="hidden" value="{{$input['biayaKuliner']}}" name="biayaKuliner">
                                        <input type="hidden" value="{{$input['biayaHotel']}}" name="biayaHotel">
                                        <input type="hidden" value="{{$input['person']}}" name="person">
                                        <input type="hidden" value="{{$input['start']}}" name="start">
                                        <input type="hidden" value="{{$input['finish']}}" name="finish">
                                        <input type="hidden" value="{{$value->distance}}" name="jarakHotel">
                                        <input type="hidden" value="{{$input->kategori}}" name="kategori">
                                        <input type="hidden" value="{{($value->tarif_bawah + $value->tarif_atas) /2}}" name="costHotel">
                                        <input type="hidden" value="{{($value->tarif_atas + $value->tarif_bawah) /2}}" name="costWisata">
                                        <input type="submit" class="ml-auto" value="Pilih Hotel">
{{--                                        <span class="ml-auto"><a href="{{route('rekomendasi.show', ['rekomendasi' => $value->id])}}">Pilih Tempat Wisata</a></span>--}}
                                    </form>
                                    </p>

                                    {{--                            <p class="bottom-area d-flex">--}}
                                    {{--                                <span><i class="ml-auto"></i> <a href="{{route('')}}" </span>--}}
                                    {{--                            </p>--}}
                                </div>
                                </div>
                            </div>
                    @endforeach
                    @endif
                </div>
                </div>
            </div>
    </section>
@endsection
