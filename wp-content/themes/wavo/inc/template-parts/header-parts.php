<?php

/**
 * Custom template parts for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wavo
*/


/*************************************************
##  LOGO
*************************************************/

if ( ! function_exists( 'wavo_logo' ) ) {
    function wavo_logo()
    {
        $logo = wavo_settings( 'logo_type', 'sitename' );
        $logo_mobile = wavo_settings( 'img_logo_mobile' );
        $sticky_logo = wavo_settings( 'img_logo_sticky' );
        $logo_attr = $logo;
        $logo_attr .= !empty($logo_mobile['url']) ? ' has-mobile-logo' : '';
        $logo_attr .= !empty( $sticky_logo['url'] ) ? ' has-sticky-logo' : '';
        if ( '0' != wavo_settings( 'split_text_animation_visibility' ) ) {
            wp_enqueue_style( 'splitting' );
            wp_enqueue_style( 'splitting-cells' );
            wp_enqueue_script( 'splitting' );
        }

        if ( '0' != wavo_settings( 'logo_visibility', '1' ) ) { ?>

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="nt-logo" class="header_logo logo-type-<?php echo esc_attr( $logo_attr ); ?>">

                <?php if ( 'img' == $logo && '' != wavo_settings( 'img_logo' ) ) { ?>

                    <img  class="main-logo" src="<?php echo esc_url( wavo_settings( 'img_logo' )[ 'url' ] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
                    <?php if ( !empty( $sticky_logo['url'] ) ) { ?>
                        <img class="sticky-logo" src="<?php echo esc_url( wavo_settings( 'img_logo_sticky' )[ 'url' ] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
                    <?php } ?>
                    <?php if ( !empty($logo_mobile['url']) ) { ?>
                        <img class="mobile-logo" src="<?php echo esc_url( wavo_settings( 'img_logo_mobile' )[ 'url' ] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
                    <?php } ?>

                <?php } elseif ( 'sitename' == $logo ) {?>

                    <span class="headline_title text" data-splitting><?php bloginfo( 'name' ); ?></span>

                <?php } elseif ( 'customtext' == $logo ) { ?>

                    <span class="headline_title text" data-splitting><?php echo wavo_settings( 'text_logo' ); ?></span>

                <?php } else { ?>

                    <span class="headline_title text" data-splitting> <?php bloginfo( 'name' ); ?> </span>

                <?php } ?>
            </a>
            <?php
        }
    }
}


/*************************************************
##  HEADER NAVIGATION
*************************************************/

