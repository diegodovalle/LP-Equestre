<?php
add_shortcode("highlight", "curly_highlight"); 		

function curly_highlight( $atts, $content = null ) {

	$css = ' default'; if(isset($atts['style']) && $atts['style'] == 'different') $css = ' different';
	
	if (!isset($atts['align'])) $atts['align'] = null;
	
    return '<p class="lead '.$css.'" style="text-align:'.$atts['align'].'">'.do_shortcode($content).'</p>';  
} 

?>