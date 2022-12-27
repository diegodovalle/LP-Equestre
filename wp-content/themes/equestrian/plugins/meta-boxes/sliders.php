<?php
add_action( 'add_meta_boxes', 'sliders_metabox' );
function sliders_metabox()
{
	add_meta_box( 'slider-box', 'Ultimate Slider Builder', 'slider_box_cb', 'page', 'normal', 'high' );
}

function slider_box_cb( $post )
{
	$values 			= get_post_custom( $post->ID );
	$slider		 		= isset( $values['slider'] ) ? esc_attr( $values['slider'][0] ) : '';
	$slides_link		= isset( $values['slides_link'] ) ? unserialize( $values['slides_link'][0] ) : '';
	$color 				= isset( $values['slider_color'] ) ? esc_attr( $values['slider_color'][0] ) : '';
	$slides_title		= isset( $values['slides_title'] ) ? unserialize($values['slides_title'][0] ) : '';
	$slides_subtitle	= isset( $values['slides_subtitle'] ) ? unserialize($values['slides_subtitle'][0] ) : '';
	$slides_description	= isset( $values['slides_description'] ) ? unserialize($values['slides_description'][0] ) : '';
	$slides_images		= isset( $values['slides_images'] ) ? unserialize($values['slides_images'][0] ) : '';
	$slider_text_color 	= isset( $values['slider_text_color'] ) ? esc_attr( $values['slider_text_color'][0] ) : '';
	$slider_shortcode 	= isset( $values['slider_shortcode'] ) ? esc_attr( $values['slider_shortcode'][0] ) : '';
	 
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <table class="form-table cmb_metabox">
    	<tr>
            <th style="width:18%;"><label for="slider"><strong><?php _e('Choose Slider', 'CURLYTHEME') ?></strong></label></th>
            <td>
                <select id="slider" name="slider">
                    <option value="no-slider"><?php _e('No Slider Selected' , 'CURLYTHEME') ?></option>
                    <option value="layer-slider" <?php selected( $slider, 'layer-slider' ); ?>>Layer Slider</option>
                    <option value="ios-slider" <?php selected( $slider, 'ios-slider' ); ?>>iOS Slider</option>
                    <option value="roundabout-slider" <?php selected( $slider, 'roundabout-slider' ); ?>>Round About Slider</option>
                </select>
                <?php add_thickbox(); ?>
             </td>
         </tr>
    </table>

    <table class="form-table cmb_metabox">
    	<?php if($slides_link && $slider != "no-slider") : ?>
        <script>jQuery(function() { jQuery('.no-slides').hide() ;}); </script>
        <?php endif; ?>
        <?php
        		switch($slider){
        			case null : {
        				$css_body =  ' hide';
        				$css_display = ' hide';
        				$css_height = ' hide';
        				$css_text_color = ' hide';
        				$css_buttons = ' hide';
        				$css_color = ' hide';
        				$css_shortcode = ' hide';
        			} break;
					case 'no-slider' : {
						$css_body =  ' hide';
						$css_display = ' hide';
						$css_height = ' hide';
						$css_text_color = ' hide';
						$css_buttons = ' hide';
						$css_color = ' hide';
						$css_shortcode = ' hide';
					} break;
					case 'ios-slider' : {
						$css_description = ' hide';
						$css_button = ' hide';
						$css_shortcode = ' hide';
					} break;
					case 'roundabout-slider' : {
						$css_subtitle = ' hide';
						$css_description = ' hide';
						$css_button = ' hide';
						$css_text_color = ' hide';
						$description = ' hide';
						$css_color = ' hide';
						$css_shortcode = ' hide';
						$css_height = ' hide';
					} break;
					case 'layer-slider' : {
						$css_title =  ' hide';
						$css_subtitle = ' hide';
						$css_description = ' hide';
						$css_button = ' hide';
						$css_text_color = ' hide';
						$css_color = ' hide';
						$css_buttons = ' hide';
						$css_no_slides = ' hide';
					} break;
				}
		?>
		<?php if( count($slides_images < 1 ||  $slides_images[0] == null || $slider_shortcode == null) ) : ?>
        <thead class="no-slides <?php echo $css_no_slides ?>">
        	<td colspan="2"><div class="no-slides-alert"><?php _e('<strong>Oops ... No Slides Added!</strong> You can start by selecting a slider from the above select option. After that start adding your slides from the buttons below.' , 'CURLYTHEME') ?></div></td>
        </thead>
        <?php endif; ?>
        <tr class="slider_shortcode <?php echo $css_shortcode ?>">
        	<th style="width:18%"><label>Slider Shortcode</label></th>
            <td>
            	 <input type="text" name="slider_shortcode" id="slider_shortcode" value="<?php echo $slider_shortcode; ?>"  />
            </td>
        </tr>
        <tr class="slider_text_color <?php echo $css_text_color ?>">
        	<th style="width:18%"><label>Text Color</label></th>
            <td>
            	<div class="wp-picker-container">
                    <span class="wp-picker-input-wrap">
                        <input class="cmb_colorpicker cmb_text_small wp-color-picker" type="text" name="slider_text_color" id="slider_text_color" value="<?php echo $slider_text_color; ?>" style="display: none;">
                    </span>
                </div>
            </td>
        </tr>
        <tr class="slider_color <?php echo $css_color ?>">
        	<th style="width:18%"><label>Color</label></th>
            <td>
            	<div class="wp-picker-container">
                    <span class="wp-picker-input-wrap">
                        <input class="cmb_colorpicker cmb_text_small wp-color-picker" type="text" name="slider_color" id="slider_color" value="<?php echo $color; ?>" style="display: none;">
                    </span>
                </div>
            </td>
        </tr>
    	<tbody class="slide-body <?php echo $css_body ?>">
        	<?php $elems = count($slides_link); $i=0; if($slides_link) foreach($slides_link as $slide) : $i++; if($i == $elems) $css_last = " last"; ?></th>
            <tr class="toclone slide-<?php echo $i; ?>">
            	<th style="width:18%"><label for="text_color">Slide #<span class="slide-nr <?php echo $css_last; ?>"><?php echo $i; ?></span></label>
                <td>
                	<div class="slides_title <?php echo $css_title ?>">
                        Slide Title<br>
                        <input type="text" name="slides_title[]" id="slides_title_<?php echo $i; ?>" value="<?php echo $slides_title[$i-1]; ?>"  />
                    </div>
                    <div class="slides_subtitle <?php echo $css_subtitle ?>">
                        Slide Sub Title<br>
                        <input type="text" name="slides_subtitle[]" id="slides_subtitle_<?php echo $i; ?>" value="<?php echo $slides_subtitle[$i-1]; ?>"  />
                    </div>
                    <div class="slides_link <?php echo $css_link ?>">
                        Slide Link<br>
                        <input type="text" name="slides_link[]" id="slides_link_<?php echo $i; ?>" value="<?php echo $slides_link[$i-1]; ?>"  />
                    </div>
                    <div class="slides_description <?php echo $css_description ?>">
                        Slide Description<br>
                        <textarea name="slides_description[]" id="slides_description_<?php echo $i; ?>"><?php echo $slides_description[$i-1]; ?></textarea><br />
                    </div>
                    <div class="slides_picture">
                        <label for="slide_picture_<?php echo $i; ?>">Slide Image</label><br />
                        <input class="cmb_upload_file" type="text" syze="45" name="slide_picture_<?php echo $i; ?>" id="slide_picture_<?php echo $i; ?>" value="<?php echo wp_get_attachment_url($slides_images[$i-1]); ?>" />
                        <input class="cmb_upload_button button" type="button" value="Upload file" />
                        <input class="cmb_upload_file_id" type="hidden" id="slide_picture_<?php echo $i; ?>_id" name="slides_images[]" value="<?php echo $slides_images[$i-1]; ?>">
                        <?php if($slides_images[$i-1]) : ?>
                            <div id="slide_picture_<?php echo $i; ?>_status" class="cmb_media_status">
                                <div class="img_status">
                                <img src="<?php echo wp_get_attachment_url($slides_images[$i-1]); ?>" alt="" />
                                <a href="#" class="cmb_remove_file_button" rel="slide_picture_<?php echo $i; ?>">Remove Image</a>
                                </div>
                            </div>
                        <?php else : ?>
                        <div id="slide_picture_<?php echo $i; ?>_status" class="cmb_media_status"></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tr class="buttons <?php echo $css_buttons ?>">
        	<th  style="width:18%;">&nbsp;</th>
            <td><button type="button" class="addslide button">Add New Slide</button> &nbsp;<button type="button" class="removeslide button">Remove Slide</button></td>
        </tr>
        
    </table>
    <style media="all" type="text/css">
		.hide {display:none}
		.no-slides-alert{
			background: #FAF4D7;
			color: #D0B01A;
			border: 1px solid #F3E49B;
			padding: 7px 0;
			text-align: center;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
		}
	</style>
    
    <script>
		
	jQuery(function($)
	{	
		current_slider = '<?php echo $slider ?>';
		
		if(current_slider == "ios-slider"){
			var css_link = ' show';
			var css_button = ' hide';
			var css_description = ' hide';
			var css_picture = ' show';
		}
		else if(current_slider == "roundabout-slider"){
			var css_title = ' show';
			var css_subtitle = ' hide';
			var css_link = ' show';
			var css_button = ' hide';
			var css_description = ' hide';
			var css_picture = ' show';
		}
		else if(current_slider == "layer-slider"){
			var css_title = ' hide';
			var css_subtitle = ' hide';
			var css_link = ' hide';
			var css_button = ' hide';
			var css_description = ' hide';
			var css_picture = ' hide';
		}
				
		jQuery("#slider").change(function(){
			if(this.value == "no-slider"){
				jQuery(".no-slides").css('display','table-header-group');
				
				// Hide Elements
				jQuery(".slide-body").css('display','none');
				jQuery(".buttons").css('display','none');
				jQuery(".slider_width").css('display','none');
				jQuery(".slider_height").css('display','none');
				jQuery(".slider_text_color").css('display','none');
				jQuery(".slider_color").css('display','none');
				jQuery(".slider_shortcode").css('display','none');
				
			}
			else if(this.value == "ios-slider"){
				// Show Elements
				jQuery(".slide-body").css('display','table-row-group');
				jQuery(".buttons").css('display','table-row');
				jQuery(".slider_shortcode").css('display','none');
				
				jQuery(".slides_link").css('display','block');
				jQuery(".slides_picture").css('display','block');
				jQuery(".slides_subtitle").css('display','block');
				
				jQuery(".slider_color").css('display','table-row');
				jQuery(".slider_text_color").css('display','table-row');
				jQuery(".slider_width").css('display','table-row');	
				jQuery(".slider_height").css('display','table-row');
				
				// Hide Elements
				jQuery(".slides_button").css('display','none');
				jQuery(".slides_description").css('display','none');
				
				
				// JS Variables
				css_link = ' show';
				css_button = ' hide';
				css_description = ' hide';
				css_picture = ' show';
			}
			else if(this.value == "roundabout-slider"){
				// Show Elements
				jQuery(".slide-body").css('display','table-row-group');
				jQuery(".buttons").css('display','table-row');
				jQuery(".slider_shortcode").css('display','none');
				
				jQuery(".slides_link").css('display','block');
				jQuery(".slides_picture").css('display','block');
				jQuery(".slides_title").css('display','block');	
				
				jQuery(".slider_width").css('display','table-row');
				jQuery(".slider_height").css('display','none');
				
				// Hide Elements
				jQuery(".slides_subtitle").css('display','none');
				jQuery(".slider_text_color").css('display','none');	
				jQuery(".slides_button").css('display','none');
				jQuery(".slider_color").css('display','none');
				jQuery(".slides_description").css('display','none');
				
				// JS Variables
				css_title = ' show';
				css_subtitle = ' hide';
				css_link = ' show';
				css_button = ' hide';
				css_description = ' hide';
				css_picture = ' show';
			}
			else if(this.value == "layer-slider"){
				// Show Elements
				jQuery(".slide-body").css('display','none');
				jQuery(".buttons").css('display','none');
				jQuery(".slider_shortcode").css('display','table-row');
				jQuery(".slider_width").css('display','table-row');
				jQuery(".slider_height").css('display','table-row');
				
				// Hide Elements
				jQuery(".slides_description").css('display','none');
				jQuery(".slides_title").css('display','none');	
				jQuery(".slides_subtitle").css('display','none');
				jQuery(".slider_text_color").css('display','none');	
				jQuery(".slides_button").css('display','none');
				jQuery(".slider_color").css('display','none');
				jQuery(".slides_link").css('display','none');
				jQuery(".slides_picture").css('display','none');
				
				// JS Variables
				css_title = ' hide';
				css_subtitle = ' hide';
				css_link = ' hide';
				css_button = ' hide';
				css_description = ' hide';
				css_picture = ' hide';
			}
		});
		
		jQuery('.addslide').click(function()
		{	
			var slideNr = $('.last').text();
			if (slideNr == 0) $('.no-slides').hide();
			if('' == slideNr)
			{
				slideNr = 1;
			}
			else
			{
				slideNr ++;
			}
			
			jQuery('.slide-nr').removeClass('last');
			var trRow = 
				'<tr class="toclone slide-'+slideNr+'">'
					+'<th style="width: 18%"><label for="text_color">Slide #<span class="slide-nr last">'+slideNr+'</span></label></th><br/>'
					+'<td>'
						+'<div class="slides_title'+css_title+'">'
							+'Slide Title<br><input type="text" name="slides_title[]" />'
						+'</div>'
						
						+'<div class="slides_subtitle'+css_subtitle+'">'
							+'Slide Sub Title<br><input type="text" name="slides_subtitle[]" />'
						+'</div>'
						
						+'<div class="slides_link'+css_link+'">'
							+'Slide Link<br><input type="text" name="slides_link[]" class="slides_link" />'
						+'</div>'
						
						+'<div class="slides_description'+css_description+'">'
							+'Slide Description<br>'
							+'<textarea name="slides_description[]"></textarea>'
						+'</div>'
						
						+'<div class="slides_picture'+css_picture+'">'
							+'<label for="slide_picture_'+slideNr+'">Slide Image</label><br/>'
							+'<input class="cmb_upload_file" type="text" syze="45" name="slide_picture_'+slideNr+'" id="slide_picture_'+slideNr+'" class="slide-image"/>'
							+'<input class="cmb_upload_button button" type="button" value="Upload file" />'
							+'<input class="cmb_upload_file_id" class="slide-image-hidden" type="hidden" id="slide_picture_'+slideNr+'_id" name="slides_images[]">'
							+ '<div id="slide_picture_'+slideNr+'_status" class="cmb_media_status"></div>'
						+'</div>'
					+'</td>'
				+'</tr><br/>';
			jQuery('.slide-body').append(trRow);
		});
		jQuery('.removeslide').click(function()
		{
			var removeSlide = $('.last').text();
			if (removeSlide == 1) { 
				$('.no-slides').show();
			}
			if(removeSlide > 2)
			{
				var lastSlide = Number(removeSlide) - 1;
			}
			else
			{
				var lastSlide = 1;
			}
			jQuery('.slide-'+lastSlide+' th label span').addClass('last');
			jQuery('.slide-'+removeSlide).remove();
		})
	});
	</script>
	<?php	
}


