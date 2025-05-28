<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'en.title' => 'required|string|max:255',
            'en.description' => 'required|string',
            'ar.title' => 'required|string|max:255',
            'ar.description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $service = new Service();
        $service->active = $request->boolean('active', true);
        $service->order = $request->input('order', 0);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'service_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/services'), $filename);
            $service->image = 'uploads/services/' . $filename;
        }

        $service->save();

        // Save translations
        foreach (['en', 'ar'] as $locale) {
            $service->translateOrNew($locale)->title = $request->input("$locale.title");
            $service->translateOrNew($locale)->description = $request->input("$locale.description");
            $service->translateOrNew($locale)->slug = Str::slug($request->input("$locale.title"));
        }

        $service->save();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'en.title' => 'required|string|max:255',
            'en.description' => 'required|string',
            'ar.title' => 'required|string|max:255',
            'ar.description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $service->active = $request->boolean('active', true);
        $service->order = $request->input('order', 0);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            $image = $request->file('image');
            $filename = 'service_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/services'), $filename);
            $service->image = 'uploads/services/' . $filename;
        }

        // Update translations
        foreach (['en', 'ar'] as $locale) {
            $service->translateOrNew($locale)->title = $request->input("$locale.title");
            $service->translateOrNew($locale)->description = $request->input("$locale.description");
            $service->translateOrNew($locale)->slug = Str::slug($request->input("$locale.title"));
        }

        $service->save();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
