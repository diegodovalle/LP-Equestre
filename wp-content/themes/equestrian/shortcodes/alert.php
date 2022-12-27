<?php
add_shortcode("alert", "curly_alert"); 		

function curly_alert( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'color' => null
		), $atts ) );
	
	$css = 'wl-alert';
	
	if  ($color == "green") $css .= ' alert-success';
	elseif($color == "blue")	$css .= ' alert-info'; 
	elseif($color == "red") 	$css .= ' alert-danger'; 
	else $css .= ' alert-warning';
	 
    return '<div class="alert '.$css.'"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$content.'</div>';  
}  

?>