add_action( 'save_post', 'slider_box_save', 10, 2  );
function slider_box_save( $post_id, $post )
{
	
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	
	/* Get the post type object. */
		$post_type = get_post_type_object( $post->post_type );
	
	/* Check if the current user has permission to edit the post. */
		if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
			return $post_id;
	
	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	if( isset( $_POST['slider'] ) )  
        update_post_meta( $post_id, 'slider', esc_attr( $_POST['slider'] ) ); 
		
	if( isset( $_POST['slides_link'] ) )
		update_post_meta( $post_id, 'slides_link', wp_kses( $_POST['slides_link'], $allowed ) );
	
	if( isset( $_POST['slides_buttons'] ) )
		update_post_meta( $post_id, 'slides_buttons',  $_POST['slides_buttons'] );
	
	if( isset( $_POST['slides_buttons_texts'] ) )
		update_post_meta( $post_id, 'slides_buttons_texts', wp_kses( $_POST['slides_buttons_texts'], $allowed ) );	
	
	if( isset( $_POST['slider_text_color'] ) )
		update_post_meta( $post_id, 'slider_text_color', wp_kses( $_POST['slider_text_color'], $allowed ) );
	
	if( isset( $_POST['slider_shortcode'] ) )
		update_post_meta( $post_id, 'slider_shortcode', wp_kses( $_POST['slider_shortcode'], $allowed ) );	
	
	if( isset( $_POST['slider_color'] ) )
		update_post_meta( $post_id, 'slider_color', wp_kses( $_POST['slider_color'], $allowed ) );	
		
	if( isset( $_POST['slides_title'] ) )
		update_post_meta( $post_id, 'slides_title', wp_kses( $_POST['slides_title'], $allowed ) );
	
	if( isset( $_POST['slides_subtitle'] ) )
		update_post_meta( $post_id, 'slides_subtitle', wp_kses( $_POST['slides_subtitle'], $allowed ) );	
	
	if( isset( $_POST['slides_description'] ) )
		update_post_meta( $post_id, 'slides_description', wp_kses( $_POST['slides_description'], $allowed ) );	
	
	if( isset( $_POST['slides_images'] ) )
		update_post_meta( $post_id, 'slides_images', wp_kses( $_POST['slides_images'], $allowed ) );		
		
	// This is purely my personal preference for saving checkboxes
	$chk = ( isset( $_POST['display'] ) && $_POST['display'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'display', $chk );
	
	// This is purely my personal preference for saving checkboxes
	$chk2 = ( isset( $_POST['height'] ) && $_POST['height'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'height', $chk2 );
	
	if( isset( $_POST['slider_text_color'] ) )  
        update_post_meta( $post_id, 'slider_text_color', esc_attr( $_POST['slider_text_color'] ) ); 
}
?>