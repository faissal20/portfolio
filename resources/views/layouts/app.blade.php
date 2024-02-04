<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Tasnim</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/style/style.css') }}">
</head>

<body>
    <header>
        <nav>
            <div class="navbar">
                <div class="logo">
                    🌕
                </div>
                <div class="menu">
                    <ul class="notification">
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
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>