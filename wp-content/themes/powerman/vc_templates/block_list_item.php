<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$x = powerman_get_global_data('powerman_list_items_count');
$picon = '';
if(function_exists('fil_init')){
    $picon = isset( ${"icon_" . $type} ) ? ${"icon_" . $type} : '';
}
powerman_set_global_data(
    'powerman_list_items',
    array(
        'title' => $title,
        'link' => $link,
        'content' => $content,
        'icon' => $picon
    ),
    $x
);

$itemsCount = powerman_get_global_data('powerman_list_items_count');
$itemsCount++;
powerman_set_global_data('powerman_list_items_count',$itemsCount);


?>