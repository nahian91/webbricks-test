<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class WBEA_Brand extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve brand widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-brand-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve brand widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Brand', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-logo';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'webbricks-addons' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'wb', 'brand', 'logos' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// start of the Content tab section
	   	$this->start_controls_section(
	       'brand_sub_heading_content',
		    [
		        'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );

		// Brand Sub Heading Show?
		$this->add_control(
			'wbea_brand_subheading_show_btn',
			[
				'label' => esc_html__( 'Show Sub Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		
		// Brand Sub Heading
		$this->add_control(
			'wbea_brand_subheading',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Brands', 'webbricks-addons'),
				'condition' => [
					'wbea_brand_subheading_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_brand_heading_content',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);

		// Brand Heading
		$this->add_control(
			'wbea_brand_heading',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('All The Renowned Brands And Companies Choose Us ', 'webbricks-addons'),
			]
		);

		

		// Section Heading Separator Style
		$this->add_control(
			'wbea_brand_heading_tag',
			[
				'label' => __( 'Html Tag', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'webbricks-addons' ),
					'h2' => __( 'H2', 'webbricks-addons' ),
					'h3' => __( 'H3', 'webbricks-addons' ),
					'h4' => __( 'H4', 'webbricks-addons' ),
					'h5' => __( 'H5', 'webbricks-addons' ),
					'h6' => __( 'H6', 'webbricks-addons' ),
					'p' => __( 'P', 'webbricks-addons' ),
					'span' => __( 'Span', 'webbricks-addons' ),
					'div' => __( 'Div', 'webbricks-addons' ),
				],
				'default' => 'h2',
			]
		);

		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Content tab section
		$this->start_controls_section(
			'wbea_brand_description_content',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);

		// Brand Description Show?
		$this->add_control(
			'wbea_brand_desc_show_btn',
			[
				'label' => esc_html__( 'Show Description', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Brand Description
		$this->add_control(
			'wbea_brand_desc',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'condition' => [
					'wbea_brand_desc_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_brand_btn_content',
			[
				'label' => esc_html__('Button', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);

		// Brand Button Title
		$this->add_control(
		    'wbea_brand_btn_title',
			[
			    'label' => esc_html__('Button Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Case Studies', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Brand Button Link
		$this->add_control(
		    'wbea_brand_btn_link',
			[
			    'label' => esc_html__( 'Button Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://getwebbricks.com/', 'webbricks-addons' ),
				'default' => [
					'url' => 'https://getwebbricks.com/',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);		
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_brand_logos',
			[
				'label' => esc_html__('Logos', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		 );
		 
		$repeater = new Repeater();

		// Brand Logo Image
		$repeater->add_control(
			'wbea_brand_logo_img',
			[
				'label' => esc_html__( 'Choose Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-1-web-bricks.webp',
				]
			]
		);

		// Brand Logo Link
		$repeater->add_control(
		    'wbea_brand_logo_link',
			[
			    'label' => esc_html__( 'Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);		

		$this->add_control(
			'wbea_brand',
			[
				'label' => esc_html__( 'Brands', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'separator' => 'before',
				'default' => [
					[
						'wbea_brand_logo_img' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-1-web-bricks.webp',
							]
						],
						'wbea_brand_logo_link' => [
							'default' => [
								'url' => 'https://getwebbricks.com',
							]
						]
					],
					[
						'wbea_brand_logo_img' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-2-web-bricks.webp',
							]
						],
						'wbea_brand_logo_link' => [
							'default' => [
								'url' => 'https://getwebbricks.com',
							]
						]
					],
					[
						'wbea_brand_logo_img' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-3-web-bricks.webp',
							]
						],
						'wbea_brand_logo_link' => [
							'default' => [
								'url' => 'https://getwebbricks.com',
							]
						]
					],
					[
						'wbea_brand_logo_img' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-4-web-bricks.webp',
							]
						],
						'wbea_brand_logo_link' => [
							'default' => [
								'url' => 'https://getwebbricks.com',
							]
						]
					],
					[
						'wbea_brand_logo_img' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-5-web-bricks.webp',
							]
						],
						'wbea_brand_logo_link' => [
							'default' => [
								'url' => 'https://getwebbricks.com',
							]
						]
					],
					[
						'wbea_brand_logo_img' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-6-web-bricks.webp',
							]
						],
						'wbea_brand_logo_link' => [
							'default' => [
								'url' => 'https://getwebbricks.com',
							]
						]
					],
					[
						'wbea_brand_logo_img' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-7-web-bricks.webp',
							]
						],
						'wbea_brand_logo_link' => [
							'default' => [
								'url' => 'https://getwebbricks.com',
							]
						]
					],
					[
						'wbea_brand_logo_img' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-9-web-bricks.webp',
							]
						],
						'wbea_brand_logo_link' => [
							'default' => [
								'url' => 'https://getwebbricks.com',
							]
						]
					],
					[
						'wbea_brand_logo_img' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/Logo-8-web-bricks.webp',
							]
						],
						'wbea_brand_logo_link' => [
							'default' => [
								'url' => 'https://getwebbricks.com',
							]
						]
					]
				]
			]
		);

		$this->add_control(
			'important_note',
			[
				'label' => esc_html__( 'Suggestion: 9 brand logos look good, but you can increase or reduce the number of logos as needed.', 'webbricks-addons' ),
				'type' => Controls_Manager::RAW_HTML,
				'content_classes' => 'notice-style',
			]
		);
		 
		$this->end_controls_section();
		 // end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_brand_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	
			]
		 );

		 $this->add_control( 
			'wbea_brand_pro_message_notice', 
			[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => sprintf(
					'<div style="text-align:center;line-height:1.6;">
						<p style="margin-bottom:10px">%s</p>
					</div>',
					esc_html__('Web Bricks Premium is coming soon with more widgets, features, and customization options.', 'webbricks-addons')
				)
			]   
		);
		$this->end_controls_section();
		
		// start of the Style tab section
		$this->start_controls_section(
			'wbea_brand_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_brand_subheading_show_btn' => 'yes'
				],
			]
		);	

		// Brand Subtitle Options
		$this->add_control(
			'wbea_brand_bullet_options',
			[
				'label' => esc_html__( 'Bullet', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_brand_separator_variation',
			[
				'label' => __( 'Style', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'webbricks-addons' ),
					'round' => __( 'Round', 'webbricks-addons' ),
					'square' => __( 'Square', 'webbricks-addons' ),
					'circle' => __( 'Circle', 'webbricks-addons' ),
					'custom' => __( 'Custom', 'webbricks-addons' ),
					'none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'default',
			]
		);

		// Brand Separator Background
		$this->add_control(
			'wbea_brand_sep_background',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Brand Separator Round
		$this->add_control(
			'wbea_brand_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wbea_brand_separator_variation' => 'custom', 
				],
			]
		);

		// Brand Subtitle Options
		$this->add_control(
			'wbea_brand_subtitle_options',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		
		// Brand Subtitle Color
		$this->add_control(
			'wbea_brand_subtitle_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span' => 'color: {{VALUE}}',
				],
			]
		);

		// Brand Subtitle Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_brand_subtitle_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_brand_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Brand Title Color
		$this->add_control(
			'wbea_brand_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title .wbea-section-heading' => 'color: {{VALUE}}',
				],
			]
		);

		// Brand Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_brand_title_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title .wbea-section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_brand_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Brand Description Color
		$this->add_control(
			'wbea_brand_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-brand p, {{WRAPPER}} .wbea-brand ul, {{WRAPPER}} .wbea-brand ol' => 'color: {{VALUE}}',
				],
			]
		);

		// Brand Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_brand_desc_typography',
				'selector' => '{{WRAPPER}} .wbea-brand p, {{WRAPPER}} .wbea-brand ul, {{WRAPPER}} .wbea-brand ol',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'brand_logos_btn_section',
			[
				'label' => esc_html__( 'Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		$this->start_controls_tabs(
			'wp_brand_btn_style_tab'
		);

		// Brand Button Normal Tab
		$this->start_controls_tab(
			'wbea_brand_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Brand Button Color
		$this->add_control(
			'wbea_brand_btn_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Brand Button Border
		$this->add_control(
			'wbea_brand_btn_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Brand Button Border Radius
		$this->add_control(
			'wbea_brand_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Brand Button Padding
		$this->add_control(
			'wbea_brand_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Brand Button Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_brand_btn_typography',
				'selector' => '{{WRAPPER}} .wbea-btn-border',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_tab();

		// Brand Button Hover Tab
		$this->start_controls_tab(
			'wbea_brand_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Brand Button Hover Color
		$this->add_control(
			'wbea_brand_btn_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .wbea-btn-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Brand Button Hover Background
		$this->add_control(
			'wbea_brand_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Brand Button Hover Border
		$this->add_control(
			'wbea_brand_btn_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// start of the Logos tab section
		$this->start_controls_section(
			'brand_logos_style_section',
			[
				'label' => esc_html__( 'Logos', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Logos Padding
		$this->add_control(
			'wbea_logos_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-brand-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Logos Border Color
		$this->add_control(
			'wbea_logos_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-brand-img .wb-grid-desktop-4, .wbea-brand-img .wb-grid-mobile-12, {{WRAPPER}} .wbea-brand-img' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Logos Border Radius
		$this->add_control(
			'wbea_logos_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-brand-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

	}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// Get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$wbea_brand_subheading_show_btn = $settings['wbea_brand_subheading_show_btn'];
		$wbea_brand_subheading = isset($settings['wbea_brand_subheading']) ? $settings['wbea_brand_subheading'] : '';
		$wbea_brand_heading = isset($settings['wbea_brand_heading']) ? $settings['wbea_brand_heading'] : '';
		$wbea_brand_heading_tag = isset($settings['wbea_brand_heading_tag']) ? $settings['wbea_brand_heading_tag'] : 'h2';
		$wbea_brand_desc = isset($settings['wbea_brand_desc']) ? $settings['wbea_brand_desc'] : '';
		$wbea_brand_btn_title = isset($settings['wbea_brand_btn_title']) ? $settings['wbea_brand_btn_title'] : '';
		$wbea_brand_btn_link = isset($settings['wbea_brand_btn_link']['url']) ? $settings['wbea_brand_btn_link']['url'] : '';
		$wbea_brand = isset($settings['wbea_brand']) ? $settings['wbea_brand'] : [];
		?>
		<!-- Brand Start Here -->
		<section class="wbea-brand">
			<div class="wb-grid-row align-center">
				<div class="wb-grid-desktop-5 wb-grid-tablet-12 wb-grid-mobile-12">
					<div class="wbea-section-title">
						<?php 
						if ($wbea_brand_subheading_show_btn === 'yes' && !empty($wbea_brand_subheading)) {
							$wbea_brand_separator_variation = isset($settings['wbea_brand_separator_variation']) ? $settings['wbea_brand_separator_variation'] : '';
						?>
							<span class="<?php echo esc_attr($wbea_brand_separator_variation); ?> wbea-section-subheading">
								<?php echo esc_html($wbea_brand_subheading); ?>
							</span>
						<?php 
						}
						?>
						<<?php echo esc_attr($wbea_brand_heading_tag); ?> class="wbea-section-heading">
							<?php echo esc_html($wbea_brand_heading); ?>
						</<?php echo esc_attr($wbea_brand_heading_tag); ?>>
					</div> <!-- section-heading end here -->
					<div class="wbea-brand-title">
						<p><?php echo wp_kses_post($wbea_brand_desc); ?></p>
						<?php if (!empty($wbea_brand_btn_link)) : ?>
							<?php
								$btn_target = (isset($settings['wbea_brand_btn_link']['is_external']) && $settings['wbea_brand_btn_link']['is_external']) ? ' target="_blank"' : '';
								$btn_nofollow = (isset($settings['wbea_brand_btn_link']['nofollow']) && $settings['wbea_brand_btn_link']['nofollow']) ? ' rel="nofollow"' : '';
							?>
							<a href="<?php echo esc_url($wbea_brand_btn_link); ?>" class="wbea-btn-border" <?php echo esc_attr($btn_target) . esc_attr($btn_nofollow); ?>>
								<?php echo esc_html($wbea_brand_btn_title); ?>
								<svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.6484 7.05859L13.1484 11.5586C12.7266 12.0156 11.9883 12.0156 11.5664 11.5586C11.1094 11.1367 11.1094 10.3984 11.5664 9.97656L14.1328 7.375H1.125C0.492188 7.375 0 6.88281 0 6.25C0 5.58203 0.492188 5.125 1.125 5.125H14.1328L11.5664 2.55859C11.1094 2.13672 11.1094 1.39844 11.5664 0.976562C11.9883 0.519531 12.7266 0.519531 13.1484 0.976562L17.6484 5.47656C18.1055 5.89844 18.1055 6.63672 17.6484 7.05859Z" fill="var(--e-global-color-accent)"/>
								</svg>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="wb-grid-desktop-7 wb-grid-tablet-12 wb-grid-mobile-12">
					<div class="wb-grid-row wbea-brand-img">
						<?php 
						if (!empty($wbea_brand) && is_array($wbea_brand) && count($wbea_brand) > 0) {
							foreach ($wbea_brand as $brand) {
								$brand_img = isset($brand['wbea_brand_logo_img']['url']) ? $brand['wbea_brand_logo_img']['url'] : '';
								$brand_logo_link = isset($brand['wbea_brand_logo_link']['url']) ? $brand['wbea_brand_logo_link']['url'] : '';
								if ($brand_img && $brand_logo_link) {
						?>
								<div class="wb-grid-desktop-4 wb-grid-tablet-4 wb-grid-mobile-12">
									<a href="<?php echo esc_url($brand_logo_link); ?>" target="_blank">
										<div class="wbea-brand-logo-img" style="background-image:url('<?php echo esc_url($brand_img); ?>')"></div>
									</a>
								</div>
						<?php
								}
							}
						}
						?>
					</div>
				</div>
			</div>
		</section>            
		<!-- Brand End Here -->
		<?php
	}	
}