<?php

namespace DynamicContentForElementor\Includes\Skins;

use DynamicContentForElementor\Helper;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
if (!\defined('ABSPATH')) {
    exit;
    // Exit if accessed directly
}
class SkinAccordion extends \DynamicContentForElementor\Includes\Skins\SkinBase
{
    /**
     * Depended Scripts
     *
     * @var array<string>
     */
    public $depended_scripts = ['dce-dynamicPosts-accordion'];
    /**
     * Depended Styles
     *
     * @var array<string>
     */
    public $depended_styles = ['dce-dynamicPosts-accordion'];
    /**
     * Register Controls Actions
     *
     * @return void
     */
    protected function _register_controls_actions()
    {
        add_action('elementor/element/' . $this->get_parent()->get_name() . '/section_query/after_section_end', [$this, 'register_controls_layout']);
        add_action('elementor/element/' . $this->get_parent()->get_name() . '/section_dynamicposts/after_section_end', [$this, 'register_additional_controls'], 20);
    }
    /**
     * Get Widget ID
     *
     * @return string
     */
    public function get_id()
    {
        return 'accordion';
    }
    /**
     * Get Widget Title
     *
     * @return string
     */
    public function get_title()
    {
        return esc_html__('Accordion', 'dynamic-content-for-elementor');
    }
    /**
     * Register Additional Controls
     *
     * @param \DynamicContentForElementor\Widgets\DynamicPostsBase $widget
     * @return void
     */
    public function register_additional_controls(\DynamicContentForElementor\Widgets\DynamicPostsBase $widget)
    {
        $this->parent = $widget;
        $this->start_controls_section('section_accordion', ['label' => $this->get_title(), 'tab' => Controls_Manager::TAB_CONTENT]);
        $this->add_control('icon', ['label' => esc_html__('Icon', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::ICONS, 'separator' => 'before', 'default' => ['value' => 'fas fa-plus', 'library' => 'fa-solid'], 'skin' => 'inline', 'label_block' => \false]);
        $this->add_control('icon_active', ['label' => esc_html__('Active Icon', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::ICONS, 'default' => ['value' => 'fas fa-minus', 'library' => 'fa-solid'], 'skin' => 'inline', 'label_block' => \false]);
        $this->add_control('html_tag', ['label' => esc_html__('Heading HTML Tag', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::SELECT, 'options' => Helper::get_html_tags(), 'default' => 'span']);
        $this->add_control('start', ['label' => esc_html__('Initially open', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::SELECT, 'options' => ['none' => esc_html__('None', 'dynamic-content-for-elementor'), 'first' => esc_html__('First', 'dynamic-content-for-elementor'), 'custom' => esc_html__('Custom Index', 'dynamic-content-for-elementor'), 'all' => esc_html__('All', 'dynamic-content-for-elementor')], 'inline' => \true, 'default' => 'none', 'frontend_available' => \true]);
        $this->add_control('start_custom', ['label' => esc_html__('Active Index', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::NUMBER, 'frontend_available' => \true, 'default' => 1, 'condition' => [$this->get_control_id('start') => ['custom']]]);
        $this->add_control('close_other_sections', ['label' => esc_html__('Automatically close other tabs', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::SWITCHER, 'frontend_available' => \true, 'default' => 'yes']);
        $this->add_control('speed', ['label' => esc_html__('Speed (ms)', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::SLIDER, 'default' => ['size' => 300, 'unit' => 'ms'], 'size_units' => ['ms'], 'range' => ['ms' => ['min' => 0, 'max' => 500, 'step' => 50]], 'render_type' => 'template', 'frontend_available' => \true]);
        $this->end_controls_section();
    }
    /**
     * Register Style Controls
     *
     * @return void
     */
    protected function register_style_controls()
    {
        parent::register_style_controls();
        $this->start_controls_section('section_style_accordion', ['label' => $this->get_title(), 'tab' => Controls_Manager::TAB_STYLE]);
        $this->add_control('title_heading', ['label' => esc_html__('Heading', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::HEADING, 'separator' => 'before']);
        $this->add_control('heading_background', ['label' => esc_html__('Background', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .acc_head' => 'background-color: {{VALUE}};']]);
        $this->add_control('heading_active_background', ['label' => esc_html__('Active Background', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .acc_active .acc_head' => 'background-color: {{VALUE}};']]);
        $this->add_control('heading_color', ['label' => esc_html__('Color', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .acc_head *' => 'color: {{VALUE}};']]);
        $this->add_control('heading_active_color', ['label' => esc_html__('Active Color', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .acc_active .acc_head *' => 'color: {{VALUE}} !important;']]);
        $this->add_group_control(Group_Control_Border::get_type(), ['name' => 'border_width', 'label' => esc_html__('Border Width', 'dynamic-content-for-elementor'), 'selector' => '{{WRAPPER}} .acc_section']);
        $this->add_group_control(Group_Control_Typography::get_type(), ['name' => 'heading_typography', 'selector' => '{{WRAPPER}} .acc_head']);
        $this->add_responsive_control('heading_padding', ['label' => esc_html__('Padding', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::DIMENSIONS, 'size_units' => ['px', 'em', '%'], 'selectors' => ['{{WRAPPER}} .acc_head' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};']]);
        $this->add_control('tab_heading', ['label' => esc_html__('Tab', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::HEADING, 'separator' => 'before']);
        $this->add_responsive_control('tab_space', ['label' => esc_html__('Spacing', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::SLIDER, 'range' => ['px' => ['min' => 0, 'max' => 100]], 'default' => ['unit' => 'px', 'size' => 0], 'selectors' => ['{{WRAPPER}} .acc_section:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};']]);
        $this->add_control('icons_heading', ['label' => esc_html__('Icons', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::HEADING, 'separator' => 'before']);
        $this->add_control('icon_align', ['label' => esc_html__('Alignment', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::CHOOSE, 'options' => ['left' => ['title' => esc_html__('Start', 'dynamic-content-for-elementor'), 'icon' => 'eicon-h-align-left'], 'right' => ['title' => esc_html__('End', 'dynamic-content-for-elementor'), 'icon' => 'eicon-h-align-right']], 'default' => is_rtl() ? 'right' : 'left', 'toggle' => \false]);
        $this->add_control('icon_color', ['label' => esc_html__('Color', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .acc_head i:before' => 'color: {{VALUE}};', '{{WRAPPER}} .acc_head svg' => 'fill: {{VALUE}};']]);
        $this->add_control('icon_active_color', ['label' => esc_html__('Active Color', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .acc_active .acc_head i:before' => 'color: {{VALUE}};', '{{WRAPPER}} .acc_active .acc_head svg' => 'fill: {{VALUE}};']]);
        $this->add_responsive_control('icon_margin', ['label' => esc_html__('Margin', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::DIMENSIONS, 'size_units' => ['px', '%', 'em'], 'selectors' => ['{{WRAPPER}} .acc_head .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};', '{{WRAPPER}} .acc_head .icon-active' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};']]);
        $this->add_responsive_control('icon_space', ['label' => esc_html__('Spacing', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::SLIDER, 'range' => ['px' => ['min' => 10, 'max' => 100]], 'selectors' => ['{{WRAPPER}} .acc_head .icon' => 'margin-right: {{SIZE}}{{UNIT}}; margin-left: {{SIZE}}{{UNIT}};', '{{WRAPPER}} .acc_head .icon-active' => 'margin-right: {{SIZE}}{{UNIT}}; margin-left: {{SIZE}}{{UNIT}};']]);
        $this->add_control('content_heading', ['label' => esc_html__('Content', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::HEADING, 'separator' => 'before']);
        $this->add_control('content_background_color', ['label' => esc_html__('Background', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .acc_content' => 'background-color: {{VALUE}};']]);
        $this->add_control('content_color', ['label' => esc_html__('Color', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::COLOR, 'selectors' => ['{{WRAPPER}} .acc_content' => 'color: {{VALUE}};']]);
        $this->add_responsive_control('content_padding', ['label' => esc_html__('Padding', 'dynamic-content-for-elementor'), 'type' => Controls_Manager::DIMENSIONS, 'size_units' => ['px', 'em', '%'], 'default' => ['top' => '10', 'right' => '20', 'bottom' => '10', 'left' => '20', 'unit' => 'px', 'isLinked' => \false], 'selectors' => ['{{WRAPPER}} .acc_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};']]);
        $this->add_group_control(Group_Control_Border::get_type(), ['name' => 'content_border', 'label' => esc_html__('Border', 'dynamic-content-for-elementor'), 'selector' => '{{WRAPPER}} .acc_content']);
        $this->end_controls_section();
    }
    /**
     * Render Loop Start
     *
     * @return void
     */
    protected function render_loop_start()
    {
        $settings = $this->get_parent()->get_settings_for_display();
        $p_query = $this->get_parent()->get_query();
        $this->get_parent()->add_render_attribute('container', ['class' => ['dce-posts-container', 'dce-posts', $this->get_scrollreveal_class(), $this->get_container_class()]]);
        $this->get_parent()->add_render_attribute('container_wrap', ['class' => ['dce-posts-wrapper', $this->get_wrapper_class()]]);
        $this->maybe_render_pagination_top();
        ?>

		<div <?php 
        echo $this->get_parent()->get_render_attribute_string('container');
        ?>>
			<?php 
        $this->render_posts_before();
        ?>
			<ul <?php 
        echo $this->get_parent()->get_render_attribute_string('container_wrap');
        ?>>
			<?php 
        $this->render_posts_wrapper_before();
    }
    /**
     * Render Loop End
     *
     * @return void
     */
    protected function render_loop_end()
    {
        $this->render_posts_wrapper_after();
        ?>
		</ul>
		<?php 
        $this->render_posts_after();
        ?>
		</div>
		<?php 
        $settings = $this->get_parent()->get_settings_for_display();
        $p_query = $this->get_parent()->get_query();
        $postlength = $p_query->post_count;
        $posts_per_page = $p_query->query_vars['posts_per_page'];
        $this->maybe_render_pagination_bottom();
        $this->render_infinite_scroll();
    }
    /**
     * Render Post - Start
     *
     * @return void
     */
    protected function render_post_start()
    {
        $hover_animation = $this->get_parent()->get_settings('hover_animation');
        $animation_class = !empty($hover_animation) ? ' elementor-animation-' . $hover_animation : '';
        $style_items = $this->get_parent()->get_settings('style_items');
        $hover_effects = $this->get_parent()->get_settings('hover_text_effect');
        $hoverEffects_class = !empty($hover_effects) && $style_items == 'float' ? ' dce-hover-effects' : '';
        $data_post_id = ' data-dce-post-id="' . $this->current_id . '"';
        $data_post_id .= ' data-dce-post-index="' . $this->counter . '"';
        $item_class = ' ' . $this->get_item_class();
        $data_post_link = '';
        ?>

		<li <?php 
        post_class(['dce-post dce-post-item' . $item_class]);
        echo $data_post_id . $data_post_link;
        ?> >
			<div><?php 
        $this->render_heading();
        ?></div>
			<div class="dce-post-block<?php 
        echo $hoverEffects_class . $animation_class;
        ?>">
		<?php 
    }
    /**
     * Render Post - End
     *
     * @return void
     */
    protected function render_post_end()
    {
        ?>
			</div>
		</li>
		<?php 
    }
    /**
     * Render Heading
     *
     * @return void
     */
    protected function render_heading()
    {
        $settings = $this->get_parent()->get_settings_for_display();
        $title = esc_html(get_the_title());
        $html_tag = !empty($settings['accordion_html_tag']) ? Helper::validate_html_tag($settings['accordion_html_tag']) : 'h4';
        \printf('<%1$s>', $html_tag);
        if ('right' !== $this->get_instance_value('blocks_align')) {
            $this->render_heading_icon();
        }
        $this->get_parent()->add_render_attribute('accordion_title', ['class' => 'accordion-title']);
        $this->maybe_render_pagination_top();
        ?>

		<span <?php 
        echo $this->get_parent()->get_render_attribute_string('accordion_title');
        ?>>
			<?php 
        echo $title;
        ?>
		</span>

		<?php 
        if ('right' === $this->get_instance_value('blocks_align')) {
            $this->render_heading_icon();
        }
        \printf('</%s>', $html_tag);
    }
    /**
     * Render Heading Icon
     *
     * @return void
     */
    public function render_heading_icon()
    {
        $settings = $this->get_parent()->get_settings_for_display();
        $icon = $settings['accordion_icon'];
        $icon_active = $settings['accordion_icon_active'];
        $icon_align = $settings['accordion_icon_align'] ?? 'left';
        if (!empty($icon)) {
            echo "<span class='icon dce-accordion-icon accordion-icon-{$icon_align}'>";
            Icons_Manager::render_icon($icon, ['aria-hidden' => 'true']);
            echo '</span>';
        }
        if (!empty($icon_active)) {
            echo "<span class='icon-active dce-accordion-icon accordion-icon-{$icon_align}'>";
            Icons_Manager::render_icon($icon_active, ['aria-hidden' => 'true']);
            echo '</span>';
        }
    }
    /**
     * Get Container Class
     *
     * @return string
     */
    public function get_container_class()
    {
        return 'dce-skin-' . $this->get_id() . ' dce-skin-' . $this->get_id() . '-' . $this->get_instance_value('grid_type');
    }
    /**
     * Get Scroll Reveal Class
     *
     * @return string|void
     */
    public function get_scrollreveal_class()
    {
        if ($this->get_instance_value('scrollreveal_effect_type')) {
            return 'reveal-effect reveal-effect-' . $this->get_instance_value('scrollreveal_effect_type');
        }
    }
}
