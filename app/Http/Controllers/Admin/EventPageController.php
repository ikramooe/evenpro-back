<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\EventPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventPageController extends Controller
{
    public function edit(Event $event, $type)
    {
        $page = EventPage::firstOrCreate(
            ['event_id' => $event->id, 'type' => $type],
            ['content' => [], 'active' => true, 'order' => 0]
        );
      

        return view('admin.events.pages.edit', compact('event', 'page'));
    }

    public function update(Request $request, Event $event, $type)
    {
       
        
        $request->validate([
          //  'content' => 'required|array',
           // 'active' => 'boolean',
           // 'order' => 'integer|min:0'
        ]);

     
        $content = $request->input('content');

        // Handle image uploads
        if ($type === 'welcome') {
            // Handle hero background image
            if ($request->hasFile('content.hero.bg_image')) {
                $image = $request->file('content.hero.bg_image');
                $path = $image->store('public/events/' . $event->id . '/pages');
                $content['hero']['bg_image'] = str_replace('public/', 'storage/', $path);
            } elseif (isset($content['hero']['bg_image'])) {
                // Keep existing image if no new one uploaded
                $page = EventPage::where('event_id', $event->id)->where('type', $type)->first();
                if ($page) {
                    $content['hero']['bg_image'] = $page->content['hero']['bg_image'] ?? null;
                }
            } if (isset($content['services']['cards'])) {
                // Handle image uploads for service cards
                foreach ($content['services']['cards'] as $index => $card) {

                    $fileInputName = 'content.services.cards.' . $index . '.image';
                    if ($request->file($fileInputName)) {
                        $file = $request->file($fileInputName);
                        $path = $file->store('public/services');
                        $content['services']['cards'][$index]['image'] = str_replace('public/', '', $path);
                    }
                }
              

                // Remove empty cards
                $content['services']['cards'] = array_filter($content['services']['cards'], function($card) {
                    return !empty($card['title']['en']) || !empty($card['title']['ar']) || 
                           !empty($card['description']['en']) || !empty($card['description']['ar']);
                });

                // Re-index cards array after removing empty ones
                $content['services']['cards'] = array_values($content['services']['cards']);
            }if(isset($content['sponsors'])){
                foreach ($content['sponsors'] as $index => $card) {

                    $fileInputName = 'content.sponsors.' . $index . '.logo';
                    if ($request->file($fileInputName)) {
                        $file = $request->file($fileInputName);
                        $path = $file->store('public/services');
                        $content['sponsors'][$index]['logo'] = str_replace('public/', '', $path);
                    }
                }
                
            }
        } elseif ($type === 'media') {
            // Get existing page to preserve any existing media
            $page = EventPage::where('event_id', $event->id)->where('type', $type)->first();
            $existingContent = $page ? $page->content : [];

            // Handle media uploads
            if ($request->hasFile('content.media_images')) {
                foreach ($request->file('content.media_images') as $index => $file) {
                    if ($file->isValid()) {
                        $path = $file->store('public/events/' . $event->id . '/media');
                        $content['media_images'][$index]['image'] = str_replace('public/', 'storage/', $path);
                    }
                }
            }

            // Preserve existing media items that weren't removed
            if (isset($existingContent['media_images'])) {
                foreach ($existingContent['media_images'] as $index => $media) {
                    if (!isset($content['media_images'][$index]['image']) && isset($media['image'])) {
                        $content['media_images'][$index] = $media;
                    }
                }
            }

            // Handle video URLs (YouTube/Vimeo)
            if (isset($content['new_videos'])) {
                foreach ($content['new_videos'] as $index => $video) {
                    if (empty($video['url'])) {
                        unset($content['new_videos'][$index]);
                    }
                }
                // Re-index videos array after removing empty ones
                $content['videos'] = array_values($content['new_videos'] ?? []);
            }
        } elseif ($type === 'exhibitors') {
            // Get existing page to preserve exhibitor images
            $page = EventPage::where('event_id', $event->id)->where('type', $type)->first();
            $existingContent = $page ? $page->content : [];

            // Handle exhibitor images
            if(isset($content['exhibitors'])){
            foreach ($content['exhibitors'] as $index => $exhibitor) {
                if ($request->hasFile('content.exhibitors.' . $index . '.image')) {
                    $file = $request->file('content.exhibitors.' . $index . '.image');
                    $path = $file->store('public/events/' . $event->id . '/exhibitors');
                    $content['exhibitors'][$index]['image'] = str_replace('public/', 'storage/', $path);
                }
            }
            }
           

            // Preserve existing exhibitor images that weren't removed
            if (isset($existingContent['exhibitors'])) {
                foreach ($existingContent['exhibitors'] as $index => $exhibitor) {
                    if (!isset($content['exhibitors'][$index]['image']) && isset($exhibitor['image'])) {
                        $content['exhibitors'][$index]['image'] = $exhibitor['image'];
                    }
                }
            }

            // Clean up exhibitors array - remove empty entries
            if (isset($content['exhibitors'])) {
                foreach ($content['exhibitors'] as $index => $exhibitor) {
                    if (empty($exhibitor['name']['en']) && empty($exhibitor['name']['ar']) && 
                        empty($exhibitor['description']['en']) && empty($exhibitor['description']['ar']) && 
                        empty($exhibitor['image'])) {
                        unset($content['exhibitors'][$index]);
                    }
                }
                // Re-index exhibitors array after removing empty ones
                $content['exhibitors'] = array_values($content['exhibitors'] ?? []);
            }
        } elseif($type === 'services') {
            if (isset($content['services']['cards'])) {
                // Handle image uploads for service cards
                foreach ($content['services']['cards'] as $index => $card) {

                    $fileInputName = $card['image'];
                    if ($request->file($fileInputName)) {
                        $file = $request->file($fileInputName);
                        $path = $file->store('public/services');
                        $content['services']['cards'][$index]['image'] = str_replace('public/', '', $path);
                    }
                }
                dd($content);

                // Remove empty cards
                $content['services']['cards'] = array_filter($content['services']['cards'], function($card) {
                    return !empty($card['title']['en']) || !empty($card['title']['ar']) || 
                           !empty($card['description']['en']) || !empty($card['description']['ar']);
                });

                // Re-index cards array after removing empty ones
                $content['services']['cards'] = array_values($content['services']['cards']);
            }
        }

        
       
        $page = EventPage::updateOrCreate(
            ['event_id' => $event->id, 'type' => $type],
            [
                'content' => $content,
                'active' => $request->boolean('active', true),
                'order' => $request->input('order', 0)
            ]
        );

        return redirect()->back()->with('success', 'Page updated successfully.');
    }
}
