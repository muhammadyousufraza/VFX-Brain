<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( class_exists( 'Redux' ) && class_exists( 'WooCommerce' ) ) {

    if ( ! function_exists( 'wavo_dynamic_section' ) ) {
        function wavo_dynamic_section($sections)
        {
            global $wavo_pre;

            /*************************************************
            ## SINGLE PAGE SECTION
            *************************************************/
            // create sections in the theme options
            $sections[] = array(
                'title' => esc_html__('Shop Page', 'wavo'),
                'id' => 'shopsection',
                'icon' => 'el el-shopping-cart-sign',
                'fields' => array()
            );
            // SHOP PAGE SECTION
            $sections[] = array(
                'title' => esc_html__( 'Shop Page Layout', 'wavo' ),
                'id' => 'shoplayoutsection',
                'subsection'=> true,
                'icon' => 'el el-website',
                'fields' => array(
                    array(
                        'title' => esc_html__( 'Shop Page Layout', 'wavo' ),
                        'subtitle' => esc_html__( 'Choose the shop page layout.', 'wavo' ),
                        'id' => 'shop_layout',
                        'type' => 'image_select',
                        'options' => array(
                            'left-sidebar' => array(
                                'alt' => 'Left Sidebar',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            'full-width' => array(
                                'alt' => 'Full Width',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            'right-sidebar' => array(
                                'alt' => 'Right Sidebar',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            ),
                        ),
                        'default' => 'right-sidebar'
                    ),
                    array(
                        'title' => esc_html__('Disable Theme Shop Styles', 'wavo'),
                        'subtitle' => esc_html__('If you want to create your shop page with Elementor Pro, you can disable the theme shop styles.', 'wavo'),
                        'id' => 'disable_theme_shop_styles',
                        'type' => 'switch',
                        'default' => 0,
                        'on' => esc_html__('Yes', 'wavo'),
                        'off' => esc_html__('No', 'wavo')
                    )
                )
            );

            // SINGLE HERO SUBSECTION
            $sections[] = array(
                'title' => esc_html__('Shop Page Hero', 'wavo'),
                'desc' => esc_html__('These are shop page hero section settings', 'wavo'),
                'id' => 'shopherosubsection',
                'subsection' => true,
                'icon' => 'el el-brush',
                'fields' => array(
                    array(
                        'title' => esc_html__('Shop Hero display', 'wavo'),
                        'subtitle' => esc_html__('You can enable or disable the site shop page hero section with switch option.', 'wavo'),
                        'id' => 'shop_hero_visibility',
                        'type' => 'switch',
                        'default' => 1,
                        'on' => 'On',
                        'off' => 'Off',
                    ),
                    array(
                        'title' => esc_html__( 'Shop Hero Template', 'wavo' ),
                        'subtitle' => esc_html__( 'Select your header template.', 'wavo' ),
                        'id' => 'shop_hero_template',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => array(
                            'default' => esc_html__( 'Deafult Site Hero', 'wavo' ),
                            'elementor' => esc_html__( 'Elementor Templates', 'wavo' ),
                        ),
                        'default' => 'default',
                        'required' => array( 'shop_hero_visibility', '=', '1' )
                    ),
                    array(
                        'title' => esc_html__( 'Elementor Templates', 'wavo' ),
                        'subtitle' => esc_html__( 'Select a template from elementor templates.', 'wavo' ),
                        'id' => 'shop_hero_elementor_templates',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => wavo_get_elementorTemplates(),
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'elementor' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Page Hero Alignment', 'wavo'),
                        'subtitle' => esc_html__('Select shop page hero text alignment.', 'wavo'),
                        'id' => 'shop_hero_alignment',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => array(
                            '' => esc_html__('Select alignment', 'wavo'),
                            'text-right' => esc_html__('right', 'wavo'),
                            'text-center' => esc_html__('center', 'wavo'),
                            'text-left' => esc_html__('left', 'wavo'),
                        ),
                        'default' => 'text-center',
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Page Hero Background', 'wavo'),
                        'id' => 'shop_hero_bg',
                        'type' => 'background',
                        'output' => array( '#nt-shop-page .page-header' ),
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__( 'Hero Image Overlay Color', 'wavo' ),
                        'id' => 'shop_hero_overlay',
                        'type' => 'color_rgba',
                        'mode' => 'background-color',
                        'options'=> array(
                            'show_input' => true,
                            'show_initial' => true,
                            'show_alpha' => true,
                            'show_palette' => true,
                            'show_palette_only' => false,
                            'show_selection_palette' => true,
                            'max_palette_size' => 10,
                            'allow_empty' => true,
                            'clickout_fires_change' => false,
                            'choose_text' => 'Choose',
                            'cancel_text' => 'Cancel',
                            'show_buttons' => true,
                            'use_extended_classes' => true,
                            'palette' => null,
                        ),
                        'output' => array( '#nt-shop-page .page-header.hero-overlay:before' ),
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Page Hero Padding', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page Hero Section', 'wavo'),
                        'id' =>'shop_hero_pad',
                        'type' => 'spacing',
                        'output' => array('#nt-shop-page .page-header'),
                        'mode' => 'padding',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'padding-top' => '',
                            'padding-right' => '',
                            'padding-bottom' => '',
                            'padding-left' => '',
                            'units' => 'px',
                        ),
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Page Title', 'wavo'),
                        'subtitle' => esc_html__('Add your shop page title here.', 'wavo'),
                        'id' => 'shop_title',
                        'type' => 'text',
                        'default' => 'Shop',
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Page Title Tag ( for SEO )', 'wavo'),
                        'subtitle' => esc_html__('Select shop page hero text alignment.', 'wavo'),
                        'id' => 'shop_title_tag',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => array(
                            'h1' => esc_html__('H1', 'wavo'),
                            'h2' => esc_html__('H2', 'wavo'),
                            'h3' => esc_html__('H3', 'wavo'),
                            'h4' => esc_html__('H4', 'wavo'),
                            'h5' => esc_html__('H5', 'wavo'),
                            'h6' => esc_html__('H6', 'wavo'),
                            'div' => esc_html__('div', 'wavo'),
                        ),
                        'default' => 'h1',
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Page Title Typography', 'wavo'),
                        'id' => 'shop_title_typo',
                        'type' => 'typography',
                        'font-backup' => false,
                        'letter-spacing' => true,
                        'text-transform' => true,
                        'all_styles' => true,
                        'output' => array( '#nt-shop-page .nt-hero-title' ),
                        'units' => 'px',
                        'default' => array(
                            'color' => '',
                            'font-style' => '',
                            'font-family' => '',
                            'google' => true,
                            'font-size' => '',
                            'line-height' => ''
                        ),
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Page Slogan', 'wavo'),
                        'subtitle' => esc_html__('Add your shop page slogan here.', 'wavo'),
                        'id' => 'shop_slogan',
                        'type' => 'textarea',
                        'default' => '',
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Slogan Typography', 'wavo'),
                        'id' => 'shop_slogan_typo',
                        'type' => 'typography',
                        'font-backup' => false,
                        'letter-spacing' => true,
                        'text-transform' => true,
                        'all_styles' => true,
                        'output' => array( '#nt-shop-page .nt-hero-subtitle' ),
                        'default' => array(
                            'color' => '',
                            'font-style' => '',
                            'font-family' => '',
                            'google' => true,
                            'font-size' => '',
                            'line-height' => ''
                        ),
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Page Description', 'wavo'),
                        'subtitle' => esc_html__('Add your shop page description here.', 'wavo'),
                        'id' => 'shop_desc',
                        'type' => 'textarea',
                        'default' => '',
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Description Typography', 'wavo'),
                        'id' => 'shop_desc_typo',
                        'type' => 'typography',
                        'font-backup' => false,
                        'letter-spacing' => true,
                        'text-transform' => true,
                        'all_styles' => true,
                        'output' => array( '#nt-shop-page .nt-hero-description' ),
                        'default' => array(
                            'color' => '',
                            'font-style' => '',
                            'font-family' => '',
                            'google' => true,
                            'font-size' => '',
                            'line-height' => ''
                        ),
                        'required' => array(
                            array( 'shop_hero_visibility', '=', '1' ),
                            array( 'shop_hero_template', '=', 'default' )
                        )
                    )
                )
            );
            // SINGLE CONTENT SUBSECTION
            $sections[] = array(
                'title' => esc_html__('Shop Page Content', 'wavo'),
                'id' => 'shopcontentsubsection',
                'subsection' => true,
                'icon' => 'el el-brush',
                'fields' => array(
                    array(
                        'title' => esc_html__( 'Shop Page Container Width', 'wavo' ),
                        'subtitle' => esc_html__( 'Choose the shop page container width.', 'wavo' ),
                        'id' => 'shop_container_width',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => array(
                            '' => esc_html__('Default ( Container )', 'wavo'),
                            '-fluid' => esc_html__('Container Fluid', 'wavo'),
                            '-off' => esc_html__('Full Width', 'wavo'),
                        ),
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Shop Page Content Padding', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page content.', 'wavo'),
                        'id' =>'shop_content_pad',
                        'type' => 'spacing',
                        'output' => array('#nt-shop-page .nt-theme-inner-container'),
                        'mode' => 'padding',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'padding-top' => '',
                            'padding-right' => '',
                            'padding-bottom' => '',
                            'padding-left' => '',
                            'units' => 'px'
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Post Column', 'wavo'),
                        'subtitle' => esc_html__('You can control post column with this option.', 'wavo'),
                        'id' => 'shop_column',
                        'type' => 'slider',
                        'default' => 3,
                        'min' => 1,
                        'step' => 1,
                        'max' => 4,
                        'display_value' => 'text',
                    ),
                    array(
                        'title' => esc_html__('Shop Post 992px Column ( Responsive: Desktop, Tablet )', 'wavo'),
                        'subtitle' => esc_html__('You can control post column on max-device width 992px with this option.', 'wavo'),
                        'id' => 'shop_md_column',
                        'type' => 'slider',
                        'default' =>'',
                        'min' => 1,
                        'step' => 1,
                        'max' => 3,
                        'display_value' => 'text',
                    ),
                    array(
                        'title' => esc_html__('Shop Post 768px Column ( Responsive: Tablet, Phone )', 'wavo'),
                        'subtitle' => esc_html__('You can control post column on max-device-width 768px with this option.', 'wavo'),
                        'id' => 'shop_sm_column',
                        'type' => 'slider',
                        'default' =>'',
                        'min' => 1,
                        'step' => 1,
                        'max' => 2,
                        'display_value' => 'text',
                    ),
                    array(
                        'title' => esc_html__('Shop Post Count', 'wavo'),
                        'subtitle' => esc_html__('You can control show post count with this option.', 'wavo'),
                        'id' => 'shop_perpage',
                        'type' => 'slider',
                        'default' => 6,
                        'min' => 1,
                        'step' => 1,
                        'max' => 100,
                        'display_value' => 'text'
                    )
                )
            );
            // SINGLE CONTENT SUBSECTION
            $sections[] = array(
                'title' => esc_html__('Shop Page After Content', 'wavo'),
                'id' => 'shopaftercontentsubsection',
                'subsection' => true,
                'icon' => 'el el-brush',
                'fields' => array(
                    array(
                        'title' => esc_html__( 'Elementor Templates', 'wavo' ),
                        'subtitle' => esc_html__( 'Select a template from elementor templates, If you want to show any content after products.', 'wavo' ),
                        'id' => 'shop_after_page_elementor_templates',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => wavo_get_elementorTemplates()
                    )
                )
            );
            $sections[] = array(
                'title' => esc_html__('Shop Page Post Style', 'wavo'),
                'id' => 'shoppoststylesubsection',
                'subsection' => true,
                'icon' => 'el el-brush',
                'fields' => array(
                    array(
                        'title' => esc_html__('Post Box Style', 'wavo'),
                        'id' => 'shop_product_box_style',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => array(
                            'default' => esc_html__('Default', 'wavo'),
                            'flat' => esc_html__('Flat', 'wavo'),
                            'card' => esc_html__('Card', 'wavo')
                        ),
                        'default' => 'default'
                    ),
                    array(
                        'title' => esc_html__('Post Color Style', 'wavo'),
                        'subtitle' => esc_html__('Select your color.', 'wavo'),
                        'id' => 'shop_theme_color',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => array(
                            'default' => esc_html__('Default', 'wavo'),
                            '1' => esc_html__('Blue', 'wavo'),
                            '2' => esc_html__('Orange', 'wavo'),
                            '3' => esc_html__('Indigo', 'wavo'),
                            '4' => esc_html__('Sunglow', 'wavo'),
                            '5' => esc_html__('Cerise Red', 'wavo'),
                            '6' => esc_html__('Mantis', 'wavo'),
                            'custom' => esc_html__('Custom Color', 'wavo')
                        ),
                        'default' => '1',
                    ),
                    array(
                        'title' => esc_html__('Custom Color', 'wavo'),
                        'subtitle' => esc_html__('Change post color.', 'wavo'),
                        'id' => 'shop_custom_color',
                        'type' => 'color',
                        'default' => '#30aafc',
                        'required' => array( 'shop_theme_color', '=', 'custom' )
                    ),
                    // post button ( view cart )
                    array(
                        'title' => esc_html__('Post Background Color', 'wavo'),
                        'subtitle' => esc_html__('Change post background color.', 'wavo'),
                        'id' => 'shop_post_bgcolor',
                        'type' => 'color',
                        'mode' => 'background-color',
                        'default' => '',
                        'output' => array('.woocommerce ul.products li.product .product-content-wrap, .woocommerce-page ul.products li.product .product-content-wrap')
                    ),
                    array(
                        'title' => esc_html__('Post Border', 'wavo'),
                        'subtitle' => esc_html__('Set your custom border styles for the posts.', 'wavo'),
                        'id' => 'shop_post_brd',
                        'type' => 'border',
                        'all' => false,
                        'output' => array('.woocommerce ul.products li.product .product-content-wrap, .woocommerce-page ul.products li.product .product-content-wrap')
                    ),
                    array(
                        'title' => esc_html__('Post Padding', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page post.', 'wavo'),
                        'id' =>'shop_post_pad',
                        'type' => 'spacing',
                        'output' => array('.woocommerce ul.products li.product .product-content-wrap, .woocommerce-page ul.products li.product .product-content-wrap'),
                        'mode' => 'padding',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'units' => 'px'
                        )
                    ),
                    array(
                        'title' => esc_html__('Post Margin', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page post.', 'wavo'),
                        'id' =>'shop_post_margin',
                        'type' => 'spacing',
                        'output' => array('.woocommerce ul.products li.product .product-content-wrap, .woocommerce-page ul.products li.product .product-content-wrap'),
                        'mode' => 'margin',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'units' => 'px'
                        )
                    ),
                    // post itle
                    array(
                        'title' => esc_html__('Shop Loop Post Title Typography', 'wavo'),
                        'id' => 'shop_post_title_typo',
                        'type' => 'typography',
                        'font-backup' => false,
                        'letter-spacing' => true,
                        'text-transform' => true,
                        'all_styles' => true,
                        'output' => array( '.woocommerce ul.products li.product .woocommerce-loop-product__title' ),
                        'units' => 'px',
                        'default' => array(
                            'color' => '',
                            'font-style' => '',
                            'font-family' => '',
                            'google' => true,
                            'font-size' => '',
                            'line-height' => ''
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Loop Post Title Padding', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page post title.', 'wavo'),
                        'id' =>'shop_post_title_pad',
                        'type' => 'spacing',
                        'output' => array('.woocommerce ul.products li.product .woocommerce-loop-product__title'),
                        'mode' => 'padding',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'padding-top' => '',
                            'padding-right' => '',
                            'padding-bottom' => '',
                            'padding-left' => '',
                            'units' => 'px'
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Loop Post Title Margin', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page post title.', 'wavo'),
                        'id' =>'shop_post_title_margin',
                        'type' => 'spacing',
                        'output' => array('.woocommerce ul.products li.product .woocommerce-loop-product__title'),
                        'mode' => 'margin',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'padding-top' => '',
                            'padding-right' => '',
                            'padding-bottom' => '',
                            'padding-left' => '',
                            'units' => 'px'
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Loop Post Price Typography', 'wavo'),
                        'id' => 'shop_post_price_typo',
                        'type' => 'typography',
                        'font-backup' => false,
                        'letter-spacing' => true,
                        'text-transform' => true,
                        'all_styles' => true,
                        'output' => array( '.woocommerce ul.products li.product .price' ),
                        'units' => 'px',
                        'default' => array(
                            'color' => '',
                            'font-style' => '',
                            'font-family' => '',
                            'google' => true,
                            'font-size' => '',
                            'line-height' => ''
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Loop Post Price Padding', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page post title.', 'wavo'),
                        'id' =>'shop_post_price_pad',
                        'type' => 'spacing',
                        'output' => array('.woocommerce ul.products li.product .price'),
                        'mode' => 'padding',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'units' => 'px'
                        )
                    ),
                    array(
                        'title' => esc_html__('Shop Loop Post Price Margin', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page post title.', 'wavo'),
                        'id' =>'shop_post_price_margin',
                        'type' => 'spacing',
                        'output' => array('.woocommerce ul.products li.product .price'),
                        'mode' => 'margin',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'units' => 'px'
                        )
                    ),
                    // post button ( Add to cart )
                    array(
                        'title' => esc_html__('Button Background ( Add to cart )', 'wavo'),
                        'subtitle' => esc_html__('Change theme main color.', 'wavo'),
                        'id' => 'shop_addtocartbtn_bgcolor',
                        'type' => 'color',
                        'mode' => 'background-color',
                        'default' => '',
                        'output' => array('.woocommerce ul.products li.product .button, .woocommerce.single-product .entry-summary button.button.alt')
                    ),
                    array(
                        'title' => esc_html__('Hover Button Background ( Add to cart )', 'wavo'),
                        'subtitle' => esc_html__('Change theme main color.', 'wavo'),
                        'id' => 'shop_addtocartbtn_hvrbgcolor',
                        'type' => 'color',
                        'mode' => 'background-color',
                        'default' => '',
                        'output' => array('.woocommerce ul.products li.product .button:hover, .woocommerce.single-product .entry-summary button.button.alt:hover')
                    ),
                    array(
                        'title' => esc_html__('Button Title ( Add to cart )', 'wavo'),
                        'subtitle' => esc_html__('Change theme main color.', 'wavo'),
                        'id' => 'shop_addtocartbtn_color',
                        'type' => 'color',
                        'default' => '',
                        'output' => array('.woocommerce ul.products li.product .button, .woocommerce.single-product .entry-summary button.button.alt')
                    ),
                    array(
                        'title' => esc_html__('Hover Button Title ( Add to cart )', 'wavo'),
                        'subtitle' => esc_html__('Change theme main color.', 'wavo'),
                        'id' => 'shop_addtocartbtn_hvrcolor',
                        'type' => 'color',
                        'default' => '',
                        'output' => array('.woocommerce ul.products li.product .button:hover, .woocommerce.single-product .entry-summary button.button.alt:hover')
                    ),
                    array(
                        'title' => esc_html__('Button Border ( Add to cart )', 'wavo'),
                        'subtitle' => esc_html__('Change theme main color.', 'wavo'),
                        'id' => 'shop_addtocartbtn_brd',
                        'type' => 'border',
                        'output' => array('.woocommerce ul.products li.product .button, .woocommerce.single-product .entry-summary button.button.alt')
                    ),
                    array(
                        'title' => esc_html__('Hover Button Border ( Add to cart )', 'wavo'),
                        'subtitle' => esc_html__('Change theme main color.', 'wavo'),
                        'id' => 'shop_addtocartbtn_hvrbrd',
                        'type' => 'border',
                        'output' => array('.woocommerce ul.products li.product .button:hover, .woocommerce.single-product .entry-summary button.button.alt:hover')
                    ),
                    // post button ( view cart )
                    array(
                        'title' => esc_html__('Button Background ( View cart )', 'wavo'),
                        'subtitle' => esc_html__('Change button background color.', 'wavo'),
                        'id' => 'shop_viewcartbtn_bgcolor',
                        'type' => 'color',
                        'mode' => 'background-color',
                        'default' => '',
                        'output' => array('.woocommerce a.added_to_cart')
                    ),
                    array(
                        'title' => esc_html__('Hover Button Background ( View cart )', 'wavo'),
                        'subtitle' => esc_html__('Change button hover background color.', 'wavo'),
                        'id' => 'shop_viewcartbtn_hvrbgcolor',
                        'type' => 'color',
                        'mode' => 'background-color',
                        'default' => '',
                        'output' => array('.woocommerce a.added_to_cart')
                    ),
                    array(
                        'title' => esc_html__('Button Title ( View cart )', 'wavo'),
                        'subtitle' => esc_html__('Change button title color.', 'wavo'),
                        'id' => 'shop_viewcartbtn_color',
                        'type' => 'color',
                        'default' => '',
                        'output' => array('.woocommerce a.added_to_cart')
                    ),
                    array(
                        'title' => esc_html__('Hover Button Title ( View cart )', 'wavo'),
                        'subtitle' => esc_html__('Change button hover title color.', 'wavo'),
                        'id' => 'shop_viewcartbtn_hvrcolor',
                        'type' => 'color',
                        'default' => '',
                        'output' => array('.woocommerce a.added_to_cart')
                    ),
                    array(
                        'title' => esc_html__('Button Border ( View cart )', 'wavo'),
                        'subtitle' => esc_html__('Change hover button border style.', 'wavo'),
                        'id' => 'shop_viewcartbtn_brd',
                        'type' => 'border',
                        'output' => array('.woocommerce a.added_to_cart')
                    ),
                    array(
                        'title' => esc_html__('Hover Button Border ( View cart )', 'wavo'),
                        'subtitle' => esc_html__('Change hover button border style.', 'wavo'),
                        'id' => 'shop_viewcartbtn_hvrbrd',
                        'type' => 'border',
                        'output' => array('.woocommerce a.added_to_cart')
                    ),
                    array(
                        'title' => esc_html__('Buttons Padding', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page post buttons.', 'wavo'),
                        'id' =>'shop_postbtn_pad',
                        'type' => 'spacing',
                        'output' => array('.woocommerce ul.products li.product .button,.woocommerce a.added_to_cart'),
                        'mode' => 'padding',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'units' => 'px'
                        )
                    ),
                    array(
                        'title' => esc_html__('Buttons Margin', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site shop page post buttons.', 'wavo'),
                        'id' =>'shop_postbtn_margin',
                        'type' => 'spacing',
                        'output' => array('.woocommerce ul.products li.product .button,.woocommerce a.added_to_cart'),
                        'mode' => 'margin',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'units' => 'px'
                        )
                    ),
                    array(
                        'title' => esc_html__('Sale Label Background Color', 'wavo'),
                        'subtitle' => esc_html__('Change sale label background color.', 'wavo'),
                        'id' => 'shop_sale_bgcolor',
                        'type' => 'color',
                        'mode' => 'background',
                        'default' => '',
                        'output' => array('.woocommerce span.onsale,.woocommerce ul.products li.product .onsale, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle')
                    ),
                    array(
                        'title' => esc_html__('Sale Label Text Color', 'wavo'),
                        'subtitle' => esc_html__('Change sale label text color.', 'wavo'),
                        'id' => 'shop_sale_color',
                        'type' => 'color',
                        'default' => '',
                        'output' => array('.woocommerce span.onsale,.woocommerce ul.products li.product .onsale')
                    ),
                    array(
                        'title' => esc_html__('Pagination Background Color', 'wavo'),
                        'subtitle' => esc_html__('Change shop page pagination background color.', 'wavo'),
                        'id' => 'shop_pagination_bgcolor',
                        'type' => 'color',
                        'mode' => 'background',
                        'default' => '',
                        'output' => array('.woocommerce .nt-pagination .nt-pagination-inner .nt-pagination-item .nt-pagination-link')
                    ),
                    array(
                        'title' => esc_html__('Active Pagination Background Color', 'wavo'),
                        'subtitle' => esc_html__('Change shop page pagination hover and active item background color.', 'wavo'),
                        'id' => 'shop_pagination_hvrbgcolor',
                        'type' => 'color',
                        'mode' => 'background',
                        'default' => '',
                        'output' => array('.woocommerce .nt-pagination .nt-pagination-inner .nt-pagination-item.active .nt-pagination-link')
                    ),
                    array(
                        'title' => esc_html__('Pagination Text Color', 'wavo'),
                        'subtitle' => esc_html__('Change shop page pagination text color.', 'wavo'),
                        'id' => 'shop_pagination_color',
                        'type' => 'color',
                        'default' => '',
                        'output' => array('.woocommerce .nt-pagination .nt-pagination-inner .nt-pagination-item .nt-pagination-link')
                    ),
                    array(
                        'title' => esc_html__('Active Pagination Text Color', 'wavo'),
                        'subtitle' => esc_html__('Change shop page pagination hover and active item text color.', 'wavo'),
                        'id' => 'shop_pagination_hvrcolor',
                        'type' => 'color',
                        'default' => '',
                        'output' => array('.woocommerce .nt-pagination .nt-pagination-inner .nt-pagination-item.active .nt-pagination-link')
                    ),
                    array(
                        'title' => esc_html__('Pagination Border', 'wavo'),
                        'subtitle' => esc_html__('Change pagination item border style.', 'wavo'),
                        'id' => 'shop_pagination_brd',
                        'type' => 'border',
                        'output' => array('.woocommerce .nt-pagination .nt-pagination-inner .nt-pagination-item .nt-pagination-link')
                    ),
                    array(
                        'title' => esc_html__('Active Pagination Border', 'wavo'),
                        'subtitle' => esc_html__('Change pagination active item border style.', 'wavo'),
                        'id' => 'shop_pagination_hvrbrd',
                        'type' => 'border',
                        'output' => array('.woocommerce .nt-pagination .nt-pagination-inner .nt-pagination-item.active .nt-pagination-link')
                    ),
                )
            );


            /*************************************************
            ## SINGLE PAGE SECTION
            *************************************************/
            // create sections in the theme options
            $sections[] = array(
                'title' => esc_html__('Shop Single Page', 'wavo'),
                'id' => 'singleshopsection',
                'icon' => 'el el-shopping-cart-sign',
                'fields' => array()
            );
            // SHOP PAGE SECTION
            $sections[] = array(
                'title' => esc_html__('General', 'wavo'),
                'id' => 'singleshopgeneral',
                'subsection' => true,
                'icon' => 'el el-brush',
                'fields' => array(
                    array(
                        'title' => esc_html__( 'Single Page Layout', 'wavo' ),
                        'subtitle' => esc_html__( 'Choose the single page layout.', 'wavo' ),
                        'id' => 'single_shop_layout',
                        'type' => 'image_select',
                        'options' => array(
                            'left-sidebar' => array(
                                'alt' => 'Left Sidebar',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            'full-width' => array(
                                'alt' => 'Full Width',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            'right-sidebar' => array(
                                'alt' => 'Right Sidebar',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            ),
                        ),
                        'default' => 'right-sidebar'
                    ),
                    array(
                        'title' => esc_html__('Single Related Title', 'wavo'),
                        'subtitle' => esc_html__('Add your single shop page related section title here.', 'wavo'),
                        'id' => 'single_shop_related_title',
                        'type' => 'text',
                        'default' => 'Related Products'
                    ),
                    array(
                        'title' => esc_html__('Related Post Column', 'wavo'),
                        'subtitle' => esc_html__('You can control related post column with this option.', 'wavo'),
                        'id' => 'single_shop_related_column',
                        'type' => 'slider',
                        'default' => 3,
                        'min' => 1,
                        'step' => 1,
                        'max' => 4,
                        'display_value' => 'text'
                    ),
                    array(
                        'title' => esc_html__('Related Post Count', 'wavo'),
                        'subtitle' => esc_html__('You can control show related post count with this option.', 'wavo'),
                        'id' => 'single_shop_related_count',
                        'type' => 'slider',
                        'default' => 6,
                        'min' => 1,
                        'step' => 1,
                        'max' => 24,
                        'display_value' => 'text'
                    )
                )
            );
            // SINGLE HERO SUBSECTION
            $sections[] = array(
                'title' => esc_html__('Single Hero', 'wavo'),
                'desc' => esc_html__('These are single page hero section settings!', 'wavo'),
                'id' => 'singleshopherosubsection',
                'subsection' => true,
                'icon' => 'el el-brush',
                'fields' => array(
                    array(
                        'title' => esc_html__('Single Hero display', 'wavo'),
                        'subtitle' => esc_html__('You can enable or disable the site single page hero section with switch option.', 'wavo'),
                        'id' => 'single_shop_hero_visibility',
                        'type' => 'switch',
                        'default' => 1,
                        'on' => 'On',
                        'off' => 'Off',
                    ),
                    array(
                        'title' => esc_html__( 'Single Hero Template', 'wavo' ),
                        'subtitle' => esc_html__( 'Select your header template.', 'wavo' ),
                        'id' => 'single_shop_hero_template',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => array(
                            'default' => esc_html__( 'Deafult Site Hero', 'wavo' ),
                            'elementor' => esc_html__( 'Elementor Templates', 'wavo' ),
                        ),
                        'default' => 'default',
                        'required' => array( 'single_shop_hero_visibility', '=', '1' )
                    ),
                    array(
                        'title' => esc_html__( 'Elementor Templates', 'wavo' ),
                        'subtitle' => esc_html__( 'Select a template from elementor templates.', 'wavo' ),
                        'id' => 'single_shop_hero_elementor_templates',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => wavo_get_elementorTemplates(),
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'elementor' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Hero Alignment', 'wavo'),
                        'subtitle' => esc_html__('Select single page hero text alignment.', 'wavo'),
                        'id' => 'single_shop_hero_alignment',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => array(
                            '' => esc_html__('Select alignment', 'wavo'),
                            'text-right' => esc_html__('right', 'wavo'),
                            'text-center' => esc_html__('center', 'wavo'),
                            'text-left' => esc_html__('left', 'wavo'),
                        ),
                        'default' => 'text-center',
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Hero Background', 'wavo'),
                        'id' => 'single_shop_hero_bg',
                        'type' => 'background',
                        'output' => array( '#nt-woo-single .page-header' ),
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Hero Overlay Color', 'wavo'),
                        'id' =>'single_shop_hero_overlay',
                        'type' => 'color_rgba',
                        'mode' => 'background',
                        'output' => array( '#nt-woo-single .page-header.hero-overlay:before' ),
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Page Title', 'wavo'),
                        'subtitle' => esc_html__('Add your single shop page title here.', 'wavo'),
                        'id' => 'single_shop_title',
                        'type' => 'text',
                        'default' => '',
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Page Title Tag ( for SEO )', 'wavo'),
                        'subtitle' => esc_html__('Select shop page hero text alignment.', 'wavo'),
                        'id' => 'single_shop_title_tag',
                        'type' => 'select',
                        'customizer' => true,
                        'options' => array(
                            'h1' => esc_html__('H1', 'wavo'),
                            'h2' => esc_html__('H2', 'wavo'),
                            'h3' => esc_html__('H3', 'wavo'),
                            'h4' => esc_html__('H4', 'wavo'),
                            'h5' => esc_html__('H5', 'wavo'),
                            'h6' => esc_html__('H6', 'wavo'),
                            'div' => esc_html__('div', 'wavo'),
                        ),
                        'default' => 'h1',
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Title Typography', 'wavo'),
                        'id' => 'single_shop_title_typo',
                        'type' => 'typography',
                        'font-backup' => false,
                        'letter-spacing' => true,
                        'text-transform' => true,
                        'all_styles' => true,
                        'output' => array( '#nt-woo-single .nt-hero-title' ),
                        'units' => 'px',
                        'default' => array(
                            'color' => '',
                            'font-style' => '',
                            'font-family' => '',
                            'google' => true,
                            'font-size' => '',
                            'line-height' => ''
                        ),
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Slogan', 'wavo'),
                        'subtitle' => esc_html__('Add your single page slogan here.', 'wavo'),
                        'id' => 'single_shop_slogan',
                        'type' => 'textarea',
                        'default' => '',
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Slogan Typography', 'wavo'),
                        'id' => 'single_shop_slogan_typo',
                        'type' => 'typography',
                        'font-backup' => false,
                        'letter-spacing' => true,
                        'text-transform' => true,
                        'all_styles' => true,
                        'output' => array( '#nt-woo-single .nt-hero-subtitle' ),
                        'default' => array(
                            'color' => '',
                            'font-style' => '',
                            'font-family' => '',
                            'google' => true,
                            'font-size' => '',
                            'line-height' => ''
                        ),
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Description', 'wavo'),
                        'subtitle' => esc_html__('Add your single page description here.', 'wavo'),
                        'id' => 'single_shop_desc',
                        'type' => 'textarea',
                        'default' => '',
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    ),
                    array(
                        'title' => esc_html__('Single Description Typography', 'wavo'),
                        'id' => 'single_shop_desc_typo',
                        'type' => 'typography',
                        'font-backup' => false,
                        'letter-spacing' => true,
                        'text-transform' => true,
                        'all_styles' => true,
                        'output' => array( '#nt-woo-single .nt-hero-description' ),
                        'default' => array(
                            'color' => '',
                            'font-style' => '',
                            'font-family' => '',
                            'google' => true,
                            'font-size' => '',
                            'line-height' => ''
                        ),
                        'required' => array(
                            array( 'single_shop_hero_visibility', '=', '1' ),
                            array( 'single_shop_hero_template', '=', 'default' )
                        )
                    )
                )
            );
            // SINGLE CONTENT SUBSECTION
            $sections[] = array(
                'title' => esc_html__('Single Content', 'wavo'),
                'id' => 'singleshopcontentsubsection',
                'subsection' => true,
                'icon' => 'el el-brush',
                'fields' => array(
                    array(
                        'title' => esc_html__('Single Content Padding', 'wavo'),
                        'subtitle' => esc_html__('You can set the top spacing of the site single page content.', 'wavo'),
                        'id' =>'single_shop_content_pad',
                        'type' => 'spacing',
                        'output' => array('#nt-woo-single .nt-theme-inner-container'),
                        'mode' => 'padding',
                        'units' => array('em', 'px'),
                        'units_extended' => 'false',
                        'default' => array(
                            'padding-top' => '',
                            'padding-right' => '',
                            'padding-bottom' => '',
                            'padding-left' => '',
                            'units' => 'px'
                        )
                    )
                )
            );
            return $sections;
        }
        add_filter('redux/options/'.$wavo_pre.'/sections', 'wavo_dynamic_section');
    }
}

