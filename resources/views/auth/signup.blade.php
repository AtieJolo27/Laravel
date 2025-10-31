<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @if ($errors->any())
        <div class="mb-4 text-red-600 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="container d-flex align-items-center justify-content-center" style="height: 500px;">
            <div class="card p-5">

                <div class="card-body">
                    <form class="" method="POST" action="{{ route('Signup') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <h4>Sign Up</h4>
                                </div>
                                <p class="text-center">
                                    Signup to the website to experience a king-like experience
                                </p>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
                                <input type="email" name="email"placeholder="Email" class="form-control mb-2" required>
                                <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control mb-2" required>
                                <button class="btn btn-primary w-100">SignUp</button>
                                <p class="text-center" >Already have an account?
                                    <span><a href="{{ route('login') }}">Login</a></span>
                                </p>
                            </div>
                        </div>



                    </form>

                </div>
            </div>
        </div>



</body>

</html>