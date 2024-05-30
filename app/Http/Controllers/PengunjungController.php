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

    public function tambah (){
        $dataAnggota = Anggota::all();
        return view('pengunjung.tambah', compact('dataAnggota'));
    }

    public function simpan (Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $data = $request->except('_token', 'submit');
        $data['tanggal'] = date("Y-m-d");
        
        Pengunjung::create($data);

        return redirect('pengunjung');
    }
    
    public function delete ($id){
        
        $data = Pengunjung::findOrFail($id);
        $data->delete();

        return redirect('pengunjung');
    }
}
