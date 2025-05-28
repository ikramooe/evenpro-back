<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from www.devsnews.com/template/growbiz/growbiz/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 May 2025 11:03:21 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EvenPro Expo - L'excellence au service de vos événements</title>
    <meta name="description" content="EvenPro Expo: Agence événementielle professionnelle spécialisée dans l'organisation de salons, congrès et forums">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="https://devsnews.com/template/growbiz/growbiz/site.webmanifest/">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer-theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <!-- header area start  -->
    <header>
        <div class="header__top d-none d-md-block header__top-2">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-9 col-md-8">
                        <div class="grb__cta header-cta st-2">
                            <ul>
                                <li class="d-none">
                                    <div class="cta__icon">
                                        <span><i class="fas fa-phone-alt"></i></span>
                                    </div>
                                    <div class="cta__content">
                                        <p>{{ __('Call Us:') }}</p>
                                        <span><a href="tel:{{ settings('phone') }}">{{ settings('phone') }}</a></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="cta__icon">
                                        <span><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <div class="cta__content">
                                        <p>{{ __('Contactez-nous:') }}</p>
                                        <span><a href="mailto:{{ settings('email') }}">{{ settings('email') }}</a></span>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="grb__social f-right st-2">
                            <ul>
                                <li><a href="{{ settings('facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ settings('twitter') }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ settings('instagram') }}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ settings('pinterest') }}"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                            <svg class="social-bg-1" xmlns="http://www.w3.org/2000/svg" width="280.537" height="70.101"
                                viewBox="0 0 280.537 70.101">
                                <path id="Path_2990" data-name="Path 2990"
                                    d="M-2528,1049.1v-45a25,25,0,0,1,25-25h195v70Zm220-70.063h53.591c-49.1,1.284-53.591,35.063-53.591,35.063Zm60.5.026h0Zm0,0h0Zm-.009,0h0Zm-.017,0h0Zm-.009,0h0Zm0,0h0Zm0,0h0Zm-.016,0h0Zm-.025,0h0Zm-.01,0h0Zm-.047,0h0Zm-.005,0h0Zm-.015,0h0Zm-.01,0h0Zm0,0h0Zm-.132,0,.132,0Zm0,0h0Zm-.094,0,.094,0Zm-.013,0h0Zm-.061,0,.061,0Zm-.039,0h0Zm-.038,0h0Zm-.245-.006h-.251c-.412-.011-.125,0,.163,0l.373.01Zm-.011,0h0Zm-.024,0h0Zm-.115,0h0Zm.335.008h0Zm-.087,0,.087,0Zm-.013,0h0Zm-.084,0,.084,0Zm0,0h0Zm-.085,0h0Zm-.12,0h0Zm-.046,0h-5.863c1.889-.049,3.839-.051,5.863,0Z"
                                    transform="translate(2528 -979)" fill="#d0bfd7" />
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__main header-sticky header-main-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-8">
                        <div class="logo">
                            <a class="logo-text-white" href="/"><img src="{{ asset('assets/img/logo/wrwh.png') }}"
                                    alt=""></a>
                            <a class="logo-text-black" href="/"><img src="{{ asset('assets/img/logo/logowh.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-4">
                        <div class="header__menu-area f-right">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li><a href="/">{{ __('Accueil') }}</a></li>
                                        <li><a href="/about">{{ __('A propos') }}</a></li>
                                      
                                    
                                        <li class="menu-item-has-children"><a href="/events">{{ __('Evenements') }}</a>
                                            <ul class="sub-menu">
                                               @foreach (App\Models\Event::all() as $event)
                                               <li><a href="/events/{{ $event->slug }}">{{ $event->title }}</a></li>
                                               @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="/services">{{ __('Services') }}</a></li>
                                      
                                       
                                       
                                        <li><a href="/contact">{{ __('Contact') }}</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header__search">
                              
                                <a class="side-toggle d-lg-none" href="javascript:void(0)"><i
                                        class="fal fa-bars"></i></a>
                            </div>
                            <div class="header__btn d-none">
                                <a href="#" class="grb-btn">{{__('Get Reserved')}}<i class="fas fa-arrow-right"></i></a>
                            </div>
                            <ul class="menu-cta-2 d-none d-xl-inline-block">
                                <li>
                                    <div class="cta__icon">
                                        <span><i class="fas fa-phone-alt"></i></span>
                                    </div>
                                    <div class="cta__content">
                                        <p>{{ __('Call For Estimate') }}</p>
                                        <span><a href="tel:{{ settings('phone') }}">{{ settings('phone') }} </a></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="cta__icon">
                                        <span><i class="fas fa-globe"></i></span>
                                    </div>
                                    <div class="cta__content">
                                        <p>{{ __('Language') }}</p>
                                        <div class="language-switcher">
                                            <a href="{{ route('language', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">{{ __('English') }}</a> |
                                            <a href="{{ route('language', 'ar') }}" class="{{ app()->getLocale() == 'ar' ? 'active' : '' }}">{{ __('Arabic') }}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    <!-- side toggle start  -->
    <div class="fix">
        <div class="side-info">
            <div class="side-info-content">
                <div class="offset-widget offset-logo mb-30 pb-20">
                    <div class="row align-items-center">
                        <div class="col-9"><a href="/"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo"></a>
                        </div>
                        <div class="col-3 text-end"><button class="side-info-close"><i
                                    class="fal fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu d-lg-none"></div>
                <div class="offset-widget offset_searchbar mb-30">
                    <form method="get" action="#">
                        <div class="offset_search_content">
                            <input type="search" placeholder="What are you searching for?">
                            <button type="submit" class="offset_search_button"><i class="fal fa-search"></i></button>
                        </div>
                    </form>
                </div>

                <div class="offset-widget mb-40 d-none d-lg-block">
                    <div class="info-widget">
                        <h4 class="offset-title mb-20 d-none">About Us</h4>
                        <p class="mb-30">But I must explain to you how all this mistaken idea of
                            denouncing pleasure and
                            praising pain
                            was born and will give you a complete account of the system and expound the actual teachings
                            of the great
                            explore</p>
                        <a href="#" class="c-btn btn-round-02 d-none">Contact Us</a>
                    </div>
                </div>

                <div class="row side-gallery gx-4">
                    <div class="col-4 mb-20">
                        <div class="side-image">
                            <a class="popup-image" href="assets/img/portfolio/pm1.jpg"><img
                                    src="assets/img/portfolio/pm1.jpg" alt="sidebar-img"></a>
                        </div>
                    </div>
                    <div class="col-4 mb-20">
                        <div class="side-image">
                            <a class="popup-image" href="assets/img/portfolio/pm2.jpg"><img
                                    src="assets/img/portfolio/pm2.jpg" alt="sidebar-img"></a>
                        </div>
                    </div>
                    <div class="col-4 mb-20">
                        <div class="side-image">
                            <a class="popup-image" href="assets/img/portfolio/pm3.jpg"><img
                                    src="assets/img/portfolio/pm3.jpg" alt="sidebar-img"></a>
                        </div>
                    </div>
                    <div class="col-4 mb-20">
                        <div class="side-image">
                            <a class="popup-image" href="assets/img/portfolio/pm4.jpg"><img
                                    src="assets/img/portfolio/pm4.jpg" alt="sidebar-img"></a>
                        </div>
                    </div>
                    <div class="col-4 mb-20">
                        <div class="side-image">
                            <a class="popup-image" href="assets/img/portfolio/pm5.jpg"><img
                                    src="assets/img/portfolio/pm5.jpg" alt="sidebar-img"></a>
                        </div>
                    </div>
                    <div class="col-4 mb-20">
                        <div class="side-image">
                            <a class="popup-image" href="assets/img/portfolio/pm6.jpg"><img
                                    src="assets/img/portfolio/pm6.jpg" alt="sidebar-img"></a>
                        </div>
                    </div>
                </div>

                <div class="side-map mt-20 mb-30 d-none d-lg-block">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3041981.899057291!2d-87.62979822192196!3d41.878113633413804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2c3cd0f4cbed%3A0xafe0a6ad09c0c000!2sChicago%2C%20IL%2C%20USA!5e0!3m2!1sen!2sbd!4v1627994034288!5m2!1sen!2sbd"></iframe>
                </div>



                <div class="contact-infos mt-30 mb-30">
                    <div class="contact-list mb-30">
                        <h4>Contact Info</h4>
                        <a href="#" class="">
                            <i class="fal fa-map-marker-alt"></i>
                            <span>Johnson Super Street,
                                New York, USA 2344</span>
                        </a>
                        <a href="tel:(555)764890345" class="">
                            <i class="fal fa-phone"></i>
                            <span>(555) 764 890 345</span>
                        </a>
                        <a href="https://www.devsnews.com/cdn-cgi/l/email-protection#d8b1b6beb798bcb7b5b9b1b6f6bbb7b5" class="">
                            <i class="far fa-envelope"></i>
                            <span><span class="__cf_email__" data-cfemail="6d04030b022d0902000c0403430e0200">[email&#160;protected]</span></span>
                        </a>

                    </div>
                    <div class="grb__social footer-social offset-social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- side toggle end -->
    <!-- Fullscreen search -->
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fal fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input" placeholder="Search Your Keyword...">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @yield('content')

    <footer>
        <section class="footer-area pt-100 pb-60">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="assets/img/logo/logo.png" alt="">
                                </a>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form,
                                by injected humour</p>
                            <div class="grb__social footer-social-2">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-widget-title">
                                <h4>My Account</h4>
                            </div>
                            <ul class="footer-list st-2">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">Newsletter</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget mb-40 fw3">
                            <div class="footer-widget-title">
                                <h4>Our Company</h4>
                            </div>
                            <ul class="footer-list st-2">
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Return Policy</a></li>
                                <li><a href="#">Mission & Vision</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-widget-title">
                                <h4>Newsletter</h4>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                            <form class="subscribe-form mb-30 st-2">
                                <input type="text" placeholder="Enter your email...">
                                <button type="submit"><i class="fas fa-paper-plane"></i>Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="copyright-area st-2">
            <div class="container">
                <div class="row wow fadeInUp align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright-text st-2">
                            <p>Copyrighted by <a href="#">@Bdevs</a> | All Right Reserved</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="copyright-list f-right st-2">
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="about.html">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->



    <!-- JS here -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/appair.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>


<!-- Mirrored from www.devsnews.com/template/growbiz/growbiz/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 May 2025 11:03:26 GMT -->
</html>