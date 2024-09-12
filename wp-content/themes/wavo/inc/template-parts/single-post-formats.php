<?php




if ( ! function_exists( 'wavo_single_layout_fullwidth' ) ) {

    function wavo_single_layout_fullwidth()
    {
        wp_enqueue_script( 'parallaxie' );
        ?>

        <!-- Single page general div -->
        <div id="nt-single" class="nt-single">

            <?php wavo_single_post_header(); ?>

            <div class="nt-blog-pg single section-padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11">
                            <div class="post nt-theme-content">

                                <?php wavo_post_format(); ?>

                                <div class="content">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                            <div class="cont">
                                                <?php
                                                    while ( have_posts() ) :

                                                        the_post();

                                                        the_content();

                                                        wavo_wp_link_pages();

                                                    endwhile; // End of the loop.

                                                    wavo_single_post_tags();

                                                    wavo_single_post_author_box();

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php wavo_single_navigation(); ?>

                                <?php wavo_single_post_comment_template(); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php wavo_single_post_related(); ?>

            </div>

        </div>
        <!--End single page general div -->

        <?php
    }
}

if ( ! function_exists( 'wavo_single_layout_sidebar' ) ) {

    function wavo_single_layout_sidebar()
    {
        wp_enqueue_script( 'parallaxie' );
        $wavo_layout  = wavo_settings( 'single_layout', 'right-sidebar' );
        $wavo_sidebar = natrurally_sidebar( 'wavo-single-sidebar', 'sidebar-1' );
        $wavo_column  = natrurally_sidebar( 'wavo-single-sidebar', 'sidebar-1' ) ? ' col-lg-8' : 'col-lg-10';

        ?>

        <!-- Single page general div -->
        <div id="nt-single" class="nt-single">

            <?php wavo_single_post_header(); ?>

            <div class="nt-blog-pg single section-padding pt-0">
                <div class="container">

                    <div class="row justify-content-lg-center">

                        <?php if ( 'left-sidebar' == $wavo_layout && $wavo_sidebar ) { ?>
                            <div id="nt-sidebar" class="nt-sidebar col-12 col-lg-4 pl-lg-5">
                                <div class="blog-sidebar nt-sidebar-inner">

                                    <?php dynamic_sidebar( $wavo_sidebar ); ?>

                                </div>
                            </div>
                        <?php } ?>

                        <div class="<?php echo esc_attr( $wavo_column ); ?>">
                            <div class="post">

                                <?php wavo_post_format(); ?>

                                <div class="content nt-theme-content">
                                    <div class="cont">
                                        <?php
                                            while ( have_posts() ) :

                                                the_post();

                                                the_content();

                                                wavo_wp_link_pages();

                                            endwhile; // End of the loop.

                                            wavo_single_post_tags();

                                            echo wavo_single_post_author_box();

                                        ?>
                                    </div>

                                    <?php wavo_single_navigation(); ?>

                                    <?php wavo_single_post_comment_template(); ?>

                                </div>
                            </div>
                        </div>

                        <?php if ( 'right-sidebar' == $wavo_layout && $wavo_sidebar ) { ?>
                            <div id="nt-sidebar" class="nt-sidebar col-12 col-lg-4 pl-lg-5">
                                <div class="blog-sidebar nt-sidebar-inner">

                                    <?php dynamic_sidebar( $wavo_sidebar ); ?>

                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <?php wavo_single_post_related(); ?>

            </div>

        </div>
        <!--End single page general div -->

        <?php
    }
}


if ( ! function_exists( 'wavo_single_post_header' ) ) {

    function wavo_single_post_header()
    {
        $separator = '/';
        $hero_visibility = wavo_settings( 'single_hero_visibility', '1' );
        $hero_post_meta = wavo_settings( 'single_hero_postmeta_visibility', '1' );
        $use_elementor = wavo_settings( 'use_elementor_for_single_hero', '0' );
        ?>
        <?php
        if ( '1' == $use_elementor ) {

            if ( class_exists( '\Elementor\Frontend' ) ) {

                if ( !empty( wavo_settings( 'single_hero_elementor_templates' ) ) ) {

                    $template_id = wavo_settings( 'single_hero_elementor_templates' );
                    $frontend = new \Elementor\Frontend;

                    printf( '%1$s', $frontend->get_builder_content( (int)$template_id, false ) );

                } else {
                    printf( '<p class="info text-center ptb-40"><i class="fa fa-info mb-10"></i> %s <a class="btn-curve btn-lg mt-20" href="%s"><span class="button_text">%s</span></a></p>',
                        esc_html__( 'No template exist for the hero.', 'wavo' ),
                        admin_url( 'edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section' ),
                        esc_html__( 'Add new section template.', 'wavo' )
                    );
                }
            }
        } else {
            ?>
            <?php if ( '0' != $hero_visibility ) { ?>
            <div class="page-header blg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-9">
                            <div class="cont text-center">
                                <?php wavo_single_post_header_title(); ?>
                                <?php if ( '0' != $hero_post_meta ) { ?>
                                    <div class="info">
                                        <p><?php
                                            wavo_post_meta_author();
                                            echo esc_attr( $separator );
                                            wavo_post_meta_date();
                                            if ( has_category() ) {
                                                echo esc_attr( $separator );
                                                wavo_post_meta_categories();
                                            }
                                        ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
        }
    }
}


if ( ! function_exists( 'wavo_single_post_header_title' ) ) {

    function wavo_single_post_header_title()
    {
        $tag = wavo_settings( 'single_hero_title_tag', 'h2' );
        the_title( '<'.$tag.'>', '</'.$tag.'>' );
    }
}


if ( ! function_exists( 'wavo_single_post_formats_content' ) ) {

    function wavo_single_post_formats_content()
    {
        if ( has_post_thumbnail() ) {

            wavo_post_format();
        }
    }
}


if ( ! function_exists( 'wavo_single_post_tags' ) ) {

    function wavo_single_post_tags()
    {
        if ( '0' != wavo_settings('single_postmeta_tags_visibility', '1' ) && has_tag() ) {
        ?>
            <div class="share-info">
                <div class="tags"> <i class="fa fa-tag" aria-hidden="true"></i> <?php the_tags('', ',', ''); ?> </div>
            </div>
        <?php
        }
    }
}


if ( ! function_exists( 'wavo_single_post_comment_template' ) ) {

    function wavo_single_post_comment_template()
    {

        if ( comments_open() || '0' != get_comments_number() ) {

            comments_template();

        }
    }
}


if ( ! function_exists( 'wavo_post_meta_categories' ) ) {

    function wavo_post_meta_categories()
    {
        if ( '0' != wavo_settings('post_category_visibility', '1' ) && has_category() ) {
            the_category(',');
        }
    }
}


if ( ! function_exists( 'wavo_post_meta_date' ) ) {

    function wavo_post_meta_date()
    {
        $archive_year = get_the_time( 'Y' );
        $archive_month = get_the_time( 'm' );
        $archive_day = get_the_time( 'd' );
        ?>

        <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>

        <?php
    }
}

if ( ! function_exists( 'wavo_post_meta_author' ) ) {

    function wavo_post_meta_author()
    {
        global $post;
        $author_id = $post->post_author;
        $author_link = get_author_posts_url( $author_id );
        ?>

        <a href="<?php echo esc_url( $author_link ); ?>"><?php the_author_meta( 'display_name', $post->post_author ); ?></a>

        <?php
    }
}


if ( ! function_exists( 'wavo_post_meta_comment_number' ) ) {

    function wavo_post_meta_comment_number()
    {
        ?>
        <a href="<?php echo get_comments_link( get_the_ID() ); ?>">
            <?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'wavo' ), number_format_i18n( get_comments_number() ) ); ?>
        </a>
        <?php
    }
}


/*************************************************
##  POST FORMAT
*************************************************/

if ( ! function_exists( 'wavo_post_format' ) ) {

    function wavo_post_format()
    {
        if ( '0' == wavo_settings('single_thumb_visibility', '1' ) ) {
            return;
        }
        // post format
        $format = get_post_format();
        $format = $format ? $format : 'standard';

        // post format: video or audio embed
        if ( 'video' == $format || 'audio' == $format ) {

            wavo_single_post_format_embed();

        // post format: gallery
        } elseif ( 'gallery' == $format ) {

            wavo_single_post_format_gallery();

        // post format: quote
        } elseif ( 'quote' == $format ) {

            wavo_single_post_format_quote();

        // post format: link
        } elseif ( 'link' == $format ) {

            wavo_single_post_format_link();

        // post format: standart
        } else {

            if ( has_post_thumbnail() ) {
                $size = wavo_settings('single_thumb_imgsize', 'full' );
                if ( '0' == wavo_settings('single_parallax_thumb', '1' ) ) {
                    echo '<div class="post-img-wrapper">'.get_the_post_thumbnail( get_the_ID(), $size ).'</div>';
                } else {
                    $thumb = wp_get_attachment_url( get_post_thumbnail_id(), $size );
                    ?>
                    <div class="img bg-img parallaxie" data-wavo-background="<?php echo esc_url( $thumb ); ?>"></div>
                    <?php
                }
            }
        } // end post format
    }
}

/*************************************************
## POST FORMAT : VIDEO OR AUDIO EMBED
*************************************************/
if ( ! function_exists( 'wavo_single_post_format_embed' ) ) {

    function wavo_single_post_format_embed()
    {
        $post = get_post(get_the_ID());
        $content = apply_filters('the_content', $post->post_content);
        $embed = get_media_embedded_in_content($content, array( 'video', 'object', 'embed', 'iframe', 'audio'  ));
        $iframe = class_exists('ACF') && function_exists('get_field') ? get_field('wavo_media_embed') : '';

        if ($iframe ) {
            $format = get_post_format();
            $iframe_format = 'audio' == $format ? 'audio' : 'video';

            // Use preg_match to find iframe src.
            preg_match('/src="(.+?)"/', $iframe, $matches);
            $src = $matches[1];

            // Add extra parameters to src and replcae HTML.
            $params = array(
                'controls'  => 0,
                'hd'        => 1,
                'autohide'  => 1
            );
            $new_src = add_query_arg($params, $src);
            $iframe = str_replace($src, $new_src, $iframe);

            // Add extra attributes to iframe HTML.
            $attributes = 'audio' == $format ? 'allow="autoplay"' : 'frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen';
            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
        ?>

            <div class="blog-single_media_<?php echo esc_attr( $iframe_format ); ?>"><?php echo wp_kses( $iframe, wavo_allowed_html() ); ?></div>

        <?php } else {

            if (false === strpos($content, 'wp-playlist-script') ) {
                // If not a single post, highlight the video file.
                if (! empty($embed)) {
                    foreach ($embed as $embed_html) { ?>
                        <div class="blog-single_media_video"><?php echo wp_kses( $embed_html, wavo_allowed_html() ); ?></div>
                        <?php
                    }
                }
            }
        }
    }
}


/*************************************************
## POST FORMAT : GALLERY
*************************************************/
if ( ! function_exists( 'wavo_single_post_format_gallery' ) ) {

    function wavo_single_post_format_gallery()
    {
        $images = get_post_meta( get_the_ID(), 'wavo_post_gallery' );

        //$images = is_array( $images ) ? explode( ',', $images[0]) : $images;

        if ( $images ) { ?>

            <div class="blog-single_media_gallery">
                <div class="slick-slider text-center">

                    <?php foreach ( $images as $image ) { ?>

                        <div class="slick-slide">
                            <span class="aspect-ratio is-2x1">

                                <?php if ( function_exists( 'wavo_aq_resize' ) ) {

                                    $blankimg = get_template_directory_uri().'/images/blank.gif';
                                    $srcset1 = wavo_aq_resize( wp_get_attachment_url( $image, 'full' ), 1200, 600, true, true, true );
                                    $srcset2 = wavo_aq_resize( wp_get_attachment_url( $image, 'full' ), 2400, 1200, true, true, true );
                                    $imagealt = esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true));

                                ?>

                                    <img class="aspect-ratio_object lazyload"
                                    src="<?php echo esc_url( $blankimg );?>"
                                    data-srcset="<?php echo esc_url( $srcset1 ); ?> 1x, <?php echo esc_url( $srcset2 ); ?> 2x"
                                    alt="<?php echo esc_attr( $imagealt ); ?>">

                                <?php
                                } else {

                                    the_post_thumbnail( 'wavo-single', array( 'class' => 'aspect-ratio_object lazyload' ) );

                                }
                                ?>

                            </span>
                        </div>

                    <?php } ?>

                </div>
            </div>
        <?php
        }
    }
}


