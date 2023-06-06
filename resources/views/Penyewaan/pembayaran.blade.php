<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('css/pembayaran.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/cekid.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <title>Pembayaran</title>
</head>
<body>
    @php
        use \App\Http\Controllers\SessionController;
        echo SessionController::navbar();
    @endphp

    <div class="isi">
        <h2>Pembayaran</h2>
        <p>Transfer pada nomor rekening berikut : <br>
        <br>
        BNI - 124141214 a.n MIFTAHUL IHSAN <br>
        BRI - 315142352 a.n GABRIELLE EVAN FARREL <br>
        Mandiri - 152334646 a.n AlRAVIE MUTIAR MAHESA</p>
        <br>
        <p><b>Tata cara pembayaran</b> <br></p><br>

        <ol style=" margin-left:1vw; ">
            <li>Transfer sesuai rekening bank yang tertera</li>
            <li>Upload bukti pembayaran pada halaman ini</li>
            <li>Pembayaran selesai</li>
        </ol>
<br>
        <form action="{{route('userPayHist')}}" method="POST">
            @csrf
            <input type="number" value="{{$pesan}}" style="display: none;" readonly name="id">
{{--            <input type="file" class="custom-file-input" accept="image/png, image/jpg, image/gif, image/jpeg"><br>--}}
            <input type="url" name="foto" class="inputM browser-default" placeholder="Link Foto"><br>
            <button type="submit" class="prim-button">Upload</button>
        </form>
    </div>


    <script>
        document.getElementById("input_btn").addEventListener('click',
        function(){
            document.getElementById("input_file").click();
        },false);
    </script>


</body>
</html>
