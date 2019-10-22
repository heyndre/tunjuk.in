@extends ('template_admin')

@section ('page_title')
Ubah Kategori
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
      <h3 class="box-title">Kelola Data Kategori</h3>

      <!-- <div class="box-tools pull-right">
        <a href="/hotel_admin" class="btn btn-box-tool"><i class="fa fa-plus-cross"></i>Batal</a>
      </div> -->
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Ubah Data Kategori {{$data->nama}}</h3>
      </div>

      <div class="box-body">
        <form role="form" method="POST" action="{{ route('kategori_admin.update', ['kategori_admin' => $data->category_id])}}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <div class="form-group">
              <label for="namaHotel">Nama Kategori</label>
              <input type="text" class="form-control" name="namaKategori" id="namaKategori" placeholder="Nama Kategori" value="{{ $data->category_name}}" required>
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
