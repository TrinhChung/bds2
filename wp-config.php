<?php
define( 'WP_CACHE', true );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u772401377_khSeE' );

/** Database username */
define( 'DB_USER', 'u772401377_everland' );

/** Database password */
define( 'DB_PASSWORD', 'Chinyeu@1994' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'E8E3.8[G#:`kLdH_:k41DCM%>~J.81#^E-07Xw>;K>EU2K!QFAlM#k}@92IFNkvl' );
define( 'SECURE_AUTH_KEY',   'A`04(&;VazvA&|t0WQa)0s-Bt;Fv,UIV_Lz(V95`jNdaI)#]&VJu}_(:fr%LJ7E=' );
define( 'LOGGED_IN_KEY',     'Y<y q4v)Qa7C4QV6p1=!RN>9$nf0l7GBi!=Rw=,9:aHX_lgN{6dEeSVNk4,{r(^g' );
define( 'NONCE_KEY',         'zbnsb[L%3kGKe{Td;8Gi[Tj6qj7r?V7#G951X*wC[|#?])4gkHy$G+OXr}bnG@*|' );
define( 'AUTH_SALT',         ',q$/#Q[~SoNkO&f6=&@c(&4_Ec_KN*] _zK7uV^^*0^*kgVtWY$Uk:g{JCBn$p%#' );
define( 'SECURE_AUTH_SALT',  ';K}t7Bv=5PZ:S7uhmHNxvr@xE:EnK/! o/7[,_D~5*|QZKozW9?[e?6|Q WKKK3U' );
define( 'LOGGED_IN_SALT',    'h$g1(xi#pZ-i}{6oT?uwyfo-crb$|r*T?Za+~L;./GT(b$!2>+)d-d$r`Rd{_=!t' );
define( 'NONCE_SALT',        'y>)GxPjtcliUQ= $0]DOr;KL_F]yzv@Bdi*tEO9^2ekNbi#@=SE!VC/}FmU8=$;i' );
define( 'WP_CACHE_KEY_SALT', '6{JwR6Um.xb`iR#vHfxtIp2:~q&|<7.O_I{C /4^jc;vEHYcC>D,HHPe7|RG:LS2' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bz_';


/* Add any custom values between this line and the "stop editing" line. */


/** === Dynamic WP_HOME / WP_SITEURL for multi-domain (Cloudflare/Nginx proxy) === */
$raw_host = null;
if (!empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    // Cloudflare/load balancer có thể gửi nhiều host, lấy cái cuối
    $parts    = explode(',', $_SERVER['HTTP_X_FORWARDED_HOST']);
    $raw_host = trim(end($parts));
} elseif (!empty($_SERVER['HTTP_HOST'])) {
    $raw_host = $_SERVER['HTTP_HOST'];
} elseif (!empty($_SERVER['SERVER_NAME'])) {
    $raw_host = $_SERVER['SERVER_NAME'];
} else {
    $raw_host = 'localhost';
}

// Chuẩn hóa host (bỏ port, lower-case)
$host = strtolower(preg_replace('/:\d+$/', '', filter_var($raw_host, FILTER_SANITIZE_STRING)));

// Nhận diện HTTPS chính xác khi đứng sau proxy/Cloudflare
$is_https = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
    (!empty($_SERVER['SERVER_PORT']) && (int)$_SERVER['SERVER_PORT'] === 443) ||
    (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https')
);

// Báo cho WordPress biết request là HTTPS thật (tránh vòng 302)
if ($is_https) { $_SERVER['HTTPS'] = 'on'; }
$scheme = $is_https ? 'https' : 'http';

/**
 * Nếu site nằm trong thư mục con, set base, ví dụ: '/blog'
 * Nếu cài ở root, để chuỗi rỗng.
 */
$base = '';

define('WP_HOME',    $scheme . '://' . $host . $base);
define('WP_SITEURL', $scheme . '://' . $host . $base);

// Bảo vệ trang quản trị dùng HTTPS (không loop vì đã set $_SERVER['HTTPS']='on' ở trên)
if (!defined('FORCE_SSL_ADMIN')) {
    define('FORCE_SSL_ADMIN', true);
}
/** === End dynamic URL === */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '36b91e326530df1bbac43f9cf135ef2a' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
