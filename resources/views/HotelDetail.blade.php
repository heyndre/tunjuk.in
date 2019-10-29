@extends ('template_user')

@section ('page_title')
Detail Hotel
@endsection

@section ('content')
<div class="hero-wrap js-fullheight" style="background-image: url('image/hotel/{{$data->image}}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
        <!-- <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Hotel</span></p> -->
        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$data->nama}}</h1>
      </div>
    </div>
  </div>
</div>


		<section class="ftco-section ftco-degree-bg">
      <div class="container">
  <div class="row">
<div class="col-lg-12">
  <div class="row">
    <div class="col-md-12 ftco-animate">
      <!-- <div class="single-slider owl-carousel">
        <div class="item">
          <div class="hotel-img-detail" style="background-image: url(images/hotel-2.jpg);"></div>
        </div>
        <div class="item">
          <div class="hotel-img-detail" style="background-image: url(images/hotel-3.jpg);"></div>
        </div>
        <div class="item">
          <div class="hotel-img-detail" style="background-image: url(images/hotel-4.jpg);"></div>
        </div>
      </div> -->
    </div>
    <div class="col-md-6 hotel-single mt-6 mb-6 ftco-animate">
      <span>Anda melihat detail </span>
      <h2>Hotel {{$data->nama}}</h2>
      <p class="rate mb-6">
        <span class="loc"><a href="#"><i class="icon-map"></i> {{$data->alamat}}, {{$data->kota}}</a></span>
        <br>
        <!-- <span class="star">
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star-o"></i>
        8 Rating, direview oleh {{$jumlah}} pengguna</span> -->
      </p>
      <p>Deskripsi Hotel </p>
      <p>{{$data->deskripsi}}</p>
      <div class="d-md-flex mt-6 mb-6">
        <ul>
          <li>Alamat :</li>
          <li>Koordinat :</li>
          <li>Tarif Termahal : </li>
          <li>Tarif Termurah :</li>
        </ul>
        <ul class="ml-md-6">
          <li>{{$data->alamat}}</li>
          <li>{{$data->latitude}}, {{$data->longitude}}</li>
          <li>{{$data->tarif_atas}}</li>
          <li>{{$data->tarif_bawah}}</li>
        </ul>
      </div>
      @if (Route::has('login'))
        @auth
          @if(Auth::user()->privileged=='1')
            <div class="btn py-3 px-4 btn-primary">
            <a href="{{ route('hotel_admin.edit', ['hotel_admin' => $data->id])}}" style="color:#FFF">Ubah Data</a>
            </div>
          @endif
        @endauth
      @endif
    </div>

    <div class="col-md-6 hotel-single mt-6 mb-6 ftco-animate">
      @include('user_comment_hotel')
    </div>

    <div class="col-lg-12">
      <h3 class="mb-5">Ulasan pengunjung - {{ $jumlah}}</h3>
      <div class="row">
        @foreach($comments as $key => $value)
          <div class="col-md-6 mt-6 mb-6">
            <div class="">
            <ul class="comment-list">
              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>{{$value->users['name']}}</h3>
                    <div class="meta"><span>Waktu kunjung : {{$value->tanggal_visitasi}}</span></div>
                      <p>{{$value->judul}}</p>
                      <p>{{$value->detail}}</p>
                      @if (Route::has('login'))
                        @auth
                          @if(Auth::user()->privileged=='1')
                          <div class="row">
                            <div>
                              <a href="{{ route('ulasan_hotel.edit', ['ulasan_hotel' => $value->id])}}" class="btn btn-primary">Ubah</span></a>
                            </div>
                            <div>
                              <form id="hapus" method="post" action="{{ route('ulasan_hotel.destroy', ['ulasan_hotel' => $value->id])}}" style="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="clicked(event)"> Hapus </button>
                              </form>
                            </div>
                          </div>
                            <!-- <a href="{{ route('ulasan_hotel.destroy', ['ulasan_hotel' => $value->id])}}" class="btn btn-danger">Hapus</span></a> -->
                          @elseif(Auth::user()->id == $value->user_id)
                          <div class="row">
                            <!-- <a href="" class="btn btn-danger">Hapus</span></a> -->
                            <form id="hapus" method="post" action="{{ route('ulasan_hotel.destroy', ['ulasan_hotel' => $value->id])}}" style="">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger" onclick="clicked(event)"> Hapus </button>
                            </form>
                          </div>
                          @else
                          @endif
                        @endauth
                      @endif
                </div>
              </li>
            </ul>
            </div>
          </div>
        @endforeach

    </div>
  </div>
  </div>
</div>

  </section>

  <script>
  function clicked(e)
  {
      if(!confirm('Hapus Komentar?'))e.preventDefault();
  }
  </script>
@endsection
