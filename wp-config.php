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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         '#zS{Aeg~d]F!qIL5x]5<tsh }xuxdkUKeBbapDxGDTDhUu2a8UMkw^:t0m3u1!&Y' );
define( 'SECURE_AUTH_KEY',  ']x!Ml<j0&`_uj1TU:qe>%Qg>%dD]<]=O_K]Y=)w|z*Jn9WpZ);_=q=OTc)U(FXwk' );
define( 'LOGGED_IN_KEY',    '{G_!o*tqKNVP2ZKvaR!hXp!0_$u#,mEI_}n<oxx/Dj3EDhd$uBUae0#bl9ugZzIw' );
define( 'NONCE_KEY',        '|tR(Tb>F]!GCIVn0tD~y<F5oH@5d@ii:]2rb!sp+LB/50%}]V.Wd.>q:68I%.Jl1' );
define( 'AUTH_SALT',        'ePJ?S*<<OZ@EF#z$g)X@iX*w5Ky4S[6H#:>pS0[=Wfl^9Fc^3V{+21):l QDD-JO' );
define( 'SECURE_AUTH_SALT', '<v!V(6:d{9XLpTf3e:&_Hs>_0nv^UgExNeATkZa]H88>_LH}I].v<<+r6SNwc=2R' );
define( 'LOGGED_IN_SALT',   'c!~9,VC[N}>_p(ZL9;gqUI${t=`uNTa`_j9,/-m_w;d^Jp/w;RtN1W~%Hw|l?&8F' );
define( 'NONCE_SALT',       'H?f@,+8ukNS#I,2:@h:B5Gxo<AY|Sw1hC=9J6L%CT:dm]>.G?bD43a_NF%+?Yriz' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
