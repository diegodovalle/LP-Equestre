<?php 
switch (get_option(THEMEPREFIX.'_header_style', 0)) {
	case 0 : get_header(); break;
	case 1 : get_header('1'); break;
	case 2 : get_header('2'); break;
}
?>
<?php curly_get_slider(); ?>
<article>
	<div class="container page-content">
		<div class="row">
			<div class="col-lg-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content() ?>			
				<?php endwhile; ?>
				<?php if( get_option(THEMEPREFIX.'_general_sharing_box_pages') == "false" ) : ?>
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
				<?php if (comments_open()) {
					
					if (get_option(THEMEPREFIX.'_fb_comments') != "true" ) : comments_template(); 
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
			</div>
		</div>
	</div>
</article>
<?php get_footer(); ?>
