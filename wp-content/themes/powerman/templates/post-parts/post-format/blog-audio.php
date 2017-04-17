<?php
/**
 * The template includes blog post format audio.
 *
 * @package Pix-Theme
 * @since 1.0
 */
	// get meta value for audio
	if (function_exists('rwmb_meta')) {
		$powerman_url = rwmb_meta('post_audio');
	}else{
		$powerman_url = get_post_meta( get_the_ID(), 'post_audio', true );
	}
?>
<div class="entry-media">
	<?php echo do_shortcode($powerman_url); ?>
</div>