/*************************************************
## WOOCOMMERCE HERO FUNCTION
*************************************************/

if(! function_exists('wavo_woo_hero_section')) {
    function wavo_woo_hero_section()
    {
        if (class_exists( 'WooCommerce' )) {

            if (is_archive() || is_shop()) {
                $name = 'shop';
                $h_t  = '' != wavo_settings('shop_title') ? wavo_settings('shop_title') : '';
            } elseif (is_product()) { // blog and cpt archive page
                $name = 'single_shop';
                $h_t  = '' != wavo_settings('single_shop_title') ? wavo_settings('single_shop_title') : '';
            } else {
                $name = 'shop';
                $h_t  = 'Shop';
            }
            $has_bg = $bg_attr = '';
            $def_bg = ' default-bg';

            // page breadcrumbs
            $h_b = wavo_settings('breadcrumbs_visibility', '0');
            // page hero text alignment
            $h_a = wavo_settings($name.'_hero_alignment', 'text-center');
            // page hero background image overlay
            $h_o = wavo_settings($name.'_hero_overlay') != '' ? ' hero-overlay': '';

            if ( '0' != apply_filters('wavo_shop_hero_visibility', wavo_settings('shop_hero_visibility', '1') ) ) {

                if ( 'elementor' == wavo_settings($name.'_hero_template', 'default') ) {

                    if ( class_exists( '\Elementor\Frontend' ) ) {
                        $template_id = wavo_settings( $name.'_hero_elementor_templates' );
                        if ( !empty( $template_id ) ) {

                            $frontend = new \Elementor\Frontend;
                            printf( '%1$s', $frontend->get_builder_content( $template_id, false ) );

                        }
                    }

                } else {

                    echo '<div id="nt-hero" class="page-header text-center page-id-'.get_the_ID().' '. esc_attr($h_o) .$has_bg.$def_bg.'"'.$bg_attr.'>
                    <div class="container">
                    <div class="row">
                    <div class="col-sm-12">
                    <div class="cont">
                    <div class="hero-innner-last-child">';

                    // page hero slogan
                    if ( '' != wavo_settings($name.'_slogan')) {
                        echo '<h6 class="nt-hero-subtitle __subtitle">'.wp_kses(wavo_settings($name.'_slogan'), wavo_allowed_html()).'</h6>';
                    }

                    // page hero title
                    if ( $h_t ) {
                        echo '<'.wavo_settings($name.'_title_tag').' class="nt-hero-title hero__title"><span>'.wp_kses($h_t, wavo_allowed_html()).'</span></'.wavo_settings($name.'_title_tag').'>';
                    } else {
                        echo '<'.wavo_settings($name.'_title_tag').' class="nt-hero-title hero__title"><span>';
                        woocommerce_page_title();
                        echo '</span></'.wavo_settings($name.'_title_tag').'>';
                    }

                    // page hero description
                    if ( '' != wavo_settings($name.'_desc')) {
                        echo '<p class="nt-hero-description">'.wp_kses(wavo_settings($name.'_desc'), wavo_allowed_html()).'</p>';
                    }

                    // page breadcrumbs
                    if ( '1' == wavo_settings('breadcrumbs_visibility', '0')) {
                        echo wavo_breadcrumbs();
                    }

                    echo '</div><!-- End hero-innner-last-child -->
                    </div><!-- End hero-content -->
                    </div><!-- End column -->
                    </div><!-- End row -->
                    </div><!-- End container -->
                    </div><!-- End hero-container -->';
                }
            } // hide hero area
        }
    }
}

