<?php
add_shortcode("call2action", "curly_action"); 		

function curly_action( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title'	 => null,
		'button' => null,
		'link'	 => null
    ), $atts)); 
	
    $html  = '<div class="action-box">';
    $html .= ($button) ? do_shortcode('[button link="'.$link.'" size="large" class="hidden-xs"]'.$button.'[/button]') : null ;
    $html .= ($title) ? '<h3>'.$title.'</h3>' : null;
    $html .= '<p>'.$content.'</p>';
    $html .= ($button) ? do_shortcode('[button link="'.$link.'" class="visible-xs btn-large btn-block btn-default"]'.$button.'[/button]') : null;
    $html .= '</div>';  
    
    return $html;
} 
?>