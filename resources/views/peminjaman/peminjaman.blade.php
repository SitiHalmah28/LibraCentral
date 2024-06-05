@extends ('master')
@section('navigation')
@endsection
@section('content')
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="row">
  <!-- Left side columns -->
  <div class="col-lg-8">
    <div class="row">

      <!-- Sales Card -->
      <div class="col-xxl-12 col-md-6">
        <div class="card info-card sales-card">

          <div class="card-body">
            <h5 class="card-title">Cari Buku<span></span></h5>
            <div id="panel-search">
              @include('peminjaman.panel-search')
            </div>
          </div>
        </div>
      </div><!-- End Sales Card -->

      <!-- Recent Sales -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Detil Peminjaman<span></span></h5>
            <a type="button" class="btn btn-secondary" href="#" onclick="reset('{{csrf_token()}}')">Reset Data</a>
            <br/>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Penulis</th>
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
    @if(Auth::user() != null && Auth::user()->role != 'Anggota')
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Peminjam <span></span></h5>
        <div class="activity">
          <div class="row mb-3">
            <div class="col-sm-12">
              <select class="js-example-basic-single js-states form-control" id="id_anggota" aria-label="Default select example" name="id_kategori">
                <option selected>Pilih Anggota</option>
                @foreach($dataAnggota as $value)
                <option value="{{$value->id}}">{{ $value->nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if(Auth::user() == null)
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Scanner Kartu Anggota<span></span></h5>
        <div class="activity" id="panel-scan-anggota">
          @include('peminjaman.panel-scan-anggota')  
        </div>
        <input type="hidden" id="id-anggota">
      </div>
    </div>
    @endif
    
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Scanner Buku<span></span></h5>
        <div class="activity" id="panel-scan">
          @include('peminjaman.panel-scan')  
        </div>
        <a type="button" class="btn btn-primary" href="#" onclick="prosesPeminjaman('{{csrf_token()}}')">Proses Peminjaman</a>
      </div>
    </div>
  </div>
</div>
<script>
  function reset(token){
    var act = 'peminjaman/reset';
    $.get(act, {
          _token: token,
      },
     function (data) {
       $('#table-data').html(data);
    });
    refreshSearch();
    refreshScan();
  }

  function prosesPeminjaman(token){
    var act = 'peminjaman/simpan';
    var anggota = $('#id-anggota').val();
    var id = $('#id_anggota').val();
    $.post(act, {
          _token: token,
          anggota: anggota,
          id: id,
      },
     function (data) {
         if(data.status === 'error'){
            alert(data.message);
            }else{
              alert(data.message);
                location.reload();
                }
       //$('#table-data').html(data);
    });
  }

</script>
@endsection
