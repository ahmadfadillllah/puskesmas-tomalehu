<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pasien;
use App\Antrian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PasienController extends Controller
{
    //

    public function index()
    {
        $dataPasien = DB::table('pin_activation')->join('pasien', 'pin_activation.pasien_id', 'pasien.id')->get();

        // dd($dataPasien);
        return view('pasien.index', ['dataPasien' => $dataPasien]);
    }

    public function editPasien($id)
    {
        $pasien = Pasien::find($id);


        return view('pasien.edit', ['pasien' => $pasien]);
    }

    public function updatepasien(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        $pasien->no_hp = Str::replaceFirst('0', '62', $request->no_hp);
        $pasien->update($request->all());

        return redirect()->route('daftar-pasien')->with('notification', 'Data Berhasil di Update');
    }
}
