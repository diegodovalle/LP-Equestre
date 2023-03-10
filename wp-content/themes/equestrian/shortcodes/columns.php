<?php
add_shortcode("column", "curly_column"); 		

function curly_column( $atts, $content = null ) {
	extract(shortcode_atts(array(  
        "size" => '1', 
		"last" => 'no' 
    ), $atts)); 
	
	$css = 'content-column';
	
	if ($last == 'yes') $css .= " last clearfix";
	
	switch ($size){
		case '1/2'  : $css .= ' half'; break;
		case '1/3'  : $css .= ' one-three'; break;
		case '1/4'  : $css .= ' one-four'; break;
		case '2/3'  : $css .= ' two-three'; break;
		case '2/4'  : $css .= ' two-four'; break;
		case '3/4'  : $css .= ' three-four'; break;
	}
	
	$inline = ($atts['margin'] != null) ? ' style="margin-bottom: '.$atts['margin'].'px" ' : null;
	 
    return ($last == 'yes') ? '<div class="'.$css.'" '.$inline.'>'.do_shortcode($content).'</div><div class="clear"></div>' : '<div class="'.$css.'" '.$inline.'>'.do_shortcode($content).'</div>';  
} 

?>