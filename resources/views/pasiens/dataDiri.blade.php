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
              <li class="breadcrumb-item active" aria-current="page">Data Saya</li>
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
              </div>
          </div>
          <div class="card shadow p-1 mb-3 bg-body rounded">
              <div class="card-body pt-1">
                  <div class="">
                      <p class="border-bottom">Tentang Saya</p>
                  </div>
                  <div class="form-group">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <label for="username">NO. RM</label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $pasien[0]->normx }}</label>
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <label for="username">Nama Lengkap </label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $pasien[0]->nama }}</label>
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <label for="username">Tempat Tanggal Lahir</label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $pasien[0]->tmplahir }}, {{ $pasien[0]->tgllahir }}</label>
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <label for="username">Jenis Kelamin</label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $pasien[0]->kelamin }}</label>
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <label for="username">Pendidikan</label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $pasien[0]->pendidikan }}</label>
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <label for="username">Agama</label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $pasien[0]->agama }}</label>
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <label for="username">Pekerjaan</label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $pasien[0]->pekerjaan }}</label>
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <label for="username">No. BPJS</label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $pasien[0]->kk }}</label>
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <label for="username">No. Asuransi</label>
                        </div>
                        <div class="col-lg-9">
                          <label >{{ $pasien[0]->noasuransi }}</label>
                        </div>
                      </div>
                    </div>
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
