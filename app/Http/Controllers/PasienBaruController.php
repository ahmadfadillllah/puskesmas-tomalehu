<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Antrian;
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

        $pasien = new Pasien;
        $pasien->nik_ktp = $request->nik_ktp;
        $pasien->nama_lengkap = $request->nama_lengkap;
        $pasien->umur = $request->umur;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;
        $pasien->save();

        $request->request->add(['pasien_id' => $pasien->id]);
        $anggota = Antrian::create($request->all());

        return redirect()->route('pasienBaru')->with('success', 'Anda telah berhasil mendaftar, Silahkan Cek Antrian Anda di menu Cek Antrian');
    }
}
