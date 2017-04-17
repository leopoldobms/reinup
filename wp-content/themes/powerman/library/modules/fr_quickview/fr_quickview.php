<?php

/**
 * Quickview
 * version 1.0.0
 */

add_action('wp_enqueue_scripts', 'powerman_quickview_load_scripts');
add_action('get_header', 'powerman_quickview_init_action');

function powerman_quickview_init_action(){
    if (isset($_GET['quickview'])){
        include_once(get_template_directory() . '/library/modules/fr_quickview/quickview_main.php');
        exit;
    }
}


function powerman_quickview_load_scripts(){

    if (powerman_get_option('shop_settings_quickview')) {
        powerman_addJsMultiple(array('quickview.js'), 'bottom');
    }
}


add_filter('powerman_js_vars', 'powerman_init_quickview');

function powerman_init_quickview(){
    $vars = '';
    if (powerman_get_option('shop_settings_quickview')){
        $vars .= 'var _quickViewEnabled = true';
    }else{
        $vars .= 'var _quickViewEnabled = false';
    }
    return $vars;
}