<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} | @yield('title') </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome -->
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}"> --}}

    <!-- icheck bootstrap -->
    <link href="{{ asset('css/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href="{{ asset('css/jqvmap.min.css') }}"> --}}

    <!-- Theme style -->
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}"> --}}
    
    <!-- Daterange picker -->
    {{-- <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}"> --}}
    
    <!-- summernote -->
    {{-- <link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}"> --}}
    
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="{{ asset('js/swi204cs.js') }}" defer></script>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    {{-- <div id="app"> --}}
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
        </nav> --}}

        {{-- <main class="py-4">
            @yield('content')
        </main> --}}

    @guest
        <div class="container">
            @yield('content')
        </div>
    @endguest

    @auth
        @include('partials.sidebar')
        <div class="wrapper">


            @include('partials.navbar')

            @yield('content')
        </div>
    @endauth


         
    
 


<!-- jQuery UI 1.11.4 -->
{{-- <script src="{{ asset('js/jquery-ui.min.js') }}"></script> --}}


<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<!-- ChartJS -->
{{-- <script src="{{ asset('js/Chart.min.js') }}"></script> --}}

<!-- Sparkline -->
{{-- <script src="{{ asset('js/sparkline.js') }}"></script> --}}

<!-- JQVMap -->
{{-- <script src="{{ asset('js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('js/jquery.vmap.usa.js') }}"></script> --}}

<!-- jQuery Knob Chart -->
{{-- <script src="{{ asset('js/jquery.knob.min.js') }}"></script> --}}

<!-- daterangepicker -->
{{-- <script src="{{ asset('js/moment.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/daterangepicker.js') }}"></script> --}}

<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}

<!-- Summernote -->
{{-- <script src="{{ asset('js/summernote-bs4.min.js') }}"></script> --}}

<!-- overlayScrollbars -->
{{-- <script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script> --}}

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('js/demo.js') }}"></script> --}}

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('js/dashboard.js') }}"></script> --}}
@stack('js')

</body>
</html>
