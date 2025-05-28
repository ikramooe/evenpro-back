@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">{{ __('Registrations') }} - {{ $form->content['title'][app()->getLocale()] }}</h5>
                </div>
                <div class="col-auto">
                    <a href="/admin/events/{{ $event->id }}/edit" class="btn btn-falcon-default btn-sm">
                        <i class="fas fa-arrow-left"></i> {{ __('Back to Forms') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
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
                                                <form action="{{ route('admin.events.forms.registrations.update-status', ['event' => $event, 'form' => $form, 'registration' => $registration]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-check text-success"></i> {{ __('Approve') }}
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('admin.events.forms.registrations.update-status', ['event' => $event, 'form' => $form, 'registration' => $registration]) }}" method="POST">
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
                                                <form action="{{ route('admin.events.forms.registrations.destroy', ['event' => $event, 'form' => $form, 'registration' => $registration]) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this registration?') }}')">
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
                                <td colspan="7" class="text-center py-4">
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
