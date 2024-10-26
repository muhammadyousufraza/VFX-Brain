<?php
/**
 * Functions which enhance the theme by hooking into WordPress
*/


/*************************************************
## ADMIN NOTICES
*************************************************/
add_action('admin_notices', 'wavo_theme_activation_notice');
function wavo_theme_activation_notice() {
    if (get_user_meta(get_current_user_id(), 'wavo-ignore-notice', true) == 'yes') {
        return;
    }
    $url = add_query_arg( 'wavo-ignore-notice', 'wavo_dismiss_admin_notices' );
    ?>
    <div class="updated notice notice-info is-dismissible wavo-admin-notice">
        <p><?php echo esc_html__( 'If you need help about demodata installation, please read docs and ', 'wavo' ); ?>
            <a target="_blank" href="<?php echo esc_url( 'https://ninetheme.com/contact/' ); ?>"><?php echo esc_html__( 'Open a ticket', 'wavo' ); ?></a>
            <?php echo esc_html__('or', 'wavo'); ?>
            <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html__( 'Dismiss this notice', 'wavo' ); ?></a>
            <button type="button" class="notice-dismiss hide-admin-notice"><span class="screen-reader-text"></span></button>
        </p>
    </div>
    <?php
}

add_action('admin_init', 'wavo_theme_activation_notice_ignore');
function wavo_theme_activation_notice_ignore() {
    if (isset($_GET['wavo-ignore-notice'])) {
        update_user_meta(get_current_user_id(), 'wavo-ignore-notice', 'yes');
    }
}

/*************************************************
## DATA CONTROL FROM THEME-OPTIONS PANEL
*************************************************/
if ( !function_exists( 'wavo_settings' ) ) {
    function wavo_settings( $opt_id, $def_value='' )
    {
        global $wavo;

        $defval = '' != $def_value ? $def_value : false;
        $opt_id = trim( $opt_id );
        $opt    = isset( $wavo[ $opt_id ] ) ? $wavo[ $opt_id ] : $defval;

        if ( !class_exists( 'Redux' ) ) {
            return $defval;
        } else {
            return $opt;
        }
    }
}

/*************************************************
## Sidebar function
*************************************************/
if ( ! function_exists( 'natrurally_sidebar' ) ) {
    function natrurally_sidebar( $sidebar='', $default='' )
    {
        $sidebar = trim( $sidebar );
        $default = is_active_sidebar( $default ) ? $default : false;
        $sidebar = is_active_sidebar( $sidebar ) ? $sidebar : $default;
        if ( $sidebar ) {
            return $sidebar;
        }
        return false;
    }
}

/************************************************************
## DATA CONTROL FROM PAGE METABOX OR ELEMENTOR PAGE SETTINGS
*************************************************************/
if ( !function_exists( 'wavo_page_settings' ) ) {
    function wavo_page_settings( $opt_id, $def_value='' )
    {
        $defval = '' != $def_value ? $def_value : false;
        $page_settings = $defval;

        if( $opt_id ) {

            $template = get_post_meta( get_the_ID(), '_wp_page_template', true );

            switch ( $template ) {
                case 'wavo-elementor-page.php':

                    if ( class_exists( '\Elementor\Core\Settings\Manager' ) ) {

                        // Get the page settings manager
                        $page_settings = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' )->get_model( get_the_ID() );
                        $page_settings = $page_settings->get_settings( 'wavo_elementor_'.trim( $opt_id ) );

                        if ( 'yes' == $page_settings || 'no' == $page_settings ) {

                            $page_settings = 'yes' == $page_settings ? '0' : '1';

                        } else {

                            $page_settings = $page_settings;

                        }
                    }

                break;

                case 'default':
                    if ( class_exists( 'ACF' ) && function_exists( 'get_field' ) ) {

                        $page_settings = get_field( 'wavo_'.trim( $opt_id ) );

                        if ( is_bool( $page_settings ) ) {

                            $page_settings = true === get_field( 'wavo_'.trim( $opt_id ) ) ? '0' : '1';

                        } else {

                            $page_settings = get_field( 'wavo_'.trim( $opt_id ) );

                        }
                    }
                    break;

                default:
                    $page_settings = $defval;
                break;
            }
            return $page_settings;

        } else {

            return $defval;

        }
    }
}

