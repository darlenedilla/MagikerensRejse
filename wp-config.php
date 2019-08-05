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
define( 'DB_NAME', '1221s_com_portfolio' );

/** MySQL database username */
define( 'DB_USER', '1221s_com_portfolio' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mku72szz' );

/** MySQL hostname */
define( 'DB_HOST', '1221s.com.mysql.service.one.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'K8cSrhpFgrJz1VCKIteuSPiXCxWolvTbiBDkzG5Yy7Q=' );
define( 'SECURE_AUTH_KEY',  'iaFvsWKHSalvCxQVv1aQCZcoiRFz7FY2xYUEhNOtX6Y=' );
define( 'LOGGED_IN_KEY',    'L20DAMhzCabFZhHPBO_39QW8gBRfXWvuD4LeGYPpWRE=' );
define( 'NONCE_KEY',        '3WvoHdL6zwwhsk52oleOSuN7WIMHqx5V2xtNK8rZXhU=' );
define( 'AUTH_SALT',        'nFS6fRys-2I0SZmlcJ3qPgHCrqyRqplMQsdcgYe-1V4=' );
define( 'SECURE_AUTH_SALT', 'URTCbTPe4a9mC_QwPeRWoINI-xWRNABqzMAxL5dWj4U=' );
define( 'LOGGED_IN_SALT',   'SNTS8RAXxLAer4WpIqGhrTwtcgNtPpTQu8UbUvm8jKg=' );
define( 'NONCE_SALT',       'Yu_MH8LQ1wB7Xin8Eqxt3b6q5macaDRx2ZabLGwl8hg=' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'eksamen3sem_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define( 'WPLANG', 'da_DK' );

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
define( 'WP_DEBUG', false );

/**
 * Prevent file editing from WP admin.
 * Just set to false if you want to edit templates and plugins from WP admin.
 */
define('DISALLOW_FILE_EDIT', true);

/**
 * API for One.com wordpress themes and plugins
 */
define('ONECOM_WP_ADDONS_API', 'https://wpapi.one.com');

/** 
 * Client IP for One.com logs
 */
if (getenv('HTTP_CLIENT_IP')){$_SERVER['ONECOM_CLIENT_IP'] = @getenv('HTTP_CLIENT_IP');}
else if(getenv('REMOTE_ADDR')){$_SERVER['ONECOM_CLIENT_IP'] = @getenv('REMOTE_ADDR');}
else{$_SERVER['ONECOM_CLIENT_IP']='0.0.0.0';}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
