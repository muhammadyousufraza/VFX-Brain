<?php

/*
Template name: Locomotive Template
*/

if ( class_exists( '\Elementor\Core\Settings\Manager' ) ) {
    $page_settings = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' )->get_model( get_the_ID() );
    $header = $page_settings->get_settings( 'wavo_elementor_hide_page_header' );
    if ( 'yes' == $header ) {
        remove_action( 'wavo_header_action', 'wavo_main_header', 10 );
    }
}

get_header();
wp_enqueue_script('masonry');
wp_enqueue_style( 'locomotive-scroll' );
wp_enqueue_script( 'polyfill' );
wp_enqueue_script( 'locomotive-scroll' );
wp_enqueue_script( 'locomotive-main');
wp_enqueue_script( 'pace');
wp_enqueue_script( 'smoothScroll');

?>
<div class="nt-locomotive-wrapper">

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    endif;
    ?>

</div>

<?php remove_action( 'wavo_footer_action', 'wavo_footer', 10 ); ?>
<?php get_footer(); ?>
