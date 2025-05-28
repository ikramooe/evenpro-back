<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventForm;
use App\Models\EventRegistration;


class EventFormController extends Controller
{
    
    
    public function index(Request $request)
    {
        $query = EventRegistration::query();
        $query->with(['event', 'form']); // Eager load relationships

        // Apply filters
        if ($request->filled('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        if ($request->filled('type')) {
            $query->wherehas('form', function ($query) use ($request) {
                $query->where('type', $request->type);
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $registrations = $query->latest()->paginate(10);
        $events = Event::all(); // For the event filter dropdown

        return view('admin.registrations.index', compact('registrations', 'events'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        return view('admin.events.forms.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        
        $request->validate([
            'type' => 'required|in:registration_client,registration_exhibitor',
           // 'content' => 'required|array',
            //'content.title.en' => 'required|string',
           // 'content.title.ar' => 'required|string',
           // 'content.description.en' => 'required|string',
           // 'content.description.ar' => 'required|string',
           // 'active' => 'boolean',
        ]);


        $event->forms()->create([
            'type' => $request->type,
            'content' => $request->content,
            'active' => $request->active=="on" ? true : false,
            'order' => $event->forms()->count()
        ]);

        return redirect()->route('admin.events.edit', $event)
            ->with('success', 'Form created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event, EventForm $form)
    {
        return view('admin.events.forms.edit', compact('event', 'form'));
    }

    public function showRegistrations(Event $event, EventForm $form)
    {
        $registrations = $form->registrations()->latest()->paginate(10);
        return view('admin.events.forms.registrations', compact('event', 'form', 'registrations'));
    }

    public function updateRegistrationStatus(Event $event, EventForm $form, EventRegistration $registration)
    {
        $validated = request()->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $registration->update([
            'status' => $validated['status']
        ]);

        return redirect()->back()->with('success', __('Registration status updated successfully.'));
    }

    public function destroyRegistration(Event $event, EventForm $form, EventRegistration $registration)
    {
        $registration->delete();
        return redirect()->back()->with('success', __('Registration deleted successfully.'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, EventForm $form)
    {
        $request->validate([
            'type' => 'required|in:registration_client,registration_exhibitor',
            'content' => 'required|array',
           // 'content.title.en' => 'required|string',
            //'content.title.ar' => 'required|string',
            //'content.description.en' => 'required|string',
            //'content.description.ar' => 'required|string',
            'active' => 'boolean',
        ]);

        $form->update([
            'type' => $request->type,
            'content' => $request->content,
            'active' => $request->boolean('active', true)
        ]);

        return redirect()->route('admin.events.edit', $event)
            ->with('success', 'Form updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, EventForm $form)
    {
        $form->delete();

        return redirect()->route('admin.events.edit', $event)
            ->with('success', 'Form deleted successfully.');
    }
}
