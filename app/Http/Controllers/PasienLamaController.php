<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;

class PasienLamaController extends Controller
{
    public function index(Request $request)
    {

        return view('pasienLama');
    }

    public function view(Request $request)
    {
        // dd($request->all());
        $dataPasien = Pasien::all()->where('nik_ktp',$request->nik_ktp)->first();


        if(!$dataPasien){
            return redirect()->route('pasienLama')->with('notification', 'Maaf, NIK tidak dapat ditemukan.... Silahkan Mendaftar Terlebih Dahulu');
        }else{
            $dataPasien = Pasien::all()->first();

            return view('viewPasien', ['dataPasien' => $dataPasien]);
        }

    }

}
