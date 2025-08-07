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
class Solub_About_Image extends Widget_Base {

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
		return 'Solub_About_Image';
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
		return __( 'About Image', 'solub_core' );
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
     $this->register_about_image_controls();
	 $this->register_about_image_style_controls();
	 }


	protected function register_about_image_controls() {


		$this->start_controls_section(
			'about_image',
			[
				'label' => __( 'About Image', 'solub_core' ),
			]
		);

        $this->add_control(
			'image_1',
			[
				'label' => esc_html__( 'Choose Image 1', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'image_2',
			[
				'label' => esc_html__( 'Choose Image 2', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);



		
        $this->end_controls_section();

		
	}

		
        protected function register_about_image_style_controls() {
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'solub_core' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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

         ?>


<div class="tp-about-thumb-wrap mb-40 p-relative">
    <div class="tp-about-icon p-absolute">
        <div class="tp-about-icon-space p-relative d-inline-block">
            <img class="tp-rotate-infinite"
                src="<?php echo get_template_directory_uri();?>/assets/img/about/about-text.png" alt="text">
            <img class="position-middle"
                src="<?php echo get_template_directory_uri();?>/assets/img/about/about-text-shape.png" alt="thumb">
        </div>
    </div>
    <div class="tp-about-thumb pr-160 wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
        <img class="w-100" src="<?php echo esc_attr($settings['image_1']['url'] )?>" alt="">
    </div>
    <div class="tp-about-thumb-2 p-absolute wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.3s">
        <img class="w-100" src="<?php echo esc_attr($settings['image_2']['url'] )?>" alt="">
    </div>
</div>


<?php
	}
}

$widgets_manager->register( new Solub_About_Image() );