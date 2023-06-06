<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('css/berhasil.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <title>Pembayaran Berhasil</title>
</head>
<body>
@php
        use \App\Http\Controllers\SessionController;
        echo SessionController::navbar();
    @endphp

    <div class="isi">
        <img src="{{asset('image/check_circle_outline-24px 2.png')}}" alt="">
        <h2>Pembayaran Berhasil</h2>
        <p style="margin-bottom: 5vh;">Dalam waktu 20 menit Anda akan dihubungi melalui nomor telfon. <br>Jika ada permasalahan, Anda dapat menghubungi <b>+62851525334</b>.</p>

        <a href="{{route('userCreateHist')}}">
            <button class="prim-button">Oke</button>
        </a>
    </div>
</body>
</html>
