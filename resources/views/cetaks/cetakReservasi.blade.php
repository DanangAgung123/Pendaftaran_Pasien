<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Reservasi</title>
</head>
<body>
    <div style="text-align: center">
        <h2>Data Reservasi</h2>
        <p>Untuk Periode {{ $bulan }}</p>
    </div>
    <table style="width: 100%">
        <thead>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Nama Dokter</th>
            <th>Poli Tujuan</th>
            <th>Tanggal Daftar</th>
            <th>Tanggal Kunjungan</th>
        </thead>
        @foreach ($reservasi as $data )
        <tbody>
            <td style="width: 3%">{{ $loop->iteration }}</td>
            <td style="width: 20%">{{ $data->pasien->nama }}</td>
            <td style="width: 20%">{{ $data->dokter->nama }}</td>
            <td style="width: 20%">{{ $data->poli->namaunit }}</td>
            <td style="width: 15%">{{ $data->tgl_daftar }}</td>
            @if ($data->tgl_kunjungan == null)
                <td style="width: 15%">Belum Berkunjung</td>
            @else
                <td style="width: 15%">{{ $data->tgl_kunjungan }}</td>
            @endif
        </tbody>
        @endforeach
    </table>
</body>
</html>