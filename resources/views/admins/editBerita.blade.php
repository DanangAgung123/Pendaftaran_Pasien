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
                 <form action="{{ route('admin.updateBerita', $berita->id_berita ) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                          <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ $berita->judul }}" autocomplete="off">
                          @error('judul')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="keterangan">Keterangan</label>
                          <input class="form-control" id="keterangan" name="keterangan" value="{{ $berita->keterangan }}" rows="3" autocomplete="off"></input>
                          @error('keterangan')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="gambar">Gambar</label>
                          <input type="file" name="gambar" id="gambar" value="{{ $berita->gambar }}" class="form-control" >
                          @error('gambar')
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