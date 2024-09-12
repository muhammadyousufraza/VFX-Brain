<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'redcbltt_wp488' );

/** Database username */
define( 'DB_USER', 'redcbltt_wp488' );

/** Database password */
define( 'DB_PASSWORD', '-1Y..7H0pSGSpC!]' );

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
define( 'AUTH_KEY',         'y0xctcfbmyqtehihwzm4q5kvnhgmyhhoz8sq3gmkkmfkpfb8arfksfv5humvodvb' );
define( 'SECURE_AUTH_KEY',  'la5fzmrs3tgirgexvvxokt5zjjus9vdecyhphoq83wvbg3txlehnuhw7x5w4hksm' );
define( 'LOGGED_IN_KEY',    'xe1gw7mpz4dm69k2lelmascbgmlwy7t7ucbfk6fbombmywszjpn4dqybungozshl' );
define( 'NONCE_KEY',        'ce7qrhxpxfvzxznwx2l0y15tkho1wzvnsoolomn7hqd18bkg65qmeio2z5fafl6m' );
define( 'AUTH_SALT',        'sluey0lanme8mb3rjsrvid9xnjj3ahkpsjrij8cl7iuenovnyegongvfilbybygm' );
define( 'SECURE_AUTH_SALT', 'mmiildmffyxuurmxu897olcuabf3ngotxujdrlx6qwfjrrbux5va57zrwqnhbf9q' );
define( 'LOGGED_IN_SALT',   'xgefouazrwggm5prflkipddlnpetjolxr4yjxsqrz7pymohknehly60hf8av6umy' );
define( 'NONCE_SALT',       'wovpavu608nfon8m3yvjn4h46zwnxgi9bqbsadi51fcxtapyd27vg2m1ak3kv7l1' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp2a_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
