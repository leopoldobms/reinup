<?php 
$powerman_comments = wp_count_comments($post->ID);
	$powerman_post_date = strtotime($post->post_date);
	$powerman_categories = wp_get_post_categories($post->ID,array('fields' => 'all'));
	$powerman_tags = get_the_tags($post->ID);
	$powerman_post_meta = get_post_meta($post->ID);
	$powerman_post_images = $powerman_vendor = array();
	$powerman_post_video = '';
	$powerman_post_type = (isset($powerman_post_meta['post_types_select'])) ? $powerman_post_meta['post_types_select'] : 'default';
	
	if (is_array($powerman_post_type)){
		$powerman_post_type = reset($powerman_post_type);
	}
	
	if ($powerman_post_type == 'image'){
		$powerman_post_images = (isset($powerman_post_meta['post_image'])) ? $powerman_post_meta['post_image'] : array();
	}
	if ($powerman_post_type == 'video'){
		$powerman_post_video = (isset($powerman_post_meta['post_video_href'])) ? $powerman_post_meta['post_video_href'] : '';
		$powerman_post_video = (is_array($powerman_post_video))?reset($powerman_post_video):'';
		$powerman_vendor = parse_url($powerman_post_video);
	}
?>

<?php if ($powerman_post_type == 'image'):?>
	<div class="entry-media">
	    <div class=" carousel-post enable-owl-carousel owl-product-slider owl-bottom-pagination owl-theme" data-wow-delay="0.7s" data-navigation="true" data-pagination="false" data-single-item="true" data-auto-play="true" data-transition-style="false" data-main-text-animation="false" data-min600="1" data-min800="1" data-min1200="1">
			<?php
			if(!empty($powerman_post_images)){
				foreach ($powerman_post_images as $attachmentID) {
					echo '<img src="'.esc_url(wp_get_attachment_url($attachmentID, 'full', false, false)).'" alt="'.esc_attr(get_post_meta($attachmentID, '_wp_attachment_image_alt', true)).'" title="'.esc_attr(get_post_meta($attachmentID, '_wp_attachment_image_title', true)).'" />';
				}
			}

			?>
		</div>
	</div>
<?php elseif($powerman_post_type == 'video'):?>
	<div class="entry-media">
	    <?php if ($powerman_vendor['host'] == 'www.youtube.com' || $powerman_vendor['host'] == 'youtu.be' || $powerman_vendor['host'] == 'www.youtu.be' || $powerman_vendor['host'] == 'youtube.com'){ ?>

            <?php if ($powerman_vendor['host'] == 'www.youtube.com') { parse_str( parse_url( $powerman_post_video, PHP_URL_QUERY ), $my_array_of_vars ); ?>
                <iframe class="hvr-grow-rotate" width="808" height="345" src="http://www.youtube.com/embed/<?php echo esc_attr($my_array_of_vars['v']); ?>?modestbranding=1;rel=0;showinfo=0;autoplay=0;autohide=1;yt:stretch=16:9;" frameborder="0" allowfullscreen></iframe>
            <?php } else { ?>
                <iframe class="hvr-grow-rotate" width="808" height="345" src="http://www.youtube.com/embed<?php echo esc_attr(parse_url($powerman_post_video, PHP_URL_PATH));?>?modestbranding=1;rel=0;showinfo=0;autoplay=0;autohide=1;yt:stretch=16:9;" frameborder="0" allowfullscreen></iframe>
            <?php } } ?>

        <?php if ($powerman_vendor['host'] == 'vimeo.com'){ ?>
            <iframe class="hvr-grow-rotate" src="http://player.vimeo.com/video<?php echo esc_attr(parse_url($$powerman_post_video, PHP_URL_PATH));?>?title=1&amp;byline=1&amp;portrait=1" width="808" height="345" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        <?php } ?>
	</div>
<?php else:?>
	<div class="entry-media">
	    <?php if ( has_post_thumbnail() ):?>
	        <?php the_post_thumbnail(); ?>
	    <?php endif; ?>
	</div>
<?php endif;?>

<div class="entry-main">
    <div class="entry-header">
        <h2 class="entry-title"><?php the_title()?></h2>
        <div class="entry-meta">
            <span class="entry-meta__item"><i class="icon icon-user"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo get_the_author(); ?></a></span>
            <span class="entry-meta__item"><i class="icon icon-bubble"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo esc_attr($powerman_comments->approved) . ' ' . esc_html__('comment(s)','powerman') ?></a></span>
        </div>
        <div class="entry-date"><span class="entry-date__inner"><?php echo sprintf("%s %s",esc_attr(date('d',$powerman_post_date)),esc_attr(date('F',$powerman_post_date)))?></span></div>
    </div>
    <div class="entry-content">
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
<footer class="entry-footer clearfix">
    <?php if ($powerman_tags):?>
        <i class="icon icon-tag"></i>
        <span class="entry-footer__title"><?php echo esc_html__('Tags','powerman')?></span>
        <?php $powerman_tagIndex = 0; foreach($powerman_tags as $tag):?>
            <a href="<?php echo esc_url(get_tag_link( $tag->term_id ))?>" class="post-tags"><?php echo esc_attr($tag->name)?><?php if ($powerman_tagIndex < (sizeof($powerman_tags) - 1)):?>,<?php endif;?></a>
        <?php $powerman_tagIndex++; endforeach; ?>
    <?php endif;?>

    <div class="entry-footer__inner">
        <!--<i class="icon icon-heart"></i>
        <span class="entry-footer__title">
                <?php echo esc_html__('like Post','powerman') ?>
        </span>-->
        <?php if (powerman_is_shortcode_defined('share')) { echo do_shortcode('[share post_type="post" title="'.esc_html__('Share this post','powerman').'"]'); } ?>
    </div>
</footer>