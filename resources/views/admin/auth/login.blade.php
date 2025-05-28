<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Falcon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/user.min.css') }}">
</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid">
            <div class="row min-vh-100 flex-center g-0">
                <div class="col-lg-8 col-xxl-5 py-3 position-relative">
                    <div class="card overflow-hidden z-index-1">
                        <div class="card-body p-0">
                            <div class="row g-0 h-100">
                                <div class="col-md-5 text-center bg-card-gradient">
                                    <div class="position-relative p-4 pt-md-5 pb-md-7">
                                        <div class="bg-holder bg-auth-card-shape"
                                            style="background-image:url({{ asset('assets/img/half-circle.png') }});">
                                        </div>
                                        <div class="z-index-1 position-relative">
                                            <a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder"
                                                href="{{ route('admin.login') }}">
                                                {{ config('app.name') }}
                                            </a>
                                            <p class="opacity-75 text-white">
                                                Welcome back! Please log in to access the admin panel.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4 mt-md-4 mb-md-5">
                                        <p class="text-white">
                                            Don't have an account?<br>Contact the system administrator
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <div class="row flex-between-center">
                                            <div class="col-auto">
                                                <h3>Admin Login</h3>
                                            </div>
                                        </div>
                                        <form method="POST" action="{{ route('admin.login.submit') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email address</label>
                                                <input class="form-control @error('email') is-invalid @enderror" 
                                                       type="email" 
                                                       id="email" 
                                                       name="email" 
                                                       value="{{ old('email') }}" 
                                                       required 
                                                       autofocus>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password">Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror" 
                                                       type="password" 
                                                       id="password" 
                                                       name="password" 
                                                       required>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row flex-between-center">
                                                <div class="col-auto">
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" 
                                                               type="checkbox" 
                                                               name="remember" 
                                                               id="remember" 
                                                               {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label mb-0" for="remember">
                                                            Remember me
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 mt-4">
                                                <button class="btn btn-primary d-block w-100" type="submit">
                                                    Log in
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
</body>

</html>
