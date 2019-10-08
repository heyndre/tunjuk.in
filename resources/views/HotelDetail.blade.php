@extends ('template_user')

@section ('page_title')
Detail Hotel
@endsection

@section ('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bp.jpg');">
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
<div class="col-lg-9">
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
    <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
      <span>Anda melihat detail </span>
      <h2>Hotel {{$data->nama}}</h2>
      <!-- <p class="rate mb-5">
        <span class="loc"><a href="#"><i class="icon-map"></i> 291 South 21th Street, Suite 721 New York NY 10016</a></span>
        <span class="star">
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star-o"></i>
        8 Rating</span>
      </p> -->
      <!-- <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p> -->
      <div class="d-md-flex mt-5 mb-5">
        <ul>
          <li>Alamat :</li>
          <li>Koordinat :</li>
          <li>Tarif Termahal : </li>
          <li>Tarif Termurah :</li>
        </ul>
        <ul class="ml-md-5">
          <li>{{$data->alamat}}</li>
          <li>{{$data->latitude}}, {{$data->longitude}}</li>
          <li>{{$data->tarif_atas}}</li>
          <li>{{$data->tarif_bawah}}</li>
        </ul>
      </div>
      <p>deskripsi hotel</p>
    </div>
  </div>
</div>
  </section>
@endsection
