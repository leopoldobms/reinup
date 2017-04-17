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
wc_setup_product_data(get_queried_object_id());



$powerman_id = powerman_woo_get_page_id();

$powerman_isProduct = false;

if ( is_single() && get_post_type() == 'product' ) {
    $powerman_isProduct = true;
}

$powerman_custom = $powerman_id > 0 ? get_post_custom($powerman_id) : array();

$powerman_productSidebar = isset ($powerman_custom['pix_selected_sidebar'][0]) ? reset($powerman_custom['pix_selected_sidebar']) : 'product-sidebar-1';
$powerman_layout = isset ($powerman_custom['pix_page_layout']) ? $powerman_custom['pix_page_layout'][0] : '2';
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


<div  id="product-<?php the_ID(); ?>" class="<?php echo esc_attr($powerman_productDetailsClass)?>">

    <section id="productDetails" class="product-details ">
        <div class="container">
            <div class="row">
                <div class="product-gallery col-lg-4 col-md-4 col-sm-7 col-xs-12 clearfix">
                    <?php
                    /**
                     * woocommerce_before_single_product_summary hook
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                </div>
                <div class="product-cart pull-left col-lg-5 col-md-5 col-sm-12 col-xs-12 clearfix">

                    <?php
                    /**
                     * woocommerce_single_product_summary hook
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     *
                     * @hooked woocommerce_template_single_excerpt - 20
                     *
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     *
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                    do_action( 'woocommerce_single_product_summary' );
                    ?>

                </div><!-- .summary -->
            </div>
        </div>
    </section>
</div><!-- #product-<?php the_ID(); ?> -->

