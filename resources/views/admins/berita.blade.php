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
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </thead>
                    {{-- <tbody>
                        <td>1</td>
                        <td>Program Makan Bergizi Gratis</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                             Mollitia nulla, est odio assumenda quod doloremque libero 
                             tempore unde! Impedit eligendi nostrum totam repellat nisi 
                             repudiandae nihil non quas fugit neque?</td>
                        <td>08373636</td>
                        <td>
                            <button class="badge bg-warning">Edit</button>
                            <button class="badge bg-danger">Hapus</button>
                        </td>
                    </tbody> --}}
                    @foreach ($data as $berita)
                      
                    <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->keterangan }}</td>
                        <td>
                            <img src="{{ Storage::url($berita->gambar) }}" width="50" >
                        </td>
                        <td>
                          <form action="{{ route('admin.destroyBerita', $berita->id_berita) }}" method="post">
                                <a class="badge bg-warning" href="{{ route('admin.editBerita', $berita->id_berita) }}">Edit</a>
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
                  <form action="{{ route('admin.storeBerita') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                          <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" autocomplete="off">
                          @error('judul')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="keterangan">Keterangan</label>
                          <textarea class="form-control" id="keterangan" name="keterangan" rows="3" autocomplete="off"></textarea>
                          @error('keterangan')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="gambar">Gambar</label>
                          <input type="file" name="gambar" id="gambar" class="form-control" >
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
          </div>
      </div>
@endsection