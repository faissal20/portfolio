<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <title>{{  'Hello Sunflower' }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-image: url('{{ asset("/assets/background.jpg") }}'); ">
    <div id="app">
        <nav class="navbar ">
                <a class="logo" href="{{ url('/') }}">
                    🌕
                </a>

                <div class="menu">
                    <!-- Right Side Of Navbar -->
                    <ul class="notification">
                        <!-- Authentication Links -->
                        @auth
                            <li>
                                <button class="btn-icon">
                                    <i class="fa-regular fa-bell"></i>
                                </button>
                            </li>
                            <li>
                                <button class="btn-icon">
                                    <i class="fa-regular fa-envelope"></i>
                                </button>
                            </li>
                        @endauth

                    </ul>
                </div>
        </nav>
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
