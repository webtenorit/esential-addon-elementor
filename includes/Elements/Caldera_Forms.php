<?php
namespace Essential_Addons_Elementor\Elements;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;

class Caldera_Forms extends Widget_Base
{

    use \Essential_Addons_Elementor\Traits\Helper;

    public function get_name()
    {
        return 'eael-caldera-form';
    }

    public function get_title()
    {
        return __('Caldera Forms', 'pixerex-elements');
    }

    public function get_categories()
    {
        return ['essential-addons-elementor'];
    }

    public function get_icon()
    {
        return 'eaicon-caldera-forms';
    }
    
    public function get_keywords() {
        return [
            'contact form',
            'ea contact form',
            'form styler',
            'elementor form',
            'feedback',
            'calderaforms',
            'ea calderaforms',
            'ea',
            'essential addons'
        ];
    }

    public function get_custom_help_url() {
        return 'https://essential-addons.com/elementor/docs/caldera-forms/';
    }

    protected function _register_controls()
    {
        /*-----------------------------------------------------------------------------------*/
        /*    Content Tab
        /*-----------------------------------------------------------------------------------*/
        if (!class_exists('\Caldera_Forms')) {
            $this->start_controls_section(
                'eael_global_warning',
                [
                    'label' => __('Warning!', 'pixerex-elements'),
                ]
            );

            $this->add_control(
                'eael_global_warning_text',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => __('<strong>Caldera Forms</strong> is not installed/activated on your site. Please install and activate <strong>Caldera Forms</strong> first.', 'pixerex-elements'),
                    'content_classes' => 'eael-warning',
                ]
            );

            $this->end_controls_section();
        } else {
            /**
             * Content Tab: Caldera Forms
             * -------------------------------------------------
             */
            $this->start_controls_section(
                'section_info_box',
                [
                    'label' => __('Caldera Forms', 'pixerex-elements'),
                ]
            );

            $this->add_control(
                'contact_form_list',
                [
                    'label' => esc_html__('Caldera Form', 'pixerex-elements'),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => $this->eael_select_caldera_form(),
                    'default' => '0',
                ]
            );

            $this->add_control(
                'custom_title_description',
                [
                    'label' => __('Custom Title & Description', 'pixerex-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __('Yes', 'pixerex-elements'),
                    'label_off' => __('No', 'pixerex-elements'),
                    'return_value' => 'yes',
                ]
            );

            $this->add_control(
                'form_title_custom',
                [
                    'label' => esc_html__('Title', 'pixerex-elements'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => '',
                    'condition' => [
                        'custom_title_description' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'form_description_custom',
                [
                    'label' => esc_html__('Description', 'pixerex-elements'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => '',
                    'condition' => [
                        'custom_title_description' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'labels_switch',
                [
                    'label' => __('Labels', 'pixerex-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'label_on' => __('Show', 'pixerex-elements'),
                    'label_off' => __('Hide', 'pixerex-elements'),
                    'return_value' => 'yes',
                    'prefix_class' => 'eael-caldera-form-labels-',
                ]
            );

            $this->add_control(
                'placeholder_switch',
                [
                    'label' => __('Placeholder', 'pixerex-elements'),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'label_on' => __('Show', 'pixerex-elements'),
                    'label_off' => __('Hide', 'pixerex-elements'),
                    'return_value' => 'yes',
                ]
            );

            $this->end_controls_section();

            /**
             * Content Tab: Errors
             * -------------------------------------------------
             */
            $this->start_controls_section(
                'section_errors',
                [
                    'label' => __('Errors', 'pixerex-elements'),
                ]
            );

            $this->add_control(
                'error_messages',
                [
                    'label' => __('Error Messages', 'pixerex-elements'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'show',
                    'options' => [
                        'show' => __('Show', 'pixerex-elements'),
                        'hide' => __('Hide', 'pixerex-elements'),
                    ],
                    'selectors_dictionary' => [
                        'show' => 'block',
                        'hide' => 'none',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .eael-caldera-form .has-error .parsley-required' => 'display: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->end_controls_section();
        }

        /*-----------------------------------------------------------------------------------*/
        /*    Style Tab
        /*-----------------------------------------------------------------------------------*/

        /**
         * Style Tab: Form Title & Description
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_form_title_style',
            [
                'label' => __('Title & Description', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_alignment',
            [
                'label' => __('Alignment', 'pixerex-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'pixerex-elements'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'pixerex-elements'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'pixerex-elements'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form-heading' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'title_heading',
            [
                'label' => __('Title', 'pixerex-elements'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'form_title_text_color',
            [
                'label' => __('Text Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-contact-form-title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'form_title_typography',
                'label' => __('Typography', 'pixerex-elements'),
                'selector' => '{{WRAPPER}} .eael-contact-form-title',
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'form_title_margin',
            [
                'label' => __('Margin', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'allowed_dimensions' => 'vertical',
                'placeholder' => [
                    'top' => '',
                    'right' => 'auto',
                    'bottom' => '',
                    'left' => 'auto',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-contact-form-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'description_heading',
            [
                'label' => __('Description', 'pixerex-elements'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'form_description_text_color',
            [
                'label' => __('Text Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-contact-form-description' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'form_description_typography',
                'label' => __('Typography', 'pixerex-elements'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .eael-contact-form-description',
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'form_description_margin',
            [
                'label' => __('Margin', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'allowed_dimensions' => 'vertical',
                'placeholder' => [
                    'top' => '',
                    'right' => 'auto',
                    'bottom' => '',
                    'left' => 'auto',
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-contact-form-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Form Container
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_container_style',
            [
                'label' => __('Form Container', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'eael_contact_form_background',
            [
                'label' => esc_html__('Form Background Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eael-contact-form' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_contact_form_alignment',
            [
                'label' => esc_html__('Form Alignment', 'pixerex-elements'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'default' => [
                        'title' => __('Default', 'pixerex-elements'),
                        'icon' => 'fa fa-ban',
                    ],
                    'left' => [
                        'title' => esc_html__('Left', 'pixerex-elements'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'pixerex-elements'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'pixerex-elements'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'default',
            ]
        );

        $this->add_responsive_control(
            'eael_contact_form_max_width',
            [
                'label' => esc_html__('Form Max Width', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 1500,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 80,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eael-contact-form' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_contact_form_margin',
            [
                'label' => esc_html__('Form Margin', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-contact-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_contact_form_padding',
            [
                'label' => esc_html__('Form Padding', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-contact-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'eael_contact_form_border_radius',
            [
                'label' => esc_html__('Border Radius', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'separator' => 'before',
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .eael-contact-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'eael_contact_form_border',
                'selector' => '{{WRAPPER}} .eael-contact-form',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'eael_contact_form_box_shadow',
                'selector' => '{{WRAPPER}} .eael-contact-form',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Labels
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_label_style',
            [
                'label' => __('Labels', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color_label',
            [
                'label' => __('Text Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_label',
                'label' => __('Typography', 'pixerex-elements'),
                'selector' => '{{WRAPPER}} .eael-caldera-form .form-group label',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Input & Textarea
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_fields_style',
            [
                'label' => __('Input & Textarea', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'input_alignment',
            [
                'label' => __('Alignment', 'pixerex-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'pixerex-elements'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'pixerex-elements'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'pixerex-elements'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group textarea, {{WRAPPER}} .eael-caldera-form .form-group select' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_fields_style');

        $this->start_controls_tab(
            'tab_fields_normal',
            [
                'label' => __('Normal', 'pixerex-elements'),
            ]
        );

        $this->add_control(
            'field_bg_color',
            [
                'label' => __('Background Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group textarea, {{WRAPPER}} .eael-caldera-form .form-group select' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'field_text_color',
            [
                'label' => __('Text Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group textarea, {{WRAPPER}} .eael-caldera-form .form-group select' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'field_border',
                'label' => __('Border', 'pixerex-elements'),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group textarea, {{WRAPPER}} .eael-caldera-form .form-group select',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'field_radius',
            [
                'label' => __('Border Radius', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group textarea, {{WRAPPER}} .eael-caldera-form .form-group select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'field_text_indent',
            [
                'label' => __('Text Indent', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 60,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group textarea, {{WRAPPER}} .eael-caldera-form .form-group select' => 'text-indent: {{SIZE}}{{UNIT}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'input_width',
            [
                'label' => __('Input Width', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group select' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'input_height',
            [
                'label' => __('Input Height', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group select' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'textarea_width',
            [
                'label' => __('Textarea Width', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group textarea' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'textarea_height',
            [
                'label' => __('Textarea Height', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 400,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group textarea' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'field_padding',
            [
                'label' => __('Padding', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group textarea, {{WRAPPER}} .eael-caldera-form .form-group select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'field_spacing',
            [
                'label' => __('Spacing', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'field_typography',
                'label' => __('Typography', 'pixerex-elements'),
                'selector' => '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group textarea, {{WRAPPER}} .eael-caldera-form .form-group select',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'field_box_shadow',
                'selector' => '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .form-group textarea, {{WRAPPER}} .eael-caldera-form .form-group select',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_fields_focus',
            [
                'label' => __('Focus', 'pixerex-elements'),
            ]
        );

        $this->add_control(
            'field_bg_color_focus',
            [
                'label' => __('Background Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]):focus, {{WRAPPER}} .eael-caldera-form .form-group textarea:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'focus_input_border',
                'label' => __('Border', 'pixerex-elements'),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]):focus, {{WRAPPER}} .eael-caldera-form .form-group textarea:focus',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'focus_box_shadow',
                'selector' => '{{WRAPPER}} .eael-caldera-form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]):focus, {{WRAPPER}} .eael-caldera-form .form-group textarea:focus',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Field Description
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_field_description_style',
            [
                'label' => __('Field Description', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'field_description_text_color',
            [
                'label' => __('Text Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .help-block' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'field_description_typography',
                'label' => __('Typography', 'pixerex-elements'),
                'selector' => '{{WRAPPER}} .eael-caldera-form .help-block',
            ]
        );

        $this->add_responsive_control(
            'field_description_spacing',
            [
                'label' => __('Spacing', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .help-block' => 'padding-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Placeholder
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_placeholder_style',
            [
                'label' => __('Placeholder', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'placeholder_switch' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'text_color_placeholder',
            [
                'label' => __('Text Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input::-webkit-input-placeholder, {{WRAPPER}} .eael-caldera-form .form-group textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'placeholder_switch' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Radio & Checkbox
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_radio_checkbox_style',
            [
                'label' => __('Radio & Checkbox', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'custom_radio_checkbox',
            [
                'label' => __('Custom Styles', 'pixerex-elements'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'pixerex-elements'),
                'label_off' => __('No', 'pixerex-elements'),
                'return_value' => 'yes',
            ]
        );

        $this->add_responsive_control(
            'radio_checkbox_size',
            [
                'label' => __('Size', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '15',
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .eael-custom-radio-checkbox input[type="radio"]' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_radio_checkbox_style');

        $this->start_controls_tab(
            'radio_checkbox_normal',
            [
                'label' => __('Normal', 'pixerex-elements'),
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_checkbox_color',
            [
                'label' => __('Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .eael-custom-radio-checkbox input[type="radio"]' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'checkbox_border_width',
            [
                'label' => __('Border Width', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .eael-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .eael-custom-radio-checkbox input[type="radio"]' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'checkbox_border_color',
            [
                'label' => __('Border Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .eael-custom-radio-checkbox input[type="radio"]' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'checkbox_heading',
            [
                'label' => __('Checkbox', 'pixerex-elements'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'checkbox_border_radius',
            [
                'label' => __('Border Radius', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .eael-custom-radio-checkbox input[type="checkbox"]:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_heading',
            [
                'label' => __('Radio Buttons', 'pixerex-elements'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_border_radius',
            [
                'label' => __('Border Radius', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-custom-radio-checkbox input[type="radio"], {{WRAPPER}} .eael-custom-radio-checkbox input[type="radio"]:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'radio_checkbox_checked',
            [
                'label' => __('Checked', 'pixerex-elements'),
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_checkbox_color_checked',
            [
                'label' => __('Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-custom-radio-checkbox input[type="checkbox"]:checked:before, {{WRAPPER}} .eael-custom-radio-checkbox input[type="radio"]:checked:before' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Submit Button
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_submit_button_style',
            [
                'label' => __('Submit Button', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_align',
            [
                'label' => __('Alignment', 'pixerex-elements'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'pixerex-elements'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'pixerex-elements'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'pixerex-elements'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => '',
                'prefix_class' => 'eael-caldera-form-button-',
                'condition' => [
                    'button_width_type' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'button_width_type',
            [
                'label' => __('Width', 'pixerex-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'custom',
                'options' => [
                    'full-width' => __('Full Width', 'pixerex-elements'),
                    'custom' => __('Custom', 'pixerex-elements'),
                ],
                'prefix_class' => 'eael-caldera-form-button-',
            ]
        );

        $this->add_responsive_control(
            'button_width',
            [
                'label' => __('Width', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"], {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'button_width_type' => 'custom',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'pixerex-elements'),
            ]
        );

        $this->add_control(
            'button_bg_color_normal',
            [
                'label' => __('Background Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"], {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_text_color_normal',
            [
                'label' => __('Text Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"], {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border_normal',
                'label' => __('Border', 'pixerex-elements'),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"], {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"], {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'pixerex-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"], {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __('Margin Top', 'pixerex-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"], {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]' => 'margin-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'pixerex-elements'),
                'selector' => '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"], {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"], {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'pixerex-elements'),
            ]
        );

        $this->add_control(
            'button_bg_color_hover',
            [
                'label' => __('Background Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"]:hover, {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __('Text Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"]:hover, {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_border_color_hover',
            [
                'label' => __('Border Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .form-group input[type="submit"]:hover, {{WRAPPER}} .eael-caldera-form .form-group input[type="button"]:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Success Message
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_success_message_style',
            [
                'label' => __('Success Message', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'success_message_bg_color',
            [
                'label' => __('Background Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .caldera-grid .alert-success' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'success_message_text_color',
            [
                'label' => __('Text Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .caldera-grid .alert-success' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'success_message_border',
                'label' => __('Border', 'pixerex-elements'),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .eael-caldera-form .caldera-grid .alert-success',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'success_message_typography',
                'label' => __('Typography', 'pixerex-elements'),
                'selector' => '{{WRAPPER}} .eael-caldera-form .caldera-grid .alert-success',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Errors
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_error_style',
            [
                'label' => __('Errors', 'pixerex-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'error_messages_heading',
            [
                'label' => __('Error Messages', 'pixerex-elements'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'error_messages' => 'show',
                ],
            ]
        );

        $this->add_control(
            'error_message_text_color',
            [
                'label' => __('Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .has-error .help-block' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'error_messages' => 'show',
                ],
            ]
        );

        $this->add_control(
            'error_fields_heading',
            [
                'label' => __('Error Fields', 'pixerex-elements'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'error_fields_label_color',
            [
                'label' => __('Label Color', 'pixerex-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-caldera-form .has-error .control-label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'error_field_border',
                'label' => __('Input Border', 'pixerex-elements'),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .eael-caldera-form .has-error input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .eael-caldera-form .has-error textarea',
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        if (!class_exists('\Caldera_Forms')) {
            return;
        }

        $settings = $this->get_settings();

        $this->add_render_attribute('contact-form', 'class', [
            'eael-contact-form',
            'eael-caldera-form',
        ]);

        if ($settings['placeholder_switch'] != 'yes') {
            $this->add_render_attribute('contact-form', 'class', 'placeholder-hide');
        }

        if ($settings['custom_title_description'] == 'yes') {
            $this->add_render_attribute('contact-form', 'class', 'title-description-hide');
        }

        if ($settings['custom_radio_checkbox'] == 'yes') {
            $this->add_render_attribute('contact-form', 'class', 'eael-custom-radio-checkbox');
        }
        if ($settings['eael_contact_form_alignment'] == 'left') {
            $this->add_render_attribute('contact-form', 'class', 'eael-contact-form-align-left');
        } elseif ($settings['eael_contact_form_alignment'] == 'center') {
            $this->add_render_attribute('contact-form', 'class', 'eael-contact-form-align-center');
        } elseif ($settings['eael_contact_form_alignment'] == 'right') {
            $this->add_render_attribute('contact-form', 'class', 'eael-contact-form-align-right');
        } else {
            $this->add_render_attribute('contact-form', 'class', 'eael-contact-form-align-default');
        }

        if (!empty($settings['contact_form_list'])) {?>
            <div <?php echo $this->get_render_attribute_string('contact-form'); ?>>
                <?php if ($settings['custom_title_description'] == 'yes') {?>
                    <div class="eael-caldera-form-heading">
                        <?php if ($settings['form_title_custom'] != '') {?>
                            <h3 class="eael-contact-form-title eael-caldera-form-title">
                                <?php echo esc_attr($settings['form_title_custom']); ?>
                            </h3>
                        <?php }?>
                        <?php if ($settings['form_description_custom'] != '') {?>
                            <div class="eael-contact-form-description eael-caldera-form-description">
                                <?php echo $this->parse_text_editor($settings['form_description_custom']); ?>
                            </div>
                        <?php }?>
                    </div>
                <?php }?>
                <?php echo do_shortcode('[caldera_form id="' . $settings['contact_form_list'] . '" ]'); ?>
            </div>
            <?php
        }
    }
}
