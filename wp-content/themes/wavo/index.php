<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WordPress
* @subpackage Wavo
* @since 1.0.0
*/

    get_header();

    do_action( 'wavo_before_index' );

// Elementor `archive` location
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {

    $index_type       = wavo_settings( 'index_type', 'default' );
    $index_container  = 'fluid' == wavo_settings( 'index_container_type', 'boxed' )? 'container-fluid' : 'container';
    $index_wrap       = 'grid' == $index_type ? 'grid' : 'pg';
    $wavo_layout      = wavo_settings( 'index_layout', 'right-sidebar' );
    $wavo_column      = !is_active_sidebar('sidebar-1') || 'full-width' == $wavo_layout ? 'col-lg-10' : 'col-lg-8';
    $theme_skin       = wavo_settings( 'theme_skin', 'dark' );

    ?>
    <!-- container -->
    <div id="nt-index" class="nt-index">

        <!-- Hero section - this function using on all inner pages -->
        <?php wavo_hero_section(); ?>

        <div class="nt-theme-inner-container nt-blog-<?php echo esc_attr( $index_wrap ); ?> section-padding">
            <div class="<?php echo esc_attr( $index_container ); ?>">
                <div class="row justify-content-center">

                    <!-- left sidebar -->
                    <?php
                        if ( is_active_sidebar( 'sidebar-1' ) && 'left-sidebar' == $wavo_layout ) {
                            get_sidebar();
                        }
                    ?>
                    <!-- End left sidebar -->

                    <!-- Sidebar column control -->
                    <div class="<?php echo esc_attr( $wavo_column ); ?>">

                        <div class="posts">
                            <?php
                                if ( 'grid' == $index_type ) {
                                    echo '<div class="row mb-n-50">';
                                }

                                    if ( have_posts() ) {

                                        while ( have_posts() ) : the_post();

                                        // if there are posts, run wavo_post_style_one function
                                        // contain supported post formats from theme
                                        if ( 'grid' == $index_type ) {

                                            wavo_post_style_one();

                                        } else {

                                            wavo_post_style_two();
                                        }

                                    endwhile;

                                // this function working with wp reading settins + posts
                                wavo_index_loop_pagination();

                                if ( 'grid' == $index_type ) {
                                    echo '</div>';
                                }

                            } else {

                                // if there are no posts, read content none function
                                wavo_content_none();

                            }
                            ?>

                        </div>
                    </div>
                    <!-- End content column -->

                    <!-- right sidebar -->
                    <?php
                        if ( is_active_sidebar( 'sidebar-1' ) && 'right-sidebar' == $wavo_layout ) {
                            get_sidebar();
                        }
                    ?>
                    <!-- End right sidebar -->

                </div><!--End row -->
            </div><!--End container -->
        </div><!--End #blog -->
    </div><!--End index general div -->
    <?php
}
    // you can use this action to add any content after index page
    do_action( 'wavo_after_index' );

    get_footer();

?>
