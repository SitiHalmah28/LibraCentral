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
          <h5 class="card-title">Rak</h5>
          <a type="button" class="btn btn-primary" href="{{ route('rak-tambah') }}"><i class="ri-add-circle-fill"></i> Tambah Data</a>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>
                  Nama
                </th>
                <th>Kode</th>
                <th>Barcode</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $value)
              <tr>
                <td>{{ $value->nama}}</td>
                <td>{{ $value->kode1}}</td>
                <td>{!! DNS1D::getBarcodeHTML($value->kode1, 'C128') !!}</td>
                <td>
                	<!--a type="button" class="btn btn-secondary"><i class="ri-printer-line"></i></a-->
                	<a type="button" class="btn btn-info" href="{{ route('rak-detail', $value->id) }}"><i class="ri-eye-off-line"></i></a>
                	<a type="button" class="btn btn-warning" href="{{ route('rak-edit', $value->id) }}"><i class="ri-pencil-ruler-2-line"></i></a>
                	<a type="button" class="btn btn-danger" href="#" onclick= "event.preventDefault();if(confirm('Apakah Anda Yakin?')) { $('form#hapus').attr('action', '{{ route('rak-delete', $value->id) }}').submit();}"><i class="ri-delete-bin-2-line"></i></a>

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