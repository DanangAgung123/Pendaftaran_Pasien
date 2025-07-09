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
                    <li class="breadcrumb-item active" aria-current="page">Poli</li>
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
                  <div class="mt-2 pt-2">
                      {{ $data->links() }}
                  </div>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Provinsi</th>
                        <th>Kode Kabupaten</th>
                        <th>Kabupaten</th>
                        <th>Kode Kecamatan</th>
                        <th>Kecamatan</th>
                        <th>Kode Desa</th>
                        <th>Desa</th>
                        <th>Kode Pos</th>
                        <th>Aksi</th>
                    </thead>
                    @foreach ($data as $kota)
                      
                    <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kota->kode }}</td>
                        <td>{{ $kota->propinsi}}</td>
                        <td>{{ $kota->kdKotakab}}</td>
                        <td>{{ $kota->kabupaten}}</td>
                        <td>{{ $kota->kdKec}}</td>
                        <td>{{ $kota->kecamatan}}</td>
                        <td>{{ $kota->kdDes}}</td>
                        <td>{{ $kota->kelurahan}}</td>
                        <td>{{ $kota->kodePos}}</td>
                        <td>
                          <form action="{{ route('admin.destroyKota', $kota->id) }}" method="post">
                                <a class="badge bg-warning" href="{{ route('admin.editKota', $kota->id) }}">Edit</a>
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
                  <form action="{{ route('admin.storeKota') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="kode">Kode</label>
                          <input type="text" class="form-control" id="kode" name="kode"  autocomplete="off">
                          @error('kode')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="propinsi">Provinsi</label>
                          <input type="text" class="form-control" id="propinsi" name="propinsi"  autocomplete="off">
                          @error('propinsi')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="kdKotakab">Kode Kota</label>
                          <input type="text" class="form-control" id="kdKotakab" name="kdKotakab"  autocomplete="off">
                          @error('kdKotakab')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="kabupaten">Kota / Kabupaten</label>
                          <input type="text" class="form-control" id="kabupaten" name="kabupaten"  autocomplete="off">
                          @error('kabupaten')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="kdKec">Kode Kecamatan</label>
                          <input type="text" class="form-control" id="kdKec" name="kdKec"  autocomplete="off">
                          @error('kdKec')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"  autocomplete="off">
                            @error('kecamatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kdDes">Kode Desa</label>
                            <input type="text" class="form-control" id="kdDes" name="kdDes"  autocomplete="off">
                            @error('kdDes')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kelurahan">Desa / Kelurahan</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan"  autocomplete="off">
                            @error('kelurahan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kodePos">Kode Pos</label>
                            <input type="text" class="form-control" id="kodePos" name="kodePos"  autocomplete="off">
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
          </div>
      </div>
@endsection