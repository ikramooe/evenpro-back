@extends('admin.layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(https://prium.github.io/falcon/v3.24.0/assets/img/icons/spot-illustrations/corner-4.png);"></div>
    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h3>Welcome to Dashboard</h3>
                <p class="mb-0">Here's what's happening with your website today.</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-sm-6 col-md-4">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(https://prium.github.io/falcon/v3.24.0/assets/img/icons/spot-illustrations/corner-1.png);"></div>
            <div class="card-body position-relative">
                <h6>Services</h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning">{{ \App\Models\Service::count() }}</div>
                <a class="fw-semi-bold fs--1 text-nowrap" href="{{ route('admin.services.index') }}">
                    See all services
                    <span class="fas fa-angle-right ms-1"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(https://prium.github.io/falcon/v3.24.0/assets/img/icons/spot-illustrations/corner-2.png);"></div>
            <div class="card-body position-relative">
                <h6>Events</h6>
                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info">{{ \App\Models\Event::count() }}</div>
                <a class="fw-semi-bold fs--1 text-nowrap" href="{{ route('admin.events.index') }}">
                    See all events
                    <span class="fas fa-angle-right ms-1"></span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
