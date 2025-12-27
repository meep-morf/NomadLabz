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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
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
define( 'AUTH_KEY',          'vi^Btd)w,3Ap@+!s5pH|{Lf6+|)IOQSt$.-rt2W4X9C}jJlLqby$-F$]OmRj2r#N' );
define( 'SECURE_AUTH_KEY',   ';^L^U%J8TW_(C<g4V<=^-D)EuVFl?.o@z{)F4?grah:io^i_%ztMli*1Y9[)&lc!' );
define( 'LOGGED_IN_KEY',     'BJzx!Tv`/0yLzKu9#(vp2nGWR}>.P>+jL`%~q6-{r~5lG&wtjuyS[gZ/oUxm;t4~' );
define( 'NONCE_KEY',         '@jpve>:Bg3ZPGbc2>Nq3fyv#wI6+3E3]4NURe]rz/v)**[V^e=$Hsi>:XzQWF%K,' );
define( 'AUTH_SALT',         '@F;jEln5}nINd3?$#u+V`5f?>U8/3y=@G4{Xv&v4W<t-_-oL!+vy_w?]U.1qS%_$' );
define( 'SECURE_AUTH_SALT',  'nBKM_WJwu605ZB]8Ou9g-ym.!=)HS#g0(qH}9+YAFQ94`>|ZwtJo(e)xG$#I!H4D' );
define( 'LOGGED_IN_SALT',    'a)pGP?SB31$kE=)^gl9_r4.h1DkBJ*n?n?-jHFN:Ji!?ty[h4BWem6c(rTtGnEN(' );
define( 'NONCE_SALT',        '}E_}Iz5$G#BBk$z|$,SVP><Mn.4BQipwqGLmO;aR3x~6}{yf!m=!(bwk`DDow.W:' );
define( 'WP_CACHE_KEY_SALT', '!)N}vn.i.o`~lgP6K-Tu,G7crl<yi?cs[w)pM5T@GW!]; fDaWuLcjTMR:T[u7]A' );


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

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
