<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class PageSectionsSeeder extends Seeder
{
    public function run()
    {
        // Hero Section
        $heroSection = [
            'hero_section' => [
                'slides' => [
                    [
                        'background_image' => 'assets/img/hero/event-expo1.jpg',
                        'shape_image' => 'assets/img/image.webp',
                        'texts' => [
                            'en' => [
                                'subtitle' => 'Welcome to EvenPro Expo',
                                'title' => 'Excellence at the service of your events',
                                'button_text' => 'Contact Us',
                                'button_link' => 'contact.html'
                            ],
                            'ar' => [
                                'subtitle' => 'مرحبًا بكم في إيفين برو إكسبو',
                                'title' => 'التميز في خدمة فعالياتكم',
                                'button_text' => 'اتصل بنا',
                                'button_link' => 'contact.html'
                            ]
                        ]
                    ],
                    [
                        'background_image' => 'assets/img/hero/event-expo2.jpg',
                        'shape_image' => 'assets/img/image.webp',
                        'texts' => [
                            'en' => [
                                'subtitle' => 'Welcome to EvenPro Expo',
                                'title' => 'Excellence at the service of your events',
                                'button_text' => 'Contact Us',
                                'button_link' => 'contact.html'
                            ],
                            'ar' => [
                                'subtitle' => 'مرحبًا بكم في إيفين برو إكسبو',
                                'title' => 'التميز في خدمة فعالياتكم',
                                'button_text' => 'اتصل بنا',
                                'button_link' => 'contact.html'
                            ]
                        ]
                    ],
                    [
                        'background_image' => 'assets/img/hero/event-expo3.jpg',
                        'shape_image' => 'assets/img/image.webp',
                        'texts' => [
                            'en' => [
                                'subtitle' => 'Welcome to EvenPro Expo',
                                'title' => 'Excellence at the service of your events',
                                'button_text' => 'Contact Us',
                                'button_link' => 'contact.html'
                            ],
                            'ar' => [
                                'subtitle' => 'مرحبًا بكم في إيفين برو إكسبو',
                                'title' => 'التميز في خدمة فعالياتكم',
                                'button_text' => 'اتصل بنا',
                                'button_link' => 'contact.html'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        PageSection::updateContent('hero_section', $heroSection);

        // About Section
        $aboutSection = [
            'about_section' => [
                'image' => 'assets/img/about/about-2.png',
                'texts' => [
                    'en' => [
                        'subtitle' => 'About Us',
                        'title' => 'A Decade of Event Excellence',
                        'description' => 'Since its inception, EvenPro Expo has been supporting businesses, institutions, and professionals in organizing their events. With a decade of experience, our agency has become a leading reference in the field.',
                        'experience' => [
                            'years' => '10+',
                            'text' => 'years of experience',
                            'details' => 'Recognized expertise in organizing large-scale professional events.'
                        ],
                        'points' => [
                            [
                                'icon' => 'flaticon-team',
                                'title' => 'Tailored Approach',
                                'description' => 'Each project is unique and receives special attention tailored to your needs.'
                            ],
                            [
                                'icon' => 'flaticon-creative-team',
                                'title' => 'Innovative Solutions',
                                'description' => 'Integration of innovative digital solutions for modern events.'
                            ]
                        ],
                        'button' => [
                            'text' => 'Learn More',
                            'link' => 'about.html'
                        ]
                    ],
                    'ar' => [
                        'subtitle' => 'من نحن',
                        'title' => 'عقد من التميز في الفعاليات',
                        'description' => 'منذ إنشائها، تدعم EvenPro Expo الشركات والمؤسسات والمهنيين في تنظيم فعالياتهم. بفضل عشر سنوات من الخبرة، أصبحت وكالتنا مرجعًا في هذا المجال.',
                        'experience' => [
                            'years' => '10+',
                            'text' => 'سنوات من الخبرة',
                            'details' => 'خبرة معترف بها في تنظيم الفعاليات المهنية واسعة النطاق.'
                        ],
                        'points' => [
                            [
                                'icon' => 'flaticon-team',
                                'title' => 'نهج مخصص',
                                'description' => 'كل مشروع فريد ويحظى بعناية خاصة تتوافق مع احتياجاتك.'
                            ],
                            [
                                'icon' => 'flaticon-creative-team',
                                'title' => 'حلول مبتكرة',
                                'description' => 'دمج الحلول الرقمية المبتكرة لتنظيم فعاليات عصرية.'
                            ]
                        ],
                        'button' => [
                            'text' => 'اعرف المزيد',
                            'link' => 'about.html'
                        ]
                    ]
                ]
            ]
        ];

        PageSection::updateContent('about_section', $aboutSection);

        // Choosing Section
        $choosingSection = [
            'choosing_section' => [
                'image' => 'assets/img/about/choosing-fl.jpg',
                'texts' => [
                    'en' => [
                        'subtitle' => 'Why Choose Us',
                        'title' => 'Our Unique Approach to Your Success',
                        'points' => [
                            [
                                'number' => '01',
                                'title' => 'Recognized Expertise',
                                'description' => 'Over 10 years of experience in organizing professional events, with a strong network of technical and logistical partners.'
                            ],
                            [
                                'number' => '02',
                                'title' => 'Tailored Solutions',
                                'description' => 'Each project benefits from a personalized approach, adapted to your specific goals and your target audience\'s expectations.'
                            ],
                            [
                                'number' => '03',
                                'title' => 'Digital Innovation',
                                'description' => 'Integration of innovative digital solutions to optimize participants\' experience: badges, agendas, networking platforms.'
                            ]
                        ]
                    ],
                    'ar' => [
                        'subtitle' => 'لماذا تختارنا',
                        'title' => 'نهجنا الفريد لنجاحك',
                        'points' => [
                            [
                                'number' => '01',
                                'title' => 'خبرة معترف بها',
                                'description' => 'أكثر من 10 سنوات من الخبرة في تنظيم الفعاليات المهنية، مع شبكة قوية من الشركاء الفنيين واللوجستيين.'
                            ],
                            [
                                'number' => '02',
                                'title' => 'حلول مخصصة',
                                'description' => 'يستفيد كل مشروع من نهج شخصي، يتناسب مع أهدافك المحددة وتوقعات جمهورك المستهدف.'
                            ],
                            [
                                'number' => '03',
                                'title' => 'الابتكار الرقمي',
                                'description' => 'دمج حلول رقمية مبتكرة لتحسين تجربة المشاركين: بطاقات التعريف، الجداول الزمنية، منصات التواصل.'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        PageSection::updateContent('choosing_section', $choosingSection);

        // Hire Section
        $hireSection = [
            'hire_section' => [
                'background_image' => 'assets/img/bg/hire-bg.jpg',
                'texts' => [
                    'fr' => [
                        'title' => 'Vous avez un projet d\'événement à organiser ?',
                        'button_text' => 'CONTACTEZ-NOUS',
                        'button_link' => 'contact.html'
                    ],
                    'en' => [
                        'title' => 'Do you have an event project to organize?',
                        'button_text' => 'CONTACT US',
                        'button_link' => 'contact.html'
                    ],
                    'ar' => [
                        'title' => 'هل لديك مشروع تنظيم حدث؟',
                        'button_text' => 'اتصل بنا',
                        'button_link' => 'contact.html'
                    ]
                ]
            ]
        ];

        PageSection::updateContent('hire_section', $hireSection);

        // Brands Section
        $brandsSection = [
            'brands' => [
                [
                    'id' => 1,
                    'links' => ['#', '#'],
                    'images' => [
                        ['src' => 'assets/img/brand/brand1.png', 'alt' => 'Brand 1 Logo'],
                        ['src' => 'assets/img/brand/brand1-wc.png', 'alt' => 'Brand 1 Logo White Contrast']
                    ]
                ],
                [
                    'id' => 2,
                    'links' => ['#', '#'],
                    'images' => [
                        ['src' => 'assets/img/brand/brand2.png', 'alt' => 'Brand 2 Logo'],
                        ['src' => 'assets/img/brand/brand2-wc.png', 'alt' => 'Brand 2 Logo White Contrast']
                    ]
                ],
                [
                    'id' => 3,
                    'links' => ['#', '#'],
                    'images' => [
                        ['src' => 'assets/img/brand/brand3.png', 'alt' => 'Brand 3 Logo'],
                        ['src' => 'assets/img/brand/brand3-wc.png', 'alt' => 'Brand 3 Logo White Contrast']
                    ]
                ],
                [
                    'id' => 4,
                    'links' => ['#', '#'],
                    'images' => [
                        ['src' => 'assets/img/brand/brand4.png', 'alt' => 'Brand 4 Logo'],
                        ['src' => 'assets/img/brand/brand4-wc.png', 'alt' => 'Brand 4 Logo White Contrast']
                    ]
                ],
                [
                    'id' => 5,
                    'links' => ['#', '#'],
                    'images' => [
                        ['src' => 'assets/img/brand/brand5.png', 'alt' => 'Brand 5 Logo'],
                        ['src' => 'assets/img/brand/brand5-wc.png', 'alt' => 'Brand 5 Logo White Contrast']
                    ]
                ]
            ]
        ];

        PageSection::updateContent('brands_section', $brandsSection);
    }
}
