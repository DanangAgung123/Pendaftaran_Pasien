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
              <div class="col-lg-8">
                 
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Tanggal</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Aksi</th>
                            </thead>
                            @foreach ( $data as $jadwal )
                                
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jadwal->dokter->nama }}</td>
                                <td>{{ $jadwal->tgl }}</td>
                                <td>{{ $jadwal->mulai }}</td>
                                <td>{{ $jadwal->selesai }}</td>
                                <td>
                                    <form action="{{ route('pasien.Pendaftaran2')}}" method="POST">
                                     @csrf
                                    {{-- <input type="text" hidden value="{{ $pasien[0]->username }}" id="username" name="username"> --}}
                                    <input type="text" hidden value="{{ $jadwal->id }}" id="jadwaldokter" name="jadwaldokter">
                                    <button type="submit" class="btn btn-primary" >Daftar</button>
                                    </form>

                                </td>
                            </tbody>
                            @endforeach
                        </table>
                  <a href="{{ route('pasien.home') }}" class="btn btn-danger">Batal</a>
              </div>
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

    
@endsection