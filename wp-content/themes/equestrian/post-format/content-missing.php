<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="row">
		<div class="col-lg-2 col-md-2 hidden-sm hidden-xs"><time class="post-calendar-date"><span><?php echo get_the_date( 'd' ) ?></span><em><?php echo get_the_date( 'M' ) ?></em></time></div>
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
			<h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
			<?php if(has_post_thumbnail()) echo '<a href="'.get_permalink().'">'; the_post_thumbnail('large', array('class' => 'featured-image')); echo '</a>';  ?>
		</div>
	</header>
	<div class="entry-content row">
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
			<div class="post-meta">
				<?php 
				
				ob_start();
				comments_popup_link(  __( 'No Comments', 'CURLYTHEME' ), __( '1 Comment', 'CURLYTHEME' ), __( '% Comments', 'CURLYTHEME' ));
				$comments = ob_get_clean();
				
				$output = __( '<div class="meta-data"><span class="by-author">By %1$s</span> &nbsp;|&nbsp; <i class="fa fa-time"></i> %2$s &nbsp;|&nbsp; <i class="fa fa-th-large"></i> %3$s  %4$s &nbsp;|&nbsp; <i class="fa fa-comments"></i> %5$s</div>', 'CURLYTHEME' );
				
				echo sprintf( $output, get_the_author(), get_the_date(get_option(THEMEPREFIX.'_blog_date_format')), get_the_category_list(', '), get_the_tag_list('&nbsp;|&nbsp; <i class="fa fa-tags"></i> ',', '), $comments );
				
				 ?>
			</div>
			<?php the_excerpt() ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" class="continue-reading"><?php  _e('CONTINUE READING', 'CURLYTHEME') ?> <i class="fa fa-caret-right"></i></a>
		</div>
	</div>
</article>