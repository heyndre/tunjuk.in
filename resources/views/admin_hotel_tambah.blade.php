@extends ('template_admin')

@section ('page_title')
Tambah Hotel
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
      <h3 class="box-title">Kelola Data Hotel</h3>

      <div class="box-tools pull-right">
        <a href="/hotel_admin" class="btn btn-box-tool"><i class="fa fa-plus-circle"></i>Batal</a>
        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
      </div>
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah Hotel</h3>
      </div>

      <div class="box-body">
        <form role="form" method="POST" action="/hotel_admin" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="namaHotel">Nama Hotel</label>
              <input type="text" class="form-control" name="namaHotel" id="namaHotel" placeholder="Nama Hotel" required>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Gambar Hotel</label>
              <input type="file" name="gambarHotel" id="gambarHotel">
              <p class="help-block">Masukkan gambar hotel</p>
            </div>
            <div class="form-group">
                <label>Rating Hotel</label>
                <select name="ratingHotel" id="ratingHotel" class="form-control">
                    @for ($i = 1; $i <= 5; $i++)
                      <option value="{{ $i }}">{{ $i }} / 5</option>
                    @endfor
                </select>
              </div>
            <div class="form-group">
              <label for="alamatHotel">Alamat</label>
              <input type="text" class="form-control" name="alamatHotel" accept="" id="alamatHotel" placeholder="Alamat Hotel" required>
            </div>
            <div class="form-group">
              <label>Kecamatan</label>
              <select name="kecamatanHotel" id="kecamatanHotel" class="form-control">
                @foreach ($kec as $key => $kcm)
                <option value="{{$kcm->nama_kecamatan}}">{{$kcm->nama_kecamatan}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="kodePosHotel">Kode Pos</label>
              <input type="text" class="form-control" name="kodePosHotel" id="kodePosHotel" placeholder="Kode Pos Hotel" required>
            </div>
            <div class="form-group">
              <label for="kotaHotel">Kota</label>
              <input type="text" class="form-control" name="kotaHotel" id="kotaHotel" placeholder="Jember" value="Jember" disabled>
            </div>
            <div class="form-group">
              <label for="lintangHotel">Koordinat lintang</label>
              <input type="text" class="form-control" name="lintangHotel" id="lintangHotel" placeholder="Latitude" required>
            </div>
            <div class="form-group">
              <label for="bujurHotel">Koordinat Bujur</label>
              <input type="text" class="form-control" name="bujurHotel" id="bujurHotel" placeholder="Longitude" required>
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
              <textarea class="form-control" rows="3" name="deskripsiHotel" id="deskripsiHotel" placeholder="Deskripsi Hotel" required></textarea>
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
        <!-- <form>
          <div class="form-group">
            <label for="exampleInputFile">Gambar Hotel</label>
            <input type="file" id="exampleInputFile">

            <p class="help-block">Masukkan gambar hotel</p>
          </div>
        </form> -->
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>

@endsection
