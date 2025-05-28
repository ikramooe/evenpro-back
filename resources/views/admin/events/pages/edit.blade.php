@extends('admin.layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Edit {{ ucfirst($page->type) }} Page for {{ $event->translate('en')->title }}</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel">
                <form action="{{ route('admin.events.pages.update', ['event' => $event->id, 'type' => $page->type]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Page Content</h6>
                            </div>
                            <div class="card-body">
                                @if($page->type == 'welcome')
                                    <!-- Hero Section -->
                                    <div class="card mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">Hero Section</h6>
                                        </div>
                                        <div class="card-body">
                                           

                                            <!-- Language Tabs -->
                                            <ul class="nav nav-tabs" id="heroLangTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="hero-english-tab" data-bs-toggle="tab" 
                                                        data-bs-target="#hero-english" type="button" role="tab" 
                                                        aria-controls="hero-english" aria-selected="true">
                                                        English
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="hero-arabic-tab" data-bs-toggle="tab" 
                                                        data-bs-target="#hero-arabic" type="button" role="tab" 
                                                        aria-controls="hero-arabic" aria-selected="false">
                                                        Arabic
                                                    </button>
                                                </li>
                                            </ul>

                                            <!-- Tab Content -->
                                            <div class="tab-content pt-4" id="heroLangTabsContent">
                                                <!-- English Tab -->
                                                <div class="tab-pane fade show active" id="hero-english" role="tabpanel" 
                                                    aria-labelledby="hero-english-tab">
                                                    <div class="mb-3">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" class="form-control" name="content[hero][title][en]" 
                                                            value="{{ data_get($page->content, 'hero.title.en', '') }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Text</label>
                                                        <textarea class="tinymce" name="content[hero][text][en]" 
                                                            rows="3">{{ data_get($page->content, 'hero.text.en', '') }}</textarea>
                                                    </div>
                                                </div>

                                                <!-- Arabic Tab -->
                                                <div class="tab-pane fade" id="hero-arabic" role="tabpanel" 
                                                    aria-labelledby="hero-arabic-tab">
                                                    <div class="mb-3">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" class="form-control" name="content[hero][title][ar]" 
                                                            value="{{ data_get($page->content, 'hero.title.ar', '') }}" dir="rtl">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Text</label>
                                                        <textarea class="tinymce" name="content[hero][text][ar]" 
                                                            rows="3" dir="rtl">{{ data_get($page->content, 'hero.text.ar', '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- About Section -->
                                    <div class="card mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">About Section</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Language Tabs -->
                                            <ul class="nav nav-tabs" id="aboutLangTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="about-english-tab" data-bs-toggle="tab" 
                                                        data-bs-target="#about-english" type="button" role="tab" 
                                                        aria-controls="about-english" aria-selected="true">
                                                        English
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="about-arabic-tab" data-bs-toggle="tab" 
                                                        data-bs-target="#about-arabic" type="button" role="tab" 
                                                        aria-controls="about-arabic" aria-selected="false">
                                                        Arabic
                                                    </button>
                                                </li>
                                            </ul>

                                            <!-- Tab Content -->
                                            <div class="tab-content pt-4" id="aboutLangTabsContent">
                                                <!-- English Tab -->
                                                <div class="tab-pane fade show active" id="about-english" role="tabpanel" 
                                                    aria-labelledby="about-english-tab">
                                                    <div class="mb-3">
                                                        <label class="form-label">Section Title</label>
                                                        <input type="text" class="form-control" name="content[about][title][en]" 
                                                            value="{{ data_get($page->content, 'about.title.en', '') }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Section Description</label>
                                                        <textarea class="tinymce" name="content[about][description][en]" 
                                                            rows="3">{{ data_get($page->content, 'about.description.en', '') }}</textarea>
                                                    </div>
                                                </div>

                                                <!-- Arabic Tab -->
                                                <div class="tab-pane fade" id="about-arabic" role="tabpanel" 
                                                    aria-labelledby="about-arabic-tab">
                                                    <div class="mb-3">
                                                        <label class="form-label">Section Title</label>
                                                        <input type="text" class="form-control" name="content[about][title][ar]" 
                                                            value="{{ data_get($page->content, 'about.title.ar', '') }}" dir="rtl">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Section Description</label>
                                                        <textarea class="tinymce" name="content[about][description][ar]" 
                                                            rows="3" dir="rtl">{{ data_get($page->content, 'about.description.ar', '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <h6 class="mb-3">Feature Cards</h6>
                                                @for($i = 0; $i < 3; $i++)
                                                    <div class="card mb-3">
                                                        <div class="card-body">
                                                            <h6 class="mb-3">Card {{ $i + 1 }}</h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Card Title (English)</label>
                                                                        <input type="text" class="form-control" name="content[about][cards][{{ $i }}][title][en]" value="{{ $page->content['about']['cards'][$i]['title']['en'] ?? '' }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Card Description (English)</label>
                                                                        <textarea class="form-control" name="content[about][cards][{{ $i }}][description][en]" rows="3">{{ $page->content['about']['cards'][$i]['description']['en'] ?? '' }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Card Title (Arabic)</label>
                                                                        <input type="text" class="form-control" name="content[about][cards][{{ $i }}][title][ar]" value="{{ $page->content['about']['cards'][$i]['title']['ar'] ?? '' }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Card Description (Arabic)</label>
                                                                        <textarea class="form-control" name="content[about][cards][{{ $i }}][description][ar]" rows="3">{{ $page->content['about']['cards'][$i]['description']['ar'] ?? '' }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Agenda Section -->
                                    <div class="card mb-4">
                                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0">Agenda Section</h6>
                                            <button type="button" class="btn btn-falcon-primary btn-sm" id="add-agenda-item">
                                                <i class="fas fa-plus me-1"></i> Add Agenda Item
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <!-- Language Tabs -->
                                            <ul class="nav nav-tabs" id="agendaLangTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="agenda-english-tab" data-bs-toggle="tab" 
                                                        data-bs-target="#agenda-english" type="button" role="tab" 
                                                        aria-controls="agenda-english" aria-selected="true">
                                                        English
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="agenda-arabic-tab" data-bs-toggle="tab" 
                                                        data-bs-target="#agenda-arabic" type="button" role="tab" 
                                                        aria-controls="agenda-arabic" aria-selected="false">
                                                        Arabic
                                                    </button>
                                                </li>
                                            </ul>

                                            <div class="tab-content pt-4" id="agendaLangTabsContent">
                                                <!-- English Tab -->
                                                <div class="tab-pane fade show active" id="agenda-english" role="tabpanel" 
                                                    aria-labelledby="agenda-english-tab">
                                                    <div class="mb-3">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" class="form-control" name="content[agenda][title][en]" 
                                                            value="{{ data_get($page->content, 'agenda.title.en', '') }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Description</label>
                                                        <textarea class="form-control tinymce" name="content[agenda][description][en]" 
                                                            rows="3">{{ data_get($page->content, 'agenda.description.en', '') }}</textarea>
                                                    </div>
                                                </div>

                                                <!-- Arabic Tab -->
                                                <div class="tab-pane fade" id="agenda-arabic" role="tabpanel" 
                                                    aria-labelledby="agenda-arabic-tab">
                                                    <div class="mb-3">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" class="form-control" name="content[agenda][title][ar]" 
                                                            value="{{ data_get($page->content, 'agenda.title.ar', '') }}" dir="rtl">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Description</label>
                                                        <textarea class="form-control tinymce" name="content[agenda][description][ar]" 
                                                            rows="3" dir="rtl">{{ data_get($page->content, 'agenda.description.ar', '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="agenda-items">
                                               

                                                @if(!empty($page->content['agenda']['items']) && is_array($page->content['agenda']['items']))
                                                    @foreach($page->content['agenda']['items'] as $index => $item)
                                                        <div class="card mb-3 agenda-item" data-index="{{ $index }}">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                                    <h6 class="mb-0">Agenda Item {{ $index + 1 }}</h6>
                                                                    <button type="button" class="btn btn-falcon-danger btn-sm remove-agenda-item">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Title (English)</label>
                                                                            <input type="text" class="form-control" name="content[agenda][items][{{ $index }}][title][en]" value="{{ data_get($item, 'title.en', '') }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Content (English)</label>
                                                                            <textarea class="tinymce-agenda" name="content[agenda][items][{{ $index }}][content][en]">{!! data_get($item, 'content.en', '') !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Title (Arabic)</label>
                                                                            <input type="text" class="form-control" name="content[agenda][items][{{ $index }}][title][ar]" value="{{ data_get($item, 'title.ar', '') }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Content (Arabic)</label>
                                                                            <textarea class="tinymce-agenda" name="content[agenda][items][{{ $index }}][content][ar]">{!! data_get($item, 'content.ar', '') !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Services Section -->
                                    <div class="card mb-4">
                                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0">Services Section</h6>
                                            <button type="button" class="btn btn-falcon-primary btn-sm" id="add-service-card">
                                                <i class="fas fa-plus me-1"></i> Add Service Card
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div id="service-cards">
                                                @if(!empty($page->content['services']['cards']) && is_array($page->content['services']['cards']))
                                                    @foreach($page->content['services']['cards'] as $index => $card)
                                                        <div class="card mb-3 service-card" data-index="{{ $index }}">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                                    <h6 class="mb-0">Service Card {{ $index + 1 }}</h6>
                                                                    <button type="button" class="btn btn-falcon-danger btn-sm remove-service-card">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 mb-3">
                                                                        <label class="form-label">Card Image</label>
                                                                        <input type="file" class="form-control" name="content[services][cards][{{ $index }}][image]" accept="image/*">
                                                                        @if(!empty($card['image']))
                                                                            <div class="mt-2">
                                                                                <img src="{{ asset($card['image']) }}" alt="Service Image" class="img-thumbnail" style="max-height: 100px">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Title (English)</label>
                                                                            <input type="text" class="form-control" name="content[services][cards][{{ $index }}][title][en]" value="{{ data_get($card, 'title.en', '') }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Description (English)</label>
                                                                            <textarea class="form-control" name="content[services][cards][{{ $index }}][description][en]" rows="3">{{ data_get($card, 'description.en', '') }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Title (Arabic)</label>
                                                                            <input type="text" class="form-control" name="content[services][cards][{{ $index }}][title][ar]" value="{{ data_get($card, 'title.ar', '') }}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Description (Arabic)</label>
                                                                            <textarea class="form-control" name="content[services][cards][{{ $index }}][description][ar]" rows="3">{{ data_get($card, 'description.ar', '') }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sponsors Section -->
                                    <div class="card mb-4">
                                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0">Sponsors Section</h6>
                                            <button type="button" class="btn btn-falcon-primary btn-sm" id="add-sponsor">
                                                <i class="fas fa-plus me-1"></i> Add Sponsor
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div id="sponsors-container" class="row g-3">
                                                @if(!empty($page->content['sponsors']) && is_array($page->content['sponsors']))
                                                    @foreach($page->content['sponsors'] as $index => $sponsor)
                                                        <div class="col-md-3 sponsor-item" data-index="{{ $index }}">
                                                            <div class="card h-100">
                                                                <div class="card-body">
                                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                                        <h6 class="mb-0">Sponsor {{ $index + 1 }}</h6>
                                                                        <button type="button" class="btn btn-falcon-danger btn-sm remove-sponsor">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label class="form-label">Logo</label>
                                                                        <input type="file" 
                                                                               class="form-control sponsor-logo" 
                                                                               name="content[sponsors][{{ $index }}][logo]" 
                                                                               accept="image/*">
                                                                    </div>
                                                                    @if(!empty($sponsor['logo']))
                                                                        <div class="text-center preview-container mt-2">
                                                                            <img src="{{ asset($sponsor['logo']) }}" 
                                                                                 alt="Sponsor Logo" 
                                                                                 class="img-thumbnail sponsor-preview" 
                                                                                 style="max-height: 100px">
                                                                        </div>
                                                                    @endif
                                                                    <div class="mb-2">
                                                                        <label class="form-label">Name</label>
                                                                        <input type="text" 
                                                                               class="form-control" 
                                                                               name="content[sponsors][{{ $index }}][name]" 
                                                                               value="{{ data_get($sponsor, 'name', '') }}" 
                                                                               placeholder="Sponsor name">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label class="form-label">Website URL</label>
                                                                        <input type="url" 
                                                                               class="form-control" 
                                                                               name="content[sponsors][{{ $index }}][url]" 
                                                                               value="{{ data_get($sponsor, 'url', '') }}" 
                                                                               placeholder="https://">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                @elseif($page->type == 'media')
                                    <!-- Media Page Content -->
                                    <div class="mb-3">
                                        <!-- Images Section -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h6 class="mb-0">Images pGallery</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Images</label>
                                                    <input type="file" name="content[media_images][]" class="form-control" multiple accept="image/*">
                                                </div>

                                                <!-- Existing Images -->
                                                <div class="row" id="images-container">
                                                    @if(!empty($page->content) && !empty($page->content['images']))
                                                        @foreach($page->content['images'] as $index => $image)
                                                            <div class="col-md-3 mb-3" id="image-{{ $index }}">
                                                                <div class="card">
                                                                    <img src="{{ asset($image['url']) }}" class="card-img-top" alt="Gallery Image">
                                                                    <div class="card-body p-2">
                                                                        <div class="form-group mb-2">
                                                                            <input type="text" name="existing_images[{{ $index }}][caption]" 
                                                                                class="form-control form-control-sm" 
                                                                                placeholder="Image Caption"
                                                                                value="{{ $image['caption'] ?? '' }}">
                                                                            <input type="hidden" name="existing_images[{{ $index }}][url]" value="{{ $image['url'] }}">
                                                                        </div>
                                                                        <button type="button" class="btn btn-danger btn-sm w-100" 
                                                                            onclick="removeImage('image-{{ $index }}')">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Videos Section -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">YouTube Videos</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="videos-container">
                                                    @if(!empty($page->content) && !empty($page->content['videos']))
                                                        @foreach($page->content['videos'] as $index => $video)
                                                            <div class="row mb-3 video-item" id="video-{{ $index }}">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">YouTube URL</label>
                                                                        <input type="url" name="content[existing_videos][{{ $index }}][url]" 
                                                                            class="form-control" value="{{ $video['url'] }}" 
                                                                            placeholder="https://www.youtube.com/watch?v=...">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Video Caption</label>
                                                                        <input type="text" name="content[existing_videos][{{ $index }}][caption]" 
                                                                            class="form-control" value="{{ $video['caption'] ?? '' }}" 
                                                                            placeholder="Video Caption">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 d-flex align-items-end">
                                                                    <button type="button" class="btn btn-danger mb-3" 
                                                                        onclick="removeVideo('video-{{ $index }}')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                
                                                <button type="button" class="btn btn-primary" onclick="addVideoField()">
                                                    <i class="fas fa-plus"></i> Add Video
                                                </button>
                                            </div>
                                        </div>

                                        <script>
                                            function removeImage(imageId) {
                                                document.getElementById(imageId).remove();
                                            }

                                            function removeVideo(videoId) {
                                                document.getElementById(videoId).remove();
                                            }

                                            function addVideoField() {
                                                const container = document.querySelector('.videos-container');
                                                const index = container.children.length;
                                                const template = `
                                                    <div class="row mb-3 video-item" id="video-new-${index}">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">YouTube URL</label>
                                                                <input type="url" name="content[new_videos][${index}][url]" 
                                                                    class="form-control" 
                                                                    placeholder="https://www.youtube.com/watch?v=...">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Video Caption</label>
                                                                <input type="text" name="content[new_videos][${index}][caption]" 
                                                                    class="form-control" 
                                                                    placeholder="Video Caption">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 d-flex align-items-end">
                                                            <button type="button" class="btn btn-danger mb-3" 
                                                                onclick="removeVideo('video-new-${index}')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                `;
                                                container.insertAdjacentHTML('beforeend', template);
                                            }
                                        </script>
                                        <label class="form-label">Media Images</label>
                                      
                                        @if(isset($page->content['media_images']))
                                            <div class="row mt-3">
                                                @foreach($page->content['media_images'] as $image)
                                                    <div class="col-md-3 mb-3">
                                                        <img src="{{ asset($image['image']) }}" alt="Gallery" class="img-thumbnail">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                

                                @elseif($page->type == 'exhibitors')
                                    <!-- Exhibitors Page Content -->
                                    <div id="exhibitors-list">
                                        @if(isset($page->content['exhibitors']))
                                            @foreach($page->content['exhibitors'] as $index => $exhibitor)
                                                <div class="card mb-3 exhibitor-item">
                                                    <div class="card-body">
                                                        <!-- Image Upload -->
                                                        <div class="mb-3">
                                                            <label class="form-label">Exhibitor Image</label>
                                                            <input type="file" class="form-control mb-2" name="content[exhibitors][{{ $index }}][image]" accept="image/*">
                                                            @if(isset($exhibitor['image']))
                                                                <div class="mb-2">
                                                                    <img src="{{ asset($exhibitor['image']) }}" alt="Exhibitor Image" class="img-thumbnail" style="max-height: 100px">
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <!-- Language Tabs -->
                                                        <ul class="nav nav-tabs" id="exhibitorLangTabs{{ $index }}" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="exhibitor-english-tab{{ $index }}" 
                                                                    data-bs-toggle="tab" data-bs-target="#exhibitor-english{{ $index }}" 
                                                                    type="button" role="tab" aria-controls="exhibitor-english{{ $index }}" 
                                                                    aria-selected="true">English</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="exhibitor-arabic-tab{{ $index }}" 
                                                                    data-bs-toggle="tab" data-bs-target="#exhibitor-arabic{{ $index }}" 
                                                                    type="button" role="tab" aria-controls="exhibitor-arabic{{ $index }}" 
                                                                    aria-selected="false">Arabic</button>
                                                            </li>
                                                        </ul>

                                                        <!-- Tab Content -->
                                                        <div class="tab-content pt-4" id="exhibitorLangTabsContent{{ $index }}">
                                                            <!-- English Tab -->
                                                            <div class="tab-pane fade show active" id="exhibitor-english{{ $index }}" 
                                                                role="tabpanel" aria-labelledby="exhibitor-english-tab{{ $index }}">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Company Name</label>
                                                                    <input type="text" class="form-control" 
                                                                        name="content[exhibitors][{{ $index }}][name][en]" 
                                                                        value="{{ $exhibitor['name']['en'] ?? '' }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Category</label>
                                                                    <input type="text" class="form-control" 
                                                                        name="content[exhibitors][{{ $index }}][category][en]" 
                                                                        value="{{ $exhibitor['category']['en'] ?? '' }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea class="form-control" 
                                                                        name="content[exhibitors][{{ $index }}][description][en]" 
                                                                        rows="3">{{ $exhibitor['description']['en'] ?? '' }}</textarea>
                                                                </div>
                                                            </div>

                                                            <!-- Arabic Tab -->
                                                            <div class="tab-pane fade" id="exhibitor-arabic{{ $index }}" 
                                                                role="tabpanel" aria-labelledby="exhibitor-arabic-tab{{ $index }}">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Company Name</label>
                                                                    <input type="text" class="form-control" 
                                                                        name="content[exhibitors][{{ $index }}][name][ar]" 
                                                                        value="{{ $exhibitor['name']['ar'] ?? '' }}" dir="rtl">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Category</label>
                                                                    <input type="text" class="form-control" 
                                                                        name="content[exhibitors][{{ $index }}][category][ar]" 
                                                                        value="{{ $exhibitor['category']['ar'] ?? '' }}" dir="rtl">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea class="form-control" 
                                                                        name="content[exhibitors][{{ $index }}][description][ar]" 
                                                                        rows="3" dir="rtl">{{ $exhibitor['description']['ar'] ?? '' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="button" class="btn btn-danger btn-sm remove-exhibitor">Remove Exhibitor</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-exhibitor">Add Exhibitor</button>
                                @endif

                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" id="active" name="active" value="1" {{ $page->active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-secondary me-2">Back to Event</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Bootstrap tabs
        const tabElements = ['hero', 'about'];
        tabElements.forEach(element => {
            const triggerTabList = [].slice.call(document.querySelectorAll(`#${element}LangTabs button`));
            triggerTabList.forEach(function(triggerEl) {
                const tabTrigger = new bootstrap.Tab(triggerEl);
                triggerEl.addEventListener('click', function(event) {
                    event.preventDefault();
                    tabTrigger.show();
                });
            });
        });
        // Initialize TinyMCE for regular content
        tinymce.init({
            selector: '.tinymce',
            height: 300,
            menubar: false,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

      

        // Remove agenda item
        $(document).on('click', '.remove-item', function() {
            $(this).closest('.agenda-item').remove();
            // Reindex remaining items
            $('#agenda-items .agenda-item').each(function(index) {
                $(this).find('[name^="content[agenda][items]"]').each(function() {
                    this.name = this.name.replace(/\[\d+\]/, `[${index}]`);
                });
            });
        });

        // Function to initialize TinyMCE for agenda items
        function initAgendaTinyMCE(selector) {
            tinymce.init({
                selector: selector,
                height: 200,
                menubar: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
        }

        // Initialize TinyMCE for existing agenda items
        initAgendaTinyMCE('.tinymce-agenda');

        // Handle adding new agenda items
        const agendaItems = document.getElementById('agenda-items');
        const addAgendaItemBtn = document.getElementById('add-agenda-item');

        if (addAgendaItemBtn) {
            alert('icia');
            addAgendaItemBtn.addEventListener('click', function() {
                // Remove all existing TinyMCE instances for agenda items
                alert('ici');
                tinymce.remove('.tinymce-agenda');

                const index = document.querySelectorAll('.agenda-item').length;
                const newItem = document.createElement('div');
                newItem.className = 'card mb-3 agenda-item';
                newItem.dataset.index = index;
                newItem.innerHTML = `
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0">Agenda Item ${index + 1}</h6>
                            <button type="button" class="btn btn-falcon-danger btn-sm remove-agenda-item">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" 
                                           name="content[agenda][items][${index}][title][en]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Content (English)</label>
                                    <textarea class="tinymce-agenda" 
                                              name="content[agenda][items][${index}][content][en]"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title (Arabic)</label>
                                    <input type="text" class="form-control" 
                                           name="content[agenda][items][${index}][title][ar]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Content (Arabic)</label>
                                    <textarea class="tinymce-agenda" 
                                              name="content[agenda][items][${index}][content][ar]"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                agendaItems.appendChild(newItem);

                // Reinitialize TinyMCE for all agenda items
                initAgendaTinyMCE('.tinymce-agenda');
            });
        }

        // Handle removing agenda items
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-agenda-item')) {
                // Remove all existing TinyMCE instances for agenda items
                tinymce.remove('.tinymce-agenda');

                const item = e.target.closest('.agenda-item');
                item.remove();

                // Update indices for remaining items
                const items = document.querySelectorAll('.agenda-item');
                items.forEach((item, index) => {
                    item.dataset.index = index;
                    item.querySelector('h6').textContent = `Agenda Item ${index + 1}`;
                    
                    // Update input names
                    item.querySelectorAll('input, textarea').forEach(input => {
                        input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
                    });
                });

                // Reinitialize TinyMCE for remaining items
                initAgendaTinyMCE('.tinymce-agenda');
            }
        });

        // Handle service cards
        const serviceCards = document.getElementById('service-cards');
        const addServiceCardBtn = document.getElementById('add-service-card');

        if (addServiceCardBtn) {
            addServiceCardBtn.addEventListener('click', function() {
                const index = document.querySelectorAll('.service-card').length;
                const newCard = document.createElement('div');
                newCard.className = 'card mb-3 service-card';
                newCard.dataset.index = index;
                newCard.innerHTML = `
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0">Service Card ${index + 1}</h6>
                            <button type="button" class="btn btn-falcon-danger btn-sm remove-service-card">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Card Image</label>
                                <input type="file" class="form-control" 
                                       name="content[services][cards][${index}][image]" 
                                       accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title (English)</label>
                                    <input type="text" class="form-control" 
                                           name="content[services][cards][${index}][title][en]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description (English)</label>
                                    <textarea class="form-control" 
                                              name="content[services][cards][${index}][description][en]" 
                                              rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title (Arabic)</label>
                                    <input type="text" class="form-control" 
                                           name="content[services][cards][${index}][title][ar]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description (Arabic)</label>
                                    <textarea class="form-control" 
                                              name="content[services][cards][${index}][description][ar]" 
                                              rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                serviceCards.appendChild(newCard);
            });
        }

        // Handle removing service cards
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-service-card')) {
                const card = e.target.closest('.service-card');
                card.remove();

                // Update indices for remaining cards
                const cards = document.querySelectorAll('.service-card');
                cards.forEach((card, index) => {
                    card.dataset.index = index;
                    card.querySelector('h6').textContent = `Service Card ${index + 1}`;
                    
                    // Update input names
                    card.querySelectorAll('input, textarea').forEach(input => {
                        input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
                    });
                });
            }
        });

        // Handle sponsors
        const sponsorsContainer = document.getElementById('sponsors-container');
        const addSponsorBtn = document.getElementById('add-sponsor');

        if (addSponsorBtn) {
            addSponsorBtn.addEventListener('click', function() {
                const index = document.querySelectorAll('.sponsor-item').length;
                const newSponsor = document.createElement('div');
                newSponsor.className = 'col-md-3 sponsor-item';
                newSponsor.dataset.index = index;
                newSponsor.innerHTML = `
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0">Sponsor ${index + 1}</h6>
                                <button type="button" class="btn btn-falcon-danger btn-sm remove-sponsor">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Logo</label>
                                <input type="file" 
                                       class="form-control sponsor-logo" 
                                       name="content[sponsors][${index}][logo]" 
                                       accept="image/*">
                            </div>
                            <div class="text-center preview-container mt-2" style="display: none;"></div>
                            <div class="mb-2">
                                <label class="form-label">Name</label>
                                <input type="text" 
                                       class="form-control" 
                                       name="content[sponsors][${index}][name]" 
                                       placeholder="Sponsor name">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Website URL</label>
                                <input type="text" 
                                       class="form-control" 
                                       name="content[sponsors][${index}][url]" 
                                       placeholder="https://">
                            </div>
                        </div>
                    </div>
                `;
                sponsorsContainer.appendChild(newSponsor);

                // Add image preview functionality to the new sponsor
                const logoInput = newSponsor.querySelector('.sponsor-logo');
                initializeImagePreview(logoInput);
            });
        }

        // Handle removing sponsors
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-sponsor')) {
                const sponsor = e.target.closest('.sponsor-item');
                sponsor.remove();

                // Update indices for remaining sponsors
                const sponsors = document.querySelectorAll('.sponsor-item');
                sponsors.forEach((sponsor, index) => {
                    sponsor.dataset.index = index;
                    sponsor.querySelector('h6').textContent = `Sponsor ${index + 1}`;
                    
                    // Update input names
                    sponsor.querySelectorAll('input').forEach(input => {
                        input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
                    });
                });
            }
        });

        // Initialize image preview functionality
        function initializeImagePreview(input) {
            input.addEventListener('change', function() {
                const previewContainer = this.closest('.card-body').querySelector('.preview-container');
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewContainer.innerHTML = `
                            <img src="${e.target.result}" 
                                 alt="Sponsor Logo Preview" 
                                 class="img-thumbnail sponsor-preview" 
                                 style="max-height: 100px">
                        `;
                        previewContainer.style.display = 'block';
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                } else {
                    previewContainer.innerHTML = '';
                    previewContainer.style.display = 'none';
                }
            });
        }

        // Initialize image preview for existing sponsor logos
        document.querySelectorAll('.sponsor-logo').forEach(input => {
            initializeImagePreview(input);
        });

        // Registration form fields
        const formFields = document.getElementById('form-fields');
        const addFieldBtn = document.getElementById('add-field');
        if (addFieldBtn) {
            addFieldBtn.addEventListener('click', function() {
                const row = document.createElement('div');
                row.className = 'row mb-2';
                row.innerHTML = `
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="content[form_fields][labels][en][]" placeholder="Field Label (EN)">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="content[form_fields][labels][ar][]" placeholder="Field Label (AR)">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="content[form_fields][type][]">
                            <option value="text">Text</option>
                            <option value="email">Email</option>
                            <option value="tel">Phone</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remove-field">×</button>
                    </div>
                `;
                formFields.appendChild(row);
            });
        }

        // Remove form field
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-field')) {
                e.target.closest('.row').remove();
            }
        });

        // Exhibitors
        const exhibitorsList = document.getElementById('exhibitors-list');
        const addExhibitorBtn = document.getElementById('add-exhibitor');
        if (addExhibitorBtn) {
            addExhibitorBtn.addEventListener('click', function() {
                const index = exhibitorsList.children.length;
                const exhibitor = document.createElement('div');
                exhibitor.className = 'card mb-3 exhibitor-item';
                exhibitor.innerHTML = `
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company Name (English)</label>
                                    <input type="text" class="form-control" name="content[exhibitors][${index}][name][en]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Company Name (Arabic)</label>
                                    <input type="text" class="form-control" name="content[exhibitors][${index}][name][ar]">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category (English)</label>
                                    <input type="text" class="form-control" name="content[exhibitors][${index}][category][en]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category (Arabic)</label>
                                    <input type="text" class="form-control" name="content[exhibitors][${index}][category][ar]">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Description (English)</label>
                                    <textarea class="form-control" name="content[exhibitors][${index}][description][en]" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Description (Arabic)</label>
                                    <textarea class="form-control" name="content[exhibitors][${index}][description][ar]" rows="2"></textarea>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="content[exhibitors][${index}][image]">
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-danger btn-sm remove-exhibitor">Remove Exhibitor</button>
                        </div>
                    </div>
                `;
                exhibitorsList.appendChild(exhibitor);
            });
        }

        // Remove exhibitor
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-exhibitor')) {
                e.target.closest('.exhibitor-item').remove();
            }
        });
    });
</script>
@endsection
