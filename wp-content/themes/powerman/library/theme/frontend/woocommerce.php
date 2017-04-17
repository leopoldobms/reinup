<?php /** Is coming */?>
<?php
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 6;' ), 20 );
	
	add_filter('loop_shop_columns', 'powerman_loop_columns');
	if (!function_exists('loop_columns')) {
		function powerman_loop_columns() {
			return 3; // 3 products per row
		}
	}
?>