<?php
/**
 * The template includes blog post format gallery.
 *
 * @package Pix-Theme
 * @since 1.0
 */

// get the gallery images
$powerman_size = (is_front_page()) && !is_home() ? 'portfolio-3col' : 'blog-post';
if (function_exists('rwmb_meta')){
	$powerman_gallery = rwmb_meta('post_gallery', 'type=image&size='.$powerman_size.'');
}else{
	$powerman_gallery = get_post_meta( get_the_ID(), 'post_gallery', true );
}

$powerman_argsThumb = array(
	'order'          => 'ASC',
	'post_type'      => 'attachment',
	'post_parent'    => get_the_ID(),
	'post_mime_type' => 'image',
	'post_status'    => null,
);
$powerman_attachments = get_posts($powerman_argsThumb);
$powerman_format  = get_post_format();
$powerman_format = !in_array($powerman_format, array("quote", "gallery", "video")) ? "standard" : $powerman_format;
$powerman_icon = array("standard" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
$powerman_post_date = strtotime(get_the_date());

$powerman_thumbnailId = (isset($powerman_custom['post_gallery']))?reset($powerman_custom['post_gallery']):false;

if (!$powerman_thumbnailId)
    $powerman_thumbnailId = get_post_thumbnail_id($post->ID);

$powerman_thumbnailSrc = wp_get_attachment_url($powerman_thumbnailId);

$powerman_post_content = get_the_content();
$powerman_post_content = preg_replace("#\[.*?\]#is",'',$powerman_post_content);
$powerman_post_content = wp_trim_words($powerman_post_content,100,' [...]');

$powerman_categories = wp_get_post_categories(get_the_ID(),array('fields' => 'all'));
$powerman_comments = wp_count_comments(get_the_ID());


?>


<div class="entry-media">
	<?php if ($powerman_gallery): ?>

		<div class=" carousel-post enable-owl-carousel owl-product-slider owl-bottom-pagination owl-theme" data-wow-delay="0.7s" data-navigation="true" data-pagination="false" data-single-item="true" data-auto-play="true" data-transition-style="false" data-main-text-animation="false" data-min600="1" data-min800="1" data-min1200="1">
			<?php
			if($powerman_gallery){
				foreach ($powerman_gallery as $slide) {
					echo '<img src="' . esc_url($slide['url']) . '" width="' . esc_attr($slide['width']) . '" height="' . esc_attr($slide['height']) . '" alt="' .esc_attr($slide['alt']).'" title="' .esc_attr($slide['title']). '" />';
				}
			}elseif ($powerman_attachments) {
				foreach ($powerman_attachments as $attachment) {
					echo '<img src="'.esc_url(wp_get_attachment_url($attachment->ID, 'full', false, false)).'" alt="'.esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)).'" title="'.esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_title', true)).'" />';
				}
			}

			?>
		</div>
	<?php else: ?>
		<a href="<?php esc_url(the_permalink())?>" >
			<?php if ( has_post_thumbnail() ):?>
				<img class="img-responsive" src="<?php echo esc_url($powerman_thumbnailSrc)?>" height="345" width="808" alt="<?php the_title()?>">
			<?php endif ?>
		</a>
	<?php endif ?>
</div>

<div class="entry-main">
	<div class="entry-header">
		<h3 class="entry-title"><a href="<?php esc_url(the_permalink())?>"><?php the_title()?></a></h3>
		<div class="entry-meta">
			<span class="entry-meta__item"><i class="icon icon-user"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo esc_attr(get_the_author()); ?></a></span>
			<span class="entry-meta__item"><i class="icon icon-bubble"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo esc_attr($powerman_comments->approved) ?></a></span>
			
		</div>
		<div class="entry-date"><span class="entry-date__inner"><?php echo sprintf("%s %s",esc_attr(date('d',$powerman_post_date)),esc_attr(date('F',$powerman_post_date)))?></span></div>
	</div>
	<div class="entry-content">
		<?php echo wp_kses_post($powerman_post_content) ?>
	</div>
	<a class="btn btn-info btn-effect" href="<?php esc_url(the_permalink())?>"><?php echo powerman_post_read_more()?></a>
</div>

