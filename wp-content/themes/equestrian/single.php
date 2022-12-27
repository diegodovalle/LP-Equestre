<?php 
switch (get_option(THEMEPREFIX.'_header_style', 0)) {
	case 0 : get_header(); break;
	case 1 : get_header('1'); break;
	case 2 : get_header('2'); break;
}
?>
<aside class="blog-sort">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-right">
				<h6 class="pull-left"><?php $blogPage = get_option('page_for_posts'); echo '<a href="'.get_permalink($blogPage).'">'.__('Return to ', 'CURLYTHEME').get_the_title($blogPage).'</a>';  ?></h6>
				<?php previous_post_link('%link', __('<span class="nav-links no-wrap"><i class="fa fa-angle-left"></i> Previous Post</span>', 'CURLYTHEME')); ?>
				<?php next_post_link('%link', __('<span class="nav-links no-wrap nav-links-next">Next Post <i class="fa fa-angle-right"></i></span>', 'CURLYTHEME')); ?> 
			</div>
		</div>
	</div>
</aside>
<div class="container page-content">
	<div class="row extra-padding">
		<div class="col-lg-7 col-md-8 col-sm-8">
			<div id="blog-entries">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				     <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				     	<header>
			     			<h1 class="post-title"><?php the_title() ?></h1>
			     			<div class="post-meta">
			     				<?php 
			     				
			     				ob_start();
			     				comments_popup_link(  __( 'No Comments', 'CURLYTHEME' ), __( '1 Comment', 'CURLYTHEME' ), __( '% Comments', 'CURLYTHEME' ));
			     				$comments = ob_get_clean();
			     				
			     				$output = __( '<div class="meta-data"><span class="by-author">By %1$s</span> &nbsp;|&nbsp; <i class="fa fa-time"></i> %2$s &nbsp;|&nbsp; <i class="fa fa-th-large"></i> %3$s &nbsp;|&nbsp; <span class="no-wrap"><i class="fa fa-comments"></i> %4$s</span></div>', 'CURLYTHEME' );
			     				
			     				echo sprintf( $output, get_the_author(), get_the_date(get_option(THEMEPREFIX.'_blog_date_format')), get_the_category_list(', '), $comments );
			     				
			     				 ?>
			     			</div>
			     			<?php if(get_option(THEMEPREFIX.'_blog_single_image') == "true") the_post_thumbnail('large', array('class' => 'featured-image img-responsive'));  ?>
				     	</header>
				     	<div class="entry-content">
				     	
				     		<!-- Content -->
			     			<?php the_content() ?>
			     			
			     			<!-- Tags -->
			     			<?php echo get_the_tag_list(__('<div class="tag-list"><p><strong>Tags:</strong> &nbsp;<span><i class="fa fa-tags"></i> ', 'CURLYTHEME'),', ', '</span></p></div>'); ?>
			     			
			     			 <?php wp_link_pages(); ?>	
			     			
			     		</div>
			     			
		     			<!-- Sharing -->
		     			<?php if( get_option(THEMEPREFIX.'_general_sharing_box') == "false" ) : ?>
		     			<div class="social-box">
	     			    	<p><?php echo get_option(THEMEPREFIX.'_general_sharing_box_text'); ?>
	     				    <span class="pull-right">
	     				    	<a rel="nofollow" href="http://www.facebook.com/sharer.php?u='<?php echo urlencode(get_permalink()); ?>&amp;t=<?php echo urlencode(get_the_title()); ?>" data-toggle="tooltip" title="Facebook"><?php echo do_shortcode('[icon icon="facebook" boxed="yes"]') ?></a>
	     				    	<a rel="nofollow" href="http://twitthis.com/twit?url=<?php echo urlencode(get_permalink()); ?>" title="Twitter" class="tw tipsy-top"><?php echo do_shortcode('[icon icon="twitter" boxed="yes"]') ?></a>
	     				    	<a rel="nofollow" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" title="Linkedin" class="li tipsy-top"><?php echo do_shortcode('[icon icon="linkedin" boxed="yes"]') ?></a>
	     				    	<a rel="nofollow" href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" title="Google" class="gp tipsy-top"><?php echo do_shortcode('[icon icon="google-plus" boxed="yes"]') ?></a>
	     				    	<a rel="nofollow" href="mailto:?subject=<?php urlencode(get_the_title()); ?>&amp;body=<?php echo urlencode(get_permalink()); ?>" title="Email" class="em tipsy-top"><?php echo do_shortcode('[icon icon="envelope" boxed="yes"]') ?></a>
	     				    </span>
	     				    </p>
		     			</div>
		     			<?php endif; ?>
		     			
		     			<!-- Author -->
		     			<?php if( get_option(THEMEPREFIX.'_hide_author') == "false" ) : ?>
		     			<div class="about-author">
		     				<div class="row">
			     			    <div class="avatar-holder col-lg-2 col-sm-3 col-md-2">
			     			        <?php echo get_avatar(get_the_author_meta('email'), '72'); ?>
			     			    </div>
			     			    <div class="description col-lg-10 col-sm-9 col-md-10">
			     			    	<h4><?php the_author(); ?></h4>
			     			        <?php the_author_meta("description"); ?>
			     			    </div>
		     			    </div>
		     			</div>
		     			<?php endif; ?>
		     			
		     			<!-- Comments -->
		     			<?php if (comments_open()) {
		     				
		     			 $fb_comments			=	get_option(THEMEPREFIX.'_fb_comments');
		     				if ($fb_comments != "true" ) : comments_template(); 
		     				else : ?>
		     			
		     			<div id="fb-root"></div>
		     			<script>(function(d, s, id) {
		     			  var js, fjs = d.getElementsByTagName(s)[0];
		     			  if (d.getElementById(id)) return;
		     			  js = d.createElement(s); js.id = id;
		     			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=233653370014075";
		     			  fjs.parentNode.insertBefore(js, fjs);
		     			}(document, 'script', 'facebook-jssdk'));</script>
		     			
		     			<h3><?php _e('Comments' , 'CURLYTHEME') ?></h3>
		     			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="470" data-num-posts="10"></div>
		     			
		     			<?php endif;  } ?>
		     			
				     </article>
				     <?php endwhile; ?>
				 <?php endif; ?>
			 </div>
		</div>
		<aside class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-4">
			<?php if(function_exists('generated_dynamic_sidebar')) generated_dynamic_sidebar('sidebar_blog'); else dynamic_sidebar('sidebar_blog'); ?>
		</aside>
	</div>
</div>
<?php get_footer(); ?>