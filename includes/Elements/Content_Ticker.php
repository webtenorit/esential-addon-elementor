<?php
namespace Essential_Addons_Elementor\Elements;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Widget_Base;

class Content_Ticker extends Widget_Base
{
    use \Essential_Addons_Elementor\Traits\Helper;
    use \Essential_Addons_Elementor\Template\Content\Content_Ticker;

    public function get_name()
    {
        return 'eael-content-ticker';
    }

    public function get_title()
    {
        return esc_html__('Content Ticker', 'px-elements');
    }

    public function get_icon()
    {
        return 'eaicon-content-ticker';
    }

    public function get_categories()
    {
        return ['essential-addons-elementor'];
    }

    public function get_keywords()
    {
        return [
            'ticker',
            'ea ticker',
            'ea content ticker',
            'news headline',
            'news ticker',
            'text rotate',
            'text animation',
            'text swing',
            'text slide',
            'ea',
            'essential addons'
        ];
    }

    public function get_custom_help_url()
    {
        return 'https://essential-addons.com/elementor/docs/content-ticker/';
    }

    protected function _register_controls()
    {
        /**
         * Content Ticker Content Settings
         */
        $this->start_controls_section(
            'eael_section_content_ticker_settings',
            [
                'label' => esc_html__('Ticker Settings', 'px-elements'),
            ]
        );

        $ticker_options = apply_filters(
            'eael_ticker_options',
            [
                'options' => [
                    'dynamic' => esc_html__('Dynamic', 'px-elements'),
                    'custom' => esc_html__('Custom', 'px-elements'),
                ],
                'conditions' => [
                    'custom',
                ],
            ]
        );

        $this->add_control(
            'eael_ticker_type',
            [
                'label' => esc_html__('Ticker Type', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'dynamic',
                'label_block' => false,
                'options' => $ticker_options['options'],
            ]
        );

        $this->add_control(
            'eael_ticker_type_pro_alert',
            [
                'label' => esc_html__('Custom Content available in pro version only!', 'px-elements'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'eael_ticker_type' => $ticker_options['conditions'],
                ],
            ]
        );

        $this->add_control(
            'eael_ticker_tag_text',
            [
                'label' => esc_html__('Tag Text', 'px-elements'),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__('Trending Today', 'px-elements'),
            ]
        );

        $this->end_controls_section();

        /**
         * Query Controls
         * @source includes/helper.php
         */
        $this->eael_query_controls();

        do_action('eael_ticker_custom_content_controls', $this);

        /**
         * Content Tab: Carousel Settings
         */
        $this->start_controls_section(
            'section_additional_options',
            [
                'label' => __('Animation Settings', 'px-elements'),
            ]
        );

        $this->add_control(
            'carousel_effect',
            [
                'label' => __('Effect', 'px-elements'),
                'description' => __('Sets transition effect', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'slide',
                'options' => [
                    'slide' => __('Slide', 'px-elements'),
                    'fade' => __('Fade', 'px-elements'),
                ],
            ]
        );

        $this->add_responsive_control(
            'items',
            [
                'label' => __('Visible Items', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 1],
                'tablet_default' => ['size' => 1],
                'mobile_default' => ['size' => 1],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
                'condition' => [
                    'carousel_effect' => 'slide',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'margin',
            [
                'label' => __('Items Gap', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 10],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
                'condition' => [
                    'carousel_effect' => 'slide',
                ],
            ]
        );

        $this->add_control(
            'slider_speed',
            [
                'label' => __('Slider Speed', 'px-elements'),
                'description' => __('Duration of transition between slides (in ms)', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 400],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 3000,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __('Autoplay', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __('Autoplay Speed', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 2000],
                'range' => [
                    'px' => [
                        'min' => 500,
                        'max' => 5000,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label' => __('Pause On Hover', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'infinite_loop',
            [
                'label' => __('Infinite Loop', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'grab_cursor',
            [
                'label' => __('Grab Cursor', 'px-elements'),
                'description' => __('Shows grab cursor when you hover over the slider', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => __('Show', 'px-elements'),
                'label_off' => __('Hide', 'px-elements'),
                'return_value' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'navigation_heading',
            [
                'label' => __('Navigation', 'px-elements'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'arrows',
            [
                'label' => __('Arrows', 'px-elements'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'px-elements'),
                'label_off' => __('No', 'px-elements'),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'direction',
            [
                'label' => __('Direction', 'px-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => __('Left', 'px-elements'),
                    'right' => __('Right', 'px-elements'),
                ],
                'separator' => 'before',
                'condition' => [
                    'carousel_effect' => 'slide',
                ],
            ]
        );

        $this->end_controls_section();

        if (!apply_filters('eael/pro_enabled', false)) {
            $this->start_controls_section(
                'eael_section_pro',
                [
                    'label' => __('Go Premium for More Features', 'px-elements'),
                ]
            );

            $this->add_control(
                'eael_control_get_pro',
                [
                    'label' => __('Unlock more possibilities', 'px-elements'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        '1' => [
                            'title' => '',
                            'icon' => 'fa fa-unlock-alt',
                        ],
                    ],
                    'default' => '1',
                    'description' => '<span class="pro-feature"> Get the  <a href="https://wpdeveloper.net/in/upgrade-essential-addons-elementor" target="_blank">Pro version</a> for more stunning elements and customization options.</span>',
                ]
            );

            $this->end_controls_section();
        }

        /**
         * -------------------------------------------
         * Tab Style (Ticker Content Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'eael_section_ticker_typography_settings',
            [
                'label' => esc_html__('Ticker Content', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'eael_ticker_content_bg',
            [
                'label' => esc_html__('Background Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .eael-ticker-wrap .eael-ticker' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'eael_ticker_content_color',
            [
                'label' => esc_html__('Text Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .eael-ticker-wrap .eael-ticker .ticker-content a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'eael_ticker_hover_content_color',
            [
                'label' => esc_html__('Text Hover Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f44336',
                'selectors' => [
                    '{{WRAPPER}} .eael-ticker-wrap .eael-ticker .ticker-content a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'eael_ticker_content_typography',
                'selector' => '{{WRAPPER}} .eael-ticker-wrap .eael-ticker .ticker-content a',

            ]
        );

        $this->add_responsive_control(
            'eael_ticker_content_padding',
            [
                'label' => esc_html__('Padding', 'px-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-ticker-wrap .eael-ticker .ticker-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'eael_section_ticker_tag_style_settings',
            [
                'label' => esc_html__('Tag Style', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'eael_ticker_tag_bg_color',
            [
                'label' => esc_html__('Background Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .eael-ticker-wrap .ticker-badge' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'eael_ticker_tag_color',
            [
                'label' => esc_html__('Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .eael-ticker-wrap .ticker-badge span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'eael_ticker_tag_typography',
                'selector' => '{{WRAPPER}} .eael-ticker-wrap .ticker-badge span',
            ]
        );
        $this->add_responsive_control(
            'eael_ticker_tag_padding',
            [
                'label' => esc_html__('Padding', 'px-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-ticker-wrap .ticker-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'eael_ticker_tag_margin',
            [
                'label' => esc_html__('Margin', 'px-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-ticker-wrap .ticker-badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eael_ticker_tag_radius',
            [
                'label' => esc_html__('Border Radius', 'px-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .eael-ticker-wrap .ticker-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /**
         * Style Tab: Arrows
         */
        $this->start_controls_section(
            'section_arrows_style',
            [
                'label' => __('Arrows', 'px-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'arrows' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'prev_arrow',
            [
                'label' => __('Choose Prev Arrow', 'px-elements'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-angle-left',
                    'library' => 'fa-solid',
                ]
            ]
        );

        $this->add_control(
            'arrow_new',
            [
                'label' => __('Choose Next Arrow', 'px-elements'),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'arrow',
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-angle-right',
                    'library' => 'fa-solid',
                ]
            ]
        );

        $this->add_responsive_control(
            'arrows_size',
            [
                'label' => __('Arrows Size', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => '22'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next img, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'left_arrow_position',
            [
                'label' => __('Align Left Arrow', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'right_arrow_position',
            [
                'label' => __('Align Right Arrow', 'px-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_arrows_style');

        $this->start_controls_tab(
            'tab_arrows_normal',
            [
                'label' => __('Normal', 'px-elements'),
            ]
        );

        $this->add_control(
            'arrows_bg_color_normal',
            [
                'label' => __('Background Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrows_color_normal',
            [
                'label' => __('Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrows_border_normal',
                'label' => __('Border', 'px-elements'),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev',
            ]
        );

        $this->add_control(
            'arrows_border_radius_normal',
            [
                'label' => __('Border Radius', 'px-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_arrows_hover',
            [
                'label' => __('Hover', 'px-elements'),
            ]
        );

        $this->add_control(
            'arrows_bg_color_hover',
            [
                'label' => __('Background Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrows_color_hover',
            [
                'label' => __('Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrows_border_color_hover',
            [
                'label' => __('Border Color', 'px-elements'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'arrows_padding',
            [
                'label' => __('Padding', 'px-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $settings = $this->fix_old_query($settings);
        $args = $this->eael_get_query_args($settings);

        $this->add_render_attribute('content-ticker-wrap', 'class', 'swiper-container-wrap eael-ticker');

        $this->add_render_attribute('content-ticker', 'class', 'swiper-container eael-content-ticker');
        $this->add_render_attribute('content-ticker', 'class', 'swiper-container-' . esc_attr($this->get_id()));
        $this->add_render_attribute('content-ticker', 'data-pagination', '.swiper-pagination-' . esc_attr($this->get_id()));
        $this->add_render_attribute('content-ticker', 'data-arrow-next', '.swiper-button-next-' . esc_attr($this->get_id()));
        $this->add_render_attribute('content-ticker', 'data-arrow-prev', '.swiper-button-prev-' . esc_attr($this->get_id()));

        if ($settings['direction'] == 'right') {
            $this->add_render_attribute('content-ticker', 'dir', 'rtl');
        }

        if (!empty($settings['items']['size'])) {
            $this->add_render_attribute('content-ticker', 'data-items', $settings['items']['size']);
        }
        if (!empty($settings['items_tablet']['size'])) {
            $this->add_render_attribute('content-ticker', 'data-items-tablet', $settings['items_tablet']['size']);
        }
        if (!empty($settings['items_mobile']['size'])) {
            $this->add_render_attribute('content-ticker', 'data-items-mobile', $settings['items_mobile']['size']);
        }
        if (!empty($settings['margin']['size'])) {
            $this->add_render_attribute('content-ticker', 'data-margin', $settings['margin']['size']);
        }
        if (!empty($settings['margin_tablet']['size'])) {
            $this->add_render_attribute('content-ticker', 'data-margin-tablet', $settings['margin_tablet']['size']);
        }
        if (!empty($settings['margin_mobile']['size'])) {
            $this->add_render_attribute('content-ticker', 'data-margin-mobile', $settings['margin_mobile']['size']);
        }
        if ($settings['carousel_effect']) {
            $this->add_render_attribute('content-ticker', 'data-effect', $settings['carousel_effect']);
        }
        if (!empty($settings['slider_speed']['size'])) {
            $this->add_render_attribute('content-ticker', 'data-speed', $settings['slider_speed']['size']);
        }
        if ($settings['autoplay'] == 'yes' && !empty($settings['autoplay_speed']['size'])) {
            $this->add_render_attribute('content-ticker', 'data-autoplay', $settings['autoplay_speed']['size']);
        } else {
            $this->add_render_attribute('content-ticker', 'data-autoplay', '999999');
        }
        if ($settings['pause_on_hover'] == 'yes') {
            $this->add_render_attribute('content-ticker', 'data-pause-on-hover', 'true');
        }
        if ($settings['infinite_loop'] == 'yes') {
            $this->add_render_attribute('content-ticker', 'data-loop', true);
        }
        if ($settings['grab_cursor'] == 'yes') {
            $this->add_render_attribute('content-ticker', 'data-grab-cursor', true);
        }
        if ($settings['arrows'] == 'yes') {
            $this->add_render_attribute('content-ticker', 'data-arrows', '1');
        }

        echo '<div class="eael-ticker-wrap" id="eael-ticker-wrap-' . $this->get_id() . '">';
            if (!empty($settings['eael_ticker_tag_text'])) {
                echo '<div class="ticker-badge">
                    <span>' . $settings['eael_ticker_tag_text'] . '</span>
                </div>';
            }

            echo '<div ' . $this->get_render_attribute_string('content-ticker-wrap') . '>
                <div ' . $this->get_render_attribute_string('content-ticker') . '>
                    <div class="swiper-wrapper">';
                        if ('dynamic' === $settings['eael_ticker_type']) {
                            echo self::render_template_($args, null);
                        }

                        do_action('render_content_ticker_custom_content', $settings);
                    echo '</div>
				</div>
				' . $this->render_arrows() . '
			</div>
		</div>';
    }

    /**
     * Render Content Ticker arrows output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render_arrows()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['arrows'] == 'yes') {
            if (isset($settings['__fa4_migrated']['arrow_new']) || empty($settings['arrow'])) {
                $arrow = $settings['arrow_new']['value'];
            } else {
                $arrow = $settings['arrow'];
            }

            $html = '<div class="content-ticker-pagination">';

                $html .= '<div class="swiper-button-next swiper-button-next-' . $this->get_id() . '">';
                    if( isset($arrow['url']) ) {
                        $html .= '<img src="'.esc_url($arrow['url']).'" alt="'.esc_attr(get_post_meta($arrow['id'], '_wp_attachment_image_alt', true)).'" />';
                    }else {
                        $html .= '<i class="' . $arrow . '"></i>';
                    }
                $html .= '</div>';

                $html .='<div class="swiper-button-prev swiper-button-prev-' . $this->get_id() . '">';
                    if( isset($settings['prev_arrow']['value']['url'])) {
                        $html .= '<img src="'.esc_url($settings['prev_arrow']['value']['url']).'" alt="'.esc_attr(get_post_meta($settings['prev_arrow']['value']['id'], '_wp_attachment_image_alt', true)).'" />';
                    }else {
                        $html .= '<i class="' . esc_attr($settings['prev_arrow']['value']) . '"></i>';
                    }
                $html .= '</div>';

            $html .= '</div>';


            return $html;
        }
    }
}
