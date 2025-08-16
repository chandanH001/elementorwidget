<?php
namespace SolubCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Solub_Image extends Widget_Base {

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
		return 'Solub_Image';
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
		return __( 'Solub Image', 'solub_core' );
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
		return 'eicon-ehp-hero';
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
     $this->register_solub_image_controls();
	 $this->register_solub_image_style_controls();
	 }


	protected function register_solub_image_controls() {


		$this->start_controls_section(
			'about_image',
			[
				'label' => __( 'Solub Image', 'solub_core' ),
			]
		);

        $this->add_control(
			'solub_image',
			[
				'label' => esc_html__( 'Choose Image 1', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		
        $this->end_controls_section();

		
	}

		
    protected function register_solub_image_style_controls() {
    $this->start_controls_section(
        'section_style',
        [
            'label' => __( 'Image', 'solub_core' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    // Image Width
    $this->add_responsive_control(
        'width',
        [
            'label' => __( 'Width', 'solub_core' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ '%', 'px', 'vw' ],
            'range' => [
                '%' => [ 'min' => 1, 'max' => 100 ],
                'px' => [ 'min' => 1, 'max' => 1000 ],
            ],
            'selectors' => [
                '{{WRAPPER}} .solub-image' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Max Width
    $this->add_responsive_control(
        'max_width',
        [
            'label' => __( 'Max Width', 'solub_core' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ '%', 'px', 'vw' ],
            'selectors' => [
                '{{WRAPPER}} .solub-image' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Height
    $this->add_responsive_control(
        'height',
        [
            'label' => __( 'Height', 'solub_core' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'vh' ],
            'selectors' => [
                '{{WRAPPER}} .solub-image' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Object Fit
    $this->add_control(
        'object_fit',
        [
            'label' => __( 'Object Fit', 'solub_core' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
                '' => __( 'Default', 'solub_core' ),
                'fill' => __( 'Fill', 'solub_core' ),
                'cover' => __( 'Cover', 'solub_core' ),
                'contain' => __( 'Contain', 'solub_core' ),
            ],
            'selectors' => [
                '{{WRAPPER}} .solub-image' => 'object-fit: {{VALUE}};',
            ],
        ]
    );

    // Border
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'image_border',
            'selector' => '{{WRAPPER}} .solub-image',
        ]
    );

    // Border Radius
    $this->add_responsive_control(
        'border_radius',
        [
            'label' => __( 'Border Radius', 'solub_core' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .solub-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    // Box Shadow
    $this->add_group_control(
        \Elementor\Group_Control_Box_Shadow::get_type(),
        [
            'name' => 'box_shadow',
            'selector' => '{{WRAPPER}} .solub-image',
        ]
    );

    // Opacity
    $this->add_control(
        'opacity',
        [
            'label' => __( 'Opacity', 'solub_core' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                '' => [
                    'min' => 0.1,
                    'max' => 1,
                    'step' => 0.01,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .solub-image' => 'opacity: {{SIZE}};',
            ],
        ]
    );

    // CSS Filters
    $this->add_group_control(
        \Elementor\Group_Control_Css_Filter::get_type(),
        [
            'name' => 'css_filters',
            'selector' => '{{WRAPPER}} .solub-image',
        ]
    );

    // Hover Animation
    $this->add_control(
        'hover_animation',
        [
            'label' => __( 'Hover Animation', 'solub_core' ),
            'type' => Controls_Manager::HOVER_ANIMATION,
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

    $this->add_render_attribute( 'image', 'src', esc_url( $settings['solub_image']['url'] ) );
    $this->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['solub_image'] ) );
    $this->add_render_attribute( 'image', 'class', 'solub-image' );

    if ( ! empty( $settings['hover_animation'] ) ) {
        $this->add_render_attribute( 'image', 'class', 'elementor-animation-' . $settings['hover_animation'] );
    }
    ?>
<div class="solub-image-wrapper">
    <img <?php echo $this->get_render_attribute_string( 'image' ); ?> />
</div>
<?php
}
}

$widgets_manager->register( new Solub_Image() );