<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pinActivation;
use Illuminate\Support\Str;

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
        (int)$nomor = 1;
        $dataPasien = Pasien::all()->where('nik_ktp',$request->nik_ktp)->first();
        $dataAntrian = Antrian::all()->where('pasien_id', $dataPasien->id)->first();
        $data = Antrian::wherenotNULL('nomor_antrian')->count();
        $kode = pinActivation::all()->where('pasien_id', $dataPasien->id)->first();
        // dd($kode);
        if($kode->kode == $request->kode){

            if($dataAntrian->nomor_antrian == NULL){

                (int)$data = (int)$data+(int)$request->nomor_antrian;

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
        // dd($kode);
        $update =  DB::table('pin_activation')->where('id', $dataPasien->id) ->update(['kode' => Str::random(5)]);

        $kode  = pinActivation::all()->where('id', $dataPasien->id)->first();
        $token = "cSmU17EhuyPicsKQDLBu7oSpqZBmm8JZY1rmHH1Kc4iDdjxFrL";
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

}
