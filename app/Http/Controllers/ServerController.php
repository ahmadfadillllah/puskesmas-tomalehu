<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Antrian;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    public function index(Request $request)
    {
        $jumlahPasien = DB::table('pin_activation')->join('pasien', 'pin_activation.pasien_id', 'pasien.id')->count();
        $jumlahAntrian = Antrian::wherenotNULL('nomor_antrian')->count();
        $dataPasien = Pasien::orderBy('id', 'ASC')->get();

            return view('server.index', ['dataPasien' => $dataPasien, 'jumlahPasien' => $jumlahPasien, 'jumlahAntrian' => $jumlahAntrian]);

    }

    public function list()
    {

        $dataPasien = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->wherenotNULL('nomor_antrian')->where('status', 'waiting')
        ->orderBy('nomor_antrian', 'ASC')->get();

        return $dataPasien;
    }




}
