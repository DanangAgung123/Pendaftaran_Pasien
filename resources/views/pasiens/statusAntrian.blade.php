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
              <li class="breadcrumb-item active" aria-current="page">Status Antrian</li>
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
      <div class="row  mt-lg-n15 mt-md-n11 mt-n10 mx-2">
          <div class="card shadow p-3 mb-3 bg-body rounded">
              <div class="card-body text-center pt-1">
                  <img
                  src="/templates/assets/img/user2-160x160.jpg"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                  style="width: 85px"
                />
              <h5 class="pt-3">NIK : {{ $pasien[0]->noktp }}</h5>
              <h5>{{ $pasien[0]->sapaan }} {{ $pasien[0]->nama }}</h5>
              <h6>RM  : {{ $pasien[0]->normx }}</h6>
              <br>
              <h1>NOMOR ANTRIAN</h1>
              <br>
              @if ($antri === null)
                <h1>Tidak Ada Antrian</h1>
              @else
                <h1>{{ $antri->no_antrian }}</h1>
                <a class="btn btn-success" target="_blank" href="{{ route('pasien.cetakAntrian',$antri->uuid) }}">Cetak Antrian</a>
              @endif
                  
              </div>
          </div>
          
          <!-- /.card -->
      </div>
  
  </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
</main>
<!--end::App Main-->

    
@endsection
