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

class WBEA_Blogs extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-blogs-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Blogs', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve blog widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-post-content';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the blog widget belongs to.
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
		return [ 'wb', 'blog', 'post' ];
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
		// start of the Content tab section
	    $this->start_controls_section(
	       'wbea_blog_contents',
		    [
		        'label' => esc_html__('Query', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );

		// Blog Number
		$this->add_control(
			'wbea_blog_number',
			[
				'label' 		=> __('Number of Posts', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '3',
			]
		);

		// Blog Column
		$this->add_control( 
            'wbea_column_per_row', 
            [
                'label'              => esc_html__( 'Columns', 'webbricks-addons' ),
                'type'               => Controls_Manager::SELECT,
                'default'            => '4',
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

		// Blog Order
		$this->add_control(
			'wbea_blog_order',
			[
				'label' 		=> __('Order', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 			=> __('Default', 'webbricks-addons'),
					'DESC' 		=> __('DESCENDING', 'webbricks-addons'),
					'ASC' 		=> __('ASCENDING', 'webbricks-addons'),
				],
			]
		);

		// Blog Orderby
		$this->add_control(
			'wbea_blog_orderby',
			[
				'label' 		=> __('Order By', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					'' 				=> __('Default', 'webbricks-addons'),
					'date' 			=> __('Date', 'webbricks-addons'),
					'title' 		=> __('Title', 'webbricks-addons'),
					'name' 			=> __('Name', 'webbricks-addons'),
					'modified' 		=> __('Modified', 'webbricks-addons'),
					'author' 		=> __('Author', 'webbricks-addons'),
					'rand' 			=> __('Random', 'webbricks-addons'),
					'ID' 			=> __('ID', 'webbricks-addons'),
					'comment_count' => __('Comment Count', 'webbricks-addons'),
					'menu_order' 	=> __('Menu Order', 'webbricks-addons'),
				],
			]
		);

		$args = array(
			'hide_empty' => false,
		);
		
		$categories = get_categories($args);

		if($categories) {
			foreach ( $categories as $key => $category ) {
				$options[$category->term_id] = $category->name;
			}
		}

		// Blog Categories
		$this->add_control(
			'wbea_blog_include_categories',
			[
				'label' => __( 'Category', 'webbricks-addons' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $options,
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'wbea_blog_option_section',
			 [
				'label' => esc_html__('Meta Info', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT			
			]
		);

		// Blog Category Show
		$this->add_control(
			'wbea_blog_cat_visibility',
			[
				'label' 		=> __('Show Category', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		// Blog Date Show
		$this->add_control(
			'wbea_blog_date_visibility',
			[
				'label' 		=> __('Show Date', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		// Blog Excerpt Show
		$this->add_control(
			'wbea_blog_excerpt_visibility',
			[
				'label' 		=> __('Show Excerpt', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'yes',
				'label_on' 		=> __('Show', 'webbricks-addons'),
				'label_off' 	=> __('Hide', 'webbricks-addons'),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_blog_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wbea_blog_pro_message_notice', 
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
			'wbea_blog_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);	

		// Blog Background
		$this->add_control(
			'wbea_blog_bg_color',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Padding
		$this->add_control(
			'wbea_blog_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Blog Border Radius
		$this->add_control(
			'wbea_blog_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_meta_style',
			[
				'label' => esc_html__( 'Meta', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Meta Color
		$this->add_control(
			'wbea_meta_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-meta, .blog-meta a' => 'color: {{VALUE}} !important',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Meta Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_blogmeta_typography',
				'selector' => '{{WRAPPER}} .wbea-blog-meta, .wbea-blog-meta a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Title Color
		$this->add_control(
			'wbea_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-title .wbea-blog-post-title a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_blog_title_typography',
				'selector' => '{{WRAPPER}} .wbea-blog-title .wbea-blog-post-title a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_blog_title_tag',
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
				'default' => 'h3',
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_blog_excerpt_visibility' => 'yes', 
				],
			]
		);	

		// Excerpt Color
		$this->add_control(
			'wbea_excerpt_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-excerpt' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Excerpt Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .wbea-blog-excerpt',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// Blog Image Width
		$this->add_control(
			'wbea_blog_image_width',
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
					'{{WRAPPER}} .wbea-blog-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Height
		$this->add_control(
			'wbea_blog_image_image_height',
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
					'{{WRAPPER}} .wbea-blog-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Blog Image Display Size
		$this->add_control(
			'wbea_blog_image_display',
			[
				'label' 		=> __('Display Size', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'cover',
				'options' 		=> [
					'auto' 			=> __('Auto', 'webbricks-addons'),
					'contain' 		=> __('Contain', 'webbricks-addons'),
					'cover' 		=> __('Cover', 'webbricks-addons'),
				],
			]
		);

		// Blog Image Radius
		$this->add_control(
			'wbea_blog_image_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-blog-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_blog_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		$this->start_controls_tabs(
			'wbea_blogs_button_style_tabs'
		);

		// Blog Button Normal Tab
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Blog Button Color
		$this->add_control(
			'wbea_blog_btn_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Blog Button Background Color
		$this->add_control(
			'wbea_blog_btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff',
			]
		);

		// Blog Button Border Color
		$this->add_control(
			'wbea_blog_btn_border_color',
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

		// Blog Button Border Radius
		$this->add_control(
			'wbea_blog_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Blog Button Hover Tab
		$this->start_controls_tab(
			'wbea_blog_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Blog Button Hover Icon Color
		$this->add_control(
			'wbea_blog_btn_bg_hover_color',
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

		// Blog Button Hover Background Color
		$this->add_control(
			'wbea_blog_btn_bg_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover:after' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Blog Button Hover Border Color
		$this->add_control(
			'wbea_blog_btn_bg_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-icon-border:hover' => 'border-color: {{VALUE}}',
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
		$wbea_blog_title_tag = $settings['wbea_blog_title_tag'];
		$wbea_blog_number = isset($settings['wbea_blog_number']) ? $settings['wbea_blog_number'] : 5;
		$wbea_blog_order = isset($settings['wbea_blog_order']) ? $settings['wbea_blog_order'] : 'DESC';
		$wbea_blog_orderby = $settings['wbea_blog_orderby'];
		$wbea_blog_include_categories = $settings['wbea_blog_include_categories'];
		$wbea_blog_cat_visibility = isset($settings['wbea_blog_cat_visibility']) && $settings['wbea_blog_cat_visibility'] === 'yes';
		$wbea_blog_date_visibility = isset($settings['wbea_blog_date_visibility']) && $settings['wbea_blog_date_visibility'] === 'yes';
		$wbea_blog_excerpt_visibility = isset($settings['wbea_blog_excerpt_visibility']) && $settings['wbea_blog_excerpt_visibility'] === 'yes';
		$wbea_blog_image_display = $settings['wbea_blog_image_display'];
	
		// Validate blog title tag
		$valid_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span'];
		if (!in_array($wbea_blog_title_tag, $valid_tags)) {
			$wbea_blog_title_tag = 'h2'; // Default to h2 if invalid tag
		}
	
		// Query the posts
		$args = [
			'posts_per_page' => $wbea_blog_number,
			'post_type' => 'post',
			'post_status' => 'publish',
			'order' => $wbea_blog_order,
			'orderby' => $wbea_blog_orderby,
			'ignore_sticky_posts' => 1,
		];
	
		if (!empty($wbea_blog_include_categories)) {
			$args['cat'] = $wbea_blog_include_categories;
		}
	
		$query = new \WP_Query($args);
		?>
		<!-- Blog Start Here -->
		<section class="wbea-blog">
			<div class="wb-grid-row">
				<?php if ($query->have_posts()) : ?>
					<?php while ($query->have_posts()) : $query->the_post(); ?>
						<div class="<?php echo esc_attr($this->get_grid_classes($settings)); ?> wb-grid-tablet-6 wb-grid-mobile-12">
							<div class="wbea-single-blog">
								<div class="wbea-blog-content">
									<div class="wbea-blog-meta">
										<?php
										if ($wbea_blog_cat_visibility) {
											the_category(', ');
										}
										if ($wbea_blog_date_visibility) {
											?>
											<a class="wbea-blog-date" href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_date('j M, y')); ?></a>
											<?php
										}
										?>
									</div>
									<div class="wbea-blog-title">
										<<?php echo esc_attr($wbea_blog_title_tag); ?> class="wbea-blog-post-title">
											<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
										</<?php echo esc_attr($wbea_blog_title_tag); ?>>
									</div>
									<?php if (!empty	($wbea_blog_excerpt_visibility)) : ?>
										<div class="wbea-blog-excerpt">
											<?php 
											echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); 
											?>
										</div>
									<?php endif; ?>

								</div>
								<?php
								$thumbnail_url = get_the_post_thumbnail_url() ?: 'default-image.jpg';
								?>
								<div class="wbea-blog-img" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
									<a href="<?php echo esc_url(get_the_permalink()); ?>" class="wbea-icon-border" aria-label="<?php the_title_attribute(); ?>">
									<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M15.3984 8.05859L9.77344 13.6836C9.5625 13.8945 9.28125 14 9 14C8.68359 14 8.40234 13.8945 8.19141 13.6836C7.73438 13.2617 7.73438 12.5234 8.19141 12.1016L11.8828 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H11.8828L8.19141 2.43359C7.73438 2.01172 7.73438 1.27344 8.19141 0.851562C8.61328 0.394531 9.35156 0.394531 9.77344 0.851562L15.3984 6.47656C15.8555 6.89844 15.8555 7.63672 15.3984 8.05859Z" fill="#004851"/>
										</svg>
									</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>
		<!-- Blog End Here -->
		<?php
	}	
}