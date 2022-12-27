<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-lg-2 col-md-2 hidden-sm hidden-xs"><time class="post-calendar-date" datetime="<?php echo get_the_time( 'Y-m-d' ) ?>"><span><?php echo get_the_time( 'd' ) ?></span><em><?php echo get_the_time( 'M' ) ?></em></time>
		<?php if (is_sticky()) { echo '<span class="label label-danger label-format ">'.__('<i class="fa fa-star"></i>', 'CURLYTHEME').'</span>'; } ?>
		<?php if (has_post_format( 'gallery' )) { echo '<span class="label label-danger label-format">'.__('<i class="fa fa-camera"></i>', 'CURLYTHEME').'</span>'; } ?>
		<?php if (has_post_format( 'image' )) { echo '<span class="label label-danger label-format">'.__('<i class="fa fa-picture"></i>', 'CURLYTHEME').'</span>'; } ?>
		<?php if (has_post_format( 'video' )) { echo '<span class="label label-danger label-format">'.__('<i class="fa fa-film"></i>', 'CURLYTHEME').'</span>'; } ?>
		<?php if (has_post_format( 'audio' )) { echo '<span class="label label-danger label-format">'.__('<i class="fa fa-music"></i>', 'CURLYTHEME').'</span>'; } ?>
		<?php if (has_post_format( 'quote' )) { echo '<span class="label label-danger label-format">'.__('<i class="fa fa-quote-right"></i>', 'CURLYTHEME').'</span>'; } ?>
		<?php if (has_post_format( 'link' )) { echo '<span class="label label-danger label-format >'.__('<i class="fa fa-link"></i>', 'CURLYTHEME').'</span>'; } ?>
		<?php if (has_post_format( 'chat' )) { echo '<span class="label label-danger label-format">'.__('<i class="fa fa-comments-alt"></i>', 'CURLYTHEME').'</span>'; } ?>
		<?php if (has_post_format( 'status' )) { echo '<span class="label label-danger label-format">'.__('<i class="fa fa-retweet"></i>', 'CURLYTHEME').'</span>'; } ?>
		<?php if (has_post_format( 'aside' )) { echo '<span class="label label-danger label-format">'.__('<i class="fa fa-asterisk"></i>', 'CURLYTHEME').'</span>'; } ?>
		</div>
		
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
			<header>
				<h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
				<?php if(has_post_thumbnail()) echo '<a href="'.get_permalink().'">'; the_post_thumbnail('large', array('class' => 'featured-image img-responsive')); echo '</a>';  ?>
			</header>
			<div class="post-meta">
				<?php 
				
				ob_start();
				comments_popup_link(  __( 'No Comments', 'CURLYTHEME' ), __( '1 Comment', 'CURLYTHEME' ), __( '% Comments', 'CURLYTHEME' ));
				$comments = ob_get_clean();
				
				$output = __( '<div class="meta-data"><span class="by-author">By %1$s</span> &nbsp;|&nbsp; <i class="fa fa-time"></i> %2$s &nbsp;|&nbsp; <i class="fa fa-th-large"></i> %3$s  %4$s &nbsp;|&nbsp; <span class="no-wrap"><i class="fa fa-comments"></i> %5$s</span></div>', 'CURLYTHEME' );
				
				echo sprintf( $output, get_the_author(), get_the_date(get_option(THEMEPREFIX.'_blog_date_format')), get_the_category_list(', '), get_the_tag_list('&nbsp;|&nbsp; <i class="fa fa-tags"></i> ',', '), $comments );
				
				 ?>
			</div>
			<div class="entry-content">
				<?php the_excerpt() ?>
			</div>
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" class="continue-reading"><?php echo _e('CONTINUE READING', 'CURLYTHEME') ?> <i class="fa fa-caret-right"></i></a></p>
			
			<?php wp_link_pages(); ?>
		</div>
	</div>
</article>