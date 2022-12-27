<?php
add_shortcode("blockquote", "curly_blockquote"); 		

function curly_blockquote( $atts, $content = null ) {
	
	if(isset($atts['image']) && $atts['image']) $img = '<img src="'.$atts['image'].'" alt="'.((isset($atts['cite'])) ? $atts['cite'] : null).'" class="pull-right hidden-xs">'; else $img = null;
	 
    return '<blockquote class="blockquote clearfix">'.$img.$content.' <cite>'.((isset($atts['cite'])) ? $atts['cite'] : null).'</cite></blockquote>';  
}
?>