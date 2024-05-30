@extends ('master')
@section('navigation')
@endsection
@section('content')
<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Buku <span></span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book-half"></i>
                    </div>
                    <div class="ps-3">
                      <h6>@current($jumlahBuku)</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Peminjaman</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-list"></i>
                    </div>
                    <div class="ps-3">
                      <h6>@current($jumlahPeminjaman)</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Biaya Denda<span></span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>@current($totalDenda)</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Anggota Aktif<span> | {{date('Y')}}</span></h5>
                  <!--p>Anggota Aktif pada tabel ini merupakan anggota yang sering mengunjungi perpustakaan dan meminjam buku pada tahun {{date('Y')}}.</p-->
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Total Kunjungan</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php $no = 0;?>
						@foreach($topAnggota as $value)
						<?php $no++ ?>
	                      <tr>
	                        <th scope="row"><a href="#">{{ $no }}</a></th>
	                        <td>{{ $value->nama }}</td>
	                        <td>{{ $value->nis }}</td>
	                        <td>@current($value->total_kunjungan)</td>
	                      </tr>
	                     @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Buku Paling Diminati <span>| {{date('M Y')}}</span></h5>
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Total Peminjaman</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php $no = 0;?>
						@foreach($topBuku as $value)
						<?php $no++ ?>
	                      <tr>
	                        <th scope="row"><a href="#">{{ $no }}</th>
	                        <td>{{ $value->judul }}</td>
	                        <td>{{ $value->penulis }}</td>
	                        <td class="fw-bold">@current($value->total_peminjaman)</td>
	                      </tr>
	                    @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

      </div>
@endsection