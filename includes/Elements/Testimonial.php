<?php
namespace Essential_Addons_Elementor\Elements;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Image_Size as Group_Control_Image_Size;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

class Testimonial extends Widget_Base {

	public function get_name() {
		return 'eael-testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'px-elements');
	}

	public function get_icon() {
		return 'eaicon-testimonial';
	}

   	public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	public function get_keywords()
	{
        return [
			'testimonial',
			'ea testimonial',
			'ea testimonials',
			'testimony',
			'review',
			'endorsement',
			'recommendation',
			'reference',
			'appreciation',
			'feedback',
			'star rating',
			'social proof',
			'ea',
			'essential addons'
		];
    }

	public function get_custom_help_url()
	{
        return 'https://essential-addons.com/elementor/docs/testimonials/';
    }

	public function get_style_depends()
    {
        return [
            'font-awesome-5-all',
            'font-awesome-4-shim',
        ];
    }

    public function get_script_depends()
    {
        return [
            'font-awesome-4-shim'
        ];
    }


	protected function _register_controls() {


  		$this->start_controls_section(
  			'eael_section_testimonial_image',
  			[
  				'label' => esc_html__( 'Testimonial Image', 'px-elements')
  			]
  		);

		$this->add_control(
			'eael_testimonial_enable_avatar',
			[
				'label' => esc_html__( 'Display Avatar?', 'px-elements'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Testimonial Avatar', 'px-elements'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'eael_testimonial_enable_avatar' => 'yes',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'		=> 'image',
				'default'	=> 'thumbnail',
				'condition' => [
					'image[url]!' => '',
					'eael_testimonial_enable_avatar' => 'yes',
				],
			]
		);


		$this->end_controls_section();

  		$this->start_controls_section(
  			'eael_section_testimonial_content',
  			[
  				'label' => esc_html__( 'Testimonial Content', 'px-elements')
  			]
  		);

		$this->add_control(
			'eael_testimonial_name',
			[
				'label' => esc_html__( 'User Name', 'px-elements'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'px-elements'),
				'dynamic' => [ 'active' => true ]
			]
		);

		$this->add_control(
			'eael_testimonial_company_title',
			[
				'label' => esc_html__( 'Company Name', 'px-elements'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Codetic', 'px-elements'),
				'dynamic' => [ 'active' => true ]
			]
		);

		$this->add_control(
			'eael_testimonial_description',
			[
				'label' => esc_html__( 'Testimonial Description', 'px-elements'),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Add testimonial description here. Edit and place your own text.', 'px-elements'),
			]
		);

		$this->add_control(
			'content_height',
			[
				'label' => esc_html__( 'Description Height', 'px-elements'),
				'type' => Controls_Manager::SLIDER,
				'size_units'	=> ['px', '%', 'em'],
				'range' => [
					'px' => [ 'max' => 300 ],
					'%'	=> [ 'max'	=> 100 ]
				],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'eael_testimonial_enable_rating',
			[
				'label' => esc_html__( 'Display Rating?', 'px-elements'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);


		$this->add_control(
		  'eael_testimonial_rating_number',
		  [
		     'label'       => __( 'Rating Number', 'px-elements'),
		     'type' => Controls_Manager::SELECT,
		     'default' => 'rating-five',
		     'options' => [
		     	'rating-one'  => __( '1', 'px-elements'),
		     	'rating-two' => __( '2', 'px-elements'),
		     	'rating-three' => __( '3', 'px-elements'),
		     	'rating-four' => __( '4', 'px-elements'),
		     	'rating-five'   => __( '5', 'px-elements'),
		     ],
			'condition' => [
				'eael_testimonial_enable_rating' => 'yes',
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


		$this->start_controls_section(
			'eael_section_testimonial_styles_general',
			[
				'label' => esc_html__( 'Testimonial Styles', 'px-elements'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_testimonial_style',
			[
				'label'		=> __( 'Select Style', 'px-elements'),
				'type'		=> Controls_Manager::SELECT,
				'default'	=> 'default-style',
				'options'	=> [
					'default-style'						=> __( 'Default', 'px-elements'),
					'classic-style'						=> __( 'Classic', 'px-elements'),
					'middle-style'						=> __( 'Content | Icon/Image | Bio', 'px-elements'),
					'icon-img-left-content'				=> __( 'Icon/Image | Content', 'px-elements'),
					'icon-img-right-content'			=> __( 'Content | Icon/Image', 'px-elements'),
					'content-top-icon-title-inline'		=> __( 'Content Top | Icon Title Inline', 'px-elements'),
					'content-bottom-icon-title-inline'	=> __( 'Content Bottom | Icon Title Inline', 'px-elements')
				]
			]
		);

		$this->add_control(
			'eael_testimonial_alignment',
			[
				'label' => esc_html__( 'Layout Alignment', 'px-elements'),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'default' => [
						'title' => __( 'Default', 'px-elements'),
						'icon' => 'fa fa-ban',
					],
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
				],
				'default' => 'default',
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .eael-testimonial-image' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_testimonial_user_display_block',
			[
				'label' => esc_html__( 'Display User & Company Block?', 'px-elements'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'eael_section_testimonial_image_styles',
			[
				'label' => esc_html__( 'Testimonial Image Style', 'px-elements'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'eael_testimonial_enable_avatar'	=> 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'eael_testimonial_image_width',
			[
				'label' => esc_html__( 'Image Width', 'px-elements'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 150,
					'unit' => 'px',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-image figure > img' => 'width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_testimonial_max_image_width',
			[
				'label' => esc_html__( 'Image Max Width', 'px-elements'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ '%' ],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-image' => 'max-width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_testimonial_image_margin',
			[
				'label' => esc_html__( 'Margin', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_testimonial_image_padding',
			[
				'label' => esc_html__( 'Padding', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_testimonial_image_border',
				'label' => esc_html__( 'Border', 'px-elements'),
				'selector' => '{{WRAPPER}} .eael-testimonial-image img',
			]
		);

		$this->add_control(
			'eael_testimonial_image_rounded',
			[
				'label' => esc_html__( 'Rounded Avatar?', 'px-elements'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'testimonial-avatar-rounded',
				'default' => '',
			]
		);


		$this->add_control(
			'eael_testimonial_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-image img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
				'condition' => [
					'eael_testimonial_image_rounded!' => 'testimonial-avatar-rounded',
				],
			]
		);

		$this->end_controls_section();

		// color, Typography & Spacing
		$this->start_controls_section(
			'eael_section_testimonial_typography',
			[
				'label' => esc_html__( 'Color, Typography &amp; Spacing', 'px-elements'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_testimonial_name_heading',
			[
				'label' => __( 'User Name', 'px-elements'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'eael_testimonial_name_color',
			[
				'label' => esc_html__( 'User Name Color', 'px-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content .eael-testimonial-user' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_testimonial_name_typography',
				'selector' => '{{WRAPPER}} .eael-testimonial-content .eael-testimonial-user',
			]
		);

		$this->add_control(
			'eael_testimonial_name_margin',
			[
				'label' => esc_html__( 'Margin', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content .eael-testimonial-user' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'eael_testimonial_company_heading',
			[
				'label' 	=> __( 'Company Name', 'px-elements'),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before'
			]
		);

		$this->add_control(
			'eael_testimonial_company_color',
			[
				'label' => esc_html__( 'Company Color', 'px-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content .eael-testimonial-user-company' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_testimonial_position_typography',
				'selector' => '{{WRAPPER}} .eael-testimonial-content .eael-testimonial-user-company',
			]
		);

		$this->add_control(
			'eael_testimonial_company_margin',
			[
				'label' => esc_html__( 'Margin', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content .eael-testimonial-user-company' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'eael_testimonial_description_heading',
			[
				'label' => __( 'Testimonial Text', 'px-elements'),
				'type' => Controls_Manager::HEADING,
				'separator'	=> 'before'
			]
		);

		$this->add_control(
			'eael_testimonial_description_color',
			[
				'label' => esc_html__( 'Testimonial Text Color', 'px-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => '#7a7a7a',
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content .eael-testimonial-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             	'name' => 'eael_testimonial_description_typography',
				'selector' => '{{WRAPPER}} .eael-testimonial-content .eael-testimonial-text',
			]
		);

		$this->add_control(
			'eael_testimonial_description_margin',
			[
				'label' => esc_html__( 'Margin', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content .eael-testimonial-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'eael_testimonial_rating_heading',
			[
				'label' => __( 'Rating', 'px-elements'),
				'type' => Controls_Manager::HEADING,
				'separator'	=> 'before'
			]
		);

		$this->add_control(
			'eael_testimonial_rating_item_distance',
			[
				'label' => esc_html__( 'Distance Between Rating Item', 'px-elements'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content .testimonial-star-rating li' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'eael_testimonial_rating_margin',
			[
				'label' => esc_html__( 'Margin', 'px-elements'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-content .testimonial-star-rating' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'eael_section_testimonial_quotation_typography',
			[
				'label' => esc_html__( 'Quotation Style', 'px-elements'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_testimonial_quotation_color',
			[
				'label' => esc_html__( 'Quotation Mark Color', 'px-elements'),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0.15)',
				'selectors' => [
					'{{WRAPPER}} .eael-testimonial-quote' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_testimonial_quotation_typography',
				'selector' => '{{WRAPPER}} .eael-testimonial-quote',
			]
		);

		$this->add_responsive_control(
			'eael_testimonial_quotation_top',
			[
				'label' => esc_html__( 'Quotation Postion From Top', 'px-elements'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					]
				],
				'size_units' => [ '%' ],
				'selectors' => [
					'{{WRAPPER}} span.eael-testimonial-quote' => 'top:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_testimonial_quotation_right',
			[
				'label' => esc_html__( 'Quotation Postion From Right', 'px-elements'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					]
				],
				'size_units' => [ '%' ],
				'selectors' => [
					'{{WRAPPER}} span.eael-testimonial-quote' => 'right:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render_testimonial_image() {
		$settings = $this->get_settings();
		$image = Group_Control_Image_Size::get_attachment_image_html( $settings );
		if( ! empty($image) && ! empty($settings['eael_testimonial_enable_avatar']) ) {
			ob_start();
			?>
			<div class="eael-testimonial-image">
				<?php if( 'yes' == $settings['eael_testimonial_enable_avatar'] ) : ?>
					<figure><?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?></figure>
				<?php endif; ?>
			</div>
			<?php
			echo ob_get_clean();
		}
	}

	protected function render_testimonial_rating() {
		$settings = $this->get_settings_for_display('eael_testimonial_enable_rating');

		if ( $settings == 'yes' ) :
			ob_start();
		?>
		<ul class="testimonial-star-rating">
			<li><i class="fas fa-star" aria-hidden="true"></i></li>
			<li><i class="fas fa-star" aria-hidden="true"></i></li>
			<li><i class="fas fa-star" aria-hidden="true"></i></li>
			<li><i class="fas fa-star" aria-hidden="true"></i></li>
			<li><i class="fas fa-star" aria-hidden="true"></i></li>
		</ul>
		<?php
			echo ob_get_clean();
		endif;
	}

	protected function render_user_name_and_company() {
		$settings = $this->get_settings_for_display();
		if( ! empty($settings['eael_testimonial_name']) ) : ?><p <?php echo $this->get_render_attribute_string('eael_testimonial_user'); ?>><?php echo $settings['eael_testimonial_name']; ?></p><?php endif;
		if( ! empty($settings['eael_testimonial_company_title']) ) : ?><p class="eael-testimonial-user-company"><?php echo $settings['eael_testimonial_company_title']; ?></p><?php endif;
	}

	protected function testimonial_quote() {
		echo '<span class="eael-testimonial-quote"></span>';
	}

	protected function testimonial_desc() {
		$settings = $this->get_settings_for_display();
		echo '<div class="eael-testimonial-text">'.wpautop($settings['eael_testimonial_description']).'</div>';
	}


	protected function render() {

	  $settings = $this->get_settings_for_display();
	  $rating = $this->get_settings_for_display('eael_testimonial_enable_rating');

	  $this->add_render_attribute(
		  'eael_testimonial_wrap',
		  [
			  'id'	=> 'eael-testimonial-'.esc_attr($this->get_id()),
			  'class'	=> [
				  'eael-testimonial-item',
				  'clearfix',
				  $this->get_settings('eael_testimonial_image_rounded'),
				  esc_attr($settings['eael_testimonial_style']),
			  ]
		  ]
	  );

	if ( $rating == 'yes' )
		$this->add_render_attribute('eael_testimonial_wrap', 'class', $this->get_settings('eael_testimonial_rating_number'));

	$this->add_render_attribute('eael_testimonial_user', 'class', 'eael-testimonial-user');
	if ( ! empty( $settings['eael_testimonial_user_display_block'] ) )
		$this->add_render_attribute('eael_testimonial_user', 'style', 'display: block; float: none;');


	?>

	<div <?php echo $this->get_render_attribute_string('eael_testimonial_wrap'); ?>>

		<?php if('classic-style' == $settings['eael_testimonial_style']) { ?>
			<div class="eael-testimonial-content">
				<?php
					// $this->testimonial_quote();
					$this->testimonial_desc();
				?>
				<div class="clearfix">
					<?php $this->render_user_name_and_company(); ?>
				</div>
				<?php $this->render_testimonial_rating( $settings ); ?>
			</div>
			<?php $this->render_testimonial_image(); ?>
		<?php } ?>

		<?php if('middle-style' == $settings['eael_testimonial_style']) { ?>
			<div class="eael-testimonial-content">
				<?php
					// $this->testimonial_quote();
					$this->testimonial_desc();
				?>
				<?php $this->render_testimonial_image(); ?>
				<div class="clearfix">
					<?php $this->render_user_name_and_company(); ?>
				</div>
				<?php $this->render_testimonial_rating( $settings ); ?>
			</div>
		<?php } ?>

		<?php if('default-style' == $settings['eael_testimonial_style']) { ?>
			<?php $this->render_testimonial_image(); ?>
			<div class="eael-testimonial-content">
				<?php
					// $this->testimonial_quote();
					$this->testimonial_desc();
					$this->render_testimonial_rating( $settings );
					$this->render_user_name_and_company();
				?>
			</div>
		<?php } ?>

		<?php if('icon-img-left-content' == $settings['eael_testimonial_style']) { ?>
			<?php
				// $this->testimonial_quote();
				$this->render_testimonial_image();
			?>
			<div class="eael-testimonial-content">
				<?php
					$this->testimonial_desc();
					$this->render_testimonial_rating( $settings );
				?>
				<div class="bio-text clearfix">
					<?php $this->render_user_name_and_company(); ?>
				</div>
			</div>
		<?php } ?>

		<?php if('icon-img-right-content' == $settings['eael_testimonial_style']) { ?>
			<?php
				// $this->testimonial_quote();
				$this->render_testimonial_image();
			?>
			<div class="eael-testimonial-content">
				<?php
					$this->testimonial_desc();
					$this->render_testimonial_rating( $settings );
				?>
				<div class="bio-text-right"><?php $this->render_user_name_and_company(); ?></div>
			</div>
		<?php } ?>

		<?php if('content-top-icon-title-inline' == $settings['eael_testimonial_style']) { ?>
			<div class="eael-testimonial-content eael-testimonial-inline-bio">
				<?php $this->render_testimonial_image(); ?>
				<div class="bio-text"><?php $this->render_user_name_and_company(); ?></div>
				<?php $this->render_testimonial_rating( $settings ); ?>
			</div>
			<div class="eael-testimonial-content">
				<?php $this->testimonial_desc(); ?>
			</div>
		<?php } ?>

		<?php if('content-bottom-icon-title-inline' == $settings['eael_testimonial_style']) { ?>
			<div class="eael-testimonial-content">
				<?php $this->testimonial_desc(); ?>
			</div>
			<div class="eael-testimonial-content eael-testimonial-inline-bio">
				<?php $this->render_testimonial_image(); ?>
				<div class="bio-text"><?php $this->render_user_name_and_company(); ?></div>
				<?php $this->render_testimonial_rating( $settings ); ?>
			</div>
		<?php } ?>

		<?php $this->testimonial_quote(); ?>

	</div>

	<?php }

	protected function content_template() {}
}
