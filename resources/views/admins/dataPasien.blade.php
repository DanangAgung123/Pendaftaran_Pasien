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
                    <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
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
              <div class="col-lg-12">
                <div class="col-lg-3">
                  <div class="input-group input-group-sm mb-3">
                    <a href="{{ route('admin.exportPasien') }}" class="btn btn-primary">Cetak Pasien</a>
                  </div>
                </div>
                {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Data
                  </button> --}}
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </thead>
                    @foreach ($data as $pasien )
                    <tbody>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $pasien->noktp }}</td>
                      <td>{{ $pasien->nama }}</td>
                      <td>{{ $pasien->kelamin }}</td>
                      <td>{{ $pasien->alamat }}</td>
                      <td>
                        <form action="{{ route('admin.destroyPasien', $pasien->id) }}" method="post">
                                <a class="badge bg-warning" href="{{ route('admin.editPasien', $pasien->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button class="badge bg-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                          </form>
                      </td>
                    </tbody>
                    @endforeach
                    {{-- @foreach ($data as $admin)
                      
                    <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $admin->nama }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->password }}</td>
                        <td>
                          <button class="badge bg-danger">Hapus</button>
                        </td>
                    </tbody>
                    @endforeach --}}
                </table>
              </div>
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
@endsection