/*************************************************
## GET ELEMENTOR PAGE CUSTOM CSS
*************************************************/
if ( !function_exists( 'wavo_elementor_page_custom_css' ) ) {
    function wavo_elementor_page_custom_css()
    {
        $theCSS = get_option( '_wavo_elementor_page_custom_css' );
        if ($theCSS ) {
            wp_register_style( 'wavo-custom-page-style', false );
            wp_enqueue_style( 'wavo-custom-page-style' );
            wp_add_inline_style( 'wavo-custom-page-style', $theCSS );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'wavo_elementor_page_custom_css' );

/*************************************************
## GET ALL ELEMENTOR PAGE TEMPLATES
# @return array
*************************************************/
if ( !function_exists( 'wavo_get_elementorTemplates' ) ) {
    function wavo_get_elementorTemplates( $type = null )
    {
        if ( class_exists( '\Elementor\Frontend' ) ) {
            $args = [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
            ];
            if ( $type ) {
                $args[ 'tax_query' ] = [
                    [
                        'taxonomy' => 'elementor_library_type',
                        'field' => 'slug',
                        'terms' => $type
                    ]
                ];
            }
            $page_templates = get_posts( $args );
            $options = array();
            if ( !empty( $page_templates ) && !is_wp_error( $page_templates ) ) {
                foreach ( $page_templates as $post ) {
                    $options[ $post->ID ] = $post->post_title;
                }
            } else {
                $options = array(
                    '' => esc_html__( 'No template exist.', 'wavo' )
                );
            }
            return $options;
        }
    }
}

/*************************************************
## GET ELEMENTOR DEFAULT STYLE KIT ID
*************************************************/
if ( !function_exists( 'wavo_get_elementor_activeKit' ) ) {
    function wavo_get_elementor_activeKit( $type = null )
    {
        if ( class_exists( '\Elementor\Frontend' ) ) {

            $mypost = get_page_by_path('default-kit', '', 'elementor_library');
            return $post->ID;
        }
    }
}

/*************************************************
## CHECK IS ELEMENTOR
*************************************************/
if ( !function_exists( 'wavo_check_is_elementor' ) ) {
    function wavo_check_is_elementor()
    {
        global $post;
        if ( class_exists( '\Elementor\Plugin' ) ) {
            return \Elementor\Plugin::$instance->db->is_built_with_elementor( $post->ID );
        }
    }
}

/*************************************************
## CHECK IS POST
*************************************************/
if ( !function_exists( 'wavo_check_is_post' ) ) {
    function wavo_check_is_post()
    {
        if ( class_exists( '\Elementor\Plugin' ) ) {
            $selected_post = get_option( 'elementor_cpt_support' );
            if ( is_array( $selected_post ) ) {
                if ( in_array( 'post', $selected_post ) ) {
                    return true;
                }
            }
            return false;
        }
    }
}

/*************************************************
## CHECK ELEMENTOR STYLE KIT
*************************************************/
if ( !function_exists( 'wavo_get_elementor_style_kit' ) ) {
    add_action ( 'wp_head', 'wavo_get_elementor_style_kit' );
    function wavo_get_elementor_style_kit()
    {
        if ( class_exists( '\Elementor\Core\Kits\Manager' ) ) {
            if ( '1' == wavo_settings( 'use_elementor_style_kit', '0' ) ) {
                $kit = new \Elementor\Core\Kits\Manager;
                $kit->preview_enqueue_styles();
            }
        }
    }
}

/*************************************************
## WPML Compatibility for Header Footer Elementor.
*************************************************/
if ( !function_exists( 'wavo_get_wpml_object' ) ) {
   add_filter( 'wavo_render_template_id', 'wavo_get_wpml_object' );
   function wavo_get_wpml_object( $id ) {
       $translated_id = apply_filters( 'wpml_object_id', $id );

       if ( defined( 'POLYLANG_BASENAME' ) ) {

           if ( null === $translated_id ) {

               // The current language is not defined yet or translation is not available.
               return $id;
           } else {

               // Return translated post ID.
               return pll_get_post( $translated_id );
           }
       }

       if ( null === $translated_id ) {
           return $id;
       }

       return $translated_id;
   }
}

/*************************************************
## SANITIZE MODIFIED VC-ELEMENTS OUTPUT
*************************************************/
if ( !function_exists( 'wavo_sanitize_data' ) ) {
    function wavo_sanitize_data( $html_data )
    {
        return $html_data;
    }
}

/*************************************************
## SANITIZE MODIFIED VC-ELEMENTS OUTPUT
*************************************************/
if ( !function_exists( 'wavo_check_page_hero' ) ) {
    function wavo_check_page_hero()
    {
        if ( is_404() ) {

            $name = 'error';

        } elseif ( is_archive() ) {

            $name = 'archive';

        } elseif ( is_search() ) {

            $name = 'search';

        } elseif ( is_home() || is_front_page() ) {

            $name = 'blog';

        } elseif ( is_single() ) {

            $name = 'single';

        } elseif ( is_page() ) {

            $name = 'page';

        }
        $h_v = wavo_settings( $name.'_hero_visibility', '1' );
        $h_v = '0' == $h_v ? 'page-hero-off' : '';
        return $h_v;
    }
}

/*************************************************
## CUSTOM BODY CLASSES
*************************************************/
if ( !function_exists( 'wavo_body_theme_classes' ) ) {
    function wavo_body_theme_classes( $classes )
    {
        global $post,$is_IE, $is_safari, $is_chrome, $is_iphone;
        $dom_opt = get_option( 'elementor_experiment-e_dom_optimization' );
        $theme_name     = wp_get_theme();
        $theme_version  = 'nt-version-' . wp_get_theme()->get( 'Version' );
        $preloader_off  = '0' == wavo_settings( 'preloader_visibility', '1' ) ? 'preloader-off' : 'preloader-on';
        $preloader_type = 'default' == wavo_settings( 'pre_type', 'default' ) ? 'preloader-default' : '';
        $header_off     = '0' == wavo_settings( 'nav_visibility', '1' ) ? 'header-off' : '';
        $sidebar_menu_position_right = '1' == wavo_settings( 'nav_visibility', '1' ) && 'sidebarmenu' == wavo_settings( 'header_template', 'default' ) && 'right' == wavo_settings( 'sidebar_menu_position_right', '1' ) ? 'sidebar-menu-right' : '';
        $theme_skin     = is_page() ? wavo_page_settings( 'page_skin', 'light' ) : 'light';
        $dom_opt        = 'active' == $dom_opt ? 'wavo-dom-opt-'.$dom_opt : '';
        $hero_off       = wavo_check_page_hero();
        $has_block      = is_singular( 'post' ) && has_blocks() ? 'nt-single-has-block' : '';
        $has_thumb      = is_singular( 'post' ) && !has_post_thumbnail() ? 'nt-single-thumb-none' : '';
        $split_text     = '0' == wavo_settings( 'split_text_animation_visibility', '1' ) ? 'split-animation-none' : 'split-animation-enabled';
        $style_kit      = '1' == wavo_settings( 'use_elementor_style_kit', '0' ) ? 'use-elementor-style-kit' : '';
        $paragraph_style= '1' == wavo_settings( 'font_p_important', '0' ) ? 'has-paragraph-style' : '';
        $brwsr_msie     = $is_IE ? 'nt-msie' : '';
        $brwsr_chrome   = $is_chrome ? 'nt-chrome' : '';
        $dvc_iphone     = $is_iphone ? 'nt-iphone' : '';
        $dvc_mobile     = function_exists('wp_is_mobile') && wp_is_mobile() ? 'nt-mobile' : 'nt-desktop';

        $classes[] =  class_exists( 'WooCommerce' ) && ! is_cart() && ! is_account_page() ? 'nt-page-default' : '';
        $classes[] = $theme_name;
        $classes[] = $theme_version;
        $classes[] = $preloader_off;
        $classes[] = $preloader_type;
        $classes[] = $header_off;
        $classes[] = $theme_skin;
        $classes[] = $dom_opt;
        $classes[] = $hero_off;
        $classes[] = $has_block;
        $classes[] = $has_thumb;
        $classes[] = $split_text;
        $classes[] = $style_kit;
        $classes[] = $paragraph_style;
        $classes[] = $brwsr_msie;
        $classes[] = $brwsr_chrome;
        $classes[] = $dvc_mobile;
        $classes[] = $dvc_iphone;
        $classes[] = $sidebar_menu_position_right;

        return $classes;

    }
    add_filter( 'body_class', 'wavo_body_theme_classes' );
}

/*************************************************
## CUSTOM BODY CLASSES
*************************************************/
if ( !function_exists( 'wavo_html_theme_classes' ) ) {
    function wavo_html_theme_classes( $output, $doctype )
    {
        if ( 'html' !== $doctype ) {
            return $output;
        }

        $attributes = array();

        if ( function_exists( 'is_rtl' ) && is_rtl() ) {
            $attributes[] = 'dir="rtl"';
        }

        $lang = get_bloginfo( 'language' );
        if ( $lang ) {
            if ( 'text/html' === get_option( 'html_type' ) || 'html' === $doctype ) {
                $attributes[] = 'lang="' . esc_attr( $lang ) . '"';
            }

            if ( 'text/html' !== get_option( 'html_type' ) || 'xhtml' === $doctype ) {
                $attributes[] = 'xml:lang="' . esc_attr( $lang ) . '"';
            }
        }

        $template = basename( get_page_template() );
        if ( $template == 'locomotive-page.php' ) {
            $attributes[] = 'class="locomotive-page-scroll"';
        }

        $output = implode( ' ', $attributes );

        return $output;
    }
    add_filter( 'language_attributes', 'wavo_html_theme_classes', 10, 2 );
}
/*************************************************
## CUSTOM POST CLASS
*************************************************/
if ( !function_exists( 'wavo_post_theme_class' ) ) {
    function wavo_post_theme_class( $classes )
    {
        if ( ! is_single() AND ! is_page() ) {
            $classes[] =  'nt-post-class';
            $classes[] =  is_sticky() ? '-has-sticky ' : '';
            $classes[] =  !has_post_thumbnail() ? 'thumb-none' : '';
            $classes[] =  !get_the_title() ? 'title-none' : '';
            $classes[] =  !has_excerpt() ? 'excerpt-none' : '';
            $classes[] =  wavo_settings( 'format_box_type', '' );
            $classes[] =  wp_link_pages('echo=0') ? 'nt-is-wp-link-pages' : '';
        }
        return $classes;
    }
    add_filter( 'post_class', 'wavo_post_theme_class' );
}

/*************************************************
## THEME SEARCH FORM
*************************************************/
if ( !function_exists( 'wavo_content_custom_search_form' ) ) {
    function wavo_content_custom_search_form()
    {
        $pleace_holder = '' != wavo_settings( 'searchform_placeholder1' ) ? wavo_settings( 'searchform_placeholder1' ) : esc_html__( 'Search...', 'wavo' );
        $form = '<form class="wavo_search" role="search" method="get" id="content-widget-searchform" action="' . esc_url( home_url( '/' ) ) . '" >
        <input class="search_input" type="text" value="' . get_search_query() . '" placeholder="'. esc_attr( $pleace_holder ) .'" name="s" id="cws">
        <button class="error_search_button btn-curve btn-wit" id="contentsearchsubmit" type="submit"><span class="fa fa-search"></span></button>
        </form>';
        return $form;
    }
    add_filter( 'get_search_form', 'wavo_content_custom_search_form' );
}

/*************************************************
## THEME SIDEBARS SEARCH FORM
*************************************************/
if ( !function_exists( 'wavo_sidebar_search_form' ) ) {
    function wavo_sidebar_search_form()
    {
        $pleace_holder = '' != wavo_settings( 'searchform_placeholder2' ) ? wavo_settings( 'searchform_placeholder2' ) : esc_html__( 'Search for...', 'wavo' );
        $form = '<form class="sidebar_search" role="search" method="get" id="widget-searchform" action="' . esc_url( home_url( '/' ) ) . '" >
                    <input class="sidebar_search_input" type="text" value="' . get_search_query() . '" placeholder="'. esc_attr( $pleace_holder ) .'" name="s" id="ws">
                    <button class="sidebar_search_button btn-curve" id="searchsubmit" type="submit"><span class="fa fa-search"></span></button>
                </form>';
        return $form;
    }
    add_filter( 'get_product_search_form', 'wavo_sidebar_search_form' );
    add_filter( 'get_search_form', 'wavo_sidebar_search_form' );
}

/*************************************************
## THEME PASSWORD FORM
*************************************************/
if ( !function_exists( 'wavo_custom_password_form' ) ) {
    function wavo_custom_password_form()
    {
        global $post;
        $pleace_holder = '' != wavo_settings( 'searchform_placeholder3' ) ? wavo_settings( 'searchform_placeholder3' ) : esc_html__( 'Enter Password', 'wavo' );
        $form = '<form class="form_password" role="password" method="post" id="widget-searchform" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '"><input class="form_password_input" type="password" placeholder="'. esc_attr( $pleace_holder ) .'" name="post_password" id="ws"><button class="form_password_button btn-curve" id="submit" type="submit"><span class="fa fa-arrow-right"></span></button></form>';

        return $form;
    }
    add_filter( 'the_password_form', 'wavo_custom_password_form' );
}

/*************************************************
## EXCERPT FILTER
*************************************************/
if ( !function_exists( 'wavo_custom_excerpt_more' ) ) {
    function wavo_custom_excerpt_more( $more )
    {
        return '...';
    }
    add_filter( 'excerpt_more', 'wavo_custom_excerpt_more' );
}

/*************************************************
## EXCERPT LIMIT
*************************************************/
if ( !function_exists( 'wavo_excerpt_limit' ) ) {
    function wavo_excerpt_limit( $limit )
    {
        $excerpt = explode( ' ', get_the_excerpt(), $limit );
        if ( count( $excerpt ) >= $limit ) {
            array_pop( $excerpt );
            $excerpt = implode( " ", $excerpt ) . '...';
        } else {
            $excerpt = implode( " ", $excerpt );
        }
        $excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
        return $excerpt;
    }
}

/*************************************************
## DEFAULT CATEGORIES WIDGET
*************************************************/
if ( !function_exists( 'wavo_add_span_cat_count' ) ) {
    function wavo_add_span_cat_count( $links )
    {

        $links = str_replace( '</a> (', '</a> <span class="widget-list-span">', $links );
		$links = str_replace( '</a> <span class="count">(', '</a> <span class="widget-list-span">', $links );
        $links = str_replace( ')', '</span>', $links );

        return $links;

    }
    add_filter( 'wp_list_categories', 'wavo_add_span_cat_count' );
}

/*************************************************
## woocommerce_layered_nav_term_html WIDGET
*************************************************/
if ( !function_exists( 'wavo_add_span_woocommerce_layered_nav_term_html' ) ) {
    function wavo_add_span_woocommerce_layered_nav_term_html( $links )
    {

        $links = str_replace( '</a> (', '</a> <span class="widget-list-span">', $links );
        $links = str_replace( '</a> <span class="count">(', '</a> <span class="widget-list-span">', $links );
        $links = str_replace( ')', '</span>', $links );

        return $links;

    }
    add_filter( 'woocommerce_layered_nav_term_html', 'wavo_add_span_woocommerce_layered_nav_term_html' );
}

/*************************************************
## DEFAULT ARCHIVES WIDGET
*************************************************/
if ( !function_exists( 'wavo_add_span_arc_count' ) ) {
    function wavo_add_span_arc_count( $links )
    {
        $links = str_replace( '</a>&nbsp;(', '</a> <span class="widget-list-span">', $links );

        $links = str_replace( ')', '</span>', $links );

        // dropdown selectbox
        $links = str_replace( '&nbsp;(', ' - ', $links );

        return $links;

    }
    add_filter( 'get_archives_link', 'wavo_add_span_arc_count' );
}

/*************************************************
## PAGINATION CUSTOMIZATION
*************************************************/
if ( !function_exists( 'wavo_sanitize_pagination' ) ) {
    function wavo_sanitize_pagination( $content )
    {
        // remove role attribute
        $content = str_replace( 'role="navigation"', '', $content );

        // remove h2 tag
        $content = preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $content );

        return $content;

    }
    add_action( 'navigation_markup_template', 'wavo_sanitize_pagination' );
}

/*************************************************
## CUSTOM ARCHIVE TITLES
*************************************************/
if ( !function_exists( 'wavo_archive_title' ) ) {
    function wavo_archive_title()
    {
        $title = '';
        if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = get_the_author();
        } elseif ( is_year() ) {
            $title = get_the_date( _x( 'Y', 'yearly archives date format', 'wavo' ) );
        } elseif ( is_month() ) {
            $title = get_the_date( _x( 'F Y', 'monthly archives date format', 'wavo' ) );
        } elseif ( is_day() ) {
            $title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'wavo' ) );
        } elseif ( is_post_type_archive() ) {
            $title = post_type_archive_title( '', false );
        } elseif ( is_tax() ) {
            $title = single_term_title( '', false );
        }

        return $title;
    }
    add_filter( 'get_the_archive_title', 'wavo_archive_title' );
}

