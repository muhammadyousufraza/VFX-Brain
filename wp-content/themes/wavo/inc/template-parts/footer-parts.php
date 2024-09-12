<?php


/**
* Custom template parts for this theme.
*
* Eventually, some of the functionality here could be replaced by core features.
*
* @package wavo
*/


add_action( 'wavo_footer_action', 'wavo_footer', 10 );

if ( ! function_exists( 'wavo_footer' ) ) {
    function wavo_footer()
    {

        $footer_visibility = wavo_settings( 'footer_visibility', '1' );
        $page_footer_visibility = wavo_page_settings( 'hide_page_footer', '1' );
        $footer_visibility = '0' != $footer_visibility && is_page() ? $page_footer_visibility : $footer_visibility;

        $type = wavo_settings( 'footer_type', 'default' );

        if ( '0' != $footer_visibility ) {

            if ( 'elementor' == $type ) {

                if ( class_exists( '\Elementor\Frontend' ) && !empty( wavo_settings( 'footer_elementor_templates' ) ) ) {

                    $template_id = apply_filters( 'wavo_render_template_id', intval( wavo_settings( 'footer_elementor_templates' ) ) );
                    $frontend = new \Elementor\Frontend;
                    printf( '%1$s', $frontend->get_builder_content( $template_id, false ) );

                }

            } else {

                wavo_copyright();

            }
        }
    }
}


/*************************************************
##  FOOTER COPYRIGHT
*************************************************/

if ( ! function_exists( 'wavo_copyright' ) ) {
    function wavo_copyright()
    {
        $left_visibility = wavo_settings( 'footer_copyright_left_visibility', '1' );
        $right_visibility = wavo_settings( 'footer_copyright_right_visibility', '1' );
        $left_align = '0' == $right_visibility ? wavo_settings( 'footer_copyright_left_align', 'left' ) : 'left';
        $right_align = '0' == $left_visibility ? wavo_settings( 'footer_copyright_right_align', 'right' ) : 'right';
        $left_attr = '0' != $right_visibility ? 'col-lg-6 col-md-4' : 'col-sm-12';
        $right_attr = '0' != $left_visibility ? 'col-lg-6 col-md-8' : 'col-sm-12';
        ?>
        <footer id="nt-footer" class="footer-sm">
            <div class="container">
                <div class="row">

                    <?php if ( '0' != $left_visibility ) { ?>
                        <div class="<?php echo esc_attr( $left_attr ); ?>">
                            <div class="<?php echo esc_attr( $left_align ); ?>">
                                <?php if ( '' != wavo_settings( 'footer_copyright_left' ) ) { ?>

                                    <p><?php echo wp_kses( wavo_settings( 'footer_copyright_left' ), wavo_allowed_html() ); ?></p>

                                <?php } else { ?>

                                    <p><?php esc_html_e('All rights reserved', 'wavo'); ?></p>

                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ( '0' != $right_visibility ) { ?>
                        <div class="<?php echo esc_attr( $right_attr ); ?>">
                            <div class="<?php echo esc_attr( $right_align ); ?>">

                                <?php if ( '' != wavo_settings( 'footer_copyright_right' ) ) { ?>

                                    <?php echo wp_kses( wavo_settings( 'footer_copyright_right' ), wavo_allowed_html() ); ?>

                                <?php } else {
                                    echo sprintf( '<p>&copy; %1$s, <a class="theme" href="%2$s">%3$s</a> Template. %4$s <a class="dev" href="https://ninetheme.com/contact/"> %5$s</a></p>',
                                        date_i18n( _x( 'Y', 'copyright date format', 'wavo' ) ),
                                        esc_url( home_url( '/' ) ),
                                        get_bloginfo( 'name' ),
                                        esc_html__( 'Made with passion by', 'wavo' ),
                                        esc_html__( 'Ninetheme.', 'wavo' )
                                    );
                                } ?>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </footer>

        <?php
    }
}
