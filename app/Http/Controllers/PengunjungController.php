<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Pengunjung;

class PengunjungController extends Controller
{
    public function index (){      
        $data = Pengunjung::all();
        return view('pengunjung.pengunjung', compact('data'));
    }

    public function simpan (Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $anggota = Anggota::where('nis', $request->code)->first();
        if($anggota == null){
            return response()->json(['status' => 'error', 'message' => 'Anggota dengan NIS ' .$request->code.' tidak ditemukan.']);
        }

        $data = new Pengunjung();
        $data->tanggal = date("Y-m-d");
        $data->id_anggota = $anggota->id;
        $data->save();

        return response()->json(['status' => 'success', 'message' => 'Data telah berhasil disimpan.']);

    }
    
    public function delete ($id){
        
        $data = Pengunjung::findOrFail($id);
        $data->delete();

        return redirect('pengunjung');
    }
}
