<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;


class InfoPengunjungController extends Controller
{
    public function index()
    {
        $data = Pengunjung::orderBy('tanggal', 'desc')->get();

        return view('info-pengunjung.info-pengunjung', compact('data'));
    }
}
