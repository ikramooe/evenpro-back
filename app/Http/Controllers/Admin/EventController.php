<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('start_date', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en.title' => 'required|string|max:255',
            'en.description' => 'required|string',
            'en.location' => 'required|string|max:255',
            'ar.title' => 'required|string|max:255',
            'ar.description' => 'required|string',
            'ar.location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $event = new Event();
        $event->start_date = $request->input('start_date');
        $event->slug=Str::slug($request->input("en.title"));
        $event->end_date = $request->input('end_date');
        $event->active = $request->boolean('active', true);
        $event->order = $request->input('order', 0);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'event_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'), $filename);
            $event->image = 'uploads/events/' . $filename;
        }

        $event->save();

        // Save translations
        foreach (['en', 'ar'] as $locale) {
            $event->translateOrNew($locale)->title = $request->input("$locale.title");
            $event->translateOrNew($locale)->description = $request->input("$locale.description");
            $event->translateOrNew($locale)->location = $request->input("$locale.location");
            $event->translateOrNew($locale)->slug = Str::slug($request->input("$locale.title"));
        }

        $event->save();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'en.title' => 'required|string|max:255',
            'en.description' => 'required|string',
            'en.location' => 'required|string|max:255',
            'ar.title' => 'required|string|max:255',
            'ar.description' => 'required|string',
            'ar.location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->active = $request->boolean('active', true);
        $event->order = $request->input('order', 0);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }

            $image = $request->file('image');
            $filename = 'event_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'), $filename);
            $event->image = 'uploads/events/' . $filename;
        }

        // Update translations
        foreach (['en', 'ar'] as $locale) {
            $event->translateOrNew($locale)->title = $request->input("$locale.title");
            $event->translateOrNew($locale)->description = $request->input("$locale.description");
            $event->translateOrNew($locale)->location = $request->input("$locale.location");
            $event->translateOrNew($locale)->slug = Str::slug($request->input("$locale.title"));
        }

        $event->save();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        // Delete image if exists
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