if ( !function_exists( 'wavo_after_shop_page' ) ) {
    function wavo_after_shop_page() {
        if ( class_exists( '\Elementor\Frontend' ) ) {
            $template_id = wavo_settings( 'shop_after_page_elementor_templates' );
            if ( !empty( $template_id ) ) {

                $frontend = new \Elementor\Frontend;
                printf( '%1$s', $frontend->get_builder_content( $template_id, false ) );

            }
        }
    }
    add_action('wavo_after_woo_shop_page', 'wavo_after_shop_page', 10);
}

/*************************************************
## ADD CUSTOM CSS FOR WOOCOMMERCE
*************************************************/


if ( !function_exists( 'wavo_woo_scripts' ) ) {
    function wavo_woo_scripts()
    {
        wp_enqueue_style( 'wavo-woocommerce-custom', get_template_directory_uri() . '/woocommerce/woocommerce-custom.css',false, '1.0');
        wp_enqueue_script('wavo-woocommerce-custom', get_template_directory_uri() . '/woocommerce/woocommerce-custom.js', array('jquery'), '1.0', true);
    }
    add_action( 'wp_enqueue_scripts', 'wavo_woo_scripts' );
}


/*************************************************
## REMOVE WOOCOMMERCE DEFAULT PAGINATION
*************************************************/

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );


