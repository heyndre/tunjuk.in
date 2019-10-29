@extends ('template_admin')

@section ('page_title')
Lihat Ulasan Kuliner
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
      <h3 class="box-title">Kelola Data Ulasan Kuliner</h3>
    </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Tempat Kuliner</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body" style="overflow-x:auto;">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Nomor</th>
            <th>Tampilan</th>
            <th>Nama Tempat Kuliner</th>
            <th>Ulasan</th>
          </tr>
          </thead>
          <tbody>
            <?php $number=0?>
            @foreach ($data as $key => $value)
            <tr>
              <th>{{++$number}}</th>
              <th>
                <a href="{{ route('Kuliner.show', ['Kuliner' => $value->id])}}">
                <img src="{{asset('image/kuliner/'.$value->image)}}" height="80px">
                <br>
                Lihat Detail Tempat Kuliner</a>
              </th>
              <th>{{$value->nama}}</th>
              <th>
                <a href="{{ route('ulasan_kuliner.show', ['ulasan_kuliner' => $value->id])}}">Lihat</a>
                <br>
              </th>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Nomor</th>
              <th>Tampilan</th>
              <th>Nama Tempat Kuliner</th>
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
