@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Form for {{ $event->name }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.events.forms.update', [$event, $form]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="type">Form Type</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                <option value="">Select Type</option>
                                <option value="registration_client" {{ $form->type === 'registration_client' ? 'selected' : '' }}>Client Registration</option>
                                <option value="registration_exhibitor" {{ $form->type === 'registration_exhibitor' ? 'selected' : '' }}>Exhibitor Registration</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Title (English)</label>
                            <input type="text" name="content[title][en]" value="{{ $form->content['title']['en'] ?? '' }}" class="form-control @error('content.title.en') is-invalid @enderror" required>
                            @error('content.title.en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Title (Arabic)</label>
                            <input type="text" name="content[title][ar]" value="{{ $form->content['title']['ar'] ?? '' }}" class="form-control @error('content.title.ar') is-invalid @enderror" required>
                            @error('content.title.ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description (English)</label>
                            <textarea name="content[description][en]" class="form-control tinymce @error('content.description.en') is-invalid @enderror" required>{{ $form->content['description']['en'] ?? '' }}</textarea>
                            @error('content.description.en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description (Arabic)</label>
                            <textarea name="content[description][ar]" class="form-control tinymce @error('content.description.ar') is-invalid @enderror" required>{{ $form->content['description']['ar'] ?? '' }}</textarea>
                            @error('content.description.ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="active" name="active" {{ $form->active ? 'checked' : '' }}>
                                <label class="custom-control-label" for="active">Active</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Form</button>
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-secondary">Cancel</a>

                        <form action="{{ route('admin.events.forms.destroy', [$event, $form]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this form?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger float-right">Delete Form</button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '.tinymce',
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
                alignleft aligncenter alignright alignjustify | \
                bullist numlist outdent indent | removeformat | help'
    });
</script>
@endpush
