<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $event->title }} - Exhibitors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
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

        .exhibitor-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .exhibitor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border-color: var(--gold);
        }

        .exhibitor-logo {
            width: 120px;
            height: 120px;
            object-fit: contain;
            background: rgba(255, 255, 255, 0.9);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .exhibitor-type {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.875rem;
            background: var(--gold);
            color: var(--dark);
            margin-bottom: 15px;
        }

        .social-links a {
            color: var(--gold);
            margin: 0 10px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: #fff;
            transform: translateY(-2px);
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

        .gold-text {
            color: var(--gold);
        }

        .filter-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 8px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            margin: 5px;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--gold);
            color: var(--dark);
            border-color: var(--gold);
        }

        .footer {
            background: rgba(0, 0, 0, 0.3);
            padding: 60px 0 30px;
            margin-top: 60px;
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
        <div class="container text-center">
            <h1 class="display-4 mb-4 animate__animated animate__fadeIn">Our Exhibitors</h1>
            <p class="lead mb-4 animate__animated animate__fadeIn animate__delay-1s">Meet the industry leaders showcasing their innovations</p>
            @if($exhibitorsPage && isset($exhibitorsPage->content['register_link']))
                <a href="{{ $exhibitorsPage->content['register_link'] }}" class="btn btn-gold animate__animated animate__fadeIn animate__delay-2s">
                    <i class="fas fa-plus-circle me-2"></i>Become an Exhibitor
                </a>
            @endif
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Filters Section -->
        <section class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Browse Exhibitors</h2>
            <div class="filter-buttons mb-4">
                <button class="filter-btn active" data-filter="all">All Categories</button>
                @if($exhibitorsPage && isset($exhibitorsPage->content['categories']))
                    @foreach($exhibitorsPage->content['categories'] as $category)
                        <button class="filter-btn" data-filter="{{ Str::slug($category) }}">{{ $category }}</button>
                    @endforeach
                @endif
            </div>
        </section>

        <!-- Exhibitors Grid -->
        <div class="row g-4">
            @if($exhibitorsPage && isset($exhibitorsPage->content['exhibitors']))
                @foreach($exhibitorsPage->content['exhibitors'] as $exhibitor)
                    <div class="col-md-6 col-lg-4" data-category="{{ Str::slug($exhibitor['category']['en']) }}" data-aos="fade-up">
                        <div class="exhibitor-card p-4 text-center">
                            <img src="{{ asset($exhibitor['logo']) }}" alt="{{ $exhibitor['name']['en'] }}" class="exhibitor-logo">
                            <span class="exhibitor-type">{{ $exhibitor['category'][app()->getLocale()] }}</span>
                            <h4 class="mb-3">{{ $exhibitor['name'][app()->getLocale()] }}</h4>
                            <p class="mb-4">{{ $exhibitor['description'][app()->getLocale()] }}</p>
                            <div class="social-links mb-3">
                                @if(isset($exhibitor['website']))
                                    <a href="{{ $exhibitor['website'] }}" target="_blank"><i class="fas fa-globe"></i></a>
                                @endif
                                @if(isset($exhibitor['linkedin']))
                                    <a href="{{ $exhibitor['linkedin'] }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                @endif
                                @if(isset($exhibitor['twitter']))
                                    <a href="{{ $exhibitor['twitter'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                @endif
                            </div>
                            @if(isset($exhibitor['booth_number']))
                                <div class="booth-number">
                                    <small class="text-muted">Booth Number:</small>
                                    <span class="gold-text fw-bold ms-2">{{ $exhibitor['booth_number'] }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">    
                    <div class="card-custom p-5">
                        <i class="fas fa-store fa-3x mb-3" style="color: var(--gold);"></i>
                        <h3>No Exhibitors Yet</h3>
                        <p class="mb-4">Be the first to showcase your business at our event!</p>
                        @if(isset($exhibitorsPage->content['register_link']))
                            <a href="{{ $exhibitorsPage->content['register_link'] }}" class="btn btn-gold">
                                <i class="fas fa-plus-circle me-2"></i>Register as Exhibitor
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <!-- Floor Plan Section -->
        @if($exhibitorsPage && isset($exhibitorsPage->content['floor_plan']))
            <section class="mt-5 pt-5 text-center" data-aos="fade-up">
                <h2 class="section-title">Exhibition Floor Plan</h2>
                <div class="card-custom p-4">
                    <img src="{{ asset($exhibitorsPage->content['floor_plan']) }}" alt="Floor Plan" class="img-fluid rounded">
                    @if(isset($exhibitorsPage->content['floor_plan_pdf']))
                        <div class="mt-4">
                            <a href="{{ asset($exhibitorsPage->content['floor_plan_pdf']) }}" class="btn btn-gold" download>
                                <i class="fas fa-download me-2"></i>Download Floor Plan
                            </a>
                        </div>
                    @endif
                </div>
            </section>
        @endif
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="gold-text">{{ __('Contact Us') }}</h5>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i> {{ $event->email }}</p>
                    <p class="mb-1"><i class="fas fa-phone me-2"></i> {{ $event->phone }}</p>
                    <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i> {{ $event->location }}</p>
                </div>
                <div class="col-md-4">
                    <h5 class="gold-text">{{ __('Quick Links') }}</h5>
                    <p class="mb-1"><a href="{{ route('events.page', ['event' => $event, 'type' => 'welcome']) }}" class="text-white text-decoration-none">{{ __('Welcome') }}</a></p>
                    <p class="mb-1"><a href="{{ route('events.page', ['event' => $event, 'type' => 'media']) }}" class="text-white text-decoration-none">{{ __('Media') }}</a></p>
                    <p class="mb-0"><a href="{{ route('events.page', ['event' => $event, 'type' => 'registration']) }}" class="text-white text-decoration-none">{{ __('Registration') }}</a></p>
                </div>
                <div class="col-md-4">
                    <h5 class="gold-text">{{ __('Follow Us') }}</h5>
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
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Exhibitor Filtering
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const exhibitors = document.querySelectorAll('[data-category]');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.dataset.filter;

                    // Update active button
                    filterBtns.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter exhibitors
                    exhibitors.forEach(exhibitor => {
                        if (filter === 'all' || exhibitor.dataset.category === filter) {
                            exhibitor.style.display = 'block';
                        } else {
                            exhibitor.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
