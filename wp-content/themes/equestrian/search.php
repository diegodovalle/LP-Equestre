<?php 
switch (get_option(THEMEPREFIX.'_header_style', 0)) {
	case 0 : get_header(); break;
	case 1 : get_header('1'); break;
	case 2 : get_header('2'); break;
}
?>
<div class="container page-content">
	<div class="row extra-padding">
		<div class="col-lg-8 col-md-8">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			     <?php get_template_part( 'post-format/content' , 'search'); ?>
			     <?php wp_link_pages(); ?>	
			     <?php endwhile; ?>
			 <?php else : ?>
			 
			 			<article id="post-0" class="post no-results not-found">
			 				<header class="entry-header">
			 					<h1 class="entry-title"><?php _e( 'Nothing Found', 'CURLYTHEME' ); ?></h1>
			 				</header>
			 
			 				<div class="entry-content">
			 					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'CURLYTHEME' ); ?></p>
			 					<?php get_search_form(); ?>
			 				</div>
			 			</article>
			 
			 		<?php endif; ?>
			 <div class="row"><div class="col-lg-7 col-md-7 col-sm-7 col-md-offset-2 col-sm-offset-2 col-lg-offset-2"><?php if(function_exists('curly_get_pagination')) echo curly_get_pagination(); else { previous_posts_link(); next_posts_link();  } ?></div></div>
		</div>
		<aside class="col-lg-4 col-md-4">
			<?php if(function_exists('generated_dynamic_sidebar')) generated_dynamic_sidebar('sidebar_blog'); else dynamic_sidebar('sidebar_blog'); ?>
		</aside>
	</div>
</div>
<?php get_footer(); ?>