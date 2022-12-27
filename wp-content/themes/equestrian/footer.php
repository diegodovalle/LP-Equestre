<?php if (is_active_sidebar('pre_footer_sidebar_left') || is_active_sidebar('pre_footer_sidebar_right')) : ?>
<aside class="pre-footer">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'pre_footer_sidebar_left' ) ?>
			<?php dynamic_sidebar( 'pre_footer_sidebar_right' ) ?>
		</div>
	</div>
</aside>
<?php endif; ?>
<footer>
	<div class="container">
		<?php if(is_active_sidebar('footer_sidebar_left') || is_active_sidebar('footer_sidebar_center') || is_active_sidebar('footer_sidebar_right') ) : ?>
		<div class="row footer">
			<?php dynamic_sidebar( 'footer_sidebar_left' ) ?>
			<?php dynamic_sidebar( 'footer_sidebar_center' ) ?>
			<?php dynamic_sidebar( 'footer_sidebar_right' ) ?>
		</div>
		<?php endif ?>
		<?php if(is_active_sidebar('absolute_footer')) : ?>
		<div class="row absolute-footer">
			<div class="col-lg-12"></div>
			<?php $logo_footer = get_option(THEMEPREFIX.'_logo_footer'); if($logo_footer) : ?>
			<div class="col-lg-2 col-md-2 col-sm-3"><a href="<?php echo home_url(); ?>"><img src="<?php echo $logo_footer ?>" alt="<?php bloginfo('name') ?>" class="logo-footer" /></a></div>
			<div class="col-lg-10 col-md-10 col-sm-9"><?php dynamic_sidebar( 'absolute_footer' ) ?></div>
			<?php else : ?>
			<div class="col-lg-12"><?php dynamic_sidebar( 'absolute_footer' ) ?></div>
			<?php endif ?>
		</div>
		<?php endif ?>
	</div>
</footer>
</div>
<div id="back-top" class="hidden-phone hidden-tablet"><a href="#top"><i class="fa fa-angle-up"></i></a></div>
<div id="menu-overlay"></div>

<?php $analytics = get_option(THEMEPREFIX.'_seo_analytics'); if($analytics) : ?>
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?php echo $analytics; ?>']);
	_gaq.push(['_trackPageview']);
	
	(function() {
	  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>    
<?php endif; ?>

<?php echo get_option(THEMEPREFIX.'_custom_body') ?>

<?php wp_footer(); ?>
</body>
</html>