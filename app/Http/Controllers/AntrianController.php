<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Antrian;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AntrianController extends Controller
{
    public function index(Request $request)
    {
        $dataPasien = Pasien::orderBy('id', 'ASC')->get();
        $jumlahPasien = Antrian::wherenotNULL('nomor_antrian')->count();
        $dataAntrian = Antrian::orderBy('nomor_antrian', 'ASC')->wherenotNULL('nomor_antrian')->first();
        // dd($dataAntrian);
            return view('antrian.index',[
                'dataPasien' => $dataPasien,
                'jumlahPasien' => $jumlahPasien,
                'dataAntrian' => $dataAntrian]);

    }

    public function list()
    {

        $dataPasien = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->wherenotNULL('nomor_antrian')->where('status', 'temporary')
        ->orderBy('nomor_antrian', 'ASC')->get();

        return $dataPasien;

    }

    public function keluhan($id)
    {

        // $dataPasien = DB::table('antrian')->join('pasien', 'antrian.pasien_nomor_antrian', 'pasien.nomor_antrian')->get();

        $dataPasien = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')->where('nomor_antrian', $id)->first();
        // dd($dataPasien);

        return view('antrian.edit', ['dataPasien' => $dataPasien]);
    }

    public function updatekeluhan(Request $request)
    {
        // dd($request->all());


    }
}
