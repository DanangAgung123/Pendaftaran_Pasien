@extends('templates.adminlayout')
@section('content')
   <!--begin::App Main-->
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
                    <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
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
                        <th>nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </thead>
                    @foreach ($data as $admin)
                      
                    <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $admin->nama }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->password }}</td>
                        <td>
                          <form action="{{ route('admin.destroyAdmin', $admin->id) }}" method="post">
                                <a class="badge bg-warning" href="{{ route('admin.editAdmin', $admin->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button class="badge bg-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                          </form>
                        </td>
                    </tbody>
                    @endforeach
                </table>
                {{-- <div class="card shadow-sm mb-2 bg-body rounded">
                  <div class="pt-2 px-3 ">
                    <p>Pagi</p>
                  </div>
                  <div class="card-body">
                      <div class="row">
                      @foreach ($dokterpagi as $dokter )
                        
                      <div class="col-lg-6">
                        <div class="card py-1 px-4 mb-2">
                          <div class="row">
                            <div class="col-md-3 my-1 ">
                              <div class="px-1 py-2">
                                <img
                                  src="/img/wa0.png"
                                  class="rounded-circle img-fluid "
                                  alt="User Image"
                                  style="width: 70px"
                                  />
                              </div>
                            </div>
                            <div class="col-md-9">
                              <div class="text-start py-2">
                                <p>{{ $dokter->nama }}</p>
                                <p>{{ $dokter->mulai }} - {{ $dokter->selesai }} </p>
                              </div>
                              </div>
                         </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
  <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('admin.store') }}" method="POST" >
                      @csrf
                      <div class="mb-3">
                          <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="" autocomplete="off">
                          @error('name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="username">Username</label>
                          <input type="text" name="username" id="username" class="form-control" value="" autocomplete="off">
                          @error('username')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="password">Password</label>
                          <input type="text" name="password" id="password" class="form-control" value="" autocomplete="off">
                          @error('password')
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

{{-- @section('script')
    <script>
        $(document).ready(function () {
            $("#form-ajax").submit(function (e) { 
                e.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                var method = form.attr('method');
                var data = form.serialize();
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    success: function (response) {
                        alert('Data berhasil Dirubah');
                    },
                    error:function(xhr, status, error) {
                        alert('Gagal');
                    }
                });
                
            });
        });
    </script> --}}
{{-- @endsection --}}