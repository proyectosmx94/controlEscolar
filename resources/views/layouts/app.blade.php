<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Control Escolar</title>
    <link rel="icon" href="{{ secure_asset('images/logo.png') }}">
    <!-- Scripts -->
    <!-- <script src="{{ secure_asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('plugins/Bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('plugins/Toastr/css/toastr.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('plugins/Sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
    <style>
        .card-header, .modal-header{
            font-weight: bolder;
            font-size: 1rem;
            color: #fff;
            background: #343A40;
        }
        label{
            font-weight: bolder;
        }

        footer {
          position:fixed;
        bottom:0;
        clear:both;
        width:100%;
        height:100px;
        text-align: center;
        }
    </style>
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="home" style="font-weight: bolder;">
                    <img src="{{ secure_asset('/images/logo2.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                    Sistema de Control Escolar
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> -->
                            @if (Route::has('register'))
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> -->
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-power-off"></i>
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer style="margin-bottom: 0px;">
            <hr>
            <strong>Sistema de Control Escolar</strong> <br>
            <strong>proyectosmx94@gmail.com</strong>
        </footer>
    </div>
</body>
</html>

<script src="{{ secure_asset('plugins/jQuery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ secure_asset('plugins/Bootstrap/js/popper.min.js') }}"></script>
<script src="{{ secure_asset('plugins/Bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ secure_asset('plugins/Font_awesome/js/all.js') }}"></script>
<script src="{{ secure_asset('plugins/Toastr/js/toastr.min.js') }}"></script>
<script src="{{ secure_asset('plugins/Sweetalert/sweetalert.min.js') }}"></script>
<script src="{{secure_asset('plugins/DataTables/datatables.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

        $("body").on('focusout', '.mayuscula', function(field){
            $(this).val($(this).val().toUpperCase());
        });
    });  
</script>

@yield('script')
