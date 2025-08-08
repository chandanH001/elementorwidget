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
class Solub_Heading extends Widget_Base {

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
		return 'Solub_Heading';
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
		return __( 'Heading', 'solub_core' );
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
     $this->register_heading_controls();
	 $this->register_heading_style_controls();
	 }
     

	protected function register_heading_controls() {
		$this->start_controls_section(
			'hero_title_section',
			[
				'label' => __( 'Content', 'solub_core' ),
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __( 'Sub Title', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html( 'Sub Text'),
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

        $this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'solub_core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'solub_core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'solub_core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .text_aligment' => 'text-align: {{VALUE}};',
				],
			]
		);


		$this->end_controls_section();
		
	}

		
        protected function register_heading_style_controls() {
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

        if ( ! empty( $settings['button_title'] ) ) {	
			$this->add_link_attributes( 'button_arg', $settings['button_link'] );
			$this->add_render_attribute('button_arg', 'class', 'tp-btn btn-2 btn-text-flip');
		}

         ?>

<div class="tp-about-heading mb-35 text_aligment ">
    <?php if(!empty($settings['sub_title'])):?>
    <span class="tp-section-title-pre"><?php echo esc_html( $settings['sub_title'] )?></span>
    <?php endif;?>

    <?php if(!empty($settings['title'])):?>
    <span class="tp-section-title-pre"><?php echo esc_html( $settings['sub_title'] )?></span>
    <h4 class="tp-section-title mb-30 "><?php echo solub_core_kses( $settings['title'] )?></h4>
    <?php endif;?>

    <?php if(!empty($settings['description'])):?>
    <p><?php echo esc_html( $settings['description'] )?></p>
    <?php endif;?>
</div>

<?php
            }
        }

        $widgets_manager->register( new Solub_Heading() );