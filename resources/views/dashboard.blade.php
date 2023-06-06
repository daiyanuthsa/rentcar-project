<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Utama</title>
    <link href="{{asset('css/dashboardItems.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
	@php
        use \App\Http\Controllers\SessionController;
        echo SessionController::navbar();
    @endphp

        @if(auth()->check())
            {{-- <p>Hello, {{ auth()->user()->nama }}</p> --}}
            <h1>Featured Car</h1>
            <div class="item" data-aos="fade-up">
                @foreach ($mobil as $mobil)
                <form action="{{route('formulir')}}" method="GET">

                    <div class='cards'>
                    <img src="{{$mobil['foto']}}" class="gambarr"/>
                    <input type="submit" value="AAAAAA" class="kartuMobil">

                    <input name="id" style="display: none;" value="{{$mobil['id']}}" readonly>

                        <div class='card-title'>
                            <p>Sisa {{$mobil['jumlah']}}</p>
                        </div>
                        <div class='card-car-name'>
                            <p>{{$mobil['nama']}} </p>
                        </div>
                        <div class='card-car-cc'>
                            <p>{{$mobil['mesin']}} cc </p>
                        </div>
                        <div class='card-car-price'>
                            <p>{{$mobil['harga']}} <span class='price-hari'>/hari</span></p>
                        </div>
                    </div>
                </form>

                @endforeach

            </div>
        @else
            <p>Hello, Stranger</p>
        @endif

        <script>
            AOS.init();
       </script>
</body>
</html>
