<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpdb' );

/** MySQL database username */
define( 'DB_USER', 'wpdb-user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp-pw' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&,++V>q5`z[IR+6t/^!yl/_eWL?2)>,Yp67tp)<|t2n^(OQ75@EsKezD{CFd ,R5' );
define( 'SECURE_AUTH_KEY',  'fCV6KNY l|aENXOK:}ej|i{2PC2(>(+.y^5Jm-$Eme.Azm+[A(vV26.i$b+Q5TwJ' );
define( 'LOGGED_IN_KEY',    'X+HS!@/&x8wHUdnQ$?(AAhQoB0w0_r-)8@J~v;Ow=;y6lo-j`lW{+XkOs+-`)&.V' );
define( 'NONCE_KEY',        '7FR;r?Z@(9IEgZW`;HJf}zd`&Mo:RM6I9,Ju_reLHlxU@e,x-O=/|[*?[Iz}M2`C' );
define( 'AUTH_SALT',        'd>]|w`V-cRpp)aZuDNL6B^ug@aU$#9/J66j4NRZ|O`o03Qr;2mNcn:0ood=-!q`B' );
define( 'SECURE_AUTH_SALT', '6UGAzf+YIUA!K,]4idI)%+=}V?kGeR4J,q%Nh@2]{ZVe{19-p5~Yv>${D5`u sXH' );
define( 'LOGGED_IN_SALT',   'TkTI:|hQc3rM<5@wJWft4Wi-~n[|fe]y+6I{ea}n,wJ4ISUhI~I&r-q`KMlfFP|j' );
define( 'NONCE_SALT',       'Gc]+~HZg4uI-C4=8q-||Mu{WG-vZ)0uQVx?]@ax#f_=fJ$_qSNOLgrW3F,gKJ|8U' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
