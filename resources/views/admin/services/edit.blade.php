@extends('admin.layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Edit Service</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel">
                <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- English Content -->
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">English Content</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="en_title">Title (English)</label>
                                    <input class="form-control @error('en.title') is-invalid @enderror" 
                                           type="text" 
                                           id="en_title" 
                                           name="en[title]" 
                                           value="{{ old('en.title', $service->translate('en')->title) }}" 
                                           required>
                                    @error('en.title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="en_description">Description (English)</label>
                                    <textarea class="form-control @error('en.description') is-invalid @enderror" 
                                              id="en_description" 
                                              name="en[description]" 
                                              rows="4" 
                                              required>{{ old('en.description', $service->translate('en')->description) }}</textarea>
                                    @error('en.description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Arabic Content -->
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Arabic Content</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="ar_title">Title (Arabic)</label>
                                    <input class="form-control @error('ar.title') is-invalid @enderror" 
                                           type="text" 
                                           id="ar_title" 
                                           name="ar[title]" 
                                           value="{{ old('ar.title', $service->translate('ar')->title) }}" 
                                           required>
                                    @error('ar.title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="ar_description">Description (Arabic)</label>
                                    <textarea class="form-control @error('ar.description') is-invalid @enderror" 
                                              id="ar_description" 
                                              name="ar[description]" 
                                              rows="4" 
                                              required>{{ old('ar.description', $service->translate('ar')->description) }}</textarea>
                                    @error('ar.description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- General Settings -->
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Settings</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="image">Image</label>
                                    @if($service->image)
                                        <div class="mb-2">
                                            <img src="{{ asset($service->image) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                                        </div>
                                    @endif
                                    <input class="form-control @error('image') is-invalid @enderror" 
                                           type="file" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*">
                                    <small class="text-muted">Leave empty to keep the current image</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="order">Display Order</label>
                                    <input class="form-control @error('order') is-invalid @enderror" 
                                           type="number" 
                                           id="order" 
                                           name="order" 
                                           value="{{ old('order', $service->order) }}" 
                                           min="0">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="active" 
                                           name="active" 
                                           value="1" 
                                           {{ old('active', $service->active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize any JavaScript components here
    document.addEventListener('DOMContentLoaded', function() {
        // Add any necessary JavaScript initialization
    });
</script>
@endpush
