<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('image/Untitleddd.png')}}">
    <link href="{{asset('css/profil.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
    {{-- @include('Partials.navbarPemilik') --}}
    @php
    use \App\Http\Controllers\SessionController;
    echo SessionController::navbar();
    @endphp

    <div class="masuk_text">
        <h1 style="margin-top: 10vh; text-align: center;">Profil Admin</h1>
        <div id="fixed" style="display: block;">
            <table style="border-spacing: 10px;" class="center">
                <tr style="browser-default">
                    <td class="label">Nama</td>
                    <td class="inputProfile ubahProfile">{{ auth()->user()->nama }}</td>
                </tr>
                <tr>
                    <td class="label">NIK</td>
                    <td class="inputProfile ubahProfile">{{ auth()->user()->nik }}</td>
                </tr>
                <tr>
                    <td class="label">Telepon</td>
                    <td class="inputProfile ubahProfile">{{ auth()->user()->telepon }}</td>
                </tr>
                <tr>
                    <td class="label">Kota Asal</td>
                    <td class="inputProfile ubahProfile">{{ auth()->user()->kota_asal }}</td>
                </tr>
            </table>

        </div>
        <div id="edit" style="display: none;">
            <form method="POST" action="{{ route('profUpdate') }}" id="patch" class="center">
                {{ csrf_field() }}
                <table class="center">
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

        <br>
        <div class="center">
            <div style="display: inline-block;">
                <button id="hide" onclick="edit()" class="tombolsubmit profil">Edit</button>
                <button style="cursor:pointer; display: none;" form="patch" type="submit" id="save" onclick="save()" class="tombolsubmit profil">Save</button>
            </div>
        </div>
    </div>

    <script>
        function edit() {
            document.getElementById('hide').style.display = 'none';
            document.getElementById('fixed').style.display = 'none';
            document.getElementById('edit').style.display = 'block';
            document.getElementById('save').style.display = 'inline-block';
            document
        }

        function save() {
            document.getElementById('hide').style.display = 'inline-block';
            document.getElementById('save').style.display = 'none';
            document.getElementById('edit').style.display = 'none';
            document.getElementById('fixed').style.display = 'block';
        }
    </script>
</body>

</html>