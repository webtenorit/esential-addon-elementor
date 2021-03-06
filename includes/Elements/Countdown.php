<?php
namespace Essential_Addons_Elementor\Elements;

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Plugin;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;

class Countdown extends Widget_Base {
    use \Essential_Addons_Elementor\Traits\Helper;

    public function get_name() {
        return 'eael-countdown';
    }

    public function get_title() {
        return esc_html__( 'Countdown', 'pixerex-elements' );
    }

    public function get_icon() {
        return 'eaicon-countdown';
    }

    public function get_categories() {
        return ['essential-addons-elementor'];
    }

    public function get_keywords() {
        return [
            'countdown',
            'ea countdown',
            'count down',
            'ea count down',
            'timer',
            'ea timer',
            'chronometer',
            'stopwatch',
            'clock',
            'ea',
            'essential addons',
        ];
    }

    public function get_custom_help_url() {
        return 'https://essential-addons.com/elementor/docs/countdown/';
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'eael_section_countdown_settings_general',
            [
                'label' => esc_html__( 'Timer Settings', 'pixerex-elements' ),
            ]
        );

        $this->add_control(
            'eael_countdown_due_time',
            [
                'label'       => esc_html__( 'Countdown Due Date', 'pixerex-elements' ),
                'type'        => Controls_Manager::DATE_TIME,
                'default'     => date( "Y-m-d", strtotime( "+ 1 day" ) ),
                'description' => esc_html__( 'Set the due date and time', 'pixerex-elements' ),
            ]
        );

