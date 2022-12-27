<?php 
switch (get_option(THEMEPREFIX.'_header_style', 0)) {
	case 0 : get_header(); break;
	case 1 : get_header('1'); break;
	case 2 : get_header('2'); break;
}

// Template Name: Contact Page #2
?>
<article>
	<div class="container page-content">
		<div class="row">
			<?php if (get_option(THEMEPREFIX.'_general_email')) : ?>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php while ( have_posts() ) : the_post(); ?>
				
				<?php the_content() ?>
							
				<?php endwhile; // end of the loop. ?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h3 class="special-title"><span><?php _e('Contact Form', 'CURLYTHEME') ?></span></h3>
				<?php get_template_part('/plugins/contact-form/contact-form'); ?>
			</div>
			<?php else : ?>
			<div class="col-lg-12">
				<?php while ( have_posts() ) : the_post(); ?>
				
				<?php the_content() ?>
							
				<?php endwhile; // end of the loop. ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</article>
<?php if(get_post_meta($post->ID, THEMEPREFIX.'latitude', true) && get_post_meta($post->ID, THEMEPREFIX.'longitude', true)) : ?>
<div class="map-holder">
	<?php echo do_shortcode('[map-maker latitude="'.get_post_meta($post->ID, THEMEPREFIX.'latitude', true).'" longitude="'.get_post_meta($post->ID, THEMEPREFIX.'longitude', true).'" marker="'.get_post_meta($post->ID, THEMEPREFIX.'map_marker', true).'" color="'.get_post_meta($post->ID, THEMEPREFIX.'map_color', true).'" height="'.get_post_meta($post->ID, THEMEPREFIX.'map_height', true).'" zoom="'.get_post_meta($post->ID, THEMEPREFIX.'map_zoom', true).'" type="'.get_post_meta($post->ID, THEMEPREFIX.'map_type', true).'"][/map-maker]'); 
	
	$side = get_post_meta($post->ID, THEMEPREFIX.'contact_side', true); 
	
	if ($side != null) : ?>
	
	<div id="contact-info" class="col-lg-3 col-md-4 visible-md visible-lg">
		<?php echo do_shortcode($side); ?>
	</div>
	<div class="visible-sm visible-xs text-center" id="contact-info-below" style="padding-bottom: 50px;">
		<?php echo do_shortcode($side); ?>
	</div>
	<?php endif; ?>
</div>
<?php 
	function curly_contact() {
		echo "<script>
			jQuery(document).ready(function(){				   
			 jQuery(window).resize(function(){
			  if(jQuery(window).width() > 700){
			  jQuery('#contact-info').css({
			   position:'absolute',
			   top: ( jQuery('.map-holder').outerHeight() / 2 - jQuery('#contact-info').outerHeight() / 2),
			   right: ( jQuery('.container > .row').position().left)
			  });	
			  }
			 });
			 jQuery(window).resize();
			});
		</script>";
	}
	add_action('wp_footer', 'curly_contact', 21);
?>
<?php endif; ?>
<?php get_footer(); ?>