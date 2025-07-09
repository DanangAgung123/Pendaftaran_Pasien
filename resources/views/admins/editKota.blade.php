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
                    <li class="breadcrumb-item active" aria-current="page">Edit Kota</li>
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
                 <form action="{{ route('admin.updateKota', $kota->id ) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                          <label for="kode">Kode</label>
                            <input type="text" name="kode" id="kode" class="form-control" value="{{ $kota->kode }}" autocomplete="off">
                          @error('kode')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="propinsi">Provinsi</label>
                          <input type="text" class="form-control" id="propinsi" name="propinsi" value="{{ $kota->propinsi }}" autocomplete="off">
                          @error('propinsi')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="kdKotakab">Kode Kota</label>
                          <input type="text" class="form-control" id="kdKotakab" name="kdKotakab" value="{{ $kota->kdKotakab }}" autocomplete="off">
                          @error('kdKotakab')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="kabupaten">Kota / Kabupaten</label>
                          <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ $kota->kabupaten }}" autocomplete="off">
                          @error('kabupaten')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="kdKec">Kode Kecamatan</label>
                          <input type="text" class="form-control" id="kdKec" name="kdKec" value="{{ $kota->kdKec }}" autocomplete="off">
                          @error('kdKec')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $kota->kecamatan }}" autocomplete="off">
                            @error('kecamatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kdDes">Kode Desa</label>
                            <input type="text" class="form-control" id="kdDes" name="kdDes" value="{{ $kota->kdDes }}" autocomplete="off">
                            @error('kdDes')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kelurahan">Desa / Kelurahan</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{ $kota->kelurahan }}" autocomplete="off">
                            @error('kelurahan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kodePos">Kode Pos</label>
                            <input type="text" class="form-control" id="kodePos" name="kodePos" value="{{ $kota->kodePos }}" autocomplete="off">
                            @error('kodePos')
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
