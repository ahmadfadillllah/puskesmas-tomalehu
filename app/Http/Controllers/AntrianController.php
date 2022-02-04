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
        if(!$dataAntrian == NULL){
            return view('antrian.index',[
                'dataPasien' => $dataPasien,
                'jumlahPasien' => $jumlahPasien,
                'dataAntrian' => $dataAntrian]);
        }else{
            return redirect()->route('server')->with('notification', 'Antrian Masih Kosong');
        }

    }

    public function list()
    {

        $dataPasien = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->wherenotNULL('nomor_antrian')->where('status', 'temporary')
        ->orderBy('nomor_antrian', 'ASC')->get();

        return $dataPasien;

    }

    public function keluhan(Request $request ,$id)
    {

        // $dataPasien = DB::table('antrian')->join('pasien', 'antrian.pasien_nomor_antrian', 'pasien.nomor_antrian')->get();

        $dataPasien = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')->where('nomor_antrian', $id)->first();
        // dd($dataPasien);

        $antrian = DB::table('antrian')->where('id', $request->id)->update(['status' => 'process']);

        return view('antrian.edit', ['dataPasien' => $dataPasien]);
    }

    public function updatekeluhan(Request $request)
    {

        $affected = DB::table('keluhan_pasien')->where('id', $request->id)->update(['keluhan' => $request->keluhan, 'jenis_obat' => $request->jenis_obat]);

        $antrian = DB::table('antrian')->where('id', $request->id)->update(['nomor_antrian' => null, 'status' => 'done']);
        if($affected && $antrian == true){
            return redirect()->route('antrian')->with('notification', 'Pasien telah selesai');
        }else{
            return redirect()->route('antrian')->with('notification', 'Pasien gagal update');
        }
    }
}
