<?php

add_action('powerman_display_after_footer', 'powerman_display_newsletter_bottom',100);

function powerman_display_newsletter_bottom(){
    $blogBottom = powerman_check_is_blog_page();
    if (!$blogBottom){
        if (powerman_get_option('footer_settings_show_newsletter','yes') == 'yes'){
            echo do_shortcode('[box_mailchimp]');
        }
    }else{
        if (powerman_get_option('blog_settings_footer_nws','off') == 'on') {
            echo do_shortcode('[box_mailchimp]');
        }
    }

}

function powerman_display_newsletter_subscribe(){
    if (powerman_get_option('blog_settings_footer_nws','off') == 'on'){
        if (!isset(get_queried_object()->post_type))
            return false;
        if (!in_array(get_queried_object()->post_type,array('post','page')))
            return false;
        if (get_queried_object()->ID != get_option( 'page_for_posts' ) && get_queried_object()->post_type == 'page')
            return false;
        echo "<div class='text-white' style='background-color: #ff8300 !important;
    margin-bottom: -35px !important;'>";
        echo do_shortcode('[vc_row ppadding="vc_row-no-padding"][vc_column][box_mailchimp][/vc_column][/vc_row]');
        echo "</div>";
    }
}


function powerman_check_is_blog_page(){
    if (!isset(get_queried_object()->post_type))
        return false;
    if (!in_array(get_queried_object()->post_type,array('post','page')))
        return false;
    if (get_queried_object()->ID != get_option( 'page_for_posts' ) && get_queried_object()->post_type == 'page')
        return false;
    return true;
}




