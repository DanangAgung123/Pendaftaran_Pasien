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
                    <li class="breadcrumb-item active" aria-current="page">Data Pendaftaran</li>
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
                <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row border-bottom mb-4">
                                <div class="col-sm-8 pt-2">
                                    <h6>Laporan Reservasi</h6>
                                </div>
                            </div>
                            <div class="text-center mb-3">
                                <h3>Laporan Reservasi</h3>
                            </div>
                            <form action="{{ route('admin.cetakLaporan') }}" method="POST" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <select name="th" id="th" class="form-control">
                                            <option hidden value="">Pilih Tahun</option>
                                            @foreach ($th as $t )
                                            <option value="{{ $t[0] }}">{{ $t[0] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="bl" id="bl" class="form-control">
                                            <option hidden value="">Pilih Bulan</option>
                                            @foreach ($bl as $b )
                                            <option value="{{ $b[0] }}">{{ $b[0] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary">Cetak</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <form>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="input-group input-group-sm mb-3">
                      <select name="tgldaftar" id="tgldaftar" class="form-select" aria-label="Default select example">
                        <option hidden>Tanggal</option>  
                        @foreach ($tgldaftar as $tgl_daftar )
                        <option value="{{ $tgl_daftar->tgl_daftar }}">{{ $tgl_daftar->tgl_daftar }}</option>  
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="input-group input-group-sm mb-3">
                      <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                  </div>
                </form>
                <div class="col-lg-3">
                  <div class="input-group input-group-sm mb-3">
                    <a href="{{ route('admin.rubahPendaftaran') }}" class="btn btn-primary">Perubahan Jadwal</a>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="input-group input-group-sm mb-3">
                    <a href="{{ route('admin.exportReservasi') }}" class="btn btn-primary">Cetak Reservasi</a>
                  </div>
                </div>
              </div> --}}
                  
                {{-- <table class="table" id="tabelJadwal">
                    <thead>
                        <th>No</th>
                        <th>No RM</th>
                        <th>Nama</th>
                        <th>Poli</th>
                        <th>Dokter</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                    </thead>
                    @foreach ($data as $daftar )
                      
                    <tbody>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $daftar->pasien->normx }}</td>
                      <td>{{ $daftar->pasien->nama }}</td>
                      <td>{{ $daftar->poli->namaunit }}</td>
                      <td>{{ $daftar->dokter->nama }}</td>
                      <td>{{ $daftar->kso_id }}</td>
                      <td>
                        <form method="post" action="{{ route('admin.konfirmasiPendaftaran',$daftar->id) }}">
                          @csrf
                          @method('PUT')
                            @if ( $daftar->is_called === 1)
                                <input type="hidden" id="sudah" name="sudah" value="{{ $daftar->id }}">
                                <button class="badge bg-success" type="button">Sudah Terkonfirmasi</button>
                            @else
                                <input type="hidden" id="belum" name="belum" value="{{ $daftar->id }}">
                                <button class="badge bg-danger" type="submit" onclick="return confirm('Yakin ingin mengaktifkan daftar?')">Belum Terkonfirmasi</button>
                            @endif
                          </form>
                      </td>
                    </tbody>
                    @endforeach
                    
                </table> --}}
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