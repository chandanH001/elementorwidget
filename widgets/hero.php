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
class Solub_Hero extends Widget_Base {

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
		return 'solub_hero';
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
		return __( 'Home Hero', 'solub_core' );
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
     $this->register_hero_controls();
	 $this->register_hero_style_controls();
	 }










	protected function register_hero_controls() {
		$this->start_controls_section(
			'hero_title_section',
			[
				'label' => __( 'Content', 'solub_core' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'hero_bg_image',
			[
				'label' => __( 'Image', 'solub_core' ),
			]
		);

        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
        $this->end_controls_section();


		$this->start_controls_section(
			'hero_button_section',
			[
				'label' => __( 'Button Info', 'solub_core' ),
			]
		);


		$this->add_control(
			'button_title',
			[
				'label' => __( 'Button Title', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Button Title', 'solub-core' ),
				'label_block' => true,

			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'hero_video_url',
			[
				'label' => __( 'Video Button', 'solub_core' ),
			]
		);

        $this->add_control(
			'video_url',
			[
				'label' => __( 'Video URL', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '#', 'solub-core' ),
				'label_block' => true,

			]
		);

		$this->end_controls_section();

		
	}

		
        protected function register_hero_style_controls() {
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

        if ( ! empty( $settings['button_title'] ) ) {	
			$this->add_link_attributes( 'button_arg', $settings['button_link'] );
			$this->add_render_attribute('button_arg', 'class', 'tp-btn btn-2 btn-text-flip');
		}

         ?>
<section class="tp-hero-ptb tp-hero-hight p-relative"
    style="background-image: url(<?php echo esc_attr($settings['image']['url'] )?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-hero-content p-relative">
                    <div class="tp-hero-heading">

                        <?php if (!empty($settings['sub_title'])) : ?>
                        <span class="tp-hero-heading-subtitle wow fadeInUp" data-wow-duration=".9s"
                            data-wow-delay=".3s"><?php echo solub_core_kses( $settings['sub_title'] ) ; ?></span>
                        <?php endif;?>

                        <?php if(!empty($settings['title'])) : ?>
                        <h3 class="tp-hero-heading-title wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".5s">
                            <?php echo solub_core_kses( $settings['title'] ) ; ?> </h3>
                        <?php endif;?>

                    </div>
                    <div class="tp-hero-btn-box d-flex align-items-center wow fadeInUp" data-wow-duration=".9s"
                        data-wow-delay=".7s">
                        <?php if (!empty($settings['button_title'])) : ?>
                        <div class="tp-hero-btn">
                            <a <?php echo $this->get_render_attribute_string('button_arg'); ?>><span
                                    data-text="<?php echo esc_attr( $settings['button_title'] )?>"><?php echo esc_html( $settings['button_title'] )?></span></a>
                        </div>
                        <?php endif;?>

                        <?php if(!empty($settings['video_url'])):?>
                        <a class="tp-hero-btn-video popup-video d-flex align-items-center"
                            href="<?php echo esc_url( $settings['video_url'] )?>"><span><svg width="11" height="14"
                                    viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 7L0.5 13.0622V0.937822L11 7Z" fill="currentColor" />
                                </svg></span>
                        </a>
                        <?php endif;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
	}
}

$widgets_manager->register( new Solub_Hero() );