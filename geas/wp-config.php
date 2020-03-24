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
define( 'DB_NAME', 'geas' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'z#!1bo+^G$g9X:t _5Jv?3l~=iEcqA6!8l0b<(%*NW([IW@q]8V(0xNluan8aR,%' );
define( 'SECURE_AUTH_KEY',  'flqzh{ka&hlsY3Qy=Ml%)FWgi))VQx(O26gn@W18E?DDwv|2k;oNq^^vcEF<LPQn' );
define( 'LOGGED_IN_KEY',    '.Iu@Tqe1T9pi2>96={<K*rH); N~(o:ra@%lE]8+]0W@M>^N@P_7{k1 Dyt xgP4' );
define( 'NONCE_KEY',        'n3LS2P@rH%zZB)%m]t^dbZ?*$98&DFO*Zz}.W6JNaJI]x_et^+C[C@;RZt-E2v*O' );
define( 'AUTH_SALT',        '>:!m&qYoJ=o83DVpHD:L?<Y)&`N%FrQl~G0rz+acs.I5}:uT>H3(218xxdB8xVEh' );
define( 'SECURE_AUTH_SALT', 'TmSk`bZ%0^cJ6h>Q(m?2l0jsN+2@)X@Fbv8x4[xfXP[iH)}}w1jWj.I7bp=.JTQI' );
define( 'LOGGED_IN_SALT',   '_k2,}JRW:q,q~rynir!z0Dp.qvo<W|NOTe_WP9*ftB8@-BbLt@rWU`15&$%?!l<*' );
define( 'NONCE_SALT',       'P#?v[6;CfF?&saKPX#IH?~nQHfoAZsx& Y>JmcU{rh;3GEz[r#NbZUfCD3[&BErv' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'geas_';

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
