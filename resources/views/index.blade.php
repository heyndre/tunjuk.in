
<? php $priv = '' ?>
@extends ('template_user')

@section ('page_title')
Beranda - Tunjuk.input
@endsection

@section ('content')
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
      <div class="col-md-9 ftco-animate mb-5 pb-5 text-center text-md-left" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Discover <br>A new Place</h1>
        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Find great places to stay, eat, shop, or visit from local experts</p>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section justify-content-end ftco-search">
  <div class="container-wrap ml-auto">
    <div class="row no-gutters">
      <div class="col-md-12 nav-link-wrap">
        <div class="nav nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Flight</a>

          <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a>

          <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Car Rent</a>
        </div>
      </div>
      <div class="col-md-12 tab-wrap">

        <div class="tab-content p-4 px-5" id="v-pills-tabContent">

          <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
            <form action="#" class="search-destination">
              <div class="row">
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">From</label>
                    <div class="form-field">
                      <div class="icon"><span class="icon-my_location"></span></div>
                      <input type="text" class="form-control" placeholder="From">
                    </div>
                  </div>
                </div>
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
                <div class="col-md align-items-end">
                  <div class="form-group">
                    <label for="#">Travelers</label>
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
</section>
@endsection
