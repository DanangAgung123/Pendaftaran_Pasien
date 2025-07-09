@extends('templates.layout')
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
              <div class="col-lg-6">
                <form action="{{ route('pasien.storePendaftaran') }}" method="POST">
                    @csrf
                    @foreach ($data as $daftar )
                          <input type="text" hidden value="{{ $daftar->id }}" id="Jadwal_id" name="jadwal_id">
                    <div class="mb-3">
                        <label for="nama">nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{  session('pasien')['0']['nama'] }}" readonly autocomplete="off">
                        @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dokter">Dokter</label>
                        <input type="text" name="dokter" id="dokter" class="form-control" value="{{ $daftar->dokter->nama }}" readonly autocomplete="off">
                        @error('dokter')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="poli">Poli Tujuan</label>
                        <input type="text" name="poli" id="poli" class="form-control" value="{{ $daftar->poli->namaunit }}"readonly autocomplete="off">
                        @error('poli')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" name="tanggal" id="tanggal" class="form-control" value="{{ $daftar->tgl }}"readonly autocomplete="off">
                        @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="waktu">waktu</label>
                        <input type="text" name="waktu" id="waktu" class="form-control" value="{{ $daftar->mulai }} -- {{ $daftar->selesai }}"readonly autocomplete="off">
                        @error('waktu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                          <label for="bayar">Sistem Pembayaran</label>
                            <select name="bayar" id="bayar" class="form-select" aria-label="Default select example">
                                <option hidden>--Pilih Sistem Pembayaran--</option>
                                <option value="UMUM">UMUM</option>
                                <option value="BPJS">BPJS</option>
                                <option value="ASURANSI">ASURANSI</option>
                            </select>
                          @error('bayar')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Daftarkan</button>
                      </div>
                    @endforeach
                </form>
              </div>
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

    
@endsection