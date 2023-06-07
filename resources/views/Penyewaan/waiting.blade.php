<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('css/waiting.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <title>Menunggu Konfirmasi</title>
</head>
<body>
@php
        use \App\Http\Controllers\SessionController;
        echo SessionController::navbar();
    @endphp

    <div class="isi">
        <img src="{{asset('image/Wavy_Bus-12_Single-12.jpg')}}" alt="">

        <p style="color:#5498c8;">ID Pesanan {{$pesan}}</p>
        <h2>Menunggu Konfirmasi</h2>
        <p style="margin-bottom: 5vh;">Mobil pesanan Anda sedang diperiksa <br>Anda dapat mengecek kembali pesanan Anda melalui <b>Menu Riwayat</b> </p>

        <a href="{{route('userCreateHist')}}">
            <button class="prim-button">Buka Menu Riwayat</button>
        </a>
    </div>

    </body>
</html>
