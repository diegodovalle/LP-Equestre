<?php
add_shortcode("divider", "curly_dividers"); 		

function curly_dividers( $atts, $content = null ) {
	extract(shortcode_atts(array(  
        "style" => '1',
        "before"=> 0,
        "after" => 40
    ), $atts)); 
	
	$css = 'divider';
	
	switch ($style){
		case '1'  : $css .= ' one'; break;
		case '2'  : $css .= ' two'; break;
		case '3'  : $css .= ' three'; break;
		case '4'  : $css .= ' four'; break;
		case '5'  : $css .= ' five'; break;
	}
	
	$inline  = 'margin-top: '.$before.'px;';
	$inline .= 'margin-bottom: '.$after.'px;';
	
	$inline = 'style="'.$inline.'"';
	 
    return '<hr class="'.$css.'" '.$inline.'>';  
}  

?>