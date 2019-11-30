@extends ('template_admin')

@section ('page_title')
Ubah Hotel
@endsection

@section('page_head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
@endsection
    
@section ('Username')
<?php $nama = Auth::user()->name?>
<?php echo $nama?>
@endsection

@section ('breadcrumb')
<!-- <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Examples</a></li>
  <li class="active">Blank page</li>
</ol> -->
@endsection

@section('content')
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Kelola Data Hotel</h3>

      <!-- <div class="box-tools pull-right">
        <a href="/hotel_admin" class="btn btn-box-tool"><i class="fa fa-plus-cross"></i>Batal</a>
      </div> -->
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ubah Data Hotel {{$data->nama}}</h3>
      </div>

      <div class="box-body">
        <form role="form" method="POST" action="{{ route('hotel_admin.update', ['hotel_admin' => $data->id])}}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="box-body">
            <label for="exampleInputFile">Gambar Hotel</label>
            <div class="form-group">
                <img src="{{asset('image/hotel/'.$data->image)}}" height="300px">
                <input type="file" name="gambarHotel" id="gambarHotel">
              <p class="help-block">Ubah gambar hotel</p>
            </div>
          </div>
            <div class="form-group">
              <label for="namaHotel">Nama Hotel</label>
              <input type="text" class="form-control" name="namaHotel" id="namaHotel" placeholder="Nama Hotel" value="{{ $data->nama}}" required>
            </div>
            <div class="form-group">
                <label>Rating Hotel</label>
                <select name="ratingHotel" id="ratingHotel" class="form-control">
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i == $data->rating)
                      <option value="{{ $i }}" selected>{{ $i }} / 5</option>   
                      @else 
                      <option value="{{ $i }}">{{ $i }} / 5</option>
                      @endif
                    @endfor
                </select>
              </div>
            <div class="form-group">
              <label for="alamatHotel">Alamat</label>
              <input type="text" class="form-control" name="alamatHotel" accept=""id="alamatHotel" placeholder="Alamat Hotel" value="{{ $data->alamat}}" required>
            </div>
            <!-- <div class="form-group">
              <label for="kecamatanHotel">Kecamatan</label>
              <input type="text" class="form-control" name="kecamatanHotel" id="kecamatanHotel" placeholder="Kecamatan Hotel" value="{{ $data->kecamatan}}">
            </div> -->
            <div class="form-group">
              <label>Kecamatan</label>
              <select name="kecamatanHotel" id="kecamatanHotel" class="form-control" value="{{ $data->kecamatan}}" required>
                @foreach ($kec as $key => $kcm)
                @if ($kcm->nama_kecamatan == $data->kecamatan)
                <option value="{{$kcm->nama_kecamatan}}" selected>{{$kcm->nama_kecamatan}}</option>
                @else
                <option value="{{$kcm->nama_kecamatan}}">{{$kcm->nama_kecamatan}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="kodePosHotel">Kode Pos</label>
              <input type="text" class="form-control" name="kodePosHotel" id="kodePosHotel" placeholder="Kode Pos Hotel" value="{{ $data->kode_pos}}" required>
            </div>
            <div class="form-group">
              <label for="kotaHotel">Kota</label>
              <input type="text" class="form-control" name="kotaHotel" id="kotaHotel" placeholder="Jember" value="{{ $data->kota}}" disabled>
            </div>
            <div class="form-group">
              <label for="lintangHotel">Koordinat lintang</label>
              <input class="form-control" id="lintangHotel" placeholder="Latitude" name="lintangHotel" value="{{ $data->latitude}}" required/>
              {{-- <input type="text" class="form-control" name="lintangHotel" id="lintangHotel" placeholder="Latitude" value="{{ $data->latitude}}" required> --}}
            </div>
            <div class="form-group">
              <label for="bujurHotel">Koordinat Bujur</label>
              <input class="form-control" id="bujurHotel" placeholder="Longitude" name="bujurHotel" value="{{ $data->longitude}}" required/>
              {{-- <input type="text" class="form-control" name="bujurHotel" id="bujurHotel" placeholder="Longitude" value="{{ $data->longitude}}" required> --}}
            </div>
            <div class="form-group" id="mapid" style="width: 600px; height: 400px;">

            </div>
            <div class="form-group">
              <label for="tarifAtas">Tarif Atas</label>
              <input type="text" class="form-control" name="tarifAtas" id="tarifAtas" placeholder="Tarif Atas" value="{{ $data->tarif_atas}}" required>
            </div>
            <div class="form-group">
              <label for="tarifBawah">Tarif Bawah</label>
              <input type="text" class="form-control" name="tarifBawah" id="tarifBawah" placeholder="Tarif Bawah" value="{{ $data->tarif_bawah}}" required>
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" rows="3" name="deskripsiHotel" id="deskripsiHotel" placeholder="Deskripsi Hotel" required>{{ $data->deskripsi}}</textarea>
            </div>
          <div class="form-group">
            @if($data->verified=='1')
            <div class="radio">
              <label>
                <input type="radio" name="verify" id="optionsRadios1" value="0" >
                Belum Diverifikasi
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="verify" id="optionsRadios2" value="1" checked>
                Terverifikasi
              </label>
          </div>
          @elseif($data->verified=='0')
          <div class="radio">
            <label>
              <input type="radio" name="verify" id="optionsRadios1" value="0" checked>
              Belum Diverifikasi
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="verify" id="optionsRadios2" value="1">
              Terverifikasi
            </label>
        </div>
        @endif
        </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
        <div class="box-footer">
          <label>
            <a href="/hotel_admin">
          <input type="button" class="btn btn-secondary" value="Batal">
        </a>
          </label>
        </div>
        <div>
          <form id="hapus" method="post" action="{{ route('hotel_admin.destroy', ['hotel' => $data->id])}}" style="">
            @csrf
            @method('DELETE')
            <div class="box-footer">
            <button type="submit" class="btn btn-warning" onclick="clicked(event)"> HAPUS </button>
          </div>
          </form>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<script>
  
  // use below if you want to specify the path for leaflet's images
  //L.Icon.Default.imagePath = '@Url.Content("~/Content/img/leaflet")';
  var locate = [{{$data->latitude}}, {{$data->longitude}}];
  var curLocation = locate;
  // use below if you have a model
  // var curLocation = [@Model.Location.Latitude, @Model.Location.Longitude];

  if (curLocation[0] == 0 && curLocation[1] == 0) {
    curLocation = [-8.2635, 113.6538];
  }

  var map = L.map('mapid').setView(locate, 20);

  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  map.attributionControl.setPrefix(false);

  var marker = L.marker(curLocation, {
    draggable: 'true'
  });
 
  marker.on('dragend', function(event) {
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      draggable: 'true'
    }).bindPopup(position).update();
    $("#lintangHotel").val(position.lat);
    $("#bujurHotel").val(position.lng).keyup();
  });

  map.addLayer(marker);
</script>
<script>
function clicked(e)
{
    if(!confirm('KONFIRMASI PENGHAPUSAN DATA'))e.preventDefault();
}
</script>
@endsection
