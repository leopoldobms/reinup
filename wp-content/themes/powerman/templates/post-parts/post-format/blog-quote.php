<?php

	// get meta options/values
	if (function_exists('rwmb_meta')){
		$powerman_content = rwmb_meta('post_quote_content');
		$powerman_source = rwmb_meta('post_quote_source');
	}else{
		$powerman_content = get_post_meta( get_the_ID(), 'post_quote_content', true );
		$powerman_source = get_post_meta( get_the_ID(), 'post_quote_source', true );
	}
	$powerman_format  = get_post_format();
	$powerman_format = !in_array($powerman_format, array("quote", "gallery", "video")) ? "standard" : $powerman_format;
	$powerman_icon = array("standard" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
	$powerman_post_date = strtotime(get_the_date());

	$powerman_categories = wp_get_post_categories(get_the_ID(),array('fields' => 'all'));
	$powerman_comments = wp_count_comments(get_the_ID());
?>


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
		<blockquote>
			<?php echo wp_kses_post($powerman_content); ?>
			<div class="blog-quote-source"><?php echo wp_kses_post($powerman_source)?></div>
		</blockquote>
	</div>
	<a class="btn btn-info btn-effect" href="<?php esc_url(the_permalink())?>"><?php echo powerman_post_read_more()?></a>
</div>

