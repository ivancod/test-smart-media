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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-test' );

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
define( 'AUTH_KEY',         '_0Pc)xOO#d2Gai9PBVZh{@p:cUI5g@R7ZJCU&) :@=[Q{PG4yjlJDf<I@^h.<I-7' );
define( 'SECURE_AUTH_KEY',  '|SU!=f::5/gaqI0uypvgOa.MZ90vU?yCH6_:n:u^VdL5)rE^~-[D*WCqw-TMWlf{' );
define( 'LOGGED_IN_KEY',    '7hw`oD.x|b|D7_bvup$+De>!x9-{:o/3R(M5^64;Fj#U4[| |C67qf1Pe~q!zOGo' );
define( 'NONCE_KEY',        '3#]mu%1~5~/]ma]>U,XLNmg-G>Gcb|;`$50I@yx!@<<?Fz<gao4Q[2wBVe;Z<8&)' );
define( 'AUTH_SALT',        '[8VG33R!F)xK8GUKS+.qVH05cr]#q)2`;# ]!Lq2gLjs;oH#WAum9< Itas [|>g' );
define( 'SECURE_AUTH_SALT', '(tf09&IL}%5_Ca84.+-h9(ZVoSOMkg#%L|)T1PBU!d2Fq:UOGpvPxp%,-!eI4=E7' );
define( 'LOGGED_IN_SALT',   '=:5EByZWg{CAVZz@XX-uUCw-G5Keo Ll/zij/}O![yGx2kBneHUK}|FUFq&<73*E' );
define( 'NONCE_SALT',       'dw7pWFZk.-9/XLH*MOM6I3Jao*HiAAG_liY,9YGZ:+|R)Ifp=I-C&Y`oL~7 H`T[' );

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
