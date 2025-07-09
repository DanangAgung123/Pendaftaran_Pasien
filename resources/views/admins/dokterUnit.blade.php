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
                    <li class="breadcrumb-item active" aria-current="page">Dokter Unit</li>
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
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Data
                  </button>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Dokter Id</th>
                        <th>Unit Id</th>
                        <th>Aksi</th>
                    </thead>
                    @foreach ($data as $dokterunit)
                      
                    <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dokterunit->dokter->nama }}</td>
                        <td>{{ $dokterunit->poli->namaunit }}</td>
                        <td>
                          <form action="{{ route('admin.destroyDokterUnit', $dokterunit->id) }}" method="post">
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
                  <form action="{{ route('admin.storeDokterUnit') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="dokter_id">Dokter</label>
                            <select name="dokter_id" id="dokter_id" class="form-select" aria-label="Default select example">
                                <option hidden>--Pilih Dokter--</option>
                                @foreach ($dokter as $a)
                                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                                @endforeach
                            </select>
                          @error('dokter_id')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="poli_id">Unit</label>
                          <select name="poli_id" id="poli_id" class="form-select" aria-label="Default select example">
                                <option hidden>--Pilih Unit--</option>
                                @foreach ($unit as $u)
                                <option value="{{ $u->id }}">{{ $u->namaunit }}</option>
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
          </div>
      </div>
@endsection