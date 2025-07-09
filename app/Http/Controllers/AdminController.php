<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Poli;
use App\Models\Admin;
use App\Models\Berita;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Sapaan;
use App\Models\HariLibur;
use App\Models\DokterPoli;
use App\Models\DokterUnit;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use App\Exports\PasienExport;
use App\Models\ReservasiOnline;
use App\Exports\ReservasiExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function exportReservasi() 
    {
        return Excel::download(new ReservasiExport, 'reservasi.xlsx');
    }
    public function exportPasien() 
    {
        return Excel::download(new PasienExport, 'pasien.xlsx');
    }
    public function index()
    {
        $data = Dokter::all();
        $poli = Poli::all();
        return view('admins.index',compact('data', 'poli'));
    }
    public function data()
    {
        $data = Admin::all();
        return view('admins.dataAdmin',compact('data'));
    }
    public function dokterUnit()
    {
        $data = DokterPoli::all();
        $dokter = Dokter::all();
        $unit = Poli::all();
        // dd($dokter);
        return view('admins.dokterUnit',compact('data','unit', 'dokter'));
    }
    public function jadwalDokter(Request $request)
    {
        
        if (request('non')) {
            $menon = JadwalDokter::where('id',$request->non)
            ->get();
            $menon[0]->update([
                'praktek' => 0
            ]);
        }

        if (request('aktif')) {
        $menak = JadwalDokter::where('id',$request->aktif)
                                ->get();
        $menak[0]->update([
            'praktek' => 1
        ]);
        }
        $data = JadwalDokter::all();
        if (request('tglawal')) {
            $data = JadwalDokter::whereBetween('tgl', [$request->tglawal, $request->tglakhir])
            ->get();
        }
        $dokter = Dokter::all();
        $unit = Poli::all();
        $tanggal = JadwalDokter::select('tgl')
                                ->groupByRaw('tgl')
                                ->get();
        return view('admins.jadwalDokter',compact('data','dokter','unit','tanggal'));
    }
    
     public function hariLibur()
     {
         $data = HariLibur::all();
         return view('admins.hariLibur',compact('data'));
     }
     
     public function berita()
     {
         $data = Berita::all();
         return view('admins.berita',compact('data'));
     }

     public function poli()
     {
         $data = Poli::all();
         return view('admins.poli',compact('data'));
     }
     public function sapaan()
     {
        $data = Sapaan::all();
        $unit = Poli::all();
         return view('admins.sapaan',compact('data','unit'));
     }
     public function kota()
     {
        $data = Kota::paginate(10);
         return view('admins.kota',compact('data'));
     }
     
     public function dataPasien()
     {
         $data = Pasien::all();
         return view('admins.dataPasien',compact('data'));
     }
     
     public function dataPendaftaran(Request $request)
     {
        $data = ReservasiOnline::all();
        if(request('tgldaftar')) {
            $data = ReservasiOnline::where('tgl_daftar',$request->tgldaftar)
                                ->get();
        }
        
         $tgldaftar = ReservasiOnline::select('tgl_daftar')
                                     ->groupByRaw('tgl_daftar')
                                     ->get();
        // dump($request);
         return view('admins.dataPendaftaran',compact('data','tgldaftar'));
     }
     
     public function rubahPendaftaran(Request $request)
     {
         $daftars = ReservasiOnline::select('tgl_daftar')
                                     ->groupByRaw('tgl_daftar')
                                     ->get();
        $dokters = ReservasiOnline::select('dokter_id')
                                ->groupByRaw('dokter_id')
                                ->get();
        $dokterawal = ReservasiOnline::where('tgl_daftar',$request->tgldaftar)
                                     ->where('dokter_id',$request->dokterawal)
                                     ->get();
        $dokterrubah = ReservasiOnline::where('tgl_daftar',$request->tgldaftar)
                                     ->where('dokter_id',$request->dokterrubah)
                                     ->get();
        if (request('pindah')) {
        $pindah = ReservasiOnline::where('id',$request->pindah)
                                ->get();
        $pindah[0]->update([
            'dokter_id' => $request->pindah
            ]);
        }                      
       
        // dump($pindah);
         return view('admins.rubahPendaftaran',compact('daftars','dokters','dokterawal','dokterrubah'));
     }

     public function konfirmasiPendaftaran(Request $request ,ReservasiOnline $daftar)
     {
        // dd($request);
        if (request('belum')) {
            $daftar->update([
                'tgl_kunjungan' => date('Y-m-d'),
                'is_called' => 1
            ]);
        }
        return redirect()->route('admin.dataPendaftaran')->with('sukses','Pedaftaran sudah Terkonfirmasi!');
     }
     public function postDokter(request $request)
    {
        $tgldaftar = $request->tglDaftar;
        $dokters = ReservasiOnline::where('tgl_daftar','=', $tgldaftar)
                    ->select('dokter_id')
                    ->groupByRaw('dokter_id')
                    ->get();
        // dump($dokters);
            echo "<option hidden>--Pilih Dokter--</option>";
        foreach($dokters as $dokter){
            echo "<option value='$dokter->dokter_id'>$dokter->dokter_id</option>";
        }
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
       Admin::create([
            'nama' => $request->name,
            'username' => $request->username,
            'level' => '1',
            'password'=> Hash::make($request->password)
       ]);
       return redirect()->route('admin.dataAdmin')->with('sukses','Data Admin Berhasil Ditambahkan');
    }
    
    public function storeJadwal(Request $request)
    {
        // dd($request);
        // $namadokter = Dokter::where('dokter_id', $request->dokter_id)
        //             ->select('nama')
        //             ->get();
        // $namaunit = Poli::where('unit_id', $request->unit_id)
        //             ->select('namaunit')
        //             ->get();
       JadwalDokter::create([
            'dokter_id' => $request->dokter_id,
            'poli_id' => $request->poli_id,
            'tgl' => $request->tgl,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'kuota' => $request->kuota,
            'praktek' => 1 ,
            'waktu_poli' => $request->waktupoli
       ]);
       return redirect()->route('admin.jadwalDokter')->with('sukses','Data Jadwal Dokter Berhasil Ditambahkan');
    }
    public function storeBerita(Request $request)
    {
        // dump($request->file('gambar')->store());
        // $request->validate([
        //     'judul' => 'required',
        //     'keterangan' => 'required',
        //     'gambar' => 'required|image|mimes:jpeg,jpg,png|max:5000'
        // ],[
        //     'judul.required' => 'Judul tidak boleh kosong', 
        //     'keterangan.required' => 'Isi keterangan', 
        //     'gambar.required' => 'Tambahkan gambar', 
        // ]);
       Berita::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'gambar' => $request->file('gambar')->store()
       ]);
       return redirect()->route('admin.berita')->with('sukses','Data Berita Berhasil Ditambahkan');
    }
    public function storeDokter(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'notelp' => 'required',
            'nik' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:5000'
        ],[
            'nama.required' => 'Isi keterangan', 
            'notelp.required' => 'Tambahkan gambar', 
            'nik.required' => 'Tambahkan gambar', 
            'foto.required' => 'Tambahkan gambar', 
        ]);
       Dokter::create([
            'nama' => $request->nama,
            'notelp' => $request->notelp,
            'nik' => $request->nik,
            'foto' => $request->file('foto')->store()
       ]);
       return redirect()->route('admin.home')->with('sukses','Data Dokter Berhasil Ditambahkan');
    }

    public function storeDokterUnit(Request $request)
    {
        // $namadokter = Dokter::where('id', $request->id)
        //             ->select('nama')
        //             ->get();
        // $namaunit = Poli::where('id', $request->id)
        //             ->select('namaunit')
        //             ->get();
        // dd($namadokter);
        // dd($request);
       DokterPoli::create([
            'dokter_id' => $request->dokter_id,
            // 'namadokter' => $namadokter[0]['nama'],
            'poli_id' => $request->poli_id
            // 'namaunit' => $namaunit[0]['namaunit']
       ]);
       return redirect()->route('admin.dokterUnit')->with('sukses','Data Dokter Poli Berhasil Ditambahkan');
    }
    
    public function storeLibur(Request $request)
    {
       HariLibur::create([
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'keterangan' => $request->keterangan
       ]);
       return redirect()->route('admin.hariLibur')->with('sukses','Data Hari Libur Berhasil Ditambahkan');
    }
    
    public function storePoli(Request $request)
    {
       Poli::create([
            'poli_id' => $request->poli_id,
            'namaunit' => $request->namaunit
       ]);
       return redirect()->route('admin.poli')->with('sukses','Data Poli Berhasil Ditambahkan');
    }
    public function storeSapaan(Request $request)
    {
       Sapaan::create([
            'poli_id' => $request->poli_id,
            'nama' => $request->nama
       ]);
       return redirect()->route('admin.sapaan')->with('sukses','Data Sapaan Berhasil Ditambahkan');
    }
    public function storeKota(Request $request)
    {
       Sapaan::create([
            'kode' => $request->kode,
            'propinsi' => $request->propinsi,
            'kdKotakab' => $request->kdKotakab,
            'kabupaten' => $request->kabupaten,
            'kdKec' => $request->kdKec,
            'kecamatan' => $request->kecamatan,
            'kdDes' => $request->kdDes,
            'kelurahan' => $request->kelurahan,
            'kodePos' => $request->kodePos
       ]);
       return redirect()->route('admin.kota')->with('sukses','Data Kota Berhasil Ditambahkan');
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
    public function editDokter(Dokter $dokter )
    {
        session()->forget('sukses');
        // dd($berita);
        $data = $dokter;
        return view('admins.editDokter', compact('dokter') );
    }


    public function editBerita(Berita $berita )
    {
        // dd($berita);
        session()->forget('sukses');

        $data = $berita;
        session()->put('berita','berita');
        return view('admins.editBerita', compact('berita') );
    }
    public function editPoli(Poli $poli )
    {
        session()->forget('sukses');

        // dd($berita);
        $data = $poli;
        return view('admins.editPoli', compact('poli') );
    }
    public function editSapaan(Sapaan $sapaan )
    {
        // dd($berita);
        session()->forget('sukses');

        $data = $sapaan;
        return view('admins.editSapaan', compact('sapaan') );
    }
    public function editKota(Kota $kota )
    {
        // dd($berita);
        session()->forget('sukses');

        $data = $kota;
        return view('admins.editKota', compact('kota') );
    }
    public function editAdmin(Admin $admin )
    {
        // dd($berita);
        session()->forget('sukses');

        return view('admins.editAdmin', compact('admin') );
    }
    public function editPasien(Pasien $pasien )
    {
        // dd($berita);
        session()->forget('sukses');

        $data = $pasien;
        $propinsi = DB::table('kota')
                    ->select('kode', 'propinsi')
                    ->groupByRaw('kode, propinsi')
                    ->get();
        return view('admins.editPasien', compact('pasien','propinsi') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBerita(Request $request, Berita $berita)
    {
        // dd($request);
        if(empty($request->foto))
        {
            $berita->update([
                'judul' => $request->judul,
                'keterangan' => $request->keterangan
            ]);
        } else {
            $berita->update([
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'gambar' => $request->file('fambar')->store()
            ]);
        }

        return redirect()->route('admin.berita')->with('sukses','Data Berita Berhasil Dirubah');
    }
    
    
    public function updateDokter(Request $request, Dokter $dokter)
    {
        // dd($request);
        if(empty($request->foto))
        {
            $dokter->update([
                'dokter_id' => $request->dokter_id,
                'nama' => $request->nama,
                'notelp' => $request->notelp,
                'nik' => $request->nik,
            ]);
        } else {
            $dokter->update([
                'dokter_id' => $request->dokter_id,
                'nama' => $request->nama,
                'notelp' => $request->notelp,
                'nik' => $request->nik,
                'foto' => $request->file('foto')->store()
            ]);
        }

        return redirect()->route('admin.home')->with('sukses','Data Dokter Berhasil Dirubah');
    }
    public function updateAdmin(Request $request, Admin $admin)
    {
        // dd($request);
        if(empty($request->password))
        {
            $admin->update([
                'nama' => $request->name,
                'username' => $request->username
            ]);
        } else {
            $admin->update([
                'nama' => $request->name,
                'username' => $request->username,
                'password'=> Hash::make($request->password)
            ]);
        }

        return redirect()->route('admin.data')->with('sukses','Data Pengguna Berhasil Dirubah');
    }
    public function updatePoli(Request $request, Poli $poli)
    {
        // dd($request);
        
            $poli->update([
                'namaunit' => $request->namaunit
            ]);
        
            // session()->forget('berita');
        return redirect()->route('admin.poli')->with('sukses','Data Poli Berhasil Dirubah');
    }
    public function updatePasien(Request $request, Pasien $pasien)
    {
        // dd($request);
        
            $pasien->update([
            'normx' => $request->normx,
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
            ]);
        
            
        return redirect()->route('admin.poli')->with('sukses','Data Pasien Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyBerita(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('admin.berita');
    }
    
    public function destroyDokter(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('admin.home');
    }

    public function destroyDokterUnit(DokterPoli $dokterUnit)
    {
        $dokterUnit->delete();
        return redirect()->route('admin.dokterUnit');
    }

    public function destroyLibur(HariLibur $libur)
    {
        $libur->delete();
        return redirect()->route('admin.hariLibur');
    }
    public function destroyPoli(Poli $poli)
    {
        $poli->delete();
        return redirect()->route('admin.poli');
    }
    public function destroySapaan(Sapaan $sapaan)
    {
        $sapaan->delete();
        return redirect()->route('admin.sapaan');
    }
    public function destroyKota(Kota $kota)
    {
        $kota->delete();
        return redirect()->route('admin.kota');
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('/');
    }
}
