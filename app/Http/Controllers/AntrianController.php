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

        $dataAntrian = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')
        ->where('pasien.nik_ktp', $request->nik_ktp)->first();

        // dd($dataAntrian);

        if($dataAntrian->nomor_antrian == NULL){
            return redirect()->route('lihatAntrian')->with('notification', 'NIK KTP tersebut belum mengambil nomor antrian');
        }else{

            try {
                /**
                 * Printer Harus Dishare
                 * Nama Printer Contoh: Generic
                 */
                $connector = new WindowsPrintConnector("POS8e0");
                $printer = new Printer($connector);

                /** RATA TENGAH */
                $printer->initialize();
                $printer->setFont(Printer::FONT_A);
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("PUSKESMAS TOMALEHU\n");

                $printer->initialize();
                $printer->setFont(Printer::FONT_B);
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text($dataAntrian->updated_at. "\n");
                $printer->setLineSpacing(5);
                $printer->text("\n");

                $printer->initialize();
                $printer->setFont(Printer::FONT_A);
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->text("NIK  : $dataAntrian->nik_ktp\n");
                $printer->text("Nama : $dataAntrian->nama_lengkap\n");
                $printer->text("\n");

                $printer->initialize();
                $printer->setFont(Printer::FONT_A);
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("Nomor Antrian Anda Adalah :\n");
                $printer->text("\n");

                $printer->initialize();
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->setTextSize(6, 4);
                $printer->text("P"."$dataAntrian->nomor_antrian" . "\n");
                $printer->text("\n");

                $printer->initialize();
                $printer->setFont(Printer::FONT_A);
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->text("Silahkan Menunggu Antrian Anda\n");
                $printer->text("Terima Kasih\n");
                $printer->text("\n\n\n");

                $printer->cut();

                /* Close printer */
                $printer->close();
                return redirect()->route('lihatAntrian')->with('notification', 'Berhasil Mencetak Struk, Silahkan mengambilnya');
            } catch (Exception $e) {
                echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
            }


        }

    }
}