/*************************************************
## ADD THEME SUPPORT FOR WOOCOMMERCE
*************************************************/

if ( ! function_exists( 'wavo_woo_theme_setup' ) ) {
    function wavo_woo_theme_setup() {

        add_theme_support( 'woocommerce'  );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

    }
    add_action( 'after_setup_theme', 'wavo_woo_theme_setup' );
}

/*************************************************
## CHANGE NUMBER OF PRODUCTS PER ROW
*************************************************/

/**
* Change number of products that are displayed per page (shop page)
*/

if (!function_exists('wavo_woo_shop_per_page')) {

    add_filter( 'loop_shop_per_page', 'wavo_woo_shop_per_page', 20 );

    function wavo_woo_shop_per_page( $cols ) {

        // $cols contains the current number of products per page based on the value stored on Options -> Reading
        // Return the number of products you wanna show per page.
        $cols = wavo_settings('shop_perpage', '6');

        return $cols;

    }
}

/*************************************************
## CHANGE NUMBER OF PRODUCTS COLUMN
*************************************************/

/*************************************************
## CHANGE NUMBER OF PRODUCTS COLUMN
*************************************************/
/**
* Change number or products per row to 3
*/

if (!function_exists('wavo_woo_loop_columns')) {

    add_filter('loop_shop_columns', 'wavo_woo_loop_columns', 999);

    function wavo_woo_loop_columns() {

        return wavo_settings('shop_column', '3'); // 2 products per row

    }
}

