<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienLamaController extends Controller
{


    public function index(Request $request)
    {

        return view('pasienLama');
    }

    public function view(Request $request)
    {
        // dd($request->all());

        $head = 0;
        $tail = 0;

        $dataPasien = Pasien::all()->where('nik_ktp',$request->nik_ktp)->first();


        if(!$dataPasien){
            return redirect()->route('pasienLama')->with('notification', 'Maaf, NIK tidak dapat ditemukan.... Silahkan Mendaftar Terlebih Dahulu');
        }else{

            $nomor = 1;
            $dataAntrian = Antrian::all()->where('pasien_id', $dataPasien->id)->first();
            return view('viewPasien', ['dataAntrian' => $dataAntrian, 'dataPasien' => $dataPasien, 'nomor' => $nomor]);

        }

    }

    public function tambahantrian(Request $request)
    {
        $nomor = 1;
        $dataPasien = Pasien::all()->where('nik_ktp',$request->nik_ktp)->first();
        $dataAntrian = Antrian::all()->where('pasien_id', $dataPasien->id)->first();
        $data = Antrian::wherenotNULL('nomor_antrian')->count();

            if($dataAntrian->nomor_antrian == NULL){

                $data = $data+$request->nomor_antrian;

            }

        $success = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->where('pasien.nik_ktp', $request->nik_ktp)
        ->update(['nomor_antrian' => $data]);

        if($success){
            return redirect()->route('pasienLama')->with('notification', 'Berhasil Mengambil Nomor Antrian');
        }
    }

}
