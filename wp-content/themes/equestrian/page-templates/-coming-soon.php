<?php 
switch (get_option(THEMEPREFIX.'_header_style', 0)) {
	case 0 : get_header(); break;
	case 1 : get_header('1'); break;
	case 2 : get_header('2'); break;
}

// Template Name: Coming Soon Page

$color_primary = get_option(THEMEPREFIX.'_color_primary');

?>
<article>
	<div class="container page-content" id="coming-soon-container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-8 col-sm-offset-1 col-md-offset-1 col-lg-offset-1" style="border-left: 15px groove <?php echo $color_primary ?>; padding: 20px 40px; z-index: 100; background: #fff; -webkit-border-radius: 3px;-moz-border-radius: 3px;border-radius: 3px;">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content() ?>		
				<?php endwhile; // end of the loop. ?>			
			</div>
		</div>
	</div>
</article>
<?php 
	function curly_coming_soon() {
		echo "<script>
			jQuery(document).ready(function(){				   
			 jQuery(window).resize(function(){
			  if(jQuery(window).width() > 700){
			  jQuery('#coming-soon-container').css({
			   position:'absolute',
			   top: ( jQuery(window).outerHeight() / 2 - jQuery('#coming-soon-container').outerHeight() / 2)
			  });	
			  }
			 });
			 jQuery(window).resize();
			});
		</script>";
	}
	add_action('wp_footer', 'curly_coming_soon', 22);
?>
<?php get_footer(); ?>
