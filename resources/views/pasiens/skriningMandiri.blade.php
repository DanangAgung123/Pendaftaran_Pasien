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
                   <li class="breadcrumb-item active" aria-current="page">Skrining Mandiri</li>
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
            <div class="col-lg-12">
                  <div class="card shadow p-3 mb-3 bg-body rounded">
                    <div class="card-body text-center pt-1">
                    <h5 class="pt-1">Skrining Mandiri</h5>
                    <p>Penerapan serangkaian tes atau prosedur yang dilakukan untuk mendeteksi gangguan kesehatan
                        atau penyakit tertentu pada sesorang. Dengan tujuan deteksi dini untuk mengurangi resiko penyakit
                        atau memutuskan metode pengobatan yang paling efektif. Tes ini tidak dalam kategori diagnostik,
                        tetapi digunakan untuk mengidentifikasi populasi yang diharuskan untuk menjalai tes tambahan untuk
                        menentukan ada atau tidaknya penyakit.
                    </p>
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
