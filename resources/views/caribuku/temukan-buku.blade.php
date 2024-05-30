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
              @include('caribuku.panel-search')
            </div>
          </div>
        </div>
      </div><!-- End Sales Card -->

      <!-- Recent Sales -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Detil Buku<span></span></h5>
            <br/>
            <div id="panel-detil"></div>
          </div>
        </div>
      </div><!-- End Recent Sales -->
    </div>
  </div><!-- End Left side columns -->
</div>
@endsection