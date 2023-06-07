<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('css/formulir.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <title>Formulir Penyewaan</title>
</head>
<body>
@php
        use \App\Http\Controllers\SessionController;
        echo SessionController::navbar();
    @endphp

    <form action="{{route('formulirPost')}}" method="POST">
        @csrf
        <h2>Detail Penyewaan</h2>
        <table>
            <tr>
                <th>Jenis Mobil</th>
                <th>Tanggal Pengambilan</th>
                <th>Tanggal Pengembalian</th>
            </tr>
            <tr>
                <tr>
                    <td>{{$mobil->nama}}</td>
                    <td>
                        <input class="inputM browser-default" type="date" placeholder="Tanggal Pengambilan" name="pengambilan" id="date_ambil" oninput="tempCel(this.value)" onclick="">
                    </td>
                    <td>
                        <input class="inputM browser-default" type="date" placeholder="Tanggal Pengembalian" name="pengembalian" id="date_ngembaliin" oninput="tempCel2(this.value)">
                    </td>
                    <input type="number" name="id" value="{{$mobil->id}}" style="display: none">
                </tr>

            </tr>
        </table>

        {{-- <p style="margin-bottom:15px;">Mobil : {{$mobil->nama}}</p>
        <input type="number" name="id" value="{{$mobil->id}}" style="display: none">
        <input class="inputM browser-default" type="date" placeholder="Tanggal Pengambilan" name="pengambilan" id="date_ambil" oninput="tempCel(this.value)" onclick="">
        <br>
        <input class="inputM browser-default" type="date" placeholder="Tanggal Pengembalian" name="pengembalian" id="date_ngembaliin"oninput="tempCel2(this.value)"> --}}

        <p style="font-size: 11px; font-weight:bold; margin-bottom:30px;margin-top:5px;">*Tanggal Peminjaman dan Pengembalian <br>ditulis dengan format mm/dd/yyyy</p>

        <p style="margin-bottom:15px ;">Harga Penyewaan :  Rp. <span id="harga_mobil">{{$mobil->harga}}</span> x <span id="tes" name="tes">NaN</span> hari = Rp . <span id="hasil_akhir">NaN</span> </p>
        <button type="submit" class="prim-button">Kirim</button>
    </form>



    <script>
        function tempCel(numbah_ambil){

            document.getElementById('tes').innerHTML=numbah_ambil;

        }
        function tempCel2(numbah_ambil){
            x = document.getElementById('tes').innerHTML.split("-");
            y = numbah_ambil.split("-");
            x = x[0]*365+x[1]*30+x[2];
            y = y[0]*365+y[1]*30+y[2];
            hasil = y-x;
            if (hasil<0){
                alert("gaboleh dibawah 0")
                document.getElementById('tes').innerHTML = 'NaN';
                document.getElementById('hasil_akhir').innerHTML = 'NaN';

            }else{
                document.getElementById('tes').innerHTML = hasil;
                h = document.getElementById('harga_mobil').innerHTML;
                document.getElementById('hasil_akhir').innerHTML = hasil*h;
            }
        }
    </script>
</body>
</html>
