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
//define('DB_NAME', 'wp_gv');
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/content/48/7974148/html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'genesisvilla');
/** MySQL database username */
define('DB_USER', 'genesisvilla');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '');

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
define('AUTH_KEY',         '2^+[64g=0O*_Zo!IH=cO/cP??w<n8sl`W;44**kK[e{&)H:?tvh]^=$9ThP#`jlw');
define('SECURE_AUTH_KEY',  'jM~pX-7Utyg41Z*@ty.uyW^p,vPd0*}LTUZ.7jfbJDkP6DgWrfu2Vb<y;_$#QLw}');
define('LOGGED_IN_KEY',    '&O7]:$H)#u5X?c )@nb;c`}hIP*&TApdG+NPXXp3.Ol,.pL-*2)y|)9|ZOT&RcBP');
define('NONCE_KEY',        'W_t{9+:evXk$>,07x,hdZ,FTO2oV0/px|(76[.!@H<LJlIv/V@;*R69*Do?[Kh}+');
define('AUTH_SALT',        'SilO.K]b=8/=7Rp0,3ZR?+|>n<!)tWZ*)8D+a3 6G$2E:5HU=*+d}U)Zx$J?1-.v');
define('SECURE_AUTH_SALT', 'PZ8TfwV|K`~2?#(HOI|s,r>s.N,qeT!k9=[!#4!u/KxBwd}P5PuS(R?aDx]A oUa');
define('LOGGED_IN_SALT',   '397 .].jtkOD<Ngp&<UpnsUx^0Z5piL>viWpG;C9Nc|zp;RP$I(p/DsLj4neB*nO');
define('NONCE_SALT',       'Q51v.nFX!d*&^6Qoc9D}2t3OGf]$wS3;0qnD,bqVn)$7o|56fP,KaSSrsy>h}(3i');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'en_EN');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('WP_POST_REVISIONS',false);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
