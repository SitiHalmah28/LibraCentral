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
          <h5 class="card-title">Pengunjung</h5>
          <a type="button" class="btn btn-primary" href="{{ route('pengunjung-tambah') }}"><i class="ri-add-circle-fill"></i> Tambah Data</a>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $value)
              <tr>
                <td>{{ $value->tanggal }}</td>
                <td>{{ $value->anggota->nama}}</td>
                <td>
                	<a type="button" class="btn btn-danger" href="#" onclick= "event.preventDefault();if(confirm('Apakah Anda Yakin?')) { $('form#hapus').attr('action', '{{ route('pengunjung-delete', $value->id) }}').submit();}"><i class="ri-delete-bin-2-line"></i></a>
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