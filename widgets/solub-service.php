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
class Solub_Service extends Widget_Base {

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
		return 'Solub_Service';
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
		return __( 'Service Post', 'solub_core' );
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
     $this->register_service_content_controls();
	 $this->register_service_style_controls();
	 }
     

	protected function register_service_content_controls() {



    $this->start_controls_section(
                'icon_list_widget',
                [
                    'label' => __( 'Service', 'solub_core' ),
                    
                ]
            );

		$this->add_control(
			'post_per_page',
			[
				'label' => esc_html__( 'Service Per Page', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'post_in',
			[
				'label' => esc_html__( 'Service Include', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => 
					tp_all_post() ,
			]
		);

		$this->add_control(
			'post_not_in',
			[
				'label' => esc_html__( 'Service Exclude', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => 
					tp_all_post() ,
			]
		);

		$this->add_control(
			'post_order',
			[
				'label' => esc_html__( 'Service Order', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => esc_html__( 'ASC', 'solub_core' ),
					'DESC' => esc_html__( 'DESC', 'solub_core' ),
				],
			]
		);

		$this->add_control(
			'post_order_by',
			[
				'label' => esc_html__( 'Service Order By', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'ID' => 'Post ID',
			        'author' => 'Post Author',
			        'title' => 'Title',
			        'date' => 'Date',
			        'modified' => 'Last Modified Date',
			        'parent' => 'Parent Id',
			        'rand' => 'Random',
			        'comment_count' => 'Comment Count',
			        'menu_order' => 'Menu Order',
				],
			]
		);

        

            

		$this->end_controls_section();
		
	}

		
        protected function register_service_style_controls() {
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'solub_core' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
                   
        $args = array(
            'post_type'      => 'service',
            'post_status'    => 'publish',
            'posts_per_page'   => $settings['post_per_page'],
            'post__in'   => $settings['post_in'],
            'post__not_in'   => $settings['post_not_in'],
			'order'   => $settings['post_order'],
            'orderby' => $settings['post_order_by'],
        );
        $query = new \WP_Query( $args );

         ?>

<section class="tp-service-breadcrumb-ptb pt-130 pb-120">
    <div class="container">
        <div class="row">

            <?php if ($query-> have_posts()): while ($query-> have_posts()): $query-> the_post(); 
			$categories = get_the_category();
			// var_dump($categories);
			
			?>
            <div class="col-xl-4 col-lg-6">
                <div class="tp-service-3-item p-relative mb-30">


                    <div class="tp-service-3-item-thumb p-relative">
                        <a href="<?php the_permalink( )?>"><?php the_post_thumbnail()?></a>
                        <h4 class="tp-service-3-item-thumb-title"><a
                                href="<?php the_permalink( )?>"><?php the_title()?></a>
                        </h4>
                    </div>
                    <div class="tp-service-3-item-content text-center">
                        <span><svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32.8982 3.5C29.8054 3.5 27.2982 6.00723 27.2982 9.1C27.3017 12.1914 29.8068 14.6965 32.8982 14.7C35.991 14.7 38.4982 12.1928 38.4982 9.1C38.4982 6.00723 35.991 3.5 32.8982 3.5ZM32.8982 13.3C30.5786 13.3 28.6982 11.4196 28.6982 9.1C28.7005 6.78134 30.5795 4.90228 32.8982 4.9C35.2178 4.9 37.0982 6.78038 37.0982 9.1C37.0982 11.4196 35.2178 13.3 32.8982 13.3Z"
                                    fill="currentColor"></path>
                                <path d="M33.5982 0H32.1982V2.1H33.5982V0Z" fill="currentColor"></path>
                                <path d="M33.5982 16.1H32.1982V18.2H33.5982V16.1Z" fill="currentColor"></path>
                                <path d="M25.8982 8.4H23.7982V9.8H25.8982V8.4Z" fill="currentColor"></path>
                                <path d="M41.9982 8.4H39.8982V9.8H41.9982V8.4Z" fill="currentColor"></path>
                                <path
                                    d="M26.9578 2.17051L25.9679 3.16045L27.4528 4.64536L28.4428 3.65542L26.9578 2.17051Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M38.3421 13.5535L37.3521 14.5435L38.837 16.0284L39.827 15.0384L38.3421 13.5535Z"
                                    fill="currentColor"></path>
                                <path d="M27.453 13.5529L25.9681 15.0378L26.9581 16.0277L28.443 14.5428L27.453 13.5529Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M38.8378 2.17034L37.3529 3.65525L38.3429 4.64518L39.8278 3.16028L38.8378 2.17034Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M37.7128 40.9647L20.9128 10.1647C20.7901 9.93982 20.5544 9.79991 20.2982 9.8H0.698209C0.645622 9.80114 0.593297 9.80787 0.542109 9.8203C0.536509 9.8203 0.530909 9.8203 0.525309 9.8203C0.457059 9.83859 0.392134 9.86737 0.332809 9.9057C0.315309 9.91725 0.298422 9.92994 0.282409 9.9435C0.224659 9.98734 0.173647 10.0394 0.131209 10.0982C0.121409 10.1129 0.108109 10.1248 0.0990092 10.1402C0.0841342 10.1685 0.0714467 10.198 0.0612092 10.2284C0.0520217 10.2466 0.0438842 10.2653 0.0367092 10.2844C0.0143967 10.3522 0.00258418 10.423 0.00170918 10.4944V15.4C0.00162168 15.5163 0.0304967 15.6308 0.0857092 15.7332L14.0822 41.6332C14.2046 41.8593 14.4411 42.0002 14.6982 42H37.0982C37.4848 42.0001 37.7983 41.6867 37.7983 41.3001C37.7984 41.1829 37.769 41.0676 37.7128 40.9647ZM31.7187 32.9H27.014L23.5777 26.6H28.2824L31.7187 32.9ZM14.9187 25.2H9.51401L6.07771 18.9H11.4824L14.9187 25.2ZM13.0777 18.9H17.7824L21.2187 25.2H16.514L13.0777 18.9ZM15.6824 26.6L19.1187 32.9H13.714L10.2777 26.6H15.6824ZM17.2777 26.6H21.9824L25.4187 32.9H20.714L17.2777 26.6ZM27.5187 25.2H22.814L19.3777 18.9H24.0824L27.5187 25.2ZM19.8824 11.2L23.3187 17.5H18.614L15.1777 11.2H19.8824ZM13.5824 11.2L17.0187 17.5H12.314L8.87771 11.2H13.5824ZM7.28241 11.2L10.7187 17.5H5.31401L1.87771 11.2H7.28241ZM15.1182 40.6L1.39821 15.2229V13.2454L16.3187 40.6H15.1182ZM17.914 40.6L14.4777 34.3H19.8824L23.3187 40.6H17.914ZM24.914 40.6L21.4777 34.3H26.1824L29.6187 40.6H24.914ZM31.214 40.6L27.7777 34.3H32.4824L35.9187 40.6H31.214Z"
                                    fill="currentColor"></path>
                            </svg></span>
                        <h4 class="tp-service-3-item-title"><a href="<?php the_permalink( )?>"><?php the_title()?></a>
                        </h4>
                        <p><?php the_excerpt(  )?></p>
                        <a class="tp-service-3-item-btn" href="<?php the_permalink( )?>"><svg width="14" height="14"
                                viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7H13M13 7L7 1M13 7L7 13" stroke="white" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></a>
                    </div>


                </div>
            </div>
            <?php endwhile;else: ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>

        </div>
    </div>
</section>



<?php
            }
        }

        $widgets_manager->register( new Solub_Service() );