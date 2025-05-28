@extends('layouts.app')
@section('content')
    <main>
        <!-- hero area start  -->
        <section class="hero-area p-relative">
            <div class="slider-active swiper-container">
                <div class="swiper-wrapper">
                    @if (isset($sections['hero_section']) &&
                            isset($sections['hero_section']['hero_section']['slides']) &&
                            is_array($sections['hero_section']['hero_section']['slides']))
                        @foreach ($sections['hero_section']['hero_section']['slides'] as $slide)
                            <div class="single-slider slider-height st-2 swiper-slide slider-overlay"
                                data-swiper-autoplay="5000">
                                <div class="slide-bg" data-background="{{ asset($slide['background_image']) }}"></div>
                                <div class="banner3-shape">
                                    <img src="assets/img/image.webp" alt="">
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-9">
                                            <div class="hero-content text-center">
                                                <p data-animation="fadeInUp" data-delay=".3s">
                                                    {{ $slide['texts'][app()->getLocale()]['subtitle'] }}</p>
                                                <h1 data-animation="fadeInUp" data-delay=".5s">
                                                    {{ $slide['texts'][app()->getLocale()]['title'] }}</h1>
                                                <div class="hero-content-btn st-2" data-animation="fadeInUp"
                                                    data-delay=".7s">
                                                    <a href="{{ $slide['texts'][app()->getLocale()]['button_link'] }}"
                                                        class="grb-btn">
                                                        {{ $slide['texts'][app()->getLocale()]['button_text'] }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- If we need navigation buttons -->
                <div class="slider-nav">
                    <div class="swiper-button-prev"><i class="far fa-arrow-left"></i></div>
                    <div class="swiper-button-next"><i class="far fa-arrow-right"></i></div>
                </div>
            </div>
        </section>
        <!-- hero area end -->
        <!-- about area start  -->
        <section class="about__area st-2">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-xl-6 col-lg-5">
                        <div class="about__img p-relative mb-30">
                            <div class="about__img-inner st-2">
                                @if (isset($sections['about_section']) && isset($sections['about_section']['about_section']['main_image']))
                                    <img src="{{ asset($sections['about_section']['about_section']['main_image']) }}"
                                        alt="{{ $sections['about_section']['about_section']['texts'][app()->getLocale()]['title'] }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="about__content mb-30 st-2">
                            <div class="section-title mb-30">
                                <div class="border-left st-2">
                                    @if (isset($sections['about_section']) &&
                                            isset($sections['about_section']['about_section']['texts']) &&
                                            isset($sections['about_section']['about_section']['texts'][app()->getLocale()]))
                                        <p>{{ $sections['about_section']['about_section']['texts'][app()->getLocale()]['subtitle'] }}</p>
                                    @endif
                                </div>
                                @if (isset($sections['about_section']) &&
                                        isset($sections['about_section']['about_section']['texts']) &&
                                        isset($sections['about_section']['about_section']['texts'][app()->getLocale()]))
                                    <h2>{{ $sections['about_section']['about_section']['texts'][app()->getLocale()]['title'] }}</h2>
                                @endif
                            </div>
                            @if (isset($sections['about_section']) &&
                                    isset($sections['about_section']['about_section']['texts']) &&
                                    isset($sections['about_section']['about_section']['texts'][app()->getLocale()]))
                                <p>{{ $sections['about_section']['about_section']['texts'][app()->getLocale()]['description'] }}</p>
                            @endif
                            <div class="ab-experience">
                                <div class="ab-experience-content">
                                    <div class="ab-experience-icon st-2">
                                        @if (isset($sections['about_section']) &&
                                                isset($sections['about_section']['about_section']['experience']) &&
                                                isset($sections['about_section']['about_section']['experience']['icon']))
                                            <i class="{{ $sections['about_section']['about_section']['experience']['icon'] }}"></i>
                                        @endif
                                    </div>
                                    <div class="ab-experience-text">
                                        @if (isset($sections['about_section']) &&
                                                isset($sections['about_section']['about_section']['experience']) &&
                                                isset($sections['about_section']['about_section']['experience']['years']))
                                            <p><span
                                                    class="st-2">{{ $sections['about_section']['about_section']['experience']['years'] }}+</span>
                                                @if (isset($sections['about_section']) &&
                                                        isset($sections['about_section']['about_section']['texts']) &&
                                                        isset($sections['about_section']['about_section']['texts'][app()->getLocale()]))
                                                    {{ $sections['about_section']['about_section']['texts'][app()->getLocale()]['experience']['text'] }}
                                                @endif
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                @if (isset($sections['about_section']) &&
                                        isset($sections['about_section']['about_section']['texts']) &&
                                        isset($sections['about_section']['about_section']['texts'][app()->getLocale()]))
                                    <p class="ab-experience-p">
                                        {{ $sections['about_section']['about_section']['texts'][app()->getLocale()]['experience']['details'] }}
                                    </p>
                                @endif
                            </div>
                            <ul class="about-points st-2">
                                @if (isset($sections['about_section']) &&
                                        isset($sections['about_section']['about_section']['points']) &&
                                        is_array($sections['about_section']['about_section']['points']))
                                    @foreach ($sections['about_section']['about_section']['points'] as $point)
                                        <li>
                                            <div class="points-heading">
                                                <div class="p-icon">
                                                    @if (isset($point['icon']))
                                                        <i class="{{ $point['icon'] }}"></i>
                                                    @endif
                                                </div>
                                                @if (isset($point['texts']) && isset($point['texts'][app()->getLocale()]))
                                                    <h5>{{ $point['texts'][app()->getLocale()]['title'] }}</h5>
                                                @endif
                                            </div>
                                            @if (isset($point['texts']) && isset($point['texts'][app()->getLocale()]))
                                                <p>{{ $point['texts'][app()->getLocale()]['description'] }}</p>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="about__btn">
                                @if (isset($sections['about_section']) &&
                                        isset($sections['about_section']['about_section']['texts']) &&
                                        isset($sections['about_section']['about_section']['texts'][app()->getLocale()]))
                                    <a href="{{ $sections['about_section']['about_section']['texts'][app()->getLocale()]['button']['link'] }}"
                                        class="grb-btn st-2">
                                        {{ $sections['about_section']['about_section']['texts'][app()->getLocale()]['button']['text'] }}
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->
        <!-- counter area start  -->

        <!-- counter area end -->
        <!-- service box area  -->
        <section class="service-box-area pt-120 pb-80">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-12">
                        <div class="section-title mb-55 text-center">
                            <div class="border-c-bottom st-2">
                                @if (isset($sections['choosing_section']) &&
                                        isset($sections['choosing_section']['choosing_section']['texts']) &&
                                        isset($sections['choosing_section']['choosing_section']['texts'][app()->getLocale()]))
                                    <p>{{ $sections['choosing_section']['choosing_section']['texts'][app()->getLocale()]['subtitle'] }}</p>
                                @endif
                            </div>
                            @if (isset($sections['choosing_section']) &&
                                    isset($sections['choosing_section']['choosing_section']['texts']) &&
                                    isset($sections['choosing_section']['choosing_section']['texts'][app()->getLocale()]))
                                <h2>{{ $sections['choosing_section']['choosing_section']['texts'][app()->getLocale()]['title'] }}</h2>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp">
                    @if (isset($sections['choosing_section']) &&
                            isset($sections['choosing_section']['choosing_section']['services']) &&
                            is_array($sections['choosing_section']['choosing_section']['services']))
                        @foreach ($sections['choosing_section']['choosing_section']['services'] as $service)
                            <div class="col-lg-4 col-md-6">
                                <div class="service-box-single mb-40">
                                    <div class="service-box-content">
                                        <div class="service-box-content-icon">
                                            @if (isset($service['icon']))
                                                <i class="{{ $service['icon'] }}"></i>
                                            @endif
                                        </div>
                                        <div class="service-box-content-text">
                                            @if (isset($service['texts']) && isset($service['texts'][app()->getLocale()]))
                                                <h4><a
                                                        href="{{ $service['texts'][app()->getLocale()]['link'] }}">{{ $service['texts'][app()->getLocale()]['title'] }}</a>
                                                </h4>
                                            @endif
                                            @if (isset($service['texts']) && isset($service['texts'][app()->getLocale()]))
                                                <p>{{ $service['texts'][app()->getLocale()]['description'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-box-single mb-40">
                        <div class="service-box-content">
                            <div class="service-box-content-icon">
                                <i class="flaticon-digital-marketing"></i>
                            </div>
                            <div class="service-box-content-text">
                            </div>
        </section>
        <!-- service box end -->
        <!-- choosing area start  -->
        <div class="choosing-fl-area">
            <div class="container-fluid choosing-container-2">
                <div class="row wow fadeInUp align-items-center">
                    <div class="col-lg-6">
                        <div class="choosing-fl-img p-relative">
                            @if (isset($sections['choosing_section']) && isset($sections['choosing_section']['choosing_section']['main_image']))
                                <img src="{{ asset($sections['choosing_section']['choosing_section']['main_image']) }}"
                                    alt="{{ $sections['choosing_section']['choosing_section']['texts'][app()->getLocale()]['title'] }}">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choosing-fl-right mt-40 mb-40">
                            <div class="section-title mb-30">
                                <div class="border-left st-3">
                                    @if (isset($sections['choosing_section']) &&
                                            isset($sections['choosing_section']['choosing_section']['texts']) &&
                                            isset($sections['choosing_section']['choosing_section']['texts'][app()->getLocale()]))
                                        <p>{{ $sections['choosing_section']['choosing_section']['texts'][app()->getLocale()]['subtitle'] }}</p>
                                    @endif
                                </div>
                                @if (isset($sections['choosing_section']) &&
                                        isset($sections['choosing_section']['choosing_section']['texts']) &&
                                        isset($sections['choosing_section']['choosing_section']['texts'][app()->getLocale()]))
                                    <h2 class="white-color">
                                        {{ $sections['choosing_section']['choosing_section']['texts'][app()->getLocale()]['title'] }}</h2>
                                @endif
                            </div>
                            <div class="choosing__information st-2">
                                <ul>
                                    @if (isset($sections['choosing_section']) &&
                                            isset($sections['choosing_section']['choosing_section']['reasons']) &&
                                            is_array($sections['choosing_section']['choosing_section']['reasons']))
                                        @foreach ($sections['choosing_section']['choosing_section']['reasons'] as $index => $reason)
                                            <li>
                                                <div class="choosing__number">
                                                    <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                                </div>
                                                <div class="choosing__text">
                                                    @if (isset($reason['texts']) && isset($reason['texts'][app()->getLocale()]))
                                                        <h5>{{ $reason['texts'][app()->getLocale()]['title'] }}</h5>
                                                    @endif
                                                    @if (isset($reason['texts']) && isset($reason['texts'][app()->getLocale()]))
                                                        <p>{{ $reason['texts'][app()->getLocale()]['description'] }}</p>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- choosing area end -->
        <!-- testimonial area start  -->

        <!-- testimonial area end -->
        <!-- hire area start  -->
        <section class="hire-area" data-background="{{ asset(isset($sections['hire_section']) && isset($sections['hire_section']['hire_section']['background_image']) ? $sections['hire_section']['hire_section']['background_image'] : '') }}">
            <div class="container">
                <div class="row wow fadeInUp justify-content-center">
                    <div class="col-lg-8 col-md-11">
                        <div class="hire-content text-center">
                            <div class="section-title mb-55">
                                @if (isset($sections['hire_section']) &&
                                        isset($sections['hire_section']['hire_section']['texts']) &&
                                        isset($sections['hire_section']['hire_section']['texts'][app()->getLocale()]))
                                    <h2 class="white-color">
                                        {{ $sections['hire_section']['hire_section']['texts'][app()->getLocale()]['title'] }}</h2>
                                @endif
                            </div>
                            <div class="hire-btn">
                                @if (isset($sections['hire_section']) &&
                                        isset($sections['hire_section']['hire_section']['texts']) &&
                                        isset($sections['hire_section']['hire_section']['texts'][app()->getLocale()]))
                                    <a href="{{ $sections['hire_section']['hire_section']['texts'][app()->getLocale()]['button_link'] }}"
                                        class="grb-btn st-3">
                                        {{ $sections['hire_section']['hire_section']['texts'][app()->getLocale()]['button_text'] }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hire area end  -->
        <!-- portfolio area start  -->

        <!-- portfolio area end -->
        <!-- team area start  -->

        <!-- team area end  -->
        <!-- blog area start  -->

        <!-- blog area end -->
        <!-- brand area start  -->
        <div class="brand-area pt-70 pb-100">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-12">
                        <div class="swiper-container brand-active">
                            <div class="swiper-wrapper">
                                @if (isset($sections['brands_section']) &&
                                        isset($sections['brands_section']['brands_section']) &&
                                        isset($sections['brands_section']['brands_section']['brands']) &&
                                        is_array($sections['brands_section']['brands_section']['brands']))
                                    @foreach ($sections['brands_section']['brands_section']['brands'] as $brand)
                                        <div class="swiper-slide">
                                            <div class="single-brand">
                                                @if (isset($brand['links']) && is_array($brand['links']))
                                                    @foreach ($brand['links'] as $index => $link)
                                                        <a href="{{ $link }}">
                                                            @if (isset($brand['images']) && isset($brand['images'][$index]))
                                                                <img src="{{ asset($brand['images'][$index]['src']) }}"
                                                                    alt="{{ $brand['images'][$index]['alt'] }}">
                                                            @endif
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->
    </main>
@endsection
