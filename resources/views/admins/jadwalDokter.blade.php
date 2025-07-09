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
                    <li class="breadcrumb-item active" aria-current="page">Jadwal Dokter</li>
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
                  <form>
                <div class="row mt-2">
                  <div class="col-lg-3">
                    <div class="input-group input-group-sm mb-3">
                      <select name="tglawal" id="tglawal" class="form-select" aria-label="Default select example">
                        <option hidden>Tanggal</option>  
                        @foreach ($tanggal as $tang )
                        <option value="{{ $tang->tgl }}">{{ $tang->tgl }}</option>  
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="input-group input-group-sm mb-3">
                      <select name="tglakhir" id="tglakhir" class="form-select" aria-label="Default select example">
                        <option hidden>Tanggal</option>  
                        @foreach ($tanggal as $tang )
                        <option value="{{ $tang->tgl }}">{{ $tang->tgl }}</option>  
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                      <div class="input-group input-group-sm mb-3">
                      <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Dokter</th>
                        <th>Poli</th>
                        <th>Tanggal</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Praktek</th>
                        <th>Aksi</th>
                    </thead>
                    
                    @foreach ($data as $jadwal)
                      
                    <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->dokter->nama }}</td>
                        <td>{{ $jadwal->poli->namaunit }}</td>
                        <td>{{ $jadwal->tgl }}</td>
                        <td>{{ $jadwal->mulai }}</td>
                        <td>{{ $jadwal->selesai }}</td>
                        <td> @if ( $jadwal->praktek === 1)
                           <button class="badge bg-success" >Aktif</button> 
                        @else 
                            <button class="badge bg-danger" >Non-Aktif</button>
                        @endif  
                        </td>
                        <td>
                          <form >
                            @if ( $jadwal->praktek === 1)
                                <input type="hidden" id="non" name="non" value="{{ $jadwal->id }}">
                                <button class="badge bg-danger" type="submit" onclick="return confirm('Yakin ingin menonaktifkan jadwal?')">Non-Aktif</button>
                            @else
                                <input type="hidden" id="aktif" name="aktif" value="{{ $jadwal->id }}">
                                <button class="badge bg-success" type="submit" onclick="return confirm('Yakin ingin mengaktifkan jadwal?')">Aktif</button>
                            @endif
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
                  <form action="{{ route('admin.storeJadwal') }}" method="POST" enctype="multipart/form-data">
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
                      <div class="mb-3">
                          <label for="tgl">Tanggal</label>
                          <input type="date" class="form-control" id="tgl" name="tgl"  autocomplete="off">
                          @error('tgl')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="waktupoli">Waktu Poli</label>
                            <div class="form-check ">
                            <input class="form-check-input" type="radio" name="waktupoli" id="waktu1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Pagi</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="waktupoli" id="waktu2" value="2">
                            <label class="form-check-label" for="inlineRadio2">Siang</label>
                            </div>
                      </div>
                      <div class="mb-3">
                          <label for="mulai">Mulai</label>
                          <input type="time" class="form-control" id="mulai" name="mulai"  autocomplete="off">
                          @error('mulai')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="selesai">Selesai</label>
                          <input type="time" class="form-control" id="selesai" name="selesai"  autocomplete="off">
                          @error('selesai')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="kuota">Kuota</label>
                          <input type="number" name="kuota" id="kuota" class="form-control" >
                          @error('kuota')
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