/*************************************************
## POST FORMAT : QUOTE
*************************************************/
if ( ! function_exists( 'wavo_single_post_format_quote' ) ) {

    function wavo_single_post_format_quote()
    {

        $quote_text = $quote_author = '';
        if ( class_exists( 'ACF' ) && function_exists( 'get_field' ) ) {
            $quote_text = get_field('wavo_format_quote_text');
            $quote_author = get_field('wavo_format_quote_author');
        }

        if ( $quote_text ) { ?>

            <div class="blog-single_media_quote">
                <blockquote>

                    <p><?php echo esc_html( $quote_text ); ?></p>

                    <?php if ( $quote_author ) { ?>
                        <footer><cite title="<?php echo esc_attr( $quote_author ); ?>">- <?php echo esc_html( $quote_author ); ?></cite></footer>
                    <?php } ?>

                </blockquote>
            </div>

        <?php
        }
    }
}


/*************************************************
## POST FORMAT : LINK
*************************************************/
if (! function_exists( 'wavo_single_post_format_link' ) ) {

    function wavo_single_post_format_link()
    {
        $thumb_url = get_the_post_thumbnail_url();
        $thumb_url = function_exists('wavo_aq_resize') ? wavo_aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), 1200, 600, true, true, true ) : $thumb_url;
        $link_title = $link_url = '';
        if ( class_exists('ACF') && function_exists('get_field') ) {
            $link_title = get_field('wavo_format_link_title');
            $link_url = get_field('wavo_format_link_url');
        }

        if ( $link_title || $link_url ) { ?>

            <div class="blog-single_media_link" data-wavo-background="<?php echo esc_url( $thumb_url ); ?>">
                <div class="blog-single_media_link_inner">

                    <?php if ( $link_title ) { ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" class="blog-single_media_link_title"><?php echo esc_html( $link_title ); ?></a>
                    <?php } ?>

                    <?php if ( $link_url ) { ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" class="blog-single_media_link_url"><?php echo esc_html( $link_url ); ?></a>
                    <?php } ?>

                </div>
            </div>

        <?php
        }
    }
}


