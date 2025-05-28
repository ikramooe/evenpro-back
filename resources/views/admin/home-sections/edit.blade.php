@extends('admin.layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Edit Home Page Content</h5>
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

        <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Hero Section -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <div class="row justify-content-between">
                        <div class="col">
                            <h6 class="mb-0">Hero Section</h6>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-falcon-default btn-sm" id="add-hero-slide">
                                <span class="fas fa-plus me-1"></span> Add Slide
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="hero-slides-container">
                        @foreach($sections['hero_section']['hero_section']['slides'] ?? [] as $index => $slide)
                        <div class="slide-item mb-4" data-index="{{ $index }}">
                            <div class="card">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Slide {{ $index + 1 }}</h6>
                                    <button type="button" class="btn btn-falcon-danger btn-sm delete-hero-slide" data-index="{{ $index }}">
                                        <span class="fas fa-trash-alt"></span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Background Image</label>
                                                @if($slide['background_image'])
                                                    <div class="mb-2">
                                                        <img src="{{ asset($slide['background_image']) }}" class="img-thumbnail" style="max-height: 150px;">
                                                    </div>
                                                @endif
                                                <input type="hidden" name="hero_section[slides][{{ $index }}][background_image]" value="{{ $slide['background_image'] }}">
                                                <input type="file" class="form-control" name="hero_section[slides][{{ $index }}][new_background_image]" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Shape Image</label>
                                                @if($slide['shape_image'])
                                                    <div class="mb-2">
                                                        <img src="{{ asset($slide['shape_image']) }}" class="img-thumbnail" style="max-height: 150px;">
                                                    </div>
                                                @endif
                                                <input type="hidden" name="hero_section[slides][{{ $index }}][shape_image]" value="{{ $slide['shape_image'] }}">
                                                <input type="file" class="form-control" name="hero_section[slides][{{ $index }}][new_shape_image]" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- English Content -->
                                    <div class="card mt-3">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">English Content</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" 
                                                       name="hero_section[slides][{{ $index }}][texts][en][subtitle]" 
                                                       value="{{ $slide['texts']['en']['subtitle'] }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" 
                                                       name="hero_section[slides][{{ $index }}][texts][en][title]" 
                                                       value="{{ $slide['texts']['en']['title'] }}" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" 
                                                               name="hero_section[slides][{{ $index }}][texts][en][button_text]" 
                                                               value="{{ $slide['texts']['en']['button_text'] }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Button Link</label>
                                                        <input type="text" class="form-control" 
                                                               name="hero_section[slides][{{ $index }}][texts][en][button_link]" 
                                                               value="{{ $slide['texts']['en']['button_link'] }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Arabic Content -->
                                    <div class="card mt-3">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">Arabic Content</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" 
                                                       name="hero_section[slides][{{ $index }}][texts][ar][subtitle]" 
                                                       value="{{ $slide['texts']['ar']['subtitle'] }}" required dir="rtl">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" 
                                                       name="hero_section[slides][{{ $index }}][texts][ar][title]" 
                                                       value="{{ $slide['texts']['ar']['title'] }}" required dir="rtl">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" 
                                                               name="hero_section[slides][{{ $index }}][texts][ar][button_text]" 
                                                               value="{{ $slide['texts']['ar']['button_text'] }}" required dir="rtl">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Button Link</label>
                                                        <input type="text" class="form-control" 
                                                               name="hero_section[slides][{{ $index }}][texts][ar][button_link]" 
                                                               value="{{ $slide['texts']['ar']['button_link'] }}" required dir="rtl">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- About Section -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">About Section</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Section Image</label>
                            @if(!empty(data_get($sections, 'about_section.about_section.image')))
                                <div class="mb-2">
                                    <img src="{{ asset(data_get($sections, 'about_section.about_section.image', '')) }}" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            @endif
                            <input type="hidden" name="sections[about_section][about_section][image]" value="{{ data_get($sections, 'about_section.about_section.image', '') }}">
                            <input type="file" class="form-control" name="sections[about_section][about_section][new_image]" accept="image/*">
                        </div>
                    </div>

                    <!-- English Content -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">English Content</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" name="sections[about_section][about_section][texts][en][subtitle]" 
                                           value="{{ data_get($sections, 'about_section.about_section.texts.en.subtitle', '') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="sections[about_section][about_section][texts][en][title]" 
                                           value="{{ data_get($sections, 'about_section.about_section.texts.en.title', '') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="sections[about_section][about_section][texts][en][description]" rows="4" required>{{ data_get($sections, 'about_section.about_section.texts.en.description', '') }}</textarea>
                            </div>

                            <!-- Experience -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Experience</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Years</label>
                                            <input type="text" class="form-control" name="about_section[texts][en][experience][years]" 
                                                   value="{{ $sections['about_section']['about_section']['texts']['en']['experience']['years'] }}" required>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label">Text</label>
                                            <input type="text" class="form-control" name="about_section[texts][en][experience][text]" 
                                                   value="{{ $sections['about_section']['about_section']['texts']['en']['experience']['text'] }}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Details</label>
                                        <textarea class="form-control" name="about_section[texts][en][experience][details]" rows="2" required>{{ $sections['about_section']['about_section']['texts']['en']['experience']['details'] }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Points -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Key Points</h6>
                                </div>
                                <div class="card-body">
                                    @foreach($sections['about_section']['about_section']['texts']['en']['points'] as $index => $point)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Icon Class</label>
                                                    <input type="text" class="form-control" name="about_section[texts][en][points][{{ $index }}][icon]" 
                                                           value="{{ $point['icon'] }}" required>
                                                </div>
                                                <div class="col-md-8 mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="about_section[texts][en][points][{{ $index }}][title]" 
                                                           value="{{ $point['title'] }}" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="about_section[texts][en][points][{{ $index }}][description]" rows="2" required>{{ $point['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="about_section[texts][en][button][text]" 
                                           value="{{ $sections['about_section']['about_section']['texts']['en']['button']['text'] }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Link</label>
                                    <input type="text" class="form-control" name="about_section[texts][en][button][link]" 
                                           value="{{ $sections['about_section']['about_section']['texts']['en']['button']['link'] }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Arabic Content -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Arabic Content</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" name="about_section[texts][ar][subtitle]" 
                                           value="{{ $sections['about_section']['about_section']['texts']['ar']['subtitle'] }}" required dir="rtl">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="about_section[texts][ar][title]" 
                                           value="{{ $sections['about_section']['about_section']['texts']['ar']['title'] }}" required dir="rtl">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="about_section[texts][ar][description]" rows="4" required dir="rtl">{{ $sections['about_section']['about_section']['texts']['ar']['description'] }}</textarea>
                            </div>

                            <!-- Experience -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Experience</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Years</label>
                                            <input type="text" class="form-control" name="about_section[texts][ar][experience][years]" 
                                                   value="{{ $sections['about_section']['about_section']['texts']['ar']['experience']['years'] }}" required dir="rtl">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label">Text</label>
                                            <input type="text" class="form-control" name="about_section[texts][ar][experience][text]" 
                                                   value="{{ $sections['about_section']['about_section']['texts']['ar']['experience']['text'] }}" required dir="rtl">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Details</label>
                                        <textarea class="form-control" name="about_section[texts][ar][experience][details]" rows="2" required dir="rtl">{{ $sections['about_section']['about_section']['texts']['ar']['experience']['details'] }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Points -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Key Points</h6>
                                </div>
                                <div class="card-body">
                                    @foreach($sections['about_section']['about_section']['texts']['ar']['points'] as $index => $point)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Icon Class</label>
                                                    <input type="text" class="form-control" name="about_section[texts][ar][points][{{ $index }}][icon]" 
                                                           value="{{ $point['icon'] }}" required>
                                                </div>
                                                <div class="col-md-8 mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="about_section[texts][ar][points][{{ $index }}][title]" 
                                                           value="{{ $point['title'] }}" required dir="rtl">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="about_section[texts][ar][points][{{ $index }}][description]" rows="2" required dir="rtl">{{ $point['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="about_section[texts][ar][button][text]" 
                                           value="{{ $sections['about_section']['about_section']['texts']['ar']['button']['text'] }}" required dir="rtl">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Link</label>
                                    <input type="text" class="form-control" name="about_section[texts][ar][button][link]" 
                                           value="{{ $sections['about_section']['about_section']['texts']['ar']['button']['link'] }}" required dir="rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Choosing Section -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Why Choose Us Section</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Section Image</label>
                            @if($sections['choosing_section']['choosing_section']['image'])
                                <div class="mb-2">
                                    <img src="{{ asset($sections['choosing_section']['choosing_section']['image']) }}" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            @endif
                            <input type="hidden" name="choosing_section[image]" value="{{ $sections['choosing_section']['choosing_section']['image'] }}">
                            <input type="file" class="form-control" name="choosing_section[new_image]" accept="image/*">
                        </div>
                    </div>

                    <!-- English Content -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">English Content</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" name="choosing_section[texts][en][subtitle]" 
                                           value="{{ $sections['choosing_section']['choosing_section']['texts']['en']['subtitle'] }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="choosing_section[texts][en][title]" 
                                           value="{{ $sections['choosing_section']['choosing_section']['texts']['en']['title'] }}" required>
                                </div>
                            </div>

                            <!-- Points -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Key Points</h6>
                                </div>
                                <div class="card-body">
                                    @foreach($sections['choosing_section']['choosing_section']['texts']['en']['points'] as $index => $point)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2 mb-3">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" class="form-control" name="choosing_section[texts][en][points][{{ $index }}][number]" 
                                                           value="{{ $point['number'] }}" required>
                                                </div>
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="choosing_section[texts][en][points][{{ $index }}][title]" 
                                                           value="{{ $point['title'] }}" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="choosing_section[texts][en][points][{{ $index }}][description]" rows="2" required>{{ $point['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Arabic Content -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Arabic Content</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" name="choosing_section[texts][ar][subtitle]" 
                                           value="{{ $sections['choosing_section']['choosing_section']['texts']['ar']['subtitle'] }}" required dir="rtl">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="choosing_section[texts][ar][title]" 
                                           value="{{ $sections['choosing_section']['choosing_section']['texts']['ar']['title'] }}" required dir="rtl">
                                </div>
                            </div>

                            <!-- Points -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Key Points</h6>
                                </div>
                                <div class="card-body">
                                    @foreach($sections['choosing_section']['choosing_section']['texts']['ar']['points'] as $index => $point)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2 mb-3">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" class="form-control" name="choosing_section[texts][ar][points][{{ $index }}][number]" 
                                                           value="{{ $point['number'] }}" required>
                                                </div>
                                                <div class="col-md-10 mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="choosing_section[texts][ar][points][{{ $index }}][title]" 
                                                           value="{{ $point['title'] }}" required dir="rtl">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="choosing_section[texts][ar][points][{{ $index }}][description]" rows="2" required dir="rtl">{{ $point['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hire Section -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Hire Section</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Background Image</label>
                            @if($sections['hire_section']['hire_section']['background_image'])
                                <div class="mb-2">
                                    <img src="{{ asset($sections['hire_section']['hire_section']['background_image']) }}" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            @endif
                            <input type="hidden" name="hire_section[background_image]" value="{{ $sections['hire_section']['hire_section']['background_image'] }}">
                            <input type="file" class="form-control" name="hire_section[new_background_image]" accept="image/*">
                        </div>
                    </div>

                    <!-- French Content -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">French Content</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="hire_section[texts][fr][title]" 
                                       value="{{ $sections['hire_section']['hire_section']['texts']['fr']['title'] }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="hire_section[texts][fr][button_text]" 
                                           value="{{ $sections['hire_section']['hire_section']['texts']['fr']['button_text'] }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Link</label>
                                    <input type="text" class="form-control" name="hire_section[texts][fr][button_link]" 
                                           value="{{ $sections['hire_section']['hire_section']['texts']['fr']['button_link'] }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- English Content -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">English Content</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="hire_section[texts][en][title]" 
                                       value="{{ $sections['hire_section']['hire_section']['texts']['en']['title'] }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="hire_section[texts][en][button_text]" 
                                           value="{{ $sections['hire_section']['hire_section']['texts']['en']['button_text'] }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Link</label>
                                    <input type="text" class="form-control" name="hire_section[texts][en][button_link]" 
                                           value="{{ $sections['hire_section']['hire_section']['texts']['en']['button_link'] }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Arabic Content -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Arabic Content</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="hire_section[texts][ar][title]" 
                                       value="{{ $sections['hire_section']['hire_section']['texts']['ar']['title'] }}" required dir="rtl">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="hire_section[texts][ar][button_text]" 
                                           value="{{ $sections['hire_section']['hire_section']['texts']['ar']['button_text'] }}" required dir="rtl">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Link</label>
                                    <input type="text" class="form-control" name="hire_section[texts][ar][button_link]" 
                                           value="{{ $sections['hire_section']['hire_section']['texts']['ar']['button_link'] }}" required dir="rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Brands Section -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Partner Brands</h6>
                </div>
                <div class="card-body">
                    @foreach($sections['brands_section']['brands'] as $index => $brand)
                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Brand {{ $brand['id'] }}</h6>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="brands_section[brands][{{ $index }}][id]" value="{{ $brand['id'] }}">

                            <!-- Links -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Primary Link</label>
                                    <input type="text" class="form-control" name="brands_section[brands][{{ $index }}][links][]" 
                                           value="{{ $brand['links'][0] }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Secondary Link</label>
                                    <input type="text" class="form-control" name="brands_section[brands][{{ $index }}][links][]" 
                                           value="{{ $brand['links'][1] }}" required>
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="row">
                                <!-- Regular Logo -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Regular Logo</label>
                                    @if($brand['images'][0]['src'])
                                        <div class="mb-2">
                                            <img src="{{ asset($brand['images'][0]['src']) }}" class="img-thumbnail" style="max-height: 100px;">
                                        </div>
                                    @endif
                                    <input type="hidden" name="brands_section[brands][{{ $index }}][images][0][src]" value="{{ $brand['images'][0]['src'] }}">
                                    <input type="file" class="form-control mb-2" name="brands_section[brands][{{ $index }}][images][0][new_image]" accept="image/*">
                                    <input type="text" class="form-control" name="brands_section[brands][{{ $index }}][images][0][alt]" 
                                           value="{{ $brand['images'][0]['alt'] }}" placeholder="Alt Text" required>
                                </div>

                                <!-- White Contrast Logo -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">White Contrast Logo</label>
                                    @if($brand['images'][1]['src'])
                                        <div class="mb-2">
                                            <img src="{{ asset($brand['images'][1]['src']) }}" class="img-thumbnail" style="max-height: 100px;">
                                        </div>
                                    @endif
                                    <input type="hidden" name="brands_section[brands][{{ $index }}][images][1][src]" value="{{ $brand['images'][1]['src'] }}">
                                    <input type="file" class="form-control mb-2" name="brands_section[brands][{{ $index }}][images][1][new_image]" accept="image/*">
                                    <input type="text" class="form-control" name="brands_section[brands][{{ $index }}][images][1][alt]" 
                                           value="{{ $brand['images'][1]['alt'] }}" placeholder="Alt Text" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Add other sections here -->

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <span class="fas fa-save me-2"></span>Save All Changes
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add new hero slide
    document.getElementById('add-hero-slide').addEventListener('click', function() {
        const container = document.getElementById('hero-slides-container');
        const index = container.children.length;
        
        // Clone the first slide if it exists, otherwise create new template
        let template = '';
        if (container.children.length > 0) {
            const firstSlide = container.children[0].cloneNode(true);
            firstSlide.setAttribute('data-index', index);
            
            // Update all input names and clear values
            firstSlide.querySelectorAll('input').forEach(input => {
                input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
                if (input.type !== 'hidden') {
                    input.value = '';
                }
            });
            
            // Remove existing images
            firstSlide.querySelectorAll('.img-thumbnail').forEach(img => img.remove());
            
            template = firstSlide.outerHTML;
        } else {
            // Create new slide template
            template = `
                <div class="slide-item mb-4" data-index="${index}">
                    <!-- Add your slide template HTML here -->
                </div>`;
        }
        
        container.insertAdjacentHTML('beforeend', template);
    });

    // Delete hero slide
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-hero-slide')) {
            const button = e.target.closest('.delete-hero-slide');
            const index = button.dataset.index;
            const slideItem = button.closest('.slide-item');
            
            if (confirm('Are you sure you want to delete this slide?')) {
                fetch(`{{ route('admin.home.hero.delete-slide', '') }}/${index}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        slideItem.remove();
                        // Reindex remaining slides
                        document.querySelectorAll('.slide-item').forEach((item, idx) => {
                            item.setAttribute('data-index', idx);
                            item.querySelectorAll('input').forEach(input => {
                                input.name = input.name.replace(/\[\d+\]/, `[${idx}]`);
                            });
                        });
                    }
                });
            }
        }
    });
});
</script>
@endpush
@endsection
