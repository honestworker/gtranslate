<?php
// .........

$data = get_option('GTranslate');
if (!empty($data['show_in_menu']))
{
    wp_enqueue_script( 'gtranslate-megemenu-js', trailingslashit( get_template_directory_uri () ) . '../../plugins/gtranslate/gtranslate-megamenu.js' , false, false, true);
}