@extends ('template_admin')

@section ('page_title')
Lihat Ulasan Hotel
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
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Hotel</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="overflow-x:auto;">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Nomor</th>
            <th>Tampilan</th>
            <th>Nama Hotel</th>
            <th>Ulasan</th>
          </tr>
          </thead>
          <tbody>
            <?php $number=0?>
            @foreach ($data as $key => $value)
            <tr>
              <th>{{++$number}}</th>
              <th>
                <a href="{{ route('Hotel.show', ['Hotel' => $value->id])}}">
                <img src="{{asset('image/hotel/'.$value->image)}}" height="80px">
                <br>
                Lihat Detail Hotel</a>
              </th>
              <th>{{$value->nama}}</th>
              <th>
                <a href="{{ route('ulasan_hotel.show', ['ulasan_hotel' => $value->id])}}">Lihat</a>
                <br>
                <!-- <a href="{{ route('Hotel.show', ['Hotel' => $value->id])}}">Lihat Detail</a> -->
                <!-- <br> -->
                <!-- <a href="#" onclick="event.preventDefault(); if(confirm('Konfirmasi Penghapusan Data')) {$('form#hapus').attr('action', '{{ route('hotel_admin.destroy', ['hotel_admin' => $value->id])}}').submit(); location.reload();}">Hapus</a> -->
              </th>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Nomor</th>
              <th>Tampilan</th>
              <th>Nama Hotel</th>
              <th>Ulasan</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
@endsection
