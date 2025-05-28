<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    public function edit()
    {
        $sections = [
            'about_details_section' => PageSection::getContent('about_details_section', [
                'en' => [
                    'title' => 'Your Event Excellence Partner',
                    'subtitle' => 'Specialized in organizing professional trade shows and corporate events, we put our expertise at your service to create unique and memorable experiences.',
                    'box' => [
                        'heading' => 'A decade of excellence and innovation in the event industry',
                        'paragraphs' => [
                            'For over 10 years, EvenPro Expo has established itself as a major player in organizing professional events in France. Our unique expertise in designing and executing trade shows, congresses, and professional forums allows us to offer exceptional experiences to our clients.',
                            'Our experienced team combines creativity, rigor, and innovation to transform your projects into memorable events. We pay close attention to every detail, from strategic planning to technical execution, including communication and logistics.'
                        ],
                        'points' => [
                            [
                                'title' => 'Turnkey service',
                                'description' => 'From design to execution, we manage every aspect of your event.'
                            ],
                            [
                                'title' => 'Technical expertise',
                                'description' => 'An experienced team and cutting-edge technological solutions.'
                            ]
                        ]
                    ]
                ],
                'ar' => [
                    'title' => 'شريككم في التميز في مجال الفعاليات',
                    'subtitle' => 'متخصصون في تنظيم المعارض المهنية والفعاليات التجارية، نضع خبرتنا في خدمتكم لخلق تجارب فريدة ولا تُنسى.',
                    'box' => [
                        'heading' => 'عقد من التميز والابتكار في صناعة الفعاليات',
                        'paragraphs' => [
                            'على مدار أكثر من 10 سنوات، أصبحت EvenPro Expo لاعبًا رئيسيًا في تنظيم الفعاليات المهنية في فرنسا. تتيح لنا خبرتنا الفريدة في تصميم وتنفيذ المعارض والمؤتمرات والمنتديات المهنية تقديم تجارب استثنائية لعملائنا.',
                            'يجمع فريقنا ذو الخبرة بين الإبداع والدقة والابتكار لتحويل مشاريعكم إلى فعاليات لا تُنسى. نولي اهتمامًا خاصًا لكل تفصيل، من التخطيط الاستراتيجي إلى التنفيذ الفني، بالإضافة إلى التواصل واللوجستيات.'
                        ],
                        'points' => [
                            [
                                'title' => 'خدمة متكاملة',
                                'description' => 'من التصميم إلى التنفيذ، ندير جميع جوانب فعاليتكم.'
                            ],
                            [
                                'title' => 'خبرة تقنية',
                                'description' => 'فريق ذو خبرة وحلول تكنولوجية متطورة.'
                            ]
                        ]
                    ]
                ]
            ])
        ];

        return view('admin.about-sections.edit', compact('sections'));
    }

    public function update(Request $request)
    {
        if ($request->has('hero_section')) {
            $heroSection = $request->input('hero_section');
            
            if ($request->hasFile('hero_section.background_image')) {
                $heroSection['background_image'] = $request->file('hero_section.background_image')
                    ->store('public/about');
            }
            
            PageSection::updateOrCreate(
                ['name' => 'about_hero_section'],
                ['content' => $heroSection]
            );
        }

        if ($request->has('intro_section')) {
            PageSection::updateOrCreate(
                ['name' => 'about_intro_section'],
                ['content' => $request->input('intro_section')]
            );
        }

        if ($request->has('details_section')) {
            $detailsSection = $request->input('details_section');
            
            if ($request->hasFile('details_section.background_image')) {
                $detailsSection['background_image'] = $request->file('details_section.background_image')
                    ->store('public/about');
            }
            
            PageSection::updateOrCreate(
                ['name' => 'about_details_section'],
                ['content' => $detailsSection]
            );
        }

        return redirect()->back()->with('success', 'About page sections updated successfully.');
    }
}
