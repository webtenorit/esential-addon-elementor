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
use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

class Dual_Color_Header extends Widget_Base {

	public function get_name() {
		return 'eael-dual-color-header';
	}

	public function get_title() {
		return esc_html__( 'Dual Color Heading', 'pixerex-elements');
	}

	public function get_icon() {
		return 'eaicon-dual-color-heading';
	}

   	public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	public function get_keywords()
	{
        return [
			'ea header',
			'ea dual header',
			'ea dual color header',
			'heading',
			'headline',
			'title',
			'animated heading',
			'ea',
			'essential addons'
		];
    }

	public function get_custom_help_url()
	{
        return 'https://essential-addons.com/elementor/docs/dual-color-headline/';
    }

	protected function _register_controls() {

  		/**
  		 * Dual Color Heading Content Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_dch_content_settings',
  			[
  				'label' => esc_html__( 'Content Settings', 'pixerex-elements')
  			]
  		);

  		$this->add_control(
		  'eael_dch_type',
		  	[
		   	'label'       	=> esc_html__( 'Content Style', 'pixerex-elements'),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'dch-default',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'dch-default'  					=> esc_html__( 'Default', 'pixerex-elements'),
		     		'dch-icon-on-top'  				=> esc_html__( 'Icon on top', 'pixerex-elements'),
		     		'dch-icon-subtext-on-top'  	=> esc_html__( 'Icon &amp; sub-text on top', 'pixerex-elements'),
		     		'dch-subtext-on-top'  			=> esc_html__( 'Sub-text on top', 'pixerex-elements'),
		     	],
		  	]
		);

		$this->add_control(
			'eael_show_dch_icon_content',
			[
				'label' => __( 'Show Icon', 'pixerex-elements'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'pixerex-elements'),
				'label_off' => __( 'Hide', 'pixerex-elements'),
				'return_value' => 'yes',
				'separator' => 'after',
			]
		);
		/**
		 * Condition: 'eael_show_dch_icon_content' => 'yes'
		 */
		$this->add_control(
			'eael_dch_icon_new',
			[
				'label' => esc_html__( 'Icon', 'pixerex-elements'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'eael_dch_icon',
				'default' => [
					'value' => 'fas fa-snowflake',
					'library' => 'fa-solid',
				],
				'condition' => [
					'eael_show_dch_icon_content' => 'yes'
				]
			]
		);

		$this->add_control(
            'title_tag',
            [
                'label' => __('Title Tag', 'pixerex-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => __('H1', 'pixerex-elements'),
                    'h2' => __('H2', 'pixerex-elements'),
                    'h3' => __('H3', 'pixerex-elements'),
                    'h4' => __('H4', 'pixerex-elements'),
                    'h5' => __('H5', 'pixerex-elements'),
                    'h6' => __('H6', 'pixerex-elements'),
                    'span' => __('Span', 'pixerex-elements'),
                    'p' => __('P', 'pixerex-elements'),
                    'div' => __('Div', 'pixerex-elements'),
                ],
            ]
        );

		$this->add_control(
			'eael_dch_first_title',
			[
				'label' => esc_html__( 'Title ( First Part )', 'pixerex-elements'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Dual Heading', 'pixerex-elements'),
				'dynamic' => [ 'action' => true ]
			]
		);

		$this->add_control(
			'eael_dch_last_title',
			[
				'label' => esc_html__( 'Title ( Last Part )', 'pixerex-elements'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Example', 'pixerex-elements'),
				'dynamic' => [ 'action' => true ]
			]
		);

		$this->add_control(
			'eael_dch_subtext',
			[
				'label' => esc_html__( 'Sub Text', 'pixerex-elements'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Insert a meaningful line to evaluate the headline.', 'pixerex-elements')
			]
		);

		$this->add_responsive_control(
			'eael_dch_content_alignment',
			[
				'label' => esc_html__( 'Alignment', 'pixerex-elements'),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'pixerex-elements'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'pixerex-elements'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'pixerex-elements'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'prefix_class' => 'eael-dual-header-content-align-'
			]
		);

		$this->end_controls_section();

		if(!apply_filters('eael/pro_enabled', false)) {
			$this->start_controls_section(
				'eael_section_pro',
				[
					'label' => __( 'Go Premium for More Features', 'pixerex-elements')
				]
			);

			$this->add_control(
				'eael_control_get_pro',
				[
					'label' => __( 'Unlock more possibilities', 'pixerex-elements'),
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
		 * Tab Style ( Dual Heading Style )
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_dch_style_settings',
			[
				'label' => esc_html__( 'Dual Heading Style', 'pixerex-elements'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_dch_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'pixerex-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-dual-header' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_dch_container_padding',
			[
				'label' => esc_html__( 'Padding', 'pixerex-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-dual-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_dch_container_margin',
			[
				'label' => esc_html__( 'Margin', 'pixerex-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-dual-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_dch_border',
				'label' => esc_html__( 'Border', 'pixerex-elements'),
				'selector' => '{{WRAPPER}} .eael-dual-header',
			]
		);

		$this->add_control(
			'eael_dch_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'pixerex-elements'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-dual-header' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_dch_shadow',
				'selector' => '{{WRAPPER}} .eael-dual-header',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Icon Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_dch_icon_style_settings',
			[
				'label' => esc_html__( 'Icon Style', 'pixerex-elements'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
		     		'eael_show_dch_icon_content' => 'yes'
		     	]
			]
		);

		$this->add_control(
    		'eael_dch_icon_size',
    		[
        		'label' => __( 'Icon Size', 'pixerex-elements'),
       			'type' => Controls_Manager::SLIDER,
        		'default' => [
            		'size' => 36,
        		],
        		'range' => [
					'px' => [
						'min' => 20,
						'max' => 500,
						'step' => 1,
					]
        		],
        		'selectors' => [
					'{{WRAPPER}} .eael-dual-header i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .eael-dual-header img' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};'
        		]
    		]
		);

		$this->add_control(
			'eael_dch_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'pixerex-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .eael-dual-header i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Title Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_dch_title_style_settings',
			[
				'label' => esc_html__( 'Color &amp; Typography', 'pixerex-elements'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'eael_dch_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'pixerex-elements'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'eael_dch_base_title_color',
			[
				'label' => esc_html__( 'Main Color', 'pixerex-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .eael-dual-header .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_dch_dual_title_color',
			[
				'label' => esc_html__( 'Dual Color', 'pixerex-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#1abc9c',
				'selectors' => [
					'{{WRAPPER}} .eael-dual-header .title span.lead' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'eael_dch_first_title_typography',
				'selector' => '{{WRAPPER}} .eael-dual-header .title, {{WRAPPER}} .eael-dual-header .title span',
			]
		);

		$this->add_control(
			'eael_dch_sub_title_heading',
			[
				'label' => esc_html__( 'Sub-title Style ', 'pixerex-elements'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'eael_dch_subtext_color',
			[
				'label' => esc_html__( 'Color', 'pixerex-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#4d4d4d',
				'selectors' => [
					'{{WRAPPER}} .eael-dual-header .subtext' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'eael_dch_subtext_typography',
				'selector' => '{{WRAPPER}} .eael-dual-header .subtext',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$icon_migrated = isset($settings['__fa4_migrated']['eael_dch_icon_new']);
		$icon_is_new = empty($settings['eael_dch_icon']);

	?>
	<?php if( 'dch-default' == $settings['eael_dch_type'] ) : ?>
	<div class="eael-dual-header">
		<<?php echo $settings['title_tag']; ?> class="title"><span class="lead"><?php esc_html_e( $settings['eael_dch_first_title'], 'pixerex-elements'); ?></span> <span><?php esc_html_e( $settings['eael_dch_last_title'], 'pixerex-elements'); ?></span></<?php echo $settings['title_tag']; ?>>
	   <span class="subtext"><?php echo $settings['eael_dch_subtext']; ?></span>
	   <?php if( 'yes' == $settings['eael_show_dch_icon_content'] ) : ?>
			<?php if($icon_is_new || $icon_migrated) { ?>
				<?php if ( isset( $settings['eael_dch_icon_new']['value']['url'] ) ) : ?>
					<img src="<?php echo esc_attr( $settings['eael_dch_icon_new']['value']['url'] ); ?>" alt="<?php echo esc_attr(get_post_meta($settings['eael_dch_icon_new']['value']['id'], '_wp_attachment_image_alt', true)); ?>"/>
				<?php else : ?>
					<i class="<?php echo esc_attr( $settings['eael_dch_icon_new']['value'] ); ?>"></i>
				<?php endif; ?>
			<?php } else { ?>
				<i class="<?php echo esc_attr( $settings['eael_dch_icon'] ); ?>"></i>
			<?php } ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if( 'dch-icon-on-top' == $settings['eael_dch_type'] ) : ?>
	<div class="eael-dual-header">
		<?php if( 'yes' == $settings['eael_show_dch_icon_content'] ) : ?>
			<?php if($icon_is_new || $icon_migrated) { ?>
				<i class="<?php echo esc_attr( $settings['eael_dch_icon_new']['value'] ); ?>"></i>
			<?php } else { ?>
				<i class="<?php echo esc_attr( $settings['eael_dch_icon'] ); ?>"></i>
			<?php } ?>
		<?php endif; ?>
		<<?php echo $settings['title_tag']; ?> class="title"><span class="lead"><?php esc_html_e( $settings['eael_dch_first_title'], 'pixerex-elements'); ?></span> <span><?php esc_html_e( $settings['eael_dch_last_title'], 'pixerex-elements'); ?></span></<?php echo $settings['title_tag']; ?>>
	   <span class="subtext"><?php echo $settings['eael_dch_subtext']; ?></span>
	</div>
	<?php endif; ?>

	<?php if( 'dch-icon-subtext-on-top' == $settings['eael_dch_type'] ) : ?>
	<div class="eael-dual-header">
		<?php if( 'yes' == $settings['eael_show_dch_icon_content'] ) : ?>
			<?php if($icon_is_new || $icon_migrated) { ?>
				<i class="<?php echo esc_attr( $settings['eael_dch_icon_new']['value'] ); ?>"></i>
			<?php } else { ?>
				<i class="<?php echo esc_attr( $settings['eael_dch_icon'] ); ?>"></i>
			<?php } ?>
		<?php endif; ?>
	   <span class="subtext"><?php echo $settings['eael_dch_subtext']; ?></span>
	   <<?php echo $settings['title_tag']; ?> class="title"><span class="lead"><?php esc_html_e( $settings['eael_dch_first_title'], 'pixerex-elements'); ?></span> <span><?php esc_html_e( $settings['eael_dch_last_title'], 'pixerex-elements'); ?></span></<?php echo $settings['title_tag']; ?>>
	</div>
	<?php endif; ?>

	<?php if( 'dch-subtext-on-top' == $settings['eael_dch_type'] ) : ?>
	<div class="eael-dual-header">
	   <span class="subtext"><?php echo $settings['eael_dch_subtext']; ?></span>
			<<?php echo $settings['title_tag']; ?> class="title"><span class="lead"><?php esc_html_e( $settings['eael_dch_first_title'], 'pixerex-elements'); ?></span> <span><?php esc_html_e( $settings['eael_dch_last_title'], 'pixerex-elements'); ?></span></<?php echo $settings['title_tag']; ?>>
		<?php if( 'yes' == $settings['eael_show_dch_icon_content'] ) : ?>
			<?php if($icon_is_new || $icon_migrated) { ?>
				<i class="<?php echo esc_attr( $settings['eael_dch_icon_new']['value'] ); ?>"></i>
			<?php } else { ?>
				<i class="<?php echo esc_attr( $settings['eael_dch_icon'] ); ?>"></i>
			<?php } ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php
	}
}
