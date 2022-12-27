<?php
add_shortcode("pricing-table", "curly_pricingTable"); 		

function curly_pricingTable( $atts, $content = null ) {
	extract(shortcode_atts(array(  
        "size" => '1', 
		"last" => 'no' 
    ), $atts)); 
	
	$css = 'wl-pricing-table light';
	 
    return '<div class="'.$css.'">'.do_shortcode($content).'</div>';  
} 

add_shortcode("pricing-header", "curly_pricing_table_header"); 		

function curly_pricing_table_header( $atts, $content = null ) {
	extract(shortcode_atts(array(  
        "currency" => '$', 
		"price" => '55',
		"frequency" => 'monthly' 
    ), $atts)); 
	 
    return '<div class="pricing-header"><h3>'.$content.'</h3><div class="pricing-row"><h4 style="text-align: center;"><span>'.$currency.$price.'</span></h4><em>'.$frequency.'</em></div></div>';  
} 

add_shortcode("pricing-column", "curly_pricing_table_column"); 		

function curly_pricing_table_column( $atts, $content = null ) {
	extract(shortcode_atts(array( 
		"size" => '1/4', 
        "last" => 'no'
    ), $atts));
    
    $css = null;
	
	switch ($size){
		case '1/2'  : $css = ' half'; break;
		case '1/3'  : $css = ' one-three'; break;
		case '1/4'  : $css = ' one-four'; break;
	}
	
	if(isset($atts['highlight']) && $atts['highlight'] == "yes") $css .= " highlight-column";
	
	if($last == "yes") $css .= " last";
	
    return '<div class="content-column '.$css.'"><div class="pricing-table-content">'.do_shortcode($content).'</div></div>';  
} 

add_shortcode("pricing-row", "curly_pricing_table_row"); 		

function curly_pricing_table_row( $atts, $content = null ) {
    return '<span>'.$content.'</span>';  
} 

add_shortcode("pricing-footer", "curly_pricing_table_footer"); 		

function curly_pricing_table_footer( $atts, $content = null ) {
    return '<div class="pricing-footer">'.do_shortcode($content).'</div>';  
} 

?>