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

class WBEA_Affiliate_Products extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-affiliate-products-widget';
	}

	/**
	 * Get widget affiliate title.
	 *
	 * Retrieve affiliate products widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Affiliate Products', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve affiliate products widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-products';
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
		return [ 'affiliate', 'logos', 'wb' ];
	}

	public function get_grid_classes( $settings, $columns_field = 'wbea_column_per_row' ) {        
        $grid_classes = 'wb-grid-desktop-';
        $grid_classes .= $settings[$columns_field];
        // $grid_classes .= ' wb-grid-tablet-';
        // $grid_classes .= $settings[$columns_field . '_tablet'];
        // $grid_classes .= ' wb-grid-mobile-';
        // $grid_classes .= $settings[$columns_field . '_mobile'];

        return apply_filters( 'wbea_grid_classes', $grid_classes, $settings, $columns_field );
    }

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// start of the Section Heading Content tab section
	    $this->start_controls_section(
			'wbea_affiliate_layout_contents',
			[
				'label' => esc_html__('Layout', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);

		// Affiliate Heading Show?
		$this->add_control(
			'wbea_affiliate_heading_show_btn',
			[
				'label' => esc_html__( 'Show Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();
		
		// start of the Content tab section
	   	$this->start_controls_section(
	       'wbea_affiliate_subheading_contents',
		    [
		        'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_affiliate_heading_show_btn' => 'yes'
				],	   
		    ]
	    );

		// Affiliate Sub Heading Show?
		$this->add_control(
			'wbea_affiliate_sub_heading_show_btn',
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
		
		// Affiliate Sub Heading
		$this->add_control(
		    'wbea_affiliate_subheading',
			[
			    'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Affiliate', 'webbricks-addons'),
				'condition' => [
					'wbea_affiliate_sub_heading_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_affiliate_heading_contents',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_affiliate_heading_show_btn' => 'yes'
				],	   
		    ]		   
		 );
		
		// Affiliate Heading
		$this->add_control(
		    'wbea_affiliate_heading',
			[
			    'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('We Love These Products', 'webbricks-addons'),
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_affiliate_heading_tag',
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

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_affiliate_desc_contents',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'wbea_affiliate_heading_show_btn' => 'yes'
				],	   		   
			]
		 );

		 // Affiliate Description Show?
		$this->add_control(
			'wbea_affiliate_desc_show_btn',
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
		
		// Affiliate Description
		$this->add_control(
		    'wbea_affiliate_desc',
			[
			    'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
				'condition' => [
					'wbea_affiliate_desc_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_affiliate_button_contents',
			[
				'label' => esc_html__('Button', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
			]
		);

		// Affiliate Button Show?
		$this->add_control(
			'wbea_affiliate_show_btn',
			[
				'label' => esc_html__( 'Show Button', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Affiliate Button Text
		$this->add_control(
		    'wbea_affliate_btn_txt',
			[
			    'label' => esc_html__('Button Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('All Products', 'webbricks-addons'),
				'separator' => 'before',
				'condition' => [
					'wbea_affiliate_show_btn' => 'yes'
				],
			]
		);

		// Affiliate Button Link
		$this->add_control(
			'wbea_affliate_btn_link', [
				'label' => esc_html__( 'Button Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com/',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'condition' => [
					'wbea_affiliate_show_btn' => 'yes'
				],
			]
		);
		
		$this->end_controls_section();

		// Repeater Start
		$this->start_controls_section(
			'wbea_affilaite_list',
			 [
				'label' => esc_html__('Affiliate List', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			 ]
		);

		// Affiliate Products Column
		$this->add_control( 
            'wbea_column_per_row', 
            [
                'label'              => esc_html__( 'Columns', 'webbricks-addons' ),
                'type'               => Controls_Manager::SELECT,
                'default'            => '2',
                'tablet_default'     => '2',
                'mobile_default'     => '1',
                'options'            => [
                    '12' => '1',
                    '6' => '2',
                    '4' => '3',
                    '3' => '4',
                    '2' => '6',
                ],
                'frontend_available' => true,
            ] 
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'wbea_affiliate_image',
			[
				'label' => esc_html__( 'Choose Product Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/Affiliate-1-web-bricks.webp',
				],
			]
		);

		$repeater->add_control(
			'wbea_affiliate_link',
			[
			    'label' => esc_html__( 'Affiliate Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com/',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				]
			]
		);		

		$this->add_control(
			'wbea_affiliate_lists',
			[
				'label' => __( 'Product Lists', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wbea_affiliate_image' => [
							'url' => 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/Affiliate-1-web-bricks.webp',
						],
					],
					[
						'wbea_affiliate_image' => [
							'url' => 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/Affiliate-2-web-bricks.webp',
						],
					],
					[
						'wbea_affiliate_image' => [
							'url' => 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/Affiliate-3-web-bricks.webp',
						],
					],
					[
						'wbea_affiliate_image' => [
							'url' => 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/Affiliate-4-web-bricks.webp',
						],
					],
					[
						'wbea_affiliate_image' => [
							'url' => 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/Affiliate-5-web-bricks.webp',
						],
					],
					[
						'wbea_affiliate_image' => [
							'url' => 'https://dev.getwebbricks.com/wp-content/uploads/2024/12/Affiliate-6-web-bricks.webp',
						],
					],

				],
			]
		);

		$this->end_controls_section();

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_affiliate_products_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	
			]
		);

		$this->add_control( 
			'wbea_affiliate_products_pro_message_notice', 
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
			'wbea_affiliate_subheading_section',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_affiliate_sub_heading_show_btn' => 'yes',
					'wbea_affiliate_heading_show_btn' => 'yes'
				]
			]
		);

		$this->add_control(
			'wbea_affiliate_bullet_options',
			[
				'label' => esc_html__( 'Bullet', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_affiliate_separator_variation',
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

		// Affliate Bullet Background
		$this->add_control(
			'wbea_affiliate_sep_background',
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

		// Affiliate Bullet Round
		$this->add_control(
			'wbea_affiliate_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wbea_affiliate_separator_variation' => 'custom', 
				],
			]
		);	
		
		$this->add_control(
			'wbea_affiliate_subheading_options',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Affiliate Sub Heading Color
		$this->add_control(
			'wbea_affiliate_subheading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title span' => 'color: {{VALUE}}',
				],
			]
		);

		// // Affiliate Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_affiliate_subheading_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_affiliate_title_section',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_affiliate_heading_show_btn' => 'yes'
				],
			]
		);

		// Affiliate Title Color
		$this->add_control(
			'wbea_affiliate_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title .section-heading' => 'color: {{VALUE}}',
				],
			]
		);

		// Affiliate Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_affiliate_title_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title .wbea-section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_affiliate_desc_style',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_affiliate_desc_show_btn' => 'yes',
					'wbea_affiliate_heading_show_btn' => 'yes'
				],
			]
		);

		// Affiliate Description Color
		$this->add_control(
			'wbea_affiliate_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-section-title p' => 'color: {{VALUE}}',
				],
			]
		);

		// Affiliate Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_affiliate_desc_typography',
				'selector' => '{{WRAPPER}} .wbea-section-title p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_affiliate_btn_section',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_affiliate_show_btn' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'wbea_affiliate_btn_style_tab'
		);

		// Affiliate Button Normal Tab
		$this->start_controls_tab(
			'wbea_affiliate_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Affiliate Button Color
		$this->add_control(
			'wbea_affiliate_btn_color',
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

		// Affiliate Button Border
		$this->add_control(
			'wbea_affiliate_btn_border',
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

		// Affiliate Button Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_affiliate_btn_typography',
				'selector' => '{{WRAPPER}} .wbea-btn-border',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		// Affiliate Button Border Radius
		$this->add_control(
			'wbea_affiliate_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-btn-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Affiliate Button Padding
		$this->add_control(
			'wbea_affiliate_btn_padding',
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

		// Affiliate Button Hover Tab
		$this->start_controls_tab(
			'wbea_affiliate_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Affiliate Button Hover Color
		$this->add_control(
			'wbea_affiliate_btn_hover_color',
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

		// Affiliate Button Hover Background
		$this->add_control(
			'wbea_affiliate_btn_hover_bg',
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

		// Affiliate Button Hover Border
		$this->add_control(
			'wbea_affiliate_btn_hover_border',
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
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_products_section',
			[
				'label' => esc_html__( 'Product', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		// Affiliate Image Options
		$this->add_control(
			'wbea_affiliate_image_options',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Affiliate Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wbea_price_border',
				'selector' => '{{WRAPPER}} .wbea-affiliate-img-bg',
			]
		);	

		// Affiliate Image Border Radius
		$this->add_control(
			'wbea_affiliate_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-affiliate-img-bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Affiliate Image Width
		$this->add_control(
			'wbea_affiliate_image_width',
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
					'{{WRAPPER}} .wbea-affiliate-img-bg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Affiliate Image Height
		$this->add_control(
			'wbea_affiliate_image_image_height',
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
					'{{WRAPPER}} .wbea-affiliate-img-bg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Affiliate Link Options
		$this->add_control(
			'wbea_affiliate_link_options',
			[
				'label' => esc_html__( 'Product Link', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wbea_affiliate_btn_icon_style_tab'
		);

		// Affiliate Button Normal Tab
		$this->start_controls_tab(
			'wbea_affiliate_btn_icon_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Affiliate Button Color
		$this->add_control(
			'wbea_affiliate_btn_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Affiliate Button Border
		$this->add_control(
			'wbea_affiliate_btn_icon_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Affiliate Button Background
		$this->add_control(
			'wbea_affiliate_btn_icon_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Affiliate Button Round
		$this->add_control(
			'wbea_affiliate_link_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Affiliate Button Hover Tab
		$this->start_controls_tab(
			'wbea_affiliate_btn_icon_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Affiliate Button Hover Icon Color
		$this->add_control(
			'wbea_affiliate_btn_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Affiliate Button Hover Border
		$this->add_control(
			'wbea_affiliate_btn_icon_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Affiliate Button Hover Background
		$this->add_control(
			'wbea_affiliate_btn_icon_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

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
		// Get widget settings
		$settings = $this->get_settings_for_display();
	
		// Sanitize and assign settings
		$wbea_affiliate_heading_show_btn = isset($settings['wbea_affiliate_heading_show_btn']) ? $settings['wbea_affiliate_heading_show_btn'] : '';
		$wbea_affiliate_sub_heading_show_btn = isset($settings['wbea_affiliate_sub_heading_show_btn']) ? $settings['wbea_affiliate_sub_heading_show_btn'] : '';
		$wbea_affiliate_heading = isset($settings['wbea_affiliate_heading']) ? sanitize_text_field($settings['wbea_affiliate_heading']) : '';
		$wbea_affiliate_heading_tag = isset($settings['wbea_affiliate_heading_tag']) ? sanitize_key($settings['wbea_affiliate_heading_tag']) : 'h3';
		$wbea_affiliate_desc_show_btn = isset($settings['wbea_affiliate_desc_show_btn']) ? $settings['wbea_affiliate_desc_show_btn'] : '';
		$wbea_affiliate_desc = isset($settings['wbea_affiliate_desc']) ? wp_kses_post($settings['wbea_affiliate_desc']) : '';
		$affiliate_lists = isset($settings['wbea_affiliate_lists']) ? $settings['wbea_affiliate_lists'] : [];
		$wbea_affiliate_show_btn = isset($settings['wbea_affiliate_show_btn']) ? $settings['wbea_affiliate_show_btn'] : '';
		$wbea_affliate_btn_txt = isset($settings['wbea_affliate_btn_txt']) ? sanitize_text_field($settings['wbea_affliate_btn_txt']) : '';
		$wbea_affliate_btn_link = isset($settings['wbea_affliate_btn_link']['url']) ? esc_url($settings['wbea_affliate_btn_link']['url']) : '';
	
		?>
		<!-- Affiliate Programme Start Here -->
		<div class="wb-grid-row wbea-affiliate">
			<div class="wb-grid-desktop-8 wb-grid-mobile-12">
				<?php if ($wbea_affiliate_heading_show_btn === 'yes') : ?>
					<div class="wbea-section-title">
						<?php if ($wbea_affiliate_sub_heading_show_btn === 'yes') :
							$wbea_affiliate_subheading = isset($settings['wbea_affiliate_subheading']) ? sanitize_text_field($settings['wbea_affiliate_subheading']) : '';
							$wbea_affiliate_separator_variation = isset($settings['wbea_affiliate_separator_variation']) ? sanitize_html_class($settings['wbea_affiliate_separator_variation']) : '';
							?>
							<span class="<?php echo esc_attr($wbea_affiliate_separator_variation); ?> wbea-section-subheading">
								<?php echo esc_html($wbea_affiliate_subheading); ?>
							</span>
						<?php endif; ?>
	
						<<?php echo esc_attr($wbea_affiliate_heading_tag); ?> class="wbea-section-heading">
							<?php echo esc_html($wbea_affiliate_heading); ?>
						</<?php echo esc_attr($wbea_affiliate_heading_tag); ?>>
	
						<?php if ($wbea_affiliate_desc_show_btn === 'yes') : ?>
							<p><?php echo esc_html($wbea_affiliate_desc); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
	
			<div class="wb-grid-desktop-4 wb-grid-mobile-12 text-end">
				<?php if ($wbea_affiliate_show_btn === 'yes') : ?>
					<?php 
						// Check for target and nofollow options
						$target = !empty($settings['wbea_affliate_btn_link']['is_external']) ? 'target="_blank"' : '';
						$nofollow = !empty($settings['wbea_affliate_btn_link']['nofollow']) ? 'rel="nofollow"' : '';
					?>
					<a href="<?php echo esc_url($wbea_affliate_btn_link); ?>" class="wbea-btn-border wbea-affiliate-btn" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
						<?php echo esc_html($wbea_affliate_btn_txt); ?>
						<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z" fill="var(--e-global-color-accent)"></path>
						</svg>
					</a>
				<?php endif; ?>
			</div>
		</div>
	
		<div class="wb-grid-row">
			<?php if ($affiliate_lists) : ?>
				<?php foreach ($affiliate_lists as $list) :
					$list_img = isset($list['wbea_affiliate_image']['url']) ? esc_url($list['wbea_affiliate_image']['url']) : '';
					$list_link = isset($list['wbea_affiliate_link']['url']) ? esc_url($list['wbea_affiliate_link']['url']) : '';
					?>
					<div class="<?php echo esc_attr($this->get_grid_classes($settings)); ?> wb-grid-tablet-6 wb-grid-mobile-12">
						<div class="wbea-single-affiliate">
							<div class="wbea-affiliate-img">
								<?php if ($list_img) : ?>
									<div class="wbea-affiliate-img-bg" style="background-image:url('<?php echo esc_url($list_img); ?>')"></div>
								<?php endif; ?>
								<?php if ($list_link) : ?>
									<?php 
										// Check for target and nofollow options
										$target = !empty($settings['wbea_affiliate_link']['is_external']) ? 'target="_blank"' : '';
										$nofollow = !empty($settings['wbea_affiliate_link']['nofollow']) ? 'rel="nofollow"' : '';
									?>
									<a href="<?php echo esc_url($list_link); ?>" class="wbea-icon-border" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
										<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M9 1.5C9 0.902344 9.49219 0.375 10.125 0.375H14.5898C14.7656 0.375 14.9062 0.410156 15.0469 0.480469C15.1523 0.515625 15.293 0.621094 15.3984 0.726562C15.6094 0.9375 15.7148 1.21875 15.75 1.5V6C15.75 6.63281 15.2227 7.125 14.625 7.125C13.9922 7.125 13.5 6.63281 13.5 6V4.24219L7.52344 10.1836C7.10156 10.6406 6.36328 10.6406 5.94141 10.1836C5.48438 9.76172 5.48438 9.02344 5.94141 8.60156L11.8828 2.625H10.125C9.49219 2.625 9 2.13281 9 1.5ZM0 3.75C0 2.51953 0.984375 1.5 2.25 1.5H5.625C6.22266 1.5 6.75 2.02734 6.75 2.625C6.75 3.25781 6.22266 3.75 5.625 3.75H2.25V13.875H12.375V10.5C12.375 9.90234 12.8672 9.375 13.5 9.375C14.0977 9.375 14.625 9.90234 14.625 10.5V13.875C14.625 15.1406 13.6055 16.125 12.375 16.125H2.25C0.984375 16.125 0 15.1406 0 13.875V3.75Z" fill="var(--e-global-color-primary)"></path>
										</svg>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<!-- Affiliate Programme End Here -->
		<?php
	}	
}