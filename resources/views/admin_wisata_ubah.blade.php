@extends ('template_admin')

@section ('page_title')
Ubah Tempat Wisata
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
                <input type="file" name="gambarWisata" id="gambarWisata">
              <p class="help-block">Ubah gambar Wisata</p>
            </div>
          </div>
            <div class="form-group">
              <label for="namaWisata">Nama Wisata</label>
              <input type="text" class="form-control" name="namaWisata" id="namaWisata" placeholder="Nama Wisata" value="{{ $data->nama}}">
            </div>
            <div class="form-group">
              <label for="alamatWisata">Alamat</label>
              <input type="text" class="form-control" name="alamatWisata" accept=""id="alamatWisata" placeholder="Alamat Wisata" value="{{ $data->alamat}}">
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategoriWisata" id="kategoriWisata" class="form-control" value="{{ $data->kecamatan}}">
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
              <input type="text" class="form-control" name="kodePosWisata" id="kodePosWisata" placeholder="Kode Pos Wisata" value="{{ $data->kode_pos}}">
            </div>
            <div class="form-group">
              <label for="kotaWisata">Kota</label>
              <input type="text" class="form-control" name="kotaWisata" id="kotaWisata" placeholder="Jember" value="{{ $data->kota}}" disabled>
            </div>
            <div class="form-group">
              <label for="lintangWisata">Koordinat lintang</label>
              <input type="text" class="form-control" name="lintangWisata" id="lintangWisata" placeholder="Latitude" value="{{ $data->latitude}}">
            </div>
            <div class="form-group">
              <label for="bujurWisata">Koordinat Bujur</label>
              <input type="text" class="form-control" name="bujurWisata" id="bujurWisata" placeholder="Longitude" value="{{ $data->longitude}}">
            </div>
            <div class="form-group">
              <label for="tarifAtas">Tarif Atas</label>
              <input type="text" class="form-control" name="tarifAtas" id="tarifAtas" placeholder="Tarif Atas" value="{{ $data->tarif_atas}}">
            </div>
            <div class="form-group">
              <label for="tarifBawah">Tarif Bawah</label>
              <input type="text" class="form-control" name="tarifBawah" id="tarifBawah" placeholder="Tarif Bawah" value="{{ $data->tarif_bawah}}">
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="form-control" rows="3" name="deskripsiWisata" id="deskripsiWisata" placeholder="Deskripsi Wisata">{{ $data->deskripsi}}</textarea>
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
            <a href="/Wisata_admin">
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
function clicked(e)
{
    if(!confirm('KONFIRMASI PENGHAPUSAN DATA'))e.preventDefault();
}
</script>
@endsection
