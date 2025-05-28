@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">{{ __('Edit Media Page') }}</h5>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-falcon-default btn-sm">
                        <i class="fas fa-arrow-left"></i> {{ __('Back to Event') }}
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card-body bg-light">
            <form action="{{ route('admin.events.pages.update', ['event' => $event, 'page' => $page]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Language Tabs -->
                <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="english-tab" data-bs-toggle="tab" href="#english" role="tab">
                            {{ __('English') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="arabic-tab" data-bs-toggle="tab" href="#arabic" role="tab">
                            {{ __('Arabic') }}
                        </a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-3" id="languageTabsContent">
                    <!-- English Content -->
                    <div class="tab-pane fade show active" id="english" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Description (English)') }}</label>
                            <textarea name="content[description][en]" class="form-control tinymce @error('content.description.en') is-invalid @enderror">
                                {{ old('content.description.en', $page->content['description']['en'] ?? '') }}
                            </textarea>
                            @error('content.description.en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Arabic Content -->
                    <div class="tab-pane fade" id="arabic" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Description (Arabic)') }}</label>
                            <textarea name="content[description][ar]" class="form-control tinymce @error('content.description.ar') is-invalid @enderror" dir="rtl">
                                {{ old('content.description.ar', $page->content['description']['ar'] ?? '') }}
                            </textarea>
                            @error('content.description.ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Gallery Section -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="mb-0">{{ __('Gallery') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="dropzone mb-3" id="galleryDropzone"></div>
                        <div id="galleryPreview" class="row g-3 mt-2">
                            @if(isset($page->content['gallery']))
                                @foreach($page->content['gallery'] as $image)
                                    <div class="col-md-3">
                                        <div class="position-relative">
                                            <img src="{{ asset($image) }}" class="img-fluid rounded" alt="Gallery Image">
                                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 remove-image" data-image="{{ $image }}">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <input type="hidden" name="content[gallery][]" value="{{ $image }}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Documents Section -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="mb-0">{{ __('Documents') }}</h6>
                    </div>
                    <div class="card-body">
                        <div id="documentsList">
                            @if(isset($page->content['documents']))
                                @foreach($page->content['documents'] as $index => $document)
                                    <div class="document-item mb-3">
                                        <div class="row g-2">
                                            <div class="col-md-5">
                                                <label class="form-label">{{ __('Title (English)') }}</label>
                                                <input type="text" name="content[documents][{{ $index }}][title][en]" class="form-control" value="{{ $document['title']['en'] }}">
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label">{{ __('Title (Arabic)') }}</label>
                                                <input type="text" name="content[documents][{{ $index }}][title][ar]" class="form-control" value="{{ $document['title']['ar'] }}" dir="rtl">
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger btn-sm remove-document">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <input type="file" name="content[documents][{{ $index }}][file]" class="form-control" accept=".pdf,.doc,.docx">
                                                @if(isset($document['file']))
                                                    <small class="text-muted">
                                                        {{ __('Current file:') }} <a href="{{ asset($document['file']) }}" target="_blank">{{ basename($document['file']) }}</a>
                                                        <input type="hidden" name="content[documents][{{ $index }}][file]" value="{{ $document['file'] }}">
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-falcon-default btn-sm mt-2" id="addDocument">
                            <i class="fas fa-plus me-1"></i> {{ __('Add Document') }}
                        </button>
                    </div>
                </div>

                <!-- Videos Section -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="mb-0">{{ __('Videos') }}</h6>
                    </div>
                    <div class="card-body">
                        <div id="videosList">
                            @if(isset($page->content['videos']))
                                @foreach($page->content['videos'] as $index => $video)
                                    <div class="video-item mb-3">
                                        <div class="row g-2">
                                            <div class="col-md-10">
                                                <input type="url" name="content[videos][]" class="form-control" value="{{ $video }}" placeholder="{{ __('YouTube or Vimeo URL') }}">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger btn-sm remove-video">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-falcon-default btn-sm mt-2" id="addVideo">
                            <i class="fas fa-plus me-1"></i> {{ __('Add Video') }}
                        </button>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save Changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: '.tinymce',
        height: 300,
        // ... your TinyMCE configuration
    });

    // Initialize Dropzone
    Dropzone.autoDiscover = false;
    new Dropzone("#galleryDropzone", {
        url: "{{ route('admin.events.pages.upload', ['event' => $event, 'page' => $page]) }}",
        paramName: "file",
        maxFilesize: 5,
        acceptedFiles: "image/*",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        success: function(file, response) {
            const preview = document.getElementById('galleryPreview');
            const div = document.createElement('div');
            div.className = 'col-md-3';
            div.innerHTML = `
                <div class="position-relative">
                    <img src="${response.url}" class="img-fluid rounded" alt="Gallery Image">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 remove-image" data-image="${response.path}">
                        <i class="fas fa-times"></i>
                    </button>
                    <input type="hidden" name="content[gallery][]" value="${response.path}">
                </div>
            `;
            preview.appendChild(div);
        }
    });

    // Handle remove image
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-image')) {
            if (confirm('{{ __('Are you sure you want to remove this image?') }}')) {
                e.target.closest('.col-md-3').remove();
            }
        }
    });

    // Handle add/remove documents
    document.getElementById('addDocument').addEventListener('click', function() {
        const index = document.querySelectorAll('.document-item').length;
        const template = `
            <div class="document-item mb-3">
                <div class="row g-2">
                    <div class="col-md-5">
                        <label class="form-label">{{ __('Title (English)') }}</label>
                        <input type="text" name="content[documents][${index}][title][en]" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">{{ __('Title (Arabic)') }}</label>
                        <input type="text" name="content[documents][${index}][title][ar]" class="form-control" dir="rtl">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-document">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="col-12 mt-2">
                        <input type="file" name="content[documents][${index}][file]" class="form-control" accept=".pdf,.doc,.docx">
                    </div>
                </div>
            </div>
        `;
        document.getElementById('documentsList').insertAdjacentHTML('beforeend', template);
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-document')) {
            if (confirm('{{ __('Are you sure you want to remove this document?') }}')) {
                e.target.closest('.document-item').remove();
            }
        }
    });

    // Handle add/remove videos
    document.getElementById('addVideo').addEventListener('click', function() {
        const template = `
            <div class="video-item mb-3">
                <div class="row g-2">
                    <div class="col-md-10">
                        <input type="url" name="content[videos][]" class="form-control" placeholder="{{ __('YouTube or Vimeo URL') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm remove-video">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('videosList').insertAdjacentHTML('beforeend', template);
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-video')) {
            if (confirm('{{ __('Are you sure you want to remove this video?') }}')) {
                e.target.closest('.video-item').remove();
            }
        }
    });
</script>
@endpush
