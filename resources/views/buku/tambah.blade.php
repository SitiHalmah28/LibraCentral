@extends ('master')
@section('navigation')
@endsection
@section('content')
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Form Tambah Data Buku</h5>
        <!-- General Form Elements -->
        <form method="POST" action="{{ route('buku-simpan') }}">
          @csrf
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Barcode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="kode" autofocus required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="judul" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="penulis">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
              <select class="js-example-basic-single js-states form-control" aria-label="Default select example" name="id_kategori">
                <option selected>Pilih Kategori</option>
                @foreach($dataKategori as $value)
                <option value="{{$value->id}}">{{ $value->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
              <select class="js-example-basic-single js-states form-control" aria-label="Default select example" name="id_rak">
                <option selected>Pilih Lokasi</option>
                @foreach($dataRak as $value)
                <option value="{{$value->id}}">{{ $value->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="jumlah_tersedia" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Sinopsis</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="sinopsis" rows="4"></textarea>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form><!-- End General Form Elements -->
        </div>
      </div>
    </div>
</div>
@endsection