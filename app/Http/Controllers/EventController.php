<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPage;

class EventController extends Controller
{
    public function index(Event $event)
    {
        return view('event', compact('event'));
    }
    public function show(Event $event)
    {
        $welcomePage = $event->pages()->where('type', 'welcome')->first();
       
        return view('event', compact('event', 'welcomePage'));
    }

    public function showForm(Event $event, $type)
    {
        $form = $event->forms()->where('type', $type)->where('active', true)->first();
        

        if (!$form) {
            abort(404);
        }

        return view('form', compact('event', 'form'));
    }

    public function page(Event $event, $type)
    {
        $page = $event->pages()->where('type', $type)->first();
        
        if (!$page) {
            abort(404);
        }

        if ($type === 'media') {
            $mediaPage = $page;
            return view('media', compact('event', 'mediaPage'));
        }

        if ($type === 'exhibitors') {
            $exhibitorsPage = $page;
            
            return view('exhibitors', compact('event', 'exhibitorsPage'));
        }

        return view($type, compact('event', 'page'));
    }
}
