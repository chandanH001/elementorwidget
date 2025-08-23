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
class Solub_Section extends Widget_Base {

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
		return 'solub_section';
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
		return __( 'Video Section', 'solub_core' );
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
     $this->register_video_section_controls();
	 $this->register_video_section_style_controls();
	 }



	protected function register_video_section_controls() {
		$this->start_controls_section(
			'hero_title_section',
			[
				'label' => __( 'Content', 'solub_core' ),
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
			'video_bg_image',
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
			'video_url_lable',
			[
				'label' => __( 'Video URL', 'solub_core' ),
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

		
	

    $this->start_controls_section(
        'left_image_Select',
        [
            'label' => __( 'Left Image', 'solub_core' ),
        ]
    );

    $this->add_control(
        'left_image',
        [
            'label' => esc_html__( 'Choose Image', 'solub_core' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    
    $this->end_controls_section();
}

		
        protected function register_video_section_style_controls() {
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




<section class="tp-video-ptb tp-video-overlay fix p-relative"
    style="background-image: url(<?php echo esc_attr($settings['image']['url'] )?>);">
    <div class="tp-video-shape wow fadeInLeft" data-wow-duration=".9s" data-wow-delay=".5s">
        <img src="<?php echo esc_attr($settings['left_image']['url'] )?>" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-video-wrap text-center wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <a class="tp-video-btn popup-video text-center"
                        href="<?php echo esc_url( $settings['video_url'] )?>">
                        <span class="tp-text-theme-primary"><svg width="18" height="22" viewBox="0 0 18 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 11L0 21.3923V0.607696L18 11Z" fill="white"></path>
                            </svg>
                        </span>
                    </a>
                    <h3 class="tp-video-title"><?php echo solub_core_kses( $settings['title'] ) ; ?> </h3>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
	}
}

$widgets_manager->register( new Solub_Section() );