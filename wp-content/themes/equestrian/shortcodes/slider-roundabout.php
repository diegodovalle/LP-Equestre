<?php
add_shortcode("roundabout-slider", "curly_roundaboutslider"); 		

function curly_roundaboutslider( $atts, $content = null ) {

	if(!wp_script_is('easing')) wp_enqueue_script('easing');
	if(!wp_script_is('drag') )wp_enqueue_script('drag');
	if(!wp_script_is('drop')) wp_enqueue_script('drop');
	if(!wp_script_is('roundabout')) wp_enqueue_script('roundabout');
    
    // Populate Slider
    $html  = '<ul class="roundabout-slider">'.do_shortcode($content).'</ul>'; 
    
    function curly_shortcode_roundabout() {
	    $html = "<script type='text/javascript'>
				    	jQuery(document).ready(function() {
	    					jQuery('.roundabout-slider').roundabout({
	    					enableDrag: true,
	    					autoplay: true,
	    					maxScale: .9,
					        autoplayDuration: 5000,
					        autoplayPauseOnHover: true,
					        easing: 'easeInOutQuart',
					        responsive: true
	    					});
	    				});
				    </script>"; 
		echo $html;
	}
	add_action('wp_footer', 'curly_shortcode_roundabout', 20);
			    
	return $html;		    
}
add_shortcode("roundabout-slide", "curly_roundaboutslide"); 		

function curly_roundaboutslide( $atts, $content = null ) {
	 
    $html  = '<li><a href="'.$atts['link'].'">';
    $html .= ($atts['title']) ? '<div class="title-container"><span>'.$atts['title'].'</span></div>' : null;
    $html .='<img src="'.$atts['image'].'" alt=""></a></li>';  
    
    return $html;
}  
?>