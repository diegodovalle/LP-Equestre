<form name="contact-us" id="contact-form">
	<p>
		<input type="text" name='name' placeholder="<?php echo __('Enter your name *', 'CURLYTHEME') ?>" id='name' class='form-control' />
	</p>
	<p>
		<input type="text" name='email' placeholder="<?php echo __('Enter your email address *', 'CURLYTHEME') ?>" id='email' class='form-control' />
	</p>
	<p>
		<textarea name='message' placeholder="<?php echo __('Enter your message *', 'CURLYTHEME') ?>" id='message' rows="3" class='form-control'></textarea>
	</p>
	
	<div class='message'></div>
	<div class="infoWrapper">
		<div class="infoContent">
			<input type='submit' value='<?php _e('Send Message', 'CURLYTHEME') ?>' class="btn" style="margin-top: 10px;" />
		</div>
	</div>
</form>
 
<script type="text/javascript">
		jQuery(function(){
			jQuery("#contact-form").submit(function(){
				jQuery(".message").removeClass("success").removeClass("error").addClass("loader").html("<?php _e('Sending message','CURLYTHEME') ?>").fadeIn("slow");
				jQuery.ajax({
					type: "POST",
					url: "<?php echo get_template_directory_uri() .'/plugins/contact-form/ajax.php' ?>",
					data: jQuery(this).serialize(),
					dataType: 'text',
					success: function(msg){
						switch(msg) {
							case "field_error":
								jQuery(".message").removeClass("loader").addClass("error");
								jQuery(".message").html("<?php _e('Please fill in all the required fields.','CURLYTHEME') ?>");
								break;
							case "email_error":
								jQuery(".message").removeClass("loader").addClass("error");
								jQuery(".message").html("<?php _e('Please fill a valid email address.','CURLYTHEME') ?>");
								break;	
							case "captcha_error":
								jQuery(".message").removeClass("loader").addClass("error");
								jQuery(".message").html("<?php _e('Please type the words correctly and try again!','CURLYTHEME') ?>");
								break;
							case "success":
								jQuery(".message").removeClass("loader").addClass("success");
								jQuery(".message").html("<?php _e('Your message has been sent. You will soon hear from us!','CURLYTHEME') ?>");
								jQuery('.infoWrapper').remove();
								break;
							default:
								alert("<?php _e('Something is wrong. Please try again.', 'CURLYTHEME') ?>");
						}
					}
				});
				return false;
			});
		});
</script> 