@extends('admin.layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Events</h5>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                    <span class="fas fa-plus me-2"></span>Add New Event
                </a>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel">
                <div class="table-responsive scrollbar">
                    <table class="table table-hover table-striped overflow-hidden">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Location</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>
                                    @if($event->image)
                                        <img src="{{ asset($event->image) }}" alt="{{ $event->translate('en')->title }}" class="img-fluid" style="max-width: 50px;">
                                    @else
                                        <span class="fas fa-image text-muted"></span>
                                    @endif
                                </td>
                                <td>
                                    <div>{{ $event->translate('en')->title }}</div>
                                    <small class="text-muted">{{ $event->translate('ar')->title }}</small>
                                </td>
                                <td>
                                    <div>{{ $event->translate('en')->location }}</div>
                                    <small class="text-muted">{{ $event->translate('ar')->location }}</small>
                                </td>
                                <td>
                                    <div>{{ $event->start_date->format('M d, Y H:i') }}</div>
                                    @if($event->end_date)
                                        <small class="text-muted">to {{ $event->end_date->format('M d, Y H:i') }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($event->active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                            <span class="fas fa-ellipsis-h fs--1"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0">
                                            <div class="py-2">
                                                <a class="dropdown-item" href="{{ route('admin.events.edit', $event) }}">
                                                    <span class="fas fa-edit me-1"></span> Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this event?')">
                                                        <span class="fas fa-trash-alt me-1"></span> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table-responsive {
        min-height: 200px;
    }
</style>
@endpush
