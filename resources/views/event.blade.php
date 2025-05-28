<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hajj Conference & Exhibition</title>
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
            <a class="navbar-brand" href="#">HAJJCONFEX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#conference">Conference</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sponsors">Sponsors</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    @php
    $isVideo = Str::endsWith($event->image, '.mp4');
@endphp

@if ($isVideo)
    <div class="hero d-flex align-items-center position-relative">
        <video autoplay muted loop playsinline class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
            <source src="{{ asset($event->image) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="position-relative w-100">
            <!-- Your content goes here (title, text, etc.) -->
      
@else
    <div class="hero d-flex align-items-center" style="background-image: url('{{ asset($event->image) }}');">
    
@endif

        <div class="container">
            <h1 class="animate__animated animate__fadeIn">
                @if ($welcomePage && isset($welcomePage->content['hero']['title'][app()->getLocale()]))
                    {{ $welcomePage->content['hero']['title'][app()->getLocale()] }}
                @else
                    {{ $event->name }}
                @endif
            </h1>
            @if ($welcomePage && isset($welcomePage->content['hero']['text'][app()->getLocale()]))
                <div class="mt-4 mb-4 animate__animated animate__fadeIn animate__delay-1s hero-text">
                    {!! $welcomePage->content['hero']['text'][app()->getLocale()] !!}
                </div>
            @endif
            <section class="text-center">
                <div class="container">
                    <div class="countdown-box animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="countdown-time" id="countdown">
                            <span><span id="days">--</span><small>Days</small></span>
                            <span><span id="hours">--</span><small>Hours</small></span>
                            <span><span id="minutes">--</span><small>Minutes</small></span>
                            <span><span id="seconds">--</span><small>Seconds</small></span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Countdown Section -->


    <!-- About -->
    @if (
        $welcomePage &&
            (isset($welcomePage->content['about']['title'][app()->getLocale()]) ||
                isset($welcomePage->content['about']['description'][app()->getLocale()])))
        <section id="about">
            <div class="container text-center">
                @if (isset($welcomePage->content['about']['title'][app()->getLocale()]))
                    <h2 class="section-title" data-aos="fade-up">
                        {{ $welcomePage->content['about']['title'][app()->getLocale()] }}
                    </h2>
                @endif

                @if (isset($welcomePage->content['about']['image']))
                    <img src="{{ asset($welcomePage->content['about']['image']) }}" class="img-fluid mb-4"
                        alt="About Image" style="max-height: 300px;" data-aos="fade-up" data-aos-delay="100" />
                @endif

                @if (isset($welcomePage->content['about']['description'][app()->getLocale()]))
                    <div class="about-content" data-aos="fade-up" data-aos-delay="200">
                        {!! $welcomePage->content['about']['description'][app()->getLocale()] !!}
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- Vision & Mission -->
    @if (
        $welcomePage &&
            isset($welcomePage->content['about']['cards']) &&
            count($welcomePage->content['about']['cards']) > 0)
        <section>
            <div class="container">
                <div class="row text-center">
                    @foreach ($welcomePage->content['about']['cards'] as $index => $card)
                        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="card card-custom">
                                <div class="card-body">
                                    @if (isset($card['icon']))
                                        <i class="{{ $card['icon'] }}"></i>
                                    @endif
                                    @if (isset($card['title'][app()->getLocale()]))
                                        <h5 class="mt-3">{{ $card['title'][app()->getLocale()] }}</h5>
                                    @endif
                                    @if (isset($card['description'][app()->getLocale()]))
                                        <p>{!! $card['description'][app()->getLocale()] !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Conference -->
    @if ($welcomePage && isset($welcomePage->content['agenda']))
        <section id="conference" class="bg-dark text-white section-transition">
            <div class="container text-center">
                @if (isset($welcomePage->content['agenda']['title'][app()->getLocale()]))
                    <h2 class="section-title" data-aos="fade-up">
                        {{ $welcomePage->content['agenda']['title'][app()->getLocale()] }}
                    </h2>
                @endif

                @if (isset($welcomePage->content['agenda']['image']))
                    <img src="{{ asset($welcomePage->content['agenda']['image']) }}"
                        class="img-fluid rounded-circle mb-4" style="max-width: 300px;" alt="conference"
                        data-aos="fade-up" data-aos-delay="100" />
                @endif

                @if (isset($welcomePage->content['agenda']['description'][app()->getLocale()]))
                    <div class="lead" data-aos="fade-up" data-aos-delay="100">
                        {!! $welcomePage->content['agenda']['description'][app()->getLocale()] !!}
                    </div>
                @endif

                @if (isset($welcomePage->content['agenda']['items']) && count($welcomePage->content['agenda']['items']) > 0)
                    <div class="row mt-4" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($welcomePage->content['agenda']['items'] as $index => $item)
                            <div class="col-md-4">
                                @if (isset($item['title'][app()->getLocale()]))
                                    <h5 class="gold-text">{{ $item['title'][app()->getLocale()] }}</h5>
                                @endif
                                @if (isset($item['description'][app()->getLocale()]))
                                    <p>{!! $item['description'][app()->getLocale()] !!}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif



    <!-- services -->
    @if (
        $welcomePage &&
            isset($welcomePage->content['services']) &&
            isset($welcomePage->content['services']['cards']) &&
            count($welcomePage->content['services']['cards']) > 0)
        <section id="features" class="section-transition">
            <div class="container text-center">
                <h2 class="section-title" data-aos="fade-up">{{ __('Services') }}</h2>
                <div class="row">
                    @foreach ($welcomePage->content['services']['cards'] as $service)
                        <div class="col-md-3" data-aos="flip-left" data-aos-delay="100"><img
                                src="{{ isset($service['image']) ? Storage::url($service['image']) : '' }}" class="img-fluid mb-3" alt="feature" />
                            <p>{{ $service['title'][app()->getLocale()] }}</p>
                        </div>
                    @endforeach



                </div>
            </div>

        </section> <!-- Sponsors -->
    @endif

    @if (
        $welcomePage &&
            isset($welcomePage->content['sponsors']) &&
         
            count($welcomePage->content['sponsors']) > 0)
        <section id="sponsors" class="bg-dark text-center text-white section-transition">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">{{ __('Sponsors & Partenaires') }}</h2>
                <p class="lead mb-5" data-aos="fade-up" data-aos-delay="100">
                    {{ __('Nous sommes fiers de collaborer avec des organisations de premier plan qui partagent notre vision d\'un Hajj innovant et durable.') }}
                </p>
                <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="sponsor-category">
                            <h5 class="gold-text">Partenaire Platine</h5>
                            <p>Leader de l'innovation technologique</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="sponsor-category">
                            <h5 class="gold-text">Partenaire Or</h5>
                            <p>Expert en solutions digitales</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="sponsor-category">
                            <h5 class="gold-text">Partenaire Argent</h5>
                            <p>Spécialiste en logistique</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="sponsor-category">
                            <h5 class="gold-text">Partenaire Bronze</h5>
                            <p>Services aux pèlerins</p>
                        </div>
                    </div>
                </div>
                @foreach ($welcomePage->content['sponsors'] as $index => $card)
                 <img src="{{ Storage::url($card['logo']) }}" alt="Sponsor 1"
                    style="max-width: 120px; margin: 0 15px;" /> 
                @endforeach
                    
                    
                    
            </div>
        </section> <!-- Footer -->
    @endif

    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="gold-text">Contact</h5>
                    <p><i class="fas fa-envelope me-2"></i>info@hajjconfex.com</p>
                    <p><i class="fas fa-phone me-2"></i>+966 123 4567</p>
                    <p><i class="fas fa-map-marker-alt me-2"></i>Centre des Congrès de La Mecque</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="gold-text">Liens Rapides</h5>
                    <p><a href="#about">À propos</a></p>
                    <p><a href="#conference">Programme</a></p>
                    <p><a href="#sponsors">Partenaires</a></p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="gold-text">Suivez-nous</h5>
                    <div class="social-icons mt-3">
                        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <p>© 2025 Conférence et Exposition du Hajj. Tous droits réservés.</p>
            </div>
        </div>
    </footer> <!-- Video background -->
    <video autoplay muted loop playsinline id="background-video"
        style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; object-fit: cover; z-index: -1; filter: brightness(0.5); pointer-events: none;">
        <source src="/assets/hajj.mp4" type="video/webm" />
        <source
            src="https://cdn.videvo.net/videvo_files/video/free/2019-12/small_watermarked/191104_01_Drone_Highland_4k_009_preview.mp4"
            type="video/mp4" />
    </video>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>
    <script>
        const countdownDate = new Date("October 10, 2025 09:00:00").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = countdownDate - now;

            if (distance < 0) {
                document.getElementById("countdown").innerHTML = "Event has started!";
                clearInterval(timerInterval);
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").textContent = days;
            document.getElementById("hours").textContent = hours;
            document.getElementById("minutes").textContent = minutes;
            document.getElementById("seconds").textContent = seconds;
        }

        const timerInterval = setInterval(updateCountdown, 1000);
        updateCountdown(); // initial call to show immediately
    </script>
</body>

</html>
