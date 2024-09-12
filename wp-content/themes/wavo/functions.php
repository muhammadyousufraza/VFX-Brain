<?php

/**
 *
 * @package WordPress
 * @subpackage wavo
 * @since Wavo 1.0
 *
**/


/*************************************************
## GOOGLE FONTS
*************************************************/

if (! function_exists( 'wavo_fonts_url' ) ) {
    function wavo_fonts_url()
    {
        $fonts_url = '';

        $roboto = _x( 'on', 'Roboto font: on or off', 'wavo' );
        $ubuntu = _x( 'on', 'Ubuntu font: on or off', 'wavo' );
        $poppins = _x( 'on', 'Poppins font: on or off', 'wavo' );
        $robotomono = _x( 'on', 'Roboto+Mono font: on or off', 'wavo' );

        if ( 'off' !== $roboto || 'off' !== $ubuntu || 'off' !== $poppins || 'off' !== $robotomono ) {
            $font_families = array();

            if ( 'off' !== $roboto ) {
                $font_families[] = 'Roboto:300,400,600,700';
            }
            if ( 'off' !== $ubuntu ) {
                $font_families[] = 'Ubuntu:400,500,700';
            }
            if ( 'off' !== $poppins ) {
                $font_families[] = 'Poppins:200,300,400,500,600,700,800';
            }
            if ( 'off' !== $robotomono ) {
                $font_families[] = 'Roboto+Mono:400,700';
            }

            $query_args = array(
                'family' => urlencode(implode( '|', $font_families) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg($query_args, "//fonts.googleapis.com/css");
        }

        return esc_url_raw( $fonts_url );
    }
}

/*************************************************
## STYLES AND SCRIPTS
*************************************************/

function wavo_theme_scripts()
{
    // theme inner pages files
    // bootstrap
    if ( is_rtl() ) {
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/js/plugins/bootstrap/bootstrap-rtl.min.css', false, '1.0' );
    } else {
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/js/plugins/bootstrap/bootstrap.min.css', false, '1.0' );
    }
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/plugins/bootstrap/bootstrap.min.js', array( 'jquery' ), '1.0', true );
    wp_register_script( 'popper', get_template_directory_uri() . '/js/plugins/bootstrap/popper.min.js', array( 'jquery' ), '1.0', true );

    // plugins
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/plugins/animate.min.css', false, '1.0' );
    wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/plugins/ionicons.min.css', false, '1.0' );
    wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/css/plugins/fontawesome-all.min.css', false, '1.0' );
    wp_enqueue_style( 'helper', get_template_directory_uri() . '/css/plugins/helper.css', false, '1.0' );
    wp_enqueue_style( 'hamburgers', get_template_directory_uri() . '/css/plugins/hamburgers.css', false, '1.0' );

    wp_register_script( 'pace', get_template_directory_uri() . '/js/plugins/pace/pace.min.js', array( 'jquery' ), '1.0', true );
    wp_register_script( 'parallaxie', get_template_directory_uri() . '/js/plugins/parallaxie/parallaxie.min.js', array( 'jquery' ), '1.0', true );
    wp_register_script( 'easings', get_template_directory_uri() . '/js/plugins/easings/easings.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/plugins/wow/wow.min.js', array( 'jquery' ), '1.0', false );

    wp_register_script( 'smoothScroll', get_template_directory_uri() . '/js/plugins/smooth-scroll/smoothScroll.min.js', array( 'jquery' ), '1.0', true );

    // gsap
    wp_register_script( 'gsap', get_template_directory_uri() . '/js/plugins/gsap/gsap.min.js', array( 'jquery' ), '1.0', true );
    wp_register_script( 'tween-max', get_template_directory_uri() . '/js/plugins/gsap/TweenMax.min.js', array( 'jquery' ), '1.0', true );
    wp_register_script( 'scrollmagic', get_template_directory_uri() . '/js/plugins/gsap/scrollmagic.min.js', array('jquery'), '1.0', true );

    // cursors
    if ( 'none' != wavo_settings( 'follow_cursor_visibility', '1' ) ) {
        wp_enqueue_style( 'all-cursors', get_template_directory_uri() . '/js/plugins/cursor/all-cursors.css', false, '1.0' );
        wp_enqueue_script( 'all-cursors', get_template_directory_uri() . '/js/plugins/cursor/all-cursors.js', array( 'jquery' ), '1.0', true );
    }

    // aos
    wp_register_style( 'aos', get_template_directory_uri() . '/js/plugins/aos/aos.css', false, '1.0' );
    wp_register_script( 'aos', get_template_directory_uri() . '/js/plugins/aos/aos.js', array('jquery'), '1.0', true );

    // overlay-scrollbars
    wp_register_style( 'overlay-scrollbars', get_template_directory_uri() . '/js/plugins/OverlayScrollbars/OverlayScrollbars.css', false, '1.0' );
    wp_register_script( 'overlay-scrollbars', get_template_directory_uri() . '/js/plugins/OverlayScrollbars/jquery.overlayScrollbars.min.js', array( 'jquery' ), '1.0', true );

    // splitting text
    if ( '0' != wavo_settings( 'split_text_animation_visibility' ) ) {
        wp_register_style( 'splitting', get_template_directory_uri(). '/js/plugins/splitting/splitting.css', '1.0', false );
        wp_register_style( 'splitting-cells', get_template_directory_uri(). '/js/plugins/splitting/splitting-cells.css', '1.0', false );
        wp_register_script( 'splitting', get_template_directory_uri(). '/js/plugins/splitting/splitting.min.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'splitting' );
    }

    // swiper
    wp_register_style( 'wavo-swiper', get_template_directory_uri() . '/js/plugins/swiper/swiper.min.css', false, '1.0' );
    wp_register_script( 'wavo-swiper', get_template_directory_uri() . '/js/plugins/swiper/swiper.min.js', array( 'jquery' ), '6.3.8', true );
    wp_enqueue_script( 'wavo-swiper' );

    // vegas slider
    wp_register_style( 'vegas', get_template_directory_uri(). '/js/plugins/vegas/vegas.css', '1.0', false );
    wp_register_script( 'vegas', get_template_directory_uri(). '/js/plugins/vegas/vegas.min.js', array( 'jquery' ), '1.0', true );

    // slick slider
    wp_register_style( 'slick', get_template_directory_uri(). '/js/plugins/slick/slick.css', false, '1.0' );
    wp_register_style( 'slick-theme', get_template_directory_uri() . '/js/plugins/slick/slick-theme.css', false, '1.0' );
    wp_register_script( 'slick', get_template_directory_uri(). '/js/plugins/slick/slick.min.js', array( 'jquery' ), false, '1.0');

    // justifiedGallery
    wp_register_style( 'justified', get_template_directory_uri(). '/js/plugins/justifiedGallery/justifiedGallery.min.css', false, '1.0' );
    wp_register_script( 'justified', get_template_directory_uri(). '/js/plugins/justifiedGallery/justifiedGallery.min.js', array( 'jquery' ), false, '1.0' );

    // magnific-popup-lightbox
    wp_register_style( 'magnific', get_template_directory_uri(). '/js/plugins/magnific/magnific-popup.css', false, '1.0' );
    wp_register_script( 'magnific', get_template_directory_uri(). '/js/plugins/magnific/magnific-popup.min.js', array( 'jquery' ), false, '1.0' );

    // isotope
    wp_register_script( 'isotope', get_template_directory_uri(). '/js/plugins/isotope/isotope.min.js', array( 'jquery' ), false, '1.0' );
    wp_register_script( 'imagesloaded', get_template_directory_uri(). '/js/plugins/isotope/imagesloaded.pkgd.min.js', array( 'jquery' ), false, '1.0' );
    // isotope
    wp_register_style( 'cubeportfolio', get_template_directory_uri(). '/js/plugins/cbp/cubeportfolio.min.css', false, '1.0' );
    wp_register_style( 'cubeportfolio-custom', get_template_directory_uri(). '/js/plugins/cbp/cubeportfolio-custom.css', false, '1.0' );
    wp_register_script( 'cubeportfolio', get_template_directory_uri(). '/js/plugins/cbp/cubeportfolio.min.js', array( 'jquery' ), false, '1.0' );

    // jarallax
    wp_register_script( 'jarallax', get_template_directory_uri(). '/js/plugins/jarallax/jarallax.min.js', array( 'jquery' ), false, '1.0' );
    wp_register_script( 'particles', get_template_directory_uri(). '/js/plugins/particles/particles.min.js', array( 'jquery' ), false, '1.0' );
    wp_register_script( 'simple-parallax', get_template_directory_uri(). '/js/plugins/simpleParallax/simpleParallax.min.js', array( 'jquery' ), false, '1.0' );
    wp_register_script( 'drawsvg', get_template_directory_uri(). '/js/plugins/drawsvg/drawsvg.min.js', array( 'jquery' ), false, '1.0' );
    wp_register_script( 'vivus', get_template_directory_uri(). '/js/plugins/vivus/vivus.min.js', array( 'jquery' ), false, '1.0' );
    wp_register_script( 'tilt', get_template_directory_uri(). '/js/plugins/tilt/tilt.jquery.min.js', array( 'jquery' ), false, '1.0' );

    // jquery-ui
    wp_register_style( 'jquery-ui', get_template_directory_uri(). '/js/plugins/jquery-ui/jquery-ui.min.css', false, '1.0' );
    wp_register_script( 'jquery-ui', get_template_directory_uri(). '/js/plugins/jquery-ui/jquery-ui.min.js', array( 'jquery' ), false, '1.0' );

    // YouTubePopUp
    wp_register_style( 'youtube-popup', get_template_directory_uri(). '/js/plugins/YouTubePopUp/YouTubePopUp.css', false, '1.0' );
    wp_register_script( 'youtube-popup', get_template_directory_uri(). '/js/plugins/YouTubePopUp/YouTubePopUp.min.js', array( 'jquery' ), false, '1.0' );

    // locomotive-page
    wp_register_style( 'locomotive-scroll', get_template_directory_uri(). '/js/plugins/locomotive/locomotive-scroll.css', false, '1.0');
    wp_register_script( 'polyfill', get_template_directory_uri(). '/js/plugins/locomotive/polyfill.min.js', [ 'jquery' ], '1.0', true);
    wp_register_script( 'locomotive-scroll', get_template_directory_uri(). '/js/plugins/locomotive/locomotive-scroll.min.js', [ 'jquery' ], '1.0', true);
    wp_register_script( 'locomotive-main', get_template_directory_uri(). '/js/plugins/locomotive/locomotive-main.js', array( 'jquery' ), '1.0', true );

    // wavo-main-style
    if ( is_rtl() ) {
        wp_enqueue_style( 'wavo-style', get_template_directory_uri() . '/css/style-rtl.css', false, '1.0' );
    } else {
        wp_enqueue_style( 'wavo-style', get_template_directory_uri() . '/css/style.css', false, '1.0' );
        // wavo-framework-style
        wp_enqueue_style( 'wavo-framework-style', get_template_directory_uri() . '/css/framework-style.css', false, '1.0' );
        // wavo-update-style
        wp_enqueue_style( 'wavo-update', get_template_directory_uri() . '/css/update.css', false, '1.0' );
    }

    // upload Google Webfonts
    wp_enqueue_style( 'wavo-fonts', wavo_fonts_url(), array(), null );

    wp_enqueue_script( 'wavo-main', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'framework-settings', get_template_directory_uri() . '/js/framework-settings.js', array( 'jquery' ), '1.0', true );

    if ( 'masonry' == wavo_settings( 'index_type', 'default' ) ) {
        wp_enqueue_script( 'masonry' );
    }

    // comment form reply
    if ( is_singular() ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( class_exists( '\Elementor\Plugin' ) ) {
        $elementor = \Elementor\Plugin::instance();
        $elementor->frontend->enqueue_styles();
    }

    if ( class_exists( '\ElementorPro\Plugin' ) ) {
        $elementor_pro = \ElementorPro\Plugin::instance();
        $elementor_pro->enqueue_styles();
    }

    if ( 'elementor' == wavo_settings('header_template') ) {
        if ( class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {
            $css_file = new \Elementor\Core\Files\CSS\Post( wavo_settings('header_elementor_templates') );
        } elseif ( class_exists( '\Elementor\Post_CSS_File' ) ) {
            $css_file = new \Elementor\Post_CSS_File( wavo_settings('header_elementor_templates') );
        }
        $css_file->enqueue();
    }

    if ( 'elementor' == wavo_settings('footer_type') ) {
        if ( class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {
            $css_file = new \Elementor\Core\Files\CSS\Post( wavo_settings('footer_elementor_templates') );
        } elseif ( class_exists( '\Elementor\Post_CSS_File' ) ) {
            $css_file = new \Elementor\Post_CSS_File( wavo_settings('footer_elementor_templates') );
        }
        $css_file->enqueue();
    }

    if ( '1' == wavo_settings( 'theme_blocks_styles', '1' ) ) {

        wp_dequeue_style( 'wp-block-library' );
        wp_deregister_style( 'wp-block-library' );

        // woocommerce
        wp_dequeue_style( 'woocommerce-inline' );
        wp_deregister_style( 'woocommerce-inline' );

        wp_dequeue_style( 'global-styles' );

        global $wp_styles;
        foreach ( $wp_styles->queue as $handle ) {
            if ( str_starts_with( $handle, 'wc-blocks' ) ) {
                wp_deregister_style( $handle );
                wp_dequeue_style( $handle );
            }
        }
    }
}
add_action( 'wp_enqueue_scripts', 'wavo_theme_scripts', 100 );


function wavo_resource_hints( $urls, $relation_type ) {

    if ( wp_style_is( 'wavo-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'wavo_resource_hints', 10, 2 );


/*************************************************
## ADMIN STYLE AND SCRIPTS
*************************************************/


function wavo_admin_scripts()
{
    // Update CSS within in Admin
    wp_enqueue_script( 'wavo-custom-admin', get_template_directory_uri() . '/js/framework-admin.js', array( 'jquery','jquery-ui-sortable' ) );

}
add_action( 'admin_enqueue_scripts', 'wavo_admin_scripts' );

/**
 * Disable WooCommerce block styles (front-end).
 */
function ninetheme_disable_woocommerce_block_styles()
{
  wp_dequeue_style( 'wc-blocks-style' );
}
add_action( 'wp_enqueue_scripts', 'ninetheme_disable_woocommerce_block_styles' );


/**
 * Disable WooCommerce block styles (back-end).
 */
function ninetheme_disable_woocommerce_block_editor_styles()
{
  wp_deregister_style( 'wc-block-editor' );
  wp_deregister_style( 'wc-blocks-style' );
}
add_action( 'enqueue_block_assets', 'ninetheme_disable_woocommerce_block_editor_styles', 1, 1 );

add_action('get_header', 'wavo_remove_admin_login_header');
function wavo_remove_admin_login_header()
{
	remove_action('wp_head', '_admin_bar_bump_cb');
}

// Template-functions
include get_template_directory() . '/inc/template-functions.php';

// Theme parts
include get_template_directory() . '/inc/template-parts/menu.php';
include get_template_directory() . '/inc/template-parts/post-formats.php';
include get_template_directory() . '/inc/template-parts/single-post-formats.php';
include get_template_directory() . '/inc/template-parts/paginations.php';
include get_template_directory() . '/inc/template-parts/comment-parts.php';
include get_template_directory() . '/inc/template-parts/small-parts.php';
include get_template_directory() . '/inc/template-parts/header-parts.php';
include get_template_directory() . '/inc/template-parts/footer-parts.php';
include get_template_directory() . '/inc/template-parts/page-hero.php';
include get_template_directory() . '/inc/template-parts/breadcrumbs.php';

// Theme dynamic css setting file
include get_template_directory() . '/inc/template-parts/custom-style.php';

// Theme post and page meta plugin for customization and more features
include get_template_directory() . '/inc/core/metaboxes.php';
// TGM plugin activation
include get_template_directory() . '/inc/core/class-tgm-plugin-activation.php';
// Redux theme options panel
require_once get_parent_theme_file_path( '/inc/core/merlin/admin-menu.php' );
// Redux theme options panel
include get_template_directory() . '/inc/core/theme-options/options.php';

// WooCommerce init
if ( class_exists('woocommerce') ) {
    include get_template_directory() . '/woocommerce/init.php';
}

/*************************************************
## THEME SETUP
*************************************************/


if (! isset($content_width) ) {
    $content_width = 960;
}

function wavo_theme_setup()
{
    /*
    * This theme styles the visual editor to resemble the theme style,
    * specifically font, colors, icons, and column width.
    */
    add_editor_style( 'custom-editor-style.css' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_image_size( 'wavo-square', 500, 500, true );
    add_image_size( 'wavo-grid', 750, 750, true );
    add_image_size( 'wavo-single', 2400, 1200, true );
    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
    */
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', array( 'gallery','link','image','quote','video','audio' ) );

    // theme supports
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'html5', array( 'search-form' ) );
    add_theme_support( 'woocommerce'  );
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 450,
        'single_image_width' => 980,
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

    if ( '1' == wavo_settings( 'theme_blocks_styles', '1' ) ) {
        remove_theme_support( 'widgets-block-editor' );
        add_filter( 'use_widgets_block_editor', '__return_false' );
        add_filter('use_block_editor_for_post', '__return_false', 10);
        add_filter('use_block_editor_for_page', '__return_false', 10);
    }

    // Make theme available for translation
    // Translations can be filed in the /languages/ directory
    load_theme_textdomain( 'wavo', get_template_directory() . '/languages' );

    register_nav_menus(array(
        'header_menu' => esc_html__( 'Header Menu', 'wavo' ),
    ) );

}
add_action( 'after_setup_theme', 'wavo_theme_setup' );


/*************************************************
## WIDGET COLUMNS
*************************************************/


function wavo_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__( 'Blog Sidebar', 'wavo' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'These widgets for the Blog page.', 'wavo' ),
        'before_widget' => '<div class="nt-sidebar-inner-widget blog-sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="nt-sidebar-inner-widget-title blog-sidebar_widget_title">',
        'after_title' => '</h4>'
    ) );
    register_sidebar(array(
        'name' => esc_html__( 'Header Contact Details', 'wavo' ),
        'id' => 'header-info',
        'description' => esc_html__( 'These widgets for the header overlay contact information.', 'wavo' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ) );
    if ( function_exists( 'get_field' ) && 'full-width' != get_field( 'wavo_page_layout' ) ) {
        register_sidebar(array(
            'name' => esc_html__( 'Default Page Sidebar', 'wavo' ),
            'id' => 'wavo-page-sidebar',
            'description' => esc_html__( 'These widgets for the Default Page pages.', 'wavo' ),
            'before_widget' => '<div class="nt-sidebar-inner-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="nt-sidebar-inner-widget-title widget-title blog-sidebar_widget_title">',
            'after_title' => '</h4>'
        ) );
    }
    if ( class_exists( 'Redux' ) ) {
        if ( 'full-width' != wavo_settings( 'archive_layout', 'full-width' ) ) {
            register_sidebar(array(
                'name' => esc_html__( 'Archive Sidebar', 'wavo' ),
                'id' => 'wavo-archive-sidebar',
                'description' => esc_html__( 'These widgets for the Archive pages.', 'wavo' ),
                'before_widget' => '<div class="nt-sidebar-inner-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="nt-sidebar-inner-widget-title widget-title blog-sidebar_widget_title">',
                'after_title' => '</h4>'
            ) );
        }
        if ( 'full-width' != wavo_settings( 'search_layout', 'full-width' ) ) {
            register_sidebar(array(
                'name' => esc_html__( 'Search Sidebar', 'wavo' ),
                'id' => 'wavo-search-sidebar',
                'description' => esc_html__( 'These widgets for the Search pages.', 'wavo' ),
                'before_widget' => '<div class="nt-sidebar-inner-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="nt-sidebar-inner-widget-title widget-title blog-sidebar_widget_title">',
                'after_title' => '</h4>'
            ) );
        }
        if ( 'full-width' != wavo_settings( 'single_layout', 'full-width' ) ) {
            register_sidebar(array(
                'name' => esc_html__( 'Blog Single Sidebar', 'wavo' ),
                'id' => 'wavo-single-sidebar',
                'description' => esc_html__( 'These widgets for the Blog single page.', 'wavo' ),
                'before_widget' => '<div class="nt-sidebar-inner-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="nt-sidebar-inner-widget-title widget-title blog-sidebar_widget_title">',
                'after_title' => '</h4>'
            ) );
        }
        if ( '1' == wavo_settings( 'footer_visibility', '1' ) && '1' == wavo_settings( 'footer_widgetize_visibility', '0' ) ) {
            register_sidebar(array(
                'name' => esc_html__( 'Footer Widget Area', 'wavo' ),
                'id' => 'footer-widget-area',
                'description' => esc_html__( 'These widgets for the footer top section.', 'wavo' ),
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h4 class="nt-footer-widget-title nt-sidebar-inner-widget-title blog-sidebar_widget_title">',
                'after_title' => '</h4>'
            ) );
        }
    } // end if redux exists
} // end wavo_widgets_init
add_action( 'widgets_init', 'wavo_widgets_init' );


/*************************************************
## INCLUDE THE TGM_PLUGIN_ACTIVATION CLASS.
*************************************************/


function wavo_register_required_plugins()
{
    $plugins = array(
        array(
            'name' => esc_html__( 'Custom Post Type UI', 'wavo' ),
            'slug' => 'custom-post-type-ui'
        ),
        array(
            'name' => esc_html__( 'Contact Form 7', 'wavo' ),
            'slug' => 'contact-form-7'
        ),
        array(
            'name' => esc_html__( 'Theme Options Panel', 'wavo' ),
            'slug' => 'redux-framework',
            'required' => true
        ),
        array(
            'name' => esc_html__( 'Safe SVG', 'wavo' ),
            'slug' => 'safe-svg',
            'required' => true
        ),
        array(
            'name' => esc_html__( 'Elementor', 'wavo' ),
            'slug' => 'elementor',
            'required' => true
        ),
        array(
            'name' => esc_html__( 'Advanced Custom Fields - ACF', 'wavo' ),
            'slug' => 'advanced-custom-fields',
            'required' => true
        ),
        array(
            'name' => esc_html__('WooCommerce', "wavo"),
            'slug' => 'woocommerce'
        ),
        array(
            'name' => esc_html__( 'Envato Auto Update Theme', 'wavo' ),
            'slug' => 'envato-market',
            'source' => 'https://ninetheme.com/documentation/plugins/envato-market.zip',
            'required' => false
        ),
        array(
            'name' => esc_html__( 'The Grid', 'wavo' ),
            'slug' => 'the-grid',
            'source' => 'https://ninetheme.com/documentation/plugins/the-grid.zip',
            'required' => false
        ),
        array(
            'name' => esc_html__( 'Revolution Slider', 'wavo' ),
            'slug' => 'revslider',
            'source' => 'https://ninetheme.com/documentation/plugins/revslider.zip',
            'required' => false
        ),
        array(
            'name' => esc_html__( 'Wavo Elementor Addons', 'wavo' ),
            'slug' => 'wavo-elementor-addons',
            'source' => get_template_directory() . '/plugins/wavo-elementor-addons.zip',
            'required' => true,
            'version' => '2.2.4'
        )
        // end plugins list
    );

    $config = array(
        'id' => 'tgmpa',
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'parent_slug' => apply_filters( 'ninetheme_parent_slug', 'themes.php' ),
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => true,
        'message' => ''
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'wavo_register_required_plugins' );



/*************************************************
## ONE CLICK DEMO IMPORT
*************************************************/


/*************************************************
## THEME SETUP WIZARD
    https://github.com/richtabor/MerlinWP
*************************************************/

require_once get_parent_theme_file_path( '/inc/core/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/inc/core/demo-wizard-config.php' );

function wavo_merlin_local_import_files() {
    return array(
        array(
            'landing_page'         => 'https://ninetheme.com/themes/wavolanding/wavo-landing-page/#demos',
        ),
        array(
            'import_file_name'         => esc_html__( 'Main Demo','wavo' ),
            'import_preview_url'       => 'https://ninetheme.com/themes/wavo/',
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux.json',
                    'option_name' => 'wavo'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        ),
        array(
            'import_file_name'         => esc_html__( 'Demo 2 - Modern Architecture & Interior Design','wavo' ),
            'import_preview_url'       => 'https://ninetheme.com/themes/wavo/v2/',
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data2.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux2.json',
                    'option_name' => 'wavo'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        ),
        array(
            'import_file_name'         => esc_html__( 'Demo 3 - Creative / Digital Agency','wavo' ),
            'import_preview_url'       => 'https://ninetheme.com/themes/wavo/v3/',
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data3.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux3.json',
                    'option_name' => 'wavo'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        ),
        array(
            'import_file_name'         => esc_html__( 'Demo 4 - Flat Classic Digital Marketing','wavo' ),
            'import_preview_url'       => 'https://ninetheme.com/themes/wavo/v4/',
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data4.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux4.json',
                    'option_name' => 'wavo'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        ),
        array(
            'import_file_name'         => esc_html__( 'Demo 5 - Locomotive Animated Onepage Personal','wavo' ),
            'import_preview_url'       => 'https://ninetheme.com/themes/wavo/v5/',
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data5.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux5.json',
                    'option_name' => 'wavo'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        ),
        array(
            'import_file_name'         => esc_html__( 'Demo 6 - Multipurpose Business Saas Agency','wavo' ),
            'import_preview_url'       => 'https://ninetheme.com/themes/wavo/v6/',
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data6.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux6.json',
                    'option_name' => 'wavo'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        ),
        array(
            'import_file_name'         => esc_html__( 'Demo 7 - Business - Marketing','wavo' ),
            'import_preview_url'       => 'https://ninetheme.com/themes/wavo/v7/',
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data7.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux7.json',
                    'option_name' => 'wavo'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        ),
        array(
            'import_file_name'         => esc_html__( 'Demo 8 - Locomotive - Cosmetic Product Showcase','wavo' ),
            'import_preview_url'       => 'https://ninetheme.com/themes/wavo/v8/',
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data8.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux8.json',
                    'option_name' => 'wavo'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        ),
        array(
            'import_file_name'         => esc_html__( 'Demo 9 - Interactive Link Slider - Personal CV','wavo' ),
            'import_preview_url'       => 'https://ninetheme.com/themes/wavo/v9/',
            // XML data
            'local_import_file'        => get_parent_theme_file_path( 'inc/core/merlin/demodata/data9.xml' ),
            // Widget data
            'local_import_widget_file' => get_parent_theme_file_path( 'inc/core/merlin/demodata/widgets.wie' ),
            // Theme options
            'local_import_redux'       => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ). 'inc/core/merlin/demodata/redux9.json',
                    'option_name' => 'wavo'
                )
            ),
            // cptui -> custom post types data
            'import_cptui' => array(
                array(
                    'cpt_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpt.json',
                    'tax_file_url' => trailingslashit( get_template_directory_uri() ) .  'inc/core/merlin/demodata/cpttax.json'
                )
            )
        ),
    );
}
add_filter( 'merlin_import_files', 'wavo_merlin_local_import_files' );

/**
 * Execute custom code after the whole import has finished.
 */
function wavo_merlin_after_import_setup() {
    // Assign menus to their locations.
    $primary = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

    set_theme_mod(
        'nav_menu_locations', array(
            'header_menu' => $primary->term_id
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

    if ( did_action( 'elementor/loaded' ) ) {
        // update some default elementor global settings after setup theme
        update_option( 'elementor_active_kit', '25' );
        update_option( 'elementor_disable_color_schemes', 'yes' );
        update_option( 'elementor_disable_typography_schemes', 'yes' );
        update_option( 'elementor_global_image_lightbox', 'yes' );
        update_option( 'elementor_cpt_support', ['post','page','projects'] );
    }
    if ( class_exists('woocommerce') ) {
        update_option( 'woocommerce_shop_page_id', '2584' );
        update_option( 'woocommerce_cart_page_id', '2585' );
        update_option( 'woocommerce_checkout_page_id', '2586' );
        update_option( 'woocommerce_myaccount_page_id', '2587' );
    }

}
add_action( 'merlin_after_all_import', 'wavo_merlin_after_import_setup' );

add_action('init', 'do_output_buffer'); function do_output_buffer() { ob_start(); }

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );

add_action( 'admin_init', function() {
    if ( did_action( 'elementor/loaded' ) ) {
        remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
    }
}, 1 );

function wavo_register_elementor_locations( $elementor_theme_manager ) {

    $elementor_theme_manager->register_location( 'header' );
    $elementor_theme_manager->register_location( 'footer' );
    $elementor_theme_manager->register_location( 'single' );
    $elementor_theme_manager->register_location( 'archive' );

}
add_action( 'elementor/theme/register_locations', 'wavo_register_elementor_locations' );
