<?php
namespace SolubCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solub_Image extends Widget_Base {

    public function get_name() {
        return 'solub_image';
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

    protected function register_controls() {
        $this->register_solub_image_controls();
        $this->register_solub_image_style_controls();
    }

    /**
     * Content Controls
     */
    protected function register_solub_image_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Solub Image', 'solub_core' ),
            ]
        );

        // Layout Selector
        $this->add_control(
            'layout',
            [
                'label' => __( 'Image Layout', 'solub_core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout1',
                'options' => [
                    'layout1' => __( 'Layout 1', 'solub_core' ),
                    'layout2' => __( 'Layout 2 (Experience)', 'solub_core' ),
                ],
            ]
        );

        // Layout 1 Image
        $this->add_control(
            'solub_image',
            [
                'label' => esc_html__( 'Choose Image', 'solub_core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => 'layout1',
                ],
            ]
        );

        // Layout 2 Image
        $this->add_control(
            'solub_image_layout2',
            [
                'label' => esc_html__( 'Choose Image', 'solub_core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => 'layout2',
                ],
            ]
        );

        // Experience Number (Layout 2)
        $this->add_control(
            'experience_number',
            [
                'label' => __( 'Experience Number', 'solub_core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '12',
                'condition' => [
                    'layout' => 'layout2',
                ],
            ]
        );

        // Experience Text (Layout 2)
        $this->add_control(
            'experience_text',
            [
                'label' => __( 'Experience Text', 'solub_core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => "Years\nExperience",
                'condition' => [
                    'layout' => 'layout2',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Style Controls
     */
    protected function register_solub_image_style_controls() {
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Image', 'solub_core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Width
        $this->add_responsive_control(
            'width',
            [
                'label' => __( 'Width', 'solub_core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px', 'vw' ],
                'selectors' => [
                    '{{WRAPPER}} .solub-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Max Width
        $this->add_responsive_control(
            'max_width',
            [
                'label' => __( 'Max Width', 'solub_core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px', 'vw' ],
                'selectors' => [
                    '{{WRAPPER}} .solub-image' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Height
        $this->add_responsive_control(
            'height',
            [
                'label' => __( 'Height', 'solub_core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'selectors' => [
                    '{{WRAPPER}} .solub-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Object Fit
        $this->add_control(
            'object_fit',
            [
                'label' => __( 'Object Fit', 'solub_core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => __( 'Default', 'solub_core' ),
                    'fill' => __( 'Fill', 'solub_core' ),
                    'cover' => __( 'Cover', 'solub_core' ),
                    'contain' => __( 'Contain', 'solub_core' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .solub-image' => 'object-fit: {{VALUE}};',
                ],
            ]
        );

        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .solub-image',
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'solub_core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .solub-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Box Shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .solub-image',
            ]
        );

        // Opacity
        $this->add_control(
            'opacity',
            [
                'label' => __( 'Opacity', 'solub_core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '' => [
                        'min' => 0.1,
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .solub-image' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        // CSS Filters
        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'css_filters',
                'selector' => '{{WRAPPER}} .solub-image',
            ]
        );

        // Hover Animation
        $this->add_control(
            'hover_animation',
            [
                'label' => __( 'Hover Animation', 'solub_core' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Output
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( $settings['layout'] === 'layout1' ) {
            // Layout 1
            ?>
<div class="solub-image-wrapper layout1">
    <img class="solub-image <?php echo ! empty( $settings['hover_animation'] ) ? 'elementor-animation-' . $settings['hover_animation'] : ''; ?>"
        src="<?php echo esc_url( $settings['solub_image']['url'] ); ?>" alt="">
</div>
<?php
        } elseif ( $settings['layout'] === 'layout2' ) {
            // Layout 2
            ?>
<div class="tp-chose-thumb-wrap p-relative">
    <div class="wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
        <img class="solub-image <?php echo ! empty( $settings['hover_animation'] ) ? 'elementor-animation-' . $settings['hover_animation'] : ''; ?>"
            src="<?php echo esc_url( $settings['solub_image_layout2']['url'] ); ?>" alt="">
    </div>
    <div class="tp-chose-expreance">
        <h2 class="tp-chose-expreance-title">
            <?php echo esc_html( $settings['experience_number'] ); ?>
        </h2>
        <h6>
            <?php echo nl2br( esc_html( $settings['experience_text'] ) ); ?>
        </h6>
    </div>
</div>
<?php
        }
    }
}

// Register widget
$widgets_manager->register( new Solub_Image() );