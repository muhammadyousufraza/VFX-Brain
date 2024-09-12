<?php
        /**
        * The template for displaying the footer.
        *
        * Contains the closing of the #content div and all content after
        *
        * @package wavo
        */

        do_action( 'wavo_before_main_footer' );


        // Elementor `footer` location
        if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
            /**
            * Hook: wavo_footer_action.
            *
            * @hooked wavo_footer_widgetize - 10
            * @hooked wavo_copyright - 20
            */
            do_action( 'wavo_footer_action' );
        }

        do_action( 'wavo_after_main_footer' );

        do_action( 'wavo_before_wp_footer' );

        wp_footer();

    ?>

    </body>
</html>
