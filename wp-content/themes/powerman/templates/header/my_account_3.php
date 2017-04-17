<?php if ( is_user_logged_in() ): ?>
    <a class="font-additional color-main text-uppercase hover-focus-color" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
        <?php esc_html_e('My Account','powerman')?>
    </a>
<?php else: ?>
    <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="font-additional color-main text-uppercase hover-focus-color">
        <?php esc_html_e('Login','powerman')?>
    </a>
<?php endif?>

