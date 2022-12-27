<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if(get_option(THEMEPREFIX.'_general_responsive', 'true') != 'false') : ?><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"><?php endif; ?>
<meta name="apple-mobile-web-app-capable" content="yes">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php $verification = get_option(THEMEPREFIX.'_seo_webmaster'); if($verification) : ?>
<meta name="google-site-verification" content="<?php echo $verification; ?>">
<?php endif; ?>
<?php if (is_page() || is_single()) { $desc = get_post_meta($post->ID, "seodescription", true); if(get_option(THEMEPREFIX.'_seo') == "false" && $desc) : ?>
<meta name="description" content="<?php echo $desc; ?>">
<?php endif; } ?>
<?php $pub = get_option(THEMEPREFIX.'_seo_publisher'); if($pub) : ?>
<link rel="publisher" href="<?php echo $pub ?>">
<?php endif; ?>
<?php $favicon = get_option(THEMEPREFIX.'_general_favicon'); if($favicon) : ?>
<link rel="icon" type="image/png" href="<?php echo $favicon; ?>">
<?php endif; ?>
<?php $iphone_favicon = get_option(THEMEPREFIX.'_general_iphone_favicon'); if($iphone_favicon) : ?>
<link rel="apple-touch-icon" href="<?php echo $iphone_favicon; ?>">
<?php endif; ?>
<?php $iphone_favicon_retina = get_option(THEMEPREFIX.'_general_iphone_favicon_retina'); if($iphone_favicon_retina) : ?>
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $iphone_favicon_retina; ?>">
<?php endif; ?>
<?php $ipad_favicon = get_option(THEMEPREFIX.'_general_ipad_favicon'); if($ipad_favicon) : ?>
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $ipad_favicon; ?>">
<?php endif; ?>
<?php $ipad_favicon_retina = get_option(THEMEPREFIX.'_general_ipad_favicon_retina'); if($ipad_favicon_retina) : ?>
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $ipad_favicon_retina; ?>">
<?php endif; ?>

<?php echo get_option(THEMEPREFIX.'_custom_head') ?>
<?php wp_head(); ?>
</head>