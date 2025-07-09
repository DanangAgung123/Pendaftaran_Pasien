{{-- {{ dd($pasien) }} --}}
@extends('templates.layout')
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
                   <li class="breadcrumb-item active" aria-current="page">Pendaftaran Online</li>
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
               <div class="card shadow-sm mb-2 bg-body rounded ">
                    <div class="card-body">
                       <div class="tab-status" hidden>
                         <span class="tab active">1</span>
                         <span class="tab">2</span>
                         <span class="tab">3</span>
                       </div>
                       <form action="{{ route('pasien.storePendaftaran') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div role="tab-list">
                           <div role="tabpanel" id="color" class="tabpanel">
                             <h3>DEBITUR PASIEN</h3>
                                <input type="text" class="form-input" disabled value="1" hidden>
                                <input type="radio" class="btn-check" name="debitur" id="debitur1" value="bpjs" autocomplete="off">
                                <label class="btn btn-primary" for="debitur1" >BPJS</label>

                                <input type="radio" class="btn-check" name="debitur" id="debitur2" value="asuransi" autocomplete="off">
                                <label class="btn btn-primary" for="debitur2" >ASURANSI</label>

                                <input type="radio" class="btn-check" name="debitur" id="debitur3" value="umum" autocomplete="off">
                                <label class="btn btn-primary" for="debitur3">UMUM</label>
                           </div>
                           <div id="uploadbpjs" style="display: none; opacity: 0;" class="shadow p-3 mb-5 bg-body rounded">
                            <div class="card z-index-1">
                              <div class="card-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-3">
                                      <label for="gambarbpjs">Upload Foto Kartu BPJS</label>
                                    </div>
                                    <div class="col-lg-7">
                                      <div class="input-group input-group-sm mb-3">
                                        <input type="file" name="gambarbpjs" id="gambarbpjs" class="form-control form-control-sm" 
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <button type="button" id="simpanbpjs" class="btn btn-primary">Simpan</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                           <div id="uploadasuransi" style="display: none; opacity: 0;" class="shadow p-3 mb-5 bg-body rounded">
                            <div class="card z-index-1">
                              <div class="card-body">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-3">
                                      <label for="gambarasuransi">Upload Foto Kartu Asuransi</label>
                                    </div>
                                    <div class="col-lg-7">
                                      <div class="input-group input-group-sm mb-3">
                                        <input type="file" name="gambarasuransi" id="gambarasuransi" class="form-control form-control-sm" 
                                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <button type="button" id="simpanasuransi" class="btn btn-primary">Simpan</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                           <div role="tabpanel" id="hobbies" class="tabpanel hidden">
                             <h3>DOKTER TUJUAN</h3>
                             <input type="text" class="form-input" disabled value="1" hidden>
                              <div class="card mb-1">
                                <div class="card-header">
                                  <h5 class="card-title">PAGI</h5> <br>
                                </div>
                                <div class="card-body">
                                  @foreach ($dokterpagi as $dokter)
                                  <input type="radio" class="btn-check " name="dokter" id="pagi{{ $loop->iteration }}" autocomplete="off" value="{{ $dokter->id }}">
                                    <label class="btn btn-info mb-2 " for="pagi{{ $loop->iteration }}">
                                      <p>{{ $dokter->dokter->nama }} <br> {{ $dokter->mulai }} - {{ $dokter->selesai }}</p> 
                                    </label>
                                    @endforeach
                                </div>
                              </div>
                              <div class="card mb-1">
                                <div class="card-header">
                                  <h5 class="card-title">SORE</h5> <br>
                                </div>
                                <div class="card-body">
                                  @foreach ($doktersore as $dokter)
                                  <input type="radio" class="btn-check " name="dokter" id="sore{{ $loop->iteration }}" autocomplete="off" value="{{ $dokter->id }}">
                                    <label class="btn btn-warning mb-2 " for="sore{{ $loop->iteration }}" >
                                      <p>{{ $dokter->dokter->nama }} <br> {{ $dokter->mulai }} - {{ $dokter->selesai }}</p> 
                                    </label>
                                    @endforeach
                                </div>
                              </div>
                           </div>
                             <div role="tabpanel" id="occupation" class="tabpanel hidden">
                             <h3>Konfirmasi Pendaftaran</h3>
                             <input type="text" class="form-input" disabled value="1" hidden>
                             <div class="mb-3 row">
                              <label for="normx" class="col-sm-2 col-form-label">No. RM</label>
                              <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="normx" name="normx" value="{{  session('pasien')['0']['normx'] }}">
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" readonly value="{{  session('pasien')['0']['nama'] }}">
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="sistembayar" class="col-sm-2 col-form-label">Debitur</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="sistembayar" name="sistembayar" readonly >
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="politujuan" class="col-sm-2 col-form-label">Poli</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="politujuan" name="politujuan" readonly value="{{ $polis[0]->namaunit}}">
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="dokter" class="col-sm-2 col-form-label">Dokter</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="dokter" name="dokter" readonly >
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="waktu" name="waktu" readonly >
                              </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="tglreservasi" class="col-sm-2 col-form-label">Tanggal Reservasi</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="tglreservasi" name="tglreservasi" readonly >
                              </div>
                            </div>
                            <input type="text" hidden class="form-control form-input" id="kartu" name="kartu" readonly >
                            
                           </div>
                         </div>
                         <hr>
                           <div class="pagination">
                             <a class="tmb hidden" id="prev">Previous</a>
                             <a class="tmb" id="next">Continue</a>
                             <button type="submit" class="tmb tmb-submit hidden" id="submit">Submit</button>
                           </div>
                         </form>
                    </div>
                
               </div>
           </div>
           
           <!-- /.row (main row) -->
         </div>
         <!--end::Container-->
       </div>
       <!--end::App Content-->
     </main>
     <!--end::App Main-->
           
     @endsection
     @section('script')
     {{-- <script src="/js/jquery-3.7.1.js"></script> --}}
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
         <script>
          $(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $(':radio[id=pagi1]').change(function(){
            let dokter = $(':radio[id=pagi1]').val();
            namaDokter(dokter);
            waktuDokter(dokter);
            });

            $(':radio[id=pagi2]').change(function(){
            let dokter = $(':radio[id=pagi2]').val();
            namaDokter(dokter);
            waktuDokter(dokter);
            });

            $(':radio[id=pagi3]').change(function(){
            let dokter = $(':radio[id=pagi3]').val();
            namaDokter(dokter);
            waktuDokter(dokter);
            });

            $(':radio[id=sore1]').change(function(){
            let dokter = $(':radio[id=sore1]').val();
            namaDokter(dokter);
            waktuDokter(dokter);
            });

            $(':radio[id=sore2]').change(function(){
            let dokter = $(':radio[id=sore2]').val();
            namaDokter(dokter);
            waktuDokter(dokter);
            });

            $(':radio[id=sore3]').change(function(){
            let dokter = $(':radio[id=sore3]').val();
            namaDokter(dokter);
            waktuDokter(dokter);
            });

            function namaDokter(dokter){
              $.ajax({
                  type: "POST",
                  url: "{{ route('getDokter') }}",
                  data: {dokter:dokter},
                  cache: false,
                  success: function (msg) {
                    $('#dokter').val(msg);
                  }
                });
            }
            function waktuDokter(dokter){
              $.ajax({
                  type: "POST",
                  url: "{{ route('getWaktu') }}",
                  data: {dokter:dokter},
                  cache: false,
                  success: function (msg) {
                    $('#waktu').val(msg);
                  }
                });
            }
          })
           
         </script>
     @endsection

