<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('css/aturMobil.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title>Mobil</title>
    <title>Atur Mobil</title>
</head>
<body>

    @if(\Session::has('error'))
        <script>alert("{!!\Session::get('error')!!}")</script>
    @endif
    @if(\Session::has('message'))
        <script>alert("{!!\Session::get('message')!!}")</script>
    @endif
    @if(\Session::has('succ'))
        <script>alert("{!!\Session::get('succ')!!}")</script>
    @endif
    @php
        use \App\Http\Controllers\SessionController;
        echo SessionController::navbar();
    @endphp
    <h1 style="margin-left:5%;"> Data Mobil</h1>
    <table>
        <tr>
            <th>ID Mobil</th>
            <th>Nama</th>
            <th>Kapasitas Mesin</th>
            <th>Harga</th>
            <th>Jumlah Unit</th>
            <th class="padding">Foto</th>
        </tr>
        @foreach ($cars as $i)
        <tr >
            <td class="">{{$i->id}}</td>
            <td class="">{{$i->nama}}</td>
            <td class="">{{$i->mesin}}cc</td>
            <td class="">Rp. {{$i->harga}}</td>
            <td class="">{{$i->jumlah}}</td>
            <td class="padding"><a href="{{$i->foto}}" target="_blank">Foto Mobil</a></td>
        </tr>
        @endforeach
    </table>

        <div class="tombol">
            <button onclick="tambah()" id="plus" class="prim-button browser-default">Tambah Mobil</button>
            <button onclick="ubah()" id="edit" class="prim-button browser-default">Edit Mobil</button>
            <button onclick="kurang()" id="hapus" class="prim-button browser-default">Hapus Mobil</button>
        </div>

        <div class="edit">
            <div id="tambah" class="tambah" style="display: none;">
                <h3>Tambah Mobil</h3>
                <form method="POST" action="{{route('adminAddMobil')}}">
                    @csrf
                    <input type="text" class="inputM browser-default" placeholder="Nama" name="nama" required>
                    <br>
                    <input type="number" class="inputM browser-default" placeholder="Kapasitas Mesin" name="mesin" required>
                    <br>
                    <input type="number" class="inputM browser-default" placeholder="Harga" name="harga" required>
                    <br>
                    <input type="number" class="inputM browser-default" placeholder="Jumlah Unit" name="jumlah" required>
                    <br>
                    <input type="text" class="inputM browser-default" placeholder="Upload Foto" name="foto" required>
                    <br>
                    <button type="submit" class="prim-button browser-default">Tambah</button>
                </form>
            </div>

            <div id="ubah" class="ubah" style="display: none;">
                <h3>Edit Mobil</h3>
                <div id="after">
                    <form method="POST" action="{{route('adminPatchMobil')}}">
                        @method('PATCH')
                        @csrf
                        <input type="text" class="inputM browser-default" placeholder="ID Mobil (Wajib)" name="id" required>
                        <br>
                        <input type="text" class="inputM browser-default" placeholder="Nama" name="nama">
                        <br>
                        <input type="number" class="inputM browser-default" placeholder="Kapasitas Mesin" name="mesin">
                        <br>
                        <input type="number" class="inputM browser-default" placeholder="Harga" name="harga">
                        <br>
                        <input type="number" class="inputM browser-default" placeholder="Jumlah Unit" name="jumlah">
                        <br>
                        <input type="text" class="inputM browser-default" placeholder="Upload Foto" name="foto">
                        <br>
                        <button class="prim-button" name="edit">Edit</button>
                    </form>
                </div>
            </div>

            <div id="kurang" class="kurang" style="display: none;">
                <h3>Hapus Mobil</h3>
                <form method="POST" action="{{route('adminDelMobil')}}" >
                    @method('DELETE')
                    @csrf
                    <input type="number" class="inputM browser-default" placeholder="ID Mobil" name="id">
                    <br>
                    <button type="submit" class="red-botton browser-default">Hapus</button>
                </form>
            </div>
        </div>

    <script>
        function tambah(){
            document.getElementById('tambah').style.display='block';
            document.getElementById('ubah').style.display='none';
            document.getElementById('kurang').style.display='none';
        }

        function ubah(){
            document.getElementById('ubah').style.display='block';
            document.getElementById('tambah').style.display='none';
            document.getElementById('kurang').style.display='none';
        }

        function kurang(){
            document.getElementById('kurang').style.display='block';
            document.getElementById('tambah').style.display='none';
            document.getElementById('ubah').style.display='none';
        }
    </script>
</body>
</html>
