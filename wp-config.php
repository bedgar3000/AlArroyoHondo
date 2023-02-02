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
define( 'DB_NAME', 'alproyectos-landing' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'ikQ24pOjveNIEbdRKe8c6aOkU6BwlT0ozugkczR9HinEqn2KAfxK5jl68to3ayZs' );
define( 'SECURE_AUTH_KEY',  'lg3AYsCZZTkrIpop3F5eCY6YLXl0O5xwp4vSTDpZRweMv6YxwsGCkS785zFoMy7i' );
define( 'LOGGED_IN_KEY',    'lmT6uSzspUtz1pllTHuTZTKKrHjdO4fVQ8xUcKLI1nzlb34cxPc2G6aNMfjYIOPv' );
define( 'NONCE_KEY',        'iN5sdZQvIBPvLYP3PVMO55fPMaH8VCDTrdaUIZJcaxRL2snDFuptdzRLZ4IXgDMs' );
define( 'AUTH_SALT',        'myC7wHuofUKPBqedzLidKK7jNbekQ1GKHgCXOYsak8ftwWcxyycPouj0bAB8zmiV' );
define( 'SECURE_AUTH_SALT', 'MrUvewpBmsZHVhdgg6UG22qeEGlULC5AvDiHgjktwDlsBPFLKX9pBqkq6SjXq23i' );
define( 'LOGGED_IN_SALT',   'ur5jNhQU6Ut978JPh8BZG4z22xpigvxzEZnCegsrXE0qr29AoxaSxpEUKz5MmBmE' );
define( 'NONCE_SALT',       'FMuFPkZTbcInydNPddb0ahRRdHeiztj1AytgOc9vhbqpSKFw7vq4ODe3o6sSEKLd' );

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
