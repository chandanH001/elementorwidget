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
class Solub_Accordion_List extends Widget_Base {

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
		return 'Solub_Accordion_List';
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
		return __( 'Accordion List', 'solub_core' );
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
     $this->register_accordion_list_controls();
	 $this->register_accordion_list_style_controls();
	 }
     

	protected function register_accordion_list_controls() {

        $this->start_controls_section(
			'accordion_section',
			[
				'label' => __( 'Accordion List', 'solub_core' ),
			]
		);

		$repeater = new \Elementor\Repeater();

        
        $repeater->add_control(
			'accordion_title',
			[
				'label' => esc_html__( 'Title', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'solub_core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'accordion_content',
			[
				'label' => esc_html__( 'Content', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Accordion Content' , 'solub_core' ),
				'label_block' => true,
			]
		);

        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Accordion List', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
		
					[
						'accordion_title' => esc_html__( 'Title', 'solub_core' ),
						
					],
					[
						'accordion_content' => esc_html__( 'Content', 'solub_core' ),
						
					],

				],

				'title_field' => '{{{ accordion_title }}}',
				'title_field' => '{{{ accordion_content }}}',

			]
		);
		

       

		$this->end_controls_section();
    }

		
        protected function register_accordion_list_style_controls() {
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




<div class="tp-faq-box wow fadeInLeft" data-wow-duration=".9s" data-wow-delay=".3s">
    <div class="accordion accordion-flush" id="accordionFlushExample">


        <?php foreach($settings['list'] as $key => $item ) :
			$active = ($key == 1) ? 'active' : '' ;
			$collapse = ($key == 1) ? '' : 'collapsed' ;
			$show = ($key == 1) ? 'show' : '' ;
			
			
			?>

        <div class="accordion-item <?php echo esc_attr( $active )?>">
            <h2 class="accordion-header">
                <button class="accordion-button <?php echo esc_attr( $collapse )?>" type="button"
                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo-<?php echo esc_attr($key)?>"
                    aria-expanded="false" aria-controls="flush-collapseTwo-<?php echo esc_attr($key)?>">
                    <?php echo solub_core_kses( $item['accordion_title'] )?>
                    <span class="accordion-btn"></span>
                </button>
            </h2>
            <div id="flush-collapseTwo-<?php echo esc_attr($key)?>"
                class="accordion-collapse collapse <?php echo esc_attr( $show )?>"
                data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"><?php echo esc_html( $item['accordion_content'] )?></div>
            </div>
        </div>

        <?php endforeach;?>

    </div>
</div>



<?php
            }
        }

        $widgets_manager->register( new Solub_Accordion_List() );