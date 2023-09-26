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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         ';^{xz^1*=4ys=);7m0t]@=N<O]b{vkRW(+z_m&I1:$&v!tLc]O^d8b<o.-frG9di' );
define( 'SECURE_AUTH_KEY',  '+=TUd-8_2]Mu`)NBtM0j]1[efGK,Or=~Gt}Ne~,Y_BQ+GW;{QnYsgRQd){)tf5l7' );
define( 'LOGGED_IN_KEY',    '6um:NH iG}>_7B;sGp0(8(*5r&viICx,s}ToIeK5{6,+#DII+_PZNUpUpF#gKFg_' );
define( 'NONCE_KEY',        'gu?OHVbNolY$7HIKl.%o/#;U9Q>|HL]7lxQo_XSwmzU VsVULy9$#^q@$8x8]a@Q' );
define( 'AUTH_SALT',        '8NC?tM@N1a0:qnnpI@+t<nF rEwfUk?Y_oFyhPx}|)u2P1)JRsfx*&-9#EvFaWy1' );
define( 'SECURE_AUTH_SALT', 'lmjUB7lcsvF5%^_LGHu6~;N_yL-df:OQ5Ojq|j}R!axJ!+sk&}f=a!DArL!sn.?h' );
define( 'LOGGED_IN_SALT',   '=wIYxlsMR063Mr& h$6>7[H,<DHNFn}XbY]?M`X+M*dg6,5#c4#N~`l@X`gK9:[8' );
define( 'NONCE_SALT',       'd!o:DdZGNq{_%>!.l+OUSt]lRsX4bhi^HBch^{0Fkfv~h~WbcSp93Svp+vD;ZaB%' );

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
