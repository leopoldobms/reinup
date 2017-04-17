<?php

/** Powerman Options Page **/

$theme_name = 'Powerman';
$theme_slug = 'powerman';
$shortname = 'pix';
$theme_version = '1.0';
$path = get_stylesheet_directory_uri();
$styles = array();
$background_options = array();
$skins = array();

if (is_dir(TEMPLATEPATH . "/css/")) {
	if ($open_dir = opendir(TEMPLATEPATH . "/css/")) {
		while (($style = readdir($open_dir)) !== false) {
			if (stristr($style, ".css") !== false) {
				$styles[] = $style;
			}
		}
	}
}


$html_desc = esc_html__('Enter HTML text', 'powerman' );
$html_desc_p = esc_html__('Enter HTML text NOTE: Text must be between "p" tags', 'powerman' );
$text_desc = esc_html__('Enter text', 'powerman' );
$long_text = esc_html__('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et dignissim ipsum. Nam ac interdum sem. Pellentesque diam lacus, dictum in dapibus id, hendrerit eget felis. Nunc nec turpis libero</p>
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas euismod condimentum mollis. In non congue orci. Nulla nunc velit, volutpat vestibulum congue vitae, tincidunt at sem. Pellentesque tincidunt molestie mi, eu aliquam quam fringilla nec. Sed suscipit adipiscing urna, et varius libero commodo eget.</p>', 'powerman' );

$upload_desc = esc_html__('Upload image for your theme, or specify an existing url', 'powerman' );


add_action('after_setup_theme', 'powerman_setup_options');
function powerman_setup_options()
{
    add_theme_support('woocommerce');
    add_theme_support('widgets');
    add_image_size('preview-thumb', 100, 100, true);
    add_image_size('event-thumb', 320, 170, true);

    $args = array(
        'flex-width' => true,
        'width' => 350,
        'flex-height' => true,
        'height' => 'auto',
        'default-image' => get_template_directory_uri() . '/images/logo.jpg'
    );
    add_theme_support('custom-header', $args);
    $args = array(
        'default-color' => 'FFFFFF'
    );
    add_theme_support('custom-background', $args);
    add_theme_support('post-formats', array(
        'gallery',
        'quote',
        'video'
    ));
}

?>