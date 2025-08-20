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
class Solub_Project_List extends Widget_Base {

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
		return 'Solub_Project_List';
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
		return __( 'Project List', 'solub_core' );
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
     $this->register_project_list_controls();
	 $this->register_project_list_style_controls();
	 }
     

	protected function register_project_list_controls() {

        $this->start_controls_section(
			'project_section',
			[
				'label' => __( 'Content', 'solub_core' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

         $repeater->add_control(
			'project_url',
			[
				'label' => esc_html__( 'Project URL', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#' , 'solub_core' ),
				'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'project_title',
			[
				'label' => esc_html__( 'Title', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'solub_core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'project_content',
			[
				'label' => esc_html__( 'Content', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Service Content' , 'solub_core' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Project List', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'image' => esc_html__( 'Image', 'solub_core' ),
						
					],
		
					[
						'project_title' => esc_html__( 'Title', 'solub_core' ),
						
					],
					[
						'project_content' => esc_html__( 'Content', 'solub_core' ),
						
					],

                    [
						'project_url' => esc_html__( 'Project URL', 'solub_core' ),
						
					],
				],
				'title_field' => '{{{ image }}}',
				'title_field' => '{{{ project_title }}}',
				'title_field' => '{{{ project_content }}}',
                'title_field' => '{{{ project_url }}}',
			]
		);
		

       

		$this->end_controls_section();
    }

		
        protected function register_project_list_style_controls() {
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


<div class="tp-portfolio-wrapper pb-70">
    <div class="swiper tp-portfolio-active">
        <div class="swiper-wrapper">

            <?php foreach($settings['list'] as $item ) :?>
            <div class="swiper-slide">
                <div class="tp-portfolio-item p-relative">
                    <div class="tp-portfolio-item-thumb">
                        <img src="<?php echo esc_url($item['image']['url']); ?>" alt="">
                    </div>
                    <div class="tp-portfolio-item-popup">
                        <a href="<?php echo esc_url($item['image']['url']); ?>" class="popup-image">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                    fill="none">
                                    <path
                                        d="M27.6728 26.0245L20.7147 19.0663C22.6108 16.7473 23.5431 13.7881 23.3187 10.801C23.0942 7.81379 21.7302 5.02716 19.5088 3.01747C17.2874 1.00778 14.3786 -0.0712239 11.3839 0.00365169C8.38926 0.0785273 5.53795 1.30155 3.41975 3.41975C1.30155 5.53795 0.0785273 8.38926 0.00365169 11.3839C-0.0712239 14.3786 1.00778 17.2874 3.01747 19.5088C5.02716 21.7302 7.81379 23.0942 10.801 23.3187C13.7881 23.5431 16.7473 22.6108 19.0663 20.7147L26.0245 27.6728C26.2443 27.8851 26.5388 28.0026 26.8444 28C27.1501 27.9973 27.4424 27.8747 27.6586 27.6586C27.8747 27.4424 27.9973 27.1501 28 26.8444C28.0026 26.5388 27.8851 26.2443 27.6728 26.0245ZM11.6944 21.0201C9.84996 21.0201 8.04693 20.4731 6.51334 19.4484C4.97974 18.4237 3.78444 16.9672 3.0786 15.2632C2.37277 13.5591 2.18809 11.6841 2.54792 9.87505C2.90775 8.06605 3.79594 6.40437 5.10016 5.10016C6.40437 3.79594 8.06605 2.90775 9.87505 2.54792C11.6841 2.18809 13.5591 2.37277 15.2632 3.0786C16.9672 3.78444 18.4237 4.97974 19.4484 6.51334C20.4731 8.04693 21.0201 9.84996 21.0201 11.6944C21.0173 14.1669 20.0339 16.5373 18.2856 18.2856C16.5373 20.0339 14.1669 21.0173 11.6944 21.0201Z"
                                        fill="currentColor" />
                                </svg></span>
                        </a>
                    </div>
                    <div class="tp-portfolio-item-content text-center">
                        <span><?php echo esc_html( $item['project_content'] )?></span>
                        <h3 class="tp-portfolio-item-title"><a
                                href="<?php echo esc_url($item['project_url']); ?>"><?php echo solub_core_kses( $item['project_title'] )?></a>
                        </h3>
                    </div>
                </div>
            </div>

            <?php endforeach;?>
        </div>
    </div>
</div>



<?php
            }
        }

        $widgets_manager->register( new Solub_Project_List() );