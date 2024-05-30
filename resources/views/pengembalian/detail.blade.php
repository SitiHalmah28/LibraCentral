@extends ('master')
@section('navigation')
@endsection
@section('content')
<form id="hapus" method="GET" action= "" style="display:none;">
  @csrf 
</form>
<div class="row">
  <div class="col-lg-10">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Detail Peminjaman {{$data->nomor_peminjaman}}</h5>
        <!-- General Form Elements -->
        <form method="POST" action="{{ route('rak-update', $data->id) }}">
          @csrf
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <p>{{ $data->anggota->nama }}</p>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
              <p>{{ $data->anggota->nis }}</p>
            </div>
          </div>
          <div class="row mb-3">
            <table class="table">
            <thead>
              <tr>
                <th>
                  <b>J</b>udul
                </th>
                <th>Penulis</th>
                <th>Denda</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dataDetil as $value)
              <tr>
                <td>{{ $value->buku->judul}}</td>
                <td>{{ $value->buku->penulis}}</td>
                <td>{{ $value->denda}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>

          <div class="row mb-3">
            <div class="col-sm-10">
              <a type="button" class="btn btn-success" href="#" onclick= "event.preventDefault();if(confirm('Apakah Anda Yakin?')) { $('form#hapus').attr('action', '{{ route('pengembalian-update', $data->id) }}').submit();}">Proses Pengembalian</a>
            </div>
          </div>
        </form><!-- End General Form Elements -->
      </div>
    </div>
    </div>
</div>
@endsection