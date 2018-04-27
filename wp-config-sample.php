<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

$flag = isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false;

// Required for batcache use
define('WP_CACHE', $flag);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

if ($flag) {
    /** Production environment */
    define('DB_HOST', ':/cloudsql/');
    /** The name of the database for WordPress */
    define('DB_NAME', '');
    /** MySQL database username */
    define('DB_USER', '');
    /** MySQL database password */
    define('DB_PASSWORD', '');
} else {
    /** Local environment */
    define('DB_HOST', '');
    /** The name of the database for WordPress */
    define('DB_NAME', '');
    /** MySQL database username */
    define('DB_USER', '');
    /** MySQL database password */
    define('DB_PASSWORD', '');
}

// Determine HTTP or HTTPS, then set WP_SITEURL and WP_HOME
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443)
{
    $protocol_to_use = 'https://';
} else {
    $protocol_to_use = 'http://';
}
define( 'WP_SITEURL', $protocol_to_use . $_SERVER['HTTP_HOST']);
define( 'WP_HOME', $protocol_to_use . $_SERVER['HTTP_HOST']);

define('FORCE_SSL_ADMIN', $flag);

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
define('AUTH_KEY',         'YrO88WHwS2pg6c84rVlCY4xuMX7RSGf1wB50qxiDbcW4cGd1NJf9vPCBD1Hu8ovPPhwJTZTnTT13vaIF');
define('SECURE_AUTH_KEY',  '734i3T97Y+H6r150mMP4JXxDbOTCfSlIvKxgXs/58vet/U3c4297l33yY6p3Oj4vp1qwu9k1TbccCXxA');
define('LOGGED_IN_KEY',    'u4mVHm2gE0lCr1OD7khWUZ+Q8V7z3CPl4kQxjoAKtqQcLMYF2g/QaREZlwU0jzf65nKc2mFwnUcISJ4H');
define('NONCE_KEY',        'lHu3yzf36d5B4Qga1ysgtpa41Sb81X2CBujmKme0HpeHbp/LImTYkd3CWM3DnFZpNifkoaLEiIMJBjZW');
define('AUTH_SALT',        'exn/QkLqHqSuN00bl4XWVmp5xQqTWrLM7dn8c27V8TW634wCsORcCQoLwsoMHQ4MQMtYnH9wl+26ZjBr');
define('SECURE_AUTH_SALT', 'ISqFUZBVPB4hZl8Mb0CnMPNNU8v7UpS+PPZv3XpqDYFQ4UaYfhAIssx/Wfmv6dD+pBhei0Eh3/rGnTBm');
define('LOGGED_IN_SALT',   'SZ1QJ+i7Fvl+2NmF9OHd4bdhVHXr4ljw1YMQI8yECa0RwyUxLtPVq+RSK0ZcQR9/6Jn7f02rGm0dqDxC');
define('NONCE_SALT',       'batvXZNTWFoGE6N57/q7qi1dsFqA2+77sZpRmmBMMmzAzMHOFHjun2UpgxgjOYPBMhKgBpfTR9UTV98f');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', !$flag);

/**
 * Disable default wp-cron in favor of a real cron job
 */
define('DISABLE_WP_CRON', true);

// configures batcache
$batcache = [
  'seconds'=>0,
  'max_age'=>30*60, // 30 minutes
  'debug'=>false
];
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/wordpress/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
