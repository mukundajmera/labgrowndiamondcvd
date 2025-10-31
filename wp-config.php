<?php
define( 'WP_CACHE', true );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u148392290_rC5cd' );

/** Database username */
define( 'DB_USER', 'u148392290_vwkTA' );

/** Database password */
define( 'DB_PASSWORD', 'FPhGm0mbLu' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          '8xDpm]a*<.6vu]z>?_#{B-oe81h83&&K_o}B@@~9n84q)J5XwR>Vk)!wes%0G4)A' );
define( 'SECURE_AUTH_KEY',   'I)3oY6Pw$S<01mKwm#4.`Q8v*eXM%3GOaaK!I6J}.j0fKd{?6[REb}tS/>T-wr$>' );
define( 'LOGGED_IN_KEY',     '@Ya:>2B@[i+[GyK(FgY*aF%*56zQOmwTFySR|PmaGRUMHc6f>uiQT+ gHSno ~q8' );
define( 'NONCE_KEY',         'E6Y{0%o+E|J4=7L}X1K1=L?Ocvw$,gP8FIr{wpH_R#004uvoFFIuxe3^<qLI62.;' );
define( 'AUTH_SALT',         '4]ef}p]QjhyxdF90/oKyYtPi$(>9wyVt,k&S43Zx70v>.c:jws[3UF}M%Z_nqCqO' );
define( 'SECURE_AUTH_SALT',  'yBdg{BfZ5},00  WgW<rC5bljWriLZuUM:8UU0NqAbI@qnmC{$2K^M4g-|*u. tZ' );
define( 'LOGGED_IN_SALT',    '6nF}ol9DM8zjp@^$AP=#1%bQo{2Fc]g}tYXe#6GD4I|xP7Eu^)[%<!,Omm-;]})D' );
define( 'NONCE_SALT',        ']>2(i2*[C0Dzks[fbiJVk604N>Q@--F<h@?f=G7#({KZYrd]5eP9,54}n}hPDTmr' );
define( 'WP_CACHE_KEY_SALT', 'x`X_(a(J{b2;goP!a4Nm~}3O^]J&>U|+k=UTU5[QVnJh+89?)51;N!CX( /Re1Qc' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '2de3ddf870a1d54ff0410872a833f158' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