/*************************************************
## CHECKS TO SEE IF CPT EXISTS.
*************************************************/
/*
* By setting '_builtin' to false,
* we exclude the WordPress built-in public post types
* (post, page, attachment, revision, and nav_menu_item)
* and retrieve only registered custom public post types.
* return boolean
*/
if ( !function_exists( 'wavo_cpt_exists' ) ) {
    function wavo_cpt_exists()
    {

        $args = array(
           'public'   => true,
           '_builtin' => false
        );

        $output = 'names'; // 'names' or 'objects' (default: 'names')
        $operator = 'and'; // 'and' or 'or' (default: 'and')

        $post_types = get_post_types( $args, $output, $operator ); // get simple cpt if exists
        $classes = get_body_class();
        $cpt_exsits = array();

        if ( $post_types ) {
            foreach ( $post_types as $cpt ) {
                if ( is_single() ) {
                    array_push( $cpt_exsits, 'single-'.$cpt );
                }
                if ( is_archive() ) {
                    array_push( $cpt_exsits, 'post-type-archive-'.$cpt );
                }
            }
        }

        $sameclass = array_intersect( $cpt_exsits, $classes );

        if ( $sameclass ) {
            return true;
        }
        return false;
    }
}

/*************************************************
## CONVERT HEX TO RGB
*************************************************/

 if ( !function_exists( 'wavo_hex2rgb' ) ) {
     function wavo_hex2rgb( $hex )
     {
         $hex = str_replace( "#", "", $hex );

         if ( strlen( $hex ) == 3 ) {
             $r = hexdec( substr( $hex, 0, 1 ).substr( $hex, 0, 1 ) );
             $g = hexdec( substr( $hex, 1, 1 ).substr( $hex, 1, 1 ) );
             $b = hexdec(substr( $hex, 2, 1 ).substr( $hex, 2, 1 ) );
         } else {
             $r = hexdec( substr( $hex, 0, 2 ) );
             $g = hexdec( substr( $hex, 2, 2 ) );
             $b = hexdec( substr( $hex, 4, 2 ) );
         }
         $rgb = array( $r, $g, $b );

         return $rgb; // returns an array with the rgb values
     }
 }

