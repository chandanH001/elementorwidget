<?php
namespace SolubCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solub_Image extends Widget_Base {

	public function get_name() {
		return 'Solub_Image';
	}

	public function get_title() {
		return __( 'Solub Image', 'solub_core' );
	}

	public function get_icon() {
		return 'eicon-image';
	}

	public function get_categories() {
		return [ 'solub-widget-category' ];
	}

	public function get_script_depends() {
		return [ 'solub_core' ];
	}

	protected function register_controls(){

		// Layout Option
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'solub_core' ),
			]
		);

		$this->add_control(
			'layout',
			[
				'label' => __( 'Select Layout', 'solub_core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout1',
				'options' => [
					'layout1' => __( 'Layout 1 (Simple Image)', 'solub_core' ),
					'layout2' => __( 'Layout 2 (Image + Experience Box)', 'solub_core' ),
				],
			]
		);

		$this->end_controls_section();

		// Image Section (for both layouts)
		$this->start_controls_section(
			'about_image',
			[
				'label' => __( 'Image', 'solub_core' ),
			]
		);

		$this->add_control(
			'solub_image',
			[
				'label' => esc_html__( 'Choose Image', 'solub_core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		// Extra Fields for Layout 2
		$this->start_controls_section(
			'layout2_fields',
			[
				'label' => __( 'Layout 2 Settings', 'solub_core' ),
				'condition' => [
					'layout' => 'layout2',
				],
			]
		);

		$this->add_control(
			'experience_number',
			[
				'label' => __( 'Experience Number', 'solub_core' ),
				'type' => Controls_Manager::TEXT,
				'default' => '12',
			]
		);

		$this->add_control(
			'experience_title',
			[
				'label' => __( 'Experience Title', 'solub_core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => "Years\nExperience",
			]
		);

		$this->end_controls_section();

		// Image Style (Layout 1 default styles)
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image Style (Layout 1)', 'solub_core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => 'layout1',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'solub_core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'solub_core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'solub_core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'solub_core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .solub-image' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label' => __( 'Width', 'solub_core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'%' => [ 'min' => 1, 'max' => 100 ],
				],
				'selectors' => [
					'{{WRAPPER}} .solub-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .solub-image img',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_shadow',
				'selector' => '{{WRAPPER}} .solub-image img',
			]
		);

		$this->end_controls_section();

		// Layout 2 Style (Experience Box)
		$this->start_controls_section(
			'section_style_experience',
			[
				'label' => __( 'Experience Box Style (Layout 2)', 'solub_core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => 'layout2',
				],
			]
		);

		$this->add_control(
			'experience_box_bg',
			[
				'label' => __( 'Box Background', 'solub_core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-chose-expreance' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'experience_number_typo',
				'label' => __( 'Number Typography', 'solub_core' ),
				'selector' => '{{WRAPPER}} .tp-chose-expreance-title',
			]
		);

		$this->add_control(
			'experience_number_color',
			[
				'label' => __( 'Number Color', 'solub_core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-chose-expreance-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'experience_title_typo',
				'label' => __( 'Title Typography', 'solub_core' ),
				'selector' => '{{WRAPPER}} .tp-chose-expreance h6',
			]
		);

		$this->add_control(
			'experience_title_color',
			[
				'label' => __( 'Title Color', 'solub_core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-chose-expreance h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( $settings['layout'] === 'layout2' ) : ?>
<div class="tp-chose-thumb-wrap p-relative solub-image">
    <div class="wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
        <img src="<?php echo esc_attr($settings['solub_image']['url']); ?>" alt="">
    </div>
    <div class="tp-chose-expreance">
        <h2 class="tp-chose-expreance-title"><?php echo esc_html($settings['experience_number']); ?></h2>
        <h6><?php echo nl2br(esc_html($settings['experience_title'])); ?></h6>
    </div>
</div>
<?php else : ?>
<div class="tp-chose-thumb mb-60 wow img-custom-anim-top solub-image" data-wow-duration="1.5s" data-wow-delay="0.1s">
    <img src="<?php echo esc_attr($settings['solub_image']['url']); ?>" alt="">
</div>
<?php endif;
	}
}

$widgets_manager->register( new Solub_Image() );