/**
* Change number of related products output
*/
if (!function_exists('wavo_woo_related_products_limit')) {

    add_filter( 'woocommerce_output_related_products_args', 'wavo_woo_related_products_limit', 20 );
    function wavo_woo_related_products_limit( $args ) {
        $args['posts_per_page'] = wavo_settings('single_shop_related_count', '4'); // 4 related products
        $args['columns'] = wavo_settings('single_shop_related_column', '1'); // arranged in 2 columns
        return $args;
    }
}

/*************************************************
## REGISTER SIDEBAR FOR WOOCOMMERCE
*************************************************/


if ( !function_exists( 'wavo_woo_widgets_init' ) ) {
    function wavo_woo_widgets_init() {
        //Shop page sidebar
        register_sidebar( array(
            'name' => esc_html__( 'Shop Page Sidebar', 'wavo' ),
            'id' => 'shop-page-sidebar',
            'description' => esc_html__( 'These widgets for the Shop page.','wavo' ),
            'before_widget' => '<div class="nt-sidebar-inner-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="nt-sidebar-inner-widget-title widget-title">',
            'after_title' => '</h4>'
        ) );
        //Single product sidebar
        register_sidebar( array(
            'name' => esc_html__( 'Shop Single Page Sidebar', 'wavo' ),
            'id' => 'shop-single-sidebar',
            'description' => esc_html__( 'These widgets for the Shop Single page.','wavo' ),
            'before_widget' => '<div class="nt-sidebar-inner-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="nt-sidebar-inner-widget-title widget-title">',
            'after_title' => '</h4>'
        ) );
    }
    add_action( 'widgets_init', 'wavo_woo_widgets_init' );
}



