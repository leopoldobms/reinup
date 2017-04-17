<?php

class PowermanCommentWalker extends Walker_Comment{

    protected function comment( $comment, $depth, $args ) {
        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo esc_attr($tag); ?> <?php comment_class( $this->has_children ? 'parent' : '' ); ?> id="comment-<?php comment_ID(); ?>">
        <article class="comment">
            <?php if ( 'div' != $args['style'] ) : ?>
                <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <?php endif; ?>
            <div class="avatar-placeholder">
                <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], '', '', array('class' => 'img-responsive')) ; ?>

            </div>
            <?php if ( '0' == $comment->comment_approved ) : ?>
                <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','powerman' ) ?></em>
                <br />
            <?php endif; ?>
            <div class="comment-inner">
                <header class="comment-header"> <cite class="comment-author"><?php echo wp_kses_post(get_comment_author_link())?></cite>
                    <time class="comment-datetime" datetime="2012-10-27 15:20">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
                            <?php
                                /* translators: 1: date, 2: time */
                                printf( esc_html__( '%1$s %2$s','powerman' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)','powerman' ), '&nbsp;&nbsp;', '' );
                            ?>
                        </a>
                    </time>
                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'before'    => '<div class="comment-reply">',
                        'after'     => '</div>'
                    ) ) );
                    ?>

                </header>
                <div class="comment-body">
                    <?php comment_text( get_comment_id(), array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>

            </div>


            <?php if ( 'div' != $args['style'] ) : ?>
                </div>
            <?php endif; ?>
        </article>
        <?php
    }

}