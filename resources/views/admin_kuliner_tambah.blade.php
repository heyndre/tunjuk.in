@extends ('template_admin')

@section ('page_title')
Tambah Tempat Kuliner
@endsection

@section ('page_head')
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

      <div class="box-tools pull-right">
        <a href="/kuliner_admin" class="btn btn-box-tool"><i class="fa fa-plus-circle"></i>Batal</a>
        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
      </div>
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah Tempat Kuliner</h3>
      </div>

      <div class="box-body">
        <form role="form" method="POST" action="/kuliner_admin" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="namaHotel">Nama Tempat Kuliner</label>
              <input type="text" class="form-control" name="namaKuliner" id="namaKuliner" placeholder="Nama Tempat Kuliner" required>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Gambar Tempat Kuliner</label>
              <input type="file" name="gambarKuliner" id="gambarKuliner">
              <p class="help-block">Masukkan gambar hotel</p>
            </div>
            <div class="form-group">
              <label for="alamatHotel">Alamat</label>
              <input type="text" class="form-control" name="alamatKuliner" accept="" id="alamatKuliner" placeholder="Alamat Tempat Kuliner" required>
            </div>
            <div class="form-group">
              <label>Kecamatan</label>
              <select name="kecamatanKuliner" id="kecamatanKuliner" class="form-control">
                @foreach ($kec as $key => $kcm)
                <option value="{{$kcm->nama_kecamatan}}">{{$kcm->nama_kecamatan}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="kodePosKuliner">Kode Pos</label>
              <input type="text" class="form-control" name="kodePosKuliner" id="kodePosKuliner" placeholder="Kode Pos Tempat Kuliner" required>
            </div>
            <div class="form-group">
              <label for="kotaKuliner">Kota</label>
              <input type="text" class="form-control" name="kotaKuliner" id="kotaKuliner" placeholder="Jember" value="Jember" disabled>
            </div>
            <div class="form-group">
              <label for="lintangKuliner">Koordinat lintang</label>
              <input type="text" class="form-control" name="lintangKuliner" id="lintangKuliner" placeholder="Latitude" required>
            </div>
            <div class="form-group">
              <label for="bujurKuliner">Koordinat Bujur</label>
              <input type="text" class="form-control" name="bujurKuliner" id="bujurKuliner" placeholder="Longitude" required>
            </div>
            <div class="form-group">
              <label for="tarifAtas">Tarif Atas</label>
              <input type="text" class="form-control" name="tarifAtas" id="tarifAtas" placeholder="Tarif Atas" required>
            </div>
            <div class="form-group">
              <label for="tarifBawah">Tarif Bawah</label>
              <input type="text" class="form-control" name="tarifBawah" id="tarifBawah" placeholder="Tarif Bawah" required>
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" rows="3" name="deskripsiKuliner" id="deskripsiKuliner" placeholder="Deskripsi Tempat Kuliner" required></textarea>
            </div>
          </div>
            <div class="form-group">
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
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
</section>

@endsection
