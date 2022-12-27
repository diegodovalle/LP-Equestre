<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="row">
		<div class="col-lg-2 col-md-2 hidden-sm hidden-xs"><time class="post-calendar-date"><span><?php echo get_the_date( 'd' ) ?></span><em><?php echo get_the_date( 'M' ) ?></em></time></div>
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
			<h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
			<div class="post-meta">
				<?php 
				
				ob_start();
				comments_popup_link(  __( 'No Comments', 'CURLYTHEME' ), __( '1 Comment', 'CURLYTHEME' ), __( '% Comments', 'CURLYTHEME' ));
				$comments = ob_get_clean();
				
				$output = __( '<div class="meta-data"><span class="by-author">By %1$s</span> &nbsp;|&nbsp; <i class="fa fa-time"></i> %2$s ', 'CURLYTHEME' );
				
				echo sprintf( $output, get_the_author(), get_the_date(get_option(THEMEPREFIX.'_blog_date_format')));
				
				 ?>
			</div>
			<?php the_excerpt() ?>
		</div>
	</header>
</article>