<?php 
switch (get_option(THEMEPREFIX.'_header_style', 0)) {
	case 0 : get_header(); break;
	case 1 : get_header('1'); break;
	case 2 : get_header('2'); break;
}

// Template Name: Contact Page #3
?>
<article>
	<div class="container page-content">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php while ( have_posts() ) : the_post(); ?>
				
				<?php the_content() ?>
							
				<?php endwhile; // end of the loop. ?>
				
				<?php if (get_option(THEMEPREFIX.'_general_email')) : ?>
				<h3 class="special-title"><span><?php _e('Contact Form', 'CURLYTHEME') ?></span></h3>
				<?php get_template_part('/plugins/contact-form/contact-form'); ?>
				<br><br>
				<?php endif; ?>
				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<?php if(get_post_meta($post->ID, THEMEPREFIX.'latitude', true) && get_post_meta($post->ID, THEMEPREFIX.'longitude', true)) : ?>
				<div class="photo-frame"><div class="map-holder">
					<?php echo do_shortcode('[map-maker latitude="'.get_post_meta($post->ID, THEMEPREFIX.'latitude', true).'" longitude="'.get_post_meta($post->ID, THEMEPREFIX.'longitude', true).'" marker="'.get_post_meta($post->ID, THEMEPREFIX.'map_marker', true).'" color="'.get_post_meta($post->ID, THEMEPREFIX.'map_color', true).'" height="'.get_post_meta($post->ID, THEMEPREFIX.'map_height', true).'" zoom="'.get_post_meta($post->ID, THEMEPREFIX.'map_zoom', true).'" type="'.get_post_meta($post->ID, THEMEPREFIX.'map_type', true).'"][/map-maker]'); ?>
				</div></div>
				
				<?php $side = get_post_meta($post->ID, THEMEPREFIX.'contact_side', true);	echo do_shortcode($side); ?>
				
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>
<?php get_footer(); ?>