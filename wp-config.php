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
define( 'AUTH_KEY',         'C9stOp}No&@EJ/ G%U2aN}+Gy}90a9_php%_1#Lergwd_PQxH~,Wrc@5K(JKhed1' );
define( 'SECURE_AUTH_KEY',  'HYs9IHHvI982D9Q(jB^xL_)D.R{7#g!/eN,%RH8gux~M=no}H]jzP0V;cUsp4PE_' );
define( 'LOGGED_IN_KEY',    'o%Zx4,1kGE%-.,U@zHO7Xoq.w$gOtCz;M%lsA9(W0z`D=[;f3gnrdnU*}e<;^P,`' );
define( 'NONCE_KEY',        '=_E ZklcqAL4S]n4C#_>WOwlF50X:~[|`6q3FI_@Ux.`s}VCvbL5H%pKHF+0BByK' );
define( 'AUTH_SALT',        'e+~sM7YK>B`9x]LriYEAcY-=M4fzW<jmZIVXKCTX4#UDGQ`S@xgK(%KgR2}Hbvrw' );
define( 'SECURE_AUTH_SALT', 'oo^6G|S=dijzGsw6([+hzI[W:sV<Xc-Lm[RbNHmTq(zw3>pJrS}gnO/M>eOff4>3' );
define( 'LOGGED_IN_SALT',   'erOY}c=Yxum)o{ej<tZ|hZrNw`qjL$LkTefbz4z.s>=(p(`26q}8%M>7ca<[):C;' );
define( 'NONCE_SALT',       '+e48UgU3@cN_0@y|uIZz58%Y]6fq/nnznicGR^^_m x(aywjFeCXm@:]^ Qw?Xr>' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
