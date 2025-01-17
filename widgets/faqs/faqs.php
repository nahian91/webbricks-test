<?php
namespace WebbricksAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

class WBEA_Faqs extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve faq widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-faq-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve faq widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'FAQs', 'webbricks-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve faq widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'wb-icon eicon-accordion';
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
		return [ 'faq', 'wb'];
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
	       'faq_content',
		    [
		        'label' => esc_html__('Content', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
		    ]
	    );
		
		// FAQ
		$repeater = new Repeater();

		// FAQ Title
		$repeater->add_control(
			'wbea_faq_title',
			[
				'label' => esc_html__( 'FAQ Question', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Where can I find your warranty policy?', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// FAQ Content
		$repeater->add_control(
			'wbea_faq_content',
			[
				'label' => esc_html__( 'FAQ Answer', 'webbricks-addons' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' ),
			]
		);

		// FAQ Lists
		$this->add_control(
			'wbea_faq_list',
			[
				'label' => esc_html__( 'FAQ Lists', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ wbea_faq_title }}}',
				'separator' => 'before',
				'default' => [
					[
						'wbea_faq_title' => esc_html__( 'Where can I find your warranty policy?', 'webbricks-addons' ),
						'wbea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wbea_faq_title' => esc_html__( 'Where can I change or cancel my order?', 'webbricks-addons'),
						'wbea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wbea_faq_title' => esc_html__( 'Are there any return exclusions?', 'webbricks-addons'),
						'wbea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wbea_faq_title' => esc_html__( 'How soon will my order ship?', 'webbricks-addons'),
						'wbea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wbea_faq_title' => esc_html__( 'What are the returns and exchange requirements?', 'webbricks-addons'),
						'wbea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					],
					[
						'wbea_faq_title' => esc_html__( 'When will I be charged for my order?', 'webbricks-addons'),
						'wbea_faq_content' => esc_html__( 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons' )
					]
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_faq_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		);

		$this->add_control( 
			'wbea_faq_pro_message_notice', 
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
			'wbea_faq_options',
			[
				'label' => esc_html__( 'Layouts', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// FAQ Border Color
		$this->add_control(
			'wbea_faq_border_color',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-faq' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'wbea_faq_title_options',
			[
				'label' => esc_html__( 'FAQ Question', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// FAQ Title Color
		$this->add_control(
			'wbea_faq_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-faq li span' => 'color: {{VALUE}}',
				],
			]
		);

		// FAQ Title Border Color
		$this->add_control(
			'wbea_faq_title_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-faq li' => 'border-color: {{VALUE}}',
				],
			]
		);

		// FAQ Title Border Active Color
		$this->add_control(
			'wbea_faq_title_border_active_color',
			[
				'label' => esc_html__( 'Border Active', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-faq li span.active' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		// FAQ Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_faq_title_typography',
				'selector' => '{{WRAPPER}} .wbea-faq li span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_faq_desc_options',
			[
				'label' => esc_html__( 'FAQ Answer', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		// FAQ Description Color
		$this->add_control(
			'wbea_faq_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-faq li, {{WRAPPER}} .wbea-faq li p, {{WRAPPER}} .wbea-faq li ul, {{WRAPPER}} .wbea-faq li ol' => 'color: {{VALUE}}',
				],
			]
		);
		
		// FAQ Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_faq_desc_typography',
				'selector' => '{{WRAPPER}} .wbea-faq li, {{WRAPPER}} .wbea-faq li p, {{WRAPPER}} .wbea-faq li ul, {{WRAPPER}} .wbea-faq li ol',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();

		// start of the Style tab section
		$this->start_controls_section(
			'wbea_faq_icon_options',
			[
				'label' => esc_html__( 'Icon', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// FAQ Icon Active Color
		$this->add_control(
			'wbea_faq_icon_active_color',
			[
				'label' => esc_html__( 'Open State', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-faq span.active::after' => 'color: {{VALUE}}',
				],
			]
		);

		// FAQ Icon Color
		$this->add_control(
			'wbea_faq_icon_color',
			[
				'label' => esc_html__( 'Close State', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-faq span:after' => 'color: {{VALUE}}',
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
		$wbea_faq_list = isset($settings['wbea_faq_list']) ? $settings['wbea_faq_list'] : [];       
	
		if (!empty($wbea_faq_list)) {
			?>
			<ul class="wbea-faq">
				<?php
				foreach ($wbea_faq_list as $list) {
					// Sanitize and escape data at the point of output
					$faq_title = isset($list['wbea_faq_title']) ? esc_html($list['wbea_faq_title']) : '';
					$faq_content = isset($list['wbea_faq_content']) ? wp_kses_post($list['wbea_faq_content']) : ''; // Allow certain HTML in content
					?>
					<li>
						<!-- Wrap the FAQ title in a span for the JavaScript to work -->
						<h4><span><?php echo esc_html($faq_title); ?></span></h4>
						<!-- The content will be hidden by default, controlled by the JavaScript -->
						<p><?php echo wp_kses_post($faq_content); ?></p>
					</li>
					<?php
				}
				?>
			</ul>
			<?php
		}
	}	
}