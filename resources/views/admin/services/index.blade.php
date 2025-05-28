@extends('admin.layouts.admin')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Services</h5>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                    <span class="fas fa-plus me-2"></span>Add New Service
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
                                <th scope="col">Title (EN)</th>
                                <th scope="col">Title (AR)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Order</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>
                                    @if($service->image)
                                        <img src="{{ asset($service->image) }}" alt="{{ $service->translate('en')->title }}" class="img-fluid" style="max-width: 50px;">
                                    @else
                                        <span class="fas fa-image text-muted"></span>
                                    @endif
                                </td>
                                <td>{{ $service->translate('en')->title }}</td>
                                <td>{{ $service->translate('ar')->title }}</td>
                                <td>
                                    @if($service->active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $service->order }}</td>
                                <td>
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                            <span class="fas fa-ellipsis-h fs--1"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0">
                                            <div class="py-2">
                                                <a class="dropdown-item" href="{{ route('admin.services.edit', $service) }}">
                                                    <span class="fas fa-edit me-1"></span> Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this service?')">
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
