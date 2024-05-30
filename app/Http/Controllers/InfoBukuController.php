<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use App\Models\DetilPeminjaman;
use App\Models\DetilPeminjamanSementara;
use App\Models\Anggota;
use App\Models\Staf;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class InfoBukuController extends Controller
{
    public function index()
    {
        $data = Buku::with(['detilPeminjaman.peminjaman.anggota'])
            ->get()
            ->map(function ($buku) {
                // Jumlah buku yang sedang dipinjam dengan status_peminjaman false (belum dikembalikan)
                $jumlahDipinjam = $buku->detilPeminjaman->filter(function ($detail) {
                    return $detail->peminjaman->status_peminjaman == false;
                })->count();

                // Jumlah buku sebenarnya (jumlah_tersedia + jumlahDipinjam)
                $jumlahSebenarnya = $buku->jumlah_tersedia + $jumlahDipinjam;

                // Nama peminjam yang belum mengembalikan buku, dipisahkan dengan koma
                $namaPeminjam = $buku->detilPeminjaman->filter(function ($detail) {
                    return $detail->peminjaman->status_peminjaman == false;
                })->pluck('peminjaman.anggota.nama')->unique()->implode(', ');

                return [
                    'judul' => $buku->judul,
                    'jumlah_sebenarnya' => $jumlahSebenarnya,
                    'stok' => $buku->jumlah_tersedia,
                    'nama_peminjam' => $namaPeminjam,
                ];
            });

        return view('info-buku.info-buku', compact('data'));
    }


    public function cetak()
    {
        $data = Buku::with(['detilPeminjaman.peminjaman.anggota'])
            ->get()
            ->map(function ($buku) {
                // Jumlah buku yang sedang dipinjam dengan status_peminjaman false (belum dikembalikan)
                $jumlahDipinjam = $buku->detilPeminjaman->filter(function ($detail) {
                    return $detail->peminjaman->status_peminjaman == false;
                })->count();

                // Jumlah buku sebenarnya (jumlah_tersedia + jumlahDipinjam)
                $jumlahSebenarnya = $buku->jumlah_tersedia + $jumlahDipinjam;

                // Nama peminjam yang belum mengembalikan buku, dipisahkan dengan koma
                $namaPeminjam = $buku->detilPeminjaman->filter(function ($detail) {
                    return $detail->peminjaman->status_peminjaman == false;
                })->pluck('peminjaman.anggota.nama')->unique()->implode(', ');

                return [
                    'judul' => $buku->judul,
                    'jumlah_sebenarnya' => $jumlahSebenarnya,
                    'stok' => $buku->jumlah_tersedia,
                    'nama_peminjam' => $namaPeminjam,
                ];
            });

        $pdf= Pdf::loadView('info-buku.info-buku-cetak', compact('data'));
        return $pdf->stream('LaporanBuku.pdf');
    }
}
