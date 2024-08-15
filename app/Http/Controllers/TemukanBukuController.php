<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\DB;

class TemukanBukuController extends Controller
{
    public function index()
    {
        return view('caribuku.temukan-buku');
    }

    public function refreshPanelSearch()
    {
        return view('caribuku.panel-search');
    }

    public function cari(Request $request)
    {
        if ($request->has('q')) {
            $key = $request->q;
            $kategori = DB::table('kategori_buku')
                        ->where('nama', '=', $key)->first();
            //dd($kategori);
            if($kategori != null){
                $data = DB::table('buku')->select('kode', 'penulis', 'judul')
                        ->where('id_kategori', $kategori->id)
                        ->get();
            }else{
                $data = DB::table('buku')->select('kode', 'penulis', 'judul')
                        ->where('penulis', 'LIKE', '%'.$key.'%')
                        ->orWhere('judul', 'LIKE', '%'.$key.'%')
                        ->get();
            }
            
            return response()->json($data);
        }
    }

    public function detil(Request $request)
    {
        $data = Buku::where('kode', $request->code)->first();
        //dd($data);
        return view ('caribuku.panel-detil', compact('data'));
    }
}
