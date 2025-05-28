@extends('admin.layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Edit Event</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel">
                <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                                            value="{{ old('en.title', $event->translate('en')->title) }}" required>
                                        @error('en.title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="en_description">Description</label>
                                        <textarea class="form-control @error('en.description') is-invalid @enderror" 
                                            id="en_description" name="en[description]" rows="4" 
                                            required>{{ old('en.description', $event->translate('en')->description) }}</textarea>
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
                                            value="{{ old('ar.title', $event->translate('ar')->title) }}" 
                                            required dir="rtl">
                                        @error('ar.title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="ar_description">Description</label>
                                        <textarea class="form-control @error('ar.description') is-invalid @enderror" 
                                            id="ar_description" name="ar[description]" rows="4" 
                                            required dir="rtl">{{ old('ar.description', $event->translate('ar')->description) }}</textarea>
                                        @error('ar.description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Event Details</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="start_date">Start Date & Time</label>
                                            <input class="form-control datetimepicker @error('start_date') is-invalid @enderror" 
                                                   type="datetime-local" 
                                                   id="start_date" 
                                                   name="start_date" 
                                                   value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}" 
                                                   required>
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                  
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="media">Event Media (Image or Video)</label>
                                    @if($event->image)
                                        <div class="mb-2">
                                            @php
                                                $extension = pathinfo($event->image, PATHINFO_EXTENSION);
                                                $isVideo = in_array(strtolower($extension), ['mp4', 'webm', 'ogg']);
                                            @endphp

                                            @if($isVideo)
                                                <video controls class="img-thumbnail" style="max-width: 200px;">
                                                    <source src="{{ asset($event->image) }}" type="video/{{ $extension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <img src="{{ asset($event->image) }}" alt="Current Media" class="img-thumbnail" style="max-width: 200px;">
                                            @endif
                                        </div>
                                    @endif
                                    <input class="form-control @error('image') is-invalid @enderror" 
                                           type="file" 
                                           id="media" 
                                           name="image" 
                                           accept="image/*, video/mp4, video/webm, video/ogg">
                                    <small class="text-muted">Leave empty to keep the current media. Supported formats: Images (JPG, PNG, GIF) and Videos (MP4, WebM, OGG)</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                             

                               
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Event</button>
                    </div>
                </form>

                <!-- Event Pages Section -->
                <div class="mt-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Event Pages</h6>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @php
                                    $pageTypes = ['welcome', 'media', 'exhibitors'];
                                @endphp

                                @foreach($pageTypes as $type)
                                    @php
                                        $page = $event->pages()->where('type', $type)->first();
                                        $status = $page ? ($page->active ? 'Active' : 'Inactive') : 'Not Created';
                                        $statusClass = $page ? ($page->active ? 'text-success' : 'text-warning') : 'text-muted';
                                    @endphp
                                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">{{ ucfirst($type) }} Page</h6>
                                            <small class="{{ $statusClass }}">{{ $status }}</small>
                                        </div>
                                        <a href="{{ route('admin.events.pages.edit', ['event' => $event->id, 'type' => $type]) }}" 
                                           class="btn btn-falcon-primary btn-sm">
                                            {{ $page ? 'Edit' : 'Create' }} Page
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Event Forms Section -->
                    <div class="mt-4">
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Event Forms</h6>
                                <a href="{{ route('admin.events.forms.create', $event) }}" class="btn btn-falcon-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i> Add Form
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    @forelse($event->forms as $form)
                                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1">{{ $form->content['title'][app()->getLocale()] }}</h6>
                                                <small class="{{ $form->active ? 'text-success' : 'text-warning' }}">
                                                    {{ $form->type === 'registration_client' ? 'Client Registration' : 'Exhibitor Registration' }} - 
                                                    {{ $form->active ? 'Active' : 'Inactive' }}
                                                </small>
                                            </div>
                                            <div>
                                                <a href="{{ route('events.forms.show', ['event' => $event, 'type' => $form->type]) }}" 
                                                   class="btn btn-falcon-info btn-sm me-2" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.events.forms.edit', ['event' => $event, 'form' => $form]) }}" 
                                                   class="btn btn-falcon-primary btn-sm me-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.events.forms.registrations', ['event' => $event, 'form' => $form]) }}" 
                                                   class="btn btn-falcon-success btn-sm">
                                                    <i class="fas fa-users"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center py-4">
                                            <p class="mb-0 text-muted">No forms created yet</p>
                                            <a href="{{ route('admin.events.forms.create', $event) }}" class="btn btn-falcon-primary btn-sm mt-2">
                                                Create your first form
                                            </a>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
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
@endpush
