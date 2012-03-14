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
define('DB_NAME', 'buddypress');

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

/** dirty hack to get the PHPunit / REST API working **/
if(empty($_SERVER['HTTP_HOST']) || 
        is_int(stripos($_SERVER['REQUEST_URI'],'api'))) {
    return ;    
}


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':#MmwbxiSQh!-#5|V d7`%ybH(A{E&XYX#M4MJF=(h|XtfU<]C#EF#>K-Ta-E1= ');
define('SECURE_AUTH_KEY',  'juR-+*cML?S}9hW7aJnRm((<C`bct#o[C0Q04ih=W1w;$F(6j~;q4X-gKw%>)LN<');
define('LOGGED_IN_KEY',    'C8Zy3Tk<0*)sZ,o+-RM93QNIs:]d1l?60OK@bnj|CH9a++s_{r?ShsN(ooI1U)I}');
define('NONCE_KEY',        '#EXc 6(c`aw;t.<E-=0d6>/C9c2|Yt%]C kEyfAM;>p-IvmBEa/G%8m7.Vk|).@B');
define('AUTH_SALT',        'Rw:3)K}WCvub4hS15=fwoMrT=ETTrx~Ws[L` zX}t8LyE({~`wv&6$kM5RXwZX--');
define('SECURE_AUTH_SALT', '-.da5XgR-%5@-,9EJji A{&EkEL~]TcE1`gLa?SPN3&]|MPcKi0Fu N]t+t(%4b`');
define('LOGGED_IN_SALT',   '>G}/|-#Q-kXbKLjVjv%+_Bhm?]6og+YtW*B>~m>lXD)H5A|]y]<eqr_[8n_<uuCZ');
define('NONCE_SALT',       'znZa~u8}z($PcBqd,-<!vl6x%2}-DE]a:DL{D&t44t-~vwJnSJ)]wYg)@bJJ`|mA');

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

// use the buddy bar!
//define('BP_USE_WP_ADMIN_BAR', true);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
