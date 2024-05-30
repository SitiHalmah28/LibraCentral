<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetilPeminjamanSementara;
use App\Models\Rak;
use App\Models\Buku;
use Auth;
use Illuminate\Support\Facades\DB;

class RelokasiController extends Controller
{
    public function index()
    {
        $dataRak = Rak::all();
        return view('relokasi.relokasi', compact('dataRak'));
    }

    public function refreshPanelScan()
    {
        return view('relokasi.panel-scan');
    }

    public function simpanBuku(Request $request)
    {
        //dd($request->all());
        $dataBuku = Buku::where('kode', $request->code)->first();
        $cekBuku = DetilPeminjamanSementara::where('id_buku', $dataBuku->id)->first();
        if($cekBuku != null){
            return response()->json(['status' => 'error', 'message' => 'Buku ' .$dataBuku->judul.' sudah pernah diinput.']);
        }

        $trans = new DetilPeminjamanSementara();
        $trans->id_buku = $dataBuku->id;
        $trans->denda = 0;
        $trans->save();

        $data = DetilPeminjamanSementara::all();
        //dd($data);
        return view ('relokasi.panel-detil', compact('data'));
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
        $dataDetil = DetilPeminjamanSementara::all();
        foreach ($dataDetil as $value) {
            $buku = Buku::findOrFail($value->id_buku);
            $buku->id_rak = $request->rak;
            $buku->save();
        }
        
        DB::table('detil_peminjaman_sementara')->delete();
        //return redirect('peminjaman');  

    }
}
