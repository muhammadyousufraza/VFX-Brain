<?php

/*
** WooCommerce shop/product listing page
*/

    get_header();

    do_action("wavo_before_woo_shop_page");

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {

    $active = is_active_sidebar( 'shop-page-sidebar' );
    $shop_layout = apply_filters('wavo_shop_layout', wavo_settings( 'shop_layout', 'right-sidebar' ) );
    $container_width = wavo_settings( 'shop_container_width', '' );
    $res_column = '';
    $res_column .= wavo_settings( 'shop_md_column' ) ? ' res-md-col-'.wavo_settings( 'shop_md_column' ) : '';
    $res_column .= wavo_settings( 'shop_sm_column' ) ? ' res-sm-col-'.wavo_settings( 'shop_sm_column' ) : '';
    $sidebar_column = ( 'left-sidebar' == $shop_layout || 'right-sidebar' == $shop_layout ) && is_active_sidebar( 'shop-page-sidebar' ) ? 'col-lg-9' : 'col-lg-12';
    ?>

    <!-- Woo shop page general div -->
    <div id="nt-shop-page" class="nt-shop-page<?php echo esc_attr( $res_column ); ?>">

        <!-- Hero section - this function using on all inner pages -->
        <?php wavo_woo_hero_section(); ?>

        <div class="nt-theme-inner-container section-padding">
            <div class="container<?php echo esc_attr( $container_width ); ?>">
                <div class="row">

                    <!-- Left sidebar -->
                    <?php if ( 'left-sidebar' == $shop_layout && is_active_sidebar( 'shop-page-sidebar' ) ) {
                        echo '<div class="col-lg-3">';
                            dynamic_sidebar( 'shop-page-sidebar' );
                        echo '</div>';
                    } ?>

                    <!-- Sidebar none -->
                    <div class="<?php echo esc_attr($sidebar_column); ?>">
                        <?php
                        woocommerce_content();
                        wavo_index_loop_pagination();
                        ?>
                    </div>
                    <!-- End sidebar + content -->

                    <!-- Right sidebar -->
                    <?php
                    if ( 'right-sidebar' == $shop_layout && is_active_sidebar( 'shop-page-sidebar' ) ) {
                        echo '<div class="col-lg-3">';
                            dynamic_sidebar( 'shop-page-sidebar' );
                        echo '</div>';
                    }
                    ?>

                </div><!-- End row -->
            </div><!-- End container -->
        </div><!-- End #blog -->
    </div><!-- End woo shop page general div -->
    <?php
}
    do_action("wavo_after_woo_shop_page");

    get_footer();

?>
