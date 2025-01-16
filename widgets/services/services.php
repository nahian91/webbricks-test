<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class WBEA_Services extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve cta widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-services-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve cta widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Services', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve cta widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-archive';
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
		return [ 'wb', 'services', 'carousel' ];
	}

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// Services Section Heading Layout
		$this->start_controls_section(
			'wbea_services_section_layout_box',
			[
				'label' => esc_html__('Layout', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		// Services Section Heading Show
		$this->add_control(
			'wbea_services_section_heading_show',
			[
				'label' => esc_html__( 'Show Section Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_services_bg_pattern',
			[
				'label' => __( 'Background Pattern', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => __( 'Style 1', 'webbricks-addons' ),
					'style-2' => __( 'Style 2', 'webbricks-addons' ),
					'style-3' => __( 'Style 3', 'webbricks-addons' ),
					'style-4' => __( 'Style 4', 'webbricks-addons' ),
				],
				'default' => 'style-1',
			]
		);

		$this->end_controls_section();

		// Services Section Sub Heading Box
		$this->start_controls_section(
			'wbea_services_section_subheading_box',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_services_section_heading_show' => 'yes'
				],
			]
		);

		// Services Section Sub Heading Show?
		$this->add_control(
			'wbea_services_section_subheading_show',
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
		// Services Sub Heading
		$this->add_control(
		    'wbea_services_section_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Services', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wbea_services_section_subheading_show' => 'yes'
				],
			]
		);

		// Services Section Heading Tag
		$this->add_control(
			'wbea_services_section_subheading_tag',
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
				],
				'default' => 'span',
				'condition' => [
					'wbea_services_section_subheading_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// Services Section Heading Box
		$this->start_controls_section(
			'wbea_services_section_heading_box',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_services_section_heading_show' => 'yes'
				],
			]
		);
		
		// Services Section Heading
		$this->add_control(
		    'wbea_services_section_heading',
			[
			    'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('We Are Your One Door To Solve It All', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// Services Section Heading Tag
		$this->add_control(
			'wbea_services_section_heading_tag',
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
				],
				'default' => 'h2',
			]
		);

		$this->end_controls_section();

		// Services Section Description
		$this->start_controls_section(
			'wbea_services_section_desc_box',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_services_section_heading_show' => 'yes'
				],
			]
		);

		// Services Section Heading Description Show?
		$this->add_control(
			'wbea_services_section_desc_show',
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

		// Services Section Heading Description
		$this->add_control(
		    'wbea_services_section_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wbea_services_section_desc_show' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		
		// start of the Content tab section
		$this->start_controls_section(
			'services_content',
			[
				'label' => esc_html__('Services', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control(
			'wbea_custom_panel_notice',
			[
				'type' => \Elementor\Controls_Manager::NOTICE,
				'notice_type' => 'warning',
				'dismissible' => true,
				'heading' => esc_html__( 'Notice', 'webbricks-addons' ),
				'content' => esc_html__( 'Please enable the AwesomeFont option from Elementor settings. Learn more.', 'webbricks-addons' ),
			]
		);
		 
		// Services
		$repeater = new Repeater();
 
		$repeater->add_control(
			'wbea_service_icon',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-route',
				],
			]
		);
 
		$repeater->add_control(
			'wbea_service_title',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Travel Plan', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);
 
		$repeater->add_control(
			'wbea_service_desc',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat.', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);
 
		$repeater->add_control(
			'wbea_service_link', [
				'label' => esc_html__( 'Button Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com/',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'wbea_services',
			[
				'label' => esc_html__( 'Services List', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wbea_service_icon' => [
							'value' => 'fas fa-route',
						],
						'wbea_service_title' => esc_html__( 'Travel Plan', 'webbricks-addons' ),
						'wbea_service_desc' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat.', 'webbricks-addons'),
						'wbea_service_link' => 'https://getwebbricks.com/',
					],
					[
						'wbea_service_icon' => [
							'value' => 'far fa-compass',
						],
						'wbea_service_title' => esc_html__( 'Tour Advice', 'webbricks-addons' ),
						'wbea_service_desc' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat.', 'webbricks-addons'),
					],
					[
						'wbea_service_icon' => [
							'value' => 'fas fa-hotel',
						],
						'wbea_service_title' => esc_html__( 'Hotel Rental', 'webbricks-addons' ),
						'wbea_service_desc' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat.', 'webbricks-addons'),
						'wbea_service_link' => 'https://getwebbricks.com/',
					],
					[
						'wbea_service_icon' => [
							'value' => 'fas fa-briefcase',
						],
						'wbea_service_title' => esc_html__( 'Business', 'webbricks-addons' ),
						'wbea_service_desc' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat.', 'webbricks-addons'),
						'wbea_service_link' => 'https://getwebbricks.com/',
					],
					[
						'wbea_service_icon' => [
							'value' => 'fas fa-ticket-alt',
						],
						'wbea_service_title' => esc_html__( 'Ticket', 'webbricks-addons' ),
						'service_desc' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat.', 'webbricks-addons'),
						'wbea_service_link' => 'https://getwebbricks.com/',
					]
				],
				'title_field' => '{{{ wbea_service_title }}}',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_services_settings',
			[
				'label' => esc_html__('Settings', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		// Services Number
		$this->add_control(
			'wbea_services_number',
			[
                'label'     => esc_html__( 'No. of items per slide', 'webbricks-addons' ),
                'type'      => Controls_Manager::SELECT,
                'options' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                ],
				'default' => 4,
                'frontend_available' => true,
            ]
		);

		// Services Arrows
		$this->add_control(
			'wbea_services_arrows',
			[
				'label' => esc_html__( 'Arrows', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Services Loops
		$this->add_control(
			'wbea_services_loop',
			[
				'label' => esc_html__( 'Loops', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Services Autoplay
		$this->add_control(
			'wbea_services_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Services Pause
		$this->add_control(
			'wbea_services_pause',
			[
				'label' => esc_html__( 'Pause on hover', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'webbricks-addons' ),
				'label_off' => esc_html__( 'No', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Services Autoplay Speed
		$this->add_control(
			'wbea_services_autoplay_speed',
			[
				'label' => esc_html__( 'Speed', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'webbricks-addons' ),
					'2000' => esc_html__( '2 Seconds', 'webbricks-addons' ),
					'3000' => esc_html__( '3 Seconds', 'webbricks-addons' ),
					'4000' => esc_html__( '4 Seconds', 'webbricks-addons' ),
					'5000' => esc_html__( '5 Seconds', 'webbricks-addons' ),
					'6000' => esc_html__( '6 Seconds', 'webbricks-addons' ),
					'7000' => esc_html__( '7 Seconds', 'webbricks-addons' ),
					'8000' => esc_html__( '8 Seconds', 'webbricks-addons' ),
					'9000' => esc_html__( '9 Seconds', 'webbricks-addons' ),
					'10000' => esc_html__( '10 Seconds', 'webbricks-addons' ),
				],
			]
		);

		// Services Animation Speed
		$this->add_control(
			'wbea_services_autoplay_animation',
			[
				'label' => esc_html__( 'Timeout', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '5000',
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'webbricks-addons' ),
					'2000' => esc_html__( '2 Seconds', 'webbricks-addons' ),
					'3000' => esc_html__( '3 Seconds', 'webbricks-addons' ),
					'4000' => esc_html__( '4 Seconds', 'webbricks-addons' ),
					'5000' => esc_html__( '5 Seconds', 'webbricks-addons' ),
					'6000' => esc_html__( '6 Seconds', 'webbricks-addons' ),
					'7000' => esc_html__( '7 Seconds', 'webbricks-addons' ),
					'8000' => esc_html__( '8 Seconds', 'webbricks-addons' ),
					'9000' => esc_html__( '9 Seconds', 'webbricks-addons' ),
					'10000' => esc_html__( '10 Seconds', 'webbricks-addons' ),
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_services_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wbea_services_pro_message_notice', 
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
		
		// Service Section Heading Style
		$this->start_controls_section(
			'wbea_service_section_subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_services_section_heading_show' => 'yes',
					'wbea_services_section_subheading_show' => 'yes'
				],
			]
		);

		// Heading Control
		$this->add_control(
			'wbea_section_heading_separator_variation_style',
			[
				'label' => __('Bullet', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// Services Section Heading Separator Style
		$this->add_control(
			'wbea_section_heading_separator_variation',
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

		// Service Section Bullet Color
		$this->add_control(
			'wbea_service_section_sep_bg',
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

		// Service Section Bullet Round
		$this->add_control(
			'wbea_service_section_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wbea_section_heading_separator_variation' => 'custom', 
				],
			]
		);

		// Heading Control
		$this->add_control(
			'wbea_service_section_subheading_title_style',
			[
				'label' => __('Sub Heading', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Service Section Sub Heading Color
		$this->add_control(
			'wbea_service_section_subheading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Section Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_service_section_subheading_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Service Section Heading Options
		$this->start_controls_section(
			'wbea_service_section_heading_style',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_services_section_heading_show' => 'yes'
				],
			]
		);

		// Service Section Heading Color
		$this->add_control(
			'wbea_section_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title .wbea-section-heading' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Service Section Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_section_title_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title .wbea-section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();

		// Service Section Description Options
		$this->start_controls_section(
			'wbea_service_section_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_services_section_heading_show' => 'yes',
					'wbea_services_section_desc_show' => 'yes'
				],
			]
		);

		// Service Section Description Color
		$this->add_control(
			'wbea_section_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Service Section Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_section_desc_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// Service Box Style
		$this->start_controls_section(
			'wbea_service_box_style',
			[
				'label' => esc_html__( 'Service Content', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Service Box Layout Options
		$this->add_control(
			'wbea_service_box_layout_options',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Service Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wbea_service_border',
				'selector' => '{{WRAPPER}} .wbea-single-service',
			]
		);	

		// Service Border Radius
		$this->add_control(
			'wbea_service_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-single-service' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Service Box Icon Options
		$this->add_control(
			'wbea_service_box_icon_options',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Service Box Icon Color
		$this->add_control(
			'wbea_service_box_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-service-content i' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Service Box Heading Options
		$this->add_control(
			'wbea_service_box_title_options',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Service Box Heading Color
		$this->add_control(
			'wbea_service_box_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-single-service h3' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Service Box Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_service_box_title_typography',
				'selector' => '{{WRAPPER}} .wbea-single-service h3',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Service Box Description Options
		$this->add_control(
			'wbea_service_box_desc_options',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Service Box Description Color
		$this->add_control(
			'wbea_service_box_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-single-service p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Service Box Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_service_box_desc_typography',
				'selector' => '{{WRAPPER}} .wbea-single-service p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);
		$this->end_controls_section();

		// Service Box Button Style
		$this->start_controls_section(
			'wbea_service_box_btn_style',
			[
				'label' => esc_html__( 'Service Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wp_service_btn_style_tabs'
		);

		// Service Box Button Normal Tab
		$this->start_controls_tab(
			'wp_service_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Service Box Button Color
		$this->add_control(
			'wbea_service_btn_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-service-bottom a svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Box Button Border Color
		$this->add_control(
			'wbea_service_btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-service-bottom a' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Box Button Background Color
		$this->add_control(
			'wbea_service_btn_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-service-bottom a' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		$this->end_controls_tab();

		// Service Box Button Hover Tab
		$this->start_controls_tab(
			'wp_service_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Service Button Hover Icon Color
		$this->add_control(
			'wbea_blog_btn_bg_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-service-bottom a:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Box Button Hover Border Color
		$this->add_control(
			'wbea_service_btn_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-service-bottom a:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Button Hover Background
		$this->add_control(
			'wbea_service_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-service-bottom a:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Service Arrow Style
		$this->start_controls_section(
			'wbea_service_arrow_style',
			[
				'label' => esc_html__( 'Arrow Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wp_service_arrow_style_tabs'
		);

		// Service Arrow Normal Tab
		$this->start_controls_tab(
			'wp_service_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Service Arrow Color
		$this->add_control(
			'wbea_service_arrow_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Arrow Border Color
		$this->add_control(
			'wbea_service_arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Arrow Background Color
		$this->add_control(
			'wbea_service_arrow_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Service Arrow Padding
		$this->add_control(
			'wbea_service_arrow_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Service Arrow Round
		$this->add_control(
			'wbea_service_arrow_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Service Arrow Hover Tab
		$this->start_controls_tab(
			'wp_service_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Service Arrow Hover Icon Color
		$this->add_control(
			'wbea_service_arrow_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Arrow Border Color
		$this->add_control(
			'wbea_service_arrow_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Service Arrow Round
		$this->add_control(
			'wbea_service_arrow_hover_bg',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-carousel-arrow-border:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
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
		// Get input from widget settings
		$settings = $this->get_settings_for_display();
		$wbea_services_bg_pattern = isset($settings['wbea_services_bg_pattern']) ? $settings['wbea_services_bg_pattern'] : '';
		$wbea_services_section_heading_show = isset($settings['wbea_services_section_heading_show']) ? $settings['wbea_services_section_heading_show'] : '';
		$wbea_services = isset($settings['wbea_services']) ? $settings['wbea_services'] : [];
		$wbea_services_number = isset($settings['wbea_services_number']) ? $settings['wbea_services_number'] : '';
		$wbea_services_loop = isset($settings['wbea_services_loop']) ? $settings['wbea_services_loop'] : '';
		$wbea_services_autoplay = isset($settings['wbea_services_autoplay']) ? $settings['wbea_services_autoplay'] : '';
		$wbea_services_arrows = isset($settings['wbea_services_arrows']) ? $settings['wbea_services_arrows'] : '';
		$wbea_services_pause = isset($settings['wbea_services_pause']) ? $settings['wbea_services_pause'] : '';
		$wbea_services_autoplay_speed = isset($settings['wbea_services_autoplay_speed']) ? $settings['wbea_services_autoplay_speed'] : '';
		$wbea_services_autoplay_animation = isset($settings['wbea_services_autoplay_animation']) ? $settings['wbea_services_autoplay_animation'] : '';
	
		// Background pattern URLs
		$service_pattern_url = '';
		switch ($wbea_services_bg_pattern) {
			case 'style-1':
				$service_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/service-pattern-1-web-bricks.webp';
				break;
			case 'style-2':
				$service_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/service-pattern-2-web-bricks.webp';
				break;
			case 'style-3':
				$service_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/service-pattern-3-web-bricks.webp';
				break;
			case 'style-4':
				$service_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/service-pattern-4-web-bricks.webp';
				break;
			default:
				$service_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/service-pattern-1-web-bricks.webp'; // Default pattern
				break;
		}
	?>
	
	<?php if ($wbea_services_section_heading_show === 'yes') { 
		$wbea_services_section_subheading_show = isset($settings['wbea_services_section_subheading_show']) ? $settings['wbea_services_section_subheading_show'] : '';
		$wbea_services_section_subheading = isset($settings['wbea_services_section_subheading']) ? $settings['wbea_services_section_subheading'] : '';
		$wbea_services_section_subheading_tag = isset($settings['wbea_services_section_subheading_tag']) ? $settings['wbea_services_section_subheading_tag'] : 'span';
		$wbea_section_heading_separator_variation = isset($settings['wbea_section_heading_separator_variation']) ? $settings['wbea_section_heading_separator_variation'] : '';
		$wbea_services_section_heading = isset($settings['wbea_services_section_heading']) ? $settings['wbea_services_section_heading'] : '';
		$wbea_services_section_heading_tag = isset($settings['wbea_services_section_heading_tag']) ? $settings['wbea_services_section_heading_tag'] : 'h2';
		$wbea_services_section_desc_show = isset($settings['wbea_services_section_desc_show']) ? $settings['wbea_services_section_desc_show'] : '';
		$wbea_services_section_desc = isset($settings['wbea_services_section_desc']) ? $settings['wbea_services_section_desc'] : '';
	?>
		<div class="wbea-section-title wbea-service-title">
			<?php if ($wbea_services_section_subheading_show === 'yes') { ?>
				<<?php echo esc_attr($wbea_services_section_subheading_tag); ?> class="<?php echo esc_attr($wbea_section_heading_separator_variation); ?> wbea-section-subheading"><?php echo esc_html($wbea_services_section_subheading); ?></<?php echo esc_attr($wbea_services_section_subheading_tag); ?>>
			<?php } ?>
			<<?php echo esc_attr($wbea_services_section_heading_tag); ?> class="wbea-section-heading"><?php echo esc_html($wbea_services_section_heading); ?></<?php echo esc_attr($wbea_services_section_heading_tag); ?>>
			
			<?php if ($wbea_services_section_desc_show === 'yes') { ?>
				<p><?php echo wp_kses_post($wbea_services_section_desc); ?></p>
			<?php } ?>
		</div>
	<?php } ?>
	
	<div class="wbea-services owl-carousel <?php echo esc_attr($wbea_services_arrows === 'yes' ? 'wbea-carousel-top-arrows' : ''); ?> <?php echo esc_attr($wbea_services_section_heading_show === 'yes' ? 'wbea-heading-top' : ''); ?>" 
		wbea-services-scroll="<?php echo esc_attr($wbea_services_number); ?>" 
		wbea-services-loop="<?php echo esc_attr($wbea_services_loop); ?>" 
		wbea-services-autoplay="<?php echo esc_attr($wbea_services_autoplay); ?>" 
		wbea-services-pause="<?php echo esc_attr($wbea_services_pause); ?>" 
		wbea-services-arrows="<?php echo esc_attr($wbea_services_arrows); ?>" 
		wbea-services-animation="<?php echo esc_attr($wbea_services_autoplay_animation); ?>" 
		wbea-services-speed="<?php echo esc_attr($wbea_services_autoplay_speed); ?>">
	
		<?php foreach ($wbea_services as $service) { 
			$service_icon = isset($service['wbea_service_icon']['value']) ? esc_attr($service['wbea_service_icon']['value']) : ''; // Escape icon class
			$service_title = isset($service['wbea_service_title']) ? esc_html($service['wbea_service_title']) : ''; // Escape title
			$service_desc = isset($service['wbea_service_desc']) ? wp_kses_post($service['wbea_service_desc']) : ''; // Allow limited HTML in description
			$service_url = isset($service['wbea_service_link']['url']) ? esc_url($service['wbea_service_link']['url']) : ''; // Escape URL
			$btn_target = (isset($service['wbea_service_link']['is_external']) && $service['wbea_service_link']['is_external']) ? ' target="_blank"' : '';
    		$btn_nofollow = (isset($service['wbea_service_link']['nofollow']) && $service['wbea_service_link']['nofollow']) ? ' rel="nofollow"' : '';
		?>
			<div class="wbea-single-service">
				<div class="wbea-service-content">
					<i class="<?php echo esc_attr($service_icon); ?>"></i>
					<h3><?php echo esc_html($service_title); ?></h3>
					<p><?php echo wp_kses_post($service_desc); ?></p>
				</div>
				<div class="wbea-service-bottom" style="background-image: url('<?php echo esc_url($service_pattern_url); ?>');">
					<?php if (!empty($service_url)) { ?>
						<a href="<?php echo esc_url($service_url); ?>" class="wbea-icon-border" <?php echo esc_attr($btn_target) . esc_attr($btn_nofollow); ?>>
							<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9 1.5C9 0.902344 9.49219 0.375 10.125 0.375H14.5898C14.7656 0.375 14.9062 0.410156 15.0469 0.480469C15.1523 0.515625 15.293 0.621094 15.3984 0.726562C15.6094 0.9375 15.7148 1.21875 15.75 1.5V6C15.75 6.63281 15.2227 7.125 14.625 7.125C13.9922 7.125 13.5 6.63281 13.5 6V4.24219L7.52344 10.1836C7.10156 10.6406 6.36328 10.6406 5.94141 10.1836C5.48438 9.76172 5.48438 9.02344 5.94141 8.60156L11.8828 2.625H10.125C9.49219 2.625 9 2.13281 9 1.5ZM0 3.75C0 2.51953 0.984375 1.5 2.25 1.5H5.625C6.22266 1.5 6.75 2.02734 6.75 2.625C6.75 3.25781 6.22266 3.75 5.625 3.75H2.25V13.875H12.375V10.5C12.375 9.90234 12.8672 9.375 13.5 9.375C14.0977 9.375 14.625 9.90234 14.625 10.5V13.875C14.625 15.1406 13.6055 16.125 12.375 16.125H2.25C0.984375 16.125 0 15.1406 0 13.875V3.75Z" fill="currentColor"/>
							</svg>
						</a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
	
	<?php
	}	
}