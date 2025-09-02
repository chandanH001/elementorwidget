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
class Solub_Blog extends Widget_Base {

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
		return 'Solub_Blog';
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
		return __( 'Blog Post', 'solub_core' );
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
     $this->register_blog_content_controls();
	 $this->register_blog_style_controls();
	 }
     

	protected function register_blog_content_controls() {



    $this->start_controls_section(
                'icon_list_widget',
                [
                    'label' => __( 'Blog Post', 'solub_core' ),
                    
                ]
            );

		$this->add_control(
			'post_per_page',
			[
				'label' => esc_html__( 'Post Per Page', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'post_in',
			[
				'label' => esc_html__( 'Post Include', 'solub_core' ),
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
				'label' => esc_html__( 'Post Exclude', 'solub_core' ),
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
				'label' => esc_html__( 'Post Order', 'solub_core' ),
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
				'label' => esc_html__( 'Post Order By', 'solub_core' ),
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

		
        protected function register_blog_style_controls() {
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
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page'   => $settings['post_per_page'],
            'post__in'   => $settings['post_in'],
            'post__not_in'   => $settings['post_not_in'],
			'order'   => $settings['post_order'],
            'orderby' => $settings['post_order_by'],
        );
        $query = new \WP_Query( $args );

         ?>


<section class="tp-blog-ptb p-relative" data-bg-color="#EBF3ED">
    <div class="container">
        <div class="row">

            <?php if ($query-> have_posts()): while ($query-> have_posts()): $query-> the_post(); 
			$categories = get_the_category();
			// var_dump($categories);
			
			?>
            <div class="col-lg-4 col-md-6">
                <div class="tp-blog-item mb-30 wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="tp-blog-item-content mb-30">
                        <div class="tp-blog-item-tags">
                            <?php foreach($categories as $key => $cat):?>
                            <a
                                href="<?php echo esc_url(get_term_link($cat->term_id))?>"><?php echo esc_html( $cat ->name)?></a>
                            <?php if($key==1) break;?>
                            <?php endforeach;?>
                        </div>
                        <h4 class="tp-blog-item-title"><a class="textline"
                                href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                    </div>
                    <div class="tp-blog-item-thumb p-relative">
                        <?php the_post_thumbnail()?>
                        <div class="tp-blog-item-btn">
                            <a href="<?php the_permalink();?>"><?php echo esc_html('Details','solub_core')?>
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                        fill="none">
                                        <path d="M1 9L9 1" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M1 1H9V9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg></span></a>
                        </div>
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

        $widgets_manager->register( new Solub_Blog() );