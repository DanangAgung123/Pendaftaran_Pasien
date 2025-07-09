<?php

namespace App\Exports;

use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PasienExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pasien::all();
    }
    public function map($pasien): array
    {
        return [
            $pasien->id,
            $pasien->noktp,
            $pasien->normx,
            $pasien->nama,
            $pasien->alamat,
            $pasien->tmplahir,
            $pasien->tgllahir,
            $pasien->kelamin,
            $pasien->pendidikan,
            $pasien->agama,
            $pasien->suku,
            $pasien->notelp
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'NIK',
            'NO Rekam Medis',
            'Nama Pasien',
            'Alamat',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Kelamin',
            'Pendidikan',
            'Agama',
            'Suku',
            'No Telpon',
        ];
    }
}
