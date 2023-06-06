<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <link href="{{asset('css/semua.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/profil.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
    @php
        use \App\Http\Controllers\SessionController;
        echo SessionController::navbar();
    @endphp
    <div class="masuk_text">
    <h1 style="margin-top: 10vh; browser-default">Profil</h1>
    <div id="fixed" style="display: block;">
        @if(auth()->check())
        <table style="border-spacing: 10px;" class="browser-default">
            <tr class="browser-default">
                <td class="label browser-default">Nama</td>
                <td class="inputProfile ubahProfile browser-default">{{ auth()->user()->nama }}</td>
            </tr>
            <tr>
                <td class="label browser-default">NIK</td>
                <td class="inputProfile ubahProfile browser-default">{{ auth()->user()->nik }}</td>
            </tr>
            <tr>
                <td class="label browser-default">Telepon</td>
                <td class="inputProfile ubahProfile browser-default">{{ auth()->user()->telepon }}</td>
            </tr>
            <tr>
                <td class="label browser-default">Kota Asal</td>
                <td class="inputProfile ubahProfile browser-default">{{ auth()->user()->kota_asal }}</td>
            </tr>
        </table>
        @else
            <meta http-equiv="refresh" content="0; URL={{ route('sessCreate') }}" />
        @endif
    </div>
    <div id="edit"  style="display: none;">
        <form method="POST" action="{{ route('profUpdate') }}" id="patch" class="browser-default">
            {{ csrf_field() }}
            <table  class="browser-default">
                <tr class="browser-default">
                    <td class="label browser-default">Nama</td>
                    <td class="inputProfile browser-default"><input type="text" class="form-control browser-default" id="nama" name="nama" value="{{ auth()->user()->nama }}"></td>
                </tr>
                <tr class="browser-default">
                    <td class="label browser-default">NIK</td>
                    <td class="inputProfile browser-default"><input type="text" class="form-control browser-default" id="nik" name="nik" value="{{ auth()->user()->nik }}"></td>
                </tr>
                <tr class="browser-default">
                    <td class="label browser-default">Telepon</td>
                    <td class="inputProfile browser-default"><input type="text" class="form-control browser-default" id="telepon" name="telepon" value="{{ auth()->user()->telepon }}"></td>
                </tr>
                <tr class="browser-default">
                    <td class="label browser-default">Kota Asal</td>
                    <td class="inputProfile browser-default"><input type="text" class="form-control browser-default" id="kota_asal" name="kota_asal" value="{{ auth()->user()->kota_asal }}"></td>
                </tr>

            </table>

        </form>
    </div>
    <div style="display: inline-block;">
        <button id="hide" onclick="edit()" class="tombolsubmit profil browser-default">Edit</button>
        <button style="cursor:pointer; display: none;" form="patch" type="submit" id="save" onclick="save()" class="tombolsubmit profil">Save</button>
    </div>
    </div>

    <script>
        function edit(){
	    document.getElementById('hide').style.display='none';
            document.getElementById('fixed').style.display='none';
            document.getElementById('edit').style.display='block';
            document.getElementById('save').style.display='inline-block';
            document
        }
        function save(){
	    document.getElementById('hide').style.display='inline-block';
            document.getElementById('save').style.display='none';
            document.getElementById('edit').style.display='none';
            document.getElementById('fixed').style.display='block';
        }
    </script>
</body>
</html>
