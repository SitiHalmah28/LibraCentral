<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use App\Models\Buku;
use App\Models\KategoriBuku;

class BukuController extends Controller
{
    public function index(){
        
        $data = Buku::all();
        return view('buku.buku', compact('data'));
    }
    public function tambah (){
        $dataRak = Rak::all();
        $dataKategori = KategoriBuku::all();
        return view('buku.tambah', compact('dataRak', 'dataKategori'));

    }
    public function simpan (Request $request){
        //dd($request->all());
        $data = $request->except('_token', 'submit');
        Buku::create($data);

        return redirect('inventori/buku');
    }

    public function edit ($id){
        $data = Buku::findOrFail($id);
        $dataRak = Rak::all();
        $dataKategori = KategoriBuku::all();
        return view('buku.edit', compact('data', 'dataRak', 'dataKategori'));
    }

    public function update (Request $request, $id){

        $data = Buku::findOrFail($id);
        $data->judul = $request->judul;
        $data->penulis = $request->penulis;
        $data->id_kategori = $request->id_kategori;
        $data->id_rak = $request->id_rak;
        $data->jumlah_tersedia = $request->jumlah_tersedia;
        $data->sinopsis = $request->sinopsis;
        $data->save();

        return redirect('inventori/buku');
    }
    
    public function delete ($id){
        $data = Buku::findOrFail($id);

        $data->delete();
        return redirect('inventori/buku');
    }
}
