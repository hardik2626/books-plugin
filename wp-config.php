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
define( 'DB_NAME', 'books' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Admin@123' );

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
define( 'AUTH_KEY',         '>g-IwB[91Ez2x_L}0w%8J7k?=Ia/ru2!0 Ovl.c&S#1X/UsEK2Yy.2<)7qr2Bd}X' );
define( 'SECURE_AUTH_KEY',  'F!-DM(peVi3b;W~mD)?TV&~IOvqTF+*GExoOe%TU{Fcgz#)pY!d{&f2Bw?(kpxM ' );
define( 'LOGGED_IN_KEY',    '|Lbw~^-%K@ZER#ivM):pBBX/LzXiIA:>%9;=Fe:OO[KYqloh}k&]w~!~]W`F>LRK' );
define( 'NONCE_KEY',        'FTB937m3{y~/`wEh)*0`FU[kiJa/:*~~BYy[,>3)B04C2P~YuXj^`6fP*|AuIa/H' );
define( 'AUTH_SALT',        '4[H65B]T5qHi)@xO*JI2_XQs>uPbZ{7Jcsrp=X!?^.VATB#bIZ+R`b5^oA=.j+TO' );
define( 'SECURE_AUTH_SALT', 'yZ^}*RP0F!/RV+&aEZXg$Rd<)A%rS15SSs|fL[cvP*`MeN6zJ`hlHZ}K91h`Bi/9' );
define( 'LOGGED_IN_SALT',   '[T$K?lZG<fA]>)c},LA;8>3HWiO2inx:wUCvV|HZL8{b7<ES%|~SjAB-8P_AOr?q' );
define( 'NONCE_SALT',       'kO8@i57VD]Oh4q`iL!YFd*1UrooMUu`IrUgud;F?-g`r5V%`k*Gp+~Xm:1HZkN,B' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bb_';

define('FS_METHOD', 'direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);

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
ini_set('display_errors','Off');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
