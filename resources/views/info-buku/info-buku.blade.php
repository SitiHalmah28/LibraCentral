@extends ('master')
@section('navigation')
@endsection
@section('content')
<form id="hapus" method="GET" action= "" style="display:none;">
  @csrf 
</form>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Informasi Buku</h5>
          <a type="button" class="btn btn-primary" style="margin-bottom:10px;" href="{{ route('info-buku-cetak') }}" target="_blank"><i class="bi bi-printer-fill"></i> Cetak</a>
          <!-- Table with stripped rows -->
          <table id="myTable" class="table table-striped">
            <thead>
              <tr>
                <th>Judul Buku</th>
                <th>Stok Awal</th>
                <th>Total Peminjaman</th>
                <th>Stok Akhir</th>
                <th>Peminjam</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $value)
                @if($value['stok'] != $value['jumlah_sebenarnya'])
                <tr>
                  <td>{{ $value['judul'] }}</td>
                  <td>{{ $value['jumlah_sebenarnya'] }}</td>
                  <td>{{ $value['jumlah_sebenarnya'] - $value['stok'] }}</td>
                  <td>{{ $value['stok'] }}</td>
                  <td>{{ $value['nama_peminjam'] }}</td>
                </tr>
                @endif
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
</div>
@endsection
