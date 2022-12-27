<?php

add_action( 'add_meta_boxes', 'seo_metabox' );
function seo_metabox()
{
	add_meta_box( 'seo-meta-box', 'Search Engine Optimization Pro Panel', 'seo_meta_box_cb', 'post', 'normal', 'high' );
	add_meta_box( 'seo-meta-box', 'Search Engine Optimization Pro Panel', 'seo_meta_box_cb', 'page', 'normal', 'high' );
}

function seo_meta_box_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$text 		= isset( $values['seotitle'] ) ? esc_attr( $values['seotitle'][0] ) : '';
	$textarea 	= isset( $values['seodescription'] ) ? esc_attr( $values['seodescription'][0] ) : '';
	
	// All in One Seo Compacibility
	if($text == null) $text = isset( $values['_aioseop_title'] ) ? esc_attr( $values['_aioseop_title'][0] ) : '';
	if($textarea == null) $textarea = isset( $values['_aioseop_description'] ) ? esc_attr( $values['_aioseop_description'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <table class="form-table cmb_metabox">
    	<tbody>
        	<tr>
            	<th style="width:18%">Google SEO Preview</th>
                <td>
                	<span id="seo_title" style="display:block; color: #12C; font-size:16px; font-family:Arial, Helvetica, sans-serif; text-decoration:underline; line-height:19px; white-space:normal">
					<?php echo (strlen($text) >= 70) ? substr($text, 0, 70).' ...' : $text; ?>
                    </span>
                    <span style="color: #093; display:block; font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:16px; white-space:normal"><?php the_permalink(); ?></span>
                    <span id="seo_description" style="font-family:Arial, Helvetica, sans-serif; color:#000; font-size:13px; line-height:16px; display:block; width:512px">
					<?php echo (strlen($textarea) >= 160) ? substr($textarea, 0, 160).' ...' : $textarea; ?>
                    </span>
                </td>
            </tr>
        	<tr>
            	<th style="width:18%"><label for="seotitle">SEO Title</label></th>
                <td><input type="text" name="seotitle" id="seotitle" onkeyup="countChar(this)"  value="<?php echo $text; ?>" />
                <p class="cmb_metabox_description">Your title should not have more than 70 characters. Characters remaining: <strong><span id="limit_title">70</span></strong></p></td>
            </tr>
            <tr>
            	<th style="width:18%"><label for="seodescription">SEO Description</label></th>
                <td><textarea name="seodescription" id="seodescription" onkeyup="countCharDescription(this)"><?php echo $textarea; ?></textarea>
                <p class="cmb_metabox_description">Your description should not have more than 160 characters. Characters remaining: <strong><span id="limit_description">160</span></strong></p></td>
            </tr>
            <?php if (function_exists('seo_panel_extended')) echo seo_panel_extended(); ?>
            <tr>
            	<th style="width:18%">SEO Tips</th>
                <td>
        			<ul style="list-style:inside square">
        				<?php $linkWiki = 'http://en.wikipedia.org/wiki/Keyword_density'; ?>
                    	<?php echo (strlen($text) > 70) ? '<li>Your SEO Title should be less than 70 characters</li>' : null; ?>
                        <?php echo (strlen($text) == null) ? '<li>Please consider using a SEO Title </li>' : null; ?>
                        <?php echo (strlen($textarea) > 160) ? '<li>Your SEO Description should be less than 160 characters</li>' : null; ?>
                        <?php echo (strlen($textarea) == null) ? '<li>Please consider having a SEO Description</li>' : null; ?>
                        <?php if (function_exists('seo_panel_extended')){
							for($i=1; $i<=5; $i++) { if(isset($results) && $results[$i]['percent'] > 2.5) $validare = 1; }
							echo (isset($validare)) ? '<li>Please check your keyword density. Some of your keywords exceed 2.5%.  <a href="'.$linkWiki.'">Learn more about keyword density</a></li>' : null; }
						?>
                        <?php echo (str_word_count($post->post_content,0) < 300 ) ? '<li>Your copy has '.str_word_count($post->post_content,0).' words witch is less than 300, the minimum reccomended.</li>' : null;?>
                        <?php echo (strpos($post->post_content, 'img') == false ) ? '<li>Please consider adding at least one image to your copy with an appropriate description</li>' : null; ?>
                        <?php echo (strpos($post->post_content, 'strong') == false || strpos($post->post_content, 'em') == false ) ? '<li>Please consider using &nbsp;&nbsp;<strong>bold</strong>&nbsp;&nbsp; and &nbsp;&nbsp;<em>italic</em>&nbsp;&nbsp; styles for you keywords.</li>' : null; ?>
                        <li>Don't see meta keywords? We are in the great year of <?php echo date('Y') ?>. Meta Keywords are deprecated since long time ago. <a href="http://en.wikipedia.org/wiki/Meta_element#The_keywords_attribute">Check Wikipedia</a></li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    <script>
	
	 
	 function countChar(val) {
		var keyed = val.value;
        var len = val.value.length;
		
		jQuery('#limit_title').text(70 - len);
        if(len <=70 ){
			jQuery("#seo_title").html(keyed);
		}
		else {
			jQuery("#seo_title").html(keyed.substring(0,70) + " ...");
			}
      };
	 
	 function countCharDescription(val) {
		var keyed = val.value;
        var len = val.value.length;
		
		jQuery('#limit_description').text(160 - len);
        if(len <=160 ){
			jQuery("#seo_description").html(keyed);
		}
		else {
			jQuery("#seo_description").html(keyed.substring(0,160) + " ...");
			}
      };
	 
	</script>
	<?php	
}


add_action( 'save_post', 'seo_meta_box_save', 10, 2  );
function seo_meta_box_save( $post_id, $post )
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
	
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['seotitle'] ) )
		update_post_meta( $post_id, 'seotitle', wp_kses( $_POST['seotitle'], $allowed ) );
		
	if( isset( $_POST['seodescription'] ) )
		update_post_meta( $post_id, 'seodescription', esc_attr( $_POST['seodescription'] ) );
		
}
?>