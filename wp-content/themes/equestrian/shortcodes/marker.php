<?php
add_shortcode("marker", "curly_marker"); 		

function curly_marker( $atts, $content = null ) {
	extract(shortcode_atts(array(), $atts)); 
	
	if(isset($atts['color']) && $atts['color'] == "green") 		$css = ' label-success';
	elseif(isset($atts['color']) && $atts['color'] == "orange") 	$css = ' label-warning';
	elseif(isset($atts['color']) && $atts['color'] == "red") 	$css = ' label-danger';
	elseif(isset($atts['color']) && $atts['color'] == "blue") 	$css = ' label-info';
	elseif(isset($atts['color']) && $atts['color'] == "black") 	$css = ' label-default';
	else $css = ' label-primary';
	 
    return '<span class="label'.$css.'">'.do_shortcode($content).'</span>';  
}  


?>