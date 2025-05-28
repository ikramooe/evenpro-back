<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->name }} - {{ $form->content['title'][app()->getLocale()] }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --gold: #D4AF37;
            --dark: #1a1a1a;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: rgba(26, 26, 26, 0.9);
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            color: var(--gold) !important;
            font-weight: bold;
        }

        .nav-link {
            color: white !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--gold) !important;
        }

        .hero {
            min-height: 60vh;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--dark);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background: rgba(26, 26, 26, 0.8);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--gold);
        }

        .form-section {
            padding: 5rem 0;
            background-color: white;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            color: var(--dark);
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-description {
            color: #666;
            margin-bottom: 3rem;
            text-align: center;
        }

        .btn-gold {
            background: var(--gold);
            color: var(--dark);
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            background: linear-gradient(45deg, #e2c992, var(--gold));
        }

        .footer {
            background-color: var(--dark);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .footer a {
            color: var(--gold);
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* RTL Support */
        [dir="rtl"] .form-container {
            text-align: right;
        }

        [dir="rtl"] .btn-gold {
            margin-right: 0;
            margin-left: 1rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('events.show', $event) }}">{{ $event->name }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.show', $event) }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#form">{{ __('Registration') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('locale/en') }}">EN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('locale/ar') }}">ع</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero" style="background-image: url('{{ asset($event->image) }}');">
        <div class="hero-content animate__animated animate__fadeIn">
            <h1>{{ $form->content['title'][app()->getLocale()] }}</h1>
            <div class="hero-text">
                {!! $form->content['description'][app()->getLocale()] !!}
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <section id="form" class="form-section">
        <div class="container">
            <div class="form-container" data-aos="fade-up">
                <h2 class="form-title">{{ __('Registration Form') }}</h2>
                <div class="form-description">
                    {{ __('Please fill out the form below to complete your registration.') }}
                </div>

                @if(session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('events.forms.register', ['event' => $event, 'form' => $form]) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    
                    @if($form->type == 'registration_exhibitor')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">{{ __('First Name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="form-label">{{ __('Last Name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="company" class="form-label">{{ __('Company') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company') }}" required>
                            @error('company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">{{ __('Address') }}</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                      
                    </div>
                    @else
                        <!-- Client Registration Form Fields -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">{{ __('Full Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone">{{ __('Phone Number') }}</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="company">{{ __('Company') }}</label>
                                <input type="text" class="form-control" id="company" name="company">
                            </div>
                        </div>
                    
                    @endif
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-gold">{{ __('Submit Registration') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} {{ $event->name }}. {{ __('All rights reserved.') }}</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        // Form validation
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>

</html>
