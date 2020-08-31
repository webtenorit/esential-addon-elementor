<?php
namespace Essential_Addons_Elementor\Extensions;

if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use Essential_Addons_Elementor\Traits\Shared;

class Table_of_Content
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
            'eael_ext_table_of_content_section',
            [
                'label' => __('<i class="eaicon-logo"></i> Table of Contents', 'px-elements'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content',
            [
                'label' => __('Enable Table of Contents', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
            ]
        );

        $element->add_control(
            'eael_ext_toc_has_global',
            [
                'type' => Controls_Manager::HIDDEN,
                'default' => isset($global_settings['eael_ext_table_of_content']['enabled']) ? true : false,
            ]
        );

        if (isset($global_settings['eael_ext_table_of_content']['enabled']) && ($global_settings['eael_ext_table_of_content']['enabled'] == true) && get_the_ID() != $global_settings['eael_ext_table_of_content']['post_id'] && get_post_status($global_settings['eael_ext_table_of_content']['post_id']) == 'publish') {
            $element->add_control(
                'eael_ext_toc_global_warning_text',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => __('You can modify the Global Table of Contents by <strong><a href="' . get_bloginfo('url') . '/wp-admin/post.php?post=' . $global_settings['eael_ext_table_of_content']['post_id'] . '&action=elementor">Clicking Here</a></strong>', 'px-elements'),
                    'content_classes' => 'eael-warning',
                    'condition' => [
                        'eael_ext_table_of_content' => 'yes',
                    ],
                ]
            );
        } else {
            $element->add_control(
                'eael_ext_toc_global',
                [
                    'label' => __('Enable Table of Contents Globally', 'px-elements'),
                    'description' => __('Enabling this option will effect on entire site.', 'px-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'no',
                    'label_on' => __('Yes', 'px-elements'),
                    'label_off' => __('No', 'px-elements'),
                    'return_value' => 'yes',
                    'condition' => [
                        'eael_ext_table_of_content' => 'yes',
                    ],
                ]
            );

            $element->add_control(
                'eael_ext_toc_global_display_condition',
                [
                    'label' => __('Display On', 'px-elements'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'all',
                    'options' => [
                        'posts' => __('All Posts', 'px-elements'),
                        'pages' => __('All Pages', 'px-elements'),
                        'all' => __('All Posts & Pages', 'px-elements'),
                    ],
                    'condition' => [
                        'eael_ext_table_of_content' => 'yes',
                        'eael_ext_toc_global' => 'yes',
                    ],
                ]
            );
        }

        $element->add_control(
            'eael_ext_toc_title',
            [
                'label' => __('Title', 'px-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Table of Contents', 'px-elements'),
                'label_block' => false,
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->start_controls_tabs( 'eael_toc_include_exclude', [ 'separator' => 'before' ] );

        $element->start_controls_tab( 'eael_toc_include',
            [
                'label' => __( 'Include', 'px-elements' ),
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ]
            ]
        );

        $element->add_control(
            'eael_ext_toc_supported_heading_tag',
            [
                'label' => __('Supported Heading Tag', 'px-elements'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'label_block' => true,
                'default' => [
                    'h2',
                    'h3',
                    'h4',
                    'h5',
                    'h6',
                ],
                'options' => [
                    'h1' => __('H1', 'px-elements'),
                    'h2' => __('H2', 'px-elements'),
                    'h3' => __('H3', 'px-elements'),
                    'h4' => __('H4', 'px-elements'),
                    'h5' => __('H5', 'px-elements'),
                    'h6' => __('H6', 'px-elements'),
                ],
                'render_type' => 'none',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_content_selector',
            [
                'label' => __('Content Selector', 'px-elements'),
                'type' => Controls_Manager::TEXT,
                'description' => __('Which content are searched for heading tag, Provide unique selector to replace default selector', 'px-elements'),
                'label_block' => false,
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->end_controls_tab(); // include

        $element->start_controls_tab( 'eael_toc_exclude',
            [
                'label' => __( 'Exclude', 'px-elements' ),
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ]
            ]
        );

        $element->add_control(
            'eael_toc_exclude_selector',
            [
                'label' => __( 'Exclude By Selector', 'px-elements' ),
                'type' => Controls_Manager::TEXT,
                'description' => __( 'CSS selectors, in a comma-separated list', 'px-elements' ),
                'default' => '',
                'label_block' => true,
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ]
            ]
        );

        $element->end_controls_tab(); // exclude

        $element->end_controls_tabs(); // include_exclude_tags

        $element->add_control(
            'eael_ext_toc_collapse_sub_heading',
            [
                'label' => __('Keep Sub Heading Collapsed', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_use_title_in_url',
            [
                'label' => __('Heading Text in URL', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_word_wrap',
            [
                'label' => __('Stop Word Wrap', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_auto_collapse',
            [
                'label' => __('TOC Auto Collapse', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_hide_in_mobile',
            [
                'label' => __('Hide TOC in mobile', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_sticky_scroll',
            [
                'label' => __('Sticky Scroll Effect', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 2000,
                        'step' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200,
                ],
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_sticky_offset',
            [
                'label' => __('Sticky Top Offset', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 2000,
                        'step' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc.eael-sticky' => 'top: {{SIZE}}{{UNIT}} !important;',
                ],
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_sticky_z_index',
            [
                'label' => __('Z Index', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 9999,
                        'step' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 9999,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc' => 'z-index: {{SIZE}}',
                ],
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_ad_warning_text',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => __('Need more information about TOC <strong><a href="https://essential-addons.com/elementor/docs/table-of-content/" class="eael-btn" target="_blank">Visit documentation</a></strong>', 'px-elements'),
                'content_classes' => 'eael-warning',
                'separator' => 'before',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->end_controls_section();

        $element->start_controls_section(
            'eael_ext_toc_main',
            [
                'label' => esc_html__('EA TOC', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_width',
            [
                'label' => __('Width', 'px-elements'),
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
                    'size' => 300,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_position',
            [
                'label' => __('Position', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'label_block' => false,
                'options' => [
                    'left' => __('Left', 'px-elements'),
                    'right' => __('Right', 'px-elements'),
                ],
                'separator' => 'before',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_list_icon',
            [
                'label' => __('List Icon', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'bullet',
                'label_block' => false,
                'options' => [
                    'bullet' => __('Bullet', 'px-elements'),
                    'number' => __('Number', 'px-elements'),
                ],
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_box_list_bullet_size',
            [
                'label' => __('Bullet Size', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 8,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body ul.eael-toc-list.eael-toc-bullet li:before' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'eael_ext_toc_list_icon' => 'bullet',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_box_list_top_position',
            [
                'label' => __('Top Position', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -50,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => -2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body ul.eael-toc-list.eael-toc-bullet li:before' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'eael_ext_toc_list_icon' => 'bullet',
                ],
            ]
        );

        $element->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'eael_ext_toc_border',
                'label' => __('Border', 'px-elements'),
                'selector' => '{{WRAPPER}} .eael-toc,{{WRAPPER}} button.eael-toc-button',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'eael_ext_toc_table_box_shadow',
                'label' => __('Box Shadow', 'px-elements'),
                'selector' => '{{WRAPPER}} .eael-toc:not(.collapsed)',
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_box_border_radius',
            [
                'label' => __('Border Radius', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc:not(.eael-toc-right)' => 'border-top-right-radius: {{SIZE}}{{UNIT}}; border-bottom-right-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eael-toc:not(.eael-toc-right) .eael-toc-header' => 'border-top-right-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eael-toc:not(.eael-toc-right) .eael-toc-body' => 'border-bottom-right-radius: {{SIZE}}{{UNIT}};',

                    '{{WRAPPER}} .eael-toc.eael-toc-right' => 'border-top-left-radius: {{SIZE}}{{UNIT}}; border-bottom-left-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eael-toc.eael-toc-right .eael-toc-header' => 'border-top-left-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eael-toc.eael-toc-right .eael-toc-body' => 'border-bottom-left-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->end_controls_section();

        $element->start_controls_section(
            'eael_ext_table_of_content_header_style',
            [
                'label' => esc_html__('EA TOC Header', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_header_bg',
            [
                'label' => __('Background Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff7d50',
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-header' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc.collapsed .eael-toc-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_header_text_color',
            [
                'label' => __('Text Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-header .eael-toc-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc.collapsed .eael-toc-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'eael_ext_table_of_content_header_typography',
                'selector' => '{{WRAPPER}} .eael-toc-header .eael-toc-title,{{WRAPPER}} .eael-toc.collapsed .eael-toc-button',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $element->add_control(
            'eael_ext_toc_header_padding',
            [
                'label' => esc_html__('Padding', 'px-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_header_collapse_close_button',
            [
                'label' => __('Collapse', 'px-elements'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_header_icon',
            [
                'label' => __('Icon', 'px-elements'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-list',
                    'library' => 'fa-solid',
                ],
                'fa4compatibility' => 'icon',
            ]
        );

        $element->add_control(
            'eael_ext_toc_close_button_text_style',
            [
                'label' => __('Text Orientation', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'top_to_bottom',
                'options' => [
                    'top_to_bottom' => __('Top to Bottom', 'px-elements'),
                    'bottom_to_top' => __('Bottom to Top', 'px-elements'),
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_close_button',
            [
                'label' => __('Close Button', 'px-elements'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_close_button_icon_size',
            [
                'label'      => __('Icon Size', 'px-elements'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eael-toc .eael-toc-close' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_close_button_size',
            [
                'label'      => __('Button Size', 'px-elements'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eael-toc .eael-toc-close' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_close_button_line_height',
            [
                'label'      => __('Line Height', 'px-elements'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eael-toc .eael-toc-close' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_close_button_bg',
            [
                'label' => __('Background Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-close' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_close_button_text_color',
            [
                'label' => __('Close Button Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff7d50',
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-close' => 'color: {{VALUE}}',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_close_button_border_radius',
            [
                'label'      => __('Border Radius', 'px-elements'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eael-toc .eael-toc-close' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $element->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'eael_ext_table_of_content_close_button_box_shadow',
                'label'    => __('Box Shadow', 'px-elements'),
                'selector' => '{{WRAPPER}} .eael-toc .eael-toc-close',
            ]
        );

        $element->end_controls_section();

        $element->start_controls_section(
            'eael_ext_table_of_content_list_style_section',
            [
                'label' => esc_html__('EA TOC Body', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_body_bg',
            [
                'label' => __('Background Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff6f3',
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body' => 'background-color: {{VALUE}}',
                ],

            ]
        );

        $element->add_control(
            'eael_ext_toc_body_padding',
            [
                'label' => esc_html__('Padding', 'px-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_list_style_separator',
            [
                'label' => __('List', 'px-elements'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_list_style',
            [
                'label' => __('Indicator Style', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None', 'px-elements'),
                    'arrow' => __('Arrow', 'px-elements'),
                    'bar' => __('Bar', 'px-elements'),
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_indicator_size',
            [
                'label' => __('Indicator Size', 'px-elements'),
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
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-list-bar li.eael-highlight-active > a:after' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'eael_ext_table_of_content_list_style' => 'bar',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_indicator_position',
            [
                'label' => __('Indicator Position', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-list-arrow li.eael-highlight-active > a:before' => 'margin-top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-list-bar li.eael-highlight-active > a:after' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'eael_ext_table_of_content_list_style!' => 'none',
                ],
            ]
        );

        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'eael_ext_table_of_content_list_typography_normal',
                'selector' => '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $element->start_controls_tabs('ea_toc_list_style');

        $element->start_controls_tab('normal',
            [
                'label' => __('Normal', 'px-elements'),
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_list_text_color',
            [
                'label' => __('Text Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#707070',
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-number li:before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-bullet li:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $element->end_controls_tab();

        $element->start_controls_tab('hover',
            [
                'label' => __('Hover', 'px-elements'),
            ]
        );

        $element->add_control(
            'eael_ext_table_of_list_hover_color',
            [
                'label' => __('Text Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff7d50',
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-number li:hover:before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-bullet li:hover:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li:hover > a:before' => 'border-bottom-color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li:hover > a:after' => 'background-color: {{VALUE}}',
                ],

            ]
        );

        $element->end_controls_tab(); // hover

        $element->start_controls_tab('active',
            [
                'label' => __('Active', 'px-elements'),
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_list_text_color_active',
            [
                'label' => __('Text Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff7d50',
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li.eael-highlight-active' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-number li.eael-highlight-active:before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-bullet li.eael-highlight-active:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li.eael-highlight-active > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li.eael-highlight-active > a:before' => 'border-bottom-color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li.eael-highlight-active > a:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li.eael-highlight-parent' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-number li.eael-highlight-parent:before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list.eael-toc-bullet li.eael-highlight-parent:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li.eael-highlight-parent > a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $element->end_controls_tab(); // active
        $element->end_controls_tabs();

        $element->add_control(
            'eael_ext_toc_top_level_space',
            [
                'label' => __('Top Level Space', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 8,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_toc_subitem_level_space',
            [
                'label' => __('Sub Item Space', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list li ul li' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'eael_ext_table_of_content' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_list_separator',
            [
                'label' => __('Separator', 'px-elements'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_list_separator_style',
            [
                'label' => __('Style', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'dashed',
                'options' => [
                    'solid' => __('Solid', 'px-elements'),
                    'dashed' => __('Dashed', 'px-elements'),
                    'dotted' => __('Dotted', 'px-elements'),
                    'none' => __('None', 'px-elements'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list > li:not(:last-child)' => 'border-bottom: 0.5px {{VALUE}}',
                ],
            ]
        );

        $element->add_control(
            'eael_ext_table_of_content_list_separator_color',
            [
                'label' => __('Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eael-toc .eael-toc-body .eael-toc-list > li:not(:last-child)' => 'border-bottom-color: {{VALUE}}',
                ],
                'default' => '#c6c4cf',
                'condition' => [
                    'eael_ext_table_of_content_list_separator_style!' => 'none',
                ],
            ]
        );

        $element->end_controls_section();
    }
}
