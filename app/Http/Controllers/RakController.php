<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use App\Models\Buku;

class RakController extends Controller
{
    public function index(){
        
        $data = Rak::all();
        return view('rak.rak', compact('data'));
    }
    public function tambah (){

        return view('rak.tambah');

    }
    public function simpan (Request $request){
        //dd($request->all());
        $datetime= date("YmdHis");
        $lastid = Rak::max('id');
        $lastid++;

        $data = $request->except('_token', 'submit');
        $data['kode1'] = $datetime.$lastid;
        Rak::create($data);

        return redirect('inventori/rak');
    }

    public function edit ($id){
        $data = Rak::findOrFail($id);
        return view('rak.edit', compact('data',));
    }

    public function detail ($id){
        $data = Rak::findOrFail($id);
        $daftarBuku = Buku::where('id_rak', $id)->get();
        return view('rak.detail', compact('data', 'daftarBuku'));
    }

    

    public function update (Request $request, $id){

        $data = Rak::findOrFail($id);
        $data->nama = $request->nama;
        $data->save();

        return redirect('inventori/rak');
    }
    
    public function delete ($id){
        $data = Rak::findOrFail($id);

        $data->delete();
        return redirect('inventori/rak');
    }

}
