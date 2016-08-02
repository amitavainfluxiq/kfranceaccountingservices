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
define('DB_NAME', 'kfranceaccountingservices');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '`-cHS$&~}]fM^0Yj$[^;qZYegJ_5fEA}X `S^o7=fhA|P[F9cid:BEq7hJULl.K ');
define('SECURE_AUTH_KEY',  't4Xux{XP6H4U?`@6{#Em3K7)w,a88wCP$DC5[`JF@/M=9~qL-vSzehIkn8$]qM9A');
define('LOGGED_IN_KEY',    '=%9!m-vgf{siQ5E|tA+?~_hikhT,PWOopkV]=/V[318(6QGB4I%KCG=eA}y0$F5`');
define('NONCE_KEY',        'LSS?<-5anUPK&>>kus4T(.<%LGT>8|DOw*k-b.20E?fY@UFsK*o`4=?^VFyWJ~Fd');
define('AUTH_SALT',        'BS42B}EO-JPs$,gM^3PH{#3Ccy$2gV>mgtI)+L(NN/e 0@sja*;;b|>,+<yYiC2&');
define('SECURE_AUTH_SALT', 'mhLr8=P8jc`1RI!}d<nHkc$l7!REcb$.xV*9$8MTipPr^?@V%cVFS4)dM+Nb|y^V');
define('LOGGED_IN_SALT',   'Pl?i)Y50Pn|VpFe/S:r:y%mNFY4+iQW-XTqD+7^Umh(,~s4UdwdrlPv~kwI@HO1{');
define('NONCE_SALT',       '7ZjR8kkW_xaz]QT?U#BxLCX6KHp~y__e]sQo6{nbrn-C0o7gQqv;@3v2An<xgU*R');

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

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
