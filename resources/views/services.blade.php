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
                            <h1>{{__('Services')}}</h1>
                        </div>
                        <nav class="grb-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Services')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->
    <!-- service box area  -->
    <section class="service-box-area service-box-area-main pt-150 pb-80">
        <div class="container">
            <div class="row wow fadeInUp">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="service-box-single mb-40">
                        <div class="service-box-content st-1">
                            <div class="service-box-content-icon st-1">
                                <i class="flaticon-idea"></i>
                            </div>
                            <div class="service-box-content-text">
                                <h4><a href="service-details.html">{{$service->title[app()->getLocale()]}}</a></h4>
                                <p>{{$service->description[app()->getLocale()]}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
             
            </div>
        </div>
    </section>
    <!-- service box end -->
    <!-- partners area start  -->
 
    <!-- partners area end -->
    <!-- hire area start  -->
   
    <!-- hire area end  -->
    <!-- testimonial area start  -->
 
    <!-- testimonial area end -->
    <!-- newsletter area start  -->
    
    <!-- newsletter area end -->
</main>
@endsection