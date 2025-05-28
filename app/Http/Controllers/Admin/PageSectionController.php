<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageSectionController extends Controller
{
    public function editHero()
    {
        $content = PageSection::getContent('hero_section');
        return view('admin.page-sections.hero', compact('content'));
    }

    public function updateHero(Request $request)
    {
        $request->validate([
            'slides' => 'required|array|min:1',
            'slides.*.background_image' => 'required_without:slides.*.new_background_image',
            'slides.*.new_background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'slides.*.shape_image' => 'required_without:slides.*.new_shape_image',
            'slides.*.new_shape_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'slides.*.texts.en.subtitle' => 'required|string',
            'slides.*.texts.en.title' => 'required|string',
            'slides.*.texts.en.button_text' => 'required|string',
            'slides.*.texts.en.button_link' => 'required|string',
            'slides.*.texts.ar.subtitle' => 'required|string',
            'slides.*.texts.ar.title' => 'required|string',
            'slides.*.texts.ar.button_text' => 'required|string',
            'slides.*.texts.ar.button_link' => 'required|string',
        ]);

        $content = ['hero_section' => ['slides' => []]];
        
        foreach ($request->slides as $index => $slide) {
            $slideData = [
                'texts' => $slide['texts'],
            ];

            // Handle background image
            if (isset($slide['new_background_image'])) {
                $backgroundImage = $slide['new_background_image'];
                $backgroundPath = $backgroundImage->store('public/uploads/hero');
                $slideData['background_image'] = Storage::url($backgroundPath);
            } else {
                $slideData['background_image'] = $slide['background_image'];
            }

            // Handle shape image
            if (isset($slide['new_shape_image'])) {
                $shapeImage = $slide['new_shape_image'];
                $shapePath = $shapeImage->store('public/uploads/hero');
                $slideData['shape_image'] = Storage::url($shapePath);
            } else {
                $slideData['shape_image'] = $slide['shape_image'];
            }

            $content['hero_section']['slides'][] = $slideData;
        }

        PageSection::updateContent('hero_section', $content);

        return redirect()->route('admin.sections.hero.edit')
            ->with('success', 'Hero section updated successfully.');
    }

    public function deleteSlide($index)
    {
        $content = PageSection::getContent('hero_section');
        
        if (isset($content['hero_section']['slides'][$index])) {
            // Delete the images if they exist
            $slide = $content['hero_section']['slides'][$index];
            
            if (isset($slide['background_image'])) {
                Storage::delete(str_replace('/storage/', 'public/', $slide['background_image']));
            }
            
            if (isset($slide['shape_image'])) {
                Storage::delete(str_replace('/storage/', 'public/', $slide['shape_image']));
            }

            // Remove the slide from the array
            unset($content['hero_section']['slides'][$index]);
            $content['hero_section']['slides'] = array_values($content['hero_section']['slides']);

            PageSection::updateContent('hero_section', $content);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
