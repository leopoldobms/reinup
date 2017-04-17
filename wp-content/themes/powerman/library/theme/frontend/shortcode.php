<?php
function powerman_is_shortcode_defined($shortcode)
{
    global $shortcode_tags;
    if(isset($shortcode_tags[$shortcode]))
        return TRUE;
    else
        return FALSE;
}

?>