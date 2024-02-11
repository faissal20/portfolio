<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <title>{{ 'Hello Sunflower' }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-image: url('{{ asset('/assets/background.jpg') }}'); @auth backdrop-filter: blur(20px);  @endauth">
    <div id="app">
        <header>
            <nav class="navbar">
                <a class="logo" href="{{ url('/') }}">
                    🌕
                </a>

                <div class="menu">
                    <!-- Right Side Of Navbar -->
                    <ul class="notification">
                        <!-- Authentication Links -->
                        @auth
                            <li>
                                <button class="btn-icon scaled">
                                    <i class="fa-regular fa-bell"></i>
                                </button>
                            </li>
                            <li>
                                <button class="btn-icon scaled">
                                    <i class="fa-regular fa-envelope"></i>
                                </button>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn-icon scaled">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </button>
                                </form>
                            </li>

                        @endauth

                        @guest
                            <li>
                                <a class="btn-secondary scaled" href="{{ route('login') }}">
                                    login
                                </a>
                            </li>
                        @endguest

                    </ul>
                </div>
            </nav>
        </header>


        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
