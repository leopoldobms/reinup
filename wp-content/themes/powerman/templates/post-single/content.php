<?php
$powerman_comments = wp_count_comments($post->ID);
$powerman_post_date = strtotime($post->post_date);
$powerman_categories = wp_get_post_categories($post->ID,array('fields' => 'all'));
$powerman_tags = get_the_tags($post->ID);

$powerman_post_type = $post->post_type;

?>
<main class="main-content">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-wrap_mod-b">
            <article class="post post_mod-c clearfix">
            	<?php if ($powerman_post_type == 'portfolio'):?>
            		<?php get_template_part( 'templates/post-single/portfolio' ) ?>
            	<?php else:?>
	                <div class="entry-media">
	                    <?php if ( has_post_thumbnail() ):?>
	                        <?php the_post_thumbnail(); ?>
	                    <?php endif; ?>
	                </div>
	
	                <div class="entry-main">
	                    <div class="entry-header">
	                        <h2 class="entry-title"><?php the_title()?></h2>
	                        <div class="entry-meta">
	                            <span class="entry-meta__item"><i class="icon icon-user"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo get_the_author(); ?></a></span>
	                            <span class="entry-meta__item"><i class="icon icon-bubble"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo esc_attr($powerman_comments->approved) . ' ' . esc_html__('comment(s)','powerman') ?></a></span>
	                        </div>
	                        <div class="entry-date"><span class="entry-date__inner"><?php echo sprintf("%s %s",esc_attr(date('d',$powerman_post_date)),esc_attr(date('F',$powerman_post_date)))?></span></div>
	                    </div>
	                    <div class="entry-content rtd">
	                        <?php
	
	                        the_content();
	
	                        wp_link_pages( array(
	                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'powerman' ) . '</span>',
	                            'after'       => '</div>',
	                            'link_before' => '<span>',
	                            'link_after'  => '</span>',
	                        ) );
	
	                        ?>
	                    </div>
	                </div>
	                <footer class="entry-footer clearfix" id="blog_post_share">
	                    <?php if ($powerman_tags):?>
	                        <i class="icon icon-tag"></i>
	                        <span class="entry-footer__title"><?php echo esc_html__('Tags','powerman')?></span>
	                        <?php $powerman_tagIndex = 0; foreach($powerman_tags as $tag):?>
	                            <a href="<?php echo esc_url(get_tag_link( $tag->term_id ))?>" class="post-tags"><?php echo esc_attr($tag->name)?><?php if ($powerman_tagIndex < (sizeof($powerman_tags) - 1)):?>,<?php endif;?></a>
	                        <?php $powerman_tagIndex++; endforeach; ?>
	                    <?php endif;?>
	
	                    <div class="entry-footer__inner" >
	                        <!--<i class="icon icon-heart"></i>
	                        <span class="entry-footer__title">
	                                <?php echo esc_html__('like Post','powerman') ?>
	                        </span>-->
	                        <?php if (powerman_is_shortcode_defined('share')) { echo do_shortcode('[share post_type="post" title="'.esc_html__('Share this post','powerman').'"]'); } ?>
	                    </div>
	                </footer>
                <?php endif;?>
            </article><!-- end post -->

            <div class="post-nav">
                <?php
                    $powerman_nextPost = get_adjacent_post(false,'',true);
                    $powerman_prevPost = get_adjacent_post(false,'',false);
                    $powerman_nextLink = get_permalink($powerman_nextPost);
                    $powerman_prevLink = get_permalink($powerman_prevPost);
                ?>

                <?php if ($powerman_prevPost != ''):?>
                    <a class="post-nav__item" href="<?php echo esc_url($powerman_prevLink)?>">
                        <i class="icon icon-arrow-left"></i>
                        <span class="post-nav__name">
                            <?php echo esc_html__('previous article','powerman') ?>
                        </span>

                    </a>
                <?php endif;?>
                <?php if ($powerman_nextPost != ''):?>
                    <a class="post-nav__item" href="<?php echo esc_url($powerman_nextLink)?>">

                        <span class="post-nav__name">
                            <?php echo esc_html__('next article','powerman') ?>

                        </span>
                        <i class="icon icon-arrow-right"></i>
                    </a>
                <?php endif;?>
            </div>

            <?php comments_template(); ?>


        </div><!-- end post-wrap_mod-b -->
    </div>
</main>







