<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
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
            $data = DB::table('buku')->select('kode', 'penulis', 'judul')
            ->where('penulis', 'LIKE', '%'.$key.'%')
            ->orWhere('judul', 'LIKE', '%'.$key.'%')->get();
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
