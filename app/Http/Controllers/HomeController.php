<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sections = [
            'hero_section' => PageSection::getContent('hero_section'),
            'about_section' => PageSection::getContent('about_section'),
            'choosing_section' => PageSection::getContent('choosing_section'),
            'hire_section' => PageSection::getContent('hire_section'),
            'brands_section' => PageSection::getContent('brands_section'),
        ];
      

        return view('welcome', compact('sections'));
    }
}
