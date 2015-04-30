<?php
/* 
Plugin Name: LinkTexting
Plugin URI: https://www.linktexting.com/ 
Version: 2.0
Author: Brian Clark
Description: A plugin for creating a text-to-dowload form for mobile apps 
*/  

function linktexting_shortcode( $atts ) {

       // Attributes
       extract( shortcode_atts(
              array(
                     'linkid' => 'link_uuid_here',
                     'button_color' => '#aaa',
                     'button_color_hover' => '#666',
              ), $atts )
       );

       // Code
return        '<style type="text/css">'.
              '  .linkTextingButton_oq3j39q0 {'.
              '    background-color: '.$atts['button_color'].';'.
              '    background: '.$atts['button_color'].';'.
              '    box-shadow: none;'.
              '    text-shadow: none;'.
              '  }'.
              '  .linkTextingButton_oq3j39q0:hover {'.
              '    background-color: '.$atts['button_color_hover'].';'.
              '    background: '.$atts['button_color_hover'].';'.
              '    box-shadow: none;'.
              '    text-shadow: none;'.
              '  }'.
              '</style>'.
              '<div class="linkTextingWidget" style="margin:0;">'.
              '  <div class="linkTextingInner" style="margin:0;">'.
              '    <input type="hidden" class="linkID" value="'.$atts['linkid'].'">'.
              '    <input class="linkTextingInput" type="tel"></input>'.
              '    <button class="linkTextingButton" type="button">Text me a link</button>'.
              '    <div class="linkTextingError" style="display:none;"></div>'.
              '  </div>'.
              '</div>';
}

function addStyle() {
       wp_enqueue_style( 'style', plugins_url('/assets/css/style.css', __FILE__) );
}

function addScripts() {
       wp_register_script( 'utilsScript', plugins_url('/assets/js/utils.js', __FILE__) );
       wp_register_script( 'main', plugins_url('/assets/js/main.js', __FILE__) );
       $translation_array = array(
              'plugins_url' => __( plugins_url(), 'plugin-domain' )
       );
       wp_localize_script( 'main', 'utils', $translation_array );
       wp_enqueue_script( 'main', plugins_url('/assets/js/main.js', __FILE__), array( 'jquery', 'utilsScript' ) );
}

add_action('wp_enqueue_scripts', 'addStyle');
add_action('wp_footer', 'addScripts');
add_shortcode('linktexting', 'linktexting_shortcode');

?>