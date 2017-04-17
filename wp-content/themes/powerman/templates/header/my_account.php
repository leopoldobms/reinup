<?php if ( is_user_logged_in() ): ?>
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
		<?php esc_html_e('My Account','powerman')?> <i class="fa fa-angle-down"></i>
	</a>
	<?php else: ?>
	<a class="" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>">
		<?php esc_html_e('Login','powerman')?>
	</a>
	<?php endif?>
  <ul role="menu" class="dropdown-menu">
    <li><a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><?php esc_html_e('My Dashboard','powerman')?></a></li>
    <li><a href="<?php echo esc_url(home_url('my-account/' .get_option('woocommerce_myaccount_edit_account_endpoint')) ); ?>"><?php esc_html_e('Account Information','powerman')?></a></li>
    <li><a href="<?php echo esc_url(home_url('my-account/' .get_option('woocommerce_myaccount_edit_address_endpoint')) ); ?>"><?php esc_html_e('Address Book','powerman')?></a></li>
    <li><a href="<?php echo esc_url(home_url('my-account/' .get_option('woocommerce_myaccount_view_order_endpoint')) ); ?>"><?php esc_html_e('My Orders','powerman')?></a></li>
    <li><a href="<?php echo esc_url(home_url('my-account/' .get_option('woocommerce_logout_endpoint')) ); ?>"><?php esc_html_e('Logout','powerman')?></a></li>
  </ul>