<?php 
switch (get_option(THEMEPREFIX.'_header_style', 0)) {
	case 0 : get_header(); break;
	case 1 : get_header('1'); break;
	case 2 : get_header('2'); break;
}
?>
<div class="container">
	<div class="row">
		<article class="not-found col-lg-8 col-lg-offset-2 text-center">
				<br><br>
				<?php echo do_shortcode(wp_kses_post(get_option(THEMEPREFIX.'_404_text', __( '<h2>Hold your horses! That page can&rsquo;t be found.</h2>', 'CURLYTHEME' )))) ?>
				<br><br>
				<!-- Google Script -->
				<script type="text/javascript">
					var GOOG_FIXURL_LANG = '<?php bloginfo('language'); ?>';
					var GOOG_FIXURL_SITE = '<?php bloginfo('blog_url'); ?>'
				</script>
				<script type="text/javascript"
					src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js">
				</script>
				<!-- [end] Google Script -->
				<br><br><br>
		</article>
	</div>
</div>
<?php get_footer(); ?>