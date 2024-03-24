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

    <script>
        window.user = {!! json_encode(auth()->user()) !!};
    </script>
</head>

<body
    style="background-image: url('{{ asset('/assets/background.jpg') }}'); @auth backdrop-filter: blur(20px); @endauth">
    <div id="app">
        <header class="navbar @guest guest @endguest">
            <a class="logo">
                🌕
            </a>
            @auth
                <navbar></navbar>
            @endauth
            <div class="login">
                @guest
                    <a href="{{ route('login') }}" class="btn-primary">Login</a>
                @else
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="btn-primary">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </header>
        <main>
            @yield('content')
        </main>

    </div>
</body>

</html>
