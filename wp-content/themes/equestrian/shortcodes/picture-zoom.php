<?php
add_shortcode("picture-zoom", "curly_picturezoom"); 		

function curly_picturezoom( $atts, $content = null ) {

	if(!wp_script_is('picture-zoom')) wp_enqueue_script('picture-zoom');
	
	global $post;
	
	$html = '<div class="zoom-picture"><img src="'.( (isset($atts['image'])) ? $atts['image'] : null ).'" style="width:100%;" alt="'.get_the_title($post->ID).'" ></div>';
	
  return $html;
}  


?>