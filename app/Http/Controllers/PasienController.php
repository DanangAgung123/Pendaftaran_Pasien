<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Sapaan;
// use Barryvdh\DomPDF\PDF;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use App\Exports\PasienExport;
use App\Models\ReservasiOnline;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;

class PasienController extends Controller
{
    
    public function index()
    {
        // $pasien = Pasien::where('username',$username)
        //         ->get();
        // $dokter = JadwalDokter::all();
        $username = session('pasien')['0']['noktp'];
        $pasien = Pasien::where('noktp',$username)
                ->get();
       
        return view('pasiens.dataDiri', compact('pasien'));
    }
    public function statusAntrian()
    {
        // $pasien = Pasien::where('username',$username)
        //         ->get();
        // $dokter = JadwalDokter::all();
        $username = session('pasien')['0']['noktp'];
        $pasien = Pasien::where('noktp',$username)
                ->get();
        $antri = ReservasiOnline::where('pasien_id', $pasien[0]->id)
                                ->where('is_called',0)
                                ->first();
        // dd($antri);
        // if($antri === null) {
        //     $antrian = "Tidak Ada Antrian";
        // } else {
        //     $antrian = $antri;
        // }
        return view('pasiens.statusAntrian', compact('pasien','antri'));
    }

    public function cetakAntrian(ReservasiOnline $antri)
    {
        $data = ReservasiOnline::where('uuid',$antri->uuid)
                                ->get();
        // dd($data);
        // $data = ReservasiOnline::all();
        // dd($data);
        $pdf = Pdf::loadView('cetaks.cetakAntri', compact('data'))->setPaper('a6','portrait');
        return $pdf->stream('Antrian.pdf');
        // return view('cetaks.cetakAntri', compact('data'));
    }
    
    public function riwayatPeriksa()
    {
        // $pasien = Pasien::where('username',$username)
        //         ->get();
        // $dokter = JadwalDokter::all();
        $username = session('pasien')['0']['noktp'];
        $pasien = Pasien::where('noktp',$username)
                ->get();
        $riwayat = ReservasiOnline::where('pasien_id',$pasien[0]->id)
        ->get();
        return view('pasiens.riwayatPeriksa', compact('pasien','riwayat'));
    }
    // public function datadiri()
    // {
    //     $username = session('pasien')['0']['username'];
    //     $pasien = Pasien::where('username',$username)
    //             ->get();
    //     return view('pasiens.dataDiri', compact('pasien'));
        
    // }

    public function jadwalDokter()
    {
        $sapa = session('pasien')['0']['sapaan'];
        $sapaan = Sapaan::where('nama',$sapa)
                ->get();
        // $dokters = DB::table('poli')
        //         ->join('dokter', 'dokter.kodepolibpjs', '=', 'poli.kodepolibpjs')
        //         ->select('poli.namapoli','dokter.nama')
        //         ->get();
        $polis = Poli::all();
        // $polis = Poli::all
        // $polis = Dokter::all()
        //         ->select('kodepolibpjs','nama')
        //         ->groupBy('kodepolibpjs');
        // dd($jadwal);
        return view('pasiens.jadwalDokter1', compact('sapaan','polis'));
    }

    // public function skriningMandiri()
    // {
    //     $username = session('pasien')['0']['noktp'];
    //     $pasien = Pasien::where('username',$username)
    //     ->get();
    //     return view('pasiens.skriningMandiri', compact('pasien'));
    // }

    public function pendaftaran()
    {
        // $username = session('pasien')['0']['username'];
        // $pasien = Pasien::where('username',$username)
        // ->get();
        // $sapaan =  session('pasien')['0']['sapaan'];
        // $ids = Sapaan::where('nama',$sapaan)
        //     ->select('Poli_id')
        //     ->get();
        // $id = $ids[0]->Poli_id;
        // session()->put('unit_id',$id);
        // $polis = DB::table('poli')
        // ->where('id','=',$id)
        // ->orWhere('id','=','3')
        // ->get();
        $sapaan =  session('pasien')['0']['sapaan'];
        $data = Sapaan::where('nama',$sapaan)
            ->get();
        return view('pasiens.pendaftaran',compact('data'));
    }
    public function pendaftaran1(Request $request)
    {
        // $username = $request->username;
        $poli = $request->poli_id;
        // $pasien = Pasien::where('username',$username)
        // ->get();
        // dump($request);
        // $unit_id = session('unit_id');
        $today = date('Y-m-d');
        $data = JadwalDokter::where('poli_id',$poli)
                              ->where('praktek',1)
                              ->get();
        // dd($data);
        return view('pasiens.daftar2', compact('data'));
    }
    public function Pendaftaran2(Request $request)
    {

        $jadwal = $request->jadwaldokter;
        $data = JadwalDokter::where('id',$jadwal)
                            ->get();
        return view('pasiens.daftar3', compact('data'));
    }

    public function getDokter(request $request)
    {
        $id = $request->dokter;
        $dokters = JadwalDokter::where('id',$id)
                    ->select('nama')
                    ->get();
        foreach ($dokters as $dokter){
            echo "$dokter->";
        }            
    }
    public function getWaktu(request $request)
    {
        $id = $request->dokter;
        $dokters = JadwalDokter::where('id',$id)
                    ->select('mulai','selesai','waktu_poli')
                    ->get();
        foreach ($dokters as $dokter){
            if ($dokter->waktu_poli == 1) {
                echo "Pagi: $dokter->mulai - $dokter->selesai";
            } else {
                echo "Sore: $dokter->mulai - $dokter->selesai";
            }
        }            
    }
    // public function pendaftaran2($username)
    // {
    //     $pasien = Pasien::where('username',$username)
    //     ->get();
    //     $dokters = Dokter::all();
    //     $polis = Poli::all();
    //     return view('pasiens.pendaftaran2', compact('pasien','polis','dokters'));
    // }
    public function storePendaftaran(Request $request)
    {
        $data = JadwalDokter::where('id',$request->jadwal_id)
        ->get();
        $pasien = session('pasien')['0']['id'];
        $dokter = $data[0]->dokter_id;
        $poli =  $data[0]->poli_id;
        $tgl = $data[0]->tgl;
        $bayar = $request->bayar;
        $waktu = $data[0]->waktu_poli;
        $daftarsebelum = ReservasiOnline::where('tgl_daftar',$tgl)
                                        ->latest()->first();
        if($daftarsebelum === null) {
            $antrian = 1;
        } else {
            $antri = $daftarsebelum->no_antrian;
            $antrian = $antri + 1;
        };
        // dd($poli);
        $uuid = PasienController::guidv4($data=null);
        ReservasiOnline::create([
            'pasien_id' => $pasien,
            'kso_id' => $bayar,
            'uuid' => $uuid,
            'poli_id' => $poli,
            'dokter_id' => $dokter,
            'jadwal_dokter_id' => $request->jadwal_id,
            'waktu_poli' => $waktu,
            'tgl_daftar' => $tgl,
            'no_antrian' => $antrian,
            'is_called' => 0
        ]);

        return redirect()->route('pasien.pendaftaran')->with('sukses', 'Pendaftaran Anda berhasil dilakukan');

    }

    public function logout(Request $request) : RedirectResponse
    {
        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        session()->flush();

        return redirect()->route('/');
    }

    public function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
