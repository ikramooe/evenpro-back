@extends('admin.layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Settings</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        @if(session('success'))
            <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
                <p class="mb-0 flex-1">{{ session('success') }}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf

                    <!-- Contact Information -->
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Contact Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="contact_email">Email Address</label>
                                    <input class="form-control @error('contact_email') is-invalid @enderror" 
                                           type="email" 
                                           id="contact_email" 
                                           name="contact_email" 
                                           value="{{ old('contact_email', $settings['contact_email']) }}" 
                                           required>
                                    @error('contact_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="contact_phone">Phone Number</label>
                                    <input class="form-control @error('contact_phone') is-invalid @enderror" 
                                           type="text" 
                                           id="contact_phone" 
                                           name="contact_phone" 
                                           value="{{ old('contact_phone', $settings['contact_phone']) }}" 
                                           required>
                                    @error('contact_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="contact_address">Address</label>
                                    <textarea class="form-control @error('contact_address') is-invalid @enderror" 
                                              id="contact_address" 
                                              name="contact_address" 
                                              rows="3" 
                                              required>{{ old('contact_address', $settings['contact_address']) }}</textarea>
                                    @error('contact_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Social Media Links</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="facebook_url">
                                                <i class="fab fa-facebook text-primary me-2"></i>Facebook URL
                                            </label>
                                            <input class="form-control @error('facebook_url') is-invalid @enderror" 
                                                   type="url" 
                                                   id="facebook_url" 
                                                   name="facebook_url" 
                                                   value="{{ old('facebook_url', $settings['facebook_url']) }}">
                                            @error('facebook_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="twitter_url">
                                                <i class="fab fa-twitter text-info me-2"></i>Twitter URL
                                            </label>
                                            <input class="form-control @error('twitter_url') is-invalid @enderror" 
                                                   type="url" 
                                                   id="twitter_url" 
                                                   name="twitter_url" 
                                                   value="{{ old('twitter_url', $settings['twitter_url']) }}">
                                            @error('twitter_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="instagram_url">
                                                <i class="fab fa-instagram text-danger me-2"></i>Instagram URL
                                            </label>
                                            <input class="form-control @error('instagram_url') is-invalid @enderror" 
                                                   type="url" 
                                                   id="instagram_url" 
                                                   name="instagram_url" 
                                                   value="{{ old('instagram_url', $settings['instagram_url']) }}">
                                            @error('instagram_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="linkedin_url">
                                                <i class="fab fa-linkedin text-primary me-2"></i>LinkedIn URL
                                            </label>
                                            <input class="form-control @error('linkedin_url') is-invalid @enderror" 
                                                   type="url" 
                                                   id="linkedin_url" 
                                                   name="linkedin_url" 
                                                   value="{{ old('linkedin_url', $settings['linkedin_url']) }}">
                                            @error('linkedin_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="youtube_url">
                                                <i class="fab fa-youtube text-danger me-2"></i>YouTube URL
                                            </label>
                                            <input class="form-control @error('youtube_url') is-invalid @enderror" 
                                                   type="url" 
                                                   id="youtube_url" 
                                                   name="youtube_url" 
                                                   value="{{ old('youtube_url', $settings['youtube_url']) }}">
                                            @error('youtube_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <span class="fas fa-save me-2"></span>Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
