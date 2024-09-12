<?php


/*************************************************
## Post Comment Customization
*************************************************/

if ( ! function_exists( 'wavo_custom_commentlist' ) ) {
    // Theme custom comment list
    function wavo_custom_commentlist($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class('nt-comment-item'); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>">
                <div class="nt-comment-left">
                    <div class="nt-comment-avatar">
                        <?php echo get_avatar( $comment, $size='80' ); ?>
                    </div>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php esc_html_e('Your comment is awaiting moderation.', 'wavo') ?></em>
                        <br />
                    <?php endif; ?>
                </div>
                <div class="nt-comment-right">
                    <div class="nt-comment-author comment__author-name">
                        <?php echo get_comment_author_link(); ?>
                    </div>
                    <div class="nt-comment-date">
                        <span class="post-meta__item __date-post">
                            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                                <?php printf(esc_html__('%1$s at %2$s', 'wavo'), get_comment_date(),  get_comment_time()) ?>
                            </a>
                            <?php edit_comment_link(esc_html__('(Edit)', 'wavo'),'  ','') ?>
                        </span>
                    </div>
                    <div class="nt-comment-content nt-theme-content nt-clearfix"><?php comment_text() ?></div>
                    <div class="nt-comment-date post-meta">
                        <div class="nt-comment-reply-content post-meta__item"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
                    </div>
                </div>
            </div>
        <?php
    }
}



// Unset URL from comment form
if ( ! function_exists( 'wavo_move_comment_form_below' ) ) {
    function wavo_move_comment_form_below( $fields ) {

        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;

        return $fields;

    }
    add_filter( 'comment_form_fields', 'wavo_move_comment_form_below' );
}



// Add placeholder for Name and Email
if ( ! function_exists( 'wavo_move_modify_comment_form_fields' ) ) {
    function wavo_move_modify_comment_form_fields($fields){

        $commenter     = wp_get_current_commenter();
        $user          = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';
        $req           = get_option( 'require_name_email' );
        $aria_req      = ( $req ? " aria-required='true'" : '' );
        $html_req      = ( $req ? " required='required'" : '' );
        $html5         = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : false;
        $consent       = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

        $fields['author'] = '<div class="row"><div class="col-md-4"><div class="form-group"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Enter your name ...', 'wavo' ) . '"' . $aria_req . ' required /></div></div>';

        $fields['email'] = '<div class="col-md-4"><div class="form-group"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Enter your e-mail ...', 'wavo' ) . '"' . $aria_req . ' required/></div></div>';

        $fields['url'] = '<div class="col-md-4"><div class="form-group"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'.esc_attr__( 'Enter your website ...', 'wavo'  ).'" required/></div></div></div>';

        $fields['cookies'] = '<div class="row"><div class="col-md-12"><div class="form-group wp-comment-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<span>' . esc_attr__( 'Save my name, email, and website in this browser for the next time I comment.', 'wavo' ) . '</span></div></div></div>';

        return $fields;
    }
    add_filter('comment_form_default_fields','wavo_move_modify_comment_form_fields');
}

if ( ! function_exists( 'wavo_modify_comment_form_text_area' ) ) {
    function wavo_modify_comment_form_text_area($arg) {
        $arg['comment_field'] = '<div class="row"><div class="col-md-12"><div class="form-group"><textarea id="comment" name="comment" cols="45" rows="6" aria-required="true" placeholder="' . esc_attr__( 'Enter your comment ...', 'wavo' ) . '"></textarea></div></div></div>';
        return $arg;
    }
    add_filter('comment_form_defaults', 'wavo_modify_comment_form_text_area');
}


// add class comment form button
if ( ! function_exists( 'wavo_addclass_form_button' ) ) {
    function wavo_addclass_form_button( $arg ) {
        $arg['class_submit'] = 'btn-curve btn-lg';
        return $arg;
    }
    // run the comment form defaults through the newly defined filter
    add_filter( 'comment_form_defaults', 'wavo_addclass_form_button' );
}
