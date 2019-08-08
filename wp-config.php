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
define('DB_NAME', 'xrsports_workkforce');

/** MySQL database username */
define('DB_USER', 'xrsports_clione');

/** MySQL database password */
define('DB_PASSWORD', 'client@1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('JWT_AUTH_SECRET_KEY', 'your-top-secret-key');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'z[8l:q%sOzS&]kzkW%?_eVEmX`qNZ`xoX[!ODzPFHk.$d|-Bg^cxNph{4;J6~F5f');
define('SECURE_AUTH_KEY',  ').|^EtvSco&Xb#~5:X`gkb}:dXx5 pA*Uz!rY@?0Tg^r@n[Nt}{f[_x_-*]I.uGp');
define('LOGGED_IN_KEY',    '!WWO}b(uwAITz>MR!y!n98f_jr!mg)c7TGD|e`=&)MUu5<Lqp@qw-h2^l8 7,yPO');
define('NONCE_KEY',        'j)S0J&nkY7A)gGKTUVP=OMDVkhTOWDyecSh;A(p]t/MHpJ{.M?KxS/f0Zh7paPgg');
define('AUTH_SALT',        'S^7,V]AMtbrnVje?Z6KiZpg(x+@6ts2*1z<0y2M37&L`]y]?m(Y^/s?1VCqP<_mC');
define('SECURE_AUTH_SALT', 'l|06PG[y&K/A!}?a`Xb4dL`pQ755y+ZNa-?s(}{ DNb5WMmPm5n@;YjoPv*(aPz8');
define('LOGGED_IN_SALT',   '>8T`EXZI:Xt&y^XIg~G5EZ ;XHD[Q_ZgF~Gz,uYh@E>{q#UaIfaa~N|@5IMr&+#r');
define('NONCE_SALT',       'o:+K?9`?-<jZr<v2E?N`:+|vikg7%0E)d,h^YfAk5xUOr6K|/:FQNPtT8b)0+AJa');

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
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
