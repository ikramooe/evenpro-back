<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventForm;
use App\Models\EventRegistration;

class EventRegistrationController extends Controller
{
    public function store(Request $request, Event $event, EventForm $form)
    {
       
      
        $request->validate([
            //'first_name' => 'required|string|max:255',
            //'last_name' => 'required|string|max:255',
           // 'email' => 'required|email|max:255',
            //'phone' => 'required|string|max:255',
           // 'address' => 'nullable|string',
            //'company' => 'required|string|max:255',
        ]);

        $registration = EventRegistration::create([
            'event_id' => $event->id,
            'event_form_id' => $form->id,
            'type' => $form->type,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'company' => $request->company,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', __('Registration submitted successfully! We will review your application and get back to you soon.'));
    }
}
