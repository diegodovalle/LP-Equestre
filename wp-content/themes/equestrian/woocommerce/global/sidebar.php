<?php 
/**
 * Sidebar
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; if(is_active_sidebar('sidebar_shop')) : ?>
		<div class="col-lg-4 col-md-4">
		<?php dynamic_sidebar('sidebar_shop') ?>
		</div>
	</div>
</div>
<?php else : ?>
		</div>
	</div>
</div>
<?php endif; ?>