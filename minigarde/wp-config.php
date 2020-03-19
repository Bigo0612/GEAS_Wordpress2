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
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define('WP_POST_REVISIONS', false);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'IK(eBbt8@F/2V5V/rt}0SAzT G#?G}m@9F6;qjWGa>65tceD#(O=1=tt$)Or*1m{' );
define( 'SECURE_AUTH_KEY',  '$h[1Oq*:&9Vf)]hLbRJf3rV?#$!iiIz_LdQ^CP1+Ke,su.5r)_N{i.}T7olsiB]$' );
define( 'LOGGED_IN_KEY',    '`E:ds5?foy(~uWm@,Odj!??+I}b],[|_8Sw3y8!FgG>S<9LwaTVJSurN~Y5&!`w>' );
define( 'NONCE_KEY',        '~xPFDZEMoj+3$XOfohkP-ooDfRoCL1jQz27o<T=Eg~Wc&k$0Ij7 NV4^]`Dj@K}y' );
define( 'AUTH_SALT',        '3gFE8URRme!Q@Sg6il(eu8_/*k#53>5N)|x}&KFcd4Z^^[[~G_p{;Qid[C-TRsC6' );
define( 'SECURE_AUTH_SALT', '7,MA8*nD,sCYfG@qh#C{UH6dD)#0N-JaNmP%>A*KZot(WzGunQ.+]yA<3_tIE=v?' );
define( 'LOGGED_IN_SALT',   'PH8I<yDDn,[LD8j{)^At:tziCc+ja.=N>HODz=%p(0mF7z(-1T06 y|<ff]%7#4Y' );
define( 'NONCE_SALT',       '[;C[E&2SljN}mpvX|/_8{2ONi2Sxc5>xm5#>Aja9/vcx%EAerW?Z6p?%r&{^5FDf' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
