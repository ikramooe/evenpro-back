@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">{{ __('All Registrations') }}</h5>
        </div>

        <!-- Filters -->
        <div class="card-body border-bottom">
            <form action="/admin/registrations" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">{{ __('Event') }}</label>
                    <select name="event_id" class="form-select">
                        <option value="">{{ __('All Events') }}</option>
                        @foreach($events as $evt)
                            <option value="{{ $evt->id }}" {{ request('event_id') == $evt->id ? 'selected' : '' }}>
                                {{ $evt->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">{{ __('Type') }}</label>
                    <select name="type" class="form-select">
                        <option value="">{{ __('All Types') }}</option>
                        <option value="registration_client" {{ request('type') == 'registration_client' ? 'selected' : '' }}>
                            {{ __('Client Registration') }}
                        </option>
                        <option value="registration_exhibitor" {{ request('type') == 'registration_exhibitor' ? 'selected' : '' }}>
                            {{ __('Exhibitor Registration') }}
                        </option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">{{ __('Status') }}</label>
                    <select name="status" class="form-select">
                        <option value="">{{ __('All Status') }}</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                            {{ __('Pending') }}
                        </option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>
                            {{ __('Approved') }}
                        </option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>
                            {{ __('Rejected') }}
                        </option>
                    </select>
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-falcon-primary me-2">
                        <i class="fas fa-filter me-1"></i> {{ __('Filter') }}
                    </button>
                    <a href="/admin/registrations" class="btn btn-falcon-default">
                        <i class="fas fa-times me-1"></i> {{ __('Clear') }}
                    </a>
                </div>
            </form>
        </div>

        <!-- Registrations Table -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>{{ __('Event') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Company') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registrations as $registration)
                            <tr>
                                <td>{{ $registration->event->title }}</td>
                                <td>
                                    <span class="badge rounded-pill bg-primary">
                                        {{ $registration->type === 'registration_client' ? __('Client') : __('Exhibitor') }}
                                    </span>
                                </td>
                                <td>{{ $registration->first_name }} {{ $registration->last_name }}</td>
                                <td>{{ $registration->email }}</td>
                                <td>{{ $registration->phone }}</td>
                                <td>{{ $registration->company }}</td>
                                <td>
                                    <span class="badge rounded-pill bg-{{ $registration->status === 'approved' ? 'success' : ($registration->status === 'rejected' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($registration->status) }}
                                    </span>
                                </td>
                                <td>{{ $registration->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-falcon-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ __('Actions') }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="{{ route('admin.events.forms.registrations.update-status', ['event' => $registration->event_id, 'form' => $registration->event_form_id, 'registration' => $registration]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-check text-success"></i> {{ __('Approve') }}
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('admin.events.forms.registrations.update-status', ['event' => $registration->event_id, 'form' => $registration->event_form_id, 'registration' => $registration]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-times text-danger"></i> {{ __('Reject') }}
                                                    </button>
                                                </form>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="{{ route('admin.events.forms.registrations.destroy', ['event' => $registration->event_id, 'form' => $registration->event_form_id, 'registration' => $registration]) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this registration?') }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fas fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">
                                    {{ __('No registrations found.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($registrations->hasPages())
            <div class="card-footer">
                {{ $registrations->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
