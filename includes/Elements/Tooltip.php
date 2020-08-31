<?php
namespace Essential_Addons_Elementor\Elements;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Widget_Base;

class Tooltip extends Widget_Base {

	public function get_name() {
		return 'eael-tooltip';
	}

	public function get_title() {
		return esc_html__( 'Tooltip', 'px-elements');
	}

	public function get_icon() {
		return 'eaicon-tooltip';
	}

   	public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	public function get_keywords()
	{
        return [
			'tooltip',
			'ea tooltip',
			'popover',
			'hover',
			'hint',
			'floating text',
			'glossary',
			'ea',
			'essential addons'
		];
    }

	public function get_custom_help_url()
	{
        return 'https://essential-addons.com/elementor/docs/tooltip/';
    }

	protected function _register_controls() {
		/**
  		 * Tooltip Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_tooltip_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'px-elements')
  			]
  		);
		$this->add_responsive_control(
			'eael_tooltip_type',
			[
				'label' => esc_html__( 'Content Type', 'px-elements'),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'icon' => [
						'title' => esc_html__( 'Icon', 'px-elements'),
						'icon' => 'fa fa-info',
					],
					'text' => [
						'title' => esc_html__( 'Text', 'px-elements'),
						'icon' => 'fa fa-text-width',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'px-elements'),
						'icon' => 'fa fa-image',
					],
					'shortcode' => [
						'title' => esc_html__( 'Shortcode', 'px-elements'),
						'icon' => 'fa fa-code',
					],
				],
				'default' => 'icon',
			]
		);
  		$this->add_control(
			'eael_tooltip_content',
			[
				'label' => esc_html__( 'Content', 'px-elements'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Hover Me!', 'px-elements'),
				'condition' => [
					'eael_tooltip_type' => [ 'text' ]
				],
				'dynamic' => [ 'active' => true ]
			]
		);
		$this->add_control(
		  'eael_tooltip_content_tag',
		  	[
		   		'label'       	=> esc_html__( 'Content Tag', 'px-elements'),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'span',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'h1'  	=> esc_html__( 'H1', 'px-elements'),
		     		'h2'  	=> esc_html__( 'H2', 'px-elements'),
		     		'h3'  	=> esc_html__( 'H3', 'px-elements'),
		     		'h4'  	=> esc_html__( 'H4', 'px-elements'),
		     		'h5'  	=> esc_html__( 'H5', 'px-elements'),
		     		'h6'  	=> esc_html__( 'H6', 'px-elements'),
		     		'div'  	=> esc_html__( 'DIV', 'px-elements'),
		     		'span'  => esc_html__( 'SPAN', 'px-elements'),
		     		'p'  	=> esc_html__( 'P', 'px-elements'),
		     	],
		     	'condition' => [
		     		'eael_tooltip_type' => 'text'
		     	]
		  	]
		);
		$this->add_control(
			'eael_tooltip_shortcode_content',
			[
				'label' => esc_html__( 'Shortcode', 'px-elements'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( '[shortcode-here]', 'px-elements'),
				'condition' => [
					'eael_tooltip_type' => [ 'shortcode' ]
				]
			]
		);
		$this->add_control(
			'eael_tooltip_icon_content_new',
			[
				'label' => esc_html__( 'Icon', 'px-elements'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'eael_tooltip_icon_content',
				'default' => [
					'value' => 'fas fa-home',
					'library' => 'fa-solid',
				],
				'condition' => [
					'eael_tooltip_type' => [ 'icon' ]
				]
			]
		);
		$this->add_control(
			'eael_tooltip_img_content',
			[
				'label' => esc_html__( 'Image', 'px-elements'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'eael_tooltip_type' => [ 'image' ]
				]
			]
		);
		$this->add_responsive_control(
			'eael_tooltip_content_alignment',
			[
				'label' => esc_html__( 'Alignment', 'px-elements'),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'px-elements'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'px-elements'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'px-elements'),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'px-elements'),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'left',
				'prefix_class' => 'eael-tooltip-align-',
			]
		);

		$this->add_responsive_control(
			'eael_tooltip_icon_size',
			[
				'label'     => esc_html__( 'Icon Size', 'px-elements'),
				'type'      => Controls_Manager::SLIDER,
				'size_units'	=> [ '%', 'px' ],
				'default'   => [
					'size' => 60,
				],
				'range'     => [
					'px' => [
						'max' => 150,
					],
					'%'	=> [
						'max'	=> 100
					]
				],
				'selectors' => [
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-content i'	=> 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-content .ea-tooltip-svg-trigger'	=> 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
				],
				'condition'	=> [
					'eael_tooltip_type'	=> 'icon'
				]
			]
		);

		$this->add_control(
			'eael_tooltip_enable_link',
			[
				'label' => esc_html__( 'Enable Link', 'px-elements'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'false',
				'return_value' => 'yes',
				'condition' => [
					'eael_tooltip_type!' => ['shortcode']
				]
			]
		);
		$this->add_control(
			'eael_tooltip_link',
			[
				'label' => esc_html__( 'Button Link', 'px-elements'),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => '#',
        			'is_external' => '',
     			],
     			'show_external' => true,
     			'condition' => [
     				'eael_tooltip_enable_link' => 'yes'
     			]
			]
		);
  		$this->end_controls_section();

  		/**
  		 * Tooltip Hover Content Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_tooltip_hover_content_settings',
  			[
  				'label' => esc_html__( 'Tooltip Settings', 'px-elements')
  			]
  		);
  		$this->add_control(
			'eael_tooltip_hover_content',
			[
				'label' => esc_html__( 'Content', 'px-elements'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Tooltip content', 'px-elements'),
				'dynamic' => [ 'active' => true ]
			]
		);
		$this->add_control(
		  'eael_tooltip_hover_dir',
		  	[
		   		'label'       	=> esc_html__( 'Hover Direction', 'px-elements'),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'right',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'left'  	=> esc_html__( 'Left', 'px-elements'),
		     		'right'  	=> esc_html__( 'Right', 'px-elements'),
		     		'top'  		=> esc_html__( 'Top', 'px-elements'),
		     		'bottom'  	=> esc_html__( 'Bottom', 'px-elements'),
		     	],
		  	]
		);
		$this->add_control(
			'eael_tooltip_hover_speed',
			[
				'label' => esc_html__( 'Hover Speed', 'px-elements'),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '300', 'px-elements'),
				'selectors' => [
		            '{{WRAPPER}} .eael-tooltip:hover .eael-tooltip-text.eael-tooltip-top' => 'animation-duration: {{SIZE}}ms;',
		            '{{WRAPPER}} .eael-tooltip:hover .eael-tooltip-text.eael-tooltip-left' => 'animation-duration: {{SIZE}}ms;',
		            '{{WRAPPER}} .eael-tooltip:hover .eael-tooltip-text.eael-tooltip-bottom' => 'animation-duration: {{SIZE}}ms;',
		            '{{WRAPPER}} .eael-tooltip:hover .eael-tooltip-text.eael-tooltip-right' => 'animation-duration: {{SIZE}}ms;',
		        ]
			]
		);
  		$this->end_controls_section();

  		/**
		 * -------------------------------------------
		 * Tab Style Tooltip Content
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_tooltip_style_settings',
			[
				'label' => esc_html__( 'Content Style', 'px-elements'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'eael_tooltip_max_width',
		    [
		        'label' => __( 'Content Max Width', 'px-elements'),
		        'type' => Controls_Manager::SLIDER,
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		                'step' => 5,
		            ],
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		        ],
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .eael-tooltip' => 'max-width: {{SIZE}}{{UNIT}};',
		        ]
		    ]
		);
		$this->add_responsive_control(
			'eael_tooltip_content_padding',
			[
				'label' => esc_html__( 'Padding', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-tooltip' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'eael_tooltip_content_margin',
			[
				'label' => esc_html__( 'Margin', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-tooltip' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_tooltip_text_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'px-elements'),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'px-elements'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'px-elements'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'px-elements'),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'px-elements'),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'left',
				'prefix_class' => 'eael-tooltip-text-align-',
			]
		);

		$this->start_controls_tabs( 'eael_tooltip_content_style_tabs' );
			// Normal State Tab
			$this->start_controls_tab( 'eael_tooltip_content_normal', [ 'label' => esc_html__( 'Normal', 'px-elements') ] );
				$this->add_control(
					'eael_tooltip_content_bg_color',
					[
						'label' => esc_html__( 'Background Color', 'px-elements'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .eael-tooltip' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'eael_tooltip_content_color',
					[
						'label' => esc_html__( 'Text Color', 'px-elements'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .eael-tooltip' => 'color: {{VALUE}};',
							'{{WRAPPER}} .eael-tooltip a' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'eael_tooltip_shadow',
						'selector' => '{{WRAPPER}} .eael-tooltip',
						'separator' => 'before'
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'eael_tooltip_border',
						'label' => esc_html__( 'Border', 'px-elements'),
						'selector' => '{{WRAPPER}} .eael-tooltip',
					]
				);
			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'eael_tooltip_content_hover', [ 'label' => esc_html__( 'Hover', 'px-elements') ] );
				$this->add_control(
					'eael_tooltip_content_hover_bg_color',
					[
						'label' => esc_html__( 'Background Color', 'px-elements'),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .eael-tooltip:hover' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'eael_tooltip_content_hover_color',
					[
						'label' => esc_html__( 'Text Color', 'px-elements'),
						'type' => Controls_Manager::COLOR,
						'default' => '#212121',
						'selectors' => [
							'{{WRAPPER}} .eael-tooltip:hover' => 'color: {{VALUE}};',
							'{{WRAPPER}} .eael-tooltip:hover a' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'eael_tooltip_hover_shadow',
						'selector' => '{{WRAPPER}} .eael-tooltip:hover',
						'separator' => 'before'
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'eael_tooltip_hover_border',
						'label' => esc_html__( 'Border', 'px-elements'),
						'selector' => '{{WRAPPER}} .eael-tooltip:hover',
					]
				);
			$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'eael_tooltip_content_typography',
				'selector' => '{{WRAPPER}} .eael-tooltip',
			]
		);
		$this->add_responsive_control(
			'eael_tooltip_content_radius',
			[
				'label' => esc_html__( 'Border Radius', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-tooltip' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->end_controls_section();

		if(!apply_filters('eael/pro_enabled', false)) {
			$this->start_controls_section(
				'eael_section_pro',
				[
					'label' => __( 'Go Premium for More Features', 'px-elements')
				]
			);

			$this->add_control(
				'eael_control_get_pro',
				[
					'label' => __( 'Unlock more possibilities', 'px-elements'),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'1' => [
							'title' => '',
							'icon' => 'fa fa-unlock-alt',
						],
					],
					'default' => '1',
					'description' => '<span class="pro-feature"> Get the  <a href="https://wpdeveloper.net/in/upgrade-essential-addons-elementor" target="_blank">Pro version</a> for more stunning elements and customization options.</span>'
				]
			);

			$this->end_controls_section();
		}

		/**
		 * -------------------------------------------
		 * Tab Style Tooltip Hover Content
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_tooltip_hover_style_settings',
			[
				'label' => esc_html__( 'Tooltip Style', 'px-elements'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'eael_tooltip_hover_width',
		    [
		        'label' => __( 'Tooltip Width', 'px-elements'),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		        	'size' => '150'
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		                'step' => 5,
		            ],
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		        ],
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .eael-tooltip .eael-tooltip-text' => 'width: {{SIZE}}{{UNIT}};',
		        ]
		    ]
		);
		$this->add_responsive_control(
			'eael_tooltip_hover_max_width',
		    [
		        'label' => __( 'Tooltip Max Width', 'px-elements'),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		        	'size' => '150'
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1000,
		                'step' => 5,
		            ],
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		        ],
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .eael-tooltip .eael-tooltip-text' => 'max-width: {{SIZE}}{{UNIT}};',
		        ]
		    ]
		);
		$this->add_responsive_control(
			'eael_tooltip_hover_content_padding',
			[
				'label' => esc_html__( 'Padding', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 				'{{WRAPPER}} .eael-tooltip .eael-tooltip-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_responsive_control(
			'eael_tooltip_hover_content_margin',
			[
				'label' => esc_html__( 'Margin', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 				'{{WRAPPER}} .eael-tooltip .eael-tooltip-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_control(
			'eael_tooltip_hover_content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'px-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#555',
				'selectors' => [
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'eael_tooltip_hover_content_color',
			[
				'label' => esc_html__( 'Text Color', 'px-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            	'name' => 'eael_tooltip_hover_content_typography',
				'selector' => '{{WRAPPER}} .eael-tooltip .eael-tooltip-text',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_tooltip_box_shadow',
				'selector' => '{{WRAPPER}} .eael-tooltip .eael-tooltip-text',
			]
		);
		$this->add_responsive_control(
			'eael_tooltip_arrow_size',
			[
				'label' => __( 'Arrow Size', 'px-elements'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
					'unit' => 'px',
				],
				'size_units' => [ 'px' ],
				'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 100,
		                'step' => 1,
		            ]
				],
				'selectors' => [
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text:after' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text.eael-tooltip-left::after' => 'top: calc( 50% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text.eael-tooltip-right::after' => 'top: calc( 50% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text.eael-tooltip-top::after' => 'left: calc( 50% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text.eael-tooltip-bottom::after' => 'left: calc( 50% - {{SIZE}}{{UNIT}} );',
				],
			]
		);
		$this->add_control(
			'eael_tooltip_arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'px-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#555',
				'selectors' => [
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text.eael-tooltip-top:after' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text.eael-tooltip-bottom:after' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text.eael-tooltip-left:after' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .eael-tooltip .eael-tooltip-text.eael-tooltip-right:after' => 'border-right-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}


	protected function render( ) {

   		$settings = $this->get_settings_for_display();
   		$target = $settings['eael_tooltip_link']['is_external'] ? 'target="_blank"' : '';
		$nofollow = $settings['eael_tooltip_link']['nofollow'] ? 'rel="nofollow"' : '';
		$icon_migrated = isset($settings['__fa4_migrated']['eael_tooltip_icon_content_new']);
		$icon_is_new = empty($settings['eael_tooltip_icon_content']);
	?>
	<div class="eael-tooltip">
		<?php if( $settings['eael_tooltip_type'] === 'text' ) : ?>
			<<?php echo esc_attr( $settings['eael_tooltip_content_tag'] ); ?> class="eael-tooltip-content"><?php if( $settings['eael_tooltip_enable_link'] === 'yes' ) : ?><a href="<?php echo esc_url( $settings['eael_tooltip_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php endif; ?><?php echo wp_kses_post($settings['eael_tooltip_content']); ?><?php if( $settings['eael_tooltip_enable_link'] === 'yes' ) : ?></a><?php endif; ?></<?php echo esc_attr( $settings['eael_tooltip_content_tag'] ); ?>>
  			<span class="eael-tooltip-text eael-tooltip-<?php echo esc_attr( $settings['eael_tooltip_hover_dir'] ) ?>"><?php echo __( $settings['eael_tooltip_hover_content'] ); ?></span>
  		<?php elseif( $settings['eael_tooltip_type'] === 'icon' ) : ?>
			<span class="eael-tooltip-content"><?php if( $settings['eael_tooltip_enable_link'] === 'yes' ) : ?><a href="<?php echo esc_url( $settings['eael_tooltip_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php endif; ?>
			<?php if ($icon_is_new || $icon_migrated) { ?>
				<?php if( isset($settings['eael_tooltip_icon_content_new']['value']['url']) ) : ?>
					<img class="ea-tooltip-svg-trigger" src="<?php echo esc_attr( $settings['eael_tooltip_icon_content_new']['value']['url'] ); ?>" alt="<?php echo esc_attr(get_post_meta($settings['eael_tooltip_icon_content_new']['value']['id'], '_wp_attachment_image_alt', true)); ?>" />
				<?php else : ?>
					<i class="<?php echo esc_attr( $settings['eael_tooltip_icon_content_new']['value'] ); ?>"></i>
				<?php endif; ?>
			<?php } else { ?>
				<i class="<?php echo esc_attr( $settings['eael_tooltip_icon_content'] ); ?>"></i>
			<?php } ?>
			<?php if( $settings['eael_tooltip_enable_link'] === 'yes' ) : ?></a><?php endif; ?></span>
  			<span class="eael-tooltip-text eael-tooltip-<?php echo esc_attr( $settings['eael_tooltip_hover_dir'] ) ?>"><?php echo __( $settings['eael_tooltip_hover_content'] ); ?></span>
  		<?php elseif( $settings['eael_tooltip_type'] === 'image' ) : ?>
			<span class="eael-tooltip-content"><?php if( $settings['eael_tooltip_enable_link'] === 'yes' ) : ?><a href="<?php echo esc_url( $settings['eael_tooltip_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> ><?php endif; ?><img src="<?php echo esc_url( $settings['eael_tooltip_img_content']['url'] ); ?>" alt="<?php echo esc_attr( get_post_meta($settings['eael_tooltip_img_content']['id'], '_wp_attachment_image_alt', true) ); ?>"><?php if( $settings['eael_tooltip_enable_link'] === 'yes' ) : ?></a><?php endif; ?></span>
  			<span class="eael-tooltip-text eael-tooltip-<?php echo esc_attr( $settings['eael_tooltip_hover_dir'] ) ?>"><?php echo __( $settings['eael_tooltip_hover_content'] ); ?></span>
  		<?php elseif( $settings['eael_tooltip_type'] === 'shortcode' ) : ?>
			<div class="eael-tooltip-content"><?php echo do_shortcode( $settings['eael_tooltip_shortcode_content'] ); ?></div>
  			<span class="eael-tooltip-text eael-tooltip-<?php echo esc_attr( $settings['eael_tooltip_hover_dir'] ) ?>"><?php echo __( $settings['eael_tooltip_hover_content'] ); ?></span>
  		<?php endif; ?>
	</div>
	<?php
	}

	protected function content_template() {}
}
