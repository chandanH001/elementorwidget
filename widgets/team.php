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

class Solub_Team extends Widget_Base {

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
		return 'solub_team';
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
		return __( 'Team Imag Box', 'solub_core' );
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
     $this->register_team_controls();
	 $this->register_team_style_controls();
	 }


	protected function register_team_controls() {
		$this->start_controls_section(
			'team_title_section',
			[
				'label' => __( 'Team', 'solub_core' ),
			]
		);

        $this->add_control(
			'title',
			[
				'label' => __( 'Title', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,

			]
		);

		$this->add_control(
			'designation',
			[
				'label' => __( 'Designation', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'team_image',
			[
				'label' => __( 'Team Image', 'solub_core' ),
			]
		);

        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
                    'social_link_list',
                    [
                        'label' => __( 'Social Links', 'solub_core' ),
                    ]
                );

        $repeater = new \Elementor\Repeater();

         $repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Social Icon', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook',
					'library' => 'fa-brands',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);


		$repeater->add_control(
			'social_link',
			[
				'label' => esc_html__( 'Social Link', 'solub_core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#' , 'solub_core' ),
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
						'social_link_list' => esc_html__( 'Social Link', 'solub_core' ),
						
					],
					[
						'social_link_list' => esc_html__( 'Social Link', 'solub_core' ),
						
					],
					
				],
				'title_field' => '{{{ social_link_list }}}',
				'icon' => '{{{icon}}}',
				
			]
		);

        $this->end_controls_section();

		
	}

		
        protected function register_team_style_controls() {
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
		}

         ?>








<div class="tp-team-item mb-30">
    <div class="tp-team-item-thumb p-relative mb-20 wow img-custom-anim-top" data-wow-duration="1.5s"
        data-wow-delay="0.1s">
        <a href="team-details.html"><img src="<?php echo esc_url( $settings['image'] ['url'] ) ; ?>" alt=""></a>
        <div class="tp-team-item-social">

            <?php foreach ($settings ['list'] as $item): ?>
            <a href="<?php echo esc_url($item['social_link'])?>"><span>
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span></a>

            <?php endforeach;?>

        </div>
    </div>
    <div class="tp-team-item-wrap d-flex justify-content-between align-items-center">
        <div class="tp-team-item-content">
            <h4 class="tp-team-item-title"><a
                    href="team-details.html"><?php echo esc_html ( $settings['title'] ) ; ?></a></h4>
            <p><?php echo solub_core_kses( $settings['designation'] ) ; ?></p>
        </div>
        <div class="tp-team-item-btn">
            <a <?php echo $this->get_render_attribute_string('button_arg'); ?>><?php echo esc_attr( $settings['button_title'] )?>
                <span><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                        <path d="M1 9L9 1" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 1H9V9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg></span></a>
        </div>
    </div>
</div>


<?php
	}
}

$widgets_manager->register( new Solub_Team() );