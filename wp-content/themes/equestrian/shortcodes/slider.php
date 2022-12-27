<?php
add_shortcode("slider", "curly_slider"); 		

function curly_slider( $atts, $content = null ) {

	extract(shortcode_atts(array(), $atts)); 
	
	if(isset($GLOBALS['carouselID'])) $GLOBALS['carouselID']++; else $GLOBALS['carouselID'] = 0;
	$GLOBALS['carouselSlideID'] = $GLOBALS['carouselID'] * 100;
	 
    return '<div id="carousel-'.$GLOBALS['carouselID'].'" class="carousel slide clearfix"><ul class="carousel-inner">'.do_shortcode($content).'</ul><a class="carousel-control left" href="#carousel-'.$GLOBALS['carouselID'].'" data-slide="prev">&lsaquo;</a><a class="carousel-control right" href="#carousel-'.$GLOBALS['carouselID'].'" data-slide="next">&rsaquo;</a></div>';  
}  

add_shortcode("slide", "curly_slide"); 		

function curly_slide( $atts, $content = null ) {
	$GLOBALS['carouselSlideID']++;
	if($GLOBALS['carouselSlideID'] % 100 == 1) $css = ' active'; else $css = null; 
    return '<li class="item'.$css.'">'.do_shortcode($content).'</li>';  
}  

?>