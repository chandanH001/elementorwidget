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
class Solub_Service_list extends Widget_Base {

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
		return 'Solub_Service_list';
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
		return __( 'Service List', 'solub_core' );
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
     $this->register_service_list_controls();
	 $this->register_service_list_style_controls();
	 }
     

	protected function register_service_list_controls() {

    $this->start_controls_section(
			'heading_title_section',
			[
				'label' => __( 'Content', 'solub_core' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html( 'Sub Title'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html('Title'),
				'label_block' => true,

			]
		);

        $this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'solub_core' ),
				'placeholder' => esc_html__( 'Type your description here', 'solub_core' ),
				'label_block' => true,

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
                'icon_list_widget',
                [
                    'label' => __( 'Service List Info', 'solub_core' ),
                    
                ]
            );



		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon-style',
			[
				'label' => esc_html__( 'Select Icon', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon' => esc_html__( 'Icon', 'solub_core' ),
					'image' => esc_html__( 'Image', 'solub_core' ),
					'svg' => esc_html__( 'SVG', 'solub_core' ),
				],
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-smile',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon-style' => 'icon',
				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image Icon', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon-style' => 'image',
				],
			]
		);

		$repeater->add_control(
			'svg',
			[
				'label' => esc_html__( 'SGV', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'condition' => [
					'icon-style' => 'svg',
				],
			]
		);
        
        
        $repeater->add_control(
			'service_title',
			[
				'label' => esc_html__( 'Title', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'solub_core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'service_content',
			[
				'label' => esc_html__( 'Content', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Service Content' , 'solub_core' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'service_button',
			[
				'label' => esc_html__( 'Button Link', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		


        
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Service List', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'service_title' => esc_html__( 'Service Title', 'solub_core' ),
						
					],
					[
						'service_content' => esc_html__( 'Service Content', 'solub_core' ),
						
					],
					[
						'service_button' => esc_html__( 'Service Button', 'solub_core' ),
						
					],
				],
				'title_field' => '{{{ service_title }}}',
				'title_field' => '{{{ service_content }}}',
				'title_field' => '{{{ service_button }}}',
			]
		);
		

       

		$this->end_controls_section();
		
	}

		
        protected function register_service_list_style_controls() {
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
			$this->add_render_attribute('button_arg', 'class', 'tp-btn btn-text-flip');
		}

         ?>




<section class="tp-service-ptb fix pt-140" data-bg-color="#EBF3ED">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="tp-service-box wow fadeInLeft" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="tp-service-heading mb-50">
                        <span class="tp-section-title-pre"><?php echo esc_html( $settings['sub_title'] )?></span>
                        <h4 class="tp-section-title mb-30"><?php echo solub_core_kses( $settings['title'] )?></h4>
                        <p><?php echo esc_html( $settings['description'] )?>
                        </p>
                    </div>

                    <?php if (!empty($settings['button_title'])) : ?>
                    <div class="tp-service-btn">
                        <a <?php echo $this->get_render_attribute_string('button_arg'); ?>><span
                                data-text="<?php echo esc_attr( $settings['button_title'] )?>"><?php echo esc_attr( $settings['button_title'] )?></span></a>
                    </div>
                    <?php endif;?>

                </div>
            </div>
            <div class="col-lg-7">
                <div class="tp-service-wrapper wow fadeInRight" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="swiper tp-service-active">
                        <div class="swiper-wrapper">
                            <?php foreach($settings['list'] as $item ) :?>
                            <div class="swiper-slide">
                                <div class="tp-service-item">
                                    <div class="tp-service-item-icon">
                                        <span>
                                            <?php if($item['icon-style'] == 'icon') : ?>
                                            <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            <?php elseif($item['icon-style'] == 'image') : ?>
                                            <img src="<?php echo esc_url($item['image']['url']); ?>" alt="">
                                            <?php else : ?>
                                            <?php echo $item['svg']; ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <div class="tp-service-item-content">
                                        <h4 class="tp-service-item-title"><a
                                                href="service-details.html"><?php echo esc_html( $item['service_title'] )?></a>
                                        </h4>
                                        <p><?php echo esc_html( $item['service_content'] )?></p>
                                        <a class="tp-service-item-btn"
                                            href="<?php echo esc_url( $item['service_button'] )?>">See More <span><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                                    viewBox="0 0 13 13" fill="none">
                                                    <path d="M1 6.5H12M12 6.5L6.5 1M12 6.5L6.5 12" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></span></a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<?php
            }
        }

        $widgets_manager->register( new Solub_Service_list() );