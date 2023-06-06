<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/riwayat.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <title>Riwayat Pesanan</title>
</head>

<body>
    @php
    use \App\Http\Controllers\SessionController;
    echo SessionController::navbar();
    @endphp

    <div class="isi center">
        <h2>Riwayat Pesanan</h2>
        <br>
        <table style="width: 90%; margin-left: 5vw;">
            <tr>
                <th style="width: 5%">ID Pesanan</th>
                <th style="width: 30%">Mobil</th>
                <th style="width: 15%">Harga</th>
                <th style="width: 15%">Pengambilan</th>
                <th style="width: 15%">Pengembalian</th>
                <th style="width: 20%">Status</th>
            </tr>
            @foreach($trans as $tran)
            @if($tran->konfirmasi & $tran->lunas & $tran->selesai & !$tran->batal)
            <tr class="padding selesai">
                <td><input name="id" style="text-align: center" value="{{$tran->id}}" readonly></td>
                <td>{{$cars->find($tran->car_id)->nama}}</td>
                <td>{{$tran->harga}}</td>
                <td>{{$tran->peminjaman}}</td>
                <td>{{$tran->pengembalian}}</td>
                <td>
                    <p><b>Selesai</b></p>
                </td>
            </tr>
            @elseif($tran->konfirmasi & $tran->lunas & !$tran->selesai & !$tran->batal)
            <tr class="padding pembayaranBerhasil">
                <form action="{{route('userHistHist')}}" method="POST">
                    @csrf
                    <td><input name="id" style="text-align: center" value="{{$tran->id}}" readonly></td>
                    <td>{{$cars->find($tran->car_id)->nama}}</td>
                    <td>{{$tran->harga}}</td>
                    <td>{{$tran->peminjaman}}</td>
                    <td>{{$tran->pengembalian}}</td>
                    <td>
                        <input type="submit" name="submit" class="prim-button batal" value="Pembayaran Berhasil">
                    </td>
                </form>
            </tr>
            @elseif($tran->konfirmasi & !$tran->lunas & !$tran->selesai & !$tran->batal)
            <tr class="padding menungguPembayaran">
                <form action="{{route('userHistHist')}}" method="POST">
                    @csrf
                    <td><input name="id" style="text-align: center" value="{{$tran->id}}" readonly></td>
                    <td>{{$cars->find($tran->car_id)->nama}}</td>
                    <td>{{$tran->harga}}</td>
                    <td>{{$tran->peminjaman}}</td>
                    <td>{{$tran->pengembalian}}</td>
                    <td>
                        <input type="submit" name="submit" class="prim-button browser-default bayar" value="Bayar">
                        <input type="submit" name="submit" class="red-button browser-default batal" value="Batal">
                    </td>
                </form>
            </tr>
            @elseif(!$tran->konfirmasi & !$tran->lunas & !$tran->selesai & !$tran->batal)
            <tr class="padding menungguKonfirmasi">
                <form action="{{route('userHistHist')}}" method="POST" class="browser-default">
                    @csrf
                    <td><input name="id" style="text-align: center" value="{{$tran->id}}" readonly></td>
                    <td>{{$cars->find($tran->car_id)->nama}}</td>
                    <td>{{$tran->harga}}</td>
                    <td>{{$tran->peminjaman}}</td>
                    <td>{{$tran->pengembalian}}</td>
                    <td>
                        <input type="submit" name="submit" class="prim-button browser-default menunggu_konfirmasi" value="Menunggu Konfirmasi">
                        <input type="submit" name="submit" class="red-button browser-default batal" value="Batal">
                    </td>
                </form>
            </tr>
            @elseif($tran->batal)
            <tr class="padding dibatalkan">
                <td><input name="id" style="text-align: center" value="{{$tran->id}}" readonly></td>
                <td>{{$cars->find($tran->car_id)->nama}}</td>
                <td>{{$tran->harga}}</td>
                <td>{{$tran->peminjaman}}</td>
                <td>{{$tran->pengembalian}}</td>
                <td>
                    <p style="color: #bf1b1b;" style="width: 90%"><b>Dibatalkan</b> </p>
                </td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>