<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
  <div class="wrapper">
    <h2 >Login Pasien</h2>
    @if (session('error'))
      <div class="alert alert-danger" role="alert">
          {{ session('error') }}
      </div>
    @endif
    <form action="{{ route('loginuser') }}" method="POST">
      @csrf
        <div class="input-field">
          <input type="text" name="username" id="username" required autocomplete="off">
          <label for="username">Masukkan NIK </label>
      </div>
      <div class="input-field">
        <input type="password" name="password" id="password" required autocomplete="off">
        <label for="password">Masukkan Password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Belum memiliki Akun? <a href="{{ route('register') }}">Register</a></p>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
      
    </script>
</body>
</html>