<?php
/* 
Plugin Name: LinkTexting Widget
Plugin URI: https://www.linktexting.com/ 
Version: 1.3
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
              '    box-shadow: none;'.
              '    text-shadow: none;'.
              '  }'.
              '  .linkTextingButton_oq3j39q0:hover {'.
              '    background-color: '.$atts['button_color_hover'].';'.
              '    box-shadow: none;'.
              '    text-shadow: none;'.
              '  }'.
              '</style>'.
              '<div class="linkTexting_oq3j39q0" style="margin:0;">'.
              '  <div class="linkTextingInner_oq3j39q0" style="margin:0;">'.
              '    <input class="linkTextingInput_oq3j39q0" type="tel" id="numberToText_linkTexting_oq3j39q0_'.$atts['linkid'].'"></input>'.
              '    <button class="linkTextingButton_oq3j39q0" type="button" onclick="sendLink_linkTexting_oq3j39q0(\''.$atts['linkid'].'\')" id="sendButton_linkTexting_oq3j39q0_'.$atts['linkid'].'">Text me a link</button>'.
              '    <div class="linkTextingError_oq3j39q0" id="linkTextingError_oq3j39q0_'.$atts['linkid'].'" style="display:none;"></div>'.
              '  </div>'.
              '</div>'.
              '<script type="text/javascript">'.
              '  var utilsScript = "'.plugins_url('/assets/js/utils.js', __FILE__).'";'.
              '  loadIntlInput_oq3j39q0();'.
              '</script>';
  
}

function addStyle() {
       wp_enqueue_style( 'style', plugins_url('/assets/css/style.css', __FILE__) );
}

function addScripts() {
       wp_enqueue_script( 'main', plugins_url('/assets/js/main.js', __FILE__), array( 'jquery' ) );
}

add_action('wp_enqueue_scripts', 'addStyle');
add_action('wp_footer', 'addScripts');
add_shortcode( 'linktexting', 'linktexting_shortcode' );

?>