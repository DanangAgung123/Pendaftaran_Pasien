@extends('templates.adminlayout')
@section('content')
     <main class="app-main ">
        <!--begin::App Content Header-->
        <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid ">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-start">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content ">
          <!--begin::Container-->
          <div class="container-fluid">
 
            <!--begin::Row-->
            <div class="row">
              <!-- Start col -->
              <div class="col-lg-12 max-auto">
                <div class="card">
                  <div id="menuutama">
                    <div class="card-header text-center pt-3">
                      <h3>Registrasi</h3> 
                    </div>
                    <div class="card-body">
                      <form action="{{ route('admin.updatePasien',$pasien->id) }}" method="POST">
                        @csrf
                      @method('PUT')
                        <input type="text" id="normx" name="normx" hidden value="{{ $pasien->normx }}">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="nokk">No.KK</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="nokk" id="nokk" class="form-control form-control-sm" value="{{ $pasien->nokk }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="nik">NIK</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="nik" id="nik" class="form-control form-control-sm" value="{{ $pasien->noktp }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="nama">Nama Lengkap</label>
                              </div>
                              <div class="col-lg-2">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" class="form-control" id="sapaan" name="sapaan" placeholder="" value="{{ $pasien->sapaan }}" readonly>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="nama" id="nama" class="form-control form-control-sm" value="{{ $pasien->nama }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="kelamin">Jenis Kelamin</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select class="form-select" aria-label="Default select example" name="kelamin" id="kelamin" required style="width: 100%">
                                    <option value="{{ $pasien->kelamin }}">{{ $pasien->kelamin }}</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="statuskawin">Status Perkawinan</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select class="form-select" aria-label="Default select example" name="statuskawin" id="statuskawin" required style="width: 100%">
                                    <option value="{{ $pasien->statuskawin }}">{{ $pasien->statuskawin }}</option>
                                    <option value="single">Single</option>
                                    <option value="menikah">Menikah</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="menikah" style="display: none; opacity: 0;" class="shadow p-3 mb-5 bg-body rounded">
                            <div class="card z-index-1">
                              <div class="card-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <label for="namapasangan">Nama Pasangan</label>
                                    </div>
                                    <div class="col-lg-8">
                                      <div class="input-group input-group-sm mb-3">
                                        <input type="text" name="namapasangan" id="namapasangan" class="form-control form-control-sm" value="{{ $pasien->namapasangan }}"
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <label for="pekerjaanpasangan">Pekerjaan Pasangan</label>
                                    </div>
                                    <div class="col-lg-8">
                                      <div class="input-group input-group-sm mb-3">
                                        <input type="text" name="pekerjaanpasangan" id="pekerjaanpasangan" class="form-control form-control-sm" value="{{ $pasien->pekerjaanpasangan }}" 
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="tmplahir">Tempat Lahir</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="tmplahir" id="tmplahir" class="form-control form-control-sm" value="{{ $pasien->tmplahir }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="tgllahir">Tanggal Lahir</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="date" name="tgllahir" id="tgllahir" class="form-control form-control-sm" value="{{ $pasien->tgllahir }}"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="umur">Umur</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="umur" id="umur" class="form-control form-control-sm" value="{{ $pasien->umur }}"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="pendidikan">Pendidikan</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select class="form-select" aria-label="Default select example" name="pendidikan" id="pendidikan" required style="width: 100%">
                                    <option value="{{ $pasien->pendidikan }}">{{ $pasien->pendidikan }}</option>
                                    <option value="belumsekolah">Belum Sekolah</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP Sederajat">SMP Sederajat</option>
                                    <option value="SMA Sederajat">SMA Sederajat</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="suku">Suku</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select class="form-select" aria-label="Default select example" name="suku" id="suku" required style="width: 100%">
                                    <option value="{{ $pasien->suku }}">{{$pasien->suku}}</option>
                                    <option value="Jawa">Jawa</option>
                                    <option value="Madura">Madura</option>
                                    <option value="Sunda">Sunda</option>
                                    <option value="Batak">Batak</option>
                                    <option value="China">China</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="agama">Agama</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select class="form-select" aria-label="Default select example" name="agama" id="agama" required style="width: 100%">
                                    <option value="{{ $pasien->agama }}">{{ $pasien->agama }}</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="notelp">Nomor HP</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="notelp" id="notelp" class="form-control form-control-sm" value="{{ $pasien->notelp }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="nobpjs">Nomor BPJS</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="nobpjs" id="nobpjs" class="form-control form-control-sm" value="{{ $pasien->nobpjs }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="noasuransi">Nomor Asuransi</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="noasuransi" id="noasuransi" class="form-control form-control-sm" noasuransi
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="propinsi">Provinsi<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select name="propinsi" id="propinsi" class="form-select" aria-label="Default select example">
                                    <option value="{{ $pasien->propinsi }}">{{ $pasien->propinsi }}</option>
                                    @foreach ($propinsi as $data)
                                    <option value="{{ $data->propinsi }}">{{ $data->propinsi }}</option>
                                    @endforeach
                                </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="kabupaten">Kota/Kabupaten<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select name="kabupaten" id="kabupaten" class="form-select" aria-label="Default select example">
                                    <option value="{{ $pasien->kabupaten }}">{{ $pasien->kabupaten }}</option>  
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="kecamatan">Kecamatan<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select name="kecamatan" id="kecamatan" class="form-select" aria-label="Default select example">
                                    <option value="{{ $pasien->kecamatan }}">{{ $pasien->kecamatan }}</option>  
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="kelurahan">Desa/Kelurahan<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select name="kelurahan" id="kelurahan" class="form-select" aria-label="Default select example">
                                    <option value="{{ $pasien->kelurahan }}">{{ $pasien->kelurahan }}</option>  
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="kodepos">Kode Pos<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <select name="kodepos" id="kodepos" class="form-select" aria-label="Default select example" readonly >
                                    <option value="{{ $pasien->kodepos }}">{{ $pasien->kodepos }}</option>  
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="alamat">Alamat<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $pasien->alamat }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="rt">RT/RW<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-4">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="rt" id="rt" class="form-control" autocomplete="off" value="{{ $pasien->rt }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="RT">
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="rw" id="rw" class="form-control" autocomplete="off" value="{{ $pasien->rw }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="RW">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-6">
                                <label for="rt">Apakah alamat anda sekarang, sesuai dengan alamat KTP?<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-3">
                                <div class="input-group input-group-sm mb-3">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="yesno" id="yes">
                                    <label class="form-check-label" for="yes">
                                      Iya,
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="input-group input-group-sm mb-3">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="yesno" id="no">
                                    <label class="form-check-label" for="no">
                                      Tidak,
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="propinsiskr">Provinsi Sekarang<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="propinsiskr" id="propinsiskr" class="form-control" value="{{ $pasien->propinsiskr }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="kabupatenskr">Kota/Kabupaten Sekarang<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="kabupatenskr" id="kabupatenskr" class="form-control" value="{{ $pasien->kabupatenskr }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div><div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="kecamatanskr">Kecamatan Sekarang<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="kecamatanskr" id="kecamatanskr" class="form-control" value="{{ $pasien->kecamatanskr }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div><div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="kelurahanskr">Desa/Kelurahan Sekarang<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="kelurahanskr" id="kelurahanskr" class="form-control" value="{{ $pasien->kelurahanskr }}" 
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-lg-4">
                                  <label for="alamatskr">Alamat Sekarang<font style="color:#FF0000;">*</font></label>
                                </div>
                                <div class="col-lg-8">
                                  <div class="input-group input-group-sm mb-3">
                                    <input type="text" name="alamatskr" id="alamatskr" class="form-control" value="{{ $pasien->alamatskr }}"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-lg-4">
                                  <label for="rtskr">RT/RW Sekarang<font style="color:#FF0000;">*</font></label>
                                </div>
                                <div class="col-lg-4">
                                  <div class="input-group input-group-sm mb-3">
                                    <input type="text" name="rtskr" id="rtskr" class="form-control" autocomplete="off" value="{{ $pasien->rtskr }}"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="RT">
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="input-group input-group-sm mb-3">
                                    <input type="text" name="rwskr" id="rwskr" class="form-control" autocomplete="off" value="{{ $pasien->rwskr }}"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="RW">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="pekerjaan">Pekerjaan Saya<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ $pasien->pekerjaan }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="bahasa">Bahasa/Penerjemah<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-4">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="bahasa" id="bahasa" class="form-control" autocomplete="off" value="{{ $pasien->bahasa }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Bahasa">
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="penerjemah" id="penerjemah" class="form-control" autocomplete="off" value="{{ $pasien->penerjemah }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Penerjemah">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="info">Info dari<font style="color:#FF0000;">*</font></label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="info" id="info" class="form-control" autocomplete="off" value="{{ $pasien->info }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="namabapak">Nama Ayah</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="namabapak" id="namabapak" class="form-control form-control-sm" value="{{ $pasien->namabapak }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="pekerjaanbapak">Pekerjaan Ayah</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="pekerjaanbapak" id="pekerjaanbapak" class="form-control form-control-sm" value="{{ $pasien->pekerjaanbapak }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="namaibu">Nama Ibu</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="namaibu" id="namaibu" class="form-control form-control-sm" value="{{ $pasien->namaibu }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-4">
                                <label for="pekerjaanibu">Pekerjaan Ibu</label>
                              </div>
                              <div class="col-lg-8">
                                <div class="input-group input-group-sm mb-3">
                                  <input type="text" name="pekerjaanibu" id="pekerjaanibu" class="form-control form-control-sm" value="{{ $pasien->pekerjaanibu }}"
                                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          {{-- <div class="card z-index-1 shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-lg-4">
                                    <label for="username">Username</label>
                                  </div>
                                  <div class="col-lg-8">
                                    <div class="input-group input-group-sm mb-3">
                                      <input type="text" name="username" id="username" class="form-control form-control-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-lg-4">
                                    <label for="password">Password</label>
                                  </div>
                                  <div class="col-lg-8">
                                    <div class="input-group input-group-sm mb-3">
                                      <input type="password" name="password" id="password" class="form-control form-control-sm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div> --}}
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-6">
                                <button class="btn btn-primary " type="submit">Simpan Perubahan</button>
                              </div>
                              <div class="col-lg-6">
                                <button class="btn btn-primary " type="button">Batal</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
     integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" 
     crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" 
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- <script src="js/script.js"></script> --}}

    <script>
        
        $(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $(function () {
              $('#nik').change(function() {
                let nik = $('#nik').val();
                $('#username').val(nik);
              });

              $(':radio[id=yes]').change(function() {
                let provinsi = $('#propinsi').val();
                let kabupaten = $('#kabupaten').val();
                let kecamatan = $('#kecamatan').val();
                let kelurahan = $('#kelurahan').val();
                let alamat = $('#alamat').val();
                let rt = $('#rt').val();
                let rw = $('#rw').val();

              $('#propinsiskr').val(provinsi);
              $('#kabupatenskr').val(kabupaten);
              $('#kecamatanskr').val(kecamatan);
              $('#kelurahanskr').val(kelurahan);
              $('#alamatskr').val(alamat);
              $('#rtskr').val(rt);
              $('#rwskr').val(rw);
              });
              $(':radio[id=no]').change(function() {
                document.getElementById('propinsiskr').value = "";
                document.getElementById('kabupatenskr').value = "";
                document.getElementById('kecamatanskr').value = "";
                document.getElementById('kelurahanskr').value = "";
                document.getElementById('alamatskr').value = "";
                document.getElementById('rtskr').value = "";
                document.getElementById('rwskr').value = "";
              });
            });

            $(function () {
                $('#propinsi').on('change',function(){
                    let kodePropinsi = $('#propinsi').val()
                    
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getKabupaten') }}",
                        data: {kodePropinsi:kodePropinsi},
                        cache : false,

                        success: function (msg) {
                            $('#kabupaten').html(msg);
                        },
                        // error : function (data) {
                        //     console.log('error:' data)
                        // },
                    });
                })
            });
            $(function () {
                $('#kabupaten').on('change',function(){
                    let kdKotaKab = $('#kabupaten').val()
                    
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getKecamatan') }}",
                        data: {kdKotaKab:kdKotaKab},
                        cache : false,

                        success: function (msg) {
                            $('#kecamatan').html(msg);
                        },
                        // error : function (data) {
                        //     console.log('error:' data)
                        // },
                    });
                })
            });
            $(function () {
                $('#kecamatan').on('change',function(){
                    let kdKec = $('#kecamatan').val()
                    
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getKelurahan') }}",
                        data: {kdKec:kdKec},
                        cache : false,

                        success: function (msg) {
                            $('#kelurahan').html(msg);
                        },
                        // error : function (data) {
                        //     console.log('error:' data)
                        // },
                    });
                })
            });
            $(function () {
                $('#kelurahan').on('change',function(){
                    let kdDes = $('#kelurahan').val()
                    
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getKodepos') }}",
                        data: {kdDes:kdDes},
                        cache : false,

                        success: function (msg) {
                            $('#kodepos').html(msg);
                        },
                        // error : function (data) {
                        //     console.log('error:' data)
                        // },
                    });
                })
            });
            $(function () {
                $('#tgllahir').on('change',function(){
                    
                    var dob = new Date(document.getElementById('tgllahir').value);
                    var today = new Date();
                    var age = Math.floor((today-dob)/(365.25*24*60*60*1000));
                    document.getElementById('umur').value = age;

                    var gender = document.getElementById('kelamin').value;
                    // if (kelamin == "laki-laki") {
                    //     if (age <= 5) { 
                    //         document.getElementById('sapaan').value = "By.";
                    //     } else if(age <= 15) {
                    //         document.getElementById('sapaan').value = "An.";
                    //     } else {
                    //         document.getElementById('sapaan').value = "Tn.";
                    //     }
                    // } else {
                    //     if (age <= 5) { 
                    //         document.getElementById('sapaan').value = "Adinda";
                    //     } else {
                    //         document.getElementById('sapaan').value = "Nyonya";
                    //     }
                    // }
                    if (age <= 5) {
                      document.getElementById('sapaan').value = "By.";
                    } else if (age <= 15) {
                      document.getElementById('sapaan').value = "An.";
                    } else if (gender == "laki-laki") {
                      document.getElementById('sapaan').value = "Tn.";
                    } else {
                      document.getElementById('sapaan').value = "Ny.";
                    }
                })
            });
            $(function () {
                $('#kelamin').on('change',function(){
                    
                    var kelamin = document.getElementById('kelamin').value;
                    var age = document.getElementById('umur').value;
                    // if (kelamin == "laki-laki") {
                    //     if (age <= 15) { 
                    //         document.getElementById('sapaan').value = "Ananda";
                    //     } else {
                    //         document.getElementById('sapaan').value = "Tuan";
                    //     }
                    // } else {
                    //     if (age <= 15) { 
                    //         document.getElementById('sapaan').value = "Adinda";
                    //     } else {
                    //         document.getElementById('sapaan').value = "Nyonya";
                    //     }
                    // }
                    if (age <= 5) {
                      document.getElementById('sapaan').value = "By.";
                    } else if (age <= 15) {
                      document.getElementById('sapaan').value = "An.";
                    } else if (kelamin == "laki-laki") {
                      document.getElementById('sapaan').value = "Tn.";
                    } else {
                      document.getElementById('sapaan').value = "Ny.";
                    }
                })
            });
            $(function () {
                $('#statuskawin').on('change',function(){
                    
                    var statusk = document.getElementById('statuskawin').value;
                    if (statusk == "menikah") {
                      document.getElementById('menikah').style.display = 'block';
                      document.getElementById('menikah').style.opacity = '1';
                      document.getElementById('menikah').style.transition = "all 30s";
                    } else {
                      document.getElementById('menikah').style.display = 'none';
                    }
                })
            });
            
        });
        // $(document).ready(function() {
        //         $('#pasien').submit(function(e) {
        //             console.log("berhasil");
        //             // e.preventDefault();
        //             // var form = $(this);
        //             // var url = form.attr('action');
        //             // var method = form.attr('method');
        //             // var data = form.serialize();

        //         })
        //     })
    </script>
    
@endsection