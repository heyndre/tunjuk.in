@extends ('template_user')

@section ('page_title')
Beranda
@endsection

@section ('content')
<div class="hero-wrap js-fullheight" style="background-image: url('{{asset('images/bg_1.jpg')}}')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
      <div class="col-md-9 ftco-animate mb-5 pb-5 text-center text-md-left" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Mulai liburanmu <br>di kota Jember</h1>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Cukup masukkan jenis liburan, durasi, serta biaya yang kamu miliki - <br>
        tanpa bingung mencari tempat tujuan</p>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section justify-content-end ftco-search">
  <div class="container-wrap ml-auto">
    <div class="row no-gutters">
      <div class="col-md-12 nav-link-wrap">
        <div class="nav nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Pantai</a>

          <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Air Terjun</a>

          <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Bukit / Dataran Tinggi</a>

          <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-5" aria-selected="false">Taman</a>

          <a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Bangunan Unik</a>

        </div>
      </div>
      <div class="col-md-12 tab-wrap">

        <div class="tab-content p-4 px-5" id="v-pills-tabContent">

          <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
            <form action="#" class="search-destination">
              <div class="row">
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Tanggal mulai</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-map-marker"></span></div>
                      <input type="text" class="form-control checkin_date" placeholder="Mulai">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Tanggal selesai</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-map-marker"></span></div>
                      <input type="text" class="form-control checkout_date" placeholder="Selesai">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Jumlah pelancong</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Biaya yang disiapkan</label>
                    <div class="slidecontainer">
                        <input type="range" min="100000" max="1000000" value="250000" class="slider" name="biaya" id="myRange" step="50000">
                        <p>Biaya: Rp.<span id="demo"></span></p>
                    </div>
                  </div>
                </div>
                <div class="col-md align-self-end">
                  <div class="form-group">
                    <div class="form-field">
                      <input type="submit" value="Search" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
            <form action="#" class="search-destination">
              <div class="row">
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Check In</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-map-marker"></span></div>
                      <input type="text" class="form-control checkin_date" placeholder="Check In">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Check Out</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-map-marker"></span></div>
                      <input type="text" class="form-control checkout_date" placeholder="From">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Guest</label>
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                          <option value="">4</option>
                          <option value="">5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md align-self-end">
                  <div class="form-group">
                    <div class="form-field">
                      <input type="submit" value="Search" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-effect-tab">
            <form action="#" class="search-destination">
              <div class="row">
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Where</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-map-marker"></span></div>
                      <input type="text" class="form-control" placeholder="Where">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Check In</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-map-marker"></span></div>
                      <input type="text" class="form-control checkin_date" placeholder="Check In">
                    </div>
                  </div>
                </div>
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Check Out</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-map-marker"></span></div>
                      <input type="text" class="form-control checkout_date" placeholder="From">
                    </div>
                  </div>
                </div>
                <div class="col-md align-self-end">
                  <div class="form-group">
                    <div class="form-field">
                      <input type="submit" value="Search" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }
  </script>
</section>
@endsection
