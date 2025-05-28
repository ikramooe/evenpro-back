<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $event->title }} - Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <style>
        :root {
            --primary: #6a618e;
            --gold: #c5a572;
            --accent: #28a745;
            --dark: #0a0c1b;
            --light: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark) 100%);
            color: #fff;
        }

        .section-transition {
            position: relative;
            overflow: hidden;
        }

        .section-transition::before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background: inherit;
            transform: skewY(-2deg);
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.4);
        }

        .hero {
            background: url('https://hajjconfex.com/img/hajjconfex25-cover.68d8f8bb.jpg') center/cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        section {
            padding: 60px 0;
        }

        .section-title {
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 30px;
        }

        .card-custom {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border-color: var(--gold);
        }

        .card-custom .card-body i {
            font-size: 2rem;
            color: var(--gold);
        }

        .footer {
            background: #2e1f52;
            color: #aaa;
            padding: 40px 0;
        }

        .footer a {
            color: #ccc;
            text-decoration: none;
        }

        .footer a:hover {
            color: var(--gold);
        }

        .btn-gold {
            background: linear-gradient(45deg, var(--gold), #e2c992);
            color: var(--dark);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
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
            color: var(--dark);
        }

        .btn-gold:hover {
            background-color: #b59b42;
        }

        .gold-text {
            color: var(--gold);
        }

        /* Countdown */
        .countdown-box {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .countdown-time {
            font-size: 2rem;
            font-weight: bold;
        }

        .countdown-time span {
            display: inline-block;
            margin: 0 10px;
        }

        .countdown-time span small {
            display: block;
            font-size: 0.8rem;
            color: var(--gold);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">{{ $event->title }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
           
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero d-flex align-items-center" style="background-image: url('{{ $event->cover_image ? asset($event->cover_image) : asset('images/event-default-cover.jpg') }}');">
        <div class="container text-center hero-content">
            <h1 class="display-4 mb-4 animate__animated animate__fadeIn">{{($event->title)}} </h1>
            <p class="lead animate__animated animate__fadeIn animate__delay-1s">{{__('Explore our event through photos, videos, and more')}}</p>
        </div>
    </div>
    <!-- Main Content -->
    <div class="container ">
        <!-- Navigation Tabs -->
     

        <!-- Gallery Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card-custom p-4">
                    <h3 class="mb-4">{{ __('Event Gallery') }}</h3>
                    @if($mediaPage && isset($mediaPage->content['media_images']) && count($mediaPage->content['media_images']) > 0)
                        <div class="gallery-grid">
                            @foreach($mediaPage->content['media_images'] as $image)
                                <a href="{{ asset($image['image']) }}" class="gallery-item" data-fancybox="gallery">
                                    <img src="{{ asset($image['image']) }}" alt="Gallery Image">
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-images fa-3x mb-3" style="color: var(--gold);"></i>
                            <p class="mb-0">{{ __('No images available in the gallery yet.') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

       
    </div>

    <!-- Footer -->
    <footer class="py-5 mt-5" style="background: rgba(0, 0, 0, 0.3);">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 style="color: var(--gold);">{{ __('Contact Us') }}</h5>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i> {{ $event->email }}</p>
                    <p class="mb-1"><i class="fas fa-phone me-2"></i> {{ $event->phone }}</p>
                    <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i> {{ $event->location }}</p>
                </div>
                <div class="col-md-4">
                    <h5 style="color: var(--gold);">{{ __('Quick Links') }}</h5>
                    <p class="mb-1"><a href="{{ route('events.page', ['event' => $event, 'type' => 'welcome']) }}" class="text-white text-decoration-none">{{ __('Welcome') }}</a></p>
                    <p class="mb-1"><a href="{{ route('events.page', ['event' => $event, 'type' => 'registration']) }}" class="text-white text-decoration-none">{{ __('Registration') }}</a></p>
                    <p class="mb-0"><a href="{{ route('events.page', ['event' => $event, 'type' => 'exhibitors']) }}" class="text-white text-decoration-none">{{ __('Exhibitors') }}</a></p>
                </div>
                <div class="col-md-4">
                    <h5 style="color: var(--gold);">{{ __('Follow Us') }}</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white fs-5"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white fs-5"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white fs-5"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white fs-5"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="mb-0 text-muted">© {{ date('Y') }} {{ $event->title }}. {{ __('All rights reserved.') }}</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        Fancybox.bind('[data-fancybox]', {
            // Your custom options
        });
    </script>
</body>
</html>


