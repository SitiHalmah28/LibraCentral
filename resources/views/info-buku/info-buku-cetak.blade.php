<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<style type="text/css">
		body {
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
		}

		/* Table */
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
            width: 100%;
		}
		.demo-table {
			border-collapse: collapse;
			font-size: 13px;
		}
		.demo-table th,
		.demo-table td {
			border-bottom: 1px solid #e1edff;
			border-left: 1px solid #e1edff;
			padding: 7px 15px;
		}
		.demo-table th,
		.demo-table td:last-child {
			border-right: 1px solid #e1edff;
            border-top: 1px solid #e1edff;
		}
		.demo-table td:first-child {
			border-top: 1px solid #e1edff;
		}
		.demo-table td:last-child{
			border-bottom: 1px solid #e1edff;
		}
		caption {
			caption-side: top;
			margin-bottom: 10px;
		}

		/* Table Header */
		.demo-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.demo-table tbody td {
			color: #353535;
		}

		.demo-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.demo-table tbody tr:hover th,
		.demo-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
			transition: all .2s;
		}
	</style>
	<title>LibraCentral - Cetak</title>
</head>
<body>
  <center>
    <h4 style="font-family: Arial, Helvetica, sans-serif; font-size: 25px;">Laporan Stok Buku</h4>
  </center>
	<table class="demo-table responsive" >
		<thead>
        <tr>
            <th scope="col">Judul</th>
            <th scope="col">Stok Awal</th>
            <th scope="col">Jumlah Peminjaman</th>
            <th scope="col">Stok Akhir</th>
            <th scope="col">Peminjam</th>
        </tr>
		</thead>
    <tbody>
        @foreach($data as $value)
        	@if($value['stok'] != $value['jumlah_sebenarnya'])
            <tr>
	            <th scope="row">{{ $value['judul'] }}</th>
                <th>{{ $value['jumlah_sebenarnya'] }}</th>
                <td>{{ $value['jumlah_sebenarnya'] - $value['stok'] }}</td>
                <th>{{ $value['stok'] }}</th>
                <th>{{ $value['nama_peminjam'] }}</th>
	        </tr>
	        @endif
         @endforeach
    </tbody>
</table>
