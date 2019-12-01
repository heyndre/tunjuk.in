@extends ('template_admin')

@section ('page_title')
Ubah Tempat Wisata
@endsection

@section ('Username')
<?php $nama = Auth::user()->name?>
<?php echo $nama?>
@endsection

@section('page_head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
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
      <h3 class="box-title">Kelola Data Wisata</h3>

      <!-- <div class="box-tools pull-right">
        <a href="/Wisata_admin" class="btn btn-box-tool"><i class="fa fa-plus-cross"></i>Batal</a>
      </div> -->
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ubah Data Tempat Wisata {{$data->nama}}</h3>
      </div>

      <div class="box-body">
        <form role="form" method="POST" action="{{ route('wisata_admin.update', ['wisata_admin' => $data->id])}}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="box-body">
            <label for="exampleInputFile">Gambar Wisata</label>
            <div class="form-group">
                <img src="{{asset('image/wisata/'.$data->image)}}" height="300px">
                <input type="file" accept="image/*" name="gambarWisata" id="gambarWisata">
              <p class="help-block">Ubah gambar Wisata</p>
            </div>
          </div>
            <div class="form-group">
              <label for="namaWisata">Nama Wisata</label>
              <input type="text" class="form-control" name="namaWisata" id="namaWisata" placeholder="Nama Wisata" value="{{ $data->nama}}" required>
            </div>
            <div class="form-group">
              <label for="alamatWisata">Alamat</label>
              <input type="text" class="form-control" name="alamatWisata" accept=""id="alamatWisata" placeholder="Alamat Wisata" value="{{ $data->alamat}}" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategoriWisata" id="kategoriWisata" class="form-control" value="{{ $data->kecamatan}}" required>
                @foreach ($kategori as $key => $kate)
                @if ($kate->category_id == $data->category_id)
                <option value="{{$kate->category_id}}" selected>{{$kate->category_name}}</option>
                @else
                <option value="{{$kate->category_id}}">{{$kate->category_name}}</option>
                @endif
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label>Kecamatan</label>
              <select name="kecamatanWisata" id="kecamatanWisata" class="form-control" value="{{ $data->kecamatan}}">
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
              <label for="kodePosWisata">Kode Pos</label>
              <input type="text" class="form-control" name="kodePosWisata" id="kodePosWisata" placeholder="Kode Pos Wisata" value="{{ $data->kode_pos}}" required>
            </div>
            <div class="form-group">
              <label for="kotaWisata">Kota</label>
              <input type="text" class="form-control" name="kotaWisata" id="kotaWisata" placeholder="Jember" value="{{ $data->kota}}" disabled>
            </div>
            {{-- <div class="form-group">
              <label for="lintangWisata">Koordinat lintang</label>
              <input type="text" class="form-control" name="lintangWisata" id="lintangWisata" placeholder="Latitude" value="{{ $data->latitude}}" required>
            </div>
            <div class="form-group">
              <label for="bujurWisata">Koordinat Bujur</label>
              <input type="text" class="form-control" name="bujurWisata" id="bujurWisata" placeholder="Longitude" value="{{ $data->longitude}}" required>
            </div> --}}
            <div class="form-group">
                <label for="lintangWisata">Koordinat lintang</label>
                <input class="form-control" id="lintangWisata" placeholder="Latitude" name="lintangWisata" value="{{ $data->latitude}}" required/>
                {{-- <input type="text" class="form-control" name="lintangWisata" id="lintangWisata" placeholder="Latitude" value="{{ $data->latitude}}" required> --}}
              </div>
              <div class="form-group">
                <label for="bujurWisata">Koordinat Bujur</label>
                <input class="form-control" id="bujurWisata" placeholder="Longitude" name="bujurWisata" value="{{ $data->longitude}}" required/>
                {{-- <input type="text" class="form-control" name="bujurWisata" id="bujurWisata" placeholder="Longitude" value="{{ $data->longitude}}" required> --}}
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
              <textarea class="form-control" rows="3" name="deskripsiWisata" id="deskripsiWisata" placeholder="Deskripsi Wisata" required>{{ $data->deskripsi}}</textarea>
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
            <a href={{route('wisata_admin.index')}}">
          <input type="button" class="btn btn-secondary" value="Batal">
        </a>
          </label>
        </div>
        <div>
          <form id="hapus" method="post" action="{{ route('wisata_admin.destroy', ['Wisata' => $data->id])}}" style="">
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
      $("#lintangWisata").val(position.lat);
      $("#bujurWisata").val(position.lng).keyup();
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
