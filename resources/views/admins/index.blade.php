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
                    <li class="breadcrumb-item active" aria-current="page">Dokter</li>
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
                @if (session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                </div>
                @endif
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Data
                  </button>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>NIK</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </thead>
                    @foreach ($data as $dokter)
                      
                    <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dokter->nama }}</td>
                        <td>{{ $dokter->notelp }}</td>
                        <td>{{ $dokter->nik }}</td>
                        <td>
                            <img src="{{ Storage::url($dokter->foto) }}" width="50" >
                        </td>
                        <td>
                          <form action="{{ route('admin.destroyDokter', $dokter->id) }}" method="post">
                                <a class="badge bg-warning" href="{{ route('admin.editDokter', $dokter->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button class="badge bg-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                          </form>
                        </td>
                    </tbody>
                    @endforeach
                </table>
              </div>
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

       <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('admin.storeDokter') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama"  autocomplete="off">
                          @error('nama')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="notelp">No HP</label>
                          <input type="text" class="form-control" id="notelp" name="notelp"  autocomplete="off">
                          @error('notelp')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="nik">NIK</label>
                          <input type="text" class="form-control" id="nik" name="nik"  autocomplete="off">
                          @error('nik')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="foto">Foto</label>
                          <input type="file" name="foto" id="foto" class="form-control" >
                          @error('foto')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                  </form>
              </div>
              
          </div>
          </div>
      </div>
@endsection