@if (Route::has('login'))
@auth
<div class="comment-form-wrap pt-3">
  <h2 class="mb-5">Beri Review</h2>
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
@else
<h2><a href="/login">Login atau Register</a> untuk memberi review terhadap hotel ini! </h2>
@endauth
@endif
