@extends('layouts.app')
@section('content')
<main>
    <!-- page title area start  -->
    <section class="page-title-area" data-background="assets/img/bg/page-title-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content text-center">
                        <div class="page-title-heading">
                            <h1>{{__('Contact Us')}}</h1>
                        </div>
                        <nav class="grb-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Contact Us')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->
    <!-- contact area start  -->
    <div class="contact-area pt-145 pb-120">
        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-lg-4">
                    <div class="contact-address">
                        <div class="contact-heading">
                            <h4>{{__('Direct Contact Us')}}</h4>
                        </div>
                        <ul class="contact-address-list">
                            <li>
                                <div class="contact-list-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact-list-text">
                                    <span><a href="tel:{{settings('phone')}}">{{settings('phone')}}</a></span>
                                 
                                </div>
                            </li>
                            <li>
                                <div class="contact-list-icon st-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-list-text">
                                    <span><a href="#">{{settings('email')}}</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-list-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-list-text">
                                    <span><a href="#">{{ settings('address') ? settings('address')[app()->getLocale()] ?? '' : '' }}</a></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="get-in-touch">
                        <div class="contact-heading">
                            <h4>Get in Touch</h4>
                        </div>
                        <form class="contact-form" action="#">
                            <div class="row wow fadeInUp">
                                <div class="col-md-6 mb-30">
                                    <input type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6 mb-30">
                                    <input type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6 mb-30">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-md-6 mb-30">
                                    <input type="text" placeholder="Phone">
                                </div>
                                <div class="col-md-12 mb-30">
                                    <input type="text" placeholder="Subject">
                                </div>
                                <div class="col-md-12 mb-30">
                                    <textarea name="message" placeholder="Messages....."></textarea>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit"><i class="fas fa-paper-plane"></i>SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
    <!-- map area start  -->
    <div class="contact-map-area">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3041981.899057291!2d-87.62979822192196!3d41.878113633413804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2c3cd0f4cbed%3A0xafe0a6ad09c0c000!2sChicago%2C%20IL%2C%20USA!5e0!3m2!1sen!2sbd!4v1627994034288!5m2!1sen!2sbd"></iframe>
    </div>
    <!-- map area end -->
    <!-- brand area start  -->
    <div class="brand-area pt-100 pb-100">
        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-12">
                    <div class="swiper-container brand-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand1-wc.png" alt=""></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand2-wc.png" alt=""></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand3-wc.png" alt=""></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand4-wc.png" alt=""></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand5.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand5-wc.png" alt=""></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand1-wc.png" alt=""></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand2-wc.png" alt=""></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand3-wc.png" alt=""></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand4-wc.png" alt=""></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-brand">
                                    <a href="#"><img src="assets/img/brand/brand5.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/brand5-wc.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand area end -->
    <!-- newsletter area start  -->
  
    <!-- newsletter area end -->
</main>
@endsection