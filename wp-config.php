<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_a73');

/** MySQL database username */
define('DB_USER', 'wordpress_a1');

/** MySQL database password */
define('DB_PASSWORD', '9#7vJOXje1');

/** MySQL hostname */
define('DB_HOST', '208.91.199.11:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'qVRqXDJ0Euc#nmVQ4&#y864RUCEAr^iCdv9v1T$lZrFiysA0mvBzfkDO**p)3NJG');
define('SECURE_AUTH_KEY',  '$TBoo*xh^qc7QigGGRrdU0N*&uH%l7#l59C7#UQXm3^^PQxa)u1dptePpL#G3MSL');
define('LOGGED_IN_KEY',    'KFMkz(E98e6)y7lc8PzHF$N^MSEDC2FD(RBB3kx5epufLaTLJBhOj*hkW&MoFAAB');
define('NONCE_KEY',        'ziEy*LusDxbXo4Ga8Jacsd7$xs7Ije1dX9x1@JVlGmfac9C#$WS*cKnZGS$DgvW)');
define('AUTH_SALT',        'yUM%RMQAF9Oz#PWy@^2nq$d1^Y$e(@bu5nZP$FstfZMIUJcE^heyOYnTgTfgaXmN');
define('SECURE_AUTH_SALT', '$5TPvPnzUf76WVPtBD3VSgniF*h3jrtpGUZ320fsq5^jC7^Lc$67Isb)dJJXyygG');
define('LOGGED_IN_SALT',   'HqoRW!NKxCPAi(2AoULuvFSjupTW96DN227Hc!vAW7vMqm)9OCCU3i2aE1EqNp$g');
define('NONCE_SALT',       'gHZtTh)x77euUgfQjJ@4R1Sufw40bQUPgZ84B0VyK$9FS#Qe1@TpA7ri6&jio60Y');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'en_US');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

//--- disable auto upgrade
define( 'AUTOMATIC_UPDATER_DISABLED', true );



?>
