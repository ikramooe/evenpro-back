<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
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

        return view('about', compact('sections'));
    }
}
