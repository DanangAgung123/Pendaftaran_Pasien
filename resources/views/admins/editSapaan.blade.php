{{-- @extends('templates.adminlayout')
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
                 <form action="{{ route('admin.updatePoli', $poli->id ) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                          <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $poli->nama }}" autocomplete="off">
                          @error('nama')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="poli_id">Unit</label>
                          <select name="poli_id" id="poli_id" class="form-select" aria-label="Default select example">
                                <option hidden>--Pilih Unit--</option>
                                @foreach ($unit as $u)
                                <option value="{{ $u->poli_id }}">{{ $u->namaunit }}</option>
                                @endforeach
                            </select>
                          @error('poli_id')
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

    
@endsection --}}
