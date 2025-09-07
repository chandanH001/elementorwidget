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
			$service_svg = function_exists('get_field')? get_field('service_svg'): '';
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

                        <?php if (!empty ($service_svg)) :?>
                        <span><?php echo $service_svg;?></span>
                        <?php endif;?>


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