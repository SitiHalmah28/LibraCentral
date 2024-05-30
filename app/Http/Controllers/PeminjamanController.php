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
use Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $dataAnggota = Anggota::all();
        return view('peminjaman.peminjaman', compact('dataAnggota'));
    }

    public function refreshPanelSearch()
    {
        return view('peminjaman.panel-search');
    }

    public function refreshPanelScan()
    {
        return view('peminjaman.panel-scan');
    }

    public function refreshPanelScanAnggota()
    {
        return view('peminjaman.panel-scan-anggota');
    }


    public function cari(Request $request)
    {
        if ($request->has('q')) {
            $key = $request->q;
            $data = DB::table('buku')->select('kode', 'penulis', 'judul')
            ->where('penulis', 'LIKE', '%'.$key.'%')
            ->orWhere('judul', 'LIKE', '%'.$key.'%')->get();
            return response()->json($data);
        }
    }

    public function cariAnggota(Request $request)
    {
        
        $anggota = Anggota::where('nis', $request->code)->first();
        //dd($anggota);
        return response()->json($anggota->id);
    }

    public function simpanDetil(Request $request)
    {
        $dataBuku = Buku::where('kode', $request->code)->first();
        $cekBuku = DetilPeminjamanSementara::where('id_buku', $dataBuku->id)->first();
        if($cekBuku != null){
            return response()->json(['status' => 'error', 'message' => 'Buku ' .$dataBuku->judul.' sudah pernah diinput.']);
        }
        if($dataBuku->jumlah_tersedia < 1 ){
            return response()->json(['status' => 'error', 'message' => 'Buku ' .$dataBuku->judul.' tidak tersedia untuk dipinjam.']);
        }

        $trans = new DetilPeminjamanSementara();
        $trans->id_buku = $dataBuku->id;
        $trans->denda = 0;
        $trans->save();

        $data = DetilPeminjamanSementara::all();
        //dd($data);
        return view ('peminjaman.panel-detil', compact('data'));
    }

    public function reset(Request $request)
    {
        DB::table('detil_peminjaman_sementara')->delete();

        $data = DetilPeminjamanSementara::all();

        //dd($data);
        //return view ('peminjaman.panel-detil', compact('data'));
    }

    public function simpan(Request $request)
    {
        //dd($request->all());
        date_default_timezone_set("Asia/Jakarta");
        $tanggal1= date("YmdHis");
        $tanggalPeminjaman= date("Y-m-d");
        $tanggalPengembalian = date("Y-m-d", strtotime($tanggalPeminjaman . ' + 3 days'));
        $lastid = Peminjaman::max('id');
        $lastid++;
        $char = "TRS";
        $nomor_peminjaman = $char .$tanggal1 .$lastid;
        
        $dataDetil = DetilPeminjamanSementara::all();

        $trans = new Peminjaman();
        $trans->tanggal_peminjaman = $tanggalPeminjaman;
        $trans->tanggal_pengembalian = $tanggalPengembalian;
        $trans->nomor_peminjaman = $nomor_peminjaman;
        $trans->total_buku = $dataDetil->count();
        $trans->total_denda = 0;
        $trans->status_peminjaman = 0;
        
        $trans->id_anggota = $request->anggota;
            //$trans->id_staf = $staf->id;
        
        $trans->save();

        foreach ($dataDetil as $value) {
            $detilPeminjaman = new DetilPeminjaman();
            $detilPeminjaman->id_peminjaman = $trans->id;
            $detilPeminjaman->id_buku = $value->id_buku;
            $detilPeminjaman->denda = 0;
            $detilPeminjaman->save();

            $buku = Buku::findOrFail($value->id_buku);
            $buku->jumlah_tersedia = $buku->jumlah_tersedia - 1;
            $buku->save();
        }

        DB::table('detil_peminjaman_sementara')->delete();
        //return redirect('peminjaman');  

    }


    public function updateDenda()
    {
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
    }
}