/************************************************************
## ADD THEME CSS SETTINGS TO WOOCOMMERCE AND WP INLINE STYLE
*************************************************************/


if ( !function_exists( 'wavo_woo_theme_css_options' ) ) {
    function wavo_woo_theme_css_options()
    {
        /* CSS to output */
        if ( '1' == wavo_settings('disable_theme_shop_styles') ) {
            return;
        }
        $theCSS = '';

        $theCSS .= '.woocommerce .page-header.hero-overlay:before{
            content: "";
            position: absolute;
            width:100%;
            height:100%;
            top:0;
            left:0;
        }
        .page-header {
            position: relative;
        }';

        $shop_theme_color = wavo_settings('shop_theme_color');
        if ( '1' != $shop_theme_color ) {
            $theme_color = $shop_theme_color;
            if ( '1' == $theme_color ) {
                $theme_color = '#30aafc';
            } elseif ( '2' == $theme_color ) {
                $theme_color = '#ff6833';
            } elseif ( '3' == $theme_color ) {
                $theme_color = '#341880';
            } elseif ( '4' == $theme_color || '8' == $theme_color ) {
                $theme_color = '#fccb30';
            } elseif ( '5' == $theme_color ) {
                $theme_color = '#db3a58';
            } elseif ( '6' == $theme_color ) {
                $theme_color = '#5ec05a';
            } elseif ( '7' == $theme_color ) {
                $theme_color = '#5b65bd';
            } elseif ( 'custom' == $theme_color ) {
                $theme_color = wavo_settings('shop_custom_color');
            }

            // css color
            $theCSS .= '.product.t-left:hover p.paragraph, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__published-date , .woocommerce-info::before, a.showcoupon,.woocommerce a.added_to_cart, .woocommerce div.product p.price, .woocommerce div.product span.price, .nt-sidebar .product_list_widget ins .woocommerce-Price-amount.amount,.woocommerce ul.products li.product .price,.woocommerce ul.products li.product .price del,.woocommerce ul.products li.product .price ins { color: '.$theme_color.'; }';
            //css border color
            $theCSS .= '.woocommerce-account .woocommerce-MyAccount-content p a, .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce div.product.sale div.images.woocommerce-product-gallery, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-Address-title .edit {border-color:'.$theme_color.';}';
            $theCSS .= '.stack-title a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce a.added_to_cart, .woocommerce div.product .woocommerce-tabs ul.tabs li.active { border-color:' .$theme_color. '; }';
            //css background color
            $theCSS .= '.woocommerce ul.products li.product .onsale,.woocommerce span.onsale,.single-product .form-submit input#submit:hover,.woocommerce #respond input#submit:hover,.button:hover,.woocommerce button.button:hover,.woocommerce a.button:hover, .woocommerce a.added_to_cart:hover,.woocommerce.single-product .entry-summary button.button.alt, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce .woocommerce-ordering .nice-select .option:hover,.nt-sidebar form.woocommerce-product-search button,.woocommerce .widget_price_filter .price_slider_amount .button,.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle { background: '.$theme_color.';}';

            //theme button bg color
            $theCSS .= '.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .single-product .form-submit input#submit,a.add_to_cart_button,.single-product .form-submit input#submit:hover{ background-color:'. $theme_color .';border-color:'. $theme_color .'; } ';
            $theCSS .= '.button:hover,  .woocommerce .form-submit .btn-curve, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .single-product .form-submit input#submit:hover, a.added_to_cart:hover, .woocommerce ul.products li.product .button{  border-color:'. $theme_color .'; }';

            //theme button title color
            $theCSS .= '.button,  .woocommerce .form-submit .btn-curve:hover, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .single-product .form-submit input#submit, a.add_to_cart_button, .woocommerce a.added_to_cart:hover, .woocommerce .woocommerce-ordering .nice-select .option:hover{color:#fff;}';
            $theCSS .= '.button,  .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .single-product .form-submit input#submit:hover, a.added_to_cart:hover{ border-color:'. $theme_color .'; }';
            $theCSS .= '.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle { background: '.$theme_color.';}';
        }
        /* Add CSS to wavo-custom-style.css */
        wp_register_style( 'wavo-woo-style', false );
        wp_enqueue_style( 'wavo-woo-style' );
        wp_add_inline_style( 'wavo-woo-style', $theCSS );
    }
    add_action( 'wp_enqueue_scripts', 'wavo_woo_theme_css_options' );
}

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );

/*************************************************
## CUSTOM POST CLASS
*************************************************/

if (! function_exists('nt_wavo_post_theme_class')) {
    function nt_wavo_post_theme_class($classes)
    {

        if ( is_single() ) {
            $classes[] =  has_blocks() ? 'nt-single-has-block' : '';
        }

        return $classes;
    }
    add_filter('post_class', 'nt_wavo_post_theme_class');
}
