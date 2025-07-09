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
                    <li class="breadcrumb-item active" aria-current="page">Beranda</li>
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
                <div class="card shadow-sm mb-2 bg-body rounded">
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
                                <p>{{ $dokter->dokter->nama }}</p>
                                <p>{{ $dokter->mulai }} - {{ $dokter->selesai }} </p>
                              </div>
                              </div>
                         </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- Start col -->
              <div class="col-lg-12">
                <div class="card shadow-sm mb-2 bg-body rounded">
                  <div class="pt-2 px-3 ">
                    <p>Sore</p>
                  </div>
                  <div class="card-body">
                      <div class="row">
                      @foreach ($doktersore as $dokter )
                        
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
                                <p>{{ $dokter->dokter->nama }}</p>
                                <p>{{ $dokter->mulai }} - {{ $dokter->selesai }} </p>
                              </div>
                              </div>
                         </div>
                        </div>
                      </div>
                      @endforeach
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
      <!--end::App Main-->
      @endsection
