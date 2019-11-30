@extends ('template_user')

@section('page_title')
    Rekomendasi Liburan
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
            <h3>Direkomendasikan</h3>

        </div>
      </div>
      <div class="row">
            <div class="col-lg-12">
                <h3>Cukup Direkomendasikan</h3>
    
            </div>
    </div>
    </div>
</section>
@endsection