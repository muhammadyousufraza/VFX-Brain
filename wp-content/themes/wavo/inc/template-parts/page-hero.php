<?php

/*************************************************
## HERO FUNCTION
*************************************************/

if ( ! function_exists( 'wavo_hero_section' ) ) {
    function wavo_hero_section()
    {
        $h_s = get_bloginfo( 'description' );
        $h_t = get_bloginfo( 'name' ) . ' ' .esc_html__( 'Blog', 'wavo' );
        $page_id = '';

        if ( is_404() ) { // error page

            $name = 'error';
            $h_t = esc_html__( '404 - Not Found', 'wavo' );

        } elseif ( is_archive() ) { // blog and cpt archive page

            $name = 'archive';
            $h_t = get_the_archive_title();

        } elseif ( is_search() ) { // search page

            $name = 'search';
            $h_t = esc_html__( 'Search results for :', 'wavo' );

        } elseif ( is_home() || is_front_page() ) { // blog post loop page index.php or your choise on settings

            $name = 'blog';
            $h_t = esc_html( wavo_settings( 'blog_title', $h_t ) );

        } elseif ( is_single() && ! is_singular( 'portfolio' ) ) { // blog post single/singular page

            $name = 'single';
            $h_t = esc_html( wavo_settings( 'blog_title', $h_t ) );

        } elseif ( is_singular( 'portfolio' ) ) { // it is cpt and if you want use another clone this condition and add your cpt name as portfolio

            $name = 'single_portfolio';
            $h_t = get_the_title();

        } elseif ( is_page() ) {	// default or custom page

            $name = 'page';
            $h_t = get_the_title();
            $page_id = ' page-'.get_the_ID();

        }

        if( is_page() && class_exists('ACF') ){

            $h_v = true === get_field('wavo_hide_page_hero') ? '0' : '1';
            $h_v = null == $h_v ? '1' : $h_v;
            $h_all = get_field('wavo_page_hero_customize');
            // site title
            $h_s = !empty($h_all["wavo_page_hero_text_customize"]["wavo_page_subtitle"]) ? $h_all["wavo_page_hero_text_customize"]["wavo_page_subtitle"] : '';
            // page title
            $h_t = !empty($h_all["wavo_page_hero_text_customize"]["wavo_page_title"]) ? $h_all["wavo_page_hero_text_customize"]["wavo_page_title"] : $h_t;
            // page breadcrumbs
            $h_b = !empty($h_all["wavo_page_hero_text_customize"]["wavo_page_bread_visibility"]) ? $h_all["wavo_page_hero_text_customize"]["wavo_page_bread_visibility"] : '0';

        } else {

            $h_v = wavo_settings( $name.'_hero_visibility', '1' );
            // site title
            $h_s = wavo_settings( $name.'_site_title', $h_s );
            // page title
            $h_t = wavo_settings( $name.'_title', $h_t ) ? wavo_settings( $name.'_title', $h_t ) : $h_t;
            // page breadcrumbs
            $h_b = wavo_settings( 'breadcrumbs_visibility', '1' );

        }

        $tag = wavo_settings( 'blog_title_tag', 'h1' );

        do_action( 'wavo_before_hero_action' );

        if ( '0' != $h_v ) { ?>

            <div class="page-header text-center<?php echo esc_attr( $page_id ); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="cont">

                                <?php

                                    do_action( 'wavo_before_page_title' );

                                    if ( $h_t ) {

                                        if ( is_search() ) {

                                            printf( '<div class="text-bg">%s</div>',
                                                strlen( get_search_query() ) > 16 ? substr( get_search_query(), 0, 16 ).'...' : get_search_query()
                                            );

                                        } else {

                                            printf( '<div class="text-bg">%s</div>',wp_kses( $h_t, wavo_allowed_html() ) );

                                        }

                                        printf( '<'.$tag.' class="nt-hero-title extra-title mb-10">%s %s</'.$tag.'>',
                                            wp_kses( $h_t, wavo_allowed_html()),
                                            strlen( get_search_query() ) > 16 ? substr( get_search_query(), 0, 16 ).'...' : get_search_query()
                                        );

                                    } else {

                                        if ( !is_search() || !is_archive() ) {
                                            the_title('<div class="text-bg">', '</div>');
                                        }

                                        the_title('<'.$tag.' class="nt-hero-title extra-title mb-10">', '</'.$tag.'>');
                                    }

                                    do_action( 'wavo_after_page_title' );

                                    if ( $h_s ) {

                                        printf( '<div class="nt-hero-desc">%s</div>', wp_kses( $h_s, wavo_allowed_html() ) );
                                    }

                                    if ( '1' == $h_b ) {
                                        echo wavo_breadcrumbs();
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } // hide hero area
        do_action( 'wavo_after_hero_action' );
    }
}
