@extends ('master')
@section('navigation')
@endsection
@section('content')
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Scan Kartu Disini</h5>
          <center>
             @include('pengunjung.panel-scan')
          </center>
        </div>
      </div>

    </div>
</div>
@endsection