/**********************************
## THEME ALLOWED HTML TAG
/**********************************/

if ( !function_exists( 'wavo_allowed_html' ) ) {
    function wavo_allowed_html()
    {
        $allowed_tags = array(
            'a' => array(
                'class' => array(),
                'href'  => array(),
                'rel'   => array(),
                'title' => array(),
                'target' => array()
            ),
            'abbr' => array(
                'title' => array()
            ),
            'address' => array(),
            'iframe' => array(
                'src' => array(),
                'frameborder' => array(),
                'allowfullscreen' => array(),
                'allow' => array(),
                'width' => array(),
                'height' => array(),
            ),
            'b' => array(),
            'br' => array(),
            'blockquote' => array(
                'cite'  => array()
            ),
            'cite' => array(
                'title' => array()
            ),
            'code' => array(),
            'del' => array(
                'datetime' => array(),
                'title' => array()
            ),
            'dd' => array(),
            'div' => array(
                'class' => array(),
                'id'    => array(),
                'title' => array(),
                'style' => array()
            ),
            'dl' => array(),
            'dt' => array(),
            'em' => array(),
            'h1' => array(
                'class' => array()
            ),
            'h2' => array(
                'class' => array()
            ),
            'h3' => array(
                'class' => array()
            ),
            'h4' => array(
                'class' => array()
            ),
            'h5' => array(
                'class' => array()
            ),
            'h6' => array(
                'class' => array()
            ),
            'i' => array(
                'class'  => array()
            ),
            'img' => array(
                'alt'    => array(),
                'class'  => array(),
                'width'  => array(),
                'height' => array(),
                'src'    => array(),
                'srcset' => array(),
                'sizes' => array()
            ),
            'li' => array(
                'class' => array()
            ),
            'ol' => array(
                'class' => array()
            ),
            'p' => array(
                'class' => array()
            ),
            'q' => array(
                'cite' => array(),
                'title' => array()
            ),
            'span' => array(
                'class' => array(),
                'title' => array(),
                'style' => array()
            ),
            'strike' => array(),
            'strong' => array(),
            'ul' => array(
                'class' => array()
            )
        );
        return $allowed_tags;
    }
}

