<?php
add_shortcode("clients", "curly_clients"); 		

function curly_clients( $atts, $content = null ) {

	if(!wp_script_is('carousel')) wp_enqueue_script('carousel');
	
	(isset($GLOBALS['rand_carousel'])) ? $GLOBALS['rand_carousel']++ : $GLOBALS['rand_carousel'] = 0;
	$rand_carousel = 'carousel-'.$GLOBALS['rand_carousel'];
	 
    $html  = '<div class="clients-carousel '.$rand_carousel.'"><ul>'.do_shortcode($content).'</ul>';
    $html .= '<div class="controls">
    			<a href="#" class="prev '.$rand_carousel.'"></a>
    			<a href="#" class="next '.$rand_carousel.'"></a>
			  </div>';
	$html .= '</div>';		  
    
    $html .= '<script>
	   			 jQuery(window).load(function(){
	 				jQuery(".clients-carousel.'.$rand_carousel.' ul").carouFredSel({
	 				responsive: true,
					scroll: 1,
					auto: false,
					items: {
						width: 200,
						height: "variable",
						visible: {
							min: 2,
							max: 10
						}
					},
					prev	: {	
						button	: ".prev.'.$rand_carousel.'",
						key		: "left"
					},
					next	: { 
						button	: ".next.'.$rand_carousel.'",
						key		: "right"
					}
	 				});
	 			});
    		  </script>';
    		  
    return $html;
    		  
}  

add_shortcode("client", "curly_client"); 		

function curly_client( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'		=> "#",
		'image'		=>  null,
		'name'		=> null                            
	), $atts)); 
	                                 
    return '<li><a href="'.$link.'"><img src="'.$image.'" alt="'.$name.'"></a></li>';  
}  

?>