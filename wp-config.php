<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', '1qaz2wsx');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         's)O&_Qfx=AGO2TGNB~PCEX)gJV[=@V!KC@#e)a4hdU<z/XViUN2ciy?N{@tAs@~m');
define('SECURE_AUTH_KEY',  'kTye2VP6((e*]SUs~&b2-v6(IGlGP0)oI/Jd(.L}7y%X>x-;S!]mran.&h9Kb}q6');
define('LOGGED_IN_KEY',    '`dKCUrug=v(HN0q&]^T3LQ0Ye k-kIbYs|1:ziC$8Q=40DG #N[T3EU68Mvw:3;z');
define('NONCE_KEY',        'hwM<1Py*#B?/#[*3r)/;B%C/q*?s9^lol,syG@W3}tJ]j6BQ0v{j[}fN|Chq2UC]');
define('AUTH_SALT',        'w#+idoVMz&r7{E}!J_p3z~vDbn?w~ad.l_tYBz&#uEA7o|.DLh4yTs~7+9vziMmm');
define('SECURE_AUTH_SALT', '<*>UH0cu@(g<AJZ?%`G~.4;V-U(Dwb&G~aaKaI$iUX-/0XL1:#8{aO)KyDTfKQxj');
define('LOGGED_IN_SALT',   '}oS+CTQ_b>ZnzXInJ@Y|(pT82s,vM>tmr!@Qr|JS&bRG3CoX,nh:1cA;$+DS=Lq`');
define('NONCE_SALT',       'YZpoJwib`4iOQA6FS4}2f-|66k|v*h`M|%Y0}v^AbWH[b ]zY@+_+f2&=D80/6Ik');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