if ( !function_exists( 'wavo_navmenu_choices' ) ) {
    function wavo_navmenu_choices()
    {
        $menus = wp_get_nav_menus();
        $options = array();
        if ( ! empty( $menus ) && ! is_wp_error( $menus ) ) {
            foreach ( $menus as $menu ) {
                $options[ $menu->slug ] = $menu->name;
            }
        }
        return $options;
    }
}

/*************************************************
## POPUP TEMPLATE
*************************************************/
if ( ! function_exists( 'wavo_print_popup_content' ) ) {
    add_action( 'wavo_before_wp_footer', 'wavo_print_popup_content', 10 );
    function wavo_print_popup_content()
    {
        if ( !class_exists( '\Elementor\Frontend' ) ) {
            return;
        }
        $args = [
            'post_type' => 'wavo_popups',
            'posts_per_page' => -1,
        ];
        $popup_templates = get_posts( $args );

        if ( !empty( $popup_templates ) && !is_wp_error( $popup_templates ) ) {
            wp_enqueue_style( 'magnific' );
            wp_enqueue_script( 'magnific' );
            foreach ( $popup_templates as $post ) {
                $id      = apply_filters( 'wavo_translated_template_id', intval( $post->ID ) );
                $name    =  $post->post_title;
                $content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $id, true );
                wp_deregister_style( 'elementor-post-' . $id );
                wp_dequeue_style( 'elementor-post-' . $id );
                printf( '<div class="wavo-popup-item zoom-anim-dialog mfp-hide" data-wavo-popup-name="%1$s" data-wavo-popup-id="%2$s" id="wavo-popup-%2$s">%3$s</div>',$name, $id, $content );
            }
        }
    }
}

