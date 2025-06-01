<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function edit()
    {
        $sections = [
            'hero_section' => PageSection::getContent('hero_section'),
            'about_section' => PageSection::getContent('about_section'),
            'choosing_section' => PageSection::getContent('choosing_section'),
            'hire_section' => PageSection::getContent('hire_section'),
            'brands_section' => PageSection::getContent('brands_section'),
        ];

        return view('admin.home-sections.edit', compact('sections'));
    }

    public function update(Request $request)
    {
        // Validate and update hero section
        if ($request->has('hero_section')) {
            $request->validate([
                'hero_section.slides' => 'required|array|min:1',
                'hero_section.slides.*.background_image' => 'required_without:hero_section.slides.*.new_background_image',
                'hero_section.slides.*.new_background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'hero_section.slides.*.shape_image' => 'required_without:hero_section.slides.*.new_shape_image',
                'hero_section.slides.*.new_shape_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'hero_section.slides.*.texts.en.subtitle' => 'required|string',
                'hero_section.slides.*.texts.en.title' => 'required|string',
                'hero_section.slides.*.texts.en.button_text' => 'required|string',
                'hero_section.slides.*.texts.en.button_link' => 'required|string',
                'hero_section.slides.*.texts.ar.subtitle' => 'required|string',
                'hero_section.slides.*.texts.ar.title' => 'required|string',
                'hero_section.slides.*.texts.ar.button_text' => 'required|string',
                'hero_section.slides.*.texts.ar.button_link' => 'required|string',
            ]);

            $heroContent = ['hero_section' => ['slides' => []]];
            
            foreach ($request->hero_section['slides'] as $index => $slide) {
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

                $heroContent['hero_section']['slides'][] = $slideData;
            }

            PageSection::updateContent('hero_section', $heroContent);
        }

        dd($request->all());
        // Update about section
        if ($request->has('about_section')) {
            $request->validate([
                'about_section.image' => 'required_without:about_section.new_image',
                'about_section.new_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'about_section.texts.en.subtitle' => 'required|string',
                'about_section.texts.en.title' => 'required|string',
                'about_section.texts.en.description' => 'required|string',
                'about_section.texts.en.experience.years' => 'required|string',
                'about_section.texts.en.experience.text' => 'required|string',
                'about_section.texts.en.experience.details' => 'required|string',
                'about_section.texts.en.points.*.icon' => 'required|string',
                'about_section.texts.en.points.*.title' => 'required|string',
                'about_section.texts.en.points.*.description' => 'required|string',
                'about_section.texts.en.button.text' => 'required|string',
                'about_section.texts.en.button.link' => 'required|string',
                'about_section.texts.ar.subtitle' => 'required|string',
                'about_section.texts.ar.title' => 'required|string',
                'about_section.texts.ar.description' => 'required|string',
                'about_section.texts.ar.experience.years' => 'required|string',
                'about_section.texts.ar.experience.text' => 'required|string',
                'about_section.texts.ar.experience.details' => 'required|string',
                'about_section.texts.ar.points.*.icon' => 'required|string',
                'about_section.texts.ar.points.*.title' => 'required|string',
                'about_section.texts.ar.points.*.description' => 'required|string',
                'about_section.texts.ar.button.text' => 'required|string',
                'about_section.texts.ar.button.link' => 'required|string',
            ]);

            $aboutContent = ['about_section' => [
                'texts' => $request->about_section['texts']
            ]];

            // Handle image upload
            if ($request->hasFile('about_section.new_image')) {
                $image = $request->file('about_section.new_image');
                $path = $image->store('public/uploads/about');
                $aboutContent['about_section']['image'] = Storage::url($path);
            } else {
                $aboutContent['about_section']['image'] = $request->about_section['image'];
            }

            PageSection::updateContent('about_section', $aboutContent);
        }

        // Update choosing section
        if ($request->has('choosing_section')) {
            $request->validate([
                'choosing_section.image' => 'required_without:choosing_section.new_image',
                'choosing_section.new_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'choosing_section.texts.en.subtitle' => 'required|string',
                'choosing_section.texts.en.title' => 'required|string',
                'choosing_section.texts.en.points.*.number' => 'required|string',
                'choosing_section.texts.en.points.*.title' => 'required|string',
                'choosing_section.texts.en.points.*.description' => 'required|string',
                'choosing_section.texts.ar.subtitle' => 'required|string',
                'choosing_section.texts.ar.title' => 'required|string',
                'choosing_section.texts.ar.points.*.number' => 'required|string',
                'choosing_section.texts.ar.points.*.title' => 'required|string',
                'choosing_section.texts.ar.points.*.description' => 'required|string',
            ]);

            $choosingContent = ['choosing_section' => [
                'texts' => $request->choosing_section['texts']
            ]];

            // Handle image upload
            if ($request->hasFile('choosing_section.new_image')) {
                $image = $request->file('choosing_section.new_image');
                $path = $image->store('public/uploads/choosing');
                $choosingContent['choosing_section']['image'] = Storage::url($path);
            } else {
                $choosingContent['choosing_section']['image'] = $request->choosing_section['image'];
            }

            PageSection::updateContent('choosing_section', $choosingContent);
        }

        // Update hire section
        if ($request->has('hire_section')) {
            $request->validate([
                'hire_section.background_image' => 'required_without:hire_section.new_background_image',
                'hire_section.new_background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'hire_section.texts.fr.title' => 'required|string',
                'hire_section.texts.fr.button_text' => 'required|string',
                'hire_section.texts.fr.button_link' => 'required|string',
                'hire_section.texts.en.title' => 'required|string',
                'hire_section.texts.en.button_text' => 'required|string',
                'hire_section.texts.en.button_link' => 'required|string',
                'hire_section.texts.ar.title' => 'required|string',
                'hire_section.texts.ar.button_text' => 'required|string',
                'hire_section.texts.ar.button_link' => 'required|string',
            ]);

            $hireContent = ['hire_section' => [
                'texts' => $request->hire_section['texts']
            ]];

            // Handle background image upload
            if ($request->hasFile('hire_section.new_background_image')) {
                $image = $request->file('hire_section.new_background_image');
                $path = $image->store('public/uploads/hire');
                $hireContent['hire_section']['background_image'] = Storage::url($path);
            } else {
                $hireContent['hire_section']['background_image'] = $request->hire_section['background_image'];
            }

            PageSection::updateContent('hire_section', $hireContent);
        }

        // Update brands section
        if ($request->has('brands_section')) {
            $request->validate([
                'brands_section.brands' => 'required|array',
                'brands_section.brands.*.id' => 'required|integer',
                'brands_section.brands.*.links' => 'required|array',
                'brands_section.brands.*.links.*' => 'required|string',
                'brands_section.brands.*.images' => 'required|array',
                'brands_section.brands.*.images.*.src' => 'required_without:brands_section.brands.*.images.*.new_image',
                'brands_section.brands.*.images.*.new_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'brands_section.brands.*.images.*.alt' => 'required|string',
            ]);

            $brandsContent = ['brands' => []];

            foreach ($request->brands_section['brands'] as $brand) {
                $brandData = [
                    'id' => $brand['id'],
                    'links' => $brand['links'],
                    'images' => []
                ];

                foreach ($brand['images'] as $index => $image) {
                    $imageData = ['alt' => $image['alt']];

                    if (isset($image['new_image'])) {
                        $uploadedImage = $request->file("brands_section.brands.{$brand['id']}.images.{$index}.new_image");
                        if ($uploadedImage) {
                            $path = $uploadedImage->store('public/uploads/brands');
                            $imageData['src'] = Storage::url($path);
                        }
                    } else {
                        $imageData['src'] = $image['src'];
                    }

                    $brandData['images'][] = $imageData;
                }

                $brandsContent['brands'][] = $brandData;
            }

            PageSection::updateContent('brands_section', $brandsContent);
        }

        return redirect()->route('admin.home.edit')
            ->with('success', 'Home page sections updated successfully.');
    }

    public function deleteHeroSlide($index)
    {
        $content = PageSection::getContent('hero_section');
        
        if (isset($content['hero_section']['slides'][$index])) {
            $slide = $content['hero_section']['slides'][$index];
            
            // Delete the images
            if (isset($slide['background_image'])) {
                Storage::delete(str_replace('/storage/', 'public/', $slide['background_image']));
            }
            if (isset($slide['shape_image'])) {
                Storage::delete(str_replace('/storage/', 'public/', $slide['shape_image']));
            }

            // Remove the slide
            unset($content['hero_section']['slides'][$index]);
            $content['hero_section']['slides'] = array_values($content['hero_section']['slides']);

            PageSection::updateContent('hero_section', $content);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
