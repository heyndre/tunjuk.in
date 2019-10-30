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
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
  </div>
  @endif
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Kelola Data Ulasan Kuliner</h3>
    </div>
      <div class="row">
             <div class="col-md-12">
               <div class="box">
                 <div class="box-header with-border">
                   <h3 class="box-title">Ulasan belum diverifikasi</h3>

                   <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                   </div>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body" style="overflow-x:auto">
                   <div class="row">
                     <div class="col-md-12">
                       <table id="example2" class="table table-bordered table-hover">
                         <thead>
                         <tr>
                           <th>Nomor</th>
                           <th>Nama Pengguna</th>
                           <th>Tanggal Kunjungan</th>
                           <th>Tanggal Ulasan</th>
                           <th>Nama Tempat Kuliner</th>
                           <th>Judul</th>
                           <th>Ulasan</th>
                           <th>Verifikasi</th>
                           <th>Opsi</th>
                         </tr>
                         </thead>
                         <tbody>
                           <?php $number=0?>
                           @foreach ($proses as $key => $value)
                           <tr>
                             <th>{{++$number}}</th>
                             <th>{{$value->users['name']}}</th>
                             <th>{{$value->tanggal_visitasi}}</th>
                             <th>{{$value->created_at}}</th>
                             <th>{{$value->kuliner['nama']}}</th>
                             <th>{{$value->judul}}</th>
                             <th>{{$value->detail}}</th>
                             <th>
                               <!-- <a href="">Setuju</a> -->
                               <form id="setuju" method="post" action="{{ route('ulasan_kuliner.update', ['ulasan_kuliner' => $value->id])}}">
                                 @csrf
                                 @method('PUT')
                                 <input type="hidden" name="verify" value="1">
                                 <button type="submit" class="btn btn-info"> Setuju </button>
                               </form>
                               <br>
                             </th>
                             <th>
                               <form id="setuju" method="post" action="{{ route('ulasan_kuliner.update', ['ulasan_kuliner' => $value->id])}}">
                                 @csrf
                                 @method('PUT')
                                 <input type="hidden" name="verify" value="0">
                                 <button type="submit" class="btn btn-warning"> Abaikan </button>
                               </form>
                               <br>
                               <div>
                                 <form id="hapus" method="post" action="{{ route('ulasan_kuliner.destroy', ['ulasan_kuliner' => $value->id])}}" style="">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger" onclick="clicked(event)"> Hapus </button>
                                 </form>
                               </div>
                             </th>
                           @endforeach
                         </tbody>
                         <tfoot>
                           <tr>
                             <th>Nomor</th>
                             <th>Nama Pengguna</th>
                             <th>Tanggal Kunjungan</th>
                             <th>Tanggal Ulasan</th>
                             <th>Nama Tempat Kuliner</th>
                             <th>Judul</th>
                             <th>Ulasan</th>
                             <th>Verifikasi</th>
                             <th>Opsi</th>
                           </tr>
                         </tfoot>
                       </table>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>

           <!-- Sudah Terverifikasi -->
           <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Ulasan sudah disetujui</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body" style="overflow-x:auto">
                        <div class="row">
                          <div class="col-md-12">
                            <table id="example2" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th>Nomor</th>
                                <th>Nama Pengguna</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Tanggal Ulasan</th>
                                <th>Nama Tempat Kuliner</th>
                                <th>Judul</th>
                                <th>Ulasan</th>
                                <th>Opsi</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php $number=0?>
                                @foreach ($setuju as $key => $lolos)
                                <tr>
                                  <th>{{++$number}}</th>
                                  <th>{{$lolos->users['name']}}</th>
                                  <th>{{$lolos->tanggal_visitasi}}</th>
                                  <th>{{$value->created_at}}</th>
                                  <th>{{$lolos->kuliner['nama']}}</th>
                                  <th>{{$lolos->judul}}</th>
                                  <th>{{$lolos->detail}}</th>
                                  <th>
                                    <form id="setuju" method="post" action="{{ route('ulasan_kuliner.update', ['ulasan_kuliner' => $value->id])}}">
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" name="verify" value="1">
                                      <button type="submit" class="btn btn-warning"> Abaikan </button>
                                    </form>
                                    <br>
                                    <div>
                                      <form id="hapus" method="post" action="{{ route('ulasan_kuliner.destroy', ['ulasan_kuliner' => $lolos->id])}}" style="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="clicked(event)"> Hapus </button>
                                      </form>
                                    </div>
                                  </th>
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>Nomor</th>
                                  <th>Nama Pengguna</th>
                                  <th>Tanggal Kunjungan</th>
                                  <th>Tanggal Ulasan</th>
                                  <th>Nama Tempat Kuliner</th>
                                  <th>Judul</th>
                                  <th>Ulasan</th>
                                  <th>Opsi</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

        <!-- Ditolak -->
        <div class="row">
               <div class="col-md-12">
                 <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Ulasan ditolak</h3>

                     <div class="box-tools pull-right">
                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                       </button>
                     </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body" style="overflow-x:auto">
                     <div class="row">
                       <div class="col-md-12">
                         <table id="example2" class="table table-bordered table-hover">
                           <thead>
                           <tr>
                             <th>Nomor</th>
                             <th>Nama Pengguna</th>
                             <th>Tanggal Kunjungan</th>
                             <th>Tanggal Ulasan</th>
                             <th>Nama Tempat Kuliner</th>
                             <th>Judul</th>
                             <th>Ulasan</th>
                             <th>Verifikasi</th>
                             <th>Opsi</th>
                           </tr>
                           </thead>
                           <tbody>
                             <?php $number=0?>
                             @foreach ($tolak as $key => $lolos)
                             <tr>
                               <th>{{++$number}}</th>
                               <th>{{$lolos->users['name']}}</th>
                               <th>{{$lolos->tanggal_visitasi}}</th>
                               <th>{{$value->created_at}}</th>
                               <th>{{$lolos->kuliner['nama']}}</th>
                               <th>{{$lolos->judul}}</th>
                               <th>{{$lolos->detail}}</th>
                               <th>
                                 <form id="setuju" method="post" action="{{ route('ulasan_hotel.update', ['ulasan_hotel' => $value->id])}}">
                                   @csrf
                                   @method('PUT')
                                   <input type="hidden" name="verify" value="1">
                                   <button type="submit" class="btn btn-info"> Setuju </button>
                                 </form>
                               </th>
                               <th>
                                 <div>
                                   <form id="hapus" method="post" action="{{ route('ulasan_kuliner.destroy', ['ulasan_kuliner' => $lolos->id])}}" style="">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger" onclick="clicked(event)"> Hapus </button>
                                   </form>
                                 </div>
                               </th>
                             @endforeach
                           </tbody>
                           <tfoot>
                             <tr>
                               <th>Nomor</th>
                               <th>Nama Pengguna</th>
                               <th>Tanggal Kunjungan</th>
                               <th>Tanggal Ulasan</th>
                               <th>Nama Temapat Kuliner</th>
                               <th>Judul</th>
                               <th>Ulasan</th>
                               <th>Verifikasi</th>
                               <th>Opsi</th>
                             </tr>
                           </tfoot>
                         </table>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
      <!-- /.box-body -->
    </div>

</section>

  <script>
  function clicked(e)
  {
      if(!confirm('Hapus Komentar?'))e.preventDefault();
  }
  </script>
@endsection
