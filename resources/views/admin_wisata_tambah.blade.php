@extends ('template_admin')

@section ('page_title')
Tambah Wisata
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
      <h3 class="box-title">Kelola Data Wisata</h3>

      <div class="box-tools pull-right">
        <a href="/wisata_admin" class="btn btn-box-tool"><i class="fa fa-plus-circle"></i>Batal</a>
        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
      </div>
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Tambah Wisata</h3>
      </div>

      <div class="box-body">
        <form role="form" method="POST" action="/wisata_admin" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="namaWisata">Nama Wisata</label>
              <input type="text" class="form-control" name="namaWisata" id="namaWisata" placeholder="Nama Wisata" required>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Gambar Wisata</label>
              <input type="file" accept="image/*" name="gambarWisata" id="gambarWisata">
              <p class="help-block">Masukkan gambar Wisata</p>
            </div>
            <div class="form-group">
              <label for="alamatWisata">Alamat</label>
              <input type="text" class="form-control" name="alamatWisata" accept="" id="alamatWisata" placeholder="Alamat Wisata" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategoriWisata" id="kategoriWisata" class="form-control">
                @foreach ($kategori as $key => $kate)
                <option value="{{$kate->category_id}}">{{$kate->category_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Kecamatan</label>
              <select name="kecamatanWisata" id="kecamatanWisata" class="form-control">
                @foreach ($kec as $key => $kcm)
                <option value="{{$kcm->nama_kecamatan}}">{{$kcm->nama_kecamatan}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="kodePosWisata">Kode Pos</label>
              <input type="text" class="form-control" name="kodePosWisata" id="kodePosWisata" placeholder="Kode Pos Wisata" required>
            </div>
            <div class="form-group">
              <label for="kotaWisata">Kota</label>
              <input type="text" class="form-control" name="kotaWisata" id="kotaWisata" placeholder="Jember" value="Jember" disabled>
            </div>
            <div class="form-group">
              <label for="lintangWisata">Koordinat lintang</label>
              <input type="text" class="form-control" name="lintangWisata" id="lintangWisata" placeholder="Latitude" required>
            </div>
            <div class="form-group">
              <label for="bujurWisata">Koordinat Bujur</label>
              <input type="text" class="form-control" name="bujurWisata" id="bujurWisata" placeholder="Longitude"  required>
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
              <textarea class="form-control" rows="3" name="deskripsiWisata" id="deskripsiWisata" placeholder="Deskripsi Wisata" required></textarea>
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

</section>

@endsection
