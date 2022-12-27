<?php
add_shortcode("agenda", "curly_agenda"); 		

function curly_agenda( $atts, $content = null ) {
	
    return '<div class="event-agenda container">'.do_shortcode($content).'</div>';  
} 

add_shortcode("event-day", "curly_day"); 		

function curly_day( $atts, $content = null ) {
	
    return '<div class="event-agenda-day row"><h3 class="col-md-10 col-sm-10 col-lg-10">'.do_shortcode($content).'</h3><span class="col-md-2 col-sm-2 col-lg-2 text-right"><i class="fa fa-calendar"></i> '.( (isset($atts['date'])) ? $atts['date'] : null ).'</span></div>';  
} 

add_shortcode("event", "curly_event"); 	

function curly_event( $atts, $content = null ) {
	
    return '<div class="event-agenda-event row"><span class="col-md-2 col-sm-2 col-lg-2"><i class="fa fa-clock-o"></i> '.( (isset($atts['time'])) ? $atts['time'] : null ).'</span><div class="col-md-8 col-sm-8 col-lg-8">'.do_shortcode($content).'</div><span class="col-md-2 col-sm-2 col-lg-2 text-right"><i class="fa fa-map-marker"></i> '.( (isset($atts['room'])) ? $atts['room'] : null ).'</span></div>';  
} 


?>