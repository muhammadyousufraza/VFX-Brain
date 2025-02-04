<?php

namespace DynamicContentForElementor\Modules\DynamicTags\Tags;

use Elementor\Core\DynamicTags\Data_Tag;
use Elementor\Controls_Manager;
use DynamicContentForElementor\Helper;
if (!\defined('ABSPATH')) {
    exit;
    // Exit if accessed directly
}
class DynamicGoogleMapsDirectionsInfo extends Data_Tag
{
    /**
     * Get Name
     *
     * @return string
     */
    public function get_name()
    {
        return 'dce-dynamic-google-maps-directions-info';
    }
    /**
     * Get Title
     *
     * @return string
     */
    public function get_title()
    {
        return esc_html__('Map Info', 'dynamic-content-for-elementor');
    }
    /**
     * Get Group
     *
     * @return string
     */
    public function get_group()
    {
        return 'dce-dynamic-google-maps-directions';
    }
    /**
     * Get Categories
     *
     * @return array<string>
     */
    public function get_categories()
    {
        return ['base', 'text', 'number'];
    }
    /**
     * Get Value
     *
     * @param array<mixed> $options
     * @return string|null
     */
    public function get_value(array $options = [])
    {
        $map_name = $this->get_settings('map_name');
        if (empty($map_name) && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
            return Helper::notice(\false, esc_html__('Please type a Map Name', 'dynamic-content-for-elementor'));
        }
        $loading_text = wp_kses_post($this->get_settings('loading_text'));
        $option = $this->get_settings('options');
        $data = \json_encode(['map_name' => $map_name, 'loading_text' => $loading_text, 'option' => $option]);
        return "<div data-tag-name='" . esc_attr($map_name) . "' id='dce-directions-info'><span data-directions='" . esc_attr($data) . "' class='distance dce-directions-info'>" . $loading_text . '</span></div>';
    }
    /**
     * Register Controls
     *
     * @return void
     */
    protected function register_controls()
    {
        $this->add_control('map_name', ['label' => esc_html__('Map Name', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::TEXT, 'default' => '']);
        $this->add_control('options', ['label' => esc_html__('Show', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::SELECT, 'frontend_available' => \true, 'default' => 'km', 'options' => ['miles' => esc_html__('Distance in Miles', 'dynamic-content-for-elementor'), 'km' => esc_html__('Distance in Km', 'dynamic-content-for-elementor'), 'text' => esc_html__('Distance in Text', 'dynamic-content-for-elementor'), 'minutes' => esc_html__('Distance in Minutes', 'dynamic-content-for-elementor'), 'mode' => esc_html__('Travel Mode', 'dynamic-content-for-elementor')], 'label_block' => \true]);
        $this->add_control('loading_text', ['label' => esc_html__('Loading Text', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::TEXT, 'default' => esc_html__('Loading...', 'dynamic-content-for-elementor'), 'label_block' => 'true']);
    }
}
