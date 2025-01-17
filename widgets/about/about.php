<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class WBEA_About extends Widget_Base {

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
		return 'webbricks-about-widget';
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
		return esc_html__( 'About Us', 'webbricks-addons' );
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
		return 'wb-icon eicon-single-post';
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
		return [ 'wb', 'about' ];
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
	       'wbea_about_subheading_contents',
		    [
		        'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
		    ]
	    );

		// About Sub Heading Show?
		$this->add_control(
			'wbea_about_subheading_show_btn',
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
		
		// About Sub Heading
		$this->add_control(
			'wbea_about_subheading',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('About Us', 'webbricks-addons'),
				'condition' => [
					'wbea_about_subheading_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Start of the Content Tab Section
		$this->start_controls_section(
			'wbea_about_heading_contents',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
			]
		 );
		
		// About Heading
		$this->add_control(
			'wbea_about_title',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('100+ Businesses Trust Us For Last Decade', 'webbricks-addons'),
			]
		);		

		// Section Heading Separator Style
		$this->add_control(
			'wbea_about_title_tag',
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
		// end of the Content tab section

		$this->start_controls_section(
			'wbea_about_desc_contents',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
			]
		 );
		
		// About Description
		$this->add_control(
			'wbea_about_desc',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		$this->start_controls_section(
			'wbea_about_images_contents',
			[
				'label' => esc_html__('Images', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
			]
		 );

		// About Featured Image
		$this->add_control(
			'wbea_about_featured_img',
			[
				'label' => esc_html__( 'Choose Featured Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/About-web-bricks.webp',
				]
			]
		);
		 
		// About Secondary Image
		$this->add_control(
			'wbea_about_bg_img',
			[
				'label' => esc_html__( 'Secondary Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/about-pattern-5-web-bricks.webp',
				]
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_about_counters',
			[
				'label' => esc_html__('Counters', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);

		// About Counter Show?
		$this->add_control(
			'wbea_about_counter_show_btn',
			[
				'label' => esc_html__( 'Show Counter', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		 
		// About Counters
		$repeater = new Repeater();

		// About Counter Number
		$repeater->add_control(
			'wbea_about_counter_number',
			[
				'label' => esc_html__( 'Counter Number', 'webbricks-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => esc_html__( '100', 'webbricks-addons' ),
			]
		);

		// About Counter Number Suffix
		$repeater->add_control(
			'wbea_about_counter_suffix',
			[
				'label' => esc_html__( 'Counter Suffix', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '+', 'webbricks-addons' ),
			]
		);

		// About Counter Title
		$repeater->add_control(
			'wbea_about_counter_title',
			[
				'label' => esc_html__( 'Counter Title', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Counter Visiting', 'webbricks-addons' ),
			]
		);

		// About Counter Repeater
		$this->add_control(
			'wbea_about_counter',
			[
				'label' => esc_html__( 'Counters', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ wbea_about_counter_title }}}',
				'default' => [
					[
						'wbea_about_counter_number' => esc_html__( '100', 'webbricks-addons' ),
						'wbea_about_counter_suffix' => esc_html__( '+', 'webbricks-addons' ),
						'wbea_about_counter_title' => esc_html__( 'Countries Visiting', 'webbricks-addons' ),
					],
					[
						'wbea_about_counter_number' => esc_html__( '50', 'webbricks-addons' ),
						'wbea_about_counter_suffix' => esc_html__( '+', 'webbricks-addons' ),
						'wbea_about_counter_title' => esc_html__( 'Hotels & Resorts', 'webbricks-addons' ),
					],
					[
						'wbea_about_counter_number' => esc_html__( '10', 'webbricks-addons' ),
						'wbea_about_counter_suffix' => esc_html__( '+', 'webbricks-addons' ),
						'wbea_about_counter_title' => esc_html__( 'Branches All Over', 'webbricks-addons' ),
					]
				],
				'condition' => [
					'wbea_about_counter_show_btn' => 'yes'
				],
			]
		); 

		$this->add_control(
			'important_note',
			[
				'label' => esc_html__( 'Suggestion:Three counter looks fit properly. You can add more if needed.', 'webbricks-addons' ),
				'type' => Controls_Manager::RAW_HTML,
				'content_classes' => 'notice-style',
				'condition' => [
					'wbea_about_counter_show_btn' => 'yes'
				]
			]
		);
		 
		$this->end_controls_section();
		// End of the Content Tab Section

		// Start of the Buttons Tab Section
		$this->start_controls_section(
		'wbea_about_buttons',
			[
				'label' => esc_html__('Buttons', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
			]
		);
		 
		// About Button 1 Title
		$this->add_control(
		    'wbea_about_btn1_title',
			[
			    'label' => esc_html__('Button 1 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Contact Us', 'webbricks-addons')
			]
		);

		// About Button 1 Link
		$this->add_control(
		    'wbea_about_btn1_link',
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
		
		// About Button 2 Title
		$this->add_control(
		    'wbea_about_btn2_title',
			[
			    'label' => esc_html__('Button 2 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Know More', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// About Button 2 Link
		$this->add_control(
		    'wbea_about_btn2_link',
			[
			    'label' => esc_html__( 'Button 2 Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);
		 
		$this->end_controls_section();
		// End of the Buttons Tab Section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_about_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wbea_about_pro_message_notice', 
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
		
		$this->start_controls_section(
			'wbea_about_subheading_style_section',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_about_subheading_show_btn' => 'yes'
				],
			]
		);	

		$this->add_control(
			'wbea_about_subheading_sep_head',
			[
				'label' => __('Bullet', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// About Content Sub Heading Separator Style
		$this->add_control(
			'wbea_about_subheading_sep_variotion',
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

		// About Content Sub Heading Separator Round
		$this->add_control(
			'wbea_about_subheading_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wbea_about_subheading_sep_variotion' => 'custom', 
				],
			]
		);

		// About Content Sub Heading Separator Color
		$this->add_control(
			'wbea_about_subheading_sep_color',
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

		$this->add_control(
			'wbea_about_subheading_head',
			[
				'label' => __('Sub Heading', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// About Content Sub Heading Color
		$this->add_control(
			'wbea_about_subheading_color',
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

		// About Content Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_about_subheading_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wbea_about_heading_style_section',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// About Content Title Color
		$this->add_control(
			'wbea_about_title_color',
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

		// About Content Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_about_title_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title .wbea-section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wbea_about_desc_style_section',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// About Content Description Color
		$this->add_control(
			'wbea_about_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-about-desc, {{WRAPPER}} .wbea-about-desc p, {{WRAPPER}} .wbea-about-desc ul, {{WRAPPER}} .wbea-about-desc ol' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// About Content Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_about_desc_typography',
				'selector' => '{{WRAPPER}} .wbea-about-desc, {{WRAPPER}} .wbea-about-desc p, {{WRAPPER}} .wbea-about-desc ul, {{WRAPPER}} .wbea-about-desc ol',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// Start of the Style Tab Section
		$this->start_controls_section(
			'wbea_about_style_images',
			[
				'label' => esc_html__( 'Images', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// About Featured Image Heading
		$this->add_control(
			'wbea_about_featured_heading',
			[
				'label' => esc_html__( 'Featured', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		// About Featured Image Width
		$this->add_control(
			'wbea_about_featured_image_width',
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
					'{{WRAPPER}} .wbea-about-featured-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// About Featured Image Height
		$this->add_control(
			'wbea_about_featured_image_height',
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
					'{{WRAPPER}} .wbea-about-featured-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// About Separator Image Heading
		$this->add_control(
			'wbea_about_sep_heading',
			[
				'label' => esc_html__( 'Pattern', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// About Separator Image Width
		$this->add_control(
			'wbea_about_sep_image_width',
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
					'{{WRAPPER}} .wbea-about-featured-bg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// About Separator Image Height
		$this->add_control(
			'wbea_about_sep_image_height',
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
					'{{WRAPPER}} .wbea-about-featured-bg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wbea_about_counters_style',
			[
				'label' => esc_html__( 'Counters', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_about_counter_show_btn' => 'yes'
				]
			]
		);

		// About Counter Number Options
		$this->add_control(
			'wbea_about_counter_number_options',
			[
				'label' => esc_html__( 'Number', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		// About Counter Number Color
		$this->add_control(
			'wbea_about_counter_number_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-single-about-counter div, .wbea-single-about-counter span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Counter Number Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_about_counter_number_typography',
				'selector' => '{{WRAPPER}} .wbea-single-about-counter div, .wbea-single-about-counter span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Counter Title Options
		$this->add_control(
			'wbea_about_counter_title_options',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Counter Title Color
		$this->add_control(
			'wbea_about_counter_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-single-about-counter .wbea-about-counter-title' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Counter Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_about_counter_title_typography',
				'selector' => '{{WRAPPER}} .wbea-single-about-counter .wbea-about-counter-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_about_counter_title_tag',
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
				'default' => 'p',
			]
		);

		// About Counter Separator Options
		$this->add_control(
			'wbea_about_counter_sep_options',
			[
				'label' => esc_html__( 'Separator', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Counter Separator Color
		$this->add_control(
			'wbea_about_counter_sep_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-single-about-counter' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wbea_buttons_style',
			[
				'label' => esc_html__( 'Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// About Button 1 Options
		$this->add_control(
			'wbea_about_button1_options',
			[
				'label' => esc_html__( 'Button 1', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_about_btn1_style_tab'
		);

		// About Button 1 Normal Tab
		$this->start_controls_tab(
			'wbea_about_btn1_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// About Button 1 Color
		$this->add_control(
			'wbea_about_btn1_color',
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

		// About Button 1 Background
		$this->add_control(
			'wbea_about_btn1_bg',
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

		// About Button 1 Border
		$this->add_control(
			'wbea_about_btn1_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_about_btn1_typography',
				'selector' => '{{WRAPPER}} .wbea-btn-bg',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Button 1 Border Radius
		$this->add_control(
			'wbea_about_btn1_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// About Button 1 Padding
		$this->add_control(
			'wbea_about_btn1_padding',
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

		// About Button 1 Hover Tab
		$this->start_controls_tab(
			'wbea_about_btn1_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// About Button 1 Hover Color
		$this->add_control(
			'wbea_about_btn1_hover_color',
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

		// About Button 1 Hover Background
		$this->add_control(
			'wbea_about_btn1_hover_bg',
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

		// About Button 1 Hover Background
		$this->add_control(
			'wbea_about_btn1_hover_border',
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


		// About Button 2 Options
		$this->add_control(
			'wbea_about_button2_options',
			[
				'label' => esc_html__( 'Button 2', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_about_btn2_style_tab'
		);

		// About Button 2 Normal Tab
		$this->start_controls_tab(
			'wbea_about_btn2_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// About Button 2 Color
		$this->add_control(
			'wbea_about_btn2_color',
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

		// About Button 2 Border
		$this->add_control(
			'wbea_about_btn2_border',
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

		// About Button 2 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_about_btn2_typography',
				'selector' => '{{WRAPPER}} .wbea-btn-border',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Button 2 Border Radius
		$this->add_control(
			'wbea_about_btn2_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// About Button 2 Padding
		$this->add_control(
			'wbea_about_btn2_padding',
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

		// About Button 2 Hover Tab
		$this->start_controls_tab(
			'wbea_about_btn2_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// About Button 2 Hover Color
		$this->add_control(
			'wbea_about_btn2_hover_color',
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

		// About Button 2 Hover Color
		$this->add_control(
			'wbea_about_btn2_hover_border',
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

		// About Button 2 Hover Background
		$this->add_control(
			'wbea_about_btn2_hover_bg',
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
		// Get widget settings
		$settings = $this->get_settings_for_display();
		
		// Extract settings variables with fallbacks
		$wbea_about_subheading_show_btn = $settings['wbea_about_subheading_show_btn'] ?? '';
		$wbea_about_title = $settings['wbea_about_title'] ?? '';
		$wbea_about_title_tag = $settings['wbea_about_title_tag'] ?? 'h2'; 
		$wbea_about_desc = $settings['wbea_about_desc'] ?? '';
		$wbea_about_featured_img = !empty($settings['wbea_about_featured_img']['url']) ? esc_url($settings['wbea_about_featured_img']['url']) : '';    
		$wbea_about_bg_img = !empty($settings['wbea_about_bg_img']['url']) ? esc_url($settings['wbea_about_bg_img']['url']) : '';
		$wbea_about_counter = $settings['wbea_about_counter'] ?? [];
		$wbea_about_counter_title_tag = $settings['wbea_about_counter_title_tag'] ?? 'h3';
		$wbea_about_btn1_title = sanitize_text_field($settings['wbea_about_btn1_title'] ?? '');
		$wbea_about_btn1_link = isset($settings['wbea_about_btn1_link']['url']) ? esc_url($settings['wbea_about_btn1_link']['url']) : '';
		$wbea_about_btn2_title = sanitize_text_field($settings['wbea_about_btn2_title'] ?? '');
		$wbea_about_btn2_link = isset($settings['wbea_about_btn2_link']['url']) ? esc_url($settings['wbea_about_btn2_link']['url']) : '';
		
		// Allow-list for heading tags
		$allowed_heading_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'div', 'span'];
		$wbea_about_title_tag = in_array($wbea_about_title_tag, $allowed_heading_tags, true) ? $wbea_about_title_tag : 'h2';
		
		// Render HTML
		?>
		<!-- About Start Here -->
		<section class="wbea-about">
			<div class="wb-grid-row">
				<div class="wb-grid-desktop-6 wb-grid-tablet-12 wb-grid-mobile-12">
					<div class="wbea-section-title">
						<?php if ($wbea_about_subheading_show_btn === 'yes') : ?>
							<?php
							$wbea_about_subheading_sep_variotion = sanitize_html_class($settings['wbea_about_subheading_sep_variotion'] ?? '');
							$wbea_about_subheading = sanitize_text_field($settings['wbea_about_subheading'] ?? '');
							?>
							<span class="<?php echo esc_attr($wbea_about_subheading_sep_variotion); ?> wbea-section-subheading"><?php echo esc_html($wbea_about_subheading); ?></span>
						<?php endif; ?>
						<<?php echo esc_attr($wbea_about_title_tag); ?> class="wbea-section-heading"><?php echo esc_html($wbea_about_title); ?></<?php echo esc_attr($wbea_about_title_tag); ?>>
					</div> <!-- section-heading end here -->
					<div class="wbea-about-img">
						<?php if (!empty($wbea_about_featured_img)) : ?>
							<div class="wbea-about-featured-img" style="background-image:url('<?php echo esc_url($wbea_about_featured_img); ?>')"></div>
						<?php endif; ?>
						<?php if (!empty($wbea_about_bg_img)) : ?>
							<div class="wbea-about-featured-bg" style="background-image:url('<?php echo esc_url($wbea_about_bg_img); ?>')"></div>
						<?php endif; ?>
					</div>
				</div>
				<div class="wb-grid-desktop-6 wb-grid-tablet-12 wb-grid-mobile-12">
					<div class="wbea-about-desc">
						<p><?php echo wp_kses_post($wbea_about_desc); ?></p>
					</div>
					<div class="wbea-about-counter">
						<?php if ($wbea_about_counter) :
							foreach ($wbea_about_counter as $counter) :
								$counter_number = sanitize_text_field($counter['wbea_about_counter_number'] ?? '');
								$counter_suffix = sanitize_text_field($counter['wbea_about_counter_suffix'] ?? '');
								$counter_title = sanitize_text_field($counter['wbea_about_counter_title'] ?? '');
								?>
								<div class="wbea-single-about-counter">
									<div><span class="wbea-about-counter-js"><?php echo esc_attr($counter_number); ?></span> <?php echo esc_html($counter_suffix); ?></div>
									<<?php echo esc_attr($wbea_about_counter_title_tag); ?> class="wbea-about-counter-title"><?php echo esc_html($counter_title); ?></<?php echo esc_attr($wbea_about_counter_title_tag); ?>>
								</div>
						<?php endforeach;
						endif; ?>
					</div>
					<div class="wbea-about-btn">
						<?php if ($wbea_about_btn1_link) : ?>
							<?php 
								// Set target and rel attributes for button 1
								$about_btn1_target = (isset($settings['wbea_about_btn1_link']['is_external']) && $settings['wbea_about_btn1_link']['is_external']) ? ' target="_blank"' : '';
								$about_btn1_nofollow = (isset($settings['wbea_about_btn1_link']['nofollow']) && $settings['wbea_about_btn1_link']['nofollow']) ? ' rel="nofollow"' : '';
							?>
							<a href="<?php echo esc_url($wbea_about_btn1_link); ?>" class="wbea-btn-bg" <?php echo esc_attr($about_btn1_target) . esc_attr($about_btn1_nofollow); ?>><?php echo esc_html($wbea_about_btn1_title); ?>
								<svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.6484 7.05859L13.1484 11.5586C12.7266 12.0156 11.9883 12.0156 11.5664 11.5586C11.1094 11.1367 11.1094 10.3984 11.5664 9.97656L14.1328 7.375H1.125C0.492188 7.375 0 6.88281 0 6.25C0 5.58203 0.492188 5.125 1.125 5.125H14.1328L11.5664 2.55859C11.1094 2.13672 11.1094 1.39844 11.5664 0.976562C11.9883 0.519531 12.7266 0.519531 13.1484 0.976562L17.6484 5.47656C18.1055 5.89844 18.1055 6.63672 17.6484 7.05859Z" fill="var(--e-global-color-accent)"/>
								</svg>
							</a>
						<?php endif; ?>
			
						<?php if ($wbea_about_btn2_link) : ?>
							<?php 
								// Set target and rel attributes for button 1
								$about_btn2_target = (isset($settings['wbea_about_btn2_link']['is_external']) && $settings['wbea_about_btn2_link']['is_external']) ? ' target="_blank"' : '';
								$about_btn2_nofollow = (isset($settings['wbea_about_btn2_link']['nofollow']) && $settings['wbea_about_btn2_link']['nofollow']) ? ' rel="nofollow"' : '';
							?>
							<a href="<?php echo esc_url($wbea_about_btn2_link); ?>" class="wbea-btn-border" <?php echo esc_attr($about_btn2_target) . esc_attr($about_btn2_nofollow); ?>><?php echo esc_html($wbea_about_btn2_title); ?>
								<svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.6484 7.05859L13.1484 11.5586C12.7266 12.0156 11.9883 12.0156 11.5664 11.5586C11.1094 11.1367 11.1094 10.3984 11.5664 9.97656L14.1328 7.375H1.125C0.492188 7.375 0 6.88281 0 6.25C0 5.58203 0.492188 5.125 1.125 5.125H14.1328L11.5664 2.55859C11.1094 2.13672 11.1094 1.39844 11.5664 0.976562C11.9883 0.519531 12.7266 0.519531 13.1484 0.976562L17.6484 5.47656C18.1055 5.89844 18.1055 6.63672 17.6484 7.05859Z" fill="var(--e-global-color-accent)"/>
								</svg>
							</a>
						<?php endif; ?>
					</div> <!-- about-btn end here -->
				</div>
			</div>
		</section>
		<?php
	}	
}