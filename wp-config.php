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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tech arabica' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'so.S5WP&sAxH:kSz3iW|Z01a&Je[q2lmZXExxW).n:j|!0cY|`vJ(Y7RucfW)B8y' );
define( 'SECURE_AUTH_KEY',  'PL[_0c&h07bXpP/AL2jc{LC/>F4FG`te9ubpm *dVIf]j#d9ttzG$R]l^1ShU-;$' );
define( 'LOGGED_IN_KEY',    'tx#ibWFGz)NAOq%GQpcD,1;1<$4yAotY)/ KsLRPr^KP6<d_9w#fI7NIqJS18CCo' );
define( 'NONCE_KEY',        '7}VuU_NpSN!jf+t~?0sKV-FwGB/{}1e&Qd`Nc4Xthvr2nU5k7q{~Eh/d/|@nMj96' );
define( 'AUTH_SALT',        '01^`0EPt[[+<l0`)~Hf^F`m>VM6<X3zOUN_*{cAU=/ {G0ay2)r]1%?](j!;_qP^' );
define( 'SECURE_AUTH_SALT', '1aUmp3yWRLWyDgcGx6.<(tyT2Av}ON[4 p` zv1_f#mSCY!)DEK7yL~q[i>iF0u|' );
define( 'LOGGED_IN_SALT',   '~6;qMPYg<y$;2nx..Msg1@Sx;7vgZ~)?OX5+(FJI8s2Afd4^,%*(V$432B?[FD{0' );
define( 'NONCE_SALT',       '>P@4cSLF>=|qUih:;)3iu#Se}1c07%aiPouzBMX9d|4C8X]!S%{-f,xnCR68!D96' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
