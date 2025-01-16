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

class WBEA_Team extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve team widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'webbricks-team-widget';
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
		return esc_html__( 'Team Grid', 'webbricks-addons' );
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
		return 'wb-icon eicon-person';
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
		return [ 'team', 'memeber', 'wb'];
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
	       'wbea_team_contents',
		    [
		        'label' => esc_html__('Contents', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
		    ]
	    );

		// Team Image
		$this->add_control(
			'wbea_team_image',
			[
				'label' => esc_html__( 'Choose Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-1-web-bricks.webp',
				],
				'separator' => 'before',
			]
		);

		// Team Name
		$this->add_control(
			'wbea_team_name',
			[
				'label' => esc_html__( 'Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// Team Name Tag
		$this->add_control(
			'wbea_team_name_tag',
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

		// Team Designation
		$this->add_control(
			'wbea_team_designation',
			[
				'label' => esc_html__( 'Designation', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Developer', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_team_socials_contents',
			[
				'label' => esc_html__('Socials', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		   
			]
		 );

		// Team Socials Show?
		$this->add_control(
			'wbea_team_social_show',
			[
				'label' => esc_html__( 'Show Socials', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);

		// Team Socials
		$repeater = new Repeater();

		$repeater->add_control(
			'wbea_team_social_name',
			[
				'label' => esc_html__( 'Social Name', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Social Name', 'webbricks-addons' ),
				'separator' => 'before',
				'label_block' => true
			]
		);

		// Team Social Icon
		$repeater->add_control(
			'wbea_team_social_icon',
			[
				'label' => esc_html__( 'Team Social Icon', 'webbricks-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-square',
					'library' => 'solid',
				],
			]
		);

		// Team Social Link
		$repeater->add_control(
			'wbea_team_social_link', [
				'label' => esc_html__( 'Team Social Links', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://www.facebook.com/webBricksWP/',
					'is_external' => true,
					'nofollow' => false,
					'custom_attributes' => '',
				],
			]
		);

		// Team Socials
		$this->add_control(
			'wbea_team_socials',
			[
				'label' => esc_html__( 'Team Socials List', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'wbea_team_social_name' => esc_html__( 'Twitter', 'webbricks-addons' ),
						'wbea_team_social_link' => 'https://twitter.com/',
						'wbea_team_social_icon' => [
							'value' => 'fab fa-twitter-square',
						],
					],
					[
						'wbea_team_social_name' => esc_html__( 'Instagram', 'webbricks-addons' ),
						'wbea_team_social_link' => 'https://www.instagram.com//',
						'wbea_team_social_icon' => [
							'value' => 'fab fa-instagram',
						],
					],
					[
						'wbea_team_social_name' => esc_html__( 'Linekdin', 'webbricks-addons' ),
						'wbea_team_social_link' => 'https://www.linkedin.com/company/web-bricks-wp',
						'wbea_team_social_icon' => [
							'value' => 'fab fa-linkedin',
						],
					]
				],
				'title_field' => '{{{ wbea_team_social_name }}}',
				'separator' => 'before',
				'condition' => [
					'wbea_team_social_show' => 'yes'
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wbea_team_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wbea_team_pro_message_notice', 
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

		// Team Layout Style
		$this->start_controls_section(
			'wbea_team_layout_style',
			[
				'label' => esc_html__( 'Layout', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wbea_team_bg_pattern',
			[
				'label' => __( 'Background Pattern', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => __( 'Style 1', 'webbricks-addons' ),
					'style-2' => __( 'Style 2', 'webbricks-addons' ),
					'none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'style-1',
			]
		);

		// Team Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wbea_team_border',
				'selector' => '{{WRAPPER}} .wbea-team-content',
			]
		);	

		// Team Alignment
		$this->add_control(
			'wbea_team_alignment',
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
					'{{WRAPPER}} .wbea-team' => 'text-align: {{VALUE}}',
				],
			],
		);

		$this->end_controls_section();	

		// Team Image Style
		$this->start_controls_section(
			'wbea_team_image_style',
			[
				'label' => esc_html__( 'Image', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Team Image Width
		$this->add_control(
			'wbea_team_image_width',
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
					'{{WRAPPER}} .wbea-team-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Height
		$this->add_control(
			'wbea_team_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 600,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-team-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team Image Border
		$this->add_control(
			'wbea_team_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .wbea-team-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();	

		// Team Name Style
		$this->start_controls_section(
			'wbea_team_name_style',
			[
				'label' => esc_html__( 'Name', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Team Name Color
		$this->add_control(
			'wbea_team_name_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-team-name' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Team Name Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_team_name_typography',
				'selector' => '{{WRAPPER}} .wbea-team-name',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		$this->end_controls_section();		

		// Team Designation Style
		$this->start_controls_section(
			'wbea_team_desg_style',
			[
				'label' => esc_html__( 'Designation', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Team Designation Color
		$this->add_control(
			'wbea_team_desg_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-team-desg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Team Designation Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wbea_team_desg_typography',
				'selector' => '{{WRAPPER}} .wbea-team-desg',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();

		// Team Social
		$this->start_controls_section(
			'wbea_team_social_section',
			[
				'label' => esc_html__( 'Social', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wbea_team_social_show' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'wbea_team_social_icon_style_tabs'
		);

		// Team Social Normal Tab
		$this->start_controls_tab(
			'wbea_team_social_icon_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// Team Social Icon Color
		$this->add_control(
			'wbea_social_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-team-social a' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// Team Social Icon Size
		$this->add_control(
			'wbea_social_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'webbricks-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 18,
				],
				'selectors' => [
					'{{WRAPPER}} .wbea-team-social a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// Team Social Hover Tab
		$this->start_controls_tab(
			'wbea_team_social_icon_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// Team Social Icon Hover Color
		$this->add_control(
			'wbea_social_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbea-team-social a:hover' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		// End of Style tab section

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
	
		// Raw variables from settings (sanitized/escaped at output)
		$wbea_team_image = $settings['wbea_team_image']['url'] ?? '';
		$wbea_team_name = $settings['wbea_team_name'] ?? '';
		$wbea_team_name_tag = $settings['wbea_team_name_tag'] ?? 'h3';
		$wbea_team_designation = $settings['wbea_team_designation'] ?? '';
		$wbea_team_social_show = $settings['wbea_team_social_show'] ?? 'no';
		$wbea_team_socials = is_array($settings['wbea_team_socials'] ?? null) ? $settings['wbea_team_socials'] : [];
		$wbea_team_bg_pattern = isset($settings['wbea_team_bg_pattern']) ? $settings['wbea_team_bg_pattern'] : '';

		// Background pattern URLs
		$team_pattern_url = '';
		switch ($wbea_team_bg_pattern) {
			case 'style-1':
				$team_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp';
				break;
			case 'style-2':
				$team_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/service-pattern-2-web-bricks.webp';
				break;
			case 'none':
				$team_pattern_url = '';
				break;
			default:
				$team_pattern_url = 'https://market.weekitechi.com/wp-content/uploads/2025/01/team-pattern-7-1-web-bricks.webp'; // Default pattern
				break;
		}
	
		// Allow-list for heading tags
		$allowed_heading_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
		$wbea_team_name_tag = in_array($wbea_team_name_tag, $allowed_heading_tags, true) ? $wbea_team_name_tag : 'h3';
		?>
	
		<div class="wbea-team">
			<div class="wbea-team-img" style="background-image:url(<?php echo esc_url($wbea_team_image); ?>)"></div>
			<div 
				class="wbea-team-bg" 
				<?php if (!empty($team_pattern_url)) : ?>
					style="background-image: url('<?php echo esc_url($team_pattern_url); ?>');"
				<?php endif; ?>
			>
				<div class="wbea-team-content">
					<<?php echo esc_attr($wbea_team_name_tag); ?> class="wbea-team-name">
						<?php echo esc_html($wbea_team_name); ?>
					</<?php echo esc_attr($wbea_team_name_tag); ?>>
					<p class="wbea-team-desg"><?php echo esc_html($wbea_team_designation); ?></p>
	
					<?php if ($wbea_team_social_show === 'yes' && !empty($wbea_team_socials)) : ?>
						<div class="wbea-team-social">
							<?php foreach ($wbea_team_socials as $social) : 
								$social_link = $social['wbea_team_social_link']['url'] ?? '#';
								$social_icon = $social['wbea_team_social_icon']['value'] ?? '';
							?>
								<a href="<?php echo esc_url($social_link); ?>" target="_blank" rel="noopener noreferrer">
									<i class="<?php echo esc_attr($social_icon); ?>"></i>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
}