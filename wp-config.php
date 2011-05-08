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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'redtailedink');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'flushingsb3st');

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
define('AUTH_KEY',         '_DH=E]-EkpjIk%V#(4y?}I9A_[okc0d[5lzarN!U9cl8JC)Y26#w0eO]C)ue@CMQ');
define('SECURE_AUTH_KEY',  '}3UeJ+KT|?*Bi =E$noqKBjWtpN|HQF*IIW}/9VJ$:.WaI6rp^ }6{=/FTC88I+T');
define('LOGGED_IN_KEY',    '(v6(4)`z_?8[+P(R*(:5Mb Zs6&!cH8&rZ*.c~Ru:FL.om:/JDd]m:?=FQq{d|Wo');
define('NONCE_KEY',        '>~w&xUtAKC+B3CP!*{BKL$2!lElNbEHVeN9nN~6DT$Z3utu?]Y??Yk(*I2Ocg6eT');
define('AUTH_SALT',        'H5 9^9a8WD/D0>J9x%j8J})Dop$=OcY)U~Q$D[z!A[R+A)^9{1QEB<[8Hpl`;^1!');
define('SECURE_AUTH_SALT', '0A+teGL u!u.A<=Eiw~Gdo>x4-uT^a9F?.]TO(BxH (e!N(RIJDDs&Q)68wQ9?6e');
define('LOGGED_IN_SALT',   '&_||4%Z$q5s!+*u64)gS/&fWf#9gq_R:1_WZ_h]=rp`Ezmi1bW/g0]I!BG6$~oEB');
define('NONCE_SALT',       'Ylo~eRc=lJkPf}]>V4iXP6z0ejg8v~&Lcgf+BP]x!rwEzGj-feE-ze=61uXy=:PO');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
