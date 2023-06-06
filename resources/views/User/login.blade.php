<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="row">
    <div class="col s6 m6 l6">
      <div class="masuk_text">
        <h3>Masuk</h3>
        <form method="POST" action="{{route('sessStore')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="number" class="form-control input" id="telepon" name="telepon" placeholder="Nomor HP" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control input" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <button style="cursor:pointer" type="submit" class="browser-default tombolsubmit">Login</button>
            </div>
        </form>
        <p>
          Belum memiliki akun? <a href="{{route('regsCreate')}}">Daftar</a>
        </p>
      </div>
    </div>
    <div class="col s6 m6 l6">
      <div class="image_alun">
        <div class="image_text">
          <h3>Butuh Mobil Di Malang?</h3>
          <h5>Sewa disini aja!</h5>
        </div>
      </div>
    </div>
</div>
  @section('scripts')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  @stop
</body>
</html>
