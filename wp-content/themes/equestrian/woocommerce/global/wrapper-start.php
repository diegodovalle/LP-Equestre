<?php 
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; if(is_active_sidebar('sidebar_shop')) : ?>
<div class="container page-content">
	<div class="row extra-padding">
		<div class="col-lg-8 col-md-8">
<?php else : ?>
<div class="container page-content">
	<div class="row extra-padding">
		<div class="col-lg-12 col-md-12">
<?php endif; ?>		