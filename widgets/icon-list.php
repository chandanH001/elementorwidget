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
class Solub_Icon_list extends Widget_Base {

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
		return 'Solub_Icon_list';
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
		return __( 'Icon List', 'solub_core' );
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
		'section_layout',
		[
			'label' => __( 'Layout', 'solub_core' ),
		]
	);

	$this->add_control(
		'icon_list_layout',
		[
			'label' => __( 'Select Icon Layout', 'solub_core' ),
			'type' => Controls_Manager::SELECT,
			'default' => 'layout1',
			'options' => [
				'layout1' => __( 'Layout 1 (Simple Icon', 'solub_core' ),
				'layout2' => __( 'Layout 2 (2ND Icon Layout)', 'solub_core' ),
			],
		]
	);

	$this->end_controls_section();

    $this->start_controls_section(
                'icon_list_widget',
                [
                    'label' => __( 'Content', 'solub_core' ),
                    
                ]
            );



		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'solub_core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => esc_html__( 'Color', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .list-icon-bg' => 'background-color: {{VALUE}}'
				],
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
						'list_title' => esc_html__( 'Title #1', 'solub_core' ),
						
					],
					[
						'list_title' => esc_html__( 'Title #2', 'solub_core' ),
						
					],
				],
				'title_field' => '{{{ list_title }}}',
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



<?php if($settings['icon_list_layout']=='layout2') : ?>

<div class="tp-chose-list">
    <ul>
        <?php foreach($settings['list'] as $item ) :?>
        <li class="elementor-repeater-item-<?php echo esc_attr($item['_id'])?>"><span><svg xmlns="
            http://www.w3.org/2000/svg" width="26" height="19" viewBox="0 0 26 19" fill="none">
                    <path d="M25 1L8.5 17.5L1 10" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg></span><?php echo esc_html( $item['list_title'] )?>
        </li>
        <?php endforeach;?>
    </ul>
</div>

<?php else : ?>
<div class="tp-about-list">
    <ul>
        <?php foreach($settings['list'] as $item ) :?>
        <li class="elementor-repeater-item-<?php echo esc_attr($item['_id'])?>"><span class="list-icon-bg"><svg
                    xmlns="http://www.w3.org/2000/svg" width="11" height="9" viewBox="0 0 11 9" fill="none">
                    <path d="M9.5451 1.27344L3.9201 7.04884L1.36328 4.42366" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg></span><?php echo esc_html( $item['list_title'] )?></li>
        <?php endforeach;?>
    </ul>
</div>

<?php endif;?>

<?php
            }
        }

        $widgets_manager->register( new Solub_Icon_list() );