if ( ! function_exists( 'wavo_main_header' ) ) {
    add_action( 'wavo_header_action', 'wavo_main_header', 10 );
    function wavo_main_header()
    {

        $nav_template = wavo_settings( 'header_template', 'default' );
        $nav_visibility = wavo_settings( 'nav_visibility', '1' );
        $defaultmenu = wavo_settings( 'default_menu', '1' );
        $nav_sticky_visibility = wavo_settings( 'nav_sticky_visibility', '1' );
        $sticky_direction = wavo_settings( 'nav_top_sticky_direction', 'default' );
        $contact_visibility = wavo_settings( 'nav_contact_visibility', '0' );
        $nav_contact_type = wavo_settings( 'nav_contact_type', 'default' );
        $search_visibility = wavo_settings( 'nav_search_visibility', '1' );
        $contact_details = wavo_settings( 'nav_contact', '1' );
        $lang_visibility = wavo_settings( 'nav_lang_visibility', '0' );
        $overlay_direction = wavo_settings( 'nav_overlay_direction', 'left' );
        $trigger_position = ' trigger-'.wavo_settings( 'nav_overlay_trigger_position', 'right' );
        $nav_skin = '';
        $menu_title = wavo_settings( 'nav_menu_title', 'Menu' );
        $has_menu_title = $menu_title ? ' has-menu-title' : '';
        $sticky_direction = 'bottom' == $sticky_direction ? ' scroll-bt' : '';
        $nav_sticky_visibility = '0' == $nav_sticky_visibility ? ' sticky-header-off' : '';
        $reverse_go_back_icon = '1' == wavo_settings( 'reverse_go_back_icon', '0' ) ? ' reverse-go-back' : '';
        $menu_col_lg = wavo_settings( 'header_left_column_lg', 9 );
        $contact_col_lg = $menu_col_lg ? ( 12 - $menu_col_lg ) : 3;
        $menu_col_md = wavo_settings( 'header_left_column_md', 8 );
        $contact_col_md = $menu_col_md ? ( 12 - $menu_col_md ) : 4;
        $use_wpml_lang_switcher = function_exists( 'icl_get_languages' ) && '1' == wavo_settings( 'use_wpml_lang_switcher', '0' ) ? ' use-wpml-lang-switcher' : '';

        if ( class_exists( '\Elementor\Core\Settings\Manager' ) ) {
            $page_settings = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' )->get_model( get_the_ID() );
            $nav_skin = ' '.$page_settings->get_settings( 'wavo_elementor_page_nav_skin' );
        }

        if ( '0' != $nav_visibility ) {

            if ( 'elementor' == $nav_template ) {

                if ( class_exists( '\Elementor\Frontend' ) ) {

                    if ( !empty( wavo_settings( 'header_elementor_templates' ) ) ) {

                        $page_settings = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' )->get_model( get_the_ID() );
                        $pageh_template = $page_settings->get_settings( 'wavo_elementor_page_header_template' );

                        $template_id = '' != $pageh_template ? $pageh_template : apply_filters( 'wavo_render_template_id', intval( wavo_settings( 'header_elementor_templates' ) ) );
                        $frontend = new \Elementor\Frontend;
                        printf( '%1$s', $frontend->get_builder_content( $template_id, false ) );

                    } else {

                        echo sprintf('<p class="copyright text-center ptb-40">%s <a class="button btn-curve" href="%s"><span class="button_text">%s</span></a></p>',
                            esc_html__('No template exist for header.', 'wavo'),
                            admin_url( 'edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section' ),
                            esc_html__('Add new section template.', 'wavo')
                        );
                    }
                }

            } elseif ( 'sidebarmenu' == $nav_template ) {

                wavo_sidebarmenu();

            } else { ?>

                <div id="navi" class="topnav<?php echo esc_attr( $nav_skin.$sticky_direction.$nav_sticky_visibility.$use_wpml_lang_switcher.$trigger_position ); ?>">
                    <div class="container-fluid">

                        <div class="logo">
                            <?php wavo_logo(); ?>
                        </div>

                        <?php

                        if ( '1' == $lang_visibility ) {
                            if ( has_action( 'wpml_add_language_selector' ) ) {
                                do_action('wpml_add_language_selector');
                            } else {
                                wavo_header_lang();
                            }
                        }

                        $burger_type = wavo_settings( 'burger_type', 'default' );

                        if ( 'default' != $burger_type ) { ?>

                            <div class="hamburger <?php echo esc_attr( $burger_type.$has_menu_title ); ?>">
                              <div class="hamburger-box">
                                <span class="hamburger-inner"></span>
                                <?php if ( $menu_title ) { ?>
                                    <span class="text" data-splitting>
                                        <span class="word" data-word="<?php echo esc_attr( $menu_title ); ?>"><?php echo esc_html( $menu_title ); ?></span>
                                    </span>
                                <?php } ?>
                              </div>
                            </div>

                        <?php } else { ?>

                            <div class="menu-icon">
                                <span class="icon"><i></i><i></i></span>
                                <?php if ( $menu_title ) { ?>
                                    <span class="text" data-splitting>
                                        <span class="word" data-word="<?php echo esc_attr( $menu_title ); ?>"><?php echo esc_html( $menu_title ); ?></span>
                                    </span>
                                <?php } ?>
                            </div>

                        <?php } ?>

                    </div>
                </div>

                <div class="hamenu<?php echo esc_attr( $reverse_go_back_icon ); ?>" id="hamenu" data-position="<?php echo esc_attr( $overlay_direction ); ?>">
                    <div class="<?php echo wavo_settings( 'header_container_width', 'container' ); ?>">
                        <div class="row">
                            <?php if ( '0' != $contact_visibility && $contact_details ) { ?>
                            <div class="col-lg-<?php echo esc_attr( $menu_col_lg ); ?> col-md-<?php echo esc_attr( $menu_col_md ); ?>">
                            <?php } else { ?>
                            <div class="col-12">
                            <?php } ?>
                                <div class="menu-links">
                                    <ul class="main-menu">
                                        <?php
                                            wp_nav_menu(
                                                array(
                                                    'menu' => '',
                                                    'theme_location' => 'header_menu',
                                                    'container' => '',
                                                    'container_class' => '',
                                                    'container_id' => '',
                                                    'menu_class' => '',
                                                    'menu_id' => '',
                                                    'items_wrap' => '%3$s',
                                                    'before' => '',
                                                    'after' => '',
                                                    'link_before' => '',
                                                    'link_after' => '',
                                                    'depth' => 5,
                                                    'echo' => true,
                                                    'fallback_cb' => 'Wavo_Menu_Navwalker::fallback',
                                                    'walker' => new Wavo_Menu_Navwalker()
                                                )
                                            );
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?php if ( '0' != $contact_visibility ) { ?>
                                <?php if ( 'default' != $nav_contact_type ) { ?>
                                    <div class="col-lg-<?php echo esc_attr( $contact_col_lg ); ?> col-md-<?php echo esc_attr( $contact_col_md ); ?>">
                                        <div class="cont-info">
                                            <?php if ( 'widget' == $nav_contact_type && is_active_sidebar( 'header-info' ) ) { ?>
                                                <?php dynamic_sidebar( 'header-info' ); ?>
                                            <?php } elseif ( 'elementor' == $nav_contact_type ) {
                                                $ctemplate_id = apply_filters( 'wavo_render_template_id', intval( wavo_settings( 'nav_contact_elementor_templates' ) ) );
                                                $frontend = new \Elementor\Frontend;
                                                printf( '%1$s', $frontend->get_builder_content( $ctemplate_id, false ) );
                                            }
                                            if ( '0' != $search_visibility ) { ?>
                                                <div class="item">
                                                    <?php echo wavo_content_custom_search_form(); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <?php if ( $contact_details ) { ?>
                                        <div class="col-lg-<?php echo esc_attr( $contact_col_lg ); ?> col-md-<?php echo esc_attr( $contact_col_md ); ?>">
                                            <div class="cont-info">
                                                <?php echo do_shortcode( $contact_details ); ?>
                                                <?php if ( '0' != $search_visibility ) { ?>
                                                    <div class="item"><?php echo wavo_content_custom_search_form(); ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                        if ( '0' != wavo_settings( 'nav_copyright_visibility', '1' ) ) {
                            if ( '' != wavo_settings( 'nav_copyright' ) ) {
                                printf( '<div class="item header-footer">%1$s</div>',
                                    wp_kses( wavo_settings( 'nav_copyright' ), wavo_allowed_html() )
                                );
                            } else {
                                if ( '' != wavo_settings( 'footer_copyright_right' ) ) {

                                    printf( '<div class="item header-footer">%1$s</div>',
                                        wp_kses( wavo_settings( 'footer_copyright_right' ), wavo_allowed_html() )
                                    );
                                }
                            }
                        }
                    ?>
                </div>
                <?php
            }
        }
    }
}

if ( ! function_exists( 'wavo_sidebarmenu' ) ) {
    function wavo_sidebarmenu()
    {
        $search_visibility = wavo_settings( 'nav_search_visibility', '1' );
        $position = 'right' == wavo_settings( 'sidebar_menu_position_right', 'default' ) ? ' position-right' : '';
        ?>
        <div class="sidebarmenu--header-wrapper<?php echo esc_attr( $position ); ?>">
            <div class="sidebarmenu--headertop mobile--header">
                <?php wavo_logo(); ?>
                <div class="sidebarmenu--hamburger-menu mobile--hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <aside id="nt--header" class="sidebarmenu--navigation">
                <div class="hamenu">
                    <div class="menu-links">
                        <ul class="main-menu">
                            <?php wp_nav_menu(
                                array(
                                    'menu' => '',
                                    'theme_location' => 'header_menu',
                                    'container' => '', // menu wrapper element
                                    'container_class' => '',
                                    'container_id' => '', // default: none
                                    'menu_class' => '', // ul class
                                    'menu_id' => '', // ul id
                                    'items_wrap' => '%3$s',
                                    'before' => '', // before <a>
                                    'after' => '', // after <a>
                                    'link_before' => '', // inside <a>, before text
                                    'link_after' => '', // inside <a>, after text
                                    'depth' => 5, // '0' to display all depths
                                    'echo' => true,
                                    'fallback_cb' => 'Wavo_Menu_Navwalker::fallback',
                                    'walker' => new Wavo_Menu_Navwalker()
                                )
                            );
                            ?>
                        </ul>
                    </div>
                </div>

            </aside>

            <?php if ( '0' != $search_visibility ) { ?>
                <div class="sidebarmenu--search-box">
                    <h2><?php esc_html_e('SEARCH', 'wavo'); ?></h2>
                    <?php echo wavo_content_custom_search_form(); ?>
                </div>
            <?php } ?>

            <aside class="sidebarmenu--main-side">
                <div class="sidebarmenu--hamburger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <?php if ( '' != wavo_settings( 'nav_sidebarmenu_title', '' ) ) { ?>
                    <div class="menu-title"><?php echo wavo_settings( 'nav_sidebarmenu_title', '' ); ?></div>
                <?php } ?>

                <ul class="sidebarmenu--social-media">
                <?php echo wavo_settings( 'sidebarmenu_social', '' ); ?>
                </ul>

                <?php if ( '0' != $search_visibility ) { ?>
                    <div class="sidebarmenu--search">
                        <i class="sidebarmenu--search-open">
                            <svg version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512.005 512.005"
                            style="enable-background:new 0 0 512.005 512.005;"
                            xml:space="preserve">
                            <path d="M508.885,493.784L353.109,338.008c32.341-35.925,52.224-83.285,52.224-135.339c0-111.744-90.923-202.667-202.667-202.667
                            S0,90.925,0,202.669s90.923,202.667,202.667,202.667c52.053,0,99.413-19.883,135.339-52.245l155.776,155.776
                            c2.091,2.091,4.821,3.136,7.552,3.136c2.731,0,5.461-1.045,7.552-3.115C513.045,504.707,513.045,497.965,508.885,493.784z
                            M202.667,384.003c-99.989,0-181.333-81.344-181.333-181.333S102.677,21.336,202.667,21.336S384,102.68,384,202.669
                            S302.656,384.003,202.667,384.003z"/>
                            </svg>
                        </i>
                        <i class="sidebarmenu--search-close">
                            <svg xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            version="1.1" x="0px" y="0px"
                            viewBox="0 0 496.096 496.096"
                            style="enable-background:new 0 0 496.096 496.096;"
                            xml:space="preserve">
                            <path d="M259.41,247.998L493.754,13.654c3.123-3.124,3.123-8.188,0-11.312c-3.124-3.123-8.188-3.123-11.312,0L248.098,236.686
                            L13.754,2.342C10.576-0.727,5.512-0.639,2.442,2.539c-2.994,3.1-2.994,8.015,0,11.115l234.344,234.344L2.442,482.342
                            c-3.178,3.07-3.266,8.134-0.196,11.312s8.134,3.266,11.312,0.196c0.067-0.064,0.132-0.13,0.196-0.196L248.098,259.31
                            l234.344,234.344c3.178,3.07,8.242,2.982,11.312-0.196c2.995-3.1,2.995-8.016,0-11.116L259.41,247.998z"/>
                            </svg>
                        </i>
                    </div>
                <?php } ?>
            </aside>
        </div>
        <?php
    }
}
if ( !function_exists( 'wavo_header_lang' ) ) {
    function wavo_header_lang() {

        if ( function_exists( 'pll_the_languages' ) ) {
            ?>
            <ul class="lang-select">

                <li class="lang-item active">
                    <i class="fa fa-globe lang-icon"></i>
                    <?php echo pll_current_language( 'flag' ); ?>
                    <span class="uppercase"><?php echo pll_current_language('name'); ?></span>
                    <i class="fa fa-angle-down lang-arrow"></i>
                </li>
                <li>
                    <ul class="sub-list">
                        <?php
                        pll_the_languages(
                            array(
                                'show_flags'=>1,
                                'show_names'=>1,
                                'dropdown'=>0,
                                'raw'=>0,
                                'hide_current'=>1,
                                'display_names_as'=>'name'
                            )
                        );
                        ?>
                    </ul>
                </li>
            </ul>
            <?php
        } else {
            ?>
            <ul class="lang-select">
                <li class="lang-item active">
                    <i class="fa fa-globe lang-icon"></i>
                    <span class="uppercase">EN</span>
                    <i class="fa fa-angle-down lang-arrow"></i>
                </li>
                <li>
                    <ul class="sub-list">
                        <li class="sub-lang-item"><a href="#0">TR</a></li>
                        <li class="sub-lang-item"><a href="#0">KD</a></li>
                        <li class="sub-lang-item"><a href="#0">AR</a></li>
                    </ul>
                </li>
            </ul>
            <?php
        }
    }
}


if ( !function_exists( 'wavo_wpml_lang_selector' ) ) {
    add_action('wpml_add_language_selector', 'wavo_wpml_lang_selector' );
    function wavo_wpml_lang_selector() {

        if ( !function_exists( 'icl_get_languages' ) || '1' != wavo_settings( 'use_wpml_lang_switcher', '0' ) ) {
            return;
        }

        $languages = icl_get_languages('skip_missing=0&orderby=code');
        $actives = '';
        $inactives = '';

        if ( !empty( $languages ) ) {
            echo '<ul class="lang-select">';
            foreach( $languages as $l ) {

                if ( $l['active'] ) {
                    $actives .= '<i class="fa fa-globe lang-icon"></i>';
                    $actives .= '<span class="uppercase"><a title="' . $l['native_name'] .'" href="'.$l['url'].'">' . $l['language_code'] . '</a></span>';
                    $actives .= '<i class="fa fa-angle-down lang-arrow"></i>';
                } else {
                    $inactives.= '<li class="sub-lang-item"><a class="uppercase" title="' . $l['native_name'] .'" href="'.$l['url'].'">' . $l['language_code'] . '</a></li>';
                }
            }
            echo '<li class="lang-item active">'.$actives.'</li>';
            echo '<li><ul class="sub-list">'.$inactives.'</ul></li>';
            echo '</ul>';
        }
    }
}
