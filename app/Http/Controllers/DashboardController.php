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

class DashboardController extends Controller
{
    public function index()
    {
        //Update Denda
        // Mendapatkan peminjaman yang statusnya false dan tanggal pengembaliannya sudah lewat
        $peminjamanList = Peminjaman::where('status_peminjaman', false)
                                    ->where('tanggal_pengembalian', '<', Carbon::today())
                                    ->get();

        foreach ($peminjamanList as $peminjaman) {
            $tanggalPengembalian = Carbon::parse($peminjaman->tanggal_pengembalian);
            $hariTerlambat = Carbon::today()->diffInDays($tanggalPengembalian);

            if ($hariTerlambat > 0) {
                $totalDenda = 0;
                // Mendapatkan detil peminjaman terkait
                $detilPeminjamanList = DetilPeminjaman::where('id_peminjaman', $peminjaman->id)->get();

                foreach ($detilPeminjamanList as $detil) {
                    $denda = $hariTerlambat * 500;
                    $detil->denda = $denda;
                    $detil->save();

                    $totalDenda += $denda;
                }

                // Update total denda pada tabel peminjaman
                $peminjaman->total_denda = $totalDenda;
                $peminjaman->save();
            }
        }
        
        // Dapatkan tanggal awal dan akhir bulan ini
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

        $jumlahBuku = Buku::count();
        $jumlahPeminjaman = Peminjaman::whereBetween('tanggal_peminjaman', [$startOfMonth, $endOfMonth])->count();
        $totalDenda = Peminjaman::whereBetween('tanggal_peminjaman', [$startOfMonth, $endOfMonth])
        ->where('status_peminjaman', 1)->sum('total_denda');

        
        // Mendapatkan tanggal awal dan akhir tahun ini
        $startOfYear = Carbon::now()->startOfYear()->toDateString();
        $endOfYear = Carbon::now()->endOfYear()->toDateString();

        // Query untuk mendapatkan 5 anggota yang paling sering melakukan peminjaman tahun ini
        $topAnggota = Anggota::select('anggota.id', 'anggota.nama', 'anggota.nis', DB::raw('COUNT(pengunjung.id) as total_kunjungan'))
            ->join('pengunjung', 'anggota.id', '=', 'pengunjung.id_anggota')
            ->whereBetween('pengunjung.tanggal', [$startOfYear, $endOfYear])
            ->groupBy('anggota.id', 'anggota.nama', 'anggota.nis')
            ->orderBy('total_kunjungan', 'desc')
            ->take(5)
            ->get();


        $topBuku = Buku::select('buku.id', 'buku.judul', 'buku.penulis', DB::raw('COUNT(detil_peminjaman.id) as total_peminjaman'))
            ->join('detil_peminjaman', 'buku.id', '=', 'detil_peminjaman.id_buku')
            ->join('peminjaman', 'peminjaman.id', '=', 'detil_peminjaman.id_peminjaman')
            ->whereBetween('peminjaman.tanggal_peminjaman', [$startOfMonth, $endOfMonth])
            ->groupBy('buku.id', 'buku.judul', 'buku.penulis')
            ->orderBy('total_peminjaman', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact('jumlahBuku', 'jumlahPeminjaman', 'totalDenda', 'topAnggota', 'topBuku'));
    }

}
