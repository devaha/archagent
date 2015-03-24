<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'archagent');

/** MySQL database username */
define('DB_USER', 'archagent_o');

/** MySQL database password */
define('DB_PASSWORD', 'archagent');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'UzyLAk)^^;c7v]UP=YNupWX83< ^nSYi`4J.@5+ji!N6B*9?-D{NtX3U!+v8m+.?');
define('SECURE_AUTH_KEY',  '[n-bP)(|7lx+p=f,I>mlsz#W%A{5P+:~@u5Gz6cH^+q{EkwFRE%1Nb?Id=vzS?HC');
define('LOGGED_IN_KEY',    'VK4r4H?*3e$da!_-yeu@j7iE}%QRf^@{X+m7,`v|ueydp[VNdIk@^v`+:s9}Wck5');
define('NONCE_KEY',        ':2F)&X)=*[W?TN|$y8$8Ol}=gE,MA,dBx.ZmPQg-U%iQ)hQp0,5s7Tmz]$P.G5-&');
define('AUTH_SALT',        '8jPpL3XehpI2+gm-%OBia9d5jpitSO1xo:mmh m0f|q6Gx`}/.|!+bGxq0e3XW-C');
define('SECURE_AUTH_SALT', '9Xlnec2}QDef?1<(z/>D?kEc)Bqy7;yU/cU*CgSDsac0EP+e$A09A-sw;Al+}+|q');
define('LOGGED_IN_SALT',   '8|uc<qri=8sZ`Q.FQsabz4@K|2QMppJbnYQHT)ZX_A+<r;6Mnji9Piovo)3|=tYk');
define('NONCE_SALT',       '[vOQz1 +?`|T-c0,-,hp-^~C2?]nlm/rVMaB|ApB<]UQB)u+LW^PdRr/:5 4|bN)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
