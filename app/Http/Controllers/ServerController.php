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
        $dataPasien = Pasien::orderBy('id', 'ASC')->get();

            return view('server.index', ['dataPasien' => $dataPasien]);

    }

    public function list()
    {

        $dataPasien = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->wherenotNULL('nomor_antrian')
        ->orderBy('nomor_antrian', 'ASC')->get();

        return $dataPasien;
    }




}
