@if (Route::has('login'))
@auth
  @if(Auth::user()->privileged=='0')
    <div class="comment-form-wrap pt-3">
      <h2 class="mb-5">Beri Ulasan</h2>
      <form role="form" method="POST" action="{{ route('CommentHotel.store', ['CommentHotel' => $data->id])}}" class="p-5 bg-light">
        @csrf
        <div class="form-group">
          <label for="tanggalKunjung">Tanggal Kunjungan</label>
              <input type="date" name="tanggalKunjung" class="form-control" placeholder="Tanggal berkunjung" required>
          </div>
        <div class="form-group">
          <label for="email">Bagaimana pengalaman anda?</label>
          <input type="text" class="form-control" name="ulasan_singkat" id="ulasan_singkat" required>
        </div>
        {{-- <div class="form-group">
          <div class="range-slider">
            <div class="form-group">
              <p>0 tidak puas</p>
              <input class="slider" id="myRange" value="3" min="0" max="5" step="1" type="range" style="width:50%"/>
              <p>5 sangat puas</p>
            </div>
            <div class="form-group">
              <p>Rating :<span id="demo"></span>/10</p>
            </div>
          </div>
        </div> --}}
        <div class="form-group">
          <label>Jelaskan lebih lanjut</label>
          <textarea name="review" id="review" rows="5" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Kirim review" class="btn py-3 px-4 btn-primary" required>
        </div>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="hotel_id" value="{{$data->id}}">
      </form>
    </div>
    {{-- <script>
      var slider = document.getElementById("myRange");
      var output = document.getElementById("demo");
      output.innerHTML = slider.value;
  
      slider.oninput = function() {
        output.innerHTML = this.value;
      }
    </script> --}}
  @elseif(Auth::user()->privileged=='1')
  <h2>Kelola data ulasan hotel<br>dapat dilakukan pada bagian bawah halaman</h2>
  @endif
@else
<h2><a href="/login">Login atau Register</a> untuk memberi ulasan terhadap hotel ini! </h2>
@endauth
@endif
