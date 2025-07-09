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
                <div class="card-header">
                    DOKTER TUJUAN
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary">BPJS</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-info">Button</a>
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
     {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
         <script>
           $(document).ready(function(){
            $('#daftar').click(function(){
                console.log('lanjut');
            });

          });

           
         </script> --}}
     @endsection

