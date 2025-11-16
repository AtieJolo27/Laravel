<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/login.css'])
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center" style="height: 500px;">
        <div class="card p-5">
            <div class="card-body">
                <form id="loginForm" class="" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center">
                                <h4 >Login</h4>
                            </div>
                            <p class="text-center">
                                Login your account to experience a king-like experience!
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label for="EmailField" class="fw-bold">Email Address</label>
                            <input type="email" name="email" placeholder="Email" class="form-control mb-2 EmailField" required>
                            <label for="PasswordField" class="fw-bold">Password</label>
                            <div class="password-wrapper w-100 mb-2" style="position: relative; display: inline-block;">
                                <input type="password" name="password"class="form-control PasswordField" placeholder="Password" required />
                                <button type="button" class="toggle-password"
                                    aria-label="Toggle password visibility"></button>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-4">Login</button>
                            <p class="text-center">Don't have an account?
                                <span><a href="{{ route('Signup') }}">Signup</a></span>
                            </p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    @vite(['resources/js/passwordReveal.js', 'resources/js/login.js'])
</body>

</html>