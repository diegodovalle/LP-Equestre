<?php
add_shortcode("pretty-photo", "curly_prettyphoto"); 		

function curly_prettyphoto( $atts, $content = null ) {
	extract(shortcode_atts(array(  
        "title"  => null,
		'image'  => null
    ), $atts));
	
    return '<a href="'.$image.'" title="'.$title.'" data-lightbox="lightbox">'.do_shortcode($content).'</a>';  
}  


?>