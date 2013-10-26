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
define('DB_NAME', 'wpniknaz');

/** MySQL database username */
define('DB_USER', 'wpniknaz');

/** MySQL database password */
define('DB_PASSWORD', 'JKYY2nVnjEmrrZan');

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
define('AUTH_KEY',         'TE9PT#9@d|@/t>[3.qqqg-^|sWLh~~F1Yt}&oB4bsMUb6B7DTwD`%NIJ]:QlW?hb');
define('SECURE_AUTH_KEY',  '|P$+%U(1LnCV1-N7v:+A@pS$N%lxv;q`w1X{eg5jR29}Do`7hN:j>m8ssY:|:7,U');
define('LOGGED_IN_KEY',    'PEx!(U? U+>`~?d{fJ3Tl`~<%.eZGOQnY=`<^`o|=5TD#Jq95ee$F+}A_iJ+Y+QO');
define('NONCE_KEY',        'vj+s+:zK PU6pq$5DMDL%2r)w@DjT/@$~JuAI^~%N==.@V|WMJ2,x@p2qIV6O9XQ');
define('AUTH_SALT',        '*CJjCAFG|.s0ZvPgMO|KS>Bcr*MC$-6PY9)!}7p-DjN1[CuywGEgIq_=gW[-.h!r');
define('SECURE_AUTH_SALT', 'BbK,K(-5=7Zec?w(;0DPKf;_OKcl{BYG`t{pTz6;4pYiru<rAO-k)<]PLO44&Ue>');
define('LOGGED_IN_SALT',   'tDX,VV_>+8)@[ Fdt=1#r#(Ci;,-T47.$$|^&p~!(0|m9Di~RFla.v9)TV!L5;GV');
define('NONCE_SALT',       'dFVU+O7p+W,(vUm U6pr+|~ZGgqZ9WY`SLgnHQ=>T`auFU;vXzE6eg=}ipcIj>st');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_mainsite';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
