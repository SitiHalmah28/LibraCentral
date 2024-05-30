<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\DetilPeminjaman;
use App\Models\DetilPeminjamanSementara;
use App\Models\Anggota;
use App\Models\Staf;
use Auth;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function index()
    {
        $data = Peminjaman::where('status_peminjaman', 0)->get();
        return view('pengembalian.pengembalian', compact('data'));
    }

    public function detail ($id){
        $data = Peminjaman::findOrFail($id);
        $dataDetil = DetilPeminjaman::where('id_peminjaman', $id)->get();
        return view('pengembalian.detail', compact('data', 'dataDetil'));
    }


    public function update($id){
        //dd($id);
        $data = Peminjaman::findOrFail($id);
        $data->status_peminjaman = 1;

        $dataDetil = DetilPeminjaman::where('id_peminjaman', $id)->get();
        //dd($dataDetil);
        foreach ($dataDetil as $value) {
            $buku = Buku::findOrFail($value->id_buku);
            //dd($buku);
            $buku->jumlah_tersedia = $buku->jumlah_tersedia + 1;
            $buku->save();
        }
        $data->save();

        return redirect('pengembalian');
    }

}
