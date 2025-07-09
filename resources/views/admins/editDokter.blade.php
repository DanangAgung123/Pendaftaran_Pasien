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
              <div class="col-lg-6">
                 <form action="{{ route('admin.updateDokter', $dokter->id ) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                          <label for="dokter_id">Dokter ID</label>
                            <input type="text" name="dokter_id" id="dokter_id" value="{{ $dokter->id }}" class="form-control" autocomplete="off">
                          @error('dokter_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama" value="{{ $dokter->nama }}"  autocomplete="off">
                          @error('nama')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="notelp">No HP</label>
                          <input type="text" class="form-control" id="notelp" name="notelp" value="{{ $dokter->notelp }}"  autocomplete="off">
                          @error('notelp')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="nik">NIK</label>
                          <input type="text" class="form-control" id="nik" name="nik" value="{{ $dokter->nik }}"  autocomplete="off">
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
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

    
@endsection