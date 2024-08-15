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
          <h5 class="card-title"> Anggota</h5>
          <a type="button" class="btn btn-primary" style="margin-bottom:10px" href="{{ route('anggota-tambah') }}"><i class="ri-add-circle-fill"></i> Tambah Data</a>
          <a type="button" class="btn btn-success" style="margin-bottom:10px" href="{{ route('anggota-cetak-kartu') }}"><i class="ri-printer-fill"></i> Cetak Kartu</a>

          <!-- Table with stripped rows -->
          <table id="myTable" class="table table-striped">
            <thead>
              <tr>
                <th>
                  Nama
                </th>
                <th>NIS</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $value)
              <tr>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->nis }}</td>
                <td>
                    <a type="button" class="btn btn-success" href="{{ route('anggota-cetak', $value->id) }}"><i class="ri-printer-fill"></i></a>
                    <a type="button" class="btn btn-warning" href="{{ route('anggota-edit', $value->id) }}"><i class="ri-pencil-ruler-2-line"></i></a>
                    <a type="button" class="btn btn-danger" href="#" onclick= "event.preventDefault();if(confirm('Apakah Anda Yakin?')) { $('form#hapus').attr('action', '{{ route('anggota-delete', $value->id) }}').submit();}"><i class="ri-delete-bin-2-line"></i></a>
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
