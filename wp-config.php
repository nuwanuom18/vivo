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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vivo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'nuwansql' );

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
define( 'AUTH_KEY',         'o$?mk!^eW[Juab(sR0qb;TO+c0[W-AtwHuWQm3kMxIT;:)aW#q?BR1^nDbR/YGS#' );
define( 'SECURE_AUTH_KEY',  'GaGFZ,RxGUj/Jq[?r.N*`de}~cu$g@Y;n~`nlj|,UAp18k;.n+~ipHGjB78VU/iS' );
define( 'LOGGED_IN_KEY',    'z+0.ZpL#9wWc9oBq{nSDJF/e*>$1GYJy).FU&swq-cl$b0ZrBcR93KRC$Vg`3Rx%' );
define( 'NONCE_KEY',        '#?}@o;OhfSpXSKY[;|ET:/:Hz]!*i/Zo;),6hIWsgnySkKE:o@Wc|qTu.OMuW-C&' );
define( 'AUTH_SALT',        '%Wc3jxgsME-zDIKUAF<N<wQORyGC_K8AAK:f:YR~&oNqVtH2;$BF#@ Zy3-vG H}' );
define( 'SECURE_AUTH_SALT', '2)$-BD>^+IKe}vB3G6eI~?@BDf?}n`^;c{8&`@8PPgaQ9-~R/%RDg-]ga45WOL}!' );
define( 'LOGGED_IN_SALT',   '^B[&,$abB#-9MQw,?tk3|lh$0>:/QI!S}} l)dD^<4;{oq5RD?8){O$,RCP2peSX' );
define( 'NONCE_SALT',       '2J[0dY_bcJ*^{FaHqB[`YgVKJb=ps,L%}Q=/DkR^X#fFrWeIWdC2HK)fH,;XVJ[n' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_q';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
