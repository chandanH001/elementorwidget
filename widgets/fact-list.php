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
class Solub_Fact_List extends Widget_Base {

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
		return 'Solub_Fact_List';
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
		return __( 'Fact List', 'solub_core' );
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
     $this->register_icon_list_controls();
	 $this->register_icon_list_style_controls();
	 }
     

	protected function register_icon_list_controls() {

    $this->start_controls_section(
                'icon_list_widget',
                [
                    'label' => __( 'Content', 'solub_core' ),
                    
                ]
            );



		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'fact_number',
			[
				'label' => esc_html__( 'Number', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Fact Number' , 'solub_core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'fact_title',
			[
				'label' => esc_html__( 'Title', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Fact Title' , 'solub_core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'fact_suffix',
			[
				'label' => esc_html__( 'Suffix Sign', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Suffix Sign e.g +' , 'solub_core' ),
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
						'fact_number' => esc_html__( '20', 'solub_core' ),
						'fact_title' => esc_html__( 'Fact Title', 'solub_core' ),
						'fact_suffix' => esc_html__( '+', 'solub_core' ),
						
					],
					[
						'fact_number' => esc_html__( '20', 'solub_core' ),
						'fact_title' => esc_html__( 'Fact Title', 'solub_core' ),
						'fact_suffix' => esc_html__( '+', 'solub_core' ),
						
					],
					
				],
				'title_field' => '{{{ fact_title }}}',
			]
		);
		

       

		$this->end_controls_section();
		
	}

		
        protected function register_icon_list_style_controls() {
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


<section class="tp-counter-ptb pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-counter-wrap d-flex justify-content-between">

                    <?php foreach($settings['list'] as $item ) :?>
                    <div class="tp-counter-item d-flex align-items-center">
                        <div class="tp-counter-title">
                            <h4 class="tp-counter-item-title"><span class="purecounter" data-purecounter-duration="2"
                                    data-purecounter-end="<?php echo esc_html( $item['fact_number'] )?>">0</span><?php echo esc_html( $item['fact_suffix'] )?>
                            </h4>
                        </div>
                        <div class="tp-counter-item-text">
                            <span><?php echo solub_core_kses( $item['fact_title'] )?></span>
                        </div>
                    </div>
                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php
            }
        }

        $widgets_manager->register( new Solub_Fact_List() );