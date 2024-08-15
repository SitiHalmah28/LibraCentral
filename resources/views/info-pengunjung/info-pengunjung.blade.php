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
          <h5 class="card-title">Informasi Pengunjung</h5>
          <!-- Table with stripped rows -->
          <table id="myTable" class="table table-striped">
            <thead>
              <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $value)
                <tr>
                  <td>{{ $value->anggota->nis }}</td>
                  <td>{{ $value->anggota->nama }}</td>
                  <td>{{ \Carbon\Carbon::parse($value->tanggal)->format('d F Y') }}</td>
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
