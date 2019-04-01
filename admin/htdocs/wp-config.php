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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bitnami_wordpress');

/** MySQL database username */
define('DB_USER', 'bn_wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'bd83090f78');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'cec7a3d76cf62fda6f4f2e3033ff5b3c378258bf5bb5a48d146f817f7c8d591d');
define('SECURE_AUTH_KEY',  'f1563e2adacfab29066a73e3c2407895a187dd3b41e5a35094367d509eaf12f9');
define('LOGGED_IN_KEY',    '9cd539760c34d578b63c7daea8354f76cb7e432a92222f6115724a531f08db6e');
define('NONCE_KEY',        'fbd81488032d8e41095713e8c71a4fc9f6fcc0f4711c7101f6adebdebb4bf5d2');
define('AUTH_SALT',        '9ace2544e5ec901ab8a5143a77fac2ab511b7fe8c141aa42edf1a900d5209a3f');
define('SECURE_AUTH_SALT', '7ee6f499ad4bb28a7d8f92c97b37fee96bde996cf794bad9f795eecf0c060030');
define('LOGGED_IN_SALT',   'fd4c6fd198e646761df2a50190923e371cab4a48449b210fdf773b35ea292a16');
define('NONCE_SALT',       'bcfe255eccbfff0bd294a33f8f93b86a9ba052d66a7c6712f8f7aab3de9ce40a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/

if ( defined( 'WP_CLI' ) ) {
    $_SERVER['HTTP_HOST'] = 'localhost';
}

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', 'C:/xampp/apps/wordpress/tmp');


//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/

if ( !defined( 'WP_CLI' ) ) {
    // remove x-pingback HTTP header
    add_filter('wp_headers', function($headers) {
        unset($headers['X-Pingback']);
        return $headers;
    });
    // disable pingbacks
    add_filter( 'xmlrpc_methods', function( $methods ) {
            unset( $methods['pingback.ping'] );
            return $methods;
    });
    add_filter( 'auto_update_translation', '__return_false' );
}
