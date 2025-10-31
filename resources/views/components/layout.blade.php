<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/card.css', 'resources/css/swiper.css', 'resources/css/hero.css', 'resources/css/meals.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=BBH+Sans+Bartle&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>



    <div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img src="/storage/products/Logo.jpg" style="border: 1px; border-radius: 5px;" width="120px"
                    class="img-fluid" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#NavigationBar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse show" id="NavigationBar">
                <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                    <li class="navbar-item"><a href="{{ route('home') }}" class="nav-link"><i
                                class="fa-solid fa-house"></i> Home</a></li>
                    <li class="navbar-item"><a href="/meals" class="nav-link"><i class="fa-solid fa-bowl-food"></i>
                            Meals</a>
                    </li>
                    <li class="navbar-item"><a href="{{ route('cart') }}" class="nav-link"><i class="fa-solid fa-coins"></i> Pricing</a>
                    </li>
                    <li class="navbar-item">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button class="nav-link" type="submit"><i class="fa-solid fa-right-from-bracket"></i>
                                Logout</button>
                        </form>
                    </li>
                </ul>
                <a class="nav-link m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd"><i
                        class="fa fa-shopping-cart"></i> Cart {{ count($cartItems) }}</a>
                @auth
                    <p class="mb-0">Welcome, {{ Auth::user()->name }}</p>
                @endauth
                @guest
                    <a href="{{ route('Signup') }}" class="nav-link bg-dark"><i class="fa-solid fa-user"></i> Login /
                        Signup</a>

                @endguest
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

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">

        <div class="offcanvas-body">
            <div class="card w-100 h-100">
                <div class="card-header">
                    <h6 class="card-title d-flex justify-content-between align-items-center p-2 pb-1">
                        Your Cart
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>

                    </h6>
                </div>
                <div class="card-body h-100">
                    @include('partials.cart-items', ['cartItems' => $cartItems])
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="mb-2">Subtotal</h6>
                            <h6>Total</h6>
                        </div>
                        <div class="col-md-4 text-right">
                            {{-- aayusin pa tong mga putanginang subtotal --}}
                            {{-- <h6>₱ {{ number_format($subTotal, 2)}}</h6>
                            <h6>₱ {{ $total }}</h6> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/loading.js'])
</body>

</html>