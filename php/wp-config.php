<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'jwtdigitaldb');

/** MySQL database username */
define('DB_USER', 'jwtdigitaldb');

/** MySQL database password */
define('DB_PASSWORD', 'hot0rNot');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^UOp1W*JUsy5RGa@+ci[(^?5aCTe)nn5u/= :?bx$%%wkl7.I@.59{hJ`&BVIgor');
define('SECURE_AUTH_KEY',  '1C}D6-;XD`nPS3-rUB?m2A%q3cK)+.dCWV?8$(F6QN#*^3ocUb}loqj_0Ukm96!]');
define('LOGGED_IN_KEY',    'D?F;U9_A8>?y8v_g5[n[K}/ggu6,7,X+BCwZ~bmnE,e*.vsYe)52N,y/yIINBYEK');
define('NONCE_KEY',        ' upHT]eR_zUYjuj35zMM8Kp,cji;Q9,-oI`>?;bbJ&jCL-eDOltd=]@**aob)N+#');
define('AUTH_SALT',        'jh0FdF;h(LA*E8#} 0v*R:e0+a#ZaE!aUaQ?A@:B<*HUV4dSu.yj{I8o%oBuIY7C');
define('SECURE_AUTH_SALT', '~%D?qjQ4!TYxzZ(&jzm. 4}kKC79_Y1:i`PNc&/!MPX[6bl>/OD5v[2pg@bs[pA%');
define('LOGGED_IN_SALT',   'A,s0EQmdMJ<AulSXh$qQq=y<U,f}7Y-}:w%QDPE7G~=/!bkctIWQPM47?Ol<62`E');
define('NONCE_SALT',       '@I8!*@-z(&?3NaQu*t;&DxmzKgzov[JoF*L@69.F{G-lky7 +AQ@azc$8<2`A$hB');

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
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
