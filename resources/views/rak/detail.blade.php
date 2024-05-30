@extends ('master')
@section('navigation')
@endsection
@section('content')
<div class="row">
  <div class="col-lg-10">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Detail Rak {{$data->nama}}</h5>
        <!-- General Form Elements -->
        <form method="POST" action="{{ route('rak-update', $data->id) }}">
          @csrf
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" readonly>
            </div>
            <label for="inputText" class="col-sm-2 col-form-label">Barcode</label>
            <div class="col-sm-3">
              <label>{!! DNS1D::getBarcodeHTML($data->kode1, 'C128') !!}</label>
            </div>
          </div>

          <hr>
          <div class="row mb-3">
            <h5>Daftar Buku</h5>
            <table class="table datatable">
            <thead>
              <tr>
                <th>
                  <b>J</b>udul
                </th>
                <th>Penulis</th>
              </tr>
            </thead>
            <tbody>
              @foreach($daftarBuku as $value)
              <tr>
                <td>{{ $value->judul}}</td>
                <td>{{ $value->penulis}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>

          
        </form><!-- End General Form Elements -->
      </div>
    </div>
    </div>
</div>
@endsection