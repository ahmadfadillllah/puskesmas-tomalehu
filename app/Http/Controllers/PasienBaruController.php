<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;

class PasienBaruController extends Controller
{
    public function index()
    {
        return view('pasienBaru');
    }

    public function create(Request $request)
    {

        $request->validate([
            'nik_ktp' => ['unique:pasien,nik_ktp']
        ],[
            'nik_ktp.unique' => 'NIK Sudah Terdaftar, Silahkan mengambil Nomor Antrian',
        ]);

        $data  = Pasien::create($request->all());

        return redirect()->route('pasienBaru')->with('success', 'Anda telah berhasil mendaftar, Silahkan Cek Antrian Anda di menu Cek Antrian');
    }
}
