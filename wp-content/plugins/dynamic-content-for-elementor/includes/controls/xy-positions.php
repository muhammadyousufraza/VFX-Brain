<?php

namespace DynamicContentForElementor\Controls;

use Elementor\Control_Base_Multiple;
use Elementor\Controls_Manager;
if (!\defined('ABSPATH')) {
    exit;
    // Exit if accessed directly.
}
/**
 * Elementor XY control.
 *
 */
class Control_XY_Positions extends Control_Base_Multiple
{
    /**
     * Get box shadow control type.
     *
     * Retrieve the control type, in this case `xy Positions`.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Control type.
     */
    public function get_type()
    {
        return 'xy_positions';
    }
    public function enqueue()
    {
        // Scripts
        wp_register_script('xy-positions-control', plugins_url('/assets/js/xy-positions-control.js', DCE__FILE__), ['jquery'], DCE_VERSION);
        wp_enqueue_script('xy-positions-control');
    }
    public function get_default_value()
    {
        return parent::get_default_value();
    }
    protected function get_default_settings()
    {
        return \array_merge(parent::get_default_settings(), ['label_block' => \false, 'separator' => 'before']);
    }
    /**
     * Get box shadow control sliders.
     *
     * Retrieve the sliders of the box shadow control. Sliders are used while
     * rendering the control output in the editor.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Control sliders.
     */
    public function get_sliders()
    {
        return ['x' => ['label' => esc_html__('X', 'dynamic-content-for-elementor'), 'min' => 0, 'max' => 100, 'step' => 1], 'y' => ['label' => esc_html__('Y', 'dynamic-content-for-elementor'), 'min' => 0, 'max' => 100, 'step' => 1]];
    }
    /**
     * Render box shadow control output in the editor.
     *
     * Used to generate the control HTML in the editor using Underscore JS
     * template. The variables for the class are available using `data` JS
     * object.
     *
     * @since 1.0.0
     * @access public
     */
    public function content_template()
    {
        $control_uid = $this->get_control_uid();
        ?>
		<div class="elementor-control-field">
			<label class="elementor-control-title control-title-first">{{{ data.label }}}</label>
			<button href="#" class="reset-controls" title="Reset"><i class="eicon-close"></i></button>
		</div>
		<?php 
        foreach ($this->get_sliders() as $slider_name => $slider) {
            $control_uid = $this->get_control_uid($slider_name);
            ?>
			<div class="elementor-control-field elementor-control-type-slider">
				<label for="<?php 
            echo esc_attr($control_uid);
            ?>" class="elementor-control-title-xypositions"><?php 
            echo $slider['label'];
            ?></label>
				<div class="elementor-control-input-wrapper">
					<div class="elementor-slider" data-input="<?php 
            echo esc_attr($slider_name);
            ?>"></div>
					<div class="elementor-slider-input">
						<input id="<?php 
            echo esc_attr($control_uid);
            ?>" type="number" min="<?php 
            echo esc_attr($slider['min']);
            ?>" max="<?php 
            echo esc_attr($slider['max']);
            ?>" step="<?php 
            echo esc_attr($slider['step']);
            ?>" data-setting="<?php 
            echo esc_attr($slider_name);
            ?>"/>
					</div>
				</div>
			</div>
		<?php 
        }
        ?>
		<?php 
    }
}
