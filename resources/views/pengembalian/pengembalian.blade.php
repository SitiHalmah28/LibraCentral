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
          <h5 class="card-title">Pengembalian</h5>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>
                  Nomor Peminjaman
                </th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jumlah Buku</th>
                <th>Denda</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $value)
              <tr>
                <td>{{ $value->nomor_peminjaman }}</td>
                <td>{{ $value->anggota->nama }}</td>
                <td>{{ date("d-m-Y", strtotime($value->tanggal_peminjaman)) }}</td>
                <td>{{ $value->total_buku }}</td>
                <td>{{ $value->total_denda }}</td>
                
                <td>
                	<a type="button" class="btn btn-secondary" href="{{ route('pengembalian-detail', $value->id) }}"><i class="ri-eye-off-line"></i></a>
                	<a type="button" class="btn btn-success" href="#" onclick= "event.preventDefault();if(confirm('Apakah Anda Yakin?')) { $('form#hapus').attr('action', '{{ route('pengembalian-update', $value->id) }}').submit();}"><i class="ri-chat-check-fill"></i></a>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
</div>
@endsection