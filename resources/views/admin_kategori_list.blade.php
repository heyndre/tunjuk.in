@extends ('template_admin')

@section ('page_title')
Daftar Tempat Kuliner
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

      <div class="box-tools pull-right">
        <a href="/kategori_admin/create" class="btn btn-box-tool"><i class="fa fa-plus-circle"></i> Tambah Kategori</a>
        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
      </div>
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Kategori</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="overflow-x:auto;">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Kategori</th>
            <th>Opsi</th>
          </tr>
          </thead>
          <tbody>
            <?php $number=0?>
            @foreach ($data as $key => $value)
            <tr>
              <th>{{++$number}}</th>
              <th>{{$value->category_name}}</th>
              <th>
                <a href="{{ route('kategori_admin.edit', ['kategori_admin' => $value->category_id])}}">Ubah / Hapus</a>
                <!-- <br> -->
                <!-- <a href="#" onclick="event.preventDefault(); if(confirm('Konfirmasi Penghapusan Data')) {$('form#hapus').attr('action', '{{ route('hotel_admin.destroy', ['hotel_admin' => $value->id])}}').submit(); location.reload();}">Hapus</a> -->
              </th>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Nomor</th>
              <th>Nama Kategori</th>
              <th>Opsi</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
@endsection
