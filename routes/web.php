<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RegistrasiControllers;
use Illuminate\Support\Facades\Route;

Route::get('/loginuser', function () {
    return view('login');
})->name('loginuser');
Route::get('/login', function () {
    return view('loginuser');
})->name('login');
// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/', [RegistrasiControllers::class, 'dashboard'])->name('/');
// Route::get('/coba', function () {
//     return view('index');
// })->name('coba');

Route::post('/loginadmin', [RegistrasiControllers::class, 'loginadmin'] )->name('loginadmin');
Route::post('/loginuser', [RegistrasiControllers::class, 'loginuser'] )->name('loginuser');
// Route::get('/register2', [RegistrasiControllers::class, 'index'] )->name('register2');
Route::get('/register', [RegistrasiControllers::class, 'index2'] )->name('register');
Route::post('/getKabupaten', [RegistrasiControllers::class, 'getKabupaten'])->name('getKabupaten');
Route::post('/getKecamatan', [RegistrasiControllers::class, 'getKecamatan'])->name('getKecamatan');
Route::post('/getKelurahan', [RegistrasiControllers::class, 'getKelurahan'])->name('getKelurahan');
Route::post('/getKodepos', [RegistrasiControllers::class, 'getKodepos'])->name('getKodepos');
Route::post('/getUmur', [RegistrasiControllers::class, 'getUmur'])->name('getUmur');
Route::post('/register', [RegistrasiControllers::class, 'store'])->name('register.store');
Route::post('/postDokter', [AdminController::class, 'postDokter'])->name('postDokter');

