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
define( 'DB_NAME', 'cdue_dk' );

/** MySQL database username */
define( 'DB_USER', 'cdue_dk' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Milk3460' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']4h`gKeHY}(fQl3J._B)+qV34cW<WbUA(cRS766`PQ6T|p4$RMqnLYhz/p@fM)_5' );
define( 'SECURE_AUTH_KEY',  'g`52O,&Mjy^<p0?uez2ciD;wde9OPO21,6p&cT8}G^}@;[o! R6W#}XE8Tshc}Zt' );
define( 'LOGGED_IN_KEY',    '`m&|`AdLgZqT;tPOe7?}oIm>WmubF*u+bXHIE]y)rnM4b[CPZ_)T,Wss=Rs?~M,t' );
define( 'NONCE_KEY',        'FkT@%#62f5aW_A6^gZfi@mo;2r4<w%e:oA>2;JJGp;#9l |?EVANAGyi5oD!3xb0' );
define( 'AUTH_SALT',        'qC?PJ+YX$Es#N?<$s$lYlALWIDT2 !z>DX!ZfU}BFD[*jp}]WS`=;1~P&a&q?>_U' );
define( 'SECURE_AUTH_SALT', 'wuLK1N7co}/Ep^{hs!Sa-61kJb+ONRvBM19 hoqOQ@Jb,GKH.=(BBBoutcWOQ0ie' );
define( 'LOGGED_IN_SALT',   'zw.k&I,/qzDE>5t<)o@3CkTOI?hhYR=b@T}d14S)fq^wL?j$VuNd/,3lnuIGS]_F' );
define( 'NONCE_SALT',       ':f;n+hxVjG1!?5lKnaUd3&X^K78_]q*SnUhL;c!LJ6Ob=<_9}@G.CFotNVb&(xiZ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp1_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
