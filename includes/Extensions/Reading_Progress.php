<?php
namespace Essential_Addons_Elementor\Extensions;

if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use Essential_Addons_Elementor\Traits\Shared;

class Reading_Progress
{

    public function __construct()
    {
        add_action('elementor/documents/register_controls', [$this, 'register_controls'], 10);
    }

    public function register_controls($element)
    {

        if(Shared::is_prevent_load_extension(get_the_ID())){
            return false;
        }

        $global_settings = get_option('eael_global_settings');

        $element->start_controls_section(
            'eael_ext_reading_progress_section',
            [
                'label' => __('<i class="eaicon-logo"></i> Reading Progress Bar', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'eael_ext_reading_progress',
            [
                'label' => __('Enable Reading Progress Bar', 'pixerex-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', 'pixerex-elements'),
                'label_off' => __('No', 'pixerex-elements'),
                'return_value' => 'yes',
            ]
        );

        $element->add_control(
            'eael_ext_reading_progress_has_global',
            [
                'label' => __('Enabled Globally?', 'pixerex-elements'),
                'type' => \Elementor\Controls_Manager::HIDDEN,
                'default' => isset($global_settings['reading_progress']['enabled']) ? true : false,
            ]
        );

        if (isset($global_settings['reading_progress']['enabled']) && ($global_settings['reading_progress']['enabled'] == true) && get_the_ID() != $global_settings['reading_progress']['post_id'] && get_post_status($global_settings['reading_progress']['post_id']) == 'publish') {
            $element->add_control(
                'eael_global_warning_text',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => __('You can modify the Global Reading Progress Bar by <strong><a href="' . get_bloginfo('url') . '/wp-admin/post.php?post=' . $global_settings['reading_progress']['post_id'] . '&action=elementor">Clicking Here</a></strong>', 'pixerex-elements'),
                    'content_classes' => 'eael-warning',
                    'separator' => 'before',
                    'condition' => [
                        'eael_ext_reading_progress' => 'yes',
                    ],
                ]
            );
        } else {
            $element->add_control(
                'eael_ext_reading_progress_global',
                [
                    'label' => __('Enable Reading Progress Bar Globally', 'pixerex-elements'),
                    'description' => __('Enabling this option will effect on entire site.', 'pixerex-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'no',
                    'label_on' => __('Yes', 'pixerex-elements'),
                    'label_off' => __('No', 'pixerex-elements'),
                    'return_value' => 'yes',
                    'separator' => 'before',
                    'condition' => [
                        'eael_ext_reading_progress' => 'yes',
                    ],
                ]
            );

            $element->add_control(
                'eael_ext_reading_progress_global_display_condition',
                [
                    'label' => __('Display On', 'pixerex-elements'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'all',
                    'options' => [
                        'posts' => __('All Posts', 'pixerex-elements'),
                        'pages' => __('All Pages', 'pixerex-elements'),
                        'all' => __('All Posts & Pages', 'pixerex-elements'),
                    ],
                    'condition' => [
                        'eael_ext_reading_progress' => 'yes',
                        'eael_ext_reading_progress_global' => 'yes',
                    ],
                    'separator' => 'before',
                ]
            );
        }

        $element->add_control(
            'eael_ext_reading_progress_position',
            [
                'label' => esc_html__('Position', 'pixerex-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'label_block' => false,
                'options' => [
                    'top' => esc_html__('Top', 'pixerex-elements'),
                    'bottom' => esc_html__('Bottom', 'pixerex-elements'),
                ],
                'separator' => 'before',
                'condition' => [
                    'eael_ext_reading_progress' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_reading_progress_height',
            [
                'label' => __('Height', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '.eael-reading-progress-wrap .eael-reading-progress' => 'height: {{SIZE}}{{UNIT}}',
                    '.eael-reading-progress-wrap .eael-reading-progress .eael-reading-progress-fill' => 'height: {{SIZE}}{{UNIT}}',
                ],
                'separator' => 'before',
                'condition' => [
                    'eael_ext_reading_progress' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_reading_progress_bg_color',
            [
                'label' => __('Background Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '.eael-reading-progress' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'before',
                'condition' => [
                    'eael_ext_reading_progress' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_reading_progress_fill_color',
            [
                'label' => __('Fill Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#1fd18e',
                'selectors' => [
                    '.eael-reading-progress-wrap .eael-reading-progress .eael-reading-progress-fill' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'before',
                'condition' => [
                    'eael_ext_reading_progress' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_reading_progress_animation_speed',
            [
                'label' => __('Animation Speed', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '.eael-reading-progress-wrap .eael-reading-progress .eael-reading-progress-fill' => 'transition: width {{SIZE}}ms ease;',
                ],
                'separator' => 'before',
                'condition' => [
                    'eael_ext_reading_progress' => 'yes',
                ],
            ]
        );

        $element->end_controls_section();
    }
}