        $this->add_responsive_control(
            'eael_countdown_label_view',
            [
                'label'   => esc_html__( 'Label Position', 'pixerex-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'eael-countdown-label-block',
                'options' => [
                    'eael-countdown-label-block'  => esc_html__( 'Block', 'pixerex-elements' ),
                    'eael-countdown-label-inline' => esc_html__( 'Inline', 'pixerex-elements' ),
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_countdown_label_padding_left',
            [
                'label'       => esc_html__( 'Left spacing for Labels', 'pixerex-elements' ),
                'type'        => Controls_Manager::SLIDER,
                'description' => esc_html__( 'Use when you select inline labels', 'pixerex-elements' ),
                'range'       => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'   => [
                    '{{WRAPPER}} .eael-countdown-label' => 'padding-left:{{SIZE}}px;',
                ],
                'condition'   => [
                    'eael_countdown_label_view' => 'eael-countdown-label-inline',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_countdown_alignment',
            [
                'label'     => __( 'Alignment', 'pixerex-elements' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'pixerex-elements' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'pixerex-elements' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'pixerex-elements' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'eael_section_countdown_settings_content',
            [
                'label' => esc_html__( 'Content Settings', 'pixerex-elements' ),
            ]
        );
        $this->add_control(
            'eael_section_countdown_layout',
            [
                'label'     => __( 'Layout', 'pixerex-elements' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'grid'       => [
                        'title' => __( 'List view', 'pixerex-elements' ),
                        'icon'  => 'fa fa-th-list',
                    ],
                    'table-cell' => [
                        'title' => __( 'Grid View', 'pixerex-elements' ),
                        'icon'  => 'fa fa-th-large',
                    ],
                ],
                'default'   => 'table-cell',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-items>li' => 'display: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_days',
            [
                'label'        => esc_html__( 'Display Days', 'pixerex-elements' ),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'eael_countdown_days_label',
            [
                'label'       => esc_html__( 'Custom Label for Days', 'pixerex-elements' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Days', 'pixerex-elements' ),
                'description' => esc_html__( 'Leave blank to hide', 'pixerex-elements' ),
                'condition'   => [
                    'eael_countdown_days' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_hours',
            [
                'label'        => esc_html__( 'Display Hours', 'pixerex-elements' ),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'eael_countdown_hours_label',
            [
                'label'       => esc_html__( 'Custom Label for Hours', 'pixerex-elements' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Hours', 'pixerex-elements' ),
                'description' => esc_html__( 'Leave blank to hide', 'pixerex-elements' ),
                'condition'   => [
                    'eael_countdown_hours' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_minutes',
            [
                'label'        => esc_html__( 'Display Minutes', 'pixerex-elements' ),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'eael_countdown_minutes_label',
            [
                'label'       => esc_html__( 'Custom Label for Minutes', 'pixerex-elements' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Minutes', 'pixerex-elements' ),
                'description' => esc_html__( 'Leave blank to hide', 'pixerex-elements' ),
                'condition'   => [
                    'eael_countdown_minutes' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_seconds',
            [
                'label'        => esc_html__( 'Display Seconds', 'pixerex-elements' ),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'eael_countdown_seconds_label',
            [
                'label'       => esc_html__( 'Custom Label for Seconds', 'pixerex-elements' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Seconds', 'pixerex-elements' ),
                'description' => esc_html__( 'Leave blank to hide', 'pixerex-elements' ),
                'condition'   => [
                    'eael_countdown_seconds' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_separator_heading',
            [
                'label' => __( 'Countdown Separator', 'pixerex-elements' ),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'eael_countdown_separator',
            [
                'label'        => esc_html__( 'Display Separator', 'pixerex-elements' ),
                'type'         => Controls_Manager::SWITCHER,
                'return_value' => 'eael-countdown-show-separator',
                'default'      => '',
            ]
        );

        $this->add_control(
            'eael_countdown_separator_style',
            [
                'label'     => __( 'Separator Style', 'pixerex-elements' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'dotted',
                'options'   => [
                    'solid'  => __( 'Solid', 'pixerex-elements' ),
                    'dotted' => __( 'Dotted', 'pixerex-elements' ),
                ],
                'condition' => [
                    'eael_countdown_separator' => 'eael-countdown-show-separator',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_separator_position_top',
            [
                'label'      => __( 'Position Top', 'pixerex-elements' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => '%',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eael-countdown-digits::after' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_separator_position_left',
            [
                'label'      => __( 'Position Left', 'pixerex-elements' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => '%',
                    'size' => 98,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eael-countdown-digits::after' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_separator_color',
            [
                'label'     => esc_html__( 'Separator Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'condition' => [
                    'eael_countdown_separator' => 'eael-countdown-show-separator',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-digits::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'eael_countdown_separator_typography',
                'scheme'    => Scheme_Typography::TYPOGRAPHY_2,
                'selector'  => '{{WRAPPER}} .eael-countdown-digits::after',
                'condition' => [
                    'eael_countdown_separator' => 'eael-countdown-show-separator',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'countdown_on_expire_settings',
            [
                'label' => esc_html__( 'Expire Action', 'pixerex-elements' ),
            ]
        );

        $this->add_control(
            'countdown_expire_type',
            [
                'label'       => esc_html__( 'Expire Type', 'pixerex-elements' ),
                'label_block' => false,
                'type'        => Controls_Manager::SELECT,
                'description' => esc_html__( 'Choose whether if you want to set a message or a redirect link', 'pixerex-elements' ),
                'options'     => [
                    'none'     => esc_html__( 'None', 'pixerex-elements' ),
                    'text'     => esc_html__( 'Message', 'pixerex-elements' ),
                    'url'      => esc_html__( 'Redirection Link', 'pixerex-elements' ),
                    'template' => esc_html__( 'Saved Templates', 'pixerex-elements' ),
                ],
                'default'     => 'none',
            ]
        );

        $this->add_control(
            'countdown_expiry_text_title',
            [
                'label'     => esc_html__( 'On Expiry Title', 'pixerex-elements' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => esc_html__( 'Countdown is finished!', 'pixerex-elements' ),
                'condition' => [
                    'countdown_expire_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'countdown_expiry_text',
            [
                'label'     => esc_html__( 'On Expiry Content', 'pixerex-elements' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default'   => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'pixerex-elements' ),
                'condition' => [
                    'countdown_expire_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'countdown_expiry_redirection',
            [
                'label'     => esc_html__( 'Redirect To (URL)', 'pixerex-elements' ),
                'type'      => Controls_Manager::TEXT,
                'condition' => [
                    'countdown_expire_type' => 'url',
                ],
                'default'   => '#',
            ]
        );

        $this->add_control(
            'countdown_expiry_templates',
            [
                'label'     => __( 'Choose Template', 'pixerex-elements' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $this->eael_get_page_templates(),
                'condition' => [
                    'countdown_expire_type' => 'template',
                ],
            ]
        );

        $this->end_controls_section();

        if ( !apply_filters( 'eael/pro_enabled', false ) ) {
            $this->start_controls_section(
                'eael_section_pro',
                [
                    'label' => __( 'Go Premium for More Features', 'pixerex-elements' ),
                ]
            );

            $this->add_control(
                'eael_control_get_pro',
                [
                    'label'       => __( 'Unlock more possibilities', 'pixerex-elements' ),
                    'type'        => Controls_Manager::CHOOSE,
                    'options'     => [
                        '1' => [
                            'title' => '',
                            'icon'  => 'fa fa-unlock-alt',
                        ],
                    ],
                    'default'     => '1',
                    'description' => '<span class="pro-feature"> Get the  <a href="https://wpdeveloper.net/in/upgrade-essential-addons-elementor" target="_blank">Pro version</a> for more stunning elements and customization options.</span>',
                ]
            );

            $this->end_controls_section();
        }

        $this->start_controls_section(
            'eael_section_countdown_styles_general',
            [
                'label' => esc_html__( 'Countdown Styles', 'pixerex-elements' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'eael_countdown_is_gradient',
            [
                'label'        => __( 'Use Gradient Background?', 'pixerex-elements' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'pixerex-elements' ),
                'label_off'    => __( 'Hide', 'pixerex-elements' ),
                'return_value' => 'yes',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'      => 'eael_countdown_background',
                'label'     => __( 'Box Background Color', 'pixerex-elements' ),
                'types'     => ['classic', 'gradient'],
                'selector'  => '{{WRAPPER}} .eael-countdown-item > div',
                'condition' => [
                    'eael_countdown_is_gradient' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_background',
            [
                'label'     => esc_html__( 'Box Background Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'eael_countdown_is_gradient' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'eael_countdown_item_bottom_margin',
            [
                'label'     => esc_html__( 'Space Between Boxes', 'pixerex-elements' ),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 15,
                ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-items>li' => 'margin-bottom:{{SIZE}}px;',
                ],
                'condition' => [
                    'eael_section_countdown_layout' => 'grid',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_countdown_spacing',
            [
                'label'     => esc_html__( 'Space Between Boxes', 'pixerex-elements' ),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 15,
                ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div' => 'margin-right:{{SIZE}}px; margin-left:{{SIZE}}px;',
                    '{{WRAPPER}} .eael-countdown-container'  => 'margin-right: -{{SIZE}}px; margin-left: -{{SIZE}}px;',
                ],
                'condition' => [
                    'eael_section_countdown_layout' => 'table-cell',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_countdown_container_margin_bottom',
            [
                'label'     => esc_html__( 'Space Below Container', 'pixerex-elements' ),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 0,
                ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-container' => 'margin-bottom:{{SIZE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_countdown_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'pixerex-elements' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eael-countdown-item > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'eael_countdown_box_border',
                'label'    => esc_html__( 'Border', 'pixerex-elements' ),
                'selector' => '{{WRAPPER}} .eael-countdown-item > div',
            ]
        );

        $this->add_control(
            'eael_countdown_box_border_radius',
            [
                'label'     => esc_html__( 'Border Radius', 'pixerex-elements' ),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'eael_countdown_box_shadow',
                'selector' => '{{WRAPPER}} .eael-countdown-item > div',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'eael_section_countdown_styles_content',
            [
                'label' => esc_html__( 'Color &amp; Typography', 'pixerex-elements' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'eael_countdown_digits_heading',
            [
                'label' => __( 'Countdown Digits', 'pixerex-elements' ),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'eael_countdown_digits_color',
            [
                'label'     => esc_html__( 'Digits Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fec503',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-digits' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'eael_countdown_digit_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .eael-countdown-digits',
            ]
        );

        $this->add_control(
            'eael_countdown_label_heading',
            [
                'label' => __( 'Countdown Labels', 'pixerex-elements' ),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'eael_countdown_label_color',
            [
                'label'     => esc_html__( 'Label Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'eael_countdown_label_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
                'selector' => '{{WRAPPER}} .eael-countdown-label',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'eael_section_countdown_styles_individual',
            [
                'label' => esc_html__( 'Individual Box Styling', 'pixerex-elements' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'eael_countdown_days_label_heading',
            [
                'label' => __( 'Days', 'pixerex-elements' ),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'      => 'eael_countdown_days_background_color',
                'label'     => __( 'Background Color', 'pixerex-elements' ),
                'types'     => ['classic', 'gradient'],
                'selector'  => '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-days',
                'condition' => [
                    'eael_countdown_is_gradient' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_days_background_color',
            [
                'label'     => esc_html__( 'Background Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-days' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'eael_countdown_is_gradient' => '',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_days_digit_color',
            [
                'label'     => esc_html__( 'Digit Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-days .eael-countdown-digits' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_days_label_color',
            [
                'label'     => esc_html__( 'Label Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-days .eael-countdown-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_days_border_color',
            [
                'label'     => esc_html__( 'Border Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-days' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_hours_label_heading',
            [
                'label' => __( 'Hours', 'pixerex-elements' ),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'      => 'eael_countdown_hours_background_color',
                'label'     => __( 'Background Color', 'pixerex-elements' ),
                'types'     => ['classic', 'gradient'],
                'selector'  => '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-hours',
                'condition' => [
                    'eael_countdown_is_gradient' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_hours_background_color',
            [
                'label'     => esc_html__( 'Background Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-hours' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'eael_countdown_is_gradient' => '',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_hours_digit_color',
            [
                'label'     => esc_html__( 'Digit Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-hours .eael-countdown-digits' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_hours_label_color',
            [
                'label'     => esc_html__( 'Label Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-hours .eael-countdown-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_hours_border_color',
            [
                'label'     => esc_html__( 'Border Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-hours' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_minutes_label_heading',
            [
                'label' => __( 'Minutes', 'pixerex-elements' ),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'      => 'eael_countdown_minutes_background_color',
                'label'     => __( 'Background Color', 'pixerex-elements' ),
                'types'     => ['classic', 'gradient'],
                'selector'  => '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-minutes',
                'condition' => [
                    'eael_countdown_is_gradient' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_minutes_background_color',
            [
                'label'     => esc_html__( 'Background Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-minutes' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'eael_countdown_is_gradient' => '',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_minutes_digit_color',
            [
                'label'     => esc_html__( 'Digit Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-minutes .eael-countdown-digits' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_minutes_label_color',
            [
                'label'     => esc_html__( 'Label Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-minutes .eael-countdown-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_minutes_border_color',
            [
                'label'     => esc_html__( 'Border Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-minutes' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_seconds_label_heading',
            [
                'label' => __( 'Seconds', 'pixerex-elements' ),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'      => 'eael_countdown_seconds_background_color',
                'label'     => __( 'Background Color', 'pixerex-elements' ),
                'types'     => ['classic', 'gradient'],
                'selector'  => '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-seconds',
                'condition' => [
                    'eael_countdown_is_gradient' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_seconds_background_color',
            [
                'label'     => esc_html__( 'Background Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-seconds' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'eael_countdown_is_gradient' => '',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_seconds_digit_color',
            [
                'label'     => esc_html__( 'Digit Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-seconds .eael-countdown-digits' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_seconds_label_color',
            [
                'label'     => esc_html__( 'Label Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-seconds .eael-countdown-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_countdown_seconds_border_color',
            [
                'label'     => esc_html__( 'Border Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-item > div.eael-countdown-seconds' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'eael_section_countdown_expire_style',
            [
                'label'     => esc_html__( 'Expire Message', 'pixerex-elements' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'countdown_expire_type' => 'text',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_countdown_expire_message_alignment',
            [
                'label'       => esc_html__( 'Text Alignment', 'pixerex-elements' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options'     => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'pixerex-elements' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'pixerex-elements' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'pixerex-elements' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'     => 'left',
                'selectors'   => [
                    '{{WRAPPER}} .eael-countdown-finish-message' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_eael_countdown_expire_title',
            [
                'label'     => __( 'Title Style', 'pixerex-elements' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'eael_countdown_expire_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-finish-message .expiry-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'countdown_expire_type' => 'text',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'eael_countdown_expire_title_typography',
                'scheme'    => Scheme_Typography::TYPOGRAPHY_2,
                'selector'  => '{{WRAPPER}} .eael-countdown-finish-message .expiry-title',
                'condition' => [
                    'countdown_expire_type' => 'text',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_expire_title_margin',
            [
                'label'      => esc_html__( 'Margin', 'pixerex-elements' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eael-countdown-finish-message .expiry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_eael_countdown_expire_message',
            [
                'label'     => __( 'Content Style', 'pixerex-elements' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'eael_countdown_expire_message_color',
            [
                'label'     => esc_html__( 'Text Color', 'pixerex-elements' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-countdown-finish-text' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'countdown_expire_type' => 'text',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'eael_countdown_expire_message_typography',
                'scheme'    => Scheme_Typography::TYPOGRAPHY_2,
                'selector'  => '.eael-countdown-finish-text',
                'condition' => [
                    'countdown_expire_type' => 'text',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_countdown_expire_message_padding',
            [
                'label'      => esc_html__( 'Padding', 'pixerex-elements' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'separator'  => 'before',
                'selectors'  => [
                    '{{WRAPPER}} .eael-countdown-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'  => [
                    'countdown_expire_type' => 'text',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings();

        $get_due_date = esc_attr( $settings['eael_countdown_due_time'] );
        $due_date = date( "M d Y G:i:s", strtotime( $get_due_date ) );

        if ( 'template' == $settings['countdown_expire_type'] ) {
            if ( !empty( $settings['countdown_expiry_templates'] ) ) {
                echo Plugin::$instance->frontend->get_builder_content( $settings['countdown_expiry_templates'], true );
            }
        }

        $this->add_render_attribute( 'eael-countdown', 'class', 'eael-countdown-wrapper' );
        $this->add_render_attribute( 'eael-countdown', 'data-countdown-id', esc_attr( $this->get_id() ) );
        $this->add_render_attribute( 'eael-countdown', 'data-expire-type', $settings['countdown_expire_type'] );

        if ( $settings['countdown_expire_type'] == 'text' ) {
            if ( !empty( $settings['countdown_expiry_text'] ) ) {
                $this->add_render_attribute( 'eael-countdown', 'data-expiry-text', wp_kses_post( $settings['countdown_expiry_text'] ) );
            }

            if ( !empty( $settings['countdown_expiry_text_title'] ) ) {
                $this->add_render_attribute( 'eael-countdown', 'data-expiry-title', wp_kses_post( $settings['countdown_expiry_text_title'] ) );
            }
        } elseif ( $settings['countdown_expire_type'] == 'url' ) {
            $this->add_render_attribute( 'eael-countdown', 'data-redirect-url', $settings['countdown_expiry_redirection'] );
        } elseif ( $settings['countdown_expire_type'] == 'template' ) {
            $this->add_render_attribute( 'eael-countdown', 'data-template', esc_attr( $template ) );
        } else {
            //do nothing
        }
        // separator
        $separator = '';
        if ( $settings['eael_countdown_separator'] === 'eael-countdown-show-separator' ) {
            $separator = 'eael-countdown-show-separator eael-countdown-separator-' . $settings['eael_countdown_separator_style'];
        }

        // label view
        $this->add_render_attribute( 'eael-countdown-container', [
            'class' => [
                'eael-countdown-container',
                $settings['eael_countdown_label_view'],
                $settings['eael_countdown_label_view_tablet'] . '-tablet',
                $settings['eael_countdown_label_view_mobile'] . '-mobile',
                $separator,
            ],
        ] );
        ?>

		<div <?php echo $this->get_render_attribute_string( 'eael-countdown' ); ?>>
			<div <?php echo $this->get_render_attribute_string( 'eael-countdown-container' ); ?>>
				<ul id="eael-countdown-<?php echo esc_attr( $this->get_id() ); ?>" class="eael-countdown-items" data-date="<?php echo esc_attr( $due_date ); ?>">
					<?php if ( !empty( $settings['eael_countdown_days'] ) ): ?><li class="eael-countdown-item"><div class="eael-countdown-days"><span data-days class="eael-countdown-digits">00</span><?php if ( !empty( $settings['eael_countdown_days_label'] ) ): ?><span class="eael-countdown-label"><?php echo esc_attr( $settings['eael_countdown_days_label'] ); ?></span><?php endif;?></div></li><?php endif;?>
					<?php if ( !empty( $settings['eael_countdown_hours'] ) ): ?><li class="eael-countdown-item"><div class="eael-countdown-hours"><span data-hours class="eael-countdown-digits">00</span><?php if ( !empty( $settings['eael_countdown_hours_label'] ) ): ?><span class="eael-countdown-label"><?php echo esc_attr( $settings['eael_countdown_hours_label'] ); ?></span><?php endif;?></div></li><?php endif;?>
				<?php if ( !empty( $settings['eael_countdown_minutes'] ) ): ?><li class="eael-countdown-item"><div class="eael-countdown-minutes"><span data-minutes class="eael-countdown-digits">00</span><?php if ( !empty( $settings['eael_countdown_minutes_label'] ) ): ?><span class="eael-countdown-label"><?php echo esc_attr( $settings['eael_countdown_minutes_label'] ); ?></span><?php endif;?></div></li><?php endif;?>
				<?php if ( !empty( $settings['eael_countdown_seconds'] ) ): ?><li class="eael-countdown-item"><div class="eael-countdown-seconds"><span data-seconds class="eael-countdown-digits">00</span><?php if ( !empty( $settings['eael_countdown_seconds_label'] ) ): ?><span class="eael-countdown-label"><?php echo esc_attr( $settings['eael_countdown_seconds_label'] ); ?></span><?php endif;?></div></li><?php endif;?>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>

	<?php

    }
}
