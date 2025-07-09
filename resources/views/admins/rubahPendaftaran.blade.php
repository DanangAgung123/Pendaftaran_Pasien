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
                    <li class="breadcrumb-item active" aria-current="page">Rubah Jadwal Pendaftaran</li>
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
                <form>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="input-group input-group-sm mb-3">
                      <select name="tgldaftar" id="tgldaftar" class="form-select" aria-label="Default select example">
                        <option hidden>Tanggal</option>  
                        @foreach ($daftars as $daftar )
                        <option value="{{ $daftar->tgl_daftar }}">{{ $daftar->tgl_daftar }}</option>  
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="input-group input-group-sm mb-3">
                        <select name="dokterawal" id="dokterawal" class="form-select" aria-label="Default select example">
                            <option hidden>Dokter</option>  
                        @foreach ($dokters as $dokter )
                        <option value="{{ $dokter->dokter_id }}">{{ $dokter->dokter->nama }}</option>  
                        @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="input-group input-group-sm mb-3">
                        <select name="dokterrubah" id="dokterrubah" class="form-select" aria-label="Default select example">
                            <option hidden>Dokter</option>  
                        @foreach ($dokters as $dokter )
                        <option value="{{ $dokter->dokter_id }}">{{ $dokter->dokter->nama }}</option>  
                        @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                      <div class="input-group input-group-sm mb-3">
                      <button type="submit" class="btn btn-primary">Pencarian</button>
                        </div>
                    </div>
                </div>
            </form>
              <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Pasien yang akan Dipindahkan</h5>
                        </div>
                        <div class="card-body">
                        <table class="table" id="tabelJadwal">
                            <thead>
                                <th>No</th>
                                <th>No RM</th>
                                <th>Nama</th>
                                <th>Dokter</th>
                                <th>Aksi</th>
                            </thead>
                            @foreach ($dokterawal as $daftar )
                            
                            <tbody>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $daftar->pasien->normx }}</td>
                            <td>{{ $daftar->pasien->nama }}</td>
                            <td>{{ $daftar->dokter->nama }}</td>
                            <td>
                                <form  >
                                <input type="hidden" name="pindah" id="pindah" value="{{ $daftar->id }}">
                                <button class="badge bg-primary" type="submit" onclick="return confirm('Yakin ingin meindah dokter pasien?')">Pindah</button>
                            </form>
                            </td>
                            </tbody>
                            @endforeach
                            
                        </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Dipindahkan ke Sini</h5>
                        </div>
                        <div class="card-body">
                        <table class="table" id="tabelJadwal">
                            <thead>
                                <th>No</th>
                                <th>No RM</th>
                                <th>Nama</th>
                                <th>Dokter</th>
                            </thead>
                            @foreach ($dokterrubah as $daftar )
                            
                            <tbody>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $daftar->pasien->normx }}</td>
                            <td>{{ $daftar->pasien->nama }}</td>
                            <td>{{ $daftar->dokter->nama }}</td>
                            
                            </tbody>
                            @endforeach
                            
                        </table>
                        </div>
                    </div>
                </div>
                </div>    
              </div>
            </div>
            <!-- /.row (main row) -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

      <script>
        $(function() {
          $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
          });

          $(function () {
                // $('#tgldaftar').on('change',function(){
                //     let tglDaftar = $('#tgldaftar').val()
                //     // console.log(tglDaftar);

                //     $.ajax({
                //         type: "POST",
                //         url: "{{ route('postDokter') }}",
                //         data: {tglDaftar:tglDaftar},
                //         cache : false,

                //         success: function (msg) {
                //             $('#dokter').html(msg);
                //         },
                //         // error : function (data) {
                //         //     console.log('error:' data)
                //         // },
                //     });
                // })
            });


        });
      </script>
@endsection