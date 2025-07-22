<?php

namespace App\Exports;

use App\Models\ReservasiOnline;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservasiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
        {
            $data = array(
                'reservasi' => ReservasiOnline::all(),
            );
            return view('cetaks.cetakReservasi');
        }

    // public function collection()
    // {
    //     return ReservasiOnline::all();
    // }

    // public function map($reservasi): array
    // {
    //     return [
    //         $reservasi->id,
    //         $reservasi->pasien->nama,
    //         $reservasi->kso_id,
    //         $reservasi->dokter->nama,
    //         $reservasi->poli->namaunit,
    //         $reservasi->tgl_daftar,
    //         $reservasi->tgl_kunjungan
    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //         'id',
    //         'Nama Pasien',
    //         'Pembayaran',
    //         'Nama Dokter',
    //         'Poli',
    //         'Tanggal Daftar',
    //         'Tanggal Kunjungan',
    //     ];
    // }
}
