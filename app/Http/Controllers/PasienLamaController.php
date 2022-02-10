<?php

namespace App\Http\Controllers;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

use App\Pasien;
use App\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pinActivation;
use Illuminate\Support\Str;
use Exception;

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

            $nomor = 1;
            $dataAntrian = Antrian::all()->where('pasien_id', $dataPasien->id)->first();
            return view('viewPasien', ['dataAntrian' => $dataAntrian, 'dataPasien' => $dataPasien, 'nomor' => $nomor]);

        }

    }

    public function tambahantrian(Request $request)
    {

        // dd($request->all());
        $nomor = 1;
        $dataPasien = Pasien::all()->where('nik_ktp',$request->nik_ktp)->first();
        $dataAntrian = Antrian::all()->where('pasien_id', $dataPasien->id)->first();
        $data = Antrian::wherenotNULL('nomor_antrian')->count();
        $kode = pinActivation::all()->where('pasien_id', $dataPasien->id)->first();
        // dd($kode);
        if($kode->kode == $request->kode){

            if($dataAntrian->nomor_antrian == NULL){

                $data = $data+$request->nomor_antrian;

                $success = DB::table('antrian')->join('pasien', 'antrian.pasien_id', 'pasien.id')
                ->where('pasien.nik_ktp', $request->nik_ktp)
                ->update(['nomor_antrian' => $data, 'status' => 'waiting']);

                    if($success){
                        return redirect()->route('pasienLama')->with('notification', 'Berhasil Mengambil Nomor Antrian');
                    }
            }
        }else{
            return redirect()->route('pasienLama')->with('notification', 'Kode Verifikasi Salah');
        }

    }

    public function updateKode(Request $request)
    {
        // dd($request->all());
        $dataPasien = Pasien::all()->where('nik_ktp',$request->nik_ktp)->first();
        // dd($dataPasien);
        $kode  = pinActivation::all()->where('id', $dataPasien->id)->first();
        // dd($kode);
       $update =  DB::table('pin_activation')->where('id', $dataPasien->id) ->update(['kode' => Str::random(5)]);

        $token = "SX8w5onAy95QPzB8ZdkYKRrMW78uEn1LD8MNz5SVB6Jwa73f2P";
        $phone = $dataPasien->no_hp; //atau bisa menggunakan 62812xxxxxxx
        $message = "Hai $dataPasien->nama_lengkap, PIN Antrian anda adalah [$kode->kode], Mohon untuk tidak menyebarkan kode tersebut";
        $messageid= "2EFD576575BF1741C3530xxxxxxxxx"; //optional

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.ruangwa.id/api/send_express',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone.'&message='.$message.'&messageid='.$messageid,
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $accesskey= "8b77591fe1ae830044d4cd1f96923d84";
        $phone = $dataPasien->no_hp; //atau bisa menggunakan 62812xxxxxxx
        $message = "Hai $dataPasien->nama_lengkap, PIN Antrian anda adalah [$kode->kode], Mohon untuk tidak menyebarkan kode tersebut";

       $curl = curl_init();
       curl_setopt_array($curl, array(
         CURLOPT_URL => 'https://app.ruangwa.id/api/send_sms',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS => 'accesskey='.$accesskey.'&number='.$phone.'&message='.$message,
       ));
       $response = curl_exec($curl);
       curl_close($curl);

       if($response){

           return redirect()->route('pasienLama')->with('notification', 'Berhasil Mengupdate Kode');
       }else{
        return redirect()->route('pasienLama')->with('notification', 'Gagal Mengupdate Kode');
       }

    }

    public function cetakStruk()
    {

        try {
            /**
             * Printer Harus Dishare
             * Nama Printer Contoh: Generic
             */
            $connector = new WindowsPrintConnector("Generic");
            $printer = new Printer($connector);

            /** RATA TENGAH */
            $title = "TEST PRINTER ANTRIAN";
            $printer->initialize();
            $printer->setFont(Printer::FONT_A);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("\n");

            $printer->initialize();
            $printer->setFont(Printer::FONT_B);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text(date('d/m/Y H:i:s'). "\n");
            $printer->setLineSpacing(5);
            $printer->text("\n");

            $printer->initialize();
            $printer->setFont(Printer::FONT_A);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("Nomor Antrian Anda Adalah :\n");
            $printer->text("\n");

            $printer->initialize();
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setTextSize(6, 4);
            $printer->text("A010" . "\n");
            $printer->text("\n");

            $printer->initialize();
            $printer->setFont(Printer::FONT_C);
            $printer->setTextSize(2, 2);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("LOKET : UMUM" . "\n");
            $printer->text("\n\n\n");

            $printer->initialize();
            $printer->setFont(Printer::FONT_A);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("Silahkan Menunggu Antrian Anda\n");
            $printer->text("Terima Kasih\n");
            $printer->text("\n");

            $printer->cut();

            /* Close printer */
            $printer->close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }

    }

}
