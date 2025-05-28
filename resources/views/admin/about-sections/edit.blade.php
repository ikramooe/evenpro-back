@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit About Page Sections</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.about-sections.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Hero Section -->
                      

                        <!-- Intro Section -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Intro Section</h3>
                            </div>
                            <div class="card-body">
                                @foreach(['en', 'fr'] as $locale)
                                    <div class="form-group">
                                        <label>Title ({{ strtoupper($locale) }})</label>
                                        <input type="text" name="intro_section[texts][{{ $locale }}][title]" 
                                            value="{{ $sections['intro_section']['texts'][$locale]['title'] }}" 
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description ({{ strtoupper($locale) }})</label>
                                        <textarea name="intro_section[texts][{{ $locale }}][description]" 
                                            class="form-control" rows="3">{{ $sections['intro_section']['texts'][$locale]['description'] }}</textarea>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Details Section -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Details Section</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Background Image</label>
                                    <input type="file" name="about_details_section[about_details_section][background_image]" class="form-control">
                                    @if(!empty(data_get($sections, 'about_details_section.about_details_section.background_image')))
                                        <img src="{{ asset(data_get($sections, 'about_details_section.about_details_section.background_image')) }}" class="mt-2" style="max-height: 100px">
                                    @endif
                                    <input type="hidden" name="about_details_section[about_details_section][background_image]" value="{{ data_get($sections, 'about_details_section.about_details_section.background_image', '') }}">
                                </div>

                                @foreach(['en', 'ar'] as $locale)
                                    <div class="form-group">
                                        <label>Title ({{ strtoupper($locale) }})</label>
                                        <input type="text" name="about_details_section[about_details_section][texts][{{ $locale }}][title]" 
                                            value="{{ data_get($sections, 'about_details_section.about_details_section.texts.'.$locale.'.title', '') }}" 
                                            class="form-control" {{ $locale == 'ar' ? 'dir=rtl' : '' }}>
                                    </div>
                                    <div class="form-group">
                                        <label>Description ({{ strtoupper($locale) }})</label>
                                        <textarea name="about_details_section[about_details_section][texts][{{ $locale }}][description]" 
                                            class="form-control" rows="4" {{ $locale == 'ar' ? 'dir=rtl' : '' }}>{{ data_get($sections, 'about_details_section.about_details_section.texts.'.$locale.'.description', '') }}</textarea>
                                    </div>
                                @endforeach

                                <!-- Points -->
                                <h4 class="mt-4">Key Points</h4>
                                @if(!empty(data_get($sections, 'about_details_section.about_details_section.points')) && is_array(data_get($sections, 'about_details_section.about_details_section.points')))
                                    @foreach(data_get($sections, 'about_details_section.about_details_section.points', []) as $index => $point)
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">Point {{ $index + 1 }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Icon Class</label>
                                                    <input type="text" name="about_details_section[about_details_section][points][{{ $index }}][icon]" 
                                                        value="{{ data_get($point, 'icon', '') }}" class="form-control">
                                                </div>
                                                @foreach(['en', 'ar'] as $locale)
                                                    <div class="form-group">
                                                        <label>Title ({{ strtoupper($locale) }})</label>
                                                        <input type="text" name="about_details_section[about_details_section][points][{{ $index }}][texts][{{ $locale }}][title]" 
                                                            value="{{ data_get($point, 'texts.'.$locale.'.title', '') }}" class="form-control" {{ $locale == 'ar' ? 'dir=rtl' : '' }}>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description ({{ strtoupper($locale) }})</label>
                                                        <textarea name="about_details_section[about_details_section][points][{{ $index }}][texts][{{ $locale }}][description]" 
                                                            class="form-control" {{ $locale == 'ar' ? 'dir=rtl' : '' }}>{{ data_get($point, 'texts.'.$locale.'.description', '') }}</textarea>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Sections</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
