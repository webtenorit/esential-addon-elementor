<?php

$config = [
    'elements' => [
        'post-grid' => [
            'class' => '\Essential_Addons_Elementor\Elements\Post_Grid',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/load-more.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/post-grid.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/product-grid.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/imagesloaded/imagesloaded.pkgd.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/isotope/isotope.pkgd.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/load-more.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/post-grid.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'post-timeline' => [
            'class' => '\Essential_Addons_Elementor\Elements\Post_Timeline',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/load-more.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/post-timeline.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/load-more.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'creative-btn' => [
            'class' => '\Essential_Addons_Elementor\Elements\Creative_Button',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/creative-btn.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'count-down' => [
            'class' => '\Essential_Addons_Elementor\Elements\Countdown',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/count-down.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/countdown/countdown.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/count-down.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'team-members' => [
            'class' => '\Essential_Addons_Elementor\Elements\Team_Member',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/team-members.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'team-member-carousel'   => [
            'class'      => '\Essential_Addons_Elementor\Elements\Team_Member_Carousel',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/team-member-carousel.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/team-member-carousel.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'testimonials' => [
            'class' => '\Essential_Addons_Elementor\Elements\Testimonial',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/testimonials.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'testimonial-slider'     => [
            'class'      => '\Essential_Addons_Elementor\Elements\Testimonial_Slider',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/testimonial-slider.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/testimonial-slider.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'toggle'                 => [
            'class'      => '\Essential_Addons_Elementor\Elements\Toggle',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/toggle.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/toggle.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'content-timeline'       => [
            'class'      => '\Essential_Addons_Elementor\Elements\Content_Timeline',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/load-more.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/content-timeline.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/vertical-timeline/vertical-timeline.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/content-timeline.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'dynamic-filter-gallery' => [
            'class'      => '\Essential_Addons_Elementor\Elements\Dynamic_Filterable_Gallery',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/load-more.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/filterable-gallery.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/dynamic-filter-gallery.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/imagesloaded/imagesloaded.pkgd.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/isotope/isotope.pkgd.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/magnific-popup/jquery.magnific-popup.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/jquery.resize/jquery.resize.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/load-more.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/dynamic-filter-gallery.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'post-carousel'          => [
            'class'      => '\Essential_Addons_Elementor\Elements\Post_Carousel',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/post-grid.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/post-carousel.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/post-carousel.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'event-calendar' => [
            'class' => '\Essential_Addons_Elementor\Elements\Event_Calendar',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/full-calendar/calendar-main.min.css',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/full-calendar/daygrid.min.css',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/full-calendar/timegrid.min.css',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/full-calendar/listgrid.min.css',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/event-calendar.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/full-calendar/locales-all.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/moment/moment.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/full-calendar/calendar-main.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/full-calendar/daygrid.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/full-calendar/timegrid.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/full-calendar/listgrid.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/event-calendar.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'interactive-promo'      => [
            'class'      => '\Essential_Addons_Elementor\Elements\Interactive_Promo',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/interactive-promo.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'lightbox'               => [
            'class'      => '\Essential_Addons_Elementor\Elements\Lightbox',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/magnific-popup/magnific-popup.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/lightbox.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/magnific-popup/jquery.magnific-popup.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/jquery.cookie/jquery.cookie.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/lightbox.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'logo-carousel'          => [
            'class'      => '\Essential_Addons_Elementor\Elements\Logo_Carousel',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/logo-carousel.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/logo-carousel.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'counter'                => [
            'class'      => '\Essential_Addons_Elementor\Elements\Counter',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/odometer/odometer-theme-default.min.css',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/counter.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/waypoint/waypoints.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/odometer/odometer.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/counter.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'one-page-navigation'    => [
            'class'      => '\Essential_Addons_Elementor\Elements\One_Page_Navigation',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/one-page-navigation.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/one-page-navigation.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'image-scroller'         => [
            'class'      => '\Essential_Addons_Elementor\Elements\Image_Scroller',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/image-scroller.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/image-scroller.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'image-hotspots'         => [
            'class'      => '\Essential_Addons_Elementor\Elements\Image_Hot_Spots',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/image-hotspots.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/tipso/tipso.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/image-hotspots.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'mailchimp'              => [
            'class'      => '\Essential_Addons_Elementor\Elements\Mailchimp',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/mailchimp.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/mailchimp.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'one-page-navigation'    => [
            'class'      => '\Essential_Addons_Elementor\Elements\One_Page_Navigation',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/one-page-navigation.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/one-page-navigation.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'twitter-feed-carousel'  => [
            'class'      => '\Essential_Addons_Elementor\Elements\Twitter_Feed_Carousel',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/twitter-feed.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/twitter-feed-carousel.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'info-box' => [
            'class' => '\Essential_Addons_Elementor\Elements\Info_Box',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/info-box.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'flip-box' => [
            'class' => '\Essential_Addons_Elementor\Elements\Flip_Box',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/flip-box.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'dual-header' => [
            'class' => '\Essential_Addons_Elementor\Elements\Dual_Color_Header',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/dual-header.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'price-table' => [
            'class' => '\Essential_Addons_Elementor\Elements\Pricing_Table',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/tooltipster/tooltipster.bundle.min.css',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/price-table.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/tooltipster/tooltipster.bundle.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/price-table.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'twitter-feed' => [
            'class' => '\Essential_Addons_Elementor\Elements\Twitter_Feed',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/twitter-feed.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/imagesloaded/imagesloaded.pkgd.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/isotope/isotope.pkgd.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/twitter-feed.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'advanced-data-table' => [
            'class' => '\Essential_Addons_Elementor\Elements\Advanced_Data_Table',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-edit/quill/quill.bubble.min.css',
                        'type' => 'lib',
                        'context' => 'edit',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/advanced-data-table.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-edit/quill/quill.min.js',
                        'type' => 'lib',
                        'context' => 'edit',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/advanced-data-table.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/edit/advanced-data-table.min.js',
                        'type' => 'self',
                        'context' => 'edit',
                    ],
                ],
            ],
        ],
        'data-table' => [
            'class' => '\Essential_Addons_Elementor\Elements\Data_Table',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/data-table.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/data-table.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'filter-gallery' => [
            'class' => '\Essential_Addons_Elementor\Elements\Filterable_Gallery',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/load-more.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/magnific-popup/magnific-popup.min.css',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/filterable-gallery.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/imagesloaded/imagesloaded.pkgd.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/isotope/isotope.pkgd.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/magnific-popup/jquery.magnific-popup.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/filterable-gallery.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'image-accordion' => [
            'class' => '\Essential_Addons_Elementor\Elements\Image_Accordion',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/image-accordion.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/image-accordion.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'tooltip' => [
            'class' => '\Essential_Addons_Elementor\Elements\Tooltip',
            'dependency' => [
                'css' => [

                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/tooltip.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'adv-accordion' => [
            'class' => '\Essential_Addons_Elementor\Elements\Adv_Accordion',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/advanced-accordion.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/advanced-accordion.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'adv-tabs' => [
            'class' => '\Essential_Addons_Elementor\Elements\Adv_Tabs',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/advanced-tabs.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/advanced-tabs.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'progress-bar' => [
            'class' => '\Essential_Addons_Elementor\Elements\Progress_Bar',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/progress-bar.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/inview/inview.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/progress-bar.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'feature-list' => [
            'class' => '\Essential_Addons_Elementor\Elements\Feature_List',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/feature-list.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'product-grid' => [
            'class' => '\Essential_Addons_Elementor\Elements\Product_Grid',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/load-more.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/product-grid.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/load-more.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'contact-form-7' => [
            'class' => '\Essential_Addons_Elementor\Elements\Contact_Form_7',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/contact-form-7.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'weforms' => [
            'class' => '\Essential_Addons_Elementor\Elements\WeForms',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/weforms.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'ninja-form' => [
            'class' => '\Essential_Addons_Elementor\Elements\NinjaForms',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/ninja-form.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'gravity-form' => [
            'class' => '\Essential_Addons_Elementor\Elements\GravityForms',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/gravity-form.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'caldera-form' => [
            'class' => '\Essential_Addons_Elementor\Elements\Caldera_Forms',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/caldera-form.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'wpforms' => [
            'class' => '\Essential_Addons_Elementor\Elements\WpForms',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/wpforms.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'betterdocs-category-grid' => [
            'class' => '\Essential_Addons_Elementor\Elements\Betterdocs_Category_Grid',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/betterdocs-category-grid.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/isotope/isotope.pkgd.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/betterdocs-category-grid.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'betterdocs-category-box' => [
            'class' => '\Essential_Addons_Elementor\Elements\Betterdocs_Category_Box',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/betterdocs-category-box.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'betterdocs-search-form' => [
            'class' => '\Essential_Addons_Elementor\Elements\Betterdocs_Search_Form',
        ],
        'sticky-video' => [
            'class' => '\Essential_Addons_Elementor\Elements\Sticky_Video',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/plyr/plyr.min.css',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/sticky-video.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/plyr/plyr.min.js',
                        'type' => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/sticky-video.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'embedpress' => [
            'class' => '\Essential_Addons_Elementor\Elements\EmbedPress',
            'condition' => [
                'class_exists',
                '\EmbedPress\Elementor\Embedpress_Elementor_Integration',
                true,
            ],
        ],
        'woo-checkout' => [
            'class' => '\Essential_Addons_Elementor\Elements\Woo_Checkout',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/woo-checkout.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/woo-checkout.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'woo-collections'        => [
            'class'      => '\Essential_Addons_Elementor\Elements\Woo_Collections',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/woo-collections.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'login-register' => [
            'class' => '\Essential_Addons_Elementor\Elements\Login_Register',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/login-register.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/login-register.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'woocommerce-review' => [
            'class' => '\Essential_Addons_Elementor\Elements\Woocommerce_Review',
            'condition' => [
                'class_exists',
                '\ReviewX\Elementor\Elements\Review',
                true,
            ],
        ],
        'offcanvas'              => [
            'class'      => '\Essential_Addons_Elementor\Elements\Offcanvas',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/offcanvas.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/offcanvas/eael.offcanvas.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/offcanvas.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'advanced-menu'          => [
            'class'      => '\Essential_Addons_Elementor\Elements\Advanced_Menu',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/advanced-menu.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/advanced-menu.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'img-comparison'         => [
            'class'      => '\Essential_Addons_Elementor\Elements\Image_Comparison',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/twentytwenty/twentytwenty.min.css',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/img-comparison.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/imagesloaded/imagesloaded.pkgd.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/jquery.event.move/jquery.event.move.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/twentytwenty/jquery.twentytwenty.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/img-comparison.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'instagram-gallery'      => [
            'class'      => '\Essential_Addons_Elementor\Elements\Instagram_Feed',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/load-more.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/instagram-gallery.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/imagesloaded/imagesloaded.pkgd.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/isotope/isotope.pkgd.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/instagram-gallery.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'static-product'         => [
            'class'      => '\Essential_Addons_Elementor\Elements\Static_Product',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/post-block.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/post-block-overlay.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/static-product.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'post-list'              => [
            'class'      => '\Essential_Addons_Elementor\Elements\Post_List',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/post-list.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/ajax-post-search.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/post-list.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'adv-google-map'         => [
            'class'      => '\Essential_Addons_Elementor\Elements\Google_Map',
            'dependency' => [
                'js' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/gmap/gmap.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/adv-google-map.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/adv-google-map.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'price-menu'             => [
            'class'      => '\Essential_Addons_Elementor\Elements\Price_Menu',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/price-menu.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'one-page-navigation'    => [
            'class'      => '\Essential_Addons_Elementor\Elements\One_Page_Navigation',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/one-page-navigation.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/one-page-navigation.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
    ],
    'extensions' => [
        'eael-promotion' => [
            'class' => '\Essential_Addons_Elementor\Extensions\Promotion',
        ],
        'eael-custom-js' => [
            'class' => '\Essential_Addons_Elementor\Extensions\Custom_JS',
        ],
        'eael-reading-progress' => [
            'class' => '\Essential_Addons_Elementor\Extensions\Reading_Progress',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/reading-progress.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/reading-progress.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'eael-table-of-content' => [
            'class' => '\Essential_Addons_Elementor\Extensions\Table_of_Content',
            'dependency' => [
                'css' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/table-of-content.min.css',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
                'js' => [
                    [
                        'file' => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/table-of-content.min.js',
                        'type' => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'eael-post-duplicator' => [
            'class' => '\Essential_Addons_Elementor\Extensions\Post_Duplicator',
        ],
        'section-particles'       => [
            'class'      => '\Essential_Addons_Elementor\Extensions\EAEL_Particle_Section',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/section-particles.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/particles/particles.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/section-particles.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'section-parallax'        => [
            'class'      => '\Essential_Addons_Elementor\Extensions\EAEL_Parallax_Section',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/view/section-parallax.min.css',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/TweenMax/TweenMax.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/jarallax/jarallax.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/jquery-parallax/jquery-parallax.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/section-parallax.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
        'eael-tooltip-section'    => [
            'class'      => '\Essential_Addons_Elementor\Extensions\EAEL_Tooltip_Section',
            'dependency' => [
                'css' => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/css/lib-view/tippy/tippy.min.css',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                ],
                'js'  => [
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/popper/popper.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/lib-view/tippy/tippy.min.js',
                        'type'    => 'lib',
                        'context' => 'view',
                    ],
                    [
                        'file'    => EAEL_PLUGIN_PATH . 'assets/front-end/js/view/advanced-tooltip.min.js',
                        'type'    => 'self',
                        'context' => 'view',
                    ],
                ],
            ],
        ],
    ],
];

return $config;
