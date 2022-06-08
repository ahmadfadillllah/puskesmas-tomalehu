<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Antrian;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use ParagonIE\Sodium\Compat;

class AntrianController extends Controller
{
    public function index(Request $request)
    {
        $dataPasien = Pasien::orderBy('id', 'ASC')->get();
        $jumlahPasien = Antrian::wherenotNULL('nomor_antrian')->count();
        $dataAntrian = Antrian::orderBy('nomor_antrian', 'ASC')->wherenotNULL('nomor_antrian')->first();

        // dd($dataAntrian);
        $jumlah = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->wherenotNULL('nomor_antrian')->where('status', 'waiting')
        ->orderBy('nomor_antrian', 'ASC')->get()->count();

        $totalantrian = $jumlah - $dataAntrian->nomor_antrian;

        if(!$dataAntrian == NULL){
            return view('antrian.index',[
                'dataPasien' => $dataPasien,
                'jumlahPasien' => $jumlahPasien,
                'dataAntrian' => $dataAntrian,
                'totalantrian' => $totalantrian]);
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

    public function validateAntrian(Request $request)
    {

        $request->validate([
            'nik_ktp' => 'required|min:16|max:16|exists:pasien',
        ],
         [
            'nik_ktp.required' => 'NIK KTP harus diisi',
            'nik_ktp.exists' => 'NIK KTP tidak ada',
            'nik_ktp.min' => 'NIK KTP harus berjumlah 16 digit',
            'nik_ktp.max' => 'NIK KTP harus berjumlah 16 digit'
        ]);

        $dataPasien = DB::table('antrian')
        ->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->where('nik_ktp', $request->nik_ktp)->first();

        if($dataPasien->nomor_antrian == NULL){
            return redirect()->route('lihatAntrian')->with('notification', 'NIK tersebut belum mengambil nomor antrian');
        }

        return view('antrian.validateantrian', compact('dataPasien'));
    }


    public function cetakAntrian(Request $request)
    {
        $dataPasien = DB::table('antrian')
        ->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->where('nik_ktp', $request->nik_ktp)->first();

        $nik_ktp = Str::of($dataPasien->nik_ktp)->limit(11, '*****');

        $jumlah = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->wherenotNULL('nomor_antrian')->where('status', 'waiting')
        ->orderBy('nomor_antrian', 'ASC')->get()->count();

        $totalantrian = $jumlah - $dataPasien->nomor_antrian;


        if($dataPasien->nomor_antrian == NULL){
            return redirect()->route('lihatAntrian')->with('notification', 'NIK tersebut belum mengambil nomor antrian');
        }else{

            print(<<<EOD
            <script src="https://cdn.jsdelivr.net/npm/recta/dist/recta.js"></script>
            <script type="text/javascript">
              var printer = new Recta('3119983605', '1811')

                printer.open().then(function () {
                printer.align('center')
                    .text('PUSKESMAS TOMALEHU')
                    .bold(true)
                    .text('$dataPasien->updated_at')
                    .bold(false)
                    .text('')
                printer.align('left')
                    .text('Nama : $dataPasien->nama_lengkap')
                    .text('NIK  : $nik_ktp')
                    .text('')
                printer.align('center')
                    .text('Nomor Antrian Anda:')
                    .text('')
                    .text('$dataPasien->nomor_antrian')
                    .text('')
                    .text('Silahkan menunggu nomor anda dipanggil')
                    .text('')
                    .text('Antrian yang belum dipanggil: $totalantrian orang')
                    .cut()
                    .print()
                })
            </script>
EOD);

            return redirect()->route('lihatAntrian')->with('notification', 'Berhasil Mencetak Struk');

        }

    }


}
