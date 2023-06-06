<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('css/cekid.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <title>Cek ID</title>
</head>
<body>
@php
    use \App\Http\Controllers\SessionController;
        echo SessionController::navbar();
    @endphp

    <div class="edit">
        <h2 style="margin-top: 10vh; font-size:2vw; color:#7969E8;">Cek ID Pesanan</h2>
        <form action="" method="post">
            <input type="text" class="inputM" placeholder="ID Pesanan" name="id" required style="margin-top:3vh;">
            <br>
            <button onclick="cek()" class="prim-botton" type="submit" style=" padding: 5px 30px;">Cek</button>
        </form>
    </div>

    <div id="hasil" style=" display: block;">
        <h2 style="margin-top: 5vh; font-size:2vw; color:#7969E8; margin-left: 5vw;" >ID Pesanan : 1232131</h2>
        <table style="margin-left: 4.1vw;">
            <tr>
                <td class="label">Nama</td>
                <td>: Miftahul Ihsan</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td>: 124124124124</td>
            </tr>
            <tr>
                <td class="label">Kota Asal</td>
                <td>: Banda Aceh</td>
            </tr>
            <tr>
                <td class="label">No HP</td>
                <td>: 012848124</td>
            </tr>
        </table>
    <div id="msg">ini teks</div>
    </div>

    <script>
        function cek(){
            $.ajax({
                type:'POST',
                url:'{{route('adminPesananCek')}}',
                data:[
                    _token = <?php echo csrf_token() ?>,
                    id = document.getElementsByName('id')
                ],
                success:function(data) {
                    $("#msg").html(data.msg);
                }
            });
            document.getElementById('hasil').style.display='block';
        }
    </script>
</body>
</html>
