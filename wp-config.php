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
define( 'DB_NAME', 'collectcall' );

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
define( 'AUTH_KEY',         '^5:u!U+%+e).(beau+veH%-S|GF$C;/f$v,!*J8rCqX,BPPK %1(AF@g([)sbgmo' );
define( 'SECURE_AUTH_KEY',  'B_P)!0ci612YdX0@$zL@/x`Hv*qN5SAmO*F[vdyBhZk9eu$2arV2a9gnY#Y>=Bk>' );
define( 'LOGGED_IN_KEY',    '}pb&sI!|(!Nn5<;q60~kid)KCtan.mNKqg)tOiB.;W37OT0d]^Jt=.~LfFVlfE:c' );
define( 'NONCE_KEY',        'CE>%Klf #GL>X6T_oaTPrlZ*ek<!(s;Q#T;1)X-z0u)6#17?TXPV%sn8TzRqB<c4' );
define( 'AUTH_SALT',        ':z.b>HM*?*t!E!#yF;I6WC=it]<:i_![kc.f5CHKhR8q-i4O1E{,lC?aDn3}{a1~' );
define( 'SECURE_AUTH_SALT', '5u;S/_%U:.W19@_C[vZ+mp`TZJAD%*m t1xqez8R_1@17kY@`y{d>Ry@cUZN5cI4' );
define( 'LOGGED_IN_SALT',   ' ILBf@^@+(cw8Az{BxDaYq?Qz+.Z23$~(s7cwy.1e26G8cf[9RC1eMv5Zcc94Dwm' );
define( 'NONCE_SALT',       'Q ==9b9B3.(.>&,!rVaAjWfAiW6LzRBdi*Y#@7jkuYA*9<!wXbOLU{AA.DjhOclM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_t2';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
