<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use Auth;

class AnggotaController extends Controller
{
    public function index (){      
        $data = Anggota::all();
        return view('anggota.anggota', compact('data'));
    }

    public function tambah (){
        return view('anggota.tambah');

    }

    public function simpan (Request $request){
        //dd($request->all());
        $userData = [
            'nama' => $request->input('nama'),
            'username' => $request->input('nama'),
            'password' => bcrypt($request->input('nis')),
            'role' => 'Anggota',
        ];

        // Create user record
        $user = User::create($userData);

        $data = $request->except('_token', 'submit');
        $data['user_id'] = $user->id;

        Anggota::create($data);

        return redirect('user/anggota');
    }

    public function edit ($id){
        $data = Anggota::findOrFail($id);
        return view('anggota.edit', compact('data'));
    }

    public function update (Request $request, $id){

        $data = Anggota::findOrFail($id);
        $data->nama = $request->nama;
        $data->nis = $request->nis;
        $data->save();

        $user = User::findOrFail($data->user_id);
        $user->nama = $data->nama;
        $user->save();

        return redirect('user/anggota');
    }

    public function reset ($id){
        
        $data = Anggota::findOrFail($id);

        $user = User::findOrFail($data->user_id);
        $user->password = bcrypt($data->nis);
        $user->save();

        return redirect('user/anggota');
    }
    
    public function delete ($id){
        
        $data = Anggota::findOrFail($id);
        $data->delete();

        $user = User::findOrFail($data->user_id);
        $user->delete();

        return redirect('user/anggota');
    }

}
