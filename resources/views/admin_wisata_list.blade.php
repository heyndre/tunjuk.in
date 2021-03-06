@extends ('template_admin')

@section ('page_title')
Daftar Wisata
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
      <h3 class="box-title">Kelola Data Tempat Wisata</h3>

      <div class="box-tools pull-right">
        <a href="{{route('wisata_admin.create')}}" class="btn btn-box-tool"><i class="fa fa-plus-circle"></i> Tambah Tempat Wisata</a>
        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
      </div>
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Tempat Wisata</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="overflow-x:auto;">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Nomor</th>
            <th>Tampilan</th>
            <th>Kategori</th>
            <th>Nama Wisata</th>
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Kode Pos</th>
            <th>Kota</th>
            <th>Koordinat</th>
            <th>Tarif atas</th>
            <th>Tarif bawah</th>
            <!-- <th>Jam Buka</th>
            <th>Jam Tutup</th> -->
            <th>Verifikasi</th>
            <th>Opsi</th>
          </tr>
          </thead>
          <tbody>
            <?php $number=0?>
            @foreach ($data as $key => $value)
            <tr>
              <th>{{++$number}}</th>
              <th>
                  <a href="{{ route('Detail_Wisata', ['Detail_Wisata' => $value->id])}}">
                      <img src="{{asset('image/wisata/'.$value->image)}}" height="50px">                      <br>
                      Lihat Detail
                    </a>
              </th>
              <th>{{$value->category->category_name}}</th>
              <th>{{$value->nama}}</th>
              <th>{{$value->alamat}}</th>
              <th>{{$value->kecamatan}}</th>
              <th>{{$value->kode_pos}}</th>
              <th>{{$value->kota}}</th>
              <th>{{$value->latitude}}, {{$value->longitude}}</th>
              <th>{{$value->tarif_atas}}</th>
              <th>{{$value->tarif_bawah}}</th>
              <!-- <th>{{$value->jam_buka}}</th>
              <th>{{$value->jam_tutup}}</th> -->
              <th>@if($value->verified=='1') <?php echo"Terverifikasi"?>
                  @elseif($value->verified=='0') <?php echo "Belum Diverifikasi"?>
                  @endif
              </th>
              <th>
                <a href="{{ route('wisata_admin.edit', ['wisata_admin' => $value->id])}}">Ubah / Hapus</a>
                <!-- <br> -->
                <!-- <a href="#" onclick="event.preventDefault(); if(confirm('Konfirmasi Penghapusan Data')) {$('form#hapus').attr('action', '{{ route('hotel_admin.destroy', ['hotel_admin' => $value->id])}}').submit(); location.reload();}">Hapus</a> -->
              </th>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Nomor</th>
              <th>Tampilan</th>
              <th>Kategori</th>
              <th>Nama Hotel</th>
              <th>Alamat</th>
              <th>Kecamatan</th>
              <th>Kode Pos</th>
              <th>Kota</th>
              <th>Koordinat</th>
              <th>Tarif atas</th>
              <th>Tarif bawah</th>
              <th>Verifikasi</th>
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
