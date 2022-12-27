<?php
add_shortcode("testimonials", "curly_testimonials"); 		

function curly_testimonials( $atts, $content = null ) {
	
	if(isset($GLOBALS['carouselID'])) $GLOBALS['carouselID']++; else $GLOBALS['carouselID'] = 0;
	$GLOBALS['carouselSlideID'] = $GLOBALS['carouselID'] * 100;
	 
    return '<div id="carousel-'.$GLOBALS['carouselID'].'" class="carousel slide testimonials" data-interval="2000"><div class="carousel-inner">'.do_shortcode($content).'</div></div>';  
}  

add_shortcode("testimonial", "curly_testimonial"); 		

function curly_testimonial( $atts, $content = null ) {
	
	if(isset($GLOBALS['carouselSlideID'])) $GLOBALS['carouselSlideID']++; else $GLOBALS['carouselSlideID'] = 0;
	if($GLOBALS['carouselSlideID'] % 100 == 1) $css = 'active '; else $css = null; 
	 
    return '<div class="'.$css.'item"><blockquote>'.$content.'</blockquote><cite>'.( (isset($atts['name'])) ? $atts['name'] : null ).'</cite></div>';  
}  

?>