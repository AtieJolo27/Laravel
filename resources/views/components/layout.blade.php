<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/card.css', 'resources/css/swiper.css', 'resources/css/hero.css', 'resources/css/meals.css', 'resources/css/layout.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=BBH+Sans+Bartle&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <div class="d-none d-lg-block navbar navbar-expand navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img src="/storage/products/Logo.png" style="border: 1px; border-radius: 5px;" width="120px"
                    class="img-fluid" alt="">
            </a>

            <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                <li class="navbar-item"><a href="{{ route('home') }}" class="nav-link"><i class="fa-solid fa-house"></i>
                        Home</a></li>
                <li class="navbar-item"><a href="{{ route('meals') }}" class="nav-link"><i
                            class="fa-solid fa-bowl-food"></i>
                        Meals</a>
                </li>
                <li class="navbar-item"><a href="{{ route('cart') }}" class="nav-link"><i class="fa-solid fa-shopping-cart"></i>
                        Cart</a>
                </li>
                <li class="navbar-item">

                </li>
            </ul>
            @auth
                <div class="btn-group">
                    <button class="btn btn-outline-secondary" data-bs-toggle="dropdown"
                        style="border: none; width: auto; height: auto;">
                        <i class="fa-solid fa-user fa-sm" style="font-size: 12px; margin: 0;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <h6 class="dropdown-header">Welcome, {{ Auth::user()->name }}</h6>
                        </li>
                        <li class="dropdown-item">dsadas</li>
                        <li class="dropdown-item">dsadsa</li>
                        <li class="dropdown-item">
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button class="nav-link" type="submit"><i class="fa-solid fa-right-from-bracket"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
                <a href="{{ route('Signup') }}" class="nav-link bg-dark"><i class="fa-solid fa-user"></i> Login /
                    Signup</a>
            @endguest
        </div>
    </div>
    
    <div class="d-lg-none navbar navbar-expand navbar-dark bg-dark sticky-top">
        <div class="container-fluid d-block">
            <div class="row">
            <a href="#" class="navbar-brand">
                 <img src="/storage/products/Logo.png" style="border: 1px; border-radius: 5px;" width="100px"
                    class="img-fluid" alt="">
            </a>
            </div>
            <div class="row">
            <ul class="navbar-nav me-auto d-flex justify-content-between">
                <li class="navbar-item">
                    <a href="{{ route('home') }}" class="nav-link"><i class="fa-solid fa-house fa-xl"></i></a>
                </li>
                <li class="navbar-item">
                    <a href="{{ route('meals') }}" class="nav-link"><i class="fa-solid fa-bowl-food fa-xl"></i></a>
                </li>
                <li class="navbar-item">
                    <a href="{{ route('cart') }}" class="nav-link"><i class="fa-solid fa-shopping-cart fa-xl"></i></a>
                </li>
                <li class="navbar-item">
                    <a href="{{ route('cart') }}" class="nav-link"><i class="fa-solid fa-shopping-cart fa-xl"></i></a>
                </li>
                
                <div class="text-end">
                    @auth
                <div class="btn-group text-end ml-2">
                    <button class="btn btn-outline-secondary" data-bs-toggle="dropdown"
                        style="border: none">
                        <i class="fa-solid fa-user fa-lg    " style="font-size: ; margin: 0;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <h6 class="dropdown-header">Welcome, {{ Auth::user()->name }}</h6>
                        </li>
                        <li class="dropdown-item">dsadas</li>
                        <li class="dropdown-item">dsadsa</li>
                        <li class="dropdown-item">
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button class="nav-link" type="submit"><i class="fa-solid fa-right-from-bracket"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
                <a href="{{ route('Signup') }}" class="nav-link"><i class="fa-solid fa-user"></i> Login /
                    Signup</a>
            @endguest
                </div>
            </ul>
            </div>
        </div>
    </div>
    @session('success')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $value }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    {{ $slot }}


    @vite(['resources/js/loading.js'])
</body>

</html>