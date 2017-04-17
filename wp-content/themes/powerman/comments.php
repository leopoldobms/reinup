<?php

if ( post_password_required() ) {
    return;
}



?>
<?php if ( have_comments() ) : ?>

    <section class="section-comment">
        <h3 class="ui-title-inner">
            <?php echo esc_html__('comments','powerman')?>
            <span class="color_primary">(<?php echo esc_attr(get_comments_number())?>)</span>
        </h3>
        <div class="decor-1 decor-1_mod-a"></div>

        <ul class="comments-list clearfix">
            <?php
            wp_list_comments( array(
                'style'       => 'ul',
                'short_ping'  => true,
                'avatar_size' => 85,
                'walker'      => new PowermanCommentWalker()
            ) );
            ?>

        </ul><!-- end comments-list -->
    </section>

    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'powerman' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'powerman' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'powerman' ) ); ?></div>
        </nav><!-- #comment-nav-below -->
    <?php endif; // Check for comment navigation. ?>
    
<?php endif;?>

<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'powerman' ); ?></p>
<?php endif;?>


<?php

    powerman_comment_form(
        array(
            'title_reply'          => esc_html__( 'Leave a Comment','powerman' ),
            'title_reply_to'       => esc_html__( 'Leave a Comment to %s','powerman' ),
        )
    );
?>


