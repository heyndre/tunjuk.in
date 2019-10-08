@extends ('template_admin')

@section ('page_title')
Menu Utama
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
      <h3 class="box-title">Selamat datang</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button> -->
      </div>
    </div>
    <div class="box-body">
      Gunakan menu di samping untuk menggunakan fitur yang tersedia!
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      TRPL Pariwisata
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

</section>
@endsection