add_action( 'wavo_after_body_open',function(){
    if ( '1' == wavo_settings( 'smoothscrollbar_visibility','0' ) ) {
        wp_enqueue_script( 'smoothScroll');
        $time = wavo_settings( 'scrollbar_animationtime', 400 );
        $step = wavo_settings( 'scrollbar_stepsize', 100 );
        $delta = wavo_settings( 'scrollbar_accelerationdelta', 50 );
        $max = wavo_settings( 'scrollbar_accelerationmax', 3 );
        echo '<main id="main-scrollbar" data-wavo-scrollbar=\'{"time":'.$time.',"step":'.$step.',"delta":'.$delta.',"max":'.$max.'}\'>';
    }
}, 10 );

add_action( 'wavo_before_wp_footer',function(){
    if ( '1' == wavo_settings( 'smoothscrollbar_visibility','0' ) ) {
        echo '</main>';
    }
}, 10 );

add_action( 'elementor/page_templates/canvas/before_content',function(){
    if ( '1' == wavo_settings( 'smoothscrollbar_visibility','0') && '1' == wavo_settings( 'canvas_smoothscrollbar_visibility','0' ) ) {
        wp_enqueue_script( 'smoothScroll');
        $time = wavo_settings( 'scrollbar_animationtime', 400 );
        $step = wavo_settings( 'scrollbar_stepsize', 100 );
        $delta = wavo_settings( 'scrollbar_accelerationdelta', 50 );
        $max = wavo_settings( 'scrollbar_accelerationmax', 3 );
        echo '<main id="main-scrollbar" data-wavo-scrollbar=\'{"time":'.$time.',"step":'.$step.',"delta":'.$delta.',"max":'.$max.'}\'>';
    }
}, 10 );
add_action( 'elementor/page_templates/canvas/after_content',function(){
    if ( '1' == wavo_settings( 'smoothscrollbar_visibility','0') && '1' == wavo_settings( 'canvas_smoothscrollbar_visibility','0' ) ) {
        echo '</main>';
    }
}, 10 );


