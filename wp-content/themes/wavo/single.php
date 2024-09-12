<?php

/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Wavo
* @since 1.0.0
*/

    get_header();

    // Elementor `single` location
    if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
        // you can use this action to add any content before single page
        do_action( 'wavo_before_post_single' );
        $wavo_layout  = wavo_settings( 'single_layout', 'full-width' );

        if ( wavo_check_is_elementor() && wavo_check_is_post() ) {

            while ( have_posts() ) {

                the_post();

                the_content();

            }

        } else {

            if ( 'full-width' != $wavo_layout ) {

                wavo_single_layout_sidebar();

            } else {

                wavo_single_layout_fullwidth();

            }
        }

        // you can use this action to add any content before single page
        do_action( 'wavo_after_post_single' );
    }

    get_footer();
?>
