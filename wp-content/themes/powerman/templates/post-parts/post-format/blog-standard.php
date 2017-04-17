
<?php

$powerman_format  = get_post_format();
$powerman_options = get_option('pix_general_settings');
$powerman_custom =  get_post_custom($post->ID);

$powerman_layout = isset ($powerman_custom['_page_layout']) ? $powerman_custom['_page_layout'][0] : '1';
$powerman_format  = get_post_format();
$powerman_format = !in_array($powerman_format, array("quote", "gallery", "video")) ? "standard" : $powerman_format;
$powerman_icon = array("standard" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
$powerman_post_date = strtotime($post->post_date);

$powerman_thumbnailId = (isset($powerman_custom['post_standard']))?reset($powerman_custom['post_standard']):false;

if (!$powerman_thumbnailId)
    $powerman_thumbnailId = get_post_thumbnail_id($post->ID);

$powerman_thumbnailSrc = wp_get_attachment_url($powerman_thumbnailId);

$powerman_post_content = get_the_content();
$powerman_post_content = preg_replace("#\[.*?\]#is",'',$powerman_post_content);
$powerman_post_content = wp_trim_words($powerman_post_content,100,' [...]');

$powerman_categories = wp_get_post_categories($post->ID,array('fields' => 'all'));
$powerman_comments = wp_count_comments($post->ID);

?>

<div class="entry-media">
	<a href="<?php esc_url(the_permalink())?>" >
		<?php if ( has_post_thumbnail() ):?>
			<img class="img-responsive" src="<?php echo esc_url($powerman_thumbnailSrc)?>" height="345" width="808" alt="<?php the_title()?>">
		<?php endif ?>
	</a>
</div>

<div class="entry-main">
	<div class="entry-header">
		<h3 class="entry-title"><a href="<?php esc_url(the_permalink())?>"><?php the_title()?></a></h3>
		<div class="entry-meta">
			<span class="entry-meta__item"><i class="icon icon-user"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo get_the_author(); ?></a></span>
			<span class="entry-meta__item"><i class="icon icon-bubble"></i><a class="entry-meta__link" href="javascript:void(0);"><?php echo esc_attr($powerman_comments->approved) ?></a></span>
			
		</div>
		<div class="entry-date"><span class="entry-date__inner"><?php echo sprintf("%s %s",esc_attr(date('d',$powerman_post_date)),esc_attr(date('F',$powerman_post_date)))?></span></div>
	</div>
	<div class="entry-content">
		<?php echo wp_kses_post($powerman_post_content) ?>
	</div>
	<a class="btn btn-info btn-effect" href="<?php esc_url(the_permalink())?>"><?php echo powerman_post_read_more()?></a>
</div>