function powerman_comment_form($args = array(), $post_id = null){
    if ( null === $post_id )
        $post_id = get_the_ID();

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $args = wp_parse_args( $args );
    if ( ! isset( $args['format'] ) )
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required='required'" : '' );
    $html5    = 'html5' === $args['format'];
    $fields   =  array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name','powerman' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
        'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email','powerman' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
        'url'    => '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website','powerman' ) . '</label> ' .
            '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
    );

    $required_text = sprintf( ' ' . esc_html__('Required fields are marked %s','powerman'), '<span class="required">*</span>' );

    /**
     * Filter the default comment form fields.
     *
     * @since 3.0.0
     *
     * @param array $fields The default comment fields.
     */
    $fields = apply_filters( 'comment_form_default_fields', $fields );
    $defaults = array(
        'fields'               => $fields,
        'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'powerman' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></p>',
        /** This filter is documented in wp-includes/link-template.php */
        'must_log_in'          => '<p class="must-log-in">' . sprintf( esc_html__( 'You must be <a href="%s">logged in</a> to post a comment.','powerman' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        /** This filter is documented in wp-includes/link-template.php */
        'logged_in_as'         => '<p class="logged-in-as">' . sprintf( esc_html__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','powerman' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . esc_html__( 'Your email address will not be published.','powerman' ) . '</span>'. ( $req ? $required_text : '' ) . '</p>',
        'comment_notes_after'  => '',
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'class_submit'         => 'submit',
        'name_submit'          => 'submit',
        'title_reply'          => esc_html__( 'Leave a Reply','powerman' ),
        'title_reply_to'       => esc_html__( 'Leave a Reply to %s','powerman' ),
        'cancel_reply_link'    => esc_html__( 'Cancel reply','powerman' ),
        'label_submit'         => esc_html__( 'Post Comment','powerman' ),
        'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
        'format'               => 'xhtml',
    );

    /**
     * Filter the comment form default arguments.
     *
     * Use 'comment_form_default_fields' to filter the comment fields.
     *
     * @since 3.0.0
     *
     * @param array $defaults The default comment form arguments.
     */
    $args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

    // Ensure that the filtered args contain all required default values.
    $args = array_merge( $defaults, $args );

    if ( comments_open( $post_id ) ) : ?>
        <?php
        /**
         * Fires before the comment form.
         *
         * @since 3.0.0
         */
        do_action( 'comment_form_before' );
        ?>
        <div id="respond" class="comment-respond section-reply-form">
            <h3 class="ui-title-inner"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
            <div class="decor-1 decor-1_mod-a"></div>
            <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
                <?php echo $args['must_log_in']; ?>
                <?php
                /**
                 * Fires after the HTML-formatted 'must log in after' message in the comment form.
                 *
                 * @since 3.0.0
                 */
                do_action( 'comment_form_must_log_in_after' );
                ?>
            <?php else : ?>
                <form action="<?php echo esc_url(site_url( '/wp-comments-post.php' )); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="comment-reply-form reply-form  comment-form"<?php echo $html5 ? ' novalidate' : ''; ?>>
                    <?php
                    /**
                     * Fires at the top of the comment form, inside the form tag.
                     *
                     * @since 3.0.0
                     */
                    do_action( 'comment_form_top' );
                    ?>

                    <?php echo $args['comment_notes_before']; ?>
                    <?php
                    /**
                     * Fires before the comment fields in the comment form.
                     *
                     * @since 3.0.0
                     */
                    do_action( 'comment_form_before_fields' );?>




                    <?php if (!is_user_logged_in()):?>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="author" class="reply-field form-control font-additional font-weight-normal color-third" id="user-name" placeholder="<?php echo esc_html__('NAME','powerman')?>">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" name="email" class="reply-field font-additional form-control font-weight-normal color-third" id="user-email" placeholder="<?php echo esc_html__('EMAIL','powerman')?>">
                            </div>
                        </div><!-- end row -->

                    <?php endif; ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" id="comment-subject" name="subject" placeholder="<?php echo esc_html__('Subject','powerman')?>" required="">
                        </div>
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <textarea name="comment" rows="8" class="form-control reply-field font-additional font-weight-normal color-third" id="user-message" placeholder="<?php echo esc_html__('COMMENTS','powerman')?>"></textarea>
                        </div>
                    </div><!-- end row -->
                    <input type="hidden" name="comment_post_ID" value="<?php echo esc_attr($post_id)?>"/>

                    <?php /**
                     * Fires after the comment fields in the comment form.
                     *
                     * @since 3.0.0
                     */
                    do_action( 'comment_form_after_fields' );
                    ?>


                    <?php echo $args['comment_notes_after']; ?>

                    <?php
                    $submit_button = sprintf(
                        $args['submit_button'],
                        esc_attr( $args['name_submit'] ),
                        esc_attr( $args['id_submit'] ),
                        esc_attr( $args['class_submit'] ),
                        esc_attr( $args['label_submit'] )
                    );

                    /**
                     * Filter the submit button for the comment form to display.
                     *
                     * @since 4.2.0
                     *
                     * @param string $submit_button HTML markup for the submit button.
                     * @param array  $args          Arguments passed to `comment_form()`.
                     */
                    $submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );

                    $submit_field = sprintf(
                        $args['submit_field'],
                        $submit_button,
                        get_comment_id_fields( $post_id )
                    );

                    /**
                     * Filter the submit field for the comment form to display.
                     *
                     * The submit field includes the submit button, hidden fields for the
                     * comment form, and any wrapper markup.
                     *
                     * @since 4.2.0
                     *
                     * @param string $submit_field HTML markup for the submit field.
                     * @param array  $args         Arguments passed to comment_form().
                     */?>
                    <div class="row">
                        <div class="col-xs-12">

                            <button type="submit" class="btn btn-info btn-effect button-border font-additional font-weight-normal hvr-rectangle-out hover-focus-bg hover-focus-border before-bg"><?php echo esc_html__('send comment','powerman')?></button>
                        </div>
                    </div><!-- end row -->


                    <?php
                    /**
                     * Fires at the bottom of the comment form, inside the closing </form> tag.
                     *
                     * @since 1.5.0
                     *
                     * @param int $post_id The post ID.
                     */
                    do_action( 'comment_form', $post_id );
                    ?>
                </form>
            <?php endif; ?>
        </div><!-- #respond -->
        <?php
        /**
         * Fires after the comment form.
         *
         * @since 3.0.0
         */
        do_action( 'comment_form_after' );
    else :
        /**
         * Fires after the comment form if comments are closed.
         *
         * @since 3.0.0
         */
        do_action( 'comment_form_comments_closed' );
    endif;
}


?>