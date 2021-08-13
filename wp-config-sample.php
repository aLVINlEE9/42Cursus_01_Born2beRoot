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
define('AUTH_KEY',         'J!yyr-%lp&}jSXaS8BCM}[7]2_M^ek|D+/k(A7L 7arZjR[@mJ%dtks$5mv&T1c3');
define('SECURE_AUTH_KEY',  ' %jzP8zvIE<fY^mO QrMrZo+ur$C`.~b:Qj7A6O|TvD:ra![<XG~Grb)kI:o5/`0');
define('LOGGED_IN_KEY',    'kiIIm8?9H<@4GmmcJq|qAIw`-hHu@7zxi*~v?l|rh,~{+;0A,j-<q4u=.ZuH|:pe');
define('NONCE_KEY',        '87CP3L=3x`3a@]_P**h^7UB6g]xjiOkeGi zpZYw2=]@tC Ct_-JfI]x+mWOy4yu');
define('AUTH_SALT',        '|nl#Um(X)0`5Wb{m$I%yuc>X~&Qvv+]{&vFUDy$UB[82A-D+|<N~/]@:cFO-4U5j');
define('SECURE_AUTH_SALT', 'L]Ul-sngT)Lp~72u.QAx6*:Ec5 @+)~jiGa6g%7j&Xueb hu|wR6N5|3L&C=spPQ');
define('LOGGED_IN_SALT',   '$KmjQZaY!Btt|,*AaIrwNjmo+ML6m6+(5OaxKbN+-3)3mFW.}k4r6pf`77LPCrE^');
define('NONCE_SALT',       '*<#(C5s8U+-_A88Dv5$VR2T!e};p9i6}6)%?M@Y #<1<dzvh`F8,l:,Q0BOY^Y|9');
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
