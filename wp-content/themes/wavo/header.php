<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php
    $meta_theme_color = wavo_settings( 'theme_mobile_app_clr2', '' );
    $meta_theme_color = $meta_theme_color ? $meta_theme_color : wavo_settings( 'theme_main_clr', '#056EB9' );
    ?>
    <!-- Meta UTF8 charset -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui" />
    <meta name="theme-color" content="<?php echo esc_attr( $meta_theme_color ); ?>" />
    <meta name="msapplication-navbutton-color" content="<?php echo wavo_settings( 'theme_mobile_app_clr', '#7AA300' ); ?>" />
    <meta name="apple-mobile-web-app-status-bar-style" content="<?php echo wavo_settings( 'theme_mobile_app_clr', '#056EB9' ); ?>" />
    <?php wp_head(); ?>

</head>

<!-- BODY START -->
<body <?php body_class(); ?>>

    <?php

        if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open();
        }

        do_action( 'wavo_after_body_open' );

        // theme preloader
        wavo_preloader();

        // Elementor `header` location
        if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {

            // include logo, menu and more contents
            do_action('wavo_header_action');

        }

        // theme back to top button
        wavo_backtop();

    ?>
