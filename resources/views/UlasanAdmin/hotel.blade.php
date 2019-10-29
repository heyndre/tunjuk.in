@extends ('template_admin')

@section ('page_title')
Ubah Status Ulasan Hotel
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
      <h3 class="box-title">Kelola Data Ulasan Hotel</h3>

      <!-- <div class="box-tools pull-right">
        <a href="/hotel_admin" class="btn btn-box-tool"><i class="fa fa-plus-cross"></i>Batal</a>
      </div> -->
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ubah data ulasan hotel</h3>
      </div>

      <div class="box-body">
        <form role="form" method="POST" action="{{ route('ulasan_hotel.update', ['ulasan_hotel' => $data->id])}}">
          @method('PUT')
          @csrf
            <div class="form-group">
              <label for="namaHotel">Nama Pengguna</label>
              <input type="text" class="form-control" name="namaHotel" id="namaHotel" value="{{ $data->users['name']}}" readonly>
            </div>
            <div class="form-group">
              <label for="namaHotel">Nama Hotel</label>
              <input type="text" class="form-control" name="namaHotel" id="namaHotel" value="{{ $data->hotel['nama']}}" readonly>
            </div>
            <div class="form-group">
              <label for="alamatHotel">Judul Ulasan</label>
              <input type="text" class="form-control" name="alamatHotel" accept=""id="alamatHotel" placeholder="Alamat Hotel" value="{{ $data->judul}}" readonly>
            </div>
            <div class="form-group">
              <label for="kecamatanHotel">Detail Ulasan</label>
              <input type="text" class="form-control" name="kecamatanHotel" id="kecamatanHotel" placeholder="Kecamatan Hotel" value="{{ $data->detail}}" readonly>
            </div>
            <div class="form-group">
              @if($data->approved=='1')
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
            @elseif($data->approved=='0')
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
            <a href="{{ url()->previous() }}">
              <input type="button" class="btn btn-secondary" value="Batal">
            </a>
          </label>
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
