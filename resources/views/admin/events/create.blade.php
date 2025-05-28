@extends('admin.layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Add New Event</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel">
                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Language Tabs -->
                    <ul class="nav nav-tabs" id="langTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="english-tab" data-bs-toggle="tab" 
                                data-bs-target="#english" type="button" role="tab" 
                                aria-controls="english" aria-selected="true">
                                English
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="arabic-tab" data-bs-toggle="tab" 
                                data-bs-target="#arabic" type="button" role="tab" 
                                aria-controls="arabic" aria-selected="false">
                                Arabic
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content pt-4" id="langTabsContent">
                        <!-- English Tab -->
                        <div class="tab-pane fade show active" id="english" role="tabpanel" 
                            aria-labelledby="english-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="en_title">Title</label>
                                        <input class="form-control @error('en.title') is-invalid @enderror" 
                                            type="text" id="en_title" name="en[title]" 
                                            value="{{ old('en.title') }}" required>
                                        @error('en.title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="en_description">Description</label>
                                        <textarea class="form-control @error('en.description') is-invalid @enderror" 
                                            id="en_description" name="en[description]" rows="4" 
                                            required>{{ old('en.description') }}</textarea>
                                        @error('en.description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <!-- Arabic Tab -->
                        <div class="tab-pane fade" id="arabic" role="tabpanel" 
                            aria-labelledby="arabic-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="ar_title">Title</label>
                                        <input class="form-control @error('ar.title') is-invalid @enderror" 
                                            type="text" id="ar_title" name="ar[title]" 
                                            value="{{ old('ar.title') }}" required dir="rtl">
                                        @error('ar.title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="ar_description">Description</label>
                                        <textarea class="form-control @error('ar.description') is-invalid @enderror" 
                                            id="ar_description" name="ar[description]" rows="4" 
                                            required dir="rtl">{{ old('ar.description') }}</textarea>
                                        @error('ar.description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Details -->
                 
                    <div class="text-end">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Bootstrap tabs
        const triggerTabList = [].slice.call(document.querySelectorAll('#langTabs button'));
        triggerTabList.forEach(function(triggerEl) {
            const tabTrigger = new bootstrap.Tab(triggerEl);
            triggerEl.addEventListener('click', function(event) {
                event.preventDefault();
                tabTrigger.show();
            });
        });

        // Initialize datetime pickers if needed
        const datetimePickers = document.querySelectorAll('.datetimepicker');
        datetimePickers.forEach(picker => {
            // Add any necessary datetime picker initialization
        });
    });
</script>
@endsection
