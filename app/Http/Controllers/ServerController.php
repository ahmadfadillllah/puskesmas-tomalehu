<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Antrian;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function contact()
    {
        return view('contact');
    }

    public function postcontact(Request $request)
    {

        $request->no_hp = Str::replaceFirst('0', '62', $request->no_hp);
        $token = "dMKQw8UZCpQfJCauNG5kVHUwMDWpcXbyxwzUmRnHGPhPmCzh2q";
        $phone = $request->no_hp; //atau bisa menggunakan 62812xxxxxxx
        $message = "Hai $request->name, $request->nik terimakasih telah menghubungi kami, pesan anda [$request->message], mohon menunggu jawaban dari kami";
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
        $phone = $request->no_hp; //atau bisa menggunakan 62812xxxxxxx
        $message = "Hai $request->name, $request->nik  terimakasih telah menghubungi kami, pesan anda [$request->message], mohon menunggu jawaban dari kami";

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

           return redirect()->route('contact')->with('notification', 'Pesan telah terkirim');
       }else{
        return redirect()->route('contact')->with('notification', 'Pesan gagal terkirim');
       }
    }




}
