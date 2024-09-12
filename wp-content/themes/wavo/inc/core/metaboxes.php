<?php

function wavo_metaboxes_acf_init() {

    // get acf version
    $version = acf_get_setting('version');

    if ( function_exists('acf_add_local_field_group') ) {

        acf_add_local_field_group(array(
            'key' => 'group_5dd57ac4263d0',
            'title' => esc_html__( 'Wavo Default Page Customize Options', 'wavo' ),
            'fields' => array(
                array(
                    'key' => 'field_5dd57b1a15fe7',
                    'label' => esc_html__( 'Hide Page Header?', 'wavo' ),
                    'name' => 'wavo_hide_page_header',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => ''
                    ),
                    'message' => esc_html__( 'Use this option, if you want to hide the page header.', 'wavo' ),
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => ''
                ),
                array(
                    'key' => 'field_5e0f92033d9bf',
                    'label' => esc_html__( 'Page Header Type', 'wavo' ),
                    'name' => 'wavo_page_header_type',
                    'type' => 'select',
                    'instructions' => esc_html__( 'Use this option, if you want to show different menu style on this page', 'wavo' ),
                    'required' => 0,
                    'wrapper' => array(
                        'width' => '20',
                        'class' => '',
                        'id' => ''
                    ),
                    'choices' => array(
                        'default' => esc_html__( 'Solid', 'wavo' ),
                        'is-overlay' => esc_html__( 'Transparent', 'wavo' )
                    ),
                    'default_value' => array(
                        0 => ''
                    ),
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5dd57b1a15fe7',
                                'operator' => '!=',
                                'value' => '1'
                            )
                        )
                    ),
                    'allow_null' => 1,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => ''
                ),
                array(
                    'key' => 'field_5e0f92033d9by',
                    'label' => esc_html__( 'Page Header Menu', 'wavo' ),
                    'name' => 'wavo_page_header_menu',
                    'type' => 'select',
                    'required' => 0,
                    'wrapper' => array(
                        'width' => '20',
                        'class' => '',
                        'id' => ''
                    ),
                    'choices' => function_exists('wavo_navmenu_choices') ? wavo_navmenu_choices() : array(),
                    'default_value' => array( 0 => '' ),
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5dd57b1a15fe7',
                                'operator' => '!=',
                                'value' => '1'
                            )
                        )
                    ),
                    'instructions' => esc_html__( 'Use this option, if you want to show different menu on this page', 'wavo' ),
                    'allow_null' => 1,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => ''
                ),
                array(
                    'key' => 'field_5dd57b1a15feg',
                    'label' => esc_html__( 'Hide Page Header Topbar?', 'wavo' ),
                    'name' => 'wavo_hide_page_header_topbar',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5dd57b1a15fe7',
                                'operator' => '!=',
                                'value' => '1'
                            )
                        )
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => ''
                    ),
                    'message' => esc_html__( 'Use this option, if you want to hide the page header topbar.', 'wavo' ),
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => ''
                ),
                array(
                    'key' => 'field_5dec27bb70c2e',
                    'label' => esc_html__( 'Hide Page Footer?', 'wavo' ),
                    'name' => 'wavo_hide_page_footer',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => ''
                    ),
                    'message' => esc_html__( 'Select this option if you want to hide the page main footer for this page.', 'wavo' ),
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => ''
                ),
                array(
                    'key' => 'field_5dec27bb70c2d',
                    'label' => esc_html__( 'Hide Page Footer Copyright?', 'wavo' ),
                    'name' => 'wavo_hide_page_footer_copyright',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5dec27bb70c2e',
                                'operator' => '!=',
                                'value' => '1'
                            )
                        )
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => ''
                    ),
                    'message' => esc_html__( 'Select this option if you want to hide the page main footer for this page.', 'wavo' ),
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => ''
                ),
                array(
                    'key' => 'field_5dec29a6552e7',
                    'label' => esc_html__( 'Hide Page Footer Widget Area?', 'wavo' ),
                    'name' => 'wavo_hide_page_footer_widget_area',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5dec27bb70c2e',
                                'operator' => '!=',
                                'value' => '1'
                            )
                        )
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => ''
                    ),
                    'message' => esc_html__( 'Select this option if you want to hide the page footer widget area for this page.', 'wavo' ),
                    'default_value' => 1,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => ''
                ),
                array(
                    'key' => 'field_5dec2d17d0575',
                    'label' => esc_html__( 'Page Layout', 'wavo' ),
                    'name' => 'wavo_page_layout',
                    'type' => 'button_group',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '40',
                        'class' => '',
                        'id' => ''
                    ),
                    'choices' => array(
                        'right-sidebar' => esc_html__( 'Right Sidebar', 'wavo' ),
                        'left-sidebar' => esc_html__( 'Left Sidebar', 'wavo' ),
                        'full-width' => esc_html__( 'Full Width', 'wavo' )
                    ),
                    'allow_null' => 0,
                    'default_value' => 'full-width',
                    'layout' => 'horizontal',
                    'return_format' => 'value'
                )
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default'
                    )
                )
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => ''
        ));

        acf_add_local_field_group(array(
            'key' => 'group_5dd5758191fc6',
            'title' => esc_html__( 'Page Hero Options', 'wavo' ),
            'fields' => array(
                array(
                    'key' => 'field_5dd576425240d',
                    'label' => esc_html__( 'Hide Page Hero?', 'wavo' ),
                    'name' => 'wavo_hide_page_hero',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '20',
                        'class' => '',
                        'id' => ''
                    ),
                    'message' => esc_html__( 'Use this option, if you want to hide the page hero section.', 'wavo' ),
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => ''
                ),
                array(
                    'key' => 'field_5dd5773e99d7b',
                    'label' => esc_html__( 'Hero Customize', 'wavo' ),
                    'name' => 'wavo_page_hero_customize',
                    'type' => 'group',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5dd576425240d',
                                'operator' => '!=',
                                'value' => '1'
                            )
                        )
                    ),
                    'wrapper' => array(
                        'width' => '80',
                        'class' => '',
                        'id' => ''
                    ),
                    'layout' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5dec3dc8c84e7',
                            'label' => esc_html__( 'Page Hero Background', 'wavo' ),
                            'name' => 'wavo_page_hero_background_customize',
                            'type' => 'group',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'layout' => 'row',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_5dec3e19c84e8',
                                    'label' => esc_html__( 'Background Image', 'wavo' ),
                                    'name' => 'wavo_hero_bg_img',
                                    'type' => 'image',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => ''
                                    ),
                                    'return_format' => 'url',
                                    'preview_size' => 'full',
                                    'library' => 'all',
                                    'min_width' => '',
                                    'min_height' => '',
                                    'min_size' => '',
                                    'max_width' => '',
                                    'max_height' => '',
                                    'max_size' => '',
                                    'mime_types' => ''
                                ),
                                array(
                                    'key' => 'field_5dec3e8ac84e9',
                                    'label' => esc_html__( 'Background Color', 'wavo' ),
                                    'name' => 'wavo_page_hero_bg_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => ''
                                )
                            )
                        ),
                        array(
                            'key' => 'field_5dec3f4a217db',
                            'label' => esc_html__( 'Page Hero Text Customize', 'wavo' ),
                            'name' => 'wavo_page_hero_text_customize',
                            'type' => 'group',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'layout' => 'row',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_5dec3f9b217dc',
                                    'label' => esc_html__( 'Alternative Page Site Title', 'wavo' ),
                                    'name' => 'wavo_page_subtitle',
                                    'type' => 'text',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => ''
                                    ),
                                    'default_value' => '',
                                    'placeholder' => esc_html__( 'if you want to use a different subtitle for the page you can type here', 'wavo' ),
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => ''
                                ),
                                array(
                                    'key' => 'field_5dec3fe7217dd',
                                    'label' => esc_html__( 'Alternative Page Title', 'wavo' ),
                                    'name' => 'wavo_page_title',
                                    'type' => 'text',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => ''
                                    ),
                                    'default_value' => '',
                                    'placeholder' => esc_html__( 'if you want to use a different title for the page you can type here', 'wavo' ),
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => ''
                                ),
                                array(
                                    'key' => 'field_5dec3c1df1c76',
                                    'label' => esc_html__( 'Page Title Color', 'wavo' ),
                                    'name' => 'wavo_page_title_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => ''
                                    ),
                                    'default_value' => ''
                                ),
                                array(
                                    'key' => 'field_5dec3c881c942',
                                    'label' => esc_html__( 'Page Site Title Color', 'wavo' ),
                                    'name' => 'wavo_page_subtitle_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => ''
                                    ),
                                    'default_value' => ''
                                ),
                                array(
                                    'key' => 'field_5dec468b5990a',
                                    'label' => esc_html__( 'Page Breadcrumbs Display', 'wavo' ),
                                    'name' => 'wavo_page_bread_visibility',
                                    'type' => 'button_group',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => ''
                                    ),
                                    'choices' => array(
                                        1 => esc_html__( 'Show', 'wavo' ),
                                        0 => esc_html__( 'Hide', 'wavo' )
                                    ),
                                    'allow_null' => 0,
                                    'default_value' => 0,
                                    'layout' => 'horizontal',
                                    'return_format' => 'value'
                                )
                            )
                        )
                    )
                )
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default'
                    )
                )
            ),
            'menu_order' => 1,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => ''
        ));

        // post format: video
        acf_add_local_field_group(array(
            'key' => 'group_5e3ed9ffd610b',
            'title' => esc_html__( 'Video or Audio Embed', 'wavo' ),
            'fields' => array(
                array(
                    'key' => 'field_5e3eda2b14b20',
                    'label' => esc_html__( 'Add your video or audio url here', 'wavo' ),
                    'name' => 'wavo_media_embed',
                    'type' => 'oembed',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'width' => '',
                    'height' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_format',
                        'operator' => '==',
                        'value' => 'video',
                    ),
                ),
                array(
                    array(
                        'param' => 'post_format',
                        'operator' => '==',
                        'value' => 'audio',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

        // post format: link
        acf_add_local_field_group(array(
            'key' => 'group_5e3fdba489c15',
            'title' => esc_html__( 'Link Extra', 'wavo' ),
            'fields' => array(
                array(
                    'key' => 'field_5e3fdbc509d1f',
                    'label' => esc_html__( 'Link Text', 'wavo' ),
                    'name' => 'wavo_format_link_title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => esc_html__( 'Add your link text here', 'wavo' ),
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5e3fdc2e028e9',
                    'label' => esc_html__( 'Link URL', 'wavo' ),
                    'name' => 'wavo_format_link_url',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => esc_html__( 'Add your URL here', 'wavo' ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_format',
                        'operator' => '==',
                        'value' => 'link',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

        // post format: quote
        acf_add_local_field_group(array(
            'key' => 'group_5e3fddf35a387',
            'title' => esc_html__( 'Quote Content', 'wavo' ),
            'fields' => array(
                array(
                    'key' => 'field_5e3fde062544e',
                    'label' => esc_html__( 'Quote Text', 'wavo' ),
                    'name' => 'wavo_format_quote_text',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => esc_html__( 'Add your qoute text here', 'wavo' ),
                    'maxlength' => '',
                    'rows' => '',
                    'new_lines' => '',
                ),
                array(
                    'key' => 'field_5e3fde4a22734',
                    'label' => esc_html__( 'Quote Author', 'wavo' ),
                    'name' => 'wavo_format_quote_author',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => esc_html__( 'Add quote author name here', 'wavo' ),
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_format',
                        'operator' => '==',
                        'value' => 'quote',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

        // Pr
        acf_add_local_field_group(array(
            'key' => 'group_607f54a0cdfa2',
            'title' => esc_html__( 'Cube Portfolio Widget Options', 'wavo' ),
            'fields' => array(
                array(
                    'key' => 'field_607f55948c2b9',
                    'label' => esc_html__( 'Link Type', 'wavo' ),
                    'name' => 'wavo_projects_link_type',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'lightbox' => esc_html__( 'Lightbox', 'wavo' ),
                        'permalink' => esc_html__( 'Post Permalink', 'wavo' ),
                        'permalink-popup' => esc_html__( 'Ajax Popup', 'wavo' ),
                        'custom' => esc_html__( 'Custom URL', 'wavo' ),
                    ),
                    'default_value' => 'lightbox',
                    'allow_null' => 1,
                    'multiple' => 0,
                    'ui' => 0,
                    'return_format' => 'value',
                    'ajax' => 0,
                    'placeholder' => '',
                ),
                array(
                    'key' => 'field_607f55118c2b8',
                    'label' => esc_html__( 'Lightbox Video URL', 'wavo' ),
                    'name' => 'wavo_projects_video_url',
                    'type' => 'oembed',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_607f55948c2b9',
                                'operator' => '==',
                                'value' => 'lightbox',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'width' => '',
                    'height' => '',
                ),
                array(
                    'key' => 'field_607f56678c2ba',
                    'label' => esc_html__( 'Custom URL', 'wavo' ),
                    'name' => 'wavo_projects_custom_url',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_607f55948c2b9',
                                'operator' => '==',
                                'value' => 'custom',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => esc_html__( 'Add your custom link here.', 'wavo' ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'projects',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

    }

}
add_action('acf/init', 'wavo_metaboxes_acf_init');
