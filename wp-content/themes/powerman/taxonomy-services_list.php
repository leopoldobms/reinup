<?php 
/*** The taxonomy for portfolio category. ***/
get_header(); 
	
 	$powerman_pix_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$powerman_services_page = powerman_get_option('powerman_services_page', '');
	$powerman_all_services = '';
	if ( '' != $powerman_services_page ) {
		$powerman_all_services = get_the_permalink($powerman_services_page);
	}
	$args = array( 'taxonomy' => 'services_category', 'hide_empty' => '1', 'title_li'=> '', 'show_count' => '0', 'current_category' => $powerman_pix_term->term_id);
	$powerman_categories = 	get_categories($args);
?>
<div class="container">
	<div class="row">
		<?php foreach ($powerman_categories as $cat):?>
			<?php $powerman_pix_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($cat->ID) ); ?>
			<div class="wpb_column vc_column_container vc_col-sm-4">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">

					</div>
				</div>
			</div>
		<?php endforeach;?>
    </div>               
</div>


<?php get_footer() ?>