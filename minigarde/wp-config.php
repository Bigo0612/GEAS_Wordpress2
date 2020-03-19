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
define( 'DB_NAME', 'minigarde' );

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
define( 'AUTH_KEY',         'ps(T|`SNM%Yr^%NYDRujbYF>]O;(-AYCe`nkm4&Fz1a7es?~|-DW=A`rzW%Y3/Az' );
define( 'SECURE_AUTH_KEY',  '.=f@mv)=C<t)XoYpUVq!/7S&T#AAYem-D9J:qy[HvA&NTxAJ.n@0eiC>AjRG-H/,' );
define( 'LOGGED_IN_KEY',    'wo6~Qk<ix}22FT}zm#xTaVV#Sh^1#az8.k>|O<$=*<Jwq:j3#x6q}&%Z%R~s)7@E' );
define( 'NONCE_KEY',        'G@2%i<%`YDTvy|]k6|ZXnTi/y O[>Nn$2M;{ L3E0,rETPv8v&6g(bZBoxDH_tc3' );
define( 'AUTH_SALT',        ';gC{{1Ho?$Udgdh;wSG7D*a@/nQ+wKDf3&_/SJPC}L82SjIe*uis+)a8Y{BWr]Tp' );
define( 'SECURE_AUTH_SALT', 'sB=Ec2js8kA_k=9xM?zvz!uR4S#NL0TAzsSv8me!cNgO~v|fbclH/Js_j,8Nop D' );
define( 'LOGGED_IN_SALT',   '7s{.)j;Y=-yAJqQuq})3l8h{@Ux8J>O|v($Bk5XklkW0OR-_@D!im 8D$=)(B <$' );
define( 'NONCE_SALT',       '2Ov(?Zn}EkM#P@w(ayeT4&{d 0_ffZYo@ordbR`_`7=jUX7<XP O(/!)}0uNKX0X' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mini_';

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
