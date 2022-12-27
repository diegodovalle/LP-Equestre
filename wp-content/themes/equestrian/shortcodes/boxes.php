<?php
add_shortcode("box", "curly_box"); 		

function curly_box( $atts, $content = null ) {
	extract(shortcode_atts(array(), $atts)); 
	
	$css = 'well';

	$html  = '<div class="'.$css.'">';
		$html .= do_shortcode($content);
	$html .= '</div>';
	
	return $html;
}  


?>