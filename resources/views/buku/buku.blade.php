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
          <h5 class="card-title">Buku</h5>
          <a type="button" class="btn btn-primary" href="{{ route('buku-tambah') }}" style="margin-bottom:10px;"><i class="ri-add-circle-fill"></i> Tambah Data</a>
          
          <!-- Table with stripped rows -->
          <table id="myTable" class="table table-striped">
            <thead>
              <tr>
                <th>
                  Judul
                </th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Rak</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $value)
              <tr>
                <td>{{ $value->judul }}</td>
                <td>{{ $value->penulis }}</td>
                <td>{{ $value->kategoriBuku->nama }}</td>
                <td>{{ $value->rak->nama }}</td>
                <td>
                	<a type="button" class="btn btn-warning" href="{{ route('buku-edit', $value->id) }}"><i class="ri-pencil-ruler-2-line"></i></a>
                	<a type="button" class="btn btn-danger" href="#" onclick= "event.preventDefault();if(confirm('Apakah Anda Yakin?')) { $('form#hapus').attr('action', '{{ route('buku-delete', $value->id) }}').submit();}"><i class="ri-delete-bin-2-line"></i></a>

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
