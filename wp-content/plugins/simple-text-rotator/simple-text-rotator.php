<?php
/*
Plugin Name: Simple Text Rotator
Plugin URI: http://www.curlythemes.com
Description: Super elegant text rotation shortcode.
Version: 1.0
Author: Curly Themes
Author URI: http://www.curlythemes.com
*/

function curly_str_options_header() {
	if (!is_admin()) {
		wp_enqueue_style('text-rotator-css', plugins_url( '/css/simpletextrotator.min.css' , __FILE__ ), true);
		wp_enqueue_script('text-rotator-js', plugins_url( '/js/jquery.simple-text-rotator.min.js' , __FILE__ ), 'jquery', null, true);
	} 
}
add_action('wp_enqueue_scripts', 'curly_str_options_header');


function curly_simple_text_rotator( $atts , $content = null ) {
	extract( shortcode_atts( array(
		'animation' => 'dissolve',
		'separator' => '|',
		'speed' => 2000
	), $atts ) );
	
	$html = '<span class="str-rotate" data-str-animation="'.$animation.'" data-str-separator="'.$separator.'" data-str-speed="'.$speed.'">';
	$html .= $content;
	$html .= '</span>';
	
	return $html;
	
}
add_shortcode( 'simple-text-rotator', 'curly_simple_text_rotator');

?>