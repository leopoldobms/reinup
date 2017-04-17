<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
global $woocommerce_loop;




$powerman_id = powerman_woo_get_page_id();
$powerman_isProduct = false;

if ( is_single() && get_post_type() == 'product' ) {
    $powerman_isProduct = true;
}

$powerman_custom = $powerman_id > 0 ? get_post_custom($powerman_id) : array();

$powerman_productSidebar = isset ($powerman_custom['pix_selected_sidebar'][0]) ? reset($powerman_custom['pix_selected_sidebar']) : 'product-sidebar-1';
$powerman_layout = isset ($powerman_custom['pix_page_layout']) ? $powerman_custom['pix_page_layout'][0] : '2';

$powerman_useSettingsGlobal = powerman_get_option('shop_settings_use_global');
if ($powerman_useSettingsGlobal == 'yes'){
	$powerman_layout = powerman_get_option('shop_settings_global_stype');
	$powerman_sidebar = powerman_get_option('shop_settings_global_scontent');
}


$powerman_productDetailsClass = '';
switch($powerman_layout) {
    case 1: $powerman_productDetailsClass = 'product-sidebar-full-width'; break;
    case 3: $powerman_productDetailsClass = 'product-sidebar-left'; break;
    case 2: $powerman_productDetailsClass = 'product-sidebar-right'; break;
}




$powerman_staticblockId = (int)get_post_meta( $powerman_id, '_static_bottom', true );

$powerman_productStaticBlock = get_post($powerman_staticblockId);


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>


<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<?php if ($powerman_layout == 3):?>
	<div class="product-brand col-lg-3 col-md-3 col-sm-5 col-xs-12 clearfix">
	<aside class="sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($powerman_productSidebar) ) : ?> <?php   endif;?>
		</aside>
	</div>
<?php endif?>
<div class="<?php echo esc_attr($powerman_productDetailsClass)?> <?php if ($powerman_layout != 1):?>col-lg-9<?php endif;?>">
	<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
			/**
			 * woocommerce_before_single_product_summary hook.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="summary entry-summary">

			<?php
				/**
				 * woocommerce_single_product_summary hook.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>

		</div><!-- .summary -->

		<?php
			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>

		<meta itemprop="url" content="<?php the_permalink(); ?>" />

	</div><!-- #product-<?php the_ID(); ?> -->
</div>
<?php if ($powerman_layout == 2):?>
	<div class="product-brand col-lg-3 col-md-3 col-sm-5 col-xs-12 clearfix">
	<aside class="sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($powerman_productSidebar) ) : ?> <?php   endif;?>
		</aside>
	</div>
<?php endif?>
<?php do_action( 'woocommerce_after_single_product' ); ?>

