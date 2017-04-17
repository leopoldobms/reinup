<?php

$powerman_pixtheme_format  = get_post_format();
$powerman_options = get_option('pix_general_settings');
$powerman_custom =  get_post_custom($post->ID);
$powerman_layout = isset ($powerman_custom['_page_layout']) ? $powerman_custom['_page_layout'][0] : '1';

$powerman_pixtheme_format = !in_array($powerman_pixtheme_format, array("quote", "gallery", "video")) ? "standard" : $powerman_pixtheme_format;
$powerman_icon = array("standard" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
	
?>

<div class="entry-main">
 
  <h3 class="entry-title"> <a href="<?php esc_url(the_permalink())?>">
    <?php the_title() ?>
    </a> </h3>
  <div class="entry-content"> <?php echo do_shortcode(get_the_excerpt()); ?> </div>
  <div class="entry-footer">
    <div class="entry-meta clearfix">
	  <?php if($powerman_options['pix_blog_show_date']): ?>
        <li> <span aria-hidden="true" class="icon-clock"></span><?php echo get_the_time('M d, Y'); ?></li>
        <?php endif?>
    </div>
    <div class="entry-footer"> <a title="<?php esc_attr(the_title()) ?>" class="view-post-btn" href="<?php esc_url(the_permalink())?>">
       <?php echo powerman_post_read_more() ?>
      </a> </div>
  </div>
</div>
