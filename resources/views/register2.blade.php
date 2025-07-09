<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
  
    <link rel="stylesheet" href="css/styleregis.css">
     
    <!----===== Iconscout CSS ===== -->
    {{-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> --}}
   <title>Regisration Form</title>
</head>
<body>
    <div class="container">
        <header>Registration</header>
        <form id="pasien" action="{{ route('register2.store') }}" method="POST">
        @csrf
            <div class="form first">
                <div class="details personal">
                    <span class="title">Informasi Pasien</span>
                    <div class="fields">
                        <div class="input-field" >
                            <label>Tn.</label>
                            {{-- <select disabled>
                                <option>Ny.</option>
                                <option>Tn.</option>
                            </select> --}}
                            <input type="text" id="sapaan" name="sapaan" placeholder="" readonly>
                        </div>
                        <div class="input-field" >
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label for="kelamin">Gender</label>
                            <select name="kelamin" id="kelamin" required>
                                <option hidden value="">Gender</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                              </select>
                        </div>
                        <div class="input-field">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tmplahir" id="tmplahir" placeholder="Tempat lahir" required required autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgllahir" id="tgllahir" placeholder="Tanggal lahir" required>
                        </div>
                        <div class="input-field">
                            <label>Umur</label>
                            <input type="number" name="umur" id="umur" placeholder="--" readonly >
                        </div>
                        <div class="input-field">
                            <label>Pendidikan</label>
                            <select name="pendidikan" id="pendidikan">
                                <option hidden>--Pilih Pendidikan--</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Suku</label>
                            <select name="suku" id="suku">
                                <option hidden>--Pilih Suku</option>
                                <option value="jawa">Jawa</option>
                                <option value="madura">Madura</option>
                                <option value="sunda">Sunda</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Agama</label>
                            <select name="agama" id="agama">
                                <option hidden>--Pilih Agama--</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                                <option>K</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Pekerjaan</label>
                            <input type="text"name="pekerjaan" id="pekerjaan" placeholder="" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>Status Prekawinan</label>
                            <select name="statuskawin" id="statuskawin">
                                <option hidden>--Pilih Status</option>
                                <option value="menikah">Menikah</option>
                                <option value="single">Single</option>
                            </select>
                        </div>
                        <div class="input-field" style="display:none">
                            <label>Nama Pasangan</label>
                            <input type="text" name="namapasangan" id="namapasangan" placeholder="" autocomplete="off">
                        </div>
                        <div class="input-field" style="display:none">
                            <label>Pekerjaan Pasangan</label>
                            <input type="text" name="pekerjaanpasangan" id="pekerjaanpasangan" placeholder="" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>Nama Bapak</label>
                            <input type="text" name="namabapak" id="namabapak" placeholder="" required autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>Pekerjaan Bapak</label>
                            <input type="text" name="pekerjaanbapak" id="pekerjaanbapak" placeholder="" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>Nama Ibu</label>
                            <input type="text" name="namaibu" id="namaibu" placeholder="" required  autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaanibu" id="pekerjaanibu" placeholder="" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>No. Hp</label>
                            <input type="text" name="notlp" id="notlp" placeholder="" required autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>No. BPJS</label>
                            <input type="text" name="" id="" placeholder="Isi jika memiliki kartu BPJS" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>No. Asuransi</label>
                            <input type="text" name="noasuransi" id="noasuransi" placeholder="Isi jika memiliki Asuransi" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>No. KTP</label>
                            <input type="text" name="noktp" id="noktp" placeholder=""autocomplete="off">
                        </div>
                        <button class="nextBtn">
                            <span class="btnText">Next</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="form second">
                <div class="details address">
                    <span class="title">Alamat sesuai dengan KTP</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Provinsi</label>
                            <select name="propinsi" id="propinsi">
                                <option hidden>--Pilih Provinsi--</option>
                                @foreach ($propinsi as $data)
                                <option value="{{ $data->propinsi }}">{{ $data->propinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Kabupaten/Kota</label>
                            <select name="kabupaten" id="kabupaten">
                                <option hidden>--Pilih Kota/Kabupaten--</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Kecamatan</label>
                            <select name="kecamatan" id="kecamatan">
                                <option hidden>--Pilih Kecamatan--</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Desa/Kelurahan</label>
                            <select name="kelurahan" id="kelurahan">
                                <option hidden>--Pilih Desa/Kelurahan--</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="" required autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>RT/RW</label>
                            <div class="input" style="display: flex; justify-content:space-evenly;">
                            <input style="width: 45%" type="text" name="rt" id="rt" placeholder="RT"autocomplete="off">
                            <input style="width: 45%; float: right;" type="text" name="rw" id="rw" placeholder="RW"  autocomplete="off">
                            </div>
                        </div>
                        <div class="input-field">
                            <label>Kode Pos</label>
                            <select disabled name="kodepos" id="kodepos">
                                <option hidden>--</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="details family">
                    <span class="title">Alamat sesuai dengan Tempat tinggal Sekarang</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Alamat</label>
                            <input type="text" name="alamatskr" id="alamatskr" placeholder="" required autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>Desa/Kelurahan</label>
                            <input type="text" name="kelurahanskr" id="kelurahanskr" placeholder="" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>RT/RW</label>
                            <div class="input" style="display: flex; justify-content:space-evenly;">
                                <input style="width: 45%" type="text" name="rtskr" id="rtskr" placeholder="RT"  autocomplete="off">
                                <input style="width: 45%; float: right;" type="text" name="rwskr" id="rwskr" placeholder="RW" autocomplete="off">
                                </div>
                        </div>
                        <div class="input-field">
                            <label>Provinsi</label>
                            <input type="text" name="propinsiskr" id="propinsiskr" placeholder="" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>Kabupaten</label>
                            <input type="text" name="kabupatenskr" id="kabupatenskr" placeholder="" autocomplete="off">
                        </div>
                        <div class="input-field">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatanskr" id="kecamatanskr" placeholder="" autocomplete="off">
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button type="submit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

    <script>
        $(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $(function () {
                $('#propinsi').on('change',function(){
                    let kodePropinsi = $('#propinsi').val()
                    
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getKabupaten') }}",
                        data: {kodePropinsi:kodePropinsi},
                        cache : false,

                        success: function (msg) {
                            $('#kabupaten').html(msg);
                        },
                        // error : function (data) {
                        //     console.log('error:' data)
                        // },
                    });
                })
            });
            $(function () {
                $('#kabupaten').on('change',function(){
                    let kdKotaKab = $('#kabupaten').val()
                    
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getKecamatan') }}",
                        data: {kdKotaKab:kdKotaKab},
                        cache : false,

                        success: function (msg) {
                            $('#kecamatan').html(msg);
                        },
                        // error : function (data) {
                        //     console.log('error:' data)
                        // },
                    });
                })
            });
            $(function () {
                $('#kecamatan').on('change',function(){
                    let kdKec = $('#kecamatan').val()
                    
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getKelurahan') }}",
                        data: {kdKec:kdKec},
                        cache : false,

                        success: function (msg) {
                            $('#kelurahan').html(msg);
                        },
                        // error : function (data) {
                        //     console.log('error:' data)
                        // },
                    });
                })
            });
            $(function () {
                $('#kelurahan').on('change',function(){
                    let kdDes = $('#kelurahan').val()
                    
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('getKodepos') }}",
                        data: {kdDes:kdDes},
                        cache : false,

                        success: function (msg) {
                            $('#kodepos').html(msg);
                        },
                        // error : function (data) {
                        //     console.log('error:' data)
                        // },
                    });
                })
            });
            $(function () {
                $('#tgllahir').on('change',function(){
                    
                    var dob = new Date(document.getElementById('tgllahir').value);
                    var today = new Date();
                    var age = Math.floor((today-dob)/(365.25*24*60*60*1000));
                    document.getElementById('umur').value = age;

                    var gender = document.getElementById('kelamin').value;
                    if (kelamin == "laki-laki") {
                        if (age <= 15) { 
                            document.getElementById('sapaan').value = "Ananda";
                        } else {
                            document.getElementById('sapaan').value = "Tuan";
                        }
                    } else {
                        if (age <= 15) { 
                            document.getElementById('sapaan').value = "Adinda";
                        } else {
                            document.getElementById('sapaan').value = "Nyonya";
                        }
                    }
                })
            });
            $(function () {
                $('#kelamin').on('change',function(){
                    
                    var kelamin = document.getElementById('kelamin').value;
                    var age = document.getElementById('umur').value;
                    if (kelamin == "laki-laki") {
                        if (age <= 15) { 
                            document.getElementById('sapaan').value = "Ananda";
                        } else {
                            document.getElementById('sapaan').value = "Tuan";
                        }
                    } else {
                        if (age <= 15) { 
                            document.getElementById('sapaan').value = "Adinda";
                        } else {
                            document.getElementById('sapaan').value = "Nyonya";
                        }
                    }
                })
            });
            
        });
        // $(document).ready(function() {
        //         $('#pasien').submit(function(e) {
        //             console.log("berhasil");
        //             // e.preventDefault();
        //             // var form = $(this);
        //             // var url = form.attr('action');
        //             // var method = form.attr('method');
        //             // var data = form.serialize();

        //         })
        //     })
    </script>

</body>
</html>