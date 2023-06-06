<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="{{asset('css/navbarPemilik.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- <link href="{{asset('css/semua.css')}}" rel="stylesheet" type="text/css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">


        <title>Menu</title>
        </head>
        <body>
                @if( auth()->check() )
                
                <nav class="nav browser-default">
                        <div class="nav-wrapper browser-default">
                                <a href="{{route('adminCreate')}}" class="brand-logo">Car<span class='sred'>Rent</a>
                                <a href="{{route('profView')}}"class="ungu" style="padding-left: 230px">Profil</a>
                                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons menu">menu</i></a>
                                <ul class="right hide-on-med-and-down other_nav">
                                {{-- <li><a href="{{route('profView')}}" class="ungu">Profil</a></li> --}}
                                
                                <li><a href="{{route('sessDestroy')}}" class="ungu keluar">Keluar</a></li>
                                </ul>
                                <ul class="side-nav" id="mobile-demo">
                                <li><a href="{{route('profView')}}"class="ungu">Profil</a></li>
                                
                                <li><a href="{{route('sessDestroy')}}"class="ungu keluar">Keluar</a></li>
                                </ul>
                        </div>
                </nav>
                @else
                        <a href="{{route('sessCreate')}}">Log In</a>
                        <a href="{{route('regsCreate')}}">Register</a>
                @endif
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
        $(".button-collapse").sideNav();
        $(document).ready(function(){
        $('.carousel').carousel({});
    });
        $('.carousel.carousel-slider').carousel({
            fullWidth:true,
            indicators:true,
        });

    </script>
        </body>
</html>


