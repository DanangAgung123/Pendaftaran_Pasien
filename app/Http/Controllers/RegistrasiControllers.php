<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Poli;
use App\Models\Admin;
use App\Models\Berita;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrasiControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $dokter = Dokter::all();
        $berita = Berita::all();
        $poli = Poli::all();
        $jadwal = JadwalDokter::where('praktek','1')
                                ->select('dokter_id')
                                ->groupByRaw('dokter_id')
                                ->get();
        $today = date('Y-m-d');
        $jadwalskr = JadwalDokter::where('praktek', '1')
                                ->where('tgl', $today)
                                ->get();
        // dump($today);
        return view('dashboard', compact('dokter','berita','poli','jadwal','jadwalskr'));
    }

    public function index()
    {
        $propinsi = DB::table('kota')
                    ->select('kode', 'propinsi')
                    ->groupByRaw('kode, propinsi')
                    ->get();
        
        return view('register2', compact('propinsi'));
    }
    public function index2()
    {
        $propinsi = DB::table('kota')
                    ->select('kode', 'propinsi')
                    ->groupByRaw('kode, propinsi')
                    ->get();
        return view('register', compact('propinsi'));
    }

    public function getKabupaten(request $request)
    {
        $kodePropinsi = $request->kodePropinsi;
        $kabupatens = Kota::where('propinsi', $kodePropinsi)
                    ->select('kdKotaKab', 'kabupaten')
                    ->groupByRaw('kdKotaKab, kabupaten')
                    ->get();
            echo "<option hidden>--Pilih Kota/Kabupaten--</option>";
        foreach($kabupatens as $kabupaten){
            echo "<option value='$kabupaten->kabupaten'>$kabupaten->kabupaten</option>";
        }
    }
    public function getKecamatan(request $request)
    {
        $kdKotaKab = $request->kdKotaKab;
        $kecamatans = Kota::where('kabupaten', $kdKotaKab)
                    ->select('kdKec', 'kecamatan')
                    ->groupByRaw('kdKec, kecamatan')
                    ->get();
            echo "<option hidden>--Pilih Kecamatan--</option>";
        foreach($kecamatans as $kecamatan){
            echo "<option value='$kecamatan->kecamatan'>$kecamatan->kecamatan</option>";
        }
    }
    public function getKelurahan(request $request)
    {
        $kdKec = $request->kdKec;
        $kelurahans = Kota::where('kecamatan', $kdKec)
                    ->select('kdDes', 'kelurahan')
                    ->groupByRaw('kdDes, kelurahan')
                    ->get();
            echo "<option hidden>--Pilih Desa/Kelurahan--</option>";
        foreach($kelurahans as $kelurahan){
            echo "<option value='$kelurahan->kelurahan'>$kelurahan->kelurahan</option>";
        }
    }
    public function getKodepos(request $request)
    {
        $kdDes = $request->kdDes;
        $kodeposs = DB::table('kota')
                ->where('kelurahan', $kdDes)
                ->get();
        foreach($kodeposs as $kodepos){
            echo "<option value='$kodepos->kodePos'>$kodepos->kodePos</option>";
            
        }
        
    }

    public function loginuser(request $request)
    {
        $data = $request->only('username', 'password');
        
        // dd($level);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
           
            $username = $request->username;
            $pasien = Pasien::where('noktp',$username)
                    ->get();
            $admin = Admin::where('username',$username)
                    ->get();
            $info = Admin::where('username',$username)
                            ->select('level')
                            ->get();
            $level = $info[0];
            // pasien.home yang benar, admin.home hanya percobaan
            if ($level['level'] === '2'){
                session()->put('pasien',$pasien);
                return redirect()->route('pasien.home'); 
            } else {
                session()->put('pasien',$admin);
                return redirect()->route('admin.home');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username dan Password Tidak Valid');
        }

    }
    public function loginadmin(request $request)
    {
        $data = $request->only('username', 'password');
        
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            
            $username = $request->username;
                $pasien = Pasien::where('noktp',$username)
                        ->get();
                $admin = Admin::where('username',$username)
                        ->get();
                $info = Admin::where('username',$username)
                                ->select('level')
                                ->get();
                $level = $info[0];
            // pasien.home yang benar, admin.home hanya percobaan
            if ($level['level'] === '2'){
                session()->put('pasien',$pasien);
                return redirect()->route('pasien.home'); 
            } else {
                session()->put('pasien',$admin);
                return redirect()->route('admin.home');
            }
        } else {
            return redirect()->route('loginuser')->with('error', 'Username dan Password Tidak Valid');
        }

    }
    public function getUmmur(request $request)
    {
        // {{ dd($request); }}
        // $today = 'datetime:y-m-d';
        // $lahir = $request->tglahir;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $xpasien = Pasien::latest()->first();
        $normbaru = $xpasien->normx + 1;
        // $data = $request->normx;
        // $data=RegistrasiControllers::guidv4($data=null);
        // dd($normbaru);
        Pasien::create([
            'normx' => $normbaru,
            'nokk' => $request->nokk,
            'nama' => $request->nama,
            'sapaan' => $request->sapaan,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'propinsi' => $request->propinsi,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kodepos' => $request->kodepos,
            'pekerjaan' => $request->pekerjaan,
            'tmplahir' => $request->tmplahir,
            'tgllahir' => $request->tgllahir,
            'kelamin' => $request->kelamin,
            'statuskawin' => $request->statuskawin,
            'pendidikan' => $request->pendidikan,
            'agama' => $request->agama,
            'suku' => $request->suku,
            'notelp' => $request->notelp,
            'noktp' => $request->nik,
            'noasuransi' => $request->noasuransi,
            'kk' => $request->nobpjs,
            'umur' => $request->umur,
            'namapasangan' => $request->namapasangan,
            'pekerjaanpasangan' => $request->pekerjaanpasangan,
            'namabapak' => $request->namabapak,
            'namaibu' => $request->namaibu,
            'alamatskr' => $request->alamatskr,
            'kelurahanskr' => $request->kelurahanskr,
            'kecamatanskr' => $request->kecamatanskr,
            'kabupatenskr' => $request->kabupatenskr,
            'propinsiskr' => $request->propinsiskr,
            'rtskr' => $request->rtskr,
            'rwskr' => $request->rwskr,
            'pekerjaanbapak' => $request->pekerjaanbapak,
            'pekerjaanibu' => $request->pekerjaanibu,
            'bahasa' => $request->bahasa,
            'penerjemah' => $request->penerjemah,
            'infodari' => $request->info
            // 'username' => $request->username ,
            // 'password' => Hash::make($request->password)
        ]);
         Admin::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'level' => '2',
            'password'=> Hash::make($request->password)
       ]);

        return redirect()->route('login')->with('success', 'Registrasi telah berhasil, gunakan USERNAME dan PASSWORD untuk login');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Random bytes
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
