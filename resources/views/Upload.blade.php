@extends ('template_admin')

@section ('page_title')

@endsection

@section ('content')
<section class="content">
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

  <div class="form-group">
    <label for="exampleInputFile">Gambar Hotel</label>
    <input type="file" id="exampleInputFile">

    <p class="help-block">Masukkan gambar hotel</p>
  </div>
</div>
</div>
</div>
</section>
@endsection
