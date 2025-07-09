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
               <div class="card text-bg-info shadow-sm mb-2 bg-body rounded ">
                <div class="card-header">
                    Syarat dan Ketentuan
                </div>
               </div>
               <div class="card shadow-sm mb-2 bg-body rounded px-4 pt-2">
                <div class="card-body">
                    <div class="card-text">1.BUKA PENDAFTARAN ONLINE DIMULAI JAM 08.00/20.30</div>
                    <div class="card-text">2.Pendaftaran Online hanya bisa dilakukan oleh pasien yang telah memiliki 
                        nomor rekam medis di RSIA Amanah
                    </div>
                    <div class="card-text">3.Pendaftaran Online dilakukan 1 hari sebelum berkunjung di RSIA AMANAH</div>
                    <div class="card-text">4.Pendaftaran Online hari Minggu/ hari libur nasional TUTUP</div>
                </div>
               </div>
               <div class="card text-center shadow-sm mb-2 bg-body rounded ">
                <div class="card-header">
                    Halo {{  session('pasien')['0']['nama'] }}
                </div>
             </div>
             <div class="row" style="justify-content: center">
                {{-- @foreach ($polis as $poli) --}}
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h4>Pendaftaran Pelayanan</h4>
                        </div>
                        <div class="card-body">
                          <p class="card-text">Daftarkan Pelayanan Kesehatan Anda Disini</p>
                          <form action="{{ route('pasien.pendaftaran1')}}" method="POST">
                            @csrf
                          {{-- <input type="text" hidden value="{{ $poli->id }}" id="poli_id" name="poli_id"> --}}
                          <button type="submit" class="btn btn-primary" >Daftar</button>
                          </form>
                        </div>
                      </div>
                </div>
                {{-- @endforeach --}}

             </div>
           </div>
           
           <!-- /.row (main row) -->
         </div>
         <!--end::Container-->
       </div>
       <!--end::App Content-->
     </main>
     <!--end::App Main-->
            {{-- Modal --}}
            {{-- @foreach ($polis as $poli)
            <div class="modal fade" id="daftarModal{{ $poli->kodepolibpjs }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Pasien</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="">
                        @csrf
                        <div class="mb-1 row">
                            <label for="normx" class="col-sm-3 col-form-label">No. RM</label>
                            <div class="col-sm-9">
                              <input type="text" readonly aria-label="Disabled input example" disabled id="normx" name="normx" value="{{ $pasien[0]->normx }}">
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                              <input type="text" readonly aria-label="Disabled input example" disabled id="nama" name="nama" value="{{ $pasien[0]->nama }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class=" btn btn-primary " id="lanjut" >Simpan</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            @endforeach --}}
            {{-- Akhir Modal --}}
     @endsection
     @section('script')
     {{-- <script src="/js/jquery-3.7.1.js"></script> --}}
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
         <script>
           $(document).ready(function(){
            $('#daftar').click(function(){
                console.log('lanjut');
            });

          });

           
         </script>
     @endsection
