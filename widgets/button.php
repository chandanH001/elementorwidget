<?php
namespace SolubCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Solub Button
 *
 * Enhanced Elementor button widget with full styling controls.
 *
 * @since 1.0.0
 */
class Solub_Button extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Solub_Button';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Solub Button', 'solub_core' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'solub-widget-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'solub_core' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls(){
		$this->register_content_controls();
		$this->register_style_controls();
	}

	/**
	 * Register content controls
	 */
	protected function register_content_controls() {

		$this->start_controls_section(
		'section_layout',
		[
			'label' => __( 'Layout', 'solub_core' ),
		]
	);

	$this->add_control(
		'btn_list_layout',
		[
			'label' => __( 'Select Button Layout', 'solub_core' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'layout1',
			'options' => [
				'layout1' => __( 'Layout 1 (Simple Button', 'solub_core' ),
				'layout2' => __( 'Layout 2 (2ND Button Layout)', 'solub_core' ),
			],
		]
	);


	$this->end_controls_section();


		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Button Content', 'solub_core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_title',
			[
				'label' => __( 'Button Text', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click Here', 'solub_core' ),
				'placeholder' => __( 'Enter button text', 'solub_core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => __( 'Link', 'solub_core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'solub_core' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				'label_block' => true,
			]
		);

		$this->add_responsive_control(
			'button_align',
			[
				'label' => __( 'Alignment', 'solub_core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'solub_core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'solub_core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'solub_core' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'solub_core' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_size',
			[
				'label' => __( 'Size', 'solub_core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'md',
				'options' => [
					'xs' => __( 'Extra Small', 'solub_core' ),
					'sm' => __( 'Small', 'solub_core' ),
					'md' => __( 'Medium', 'solub_core' ),
					'lg' => __( 'Large', 'solub_core' ),
					'xl' => __( 'Extra Large', 'solub_core' ),
				],
				'style_transfer' => true,
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register style controls
	 */
	protected function register_style_controls() {
		// Button Style Section
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'Button', 'solub_core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .solub-button',
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'solub_core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'solub_core' ),
					'uppercase' => __( 'UPPERCASE', 'solub_core' ),
					'lowercase' => __( 'lowercase', 'solub_core' ),
					'capitalize' => __( 'Capitalize', 'solub_core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .solub-button' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		// Normal State
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'solub_core' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'solub_core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .solub-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'label' => __( 'Background', 'solub_core' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .solub-button',
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
					'color' => [
						'default' => '#007cba',
					],
				],
			]
		);

		$this->end_controls_tab();

		// Hover State
		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'solub_core' ),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' => __( 'Text Color', 'solub_core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .solub-button:hover, {{WRAPPER}} .solub-button:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_background_hover',
				'label' => __( 'Background', 'solub_core' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .solub-button:hover, {{WRAPPER}} .solub-button:focus',
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'solub_core' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'button_border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .solub-button:hover, {{WRAPPER}} .solub-button:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_transition_duration',
			[
				'label' => __( 'Transition Duration', 'solub_core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 's', 'ms' ],
				'default' => [
					'unit' => 's',
					'size' => 0.3,
				],
				'range' => [
					's' => [
						'min' => 0,
						'max' => 3,
						'step' => 0.1,
					],
					'ms' => [
						'min' => 0,
						'max' => 3000,
						'step' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .solub-button' => 'transition-duration: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_hover_animation',
			[
				'label' => __( 'Hover Animation', 'solub_core' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .solub-button',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'solub_core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .solub-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .solub-button',
			]
		);

		$this->add_responsive_control(
			'button_text_padding',
			[
				'label' => __( 'Padding', 'solub_core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .solub-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' => __( 'Margin', 'solub_core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .solub-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['button_title'] ) ) {
			return;
		}

		$this->add_render_attribute( 'wrapper', 'class', 'solub-button-wrapper tp-btn btn-text-flip' );

		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['button_link'] );
		}

		$this->add_render_attribute( 'button', 'class', 'solub-button' );
		$this->add_render_attribute( 'button', 'class', 'solub-button-' . $settings['button_size'] );

		if ( ! empty( $settings['button_hover_animation'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['button_hover_animation'] );
		}

		?>
<?php if ($settings['btn_list_layout']=='layout2'): ?>
<div class="tp-portfolio-btn-wrap text-start text-lg-end">
    <a href="portfolio-details.html" class="tp-btn btn-text-flip">
        <span
            data-text="<?php echo esc_html( $settings['button_title'] ); ?>"><?php echo esc_html( $settings['button_title'] ); ?></span>
    </a>
</div>

<?php else: ?>

<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
    <a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
        <span class="solub-button-text"
            data-text="<?php echo esc_html( $settings['button_title'] ); ?>"><?php echo esc_html( $settings['button_title'] ); ?></span>
    </a>
</div>
<?php endif; ?>
<?php
					}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
<# view.addRenderAttribute( 'wrapper' , 'class' , 'solub-button-wrapper' ); view.addRenderAttribute( 'button' , 'class'
    , 'solub-button' ); view.addRenderAttribute( 'button' , 'class' , 'solub-button-' + settings.button_size ); if (
    settings.button_hover_animation ) { view.addRenderAttribute( 'button' , 'class' , 'elementor-animation-' +
    settings.button_hover_animation ); } if ( settings.button_link.url ) { view.addRenderAttribute( 'button' , 'href' ,
    settings.button_link.url ); } #>
    <div {{{ view.getRenderAttributeString( 'wrapper' ) }}}>
        <a {{{ view.getRenderAttributeString( 'button' ) }}}>
            <span class="solub-button-text">{{{ settings.button_title }}}</span>
        </a>
    </div>
    <?php
	}
}

$widgets_manager->register( new Solub_Button() );