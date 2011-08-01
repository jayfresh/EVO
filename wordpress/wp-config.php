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
define('DB_NAME', 'evo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         ';K1xp=_Li6s04c(L)o=,#7,FD&ALfX,hjUubdzT?Sz^qf|-`AFf2v&,#i(6,$$30');
define('SECURE_AUTH_KEY',  '+be.Jy`{qIA6-LCc`rv~6ZW/Xq0|X22}uW2JK4^nzCo=3JbA>F(@$)y3]/?=q[9U');
define('LOGGED_IN_KEY',    '~OZc$o+SZ4nnw^XUK@`|+HRj`B`2p$y1Kl(1+bp0A!_.RE+&$C};d+`B1 mVB3<m');
define('NONCE_KEY',        '4[eavuBW>xUnakP~/^viOXgoJT1XOG^u<Uw&?SAEt Dhg:Fly32g{hSxqbWWDhO]');
define('AUTH_SALT',        'dxftkAtLv:xDu>,+/8D-f5Eu7BE+G+R63w*p;R:bW_i2tpF?!iNiOW$i?T%teq#<');
define('SECURE_AUTH_SALT', ';#zEoff[Bq(D)s@5bB700*Q5;:kK)_CU^^PwKP{GjR]8d4{+M-$Hhgy@I*j{z5`c');
define('LOGGED_IN_SALT',   '6V`ir8Qi,dv*gFH:LJ-ao=kJcAD]0=<]ne;3`$;/up|cQa1q.HU1#[ENw}_He0E@');
define('NONCE_SALT',       '+=d.B`s?2dMKJ`zW!O)n}m> r[0FHRuFYUtZbnasHSY#eV3uw)os|>O?TrtM(&{I');

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