add_action('admin_notices', 'wavo_notice_for_activation');
if (!function_exists('wavo_notice_for_activation')) {
    function wavo_notice_for_activation() {
        global $pagenow;

        if ( !get_option('envato_purchase_code_26552218') ) {

            echo '<div class="notice notice-warning">
                <p>' . sprintf(
                esc_html__( 'Enter your Envato Purchase Code to receive wavo Theme and plugin updates  %s', 'wavo' ),
                '<a href="' . admin_url('admin.php?page=merlin&step=license') . '">' . esc_html__( 'Enter Purchase Code', 'wavo' ) . '</a>') . '</p>
            </div>';
        }

    }
}

if ( isset($_GET['ntignore']) && esc_html($_GET['ntignore']) == 'yes' ) {
    add_option('envato_purchase_code_26552218','yes');
}

if ( !get_option('envato_purchase_code_26552218') ) {
    add_filter('auto_update_theme', '__return_false');
}

add_action('upgrader_process_complete', 'wavo_upgrade_function', 10, 2);
if ( !function_exists('wavo_upgrade_function') ) {
    function wavo_upgrade_function($upgrader_object, $options) {
        $purchase_code =  get_option('envato_purchase_code_26552218');

        if (($options['action'] == 'update' && $options['type'] == 'theme') && !$purchase_code) {
            wp_redirect(admin_url('admin.php?page=merlin&step=license'));
        }
    }
}

if ( !function_exists( 'wavo_is_theme_registered') ) {
    function wavo_is_theme_registered() {
        $purchase_code =  get_option('envato_purchase_code_26552218');
        $registered_by_purchase_code =  !empty($purchase_code);

        // Purchase code entered correctly.
        if ($registered_by_purchase_code) {
            return true;
        }
    }
}

function wavo_deactivate_envato_plugin() {
    if (  function_exists( 'envato_market' ) && !get_option('envato_purchase_code_26552218') ) {
        deactivate_plugins('envato-market/envato-market.php');
    }
}
add_action( 'admin_init', 'wavo_deactivate_envato_plugin' );
