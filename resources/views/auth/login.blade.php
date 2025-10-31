<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>


<body>

    <div class="container d-flex align-items-center justify-content-center" style="height: 500px;">
        <div class="card p-5">

            <div class="card-body">
                <form class="" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center">
                                <h4>Login</h4>
                            </div>
                            <p class="text-center">
                                Login your account to experience a king-like experience
                            </p>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
                            <input type="password" name="password" placeholder="Password" class="form-control mb-2"
                                required>
                            <button class="btn btn-primary w-100">Login</button>
                            <p class="text-center">Don't have an account?
                                <span><a href="{{ route('Signup') }}">Signup</a></span>
                            </p>
                        </div>
                    </div>



                </form>

            </div>
        </div>
    </div>



</body>

</html>