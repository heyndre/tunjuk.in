@extends ('template_admin')

@section ('page_title')
Ubah Tempat Kuliner
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
      <h3 class="box-title">Kelola Data Tempat Kuliner</h3>

      <!-- <div class="box-tools pull-right">
        <a href="/hotel_admin" class="btn btn-box-tool"><i class="fa fa-plus-cross"></i>Batal</a>
      </div> -->
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ubah Data Kuliner {{$data->nama}}</h3>
      </div>

      <div class="box-body">
        <form role="form" method="POST" action="{{ route('kuliner_admin.update', ['kuliner_admin' => $data->id])}}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="box-body">
            <label for="exampleInputFile">Gambar Kuliner</label>
            <div class="form-group">
                <img src="{{asset('image/kuliner/'.$data->image)}}" height="300px">
                <input type="file" accept="image/*" name="gambarKuliner" id="gambarKuliner">
              <p class="help-block">Ubah gambar tempat kuliner</p>
            </div>
          </div>
            <div class="form-group">
              <label for="namaHotel">Nama Kuliner</label>
              <input type="text" class="form-control" name="namaKuliner" id="namaKuliner" placeholder="Nama Tempat Kuliner" value="{{ $data->nama}}" required>
            </div>
            <div class="form-group">
              <label for="alamatHotel">Alamat</label>
              <input type="text" class="form-control" name="alamatKuliner" accept="" id="alamatKuliner" placeholder="Alamat Kuliner" value="{{ $data->alamat}}" required>
            </div>
            <!-- <div class="form-group">
              <label for="kecamatanHotel">Kecamatan</label>
              <input type="text" class="form-control" name="kecamatanKuliner" id="kecamatanKuliner" placeholder="Kecamatan Hotel" value="{{ $data->kecamatan}}">
            </div> -->
            <div class="form-group">
              <label>Kecamatan</label>
              <select name="kecamatanKuliner" id="kecamatanKuliner" class="form-control" value="{{ $data->kecamatan}}" required>
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
              <input type="text" class="form-control" name="kodePosKuliner" id="kodePosKuliner" placeholder="Kode Pos Hotel" value="{{ $data->kode_pos}}" required>
            </div>
            <div class="form-group">
              <label for="kotaHotel">Kota</label>
              <input type="text" class="form-control" name="kotaKuliner" id="kotaKuliner" placeholder="Jember" value="{{ $data->kota}}" disabled>
            </div>
            <div class="form-group">
              <label for="lintangHotel">Koordinat lintang</label>
              <input type="text" class="form-control" name="lintangKuliner" id="lintangKuliner" placeholder="Latitude" value="{{ $data->latitude}}" required>
            </div>
            <div class="form-group">
              <label for="bujurHotel">Koordinat Bujur</label>
              <input type="text" class="form-control" name="bujurKuliner" id="bujurKuliner" placeholder="Longitude" value="{{ $data->longitude}}" required>
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
              <textarea class="form-control" rows="3" name="deskripsiKuliner" id="deskripsiKuliner" placeholder="Deskripsi Hotel" required>{{ $data->deskripsi}}</textarea>
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
function clicked(e)
{
    if(!confirm('KONFIRMASI PENGHAPUSAN DATA'))e.preventDefault();
}
</script>
@endsection
