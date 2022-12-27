<?php load_template(trailingslashit( get_template_directory() ) . 'head.php') ?>
<body <?php body_class(); ?>>
	<div class="site">
	<header id="header" class="header-01 header-02">
		<div id="header-holder">
			<div class="container">
				<div class="row header-text-row">
					<?php
						// WPML Language Selector
						$lang_selector = curly_language_selector_flags();
						
						// Left & Right Texts
						$header_left = get_option(THEMEPREFIX.'_header_1st_text_line');
						$header_right = get_option(THEMEPREFIX.'_header_2nd_text_line');
						
						if ($lang_selector != null || $header_left != null || $header_right != null) :
					?>
					<div class="col-lg-12 clearfix">
						<div class="row">
							<?php  if($header_left):  ?>
							<div class="col-lg-6 col-sm-6 col-xs-12 text-left header-info"><?php echo do_shortcode($header_left); ?></div>
							<?php endif; ?>
							<?php if ($lang_selector != null) : ?>
							<div class="col-lg-6 col-sm-6 col-xs-12 text-right header-info"><?php echo $lang_selector ?></div>
							<?php elseif ($header_right) : ?>
							<div class="col-lg-6 col-sm-6 col-xs-12 text-right header-info"><?php echo do_shortcode($header_right); ?></div>
							<?php endif; ?>
							<div class="col-lg-12 clearfix"><hr /></div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="container">
				<div class="table-row">
					<div class="table-cell text-left">
						<?php echo curly_get_logo(); ?>
					</div>
					<div class="table-cell">
						<nav role="navigation" id="navigation" class="text-right">
							<?php wp_nav_menu(array('theme_location' => 'menuMainMenu')); ?>
						</nav>
					</div>
				</div>
			</div>
		</div>	
	</header>
	<?php if(curly_check_heading() != "false") : ?>
	<div id="page-heading" class="header-01">
		<div class="container page-heading">
			<div class="pull-right hidden-xs"><?php echo curly_breadcrumbs(); ?></div>
			<h1><?php echo curly_get_page_title(); ?></h1>
		</div>	
	</div>
	<?php endif; ?>
	<?php if (is_home() || is_archive()) : ?>
	<aside class="blog-sort">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-right">
					<h6 class="pull-left"><?php echo __('Sort Articles', 'CURLYTHEME') ?></h6>
					<ul id="filters">
						<li><a href="<?php echo get_permalink(get_option('page_for_posts')) ?>/" data-filter="*" <?php if(is_home()) echo 'class="active"'; ?> ><?php _e('Show All','CURLYTHEME') ?></a></li>
						<?php
						$categories =  get_categories(array('number' => 4, 'orderby' => 'count')); 
						 foreach ($categories as $category) {
						 	$option = '<li><a href="'.get_category_link( $category->term_id ).'" ';
						 	$option .= (is_category($category->term_id)) ? 'class="active"' : null;
							$option .= '>'.$category->cat_name;
							$option .= '</a></li>';
							echo $option;
						 }
					?>
					</ul>
				</div>
			</div>
		</div>
	</aside>
	<?php endif; ?>