<form>
  @csrf
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Barcode</label>
    <div class="col-sm-10">
      <label>{!! DNS1D::getBarcodeHTML($data->kode, 'C128') !!}</label>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <span><b>{{ $data->judul }}</b></span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <span>{{ $data->penulis }}</span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Lokasi</label>
    <div class="col-sm-10">
      <span>{{ $data->rak->nama }}</span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Stok</label>
    <div class="col-sm-10">
      <span>{{ $data->jumlah_tersedia }}</span>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Sinopsis</label>
    <div class="col-sm-10">
      <p>{{ $data->sinopsis }}</p>
    </div>
  </div>
</form><!-- End General Form Elements -->