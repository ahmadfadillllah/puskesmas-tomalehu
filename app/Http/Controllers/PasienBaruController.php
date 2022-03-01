<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Antrian;
use App\keluhanPasien;
use App\pinActivation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PasienBaruController extends Controller
{
    public function index()
    {
        return view('pasienBaru');
    }

    public function create(Request $request)
    {

        $request->validate([
            'nik_ktp' => ['unique:pasien,nik_ktp']
        ],[
            'nik_ktp.unique' => 'NIK Sudah Terdaftar, Silahkan mengambil Nomor Antrian',
        ]);

        $pasien = new Pasien;
        $pasien->nik_ktp = $request->nik_ktp;
        $pasien->nama_lengkap = $request->nama_lengkap;
        $pasien->umur = $request->umur;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = Str::replaceFirst('0', '62', $request->no_hp);
        $pasien->save();

        $request->request->add(['pasien_id' => $pasien->id, 'status' => 'waiting']);
        $anggota = Antrian::create($request->all());
        $request->request->add(['pasien_id' => $pasien->id, 'kode' => Str::random(5)]);
        $activation = pinActivation::create($request->all());
        $request->request->add(['pasien_id' => $pasien->id]);
        $keluhanPasien = keluhanPasien::create($request->all());

        $dataPasien = Pasien::all()->where('nik_ktp',$request->nik_ktp)->first();
        // dd($dataPasien);
        $kode  = pinActivation::all()->where('id', $dataPasien->id)->first();

        $token = "L5QRebSrKpvsaKfRx6nSsK8RtmWZrVbXqxKiM1Ymn1ajqybLwz";
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

       if($response == true){

           return redirect()->route('pasienBaru')->with('success', 'Anda telah berhasil mendaftar, Silahkan Cek Antrian Anda di menu Cek Antrian');
       }else{
        return redirect()->route('pasienLama')->with('notification', 'Gagal Mendaftar');
       }


    }
}
