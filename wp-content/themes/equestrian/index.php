<?php 
switch (get_option(THEMEPREFIX.'_header_style', 0)) {
	case 0 : get_header(); break;
	case 1 : get_header('1'); break;
	case 2 : get_header('2'); break;
}
?>
<div class="container page-content">
	<div class="row extra-padding">
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			     <?php get_template_part( 'post-format/content' , get_post_format()); ?>
			     <?php endwhile; ?>
			 <?php else : get_template_part('post-format/content' , 'missing'); endif; ?>
			 <div class="row"><div class="col-lg-7 col-md-7 col-sm-7 col-md-offset-2 col-lg-offset-2">
			 	<?php if(function_exists('curly_get_pagination')) echo curly_get_pagination(); else { previous_posts_link(); next_posts_link();  } ?>
			 </div></div>
		</div>
		<aside class="col-lg-4 col-md-4 col-sm-4">
			<?php if(function_exists('generated_dynamic_sidebar')) generated_dynamic_sidebar('sidebar_blog'); else dynamic_sidebar('sidebar_blog'); ?>
		</aside>
	</div>
</div>
<?php get_footer(); ?>