Route::middleware(['auth','prevent-back'])->group(function() {
Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/dokterUnit', [AdminController::class, 'dokterUnit'])->name('admin.dokterUnit');
Route::get('/admin/data', [AdminController::class, 'data'])->name('admin.data');
Route::get('/admin/jadwalDokter', [AdminController::class, 'jadwalDokter'])->name('admin.jadwalDokter');
Route::get('/admin/hariLibur', [AdminController::class, 'hariLibur'])->name('admin.hariLibur');
Route::get('/admin/berita', [AdminController::class, 'berita'])->name('admin.berita');
Route::get('/admin/poli', [AdminController::class, 'poli'])->name('admin.poli');
Route::get('/admin/sapaan', [AdminController::class, 'sapaan'])->name('admin.sapaan');
Route::get('/admin/kota', [AdminController::class, 'kota'])->name('admin.kota');
Route::get('/admin/dataPasien', [AdminController::class, 'dataPasien'])->name('admin.dataPasien');
Route::get('/admin/dataPendaftaran', [AdminController::class, 'dataPendaftaran'])->name('admin.dataPendaftaran');
Route::get('/admin/laporanReservasi', [AdminController::class, 'laporanReservasi'])->name('admin.laporanReservasi');
Route::get('/admin/rubahPendaftaran', [AdminController::class, 'rubahPendaftaran'])->name('admin.rubahPendaftaran');
Route::put('/admin/konfirmasiPendaftaran/{daftar:id}', [AdminController::class, 'konfirmasiPendaftaran'])->name('admin.konfirmasiPendaftaran');
// Route::post('/admin/dataPendaftaran', [AdminController::class, 'dataPendaftaran'])->name('admin.dataPendaftaran');
Route::post('/admin/cetakLaporan', [AdminController::class, 'cetakLaporan'])->name('admin.cetakLaporan');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::post('/admin/storeBerita', [AdminController::class, 'storeBerita'])->name('admin.storeBerita');
Route::post('/admin/storeDokter', [AdminController::class, 'storeDokter'])->name('admin.storeDokter');
Route::post('/admin/storeDokterUnit', [AdminController::class, 'storeDokterUnit'])->name('admin.storeDokterUnit');
Route::post('/admin/storeLibur', [AdminController::class, 'storeLibur'])->name('admin.storeLibur');
Route::post('/admin/storeJadwal', [AdminController::class, 'storeJadwal'])->name('admin.storeJadwal');
Route::post('/admin/storePoli', [AdminController::class, 'storePoli'])->name('admin.storePoli');
Route::post('/admin/storeSapaan', [AdminController::class, 'storeSapaan'])->name('admin.storeSapaan');
Route::post('/admin/storeKota', [AdminController::class, 'storeKota'])->name('admin.storeKota');
Route::get('/admin/editBerita/{berita:id_berita}', [AdminController::class, 'editBerita'])->name('admin.editBerita');
Route::get('/admin/editPoli/{poli:id}', [AdminController::class, 'editPoli'])->name('admin.editPoli');
Route::get('/admin/editSapaan/{sapaan:id}', [AdminController::class, 'editSapaan'])->name('admin.editSapaan');
Route::get('/admin/editKota/{kota:id}', [AdminController::class, 'editKota'])->name('admin.editKota');
Route::get('/admin/editDokter/{dokter:id}', [AdminController::class, 'editDokter'])->name('admin.editDokter');
Route::get('/admin/editPasien/{pasien:id}', [AdminController::class, 'editPasien'])->name('admin.editPasien');
Route::get('/admin/editAdmin/{admin:id}', [AdminController::class, 'editAdmin'])->name('admin.editAdmin');
Route::put('/admin/updateBerita/{berita:id_berita}', [AdminController::class, 'updateBerita'])->name('admin.updateBerita');
Route::put('/admin/updatePoli/{poli:id}', [AdminController::class, 'updatePoli'])->name('admin.updatePoli');
Route::put('/admin/updateKota/{kota:id}', [AdminController::class, 'updateKota'])->name('admin.updateKota');
Route::put('/admin/updateDokter/{dokter:id}', [AdminController::class, 'updateDokter'])->name('admin.updateDokter');
Route::put('/admin/updatePasien/{pasien:id}', [AdminController::class, 'updatePasien'])->name('admin.updatePasien');
Route::put('/admin/updateAdmin/{admin:id}', [AdminController::class, 'updateAdmin'])->name('admin.updateAdmin');
Route::delete('/admin/destroyBerita/{berita:id_berita}', [AdminController::class, 'destroyBerita'])->name('admin.destroyBerita');
Route::delete('/admin/destroyPoli/{poli:id}', [AdminController::class, 'destroyPoli'])->name('admin.destroyPoli');
Route::delete('/admin/destroyJadwal/{jadwal:id}', [AdminController::class, 'destroyJadwal'])->name('admin.destroyJadwal');
Route::delete('/admin/destroySapaan/{sapaan:id}', [AdminController::class, 'destroySapaan'])->name('admin.destroySapaan');
Route::delete('/admin/destroyKota/{kota:id}', [AdminController::class, 'destroyKota'])->name('admin.destroyKota');
Route::delete('/admin/destroyDokter/{dokter:dokter_id}', [AdminController::class, 'destroyDokter'])->name('admin.destroyDokter');
Route::delete('/admin/destroyDokterUnit/{dokterUnit:id}', [AdminController::class, 'destroyDokterUnit'])->name('admin.destroyDokterUnit');
Route::delete('/admin/destroyLibur/{libur:id}', [AdminController::class, 'destroyLibur'])->name('admin.destroyLibur');
Route::delete('/admin/destroyPasien/{pasien:id}', [AdminController::class, 'destroyPasien'])->name('admin.destroyPasien');
Route::delete('/admin/destroyAdmin/{admin:id}', [AdminController::class, 'destroyAdmin'])->name('admin.destroyAdmin');
Route::get('/admin/exportReservasi',[AdminController::class, 'exportReservasi'])->name('admin.exportReservasi');
Route::get('/admin/exportPasien',[AdminController::class, 'exportPasien'])->name('admin.exportPasien');


Route::get('/pasien/home', [PasienController::class, 'pendaftaran'])->name('pasien.home');
Route::get('/pasien/datadiri', [PasienController::class, 'datadiri'])->name('pasien.datadiri');
Route::get('/pasien/jadwalDokter', [PasienController::class, 'jadwalDokter'])->name('pasien.jadwalDokter');
Route::get('/pasien/skriningMandiri', [PasienController::class, 'skriningMandiri'])->name('pasien.skriningMandiri');
Route::get('/pasien/statusAntrian', [PasienController::class, 'statusAntrian'])->name('pasien.statusAntrian');
Route::get('/pasien/cetakAntrian/{antri:uuid}', [PasienController::class, 'cetakAntrian'])->name('pasien.cetakAntrian');
Route::get('/pasien/riwayatPeriksa', [PasienController::class, 'riwayatPeriksa'])->name('pasien.riwayatPeriksa');
Route::get('/pasien/pendaftaran', [PasienController::class, 'index'])->name('pasien.pendaftaran');
Route::post('/pasien/storePendaftaran', [PasienController::class, 'storePendaftaran'])->name('pasien.storePendaftaran');
Route::post('/pasien/pendaftaran1', [PasienController::class, 'pendaftaran1'])->name('pasien.pendaftaran1');
Route::post('/pasien/Pendaftaran2', [PasienController::class, 'Pendaftaran2'])->name('pasien.Pendaftaran2');
// Route::get('/pasien/pendaftaran2/{username}', [PasienController::class, 'pendaftaran2'])->name('pasien.pendaftaran2');
// Route::post('/pasien/storeDaftar', [PasienController::class, 'storeDaftar'])->name('pasien.storeDaftar');
Route::post('/getDokter', [PasienController::class, 'getDokter'])->name('getDokter');
Route::post('/getWaktu', [PasienController::class, 'getWaktu'])->name('getWaktu');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/pasien/logout', [PasienController::class, 'logout'])->name('pasien.logout');


Route::get('pasiens/daftar', function () {
    return view('pasiens.daftar');
})->name('pasiens.daftar');

Route::get('pasiens/daftar2', function () {
    return view('pasiens.daftar2');
})->name('pasiens.daftar2');

Route::get('pasiens/daftar3', function () {
    return view('pasiens.daftar3');
})->name('pasiens.daftar3');

// Route::get('pasiens/dataDiri', function () {
//     return view('pasiens.dataDiri');
// })->name('pasiens.dataDiri');

Route::get('pasiens/riwayatPeriksa', function () {
    return view('pasiens.riwayatPeriksa');
})->name('pasiens.riwayatPeriksa');