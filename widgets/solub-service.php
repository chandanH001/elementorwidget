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
                'icon_list_widget',
                [
                    'label' => __( 'Content', 'solub_core' ),
                    
                ]
            );



		$repeater = new \Elementor\Repeater();

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
				'label' => esc_html__( 'Repeater List', 'solub_core' ),
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

         ?>




<section class="tp-service-ptb fix pt-140" data-bg-color="#EBF3ED">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="tp-service-box wow fadeInLeft" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="tp-service-heading mb-50">
                        <span class="tp-section-title-pre">CHECK OUR SERVICES</span>
                        <h4 class="tp-section-title mb-30">Our solar have <br>
                            quality service!</h4>
                        <p>Since 1985 Reed has pioneered specialist recruitment, <br> sourcing knowledgeable, skilled
                            profess
                        </p>
                    </div>
                    <div class="tp-service-btn">
                        <a class="tp-btn btn-text-flip" href="service.html"><span data-text="See all Services">See all
                                Services</span></a>
                    </div>
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
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                                viewBox="0 0 48 52" fill="none">
                                                <path
                                                    d="M39.2235 27.4151L30.363 20.1209C30.214 19.9982 30.0282 19.934 29.833 19.9359L27.8934 19.9684C27.7547 19.5022 27.535 19.0705 27.2497 18.6906V0.812865C27.2497 0.283118 26.7511 -0.103325 26.2402 0.0246426C23.9519 0.596639 22.2228 2.46954 21.8351 4.79612L19.9483 16.1166C19.9166 16.307 19.9537 16.5027 20.053 16.6682L21.0523 18.3339C20.7239 18.6805 20.4553 19.0842 20.2644 19.5292L4.78383 28.4671C4.32578 28.7315 4.23925 29.3561 4.60599 29.7355C6.25414 31.4399 8.74312 31.9877 10.9408 31.1644L20.3887 27.6249L18.3809 50.3751H14.2499C13.8012 50.3751 13.4374 50.7389 13.4374 51.1876C13.4374 51.6363 13.8012 52.0001 14.2499 52.0001H33.7498C34.1985 52.0001 34.5623 51.6363 34.5623 51.1876C34.5623 50.7389 34.1985 50.3751 33.7498 50.3751H29.6188L27.5495 26.9273L39.9659 34.0958C40.4223 34.3596 41.0078 34.1246 41.1532 33.6156C41.8019 31.3483 41.0445 28.9143 39.2235 27.4151ZM23.9998 23.5627C22.6559 23.5627 21.5624 22.4692 21.5624 21.1252C21.5624 19.7813 22.6559 18.6878 23.9998 18.6878C25.3438 18.6878 26.4373 19.7813 26.4373 21.1252C26.4373 22.4692 25.3438 23.5627 23.9998 23.5627ZM23.438 5.06343C23.6588 3.73846 24.4793 2.6161 25.6248 1.99393V17.403C24.6205 16.9628 23.4447 16.9376 22.3859 17.398L21.6005 16.0888L23.438 5.06343ZM10.3706 29.6428C9.1127 30.1138 7.73065 29.9646 6.61915 29.2837L19.9634 21.5794C20.0915 22.7261 20.6983 23.7301 21.5794 24.3859L20.8378 25.7215L10.3706 29.6428ZM27.9874 50.3751H20.0122L22.0923 26.8059C22.1223 26.7576 22.2625 26.5028 23.055 25.0757C23.5498 25.194 24.0209 25.2133 24.4846 25.1579L25.8306 25.935L27.9874 50.3751ZM26.4099 24.3931C27.2935 23.7398 27.9032 22.7372 28.0347 21.5912L29.5612 21.5656L38.1907 28.6697C39.2276 29.5234 39.7894 30.7952 39.7555 32.0983L26.4099 24.3931Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M11.8125 6.09412C11.8125 4.5261 10.5368 3.25037 8.96875 3.25037H7.75C7.3013 3.25037 6.9375 3.61417 6.9375 4.06287C6.9375 4.51157 7.3013 4.87537 7.75 4.87537H8.96875C9.64079 4.87537 10.1875 5.42208 10.1875 6.09412C10.1875 6.76616 9.64079 7.31287 8.96875 7.31287H1.25C0.801297 7.31287 0.4375 7.67667 0.4375 8.12537C0.4375 8.57407 0.801297 8.93787 1.25 8.93787H8.96875C10.5368 8.93787 11.8125 7.66224 11.8125 6.09412Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M4.49996 11.3753C4.49996 11.824 4.86376 12.1878 5.31246 12.1878H13.0312C13.7032 12.1878 14.25 12.7345 14.25 13.4066C14.25 14.0786 13.7032 14.6253 13.0312 14.6253H11.8125C11.3638 14.6253 11 14.9891 11 15.4378C11 15.8865 11.3638 16.2503 11.8125 16.2503H13.0312C14.5992 16.2503 15.875 14.9746 15.875 13.4066C15.875 11.8385 14.5992 10.5628 13.0312 10.5628H5.31246C4.86366 10.5628 4.49996 10.9267 4.49996 11.3753Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M32.1248 13.0003H39.8436C41.4116 13.0003 42.6873 11.7246 42.6873 10.1566C42.6873 8.58855 41.4116 7.31283 39.8436 7.31283H38.6248C38.1761 7.31283 37.8123 7.67662 37.8123 8.12533C37.8123 8.57403 38.1761 8.93783 38.6248 8.93783H39.8436C40.5156 8.93783 41.0623 9.48454 41.0623 10.1566C41.0623 10.8286 40.5156 11.3753 39.8436 11.3753H32.1248C31.6761 11.3753 31.3123 11.7391 31.3123 12.1878C31.3123 12.6365 31.676 13.0003 32.1248 13.0003Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M44.7185 14.6253H43.4998C43.0511 14.6253 42.6873 14.9891 42.6873 15.4378C42.6873 15.8865 43.0511 16.2503 43.4998 16.2503H44.7185C45.3906 16.2503 45.9373 16.797 45.9373 17.469C45.9373 18.1411 45.3906 18.6878 44.7185 18.6878H36.9998C36.5511 18.6878 36.1873 19.0516 36.1873 19.5003C36.1873 19.949 36.5511 20.3128 36.9998 20.3128H44.7185C46.2866 20.3128 47.5623 19.0371 47.5623 17.469C47.5623 15.901 46.2866 14.6253 44.7185 14.6253Z"
                                                    fill="currentColor" />
                                            </svg></span>
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