<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class WBEA_Slider extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve about widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	*/
	public function get_name() {
		return 'webbricks-slider-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve about widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Slider', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve about widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-slider-device';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the about widget belongs to.
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
		return [ 'wb', 'slider', 'carousel', 'image' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
	   	// start of the Content tab Slider
	   	$this->start_controls_section(
	       'wbea_slider_contents',
		    [
		        'label' => esc_html__('Content', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
		    ]
	    );

		// // Slider Style Variation
		// $this->add_control(
		// 	'wbea_slider_variation',
		// 	[
		// 		'label' => __('Slider Style', 'webbricks-addons'),
		// 		'type' => Controls_Manager::SELECT,
		// 		'options' => [
		// 			'style-1' => __('Style 1', 'webbricks-addons'),
		// 			'style-2' => __('Style 2', 'webbricks-addons'),
		// 		],
		// 		'default' => 'style-1',
		// 	]
		// );

		// Sliders
		$repeater = new Repeater();

		$repeater->add_control(
			'wbea_slider_image',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/slide-1-web-bricks.webp',
				]
			]
		);

		// Slider Sub Heading
		$repeater->add_control(
			'wbea_slider_subtitle',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Go Sightseeing', 'webbricks-addons' ),
				'label_block' => true,
			]
		);

		// Slider Heading
		$repeater->add_control(
			'wbea_slider_title',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Awesome Hill Tract', 'webbricks-addons' ),
				'label_block' => true,
			]
		);

		// Slider Description
		$repeater->add_control(
			'wbea_slider_desc',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus voluptate corrupti soluta quos nostrum, incidunt laborum doloremque esse expedita asperiores.', 'webbricks-addons' ),
				'label_block' => true,
			]
		);

		// Slider Button Title
		$repeater->add_control(
		    'wbea_slider_btn_title',
			[
			    'label' => esc_html__('Button Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Read More', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Slider Button Link
		$repeater->add_control(
		    'wbea_slider_btn_link',
			[
			    'label' => esc_html__( 'Button Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				]
			]
		);

		// Sliders List
		$this->add_control(
			'wbea_sliders',
			[
				'label' => esc_html__( 'Sliders', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ wbea_slider_title }}}',
				'separator' => 'before',
				'default' => [
					[
						'wbea_slider_image' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/slide-1-web-bricks.webp',
							]
						],
						'wbea_slider_subtitle' => esc_html__( 'Go Sightseeing', 'webbricks-addons' ),
						'wbea_slider_title' => esc_html__( 'Beautiful Beach', 'webbricks-addons' ),
						'wbea_slider_desc' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus voluptate corrupti soluta quos nostrum, incidunt laborum doloremque esse expedita asperiores.', 'webbricks-addons' ),
					],
					[
						'wbea_slider_image' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/slide-2-web-bricks.webp',
							]
						],
						'wbea_slider_subtitle' => esc_html__( 'Go Sightseeing', 'webbricks-addons' ),
						'wbea_slider_title' => esc_html__( 'Awesome Hill Tract', 'webbricks-addons' ),
						'wbea_slider_desc' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus voluptate corrupti soluta quos nostrum, incidunt laborum doloremque esse expedita asperiores.', 'webbricks-addons' ),
					],
					[
						'wbea_slider_image' => [
							'default' => [
								'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/slide-3-web-bricks.webp',
							]
						],
						'wbea_slider_subtitle' => esc_html__( 'Go Sightseeing', 'webbricks-addons' ),
						'wbea_slider_title' => esc_html__( 'Explore Seasons', 'webbricks-addons' ),
						'wbea_slider_desc' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus voluptate corrupti soluta quos nostrum, incidunt laborum doloremque esse expedita asperiores.', 'webbricks-addons' ),
					]
				]
			]
		);

		// Sliders Alignment
		$this->add_control(
			'wbea_sliders_alignment',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .wbea-slide-content' => 'text-align: {{VALUE}}',
				],
				'separator' => 'before'
			],
		);
		
		$this->end_controls_section();
		// end of the Content tab Slider

		// start of the Content tab Slider
		$this->start_controls_section(
			'wbea_slider_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		);

		// Slider Arrow Show
		$this->add_control(
			'wbea_slider_arrows',
			[
				'label' 		=> __('Show Arrows', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
				'return_value' => 'yes',
			]
		);

		// Slider Dots Show
		$this->add_control(
			'wbea_slider_dots',
			[
				'label' 		=> __('Show Dots', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
				'return_value' => 'yes',
			]
		);

		// Slider Loops
		$this->add_control(
			'wbea_slider_loops',
			[
				'label' 		=> __('Loops', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		// Slider Autoplay
		$this->add_control(
			'wbea_slider_autoplay',
			[
				'label' 		=> __('Autoplay', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		$this->add_control(
			'wbea_slider_autoplay_speed',
			[
				'label' => esc_html__( 'Autoplay Speed', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'' => esc_html__( 'Default', 'webbricks-addons' ),
					'1000' => esc_html__( '1 Second', 'webbricks-addons' ),
					'2000'  => esc_html__( '2 Second', 'webbricks-addons' ),
					'3000' => esc_html__( '3 Second', 'webbricks-addons' ),
					'4000' => esc_html__( '4 Second', 'webbricks-addons' ),
					'5000' => esc_html__( '5 Second', 'webbricks-addons' ),
				],
				'condition' => [
					'wbea_slider_autoplay' => 'yes'
				],
			]
		);

		$this->add_control(
			'wbea_slider_animation_speed',
			[
				'label' => esc_html__( 'Animation Speed', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '500',
				'options' => [
					'' => esc_html__( 'Default', 'webbricks-addons' ),
					'100' => esc_html__( '1 Second', 'webbricks-addons' ),
					'200'  => esc_html__( '2 Second', 'webbricks-addons' ),
					'300' => esc_html__( '3 Second', 'webbricks-addons' ),
					'400' => esc_html__( '4 Second', 'webbricks-addons' ),
					'500' => esc_html__( '5 Second', 'webbricks-addons' ),
				],
				'condition' => [
					'wbea_slider_autoplay' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab Slider

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_slider_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wbea_slider_pro_message_notice', 
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
		
		// start of the Style tab Slider

		// Slider Contents Style
		$this->start_controls_section(
			'wbea_slider_contents_style',
			[
				'label' => esc_html__( 'Contents', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Slider Sub Heading
		$this->add_control(
			'wbea_slider_subtitle_heading',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Slider Sub Heading Color
		$this->add_control(
			'wbea_slider_subtitle_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-slide-content span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Slider Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_slider_subtitle_typography',
				'selector' => '{{WRAPPER}} .wbea-slide-content span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Slider Heading
		$this->add_control(
			'wbea_slider_title',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Slider Title Color
		$this->add_control(
			'wbea_slider_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-slide-content h2, {{WRAPPER}} .wbea-slide-content2 h2' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Slider Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_slider_title_typography',
				'selector' => '{{WRAPPER}} .wbea-slide-content h2, {{WRAPPER}} .wbea-slide-content2 h2', 
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Slider Description Heading
		$this->add_control(
			'wbea_slider_desc_heading',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Slider Description Color
		$this->add_control(
			'wbea_slider_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-slide-content p, {{WRAPPER}} .wbea-slide-content2 p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Slider Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_slider_desc_typography',
				'selector' => '{{WRAPPER}} .wbea-slide-content p, {{WRAPPER}} .wbea-slide-content2 p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();

		// Slider Button Style
		$this->start_controls_section(
			'wbea_slider_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wbea_slider_button_style_tabs'
		);

		// Button Normal Tab
		$this->start_controls_tab(
			'wbea_slider_button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Slider Button Color
		$this->add_control(
			'wbea_slider_btn_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Slider Button Border Color
		$this->add_control(
			'wbea_slider_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Slider Button Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_slider_btn_typography',
				'selector' => '{{WRAPPER}} .wbea-btn-border', 
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		// Button Hover Tab
		$this->start_controls_tab(
			'wbea_slider_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Slider Button Hover Color
		$this->add_control(
			'wbea_slider_btn_hover_color',
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

		// Slider Button Hover Background
		$this->add_control(
			'wbea_slider_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Slider Button Hover Border
		$this->add_control(
			'wbea_slider_btn_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Slider Dots
		$this->start_controls_section(
			'wbea_slider_dots_style',
			[
				'label' => esc_html__( 'Dots', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_slider_dots' => 'yes'
				],
			]
		);

		// Slider Dots Color
		$this->add_control(
			'wbea_slider_dots_color',
			[
				'label' => esc_html__( 'Inactive Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-sliders .owl-dots button' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Slider Dots Active Color
		$this->add_control(
			'wbea_testimonial_dots_active_color',
			[
				'label' => esc_html__( 'Active Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-sliders .owl-dots button.active' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_section();

		// Slider Arrows
		$this->start_controls_section(
			'wbea_slider_arrows_style',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_slider_arrows' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'wbea_slider_arrows_style_tabs'
		);

		// Slider Arrows Normal Tab
		$this->start_controls_tab(
			'wbea_slider_arrows_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Slider Arrows Normal Icon Color
		$this->add_control(
			'wbea_slider_arrows_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-sliders .wbea-carousel-arrow-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Slider Arrows Normal Border Color
		$this->add_control(
			'wbea_slider_arrows_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-sliders .wbea-carousel-arrow-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		// Slider Arrows Hover Tab
		$this->start_controls_tab(
			'wbea_testimonials_arrows_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Slider Button Hover Background
		$this->add_control(
			'wbea_slider_arrows_hover_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-sliders .wbea-carousel-arrow-border:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
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
		
		// Sanitize and escape settings values before using them.
		$wbea_sliders = isset($settings['wbea_sliders']) ? $settings['wbea_sliders'] : [];
		$wbea_slider_arrows = isset($settings['wbea_slider_arrows']) ? (bool) $settings['wbea_slider_arrows'] : false;
		$wbea_slider_dots = isset($settings['wbea_slider_dots']) ? (bool) $settings['wbea_slider_dots'] : false;
		$wbea_slider_loops = isset($settings['wbea_slider_loops']) ? (bool) $settings['wbea_slider_loops'] : false;
		$wbea_slider_autoplay = isset($settings['wbea_slider_autoplay']) ? (bool) $settings['wbea_slider_autoplay'] : false;
		$wbea_slider_autoplay_speed = isset($settings['wbea_slider_autoplay_speed']) ? intval($settings['wbea_slider_autoplay_speed']) : 3000;
		$wbea_slider_animation_speed = isset($settings['wbea_slider_animation_speed']) ? intval($settings['wbea_slider_animation_speed']) : 500;
	
		?>
		<!-- Slider Start Here -->  
		<div class="wbea-sliders owl-carousel" 
		wbea-slider-arrows="<?php echo esc_attr($wbea_slider_arrows ? 'true' : 'false'); ?>" 
		wbea-slider-dots="<?php echo esc_attr($wbea_slider_dots ? 'true' : 'false'); ?>" 
		wbea-slider-loop="<?php echo esc_attr($wbea_slider_loops ? 'true' : 'false'); ?>" 
		wbea-slider-autoplay="<?php echo esc_attr($wbea_slider_autoplay ? 'true' : 'false'); ?>" 
		wbea-slider-autoplaytimeout="<?php echo esc_attr($wbea_slider_animation_speed); ?>" 
		wbea-slider-autoplayspeed="<?php echo esc_attr($wbea_slider_autoplay_speed); ?>">
		<?php 
			if($wbea_sliders) {
				foreach($wbea_sliders as $slide) {
					// Ensure each field is sanitized/escaped properly
					$wbea_slider_image = isset($slide['wbea_slider_image']['url']) ? esc_url($slide['wbea_slider_image']['url']) : '';
					$wbea_slider_subtitle = isset($slide['wbea_slider_subtitle']) ? esc_html($slide['wbea_slider_subtitle']) : '';
					$wbea_slider_title = isset($slide['wbea_slider_title']) ? esc_html($slide['wbea_slider_title']) : '';
					$wbea_slider_desc = isset($slide['wbea_slider_desc']) ? wp_kses_post($slide['wbea_slider_desc']) : '';
					$wbea_slider_btn_title = isset($slide['wbea_slider_btn_title']) ? esc_html($slide['wbea_slider_btn_title']) : '';
					$wbea_slider_btn_link = isset($slide['wbea_slider_btn_link']['url']) ? esc_url($slide['wbea_slider_btn_link']['url']) : '';

					// Check if the link should open in a new tab or have a nofollow
					$target = !empty($slide['wbea_slider_btn_link']['is_external']) ? 'target="_blank"' : '';
					$nofollow = !empty($slide['wbea_slider_btn_link']['nofollow']) ? 'rel="nofollow"' : '';
					?>
					<div class="wbea-single-slide" style="background-image: url('<?php echo esc_url($wbea_slider_image); ?>');">
						<div class="wbea-slide-content">
							<?php 
								if($wbea_slider_subtitle) {
									echo '<span>' . esc_html($wbea_slider_subtitle) . '</span>';
								}
							?>
							<h2><?php echo esc_html($wbea_slider_title); ?></h2>
							
							<?php 
								if($wbea_slider_desc) {
									echo '<p>' . wp_kses_post($wbea_slider_desc) . '</p>';
								}
								
								if($wbea_slider_btn_link) {
									echo '<a href="' . esc_url($wbea_slider_btn_link) . '" class="wbea-btn-border" ' . esc_attr($target) . ' ' . esc_attr($nofollow) . '>';
									echo esc_html($wbea_slider_btn_title);
									echo '<svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M17.6484 7.05859L13.1484 11.5586C12.7266 12.0156 11.9883 12.0156 11.5664 11.5586C11.1094 11.1367 11.1094 10.3984 11.5664 9.97656L14.1328 7.375H1.125C0.492188 7.375 0 6.88281 0 6.25C0 5.58203 0.492188 5.125 1.125 5.125H14.1328L11.5664 2.55859C11.1094 2.13672 11.1094 1.39844 11.5664 0.976562C11.9883 0.519531 12.7266 0.519531 13.1484 0.976562L17.6484 5.47656C18.1055 5.89844 18.1055 6.63672 17.6484 7.05859Z" fill="var(--e-global-color-accent)"/>
										</svg>';
									echo '</a>';
								}
							?>                                 
						</div>
					</div>
					<?php
				}
			}
		?>
		</div>
		<!-- Slider End Here -->
		<?php
	}	
}