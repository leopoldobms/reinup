<?php 
/* Woocommerce template. */ 
$powerman_id = powerman_woo_get_page_id();
$powerman_isProduct = false;

if ( is_single() && get_post_type() == 'product' ) {
	$powerman_isProduct = true;
}

$powerman_custom = $powerman_id > 0 ? get_post_custom($powerman_id) : array();
$powerman_layout = isset ($powerman_custom['pix_page_layout']) ? reset($powerman_custom['pix_page_layout']) : '2';
$powerman_sidebar = isset ($powerman_custom['pix_selected_sidebar'][0]) ? reset($powerman_custom['pix_selected_sidebar']) : 'Shop Sidebar';


$powerman_useSettingsGlobal = powerman_get_option('shop_settings_use_global');
if ($powerman_useSettingsGlobal == 'yes'){
	$powerman_layout = powerman_get_option('shop_settings_global_stype');
	$powerman_sidebar = powerman_get_option('shop_settings_global_scontent');
}

?>



<?php get_header();?>




<div class="container">


            <div class="row">
             <main class="main-content">       
	 			<?php if ($powerman_isProduct === true):?>

				<?php  woocommerce_content(); ?>
				<?php else:?>
				<?php if ($powerman_layout == '3'):?>
					<div class="col-xs-12 col-sm-12 col-md-3">
						<aside class="sidebar">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($powerman_sidebar) ) : ?> <?php   endif;?>
						</aside>
					</div>
				<?php endif?>
	
				<div class="col-xs-12 <?php if ($powerman_layout == '1'):?>  col-sm-12 col-md-12 <?php else: ?> col-sm-12 col-md-9 <?php endif?>">
					<?php  woocommerce_content(); ?>
				</div>
	
				<?php if ($powerman_layout == '2'):?>
					<div class="col-xs-12 col-sm-12 col-md-3">
						<aside class="sidebar">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($powerman_sidebar) ) : ?> <?php   endif;?>
						</aside>
					</div>
				<?php endif?>
	        <?php endif;?>
	 			</main>
            </div>

    
</div>




            
<?php get_footer();?>
