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
                            <h1>About Us</h1>
                        </div>
                        <nav class="grb-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->
    <!-- about area start  -->
    <section class="about-details pt-140">
        <div class="container">
            <div class="row wow fadeInUp align-items-center">
                <div class="col-lg-6">
                    <div class="section-title mb-30">
                        <h2>{{ $sections['about_details_section'][app()->getLocale()]['title'] }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-details-right mb-30">
                        <p>{{ $sections['about_details_section'][app()->getLocale()]['subtitle'] }}</p>
                    </div>
                </div>
            </div>
            <div class="about-details-box mt-30">
                <div class="row wow fadeInUp justify-content-end">
                    <div class="col-xl-6 col-md-10">
                        <div class="about-details-box-content">
                            <h5>{{ $sections['about_details_section'][app()->getLocale()]['box']['heading'] }}</h5>
                            <div class="about__content mb-30">
                                @foreach($sections['about_details_section'][app()->getLocale()]['box']['paragraphs'] as $paragraph)
                                <p>{{ $paragraph }}</p>
                                @endforeach
                            </div>
                            <ul class="about-points st-ab">
                                @foreach($sections['about_details_section'][app()->getLocale()]['box']['points'] as $point)
                                <li>
                                    <div class="points-heading">
                                        <div class="p-icon">
                                            <i class="flaticon-team"></i>
                                        </div>
                                        <h5>{{ $point['title'] }}</h5>
                                    </div>
                                    <p>{{ $point['description'] }}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->
    <!-- skill area start  -->
  
    <!-- skill area end -->
    <!-- counter area start  -->
  
    <!-- counter area end -->
    <!-- team area start  -->
    
    <!-- team area end  -->
    <!-- brand area start  -->
  
    <!-- brand area end -->
    <!-- newsletter area start  -->
  
    <!-- newsletter area end -->
</main>
@endsection