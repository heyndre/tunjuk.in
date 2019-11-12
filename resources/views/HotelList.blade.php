@extends ('template_user')

@section ('page_title')
Daftar Hotel
@endsection

@section ('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
            data-scrollax-parent="true">
            <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <!-- <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Hotel</span></p> -->
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Daftar Hotel yang
                    tersedia</h1>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-9">
    <div class="row">
        @foreach ($data as $key => $value)
        <div class="col-sm col-md-6 col-lg-4 ftco-animate">
            <div class="destination">
                <a href="/Detail_Hotel/{{$value->id}}"
                    class="img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url(image/hotel/{{$value->image}});">
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
                            <span class="price per-price">Rp.{{$value->tarif_bawah}} <br><small>Mulai
                                    dari</small></span>
                        </div>
                    </div>
                    <p>{{$value->alamat}}</p>
                    <hr>
                    <p class="bottom-area d-flex">
                        <span><i class="icon-map-o"></i> {{$value->kecamatan}}, {{$value->kota}}</span>
                        <span class="ml-auto"><a href="/Detail_Hotel/{{$value->id}}">Lihat Detail</a></span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
