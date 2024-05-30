@extends ('master')
@section('navigation')
@endsection
@section('content')
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="row">
  <!-- Left side columns -->
  <div class="col-lg-8">
    <div class="row">
      <!-- Recent Sales -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Daftar Buku<span></span></h5>
            <a type="button" class="btn btn-secondary" href="#" onclick="reset('{{csrf_token()}}')">Reset Data</a>
            <br/>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Penulis</th>
                  <th scope="col">Lokasi</th>
                </tr>
              </thead>
              <tbody id="table-data">
                
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- End Recent Sales -->
    </div>
  </div><!-- End Left side columns -->

  <!-- Right side columns -->
  <div class="col-lg-4">
    <!-- Recent Activity -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Rak <span></span></h5>
        <div class="activity">
          <div class="row mb-3">
            <div class="col-sm-12">
              <select class="js-example-basic-single js-states form-control" id="id_rak" aria-label="Default select example" name="id_kategori">
                <option selected>Pilih Rak</option>
                @foreach($dataRak as $value)
                <option value="{{$value->id}}">{{ $value->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Scanner <span></span></h5>
        <div class="activity" id="panel-scan">
          @include('relokasi.panel-scan')  
        </div>
        <a type="button" class="btn btn-primary" href="#" onclick="prosesRelokasi('{{csrf_token()}}')">Proses Relokasi</a>
      </div>
    </div>
  </div>
</div>
<script>
  function reset(token){
    var act = 'relokasi/reset';
    $.get(act, {
          _token: token,
      },
     function (data) {
       $('#table-data').html(data);
    });
    refreshScanRelokasi();
  }

  function prosesRelokasi(token){
    var act = 'relokasi/simpan';
    var rak = $('#id_rak').val();
    $.post(act, {
          _token: token,
          rak: rak,
      },
     function (data) {
      location.reload();
       //$('#table-data').html(data);
    });
  }

</script>
@endsection