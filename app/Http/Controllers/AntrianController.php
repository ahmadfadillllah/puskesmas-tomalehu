<?php

namespace App\Http\Controllers;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

use Illuminate\Http\Request;
use App\Pasien;
use App\Antrian;
use Illuminate\Support\Facades\DB;
use Exception;

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

    public function lihatAntrian()
    {

        return view('antrian.cetakantrian');
    }

    public function cetakAntrian(Request $request)
    {

        $dataPasien = DB::table('antrian')
        ->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->where('nik_ktp', $request->nik_ktp)->first();

        // dd($dataPasien);

        if($dataPasien->nomor_antrian == NULL){
            return redirect()->route('lihatAntrian')->with('notification', 'NIK tersebut belum mengambil nomor antrian');
        }else{

            print(<<<EOD
            <script src="https://cdn.jsdelivr.net/npm/recta/dist/recta.js"></script>
            <script type="text/javascript">
              var printer = new Recta('7835492945', '1811')

                printer.open().then(function () {
                printer.align('center')
                    .text('PUSKESMAS TOMALEHU')
                    .bold(true)
                    .text('$dataPasien->updated_at')
                    .bold(false)
                    .text('')
                printer.align('left')
                    .text('Nama : $dataPasien->nama_lengkap')
                    .text('NIK  : $dataPasien->nik_ktp')
                    .text('')
                printer.align('center')
                    .text('Nomor Antrian Anda:')
                    .text('')
                    .text('P$dataPasien->nomor_antrian')
                    .text('')
                    .text('Terimakasih telah menunggu')
                    .cut()
                    .print()
                })
            </script>
EOD);

            return view('antrian.cetakantrian')->with('notification', 'Berhasil Mencetak Struk');

        }

    }


}
