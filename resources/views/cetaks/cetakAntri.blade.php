<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <title>Cetak Antrian</title>
    <style>
  
    </style>
</head>
<body>
  <div style="text-align: center">
      <h3>Bukti Reservasi</h3>
  </div>
  @foreach ($data as $daftar )
    <table style="width: 100%">
    <tr>
      <td>Nama Lengkap</td>
      <td>{{ $daftar->pasien->nama }}</td>
    </tr>
    <tr>
      <td>Nomor Antrian</td>
      <td>{{ $daftar->no_antrian }}</td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td>{{ $daftar->tgl_daftar }}</td>
    </tr>
    <tr>
      <td>Poli</td>
      <td>{{ $daftar->poli->namaunit }}</td>
    </tr>
    <tr>
      <td>Pembayaran</td>
      <td>{{ $daftar->kso_id }}</td>
    </tr>
    <tr>
      <td>Dokter</td>
      <td>{{ $daftar->dokter->nama }}</td>
    </tr>
    <tr>
      <td>Praktek</td>
      @if ($daftar->waktu_poli === 1)
        <td>Pagi {{ $daftar->jadwaldokter->mulai }} - {{ $daftar->jadwaldokter->selesai }}</td>
      @else
        <td>Sore {{ $daftar->jadwaldokter->mulai }} - {{ $daftar->jadwaldokter->selesai }}</td>
      @endif
    </tr>
    {{-- <tr><br></tr>
    <tr><br></tr> --}}
    {{-- <tr style="text-align: center">
      <td colspan="2"><h4>Rumah Sakit Ibu Dan Anak AMANAH Probolinggo</h4></td>
    </tr>
    <tr style="text-align: center; margin-bottom: -30px;">
      <td colspan="2"><p>Jl. Dr. Moch Saleh No.43 Probolinggo</p></td>
    </tr>
    <tr style="text-align: center; margin-top: 10px;">
      <td colspan="2"><p>Call Center (0335) 423487. Info & Pendaftaran 0853-3457-4169</p></td>
    </tr> --}}
  </table>
  @endforeach
  <br>
    <div style="text-align: center">
      <h4>Rumah Sakit Ibu Dan Anak AMANAH Probolinggo</h4>
      <p>Jl. Dr. Moch Saleh No.43 Probolinggo</p>
      <p>Call Center (0335) 423487. Info & Pendaftaran 0853-3457-4169</p>
    </div>
  

    {{-- <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="card" >
                    <div style="text-align: center">
                        <h3>Bukti Reservasi</h3>
                    </div>
                    @foreach ( $data as $daftar )
                    <div class="card-body">
                        <br>
                    <div class="form-group">
                      <div class="row mb-2">
                        <div class="col-lg-3">
                          <label for="username">Nama Lengkap </label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $daftar->pasien->nama }}</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row mb-2">
                        <div class="col-lg-3">
                          <label for="username">No Antrian </label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $daftar->no_antrian }}</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row mb-2">
                        <div class="col-lg-3">
                          <label for="username">Tanggal </label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $daftar->tgl_daftar }}</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row mb-2">
                        <div class="col-lg-3">
                          <label for="username">Poli </label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $daftar->poli->namaunit }}</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row mb-2">
                        <div class="col-lg-3">
                          <label for="username">Pembayaran </label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $daftar->kso_id }}</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row mb-2">
                        <div class="col-lg-3">
                          <label for="username">Dokter </label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $daftar->dokter->nama }}</label>
                        </div>
                      </div>
                    </div>
                        @if ($daftar->waktu_poli === 1)
                        <div class="form-group">
                        <div class="row mb-2">
                            <div class="col-lg-3">
                            <label for="username">Praktek </label>
                            </div>
                            <div class="col-lg-9">
                            <label >Praktek     : Pagi {{ $daftar->jadwaldokter->mulai }} - {{ $daftar->jadwaldokter->selesai }}</label>
                            </div>
                        </div>
                        </div>
                        @else
                        <div class="form-group">
                        <div class="row mb-2">
                            <div class="col-lg-3">
                            <label for="username">Praktek </label>
                            </div>
                            <div class="col-lg-9">
                            <label >Praktek     : Sore {{ $daftar->jadwaldokter->mulai }} - {{ $daftar->jadwaldokter->selesai }}</label>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
</body>
</html>
