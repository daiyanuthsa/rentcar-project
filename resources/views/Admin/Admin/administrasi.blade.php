<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('css/administrasi.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <title>Administrasi</title>
</head>
<body>
    @php
        use \App\Http\Controllers\SessionController;
        echo SessionController::navbar();
    @endphp


    <div class="menu">
    <h1>Selamat Datang Admin!</h1>
    <br>
        <a class="tombol " href="{{route('adminCreateMobil')}}">Mobil</a>
        <a class="tombol t" href="{{route('adminCreatePesanan')}}">Pesanan</a>
{{--        <a class="tombol t" href="{{route('adminCreateCek')}}">Cek ID Pesanan</a>--}}
    </div>


</body>
</html>
