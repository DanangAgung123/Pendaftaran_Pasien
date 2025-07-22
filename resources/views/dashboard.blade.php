<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RSIA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="css/styledash.css">
  <style>
    section{
      padding-top: 5rem;
    }
  </style>
</head>

<body id="home">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #38e4e4">
    <div class="container">
      <a class="navbar-brand" href="#">RSIA AMANAH PROBOLINGGO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#dokter">Dokter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#jadwalDokter">Jadwal Dokter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#berita">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('loginuser') }}">Admin</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir navbar -->

  <!-- Hero -->
  <section class="hero text-center" style="padding-top:90px">
    <img src="img/logo1.jpg" alt="Danang Agung Nugroho" style="width:200px" class="rounded-circle img-thumbnail">
    <h1>Daftar Layanan Kesehatan</h1>
    <a href="{{ route('login') }}"><h3>Disini!</h3></a>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffff" fill-opacity="1" d="M0,192L40,186.7C80,181,160,171,240,149.3C320,128,400,96,480,90.7C560,85,640,107,720,138.7C800,171,880,
        213,960,229.3C1040,245,1120,235,1200,213.3C1280,192,1360,160,1400,144L1440,128L1440,320L1400,320C1360,320,
        1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,
        240,320C160,320,80,320,40,320L0,320Z">
      </path>
    </svg>
  </section>
  <!-- Akhir Hero -->

  <!-- About -->
  <section id="dokter">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col">
          <h2>DOKTER</h2>
        </div>
      </div>
      {{-- <div class="row justify-content-center fs-5 text-center">
        <div class="col-md-4">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia voluptate odio voluptatum laborum minus
            pariatur nesciunt quos optio accusamus aliquam?</p>
        </div>
        <div class="col-md-4">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum illum vitae placeat modi eius saepe aliquid
            dolorem, atque commodi necessitatibus?</p>
        </div>
      </div> --}}
      <div class="row justify-content-center">
        @foreach ($dokter as $d)
        <div class="col-md-3 mb-3">
          <div class="card">
            <img src="{{ Storage::url($d->foto) }}" class="card-img-top" alt="Anime1"  height="300">
            <div class="card-body">
              <h5 class="card-title">{{ $d->nama }}</h5>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#cefdfb" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,234.7C384,256,480,288,576,266.7C672,245,768,171,864,170.7C960,171,1056,
        245,1152,272C1248,299,1344,277,1392,266.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,
        320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
      </path>
    </svg>
  </section>
  <!-- Akhir About -->

  <!-- Anime -->
  <section id="jadwalDokter">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col">
          <h2>JADWAL DOKTER</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        @foreach ($dokter as $d )
          <div class="col-md-3 mb-3">
          <div class="card">
            <div class="card-head">
              <h5 class="card-title text-center">{{ $d->nama }}</h5>
            </div>
            <div class="card-body text-center">
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->iteration }}">Lihat Jadwal</button>
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
                      @foreach ($d->jadwaldokters as $jadwal )
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
        <div class="row text-center mb-3">
        <div class="col">
          <h3>JADWAL DOKTER HARI INI</h3>
        </div>
      </div>
        <div class="row  mb-3">
          @foreach ($jadwalskr as $skr )
        <div class="col-lg-12">
          <table class="table">
            <td style="width: 25%">{{ $skr->dokter->nama }}</td>
            <td style="width: 25%">{{ $skr->poli->namaunit }}</td>
            <td class="text-center">{{ $skr->mulai }}</td>
            <td class="text-center">{{ $skr->selesai }}</td>
            <tbody>
            </tbody>
          </table>
        </div>
        @endforeach
      </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1" d="M0,192L48,181.3C96,171,192,149,288,149.3C384,149,480,171,576,154.7C672,139,768,85,864,90.7C960,96,1056,160,
        1152,181.3C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,
        864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
      </path>
    </svg>
  </section>
  <!-- Akhir anime -->

  <!-- Contact -->
  <section id="berita">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col">
          <h2>BERITA TERKINI</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        @foreach ($berita as $b)
          
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="{{ Storage::url($b->gambar) }}" class="card-img-top" alt="Anime1" height="200">
            <div class="card-body">
              <h5 class="card-title">{{ $b->judul }}</h5>
              <p class="card-text">{{ $b->keterangan }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{-- <div class="row justify-content-center">
        <div class="col-md-6">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" aria-describedby="name">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="email">
                <div class="mb-3">
                  <label for="pesan" class="form-label">Pesan</label>
                  <textarea class="form-control" id="pesan" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
      </div> --}}
    </div>
  </section>
  <!-- Akhir Contact -->

  <!-- Footer -->
  <footer class="text-white text-center pb-5" style="background-color:#666; ">
    Created with <i class="bi bi-heart-pulse"></i> by <a href="https://www.instagram.com/ndanangagung/" class="text-white">Danang Agung Nugroho</a>
  </footer>
  <!-- Akhir Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>