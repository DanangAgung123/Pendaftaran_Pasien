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
             @foreach ($polis as $poli )
               
             <div class="col-lg-12">
               <div class="card text-center shadow mb-2 bg-body rounded">
               <h5 class="card-title mt-4">{{ $poli->namaunit }}</h5>
               <div class="row poliustify-center">
                   @foreach ($poli->dokters as $dokter )
                   <div class="col-lg-4">
                    <div class="card-body">
                              
                              <div class="">
                                <img
                                src="{{ Storage::url($dokter->foto) }}"
                                class="rounded-circle shadow card-img-top"
                                alt="User Image"
                                style="width: 100px"
                                />
                                <div class="card-body">
                                  <p>{{ $dokter->nama }}</p>
                                  <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">Jadwal</button>
                                </div>
                              </div>
                            </div>
                        </div>
                         <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Jadwal Dokter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-hover">
                                      <thead>
                                        <td>No</td>
                                        <td>Poli</td>
                                        <td>Tanggal</td>
                                        <td>Mulai</td>
                                        <td>Selesai</td>
                                      </thead>
                                      @foreach ($dokter->jadwaldokters as $jadwal )
                                        <tbody>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $jadwal->poli->namaunit }}</td>
                                          <td>{{ $jadwal->tgl }}</td>
                                          <td>{{ $jadwal->mulai }}</td>
                                          <td>{{ $jadwal->selesai }}</td>
                                        </tbody>
                                      @endforeach
                                    </table>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                        @endforeach
                      </div>
               </div>
             </div>
             @endforeach
           </div>

           
           <!-- /.row (main row) -->
         </div>
         <!--end::Container-->
       </div>
       <!--end::App Content-->
     </main>
     <!--end::App Main-->
     @endsection