/*************************************************
## SINGLE POST AUTHOR BOX FUNCTION
*************************************************/

if (! function_exists('wavo_single_post_author_box')) {

    function wavo_single_post_author_box()
    {
        global $post;
        if ('0' != wavo_settings('single_post_author_box_visibility', '1')) {
            // Get author's display name
            $display_name = get_the_author_meta('display_name', $post->post_author);
            // If display name is not available then use nickname as display name
            $display_name = empty($display_name) ? get_the_author_meta('nickname', $post->post_author) : $display_name ;
            // Get author's biographical information or description
            $user_description = get_the_author_meta('user_description', $post->post_author);
            // Get author's website URL
            $user_website = get_the_author_meta('url', $post->post_author);
            // Get link to the author archive page
            $user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));
            // Get the rest of the author links. These are stored in the
            // wp_usermeta table by the key assigned in wpse_user_contactmethods()
            $author_facebook = get_the_author_meta('facebook', $post->post_author);
            $author_twitter  = get_the_author_meta('twitter', $post->post_author);
            $author_instagram  = get_the_author_meta('instagram', $post->post_author);
            $author_linkedin = get_the_author_meta('linkedin', $post->post_author);
            $author_youtube  = get_the_author_meta('youtube', $post->post_author);

            if ('' != $user_description) { ?>

                <div class="author">
                    <div class="author-img">
                        <?php if ( function_exists( 'get_avatar' ) ) {
                            echo get_avatar( get_the_author_meta( 'email' ), '140');
                        } ?>
                    </div>
                    <div class="info">
                        <h6><span><?php echo esc_html_e( 'author', 'wavo' ); ?>: </span> <?php echo esc_html( $display_name ); ?></h6>
                        <p><?php echo esc_html($user_description); ?></p>

                        <div class="social">
                            <?php if ('' != $author_facebook) { ?>
                                <a class="social-icons_link" href="<?php echo esc_url($author_facebook); ?>" target="_blank"><span class="fab fa-facebook-f"></span></a>
                            <?php } ?>
                            <?php if ('' != $author_twitter) { ?>
                                <a class="social-icons_link" href="<?php echo esc_url($author_twitter); ?>" target="_blank"><span class="fab fa-twitter"></span></a>
                            <?php } ?>
                            <?php if ('' != $author_instagram) { ?>
                                <a class="social-icons_link" href="<?php echo esc_url($author_instagram); ?>" target="_blank"><span class="fab fa-instagram"></span></a>
                            <?php } ?>
                            <?php if ('' != $author_linkedin) { ?>
                                <a class="social-icons_link" href="<?php echo esc_url($author_linkedin); ?>" target="_blank"><span class="fab fa-linkedin"></span></a>
                            <?php } ?>
                            <?php if ('' != $author_youtube) { ?>
                                <a class="social-icons_link" href="<?php echo esc_url($author_youtube); ?>" target="_blank"><span class="ifab fa-youtube"></span></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
}


/*************************************************
## SINGLE POST RELATED POSTS
*************************************************/

if ( ! function_exists( 'wavo_single_post_related' ) ) {

    function wavo_single_post_related()
    {
        global $post;
        $wavo_post_type = get_post_type( $post->ID );

        if ( '0' != wavo_settings( 'single_related_visibility', '0' ) && 'post' == $wavo_post_type ) {

            $cats = get_the_category( $post->ID );
            $args = array(
                'post__not_in' => array( $post->ID ),
                'posts_per_page' => wavo_settings( 'related_perpage', 6 )
            );

            $pattern = get_template_directory().'/images/pattern.svg';
            $pattern = file_exists( $pattern ) ? get_template_directory_uri().'/images/pattern.svg' : '';
            $pattern = false == wavo_settings( 'single_related_bg_pattern' ) ? apply_filters('wavo_single_related_pattern_bg', $pattern ) : '';
            $pattern_class = false == wavo_settings( 'single_related_bg_pattern' ) ? ' no-cover bg-pattern' : 'bg-pattern-custom';
            $size    = array( 450, 300 );
            $size    = apply_filters('wavo_single_related_image_size', $size );
            $bgtitle_v    = wavo_settings('related_bgtitle_visibility', '1' );

            $related_query = new WP_Query( $args );

            if ( $related_query->have_posts() ) {

                if ( '0' != wavo_settings( 'split_text_animation_visibility' ) ) {
                    wp_enqueue_style( 'splitting' );
                    wp_enqueue_style( 'splitting-cells' );
                    wp_enqueue_script( 'splitting' );
                }

                wp_enqueue_style( 'wavo-swiper' );
                wp_enqueue_script( 'wavo-swiper' );
                ?>

                <?php if ( '1' == wavo_settings( 'single_related_post_style', '1' ) ) { ?>
                <div class="work-carousel ptb-120 bg-img nt-related-post">
                    <div class="stories bg-img <?php echo esc_attr( $pattern_class ); ?>" data-wavo-background="<?php echo esc_url( $pattern ); ?>"></div>
                <?php } else { ?>
                <div class="work-carousel ptb-120 nt-related-post">
                <?php } ?>
                    <?php if ( '1' == wavo_settings( 'related_bgtitle_visibility', '1' ) ) { ?>
                        <?php if ( '' != wavo_settings( 'related_bgtitle', '' ) ) { ?>
                            <div class="text-bg"><?php echo wavo_settings( 'related_bgtitle' ); ?></div>
                        <?php } else { ?>
                            <div class="text-bg"><?php echo esc_html_e( 'Awesome Works', 'wavo' ); ?></div>
                        <?php } ?>
                    <?php } ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <div class="section-head">
                                    <?php if ( '1' == wavo_settings( 'related_subtitle_visibility', '1' ) ) { ?>
                                        <?php if ( '' != wavo_settings( 'related_subtitle', '' ) ) { ?>
                                            <h6 class="wow" data-splitting><?php echo wavo_settings( 'related_subtitle' ); ?></h6>
                                        <?php } else { ?>
                                            <h6 class="wow" data-splitting><?php echo esc_html_e( 'Awesome Works', 'wavo' ); ?></h6>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ( '1' == wavo_settings( 'related_title_visibility', '1' ) ) { ?>
                                        <?php if ( '' != wavo_settings( 'related_title', '' ) ) { ?>
                                            <h3 class="wow" data-splitting><?php echo wavo_settings( 'related_title' ); ?></h3>
                                        <?php } else { ?>
                                            <h3 class="wow" data-splitting><?php echo esc_html_e( 'Related Posts', 'wavo' ); ?></h3>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ( '1' == wavo_settings( 'single_related_post_style', '1' ) ) { ?>
                        <div class="nt-blog-grid ptb-0">

                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 no-padding">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                            <?php
                                                while( $related_query->have_posts() ) {

                                                    $related_query->the_post();
                                                    ?>
                                                    <div class="swiper-slide">
                                                        <div class="item">
                                                            <?php if ( has_post_thumbnail() ) { ?>
                                                                <div class="post-img">
                                                                    <div class="img">
                                                                        <?php echo get_the_post_thumbnail( get_the_ID(), $size ); ?>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="cont">
                                                                <div class="info">
                                                                    <?php wavo_post_meta_author(); ?>
                                                                    <?php wavo_post_meta_date(); ?>
                                                                </div>

                                                                <h5><?php printf( '<a href="%s" title="%s">%s</a>',
                                                                    get_permalink(),
                                                                    the_title_attribute( 'echo=0' ),
                                                                    get_the_title()
                                                                );
                                                                ?></h5>

                                                                <?php
                                                                    printf( '<a  class="more" href="%s" title="%s"><span>%s<i class="icofont-caret-right"></i></span></a>',
                                                                        get_permalink(),
                                                                        the_title_attribute( 'echo=0' ),
                                                                        esc_html__( 'Read More', 'wavo' )
                                                                    );
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            ?>
                                            </div>
                                            <!-- slider setting -->
                                            <div class="swiper-button-next swiper-nav-ctrl next-ctrl"><i class="ion-ios-arrow-right"></i></div>
                                            <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl"><i class="ion-ios-arrow-left"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else { ?>

                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 no-padding">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php
                                                while( $related_query->have_posts() ) {

                                                    $related_query->the_post();
                                                    if ( has_post_thumbnail() ) {
                                                        $thumb_url = get_the_post_thumbnail_url();
                                                        ?>
                                                        <div class="swiper-slide">
                                                            <div class="content">
                                                                <div class="img">
                                                                    <span class="imgio">
                                                                        <div class="wow cimgio" data-delay="100"></div>
                                                                        <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo the_title_attribute( 'echo=0' ); ?>">
                                                                    </span>
                                                                </div>
                                                                <div class="cont">
                                                                    <?php if ( has_category() ) { ?>
                                                                        <h6><?php the_category(' & '); ?></h6>
                                                                    <?php } ?>
                                                                    <h4><?php printf( '<a href="%s" title="%s">%s</a>',
                                                                        get_permalink(),
                                                                        the_title_attribute( 'echo=0' ),
                                                                        get_the_title()
                                                                    ); ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <!-- slider setting -->
                                        <div class="swiper-button-next swiper-nav-ctrl next-ctrl"><i class="ion-ios-arrow-right"></i></div>
                                        <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl"><i class="ion-ios-arrow-left"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
                <?php
                wp_reset_postdata();
            }
        }
    }
}
