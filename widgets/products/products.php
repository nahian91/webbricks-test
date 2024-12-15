<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class Products extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve products widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-products-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve products widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Products Grid', 'webbricks-addons' );
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
		return 'wb-icon eicon-product-related';
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
		return [ 'products', 'shop', 'wb'];
	}

	public function get_grid_classes( $settings, $columns_field = 'wb_column_per_row' ) {        
        $grid_classes = 'wb-grid-desktop-';
        $grid_classes .= $settings[$columns_field];
        // $grid_classes .= ' wb-grid-tablet-';
        // $grid_classes .= $settings[$columns_field . '_tablet'];
        // $grid_classes .= ' wb-grid-mobile-';
        // $grid_classes .= $settings[$columns_field . '_mobile'];

        return apply_filters( 'wb_grid_classes', $grid_classes, $settings, $columns_field );
    }

	/**
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// Start of the Products Content Tab Section
	   	$this->start_controls_section(
	       'products_content',
		    [
		        'label' => esc_html__('Contents', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		   
		    ]
	    );

		// Products Number
		$this->add_control(
			'wb_products_number',
			[
				'label' 		=> __('Number of Products', 'webbricks-addons'),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> '3',
			]
		);

		// Products Column
		$this->add_control( 
			'wb_column_per_row', 
			[
				'label'              => esc_html__( 'Columns', 'webbricks-addons' ),
				'type'               => Controls_Manager::SELECT,
				'default'            => '4',
				'tablet_default'     => '2', // Default value for tablet
				'mobile_default'     => '1', // Default value for mobile
				'options'            => [
					'12' => '1',
					'6'  => '2',
					'4'  => '3',
					'3'  => '4',
					'2'  => '6',
				],
				'frontend_available' => true,
			] 
		);

		// Products Category
		// $this->add_control(
		// 	'wb_products_category',
		// 	[
		// 		'label' => __('Product Category', 'webbricks-addons'),
		// 		'type' => Controls_Manager::SELECT2,
		// 		'options' => $this->get_product_categories(),
		// 		'multiple' => true,
		// 	]
		// );

		// Products Order
		$this->add_control(
			'wb_products_order',
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

		// Products Orderby
		$this->add_control(
			'wb_products_orderby',
			[
				'label' 		=> __('Order By', 'webbricks-addons'),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options' 		=> [
					''               => __('Default', 'webbricks-addons'),
					'date'           => __('Date', 'webbricks-addons'),
					'title'          => __('Title', 'webbricks-addons'),
					'name'           => __('Name', 'webbricks-addons'),
					'rand'           => __('Random', 'webbricks-addons'),
					'comment_count'  => __('Comment Count', 'webbricks-addons'),
					'menu_order'     => __('Menu Order', 'webbricks-addons'),
					'best_selling'   => __('Best Selling', 'webbricks-addons'),
					'on_sale'        => __('On Sale', 'webbricks-addons'),
					'latest_products' => __('Latest Products', 'webbricks-addons'),
				],
			]
		);
		
		$this->end_controls_section();
		// End of the Products Content Tab Section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_products_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		$this->add_control( 
			'wb_products_pro_message_notice', 
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
		
		// Products Layout
		$this->start_controls_section(
			'wb_products_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Product Background
		$this->add_control(
			'wb_product_layout_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-product' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Product Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_product_layout_border',
				'selector' => '{{WRAPPER}} .single-product',
			]
		);	

		// Products Padding
		$this->add_control(
			'wb_product_layout_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .single-product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Border Radius
		$this->add_control(
			'wb_product_layout_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'selectors' => [
					'{{WRAPPER}} .single-product' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Start of the Products Content Tab Section
		$this->start_controls_section(
			'wb_products_image',
			[
				'label' => esc_html__('Images', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_STYLE		   
			]
		);

		// Products Image Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wb_product_border',
				'selector' => '{{WRAPPER}} .product-img',
			]
		);	

		// Products Image Border
		$this->add_control(
			'wb_product_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'default' => [
					'top' => '12',
					'right' => '12',
					'bottom' => '12',
					'left' => '12',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .product-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Products Image Width
		$this->add_control(
			'wb_products_image_width',
			[
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Products Image Height
		$this->add_control(
			'wb_products_image_height',
			[
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		// Products Title
		$this->start_controls_section(
			'wb_products_title_style',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Title Color
		$this->add_control(
			'wp_product_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-product .product-title a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wp_product_title_typography',
				'selector' => '{{WRAPPER}} .single-product .product-title a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wp_product_title_tag',
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
				'default' => 'h4',
			]
		);

		$this->end_controls_section();

		// Products Meta
		$this->start_controls_section(
			'wb_products_meta_style',
			[
				'label' => esc_html__( 'Meta', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Products Meta Price
		$this->add_control(
			'wb_products_meta_price_style',
			[
				'label' => esc_html__( 'Price', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Meta Price Color
		$this->add_control(
			'wp_product_meta_price_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-bottom p' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Meta Price Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wp_product_meta_typography',
				'selector' => '{{WRAPPER}} .price-bottom p',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		// Products Meta Sale
		$this->add_control(
			'wb_products_meta_sale_style',
			[
				'label' => esc_html__( 'Sale', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Products Meta Sale Color
		$this->add_control(
			'wp_product_meta_price_sale_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-product span.sale' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// Products Meta Sale Background
		$this->add_control(
			'wp_product_meta_sale_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-product span.sale' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Meta Sale Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wp_product_meta_sale_typography',
				'selector' => '{{WRAPPER}} .single-product span.sale',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);
 
		// Product Meta Sale Border Radius
		$this->add_control(
			'wb_product_meta_sale_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem'],
				'default' => [
					'top' => '0',
					'right' => '12',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .single-product span.sale' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Products Button
		$this->start_controls_section(
			'wb_products_button_style',
			[
				'label' => esc_html__( 'Button', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'wp_product_btn_style_tab'
		);

		// Products Button Normal Tab
		$this->start_controls_tab(
			'wp_product_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Products Button Color
		$this->add_control(
			'wp_product_btn_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Button Border
		$this->add_control(
			'wp_product_btn_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// Products Button Background
		$this->add_control(
			'wp_product_btn_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border' => 'background-color: {{VALUE}}',
				],
				'default' => '#fff'
			]
		);

		$this->end_controls_tab();

		// Products Button Hover Tab
		$this->start_controls_tab(
			'wp_product_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Products Button Color
		$this->add_control(
			'wp_product_btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Products Button Border
		$this->add_control(
			'wp_product_btn_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// Products Button Hover Background
		$this->add_control(
			'wp_product_btn_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-border:hover:after' => 'background-color: {{VALUE}}',
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
		// Get widget settings.
		$settings = $this->get_settings_for_display();
		$wb_products_number = $settings['wb_products_number'];
		$wb_products_order = $settings['wb_products_order'];
		$wb_products_orderby = $settings['wb_products_orderby'];
		$wp_product_title_tag = in_array($settings['wp_product_title_tag'], ['h1', 'h2', 'h3', 'h4', 'h5', 'h6']) ? $settings['wp_product_title_tag'] : 'h2';
	
		if (!class_exists('woocommerce')) {
			echo '<p>' . esc_html__('WooCommerce is not active.', 'webbricks-addons') . '</p>';
			return;
		}
	
		$args = [
			'posts_per_page' => intval($wb_products_number),
			'post_type'      => 'product',
			'order'          => sanitize_text_field($wb_products_order),
			'orderby'        => sanitize_text_field($wb_products_orderby),
			'fields'         => 'ids',
		];
	
		$query = new \WP_Query($args);
	
		if ($query->have_posts()) : ?>
			<div class="wb-grid-row">
				<?php while ($query->have_posts()) : $query->the_post();
					$product = wc_get_product(get_the_ID());
					$sale = $product->is_on_sale();
					$thumbnail_url = get_the_post_thumbnail_url() ?: 'path-to-default-image.jpg';
				?>
					<div class="<?php echo esc_attr($this->get_grid_classes($settings)); ?> wb-grid-tablet-6 wb-grid-mobile-12">
						<div class="single-product">
							<?php if ($sale) : ?>
								<span class="sale"><?php echo esc_html__('Sale', 'webbricks-addons'); ?></span>
							<?php endif; ?>
							<div class="product-img" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')"></div>
							<<?php echo esc_html($wp_product_title_tag); ?> class="product-title">
								<a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
							</<?php echo esc_html($wp_product_title_tag); ?>>
							<div class="price-bottom">
								<p><?php echo wp_kses_post(wc_price($product->get_price())); ?></p>
								<a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="icon-border">
								<svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.375 0.25C3.76172 0.25 4.11328 0.566406 4.18359 0.953125L4.25391 1.375H19.0195C19.7578 1.375 20.3203 2.11328 20.1094 2.81641L18.2109 9.56641C18.0703 10.0586 17.6484 10.375 17.1211 10.375H5.97656L6.29297 12.0625H17.1562C17.6133 12.0625 18 12.4492 18 12.9062C18 13.3984 17.6133 13.75 17.1562 13.75H5.58984C5.20312 13.75 4.85156 13.4688 4.78125 13.082L2.67188 1.9375H0.84375C0.351562 1.9375 0 1.58594 0 1.09375C0 0.636719 0.351562 0.25 0.84375 0.25H3.375ZM9.5625 6.57812H11.1094V8.125C11.1094 8.51172 11.3906 8.82812 11.8125 8.82812C12.1992 8.82812 12.5156 8.51172 12.5156 8.125V6.57812H14.0625C14.4492 6.57812 14.7656 6.26172 14.7656 5.875C14.7656 5.48828 14.4492 5.17188 14.0625 5.17188H12.5156V3.625C12.5156 3.23828 12.1992 2.92188 11.8125 2.92188C11.3906 2.92188 11.1094 3.23828 11.1094 3.625V5.17188H9.5625C9.14062 5.17188 8.85938 5.48828 8.85938 5.875C8.85938 6.26172 9.14062 6.57812 9.5625 6.57812ZM4.5 16.5625C4.5 15.6484 5.23828 14.875 6.1875 14.875C7.10156 14.875 7.875 15.6484 7.875 16.5625C7.875 17.5117 7.10156 18.25 6.1875 18.25C5.23828 18.25 4.5 17.5117 4.5 16.5625ZM18 16.5625C18 17.5117 17.2266 18.25 16.3125 18.25C15.3633 18.25 14.625 17.5117 14.625 16.5625C14.625 15.6484 15.3633 14.875 16.3125 14.875C17.2266 14.875 18 15.6484 18 16.5625Z" fill="#004851"/>
</svg>

								</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<p><?php echo esc_html__('No products found.', 'webbricks-addons'); ?></p>
		<?php endif;
	
		wp_reset_postdata();
	}
	
}