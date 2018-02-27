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
define('DB_NAME', 'cryptoshop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ';v(k}O8$kpM}[3PlV^<|m4$^ausclyl e./1;DwYU/vnzVcs8X=Va >4F4=2wE:Z');
define('SECURE_AUTH_KEY',  'Qh^,Ez><f;]:~J*xD)7*EnfZ>@WI8KK.Qh4)5@0xj^S+~:$z].}aKgm7LD~^>h+a');
define('LOGGED_IN_KEY',    'g+a/6I[BI>3a.&[AqF=;QX7`%tpWOG=m8RmFHB$o+T+.M:5L|tc`kz[Q~AWYwhWc');
define('NONCE_KEY',        'aVs$t4DnQsA.bt@?#$.27jf&s#+;K9tGC3fBpur3@`p4KA S,wl2)[U?wyf6m2c)');
define('AUTH_SALT',        'NVgHanMB0NyMz}0)IbN<kM&-k3pEIAlLR,LjuO#[0}&aEE~MC~CGck]={Z?ZX]pB');
define('SECURE_AUTH_SALT', '.>}L8[.-w{HjHPx8]+5WS.H?1#DSP-I8{%p-AM!psTw@UdjHXgG:t*,Fb*k>.>n}');
define('LOGGED_IN_SALT',   ':/W3MI#uj)j?C)Jqh4+&(4l|CQ<l%<(Y_qPQRW:b:Y!s_-is?g )huWp(o5gZ?W6');
define('NONCE_SALT',       'Mu/mzI6dY HCyd`doIZ$obJCs*nW%F<LW`*iSb<uoH&$;AV%37779FEA5;9GWh|g');

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
