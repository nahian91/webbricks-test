<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class WBEA_Hero extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve hero widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-hero-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve hero widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Hero', 'webbricks-addons' );
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
		return 'wb-icon eicon-single-page';
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
		return [ 'hero', 'banner', 'wb'];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	*/
	protected function register_controls() {

		// Start of the Content Tab Section
		$this->start_controls_section(
			'wbea_hero_subheading_contents',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
			]
		);
		 
		// Hero Sub Heading
		$this->add_control(
			'wbea_hero_subheading',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('MAKE A CHANGE', 'webbricks-addons'),
			]
		);		

		// Section Heading Separator Style
		$this->add_control(
			'wbea_hero_subheading_tag',
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
				'default' => 'span',
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Start of the Content Tab Section
		$this->start_controls_section(
			'wbea_hero_heading_contents',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
			]
		);
		
		// Hero Heading
		$this->add_control(
			'wbea_hero_heading',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Let’s See The World In A Better Way', 'webbricks-addons'),
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_hero_heading_tag',
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
				'default' => 'h1',
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Start of the Content Tab Section
		$this->start_controls_section(
			'wbea_hero_desc_contents',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
			]
		);
		
		// Hero Description
		$this->add_control(
			'wbea_hero_desc',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.', 'webbricks-addons'),
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section
		
		// Start of the Buttons Tab Section
	   	$this->start_controls_section(
	       'wbea_hero_buttons',
		    [
		        'label' => esc_html__('Buttons', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );
		
		// Hero Button 1 Heading
		$this->add_control(
		    'wbea_hero_btn1_title',
			[
			    'label' => esc_html__('Button 1 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('See Services', 'webbricks-addons')
			]
		);

		// Hero Button 1 Link
		$this->add_control(
		    'wbea_hero_btn1_link',
			[
			    'label' => esc_html__( 'Button 1 Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);		
		
		// Hero Button 2 Heading
		$this->add_control(
		    'wbea_hero_btn2_title',
			[
			    'label' => esc_html__('Button 2 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Details', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Hero Button 2 Link
		$this->add_control(
		    'wbea_hero_btn2_link',
			[
			    'label' => esc_html__( 'Button 2 Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
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
			'wbea_hero_images',
			[
				'label' => esc_html__('Images', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);
		 
		// Hero Featured Image
		$this->add_control(
			'wbea_hero_featured_img',
			[
				'label' => esc_html__( 'Choose Featured Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/Hero-web-bricks.webp',
				],
			]
		);

		// Hero Background Image
		$this->add_control(
			'wbea_hero_bg_img',
			[
				'label' => esc_html__( 'Choose Background Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => plugins_url( 'assets/img/hero-bg.png', dirname(__FILE__, 2) ),
				]
			]
		);
		 
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_hero_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wbea_hero_pro_message_notice', 
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
			'wbea_hero_content_style',
			[
				'label' => esc_html__( 'Content Box', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_hero_content_bg_pattern',
			[
				'label' => __( 'Background Pattern', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'hero-pattern-1' => __( 'Style 1', 'webbricks-addons' ),
					'hero-pattern-2' => __( 'Style 2', 'webbricks-addons' ),
					'hero-pattern-3' => __( 'Style 3', 'webbricks-addons' ),
					'hero-pattern-none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'hero-pattern-1',
			]
		);

		// Hero Background
		$this->add_control(
			'wbea_hero_content_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-content' => 'background-color: {{VALUE}}',
				],
			]
		);

		// Hero Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wbea_hero_content_border',
				'selector' => '{{WRAPPER}} .wbea-hero-content',
			]
		);	

		// Hero Border Radius
		$this->add_control(
			'wbea_hero_content_border',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hero Padding
		$this->add_control(
			'wbea_hero_content_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hero Alignment
		$this->add_control(
			'wbea_hero_content_alignment',
			[
				'type' => Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'webbricks-addons' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'webbricks-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-content' => 'text-align: {{VALUE}}',
				],
				'separator' => 'before'
			],
		);

		$this->end_controls_section();	
		
		// start of the Style tab section
		$this->start_controls_section(
			'wbea_hero_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Sub Heading Color
		$this->add_control(
			'wbea_hero_subheading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-content .wbea-hero-subheading' => 'color: {{VALUE}}',
				],
			]
		);

		// Hero Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_hero_subheading_typography',
				'selector' => '{{WRAPPER}} .wbea-hero-content .wbea-hero-subheading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();	

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_hero_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Heading Color
		$this->add_control(
			'wbea_hero_heading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-content .wbea-hero-heading' => 'color: {{VALUE}}',
				],
			]
		);

		// Hero Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_hero_heading_typography',
				'selector' => '{{WRAPPER}} .wbea-hero-content .wbea-hero-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();	

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_hero_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Description Color
		$this->add_control(
			'wbea_hero_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-content, {{WRAPPER}} .wbea-hero-content p, {{WRAPPER}} .wbea-hero-content ul, {{WRAPPER}} .wbea-hero-content ol' => 'color: {{VALUE}}',
				],
			]
		);

		// Hero Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_hero_desc_typography',
				'selector' => '{{WRAPPER}} .wbea-hero-content, {{WRAPPER}} .wbea-hero-content p, {{WRAPPER}} .wbea-hero-content ul, {{WRAPPER}} .wbea-hero-content ol',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();	

		$this->start_controls_section(
			'wbea_hero_buttons_style',
			[
				'label' => esc_html__( 'Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Button 1 Options
		$this->add_control(
			'wbea_hero_button1_options',
			[
				'label' => esc_html__( 'Button 1', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_hero_btn1_style_tab'
		);

		// Hero Button 1 Normal Tab
		$this->start_controls_tab(
			'wbea_hero_btn1_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Hero Button 1 Color
		$this->add_control(
			'wbea_hero_btn1_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Hero Button 1 Background
		$this->add_control(
			'wbea_hero_btn1_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Hero Button 1 Border Color
		$this->add_control(
			'wbea_hero_btn1_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg' => 'border-right-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Hero Button 1 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_hero_btn1_typography',
				'selector' => '{{WRAPPER}} .wbea-btn-bg',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Hero Button 1 Border Radius
		$this->add_control(
			'wbea_hero_btn1_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hero Button 1 Padding
		$this->add_control(
			'wbea_hero_btn1_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hero Button 1 Hover Tab
		$this->start_controls_tab(
			'wbea_hero_btn1_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Hero Button 1 Hover Color
		$this->add_control(
			'wbea_hero_btn1_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg:hover' => 'color: {{VALUE}}', 
            		'{{WRAPPER}} .wbea-btn-bg:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Hero Button 1 Hover Background
		$this->add_control(
			'wbea_hero_btn1_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Hero Button 1 Hover Border
		$this->add_control(
			'wbea_hero_btn1_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		// Hero Button 2 Options
		$this->add_control(
			'wbea_hero_button2_options',
			[
				'label' => esc_html__( 'Button 2', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_hero_btn2_style_tab'
		);

		// Hero Button 2 Normal Tab
		$this->start_controls_tab(
			'wbea_hero_btn2_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Hero Button 2 Color
		$this->add_control(
			'wbea_hero_btn2_color',
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

		// Hero Button 2 Border
		$this->add_control(
			'wbea_hero_btn2_border',
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

		// Hero Button 2 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_hero_btn2_typography',
				'selector' => '{{WRAPPER}} .wbea-btn-border',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		// Hero Button 2 Border Radius
		$this->add_control(
			'wbea_hero_btn2_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hero Button 2 Padding
		$this->add_control(
			'wbea_hero_btn2_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Hero Button 2 Hover Tab
		$this->start_controls_tab(
			'wbea_hero_btn2_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Hero Button 2 Hover Color
		$this->add_control(
			'wbea_hero_btn2_hover_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
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

		// Hero Button 2 Hover Background
		$this->add_control(
			'wbea_hero_btn2_hover_bg',
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

		// Hero Button 2 Hover Border
		$this->add_control(
			'wbea_hero_btn2_hover_border',
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

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_hero_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Hero Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wbea_hero_image_border',
				'selector' => '{{WRAPPER}} .wbea-hero-img',
			]
		);	

		// Hero Image Border Radius
		$this->add_control(
			'wbea_hero_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Hero Image Width
		$this->add_control(
			'wbea_hero_image_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Hero Image Height
		$this->add_control(
			'wbea_hero_image_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-hero-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();	

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
		// Get input from the widget settings.
		$settings = $this->get_settings_for_display();      
		$wbea_hero_subheading = isset($settings['wbea_hero_subheading']) ? $settings['wbea_hero_subheading'] : '';
		$wbea_hero_subheading_tag = $settings['wbea_hero_subheading_tag'];
		$wbea_hero_heading = isset($settings['wbea_hero_heading']) ? $settings['wbea_hero_heading'] : '';
		$wbea_hero_heading_tag = $settings['wbea_hero_heading_tag'];
		$wbea_hero_desc = isset($settings['wbea_hero_desc']) ? $settings['wbea_hero_desc'] : '';
		$wbea_hero_btn1_title = isset($settings['wbea_hero_btn1_title']) ? $settings['wbea_hero_btn1_title'] : '';
		$wbea_hero_btn1_link = isset($settings['wbea_hero_btn1_link']['url']) ? $settings['wbea_hero_btn1_link']['url'] : '';
		$wbea_hero_btn2_title = isset($settings['wbea_hero_btn2_title']) ? $settings['wbea_hero_btn2_title'] : '';
		$wbea_hero_btn2_link = isset($settings['wbea_hero_btn2_link']['url']) ? $settings['wbea_hero_btn2_link']['url'] : '';
		$wbea_hero_featured_img = isset($settings['wbea_hero_featured_img']['url']) ? $settings['wbea_hero_featured_img']['url'] : '';
		$wbea_hero_content_bg_pattern = $settings['wbea_hero_content_bg_pattern'];
	
		// Allow-list for heading tags
		$allowed_heading_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'div', 'span'];
		$wbea_hero_subheading_tag = in_array($wbea_hero_subheading_tag, $allowed_heading_tags, true) ? $wbea_hero_subheading_tag : 'h2';
		$wbea_hero_heading_tag = in_array($wbea_hero_heading_tag, $allowed_heading_tags, true) ? $wbea_hero_heading_tag : 'h1';
	
		// Set hero background pattern URL
		$hero_pattern_url = '';
		switch ($wbea_hero_content_bg_pattern) {
			case 'hero-pattern-1':
				$hero_pattern_url = 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/hero-pattern-8-web-bricks.webp';
				break;
			case 'hero-pattern-2':
				$hero_pattern_url = 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/hero-pattern-3-web-bricks.webp';
				break;
			case 'hero-pattern-3':
				$hero_pattern_url = 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/hero-pattern-4-web-bricks.webp';
				break;
			default:
				$hero_pattern_url = 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/hero-pattern-8-web-bricks.webp';
				break;
		}
	
		// Add inline style for hero background pattern if applicable
		?>
		<?php if(isset($wbea_hero_content_bg_pattern) && $wbea_hero_content_bg_pattern !== 'hero-pattern-none' && isset($hero_pattern_url)) { ?>
			<style>
				.wbea-hero:before {
					content: "";
					position: absolute;                
					background-image: url('<?php echo esc_url($hero_pattern_url); ?>');
					width: 65%;
					height: 100%;
					background-size: cover;
					background-position: center;
					z-index: -1;
				}
			</style>
		<?php } ?>
	
		<!-- Hero Start Here -->
		<section class="wbea-hero">
			<div class="wb-grid-row align-center mob-flex-column">
				<!-- Hero Content Section -->
				<div class="wb-grid-desktop-5 wb-grid-tablet-6 wb-grid-mobile-12">
					<div class="wbea-hero-content">
						<<?php echo esc_attr($wbea_hero_subheading_tag); ?> class="wbea-hero-subheading"><?php echo esc_html($wbea_hero_subheading); ?></<?php echo esc_attr($wbea_hero_subheading_tag); ?>>
						<<?php echo esc_attr($wbea_hero_heading_tag); ?> class="wbea-hero-heading"><?php echo esc_html($wbea_hero_heading); ?></<?php echo esc_attr($wbea_hero_heading_tag); ?>>
						<p><?php echo wp_kses_post($wbea_hero_desc); ?> </p>
						<div class="wbea-hero-btn">
							<?php if($wbea_hero_btn1_link) : ?>
								<?php 
									// Set target and rel attributes for button 1
									$btn1_target = (isset($settings['wbea_hero_btn1_link']['is_external']) && $settings['wbea_hero_btn1_link']['is_external']) ? ' target="_blank"' : '';
									$btn1_nofollow = (isset($settings['wbea_hero_btn1_link']['nofollow']) && $settings['wbea_hero_btn1_link']['nofollow']) ? ' rel="nofollow"' : '';
								?>
								<a href="<?php echo esc_url($wbea_hero_btn1_link); ?>" class="wbea-btn-bg" <?php echo esc_attr($btn1_target) . esc_attr($btn1_nofollow); ?>><?php echo esc_html($wbea_hero_btn1_title); ?> 
								<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z" fill="var(--e-global-color-accent)"></path>
								</svg>
								</a>
							<?php endif; ?>
	
							<?php if($wbea_hero_btn2_link) : ?>
								<?php 
									// Set target and rel attributes for button 1
									$btn2_target = (isset($settings['wbea_hero_btn2_link']['is_external']) && $settings['wbea_hero_btn2_link']['is_external']) ? ' target="_blank"' : '';
									$btn2_nofollow = (isset($settings['wbea_hero_btn2_link']['nofollow']) && $settings['wbea_hero_btn2_link']['nofollow']) ? ' rel="nofollow"' : '';
								?>
								<a href="<?php echo esc_url($wbea_hero_btn2_link); ?>" class="wbea-btn-border" <?php echo esc_attr($btn2_target) . esc_attr($btn2_nofollow); ?>><?php echo esc_html($wbea_hero_btn2_title); ?>
									<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z" fill="var(--e-global-color-accent)"></path>
									</svg>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<!-- Hero Image Section -->
				<div class="wb-grid-desktop-7 wb-grid-tablet-6 wb-grid-mobile-12">
					<div class="wbea-hero-img" style="background-image:url('<?php echo esc_url($wbea_hero_featured_img); ?>)"></div>
				</div>
			</div>      
		</section>          
		<!-- Hero End Here -->
		<?php
	}	
}