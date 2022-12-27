<?php load_template(trailingslashit( get_template_directory() ) . 'head.php') ?>
<body <?php body_class(); ?>>
	<div class="site">
	<header id="header" class="header-01">
		<div id="header-holder">
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
			<div class="pull-right hidden-xs"><?php woocommerce_breadcrumb(); ?></div>
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<h1><?php woocommerce_page_title(); ?></h1>
			<?php endif; ?>
		</div>	
	</div>
	<?php endif; ?>