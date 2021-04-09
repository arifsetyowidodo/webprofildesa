<?php
/**
 * Konfigurasi dasar WordPress.
 *
 * Berkas ini berisi konfigurasi-konfigurasi berikut: Pengaturan MySQL, Awalan Tabel,
 * Kunci Rahasia, Bahasa WordPress, dan ABSPATH. Anda dapat menemukan informasi lebih
 * lanjut dengan mengunjungi Halaman Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Menyunting wp-config.php}. Anda dapat memperoleh pengaturan MySQL dari web host Anda.
 *
 * Berkas ini digunakan oleh skrip penciptaan wp-config.php selama proses instalasi.
 * Anda tidak perlu menggunakan situs web, Anda dapat langsung menyalin berkas ini ke
 * "wp-config.php" dan mengisi nilai-nilainya.
 *
 * @package WordPress
 */

// ** Pengaturan MySQL - Anda dapat memperoleh informasi ini dari web host Anda ** //
/** Nama basis data untuk WordPress */
define( 'DB_NAME', 'desa' );

/** Nama pengguna basis data MySQL */
define( 'DB_USER', 'root' );

/** Kata sandi basis data MySQL */
define( 'DB_PASSWORD', '' );

/** Nama host MySQL */
define( 'DB_HOST', 'localhost' );

/** Set Karakter Basis Data yang digunakan untuk menciptakan tabel basis data. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Jenis Collate Basis Data. Jangan ubah ini jika ragu. */
define('DB_COLLATE', '');

/**#@+
 * Kunci Otentifikasi Unik dan Garam.
 *
 * Ubah baris berikut menjadi frase unik!
 * Anda dapat menciptakan frase-frase ini menggunakan {@link https://api.wordpress.org/secret-key/1.1/salt/ Layanan kunci-rahasia WordPress.org}
 * Anda dapat mengubah baris-baris berikut kapanpun untuk mencabut validasi seluruh cookies. Hal ini akan memaksa seluruh pengguna untuk masuk log ulang.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nzTjNxzC&-cBWi oUoLP*JJq@sa&u[l79$Phb`@r#?^}xuFxUkCK] VdQpC=)mpy' );
define( 'SECURE_AUTH_KEY',  'QErG$*o;xGb0$U@h!%$vD(z|fTC9-(Gp/Hh{}^3e_FBPzp4</8[Y)y:,+669`PTP' );
define( 'LOGGED_IN_KEY',    'OWTR$lR-VoHvJKc+7huEeP`J[oDtR$Bx=ytAg{mH6)b~P<nMWmaM>Zf|Be<6plWF' );
define( 'NONCE_KEY',        '/HWcy(mp-WR3DmY<&kp98nj8zNTHf/yg5Wk*J*s9S`!)ok*pdFT7X.hq|lvn-0`h' );
define( 'AUTH_SALT',        'kvbb9{tb%9oL;.L~GM,C_aHj.g2}1tc;PNp-jxDdK]L8x|8,J=^|9&FfPB}F069T' );
define( 'SECURE_AUTH_SALT', 'g[B?q$iKNrUUX[I66E?-f4%r.Q&:qPc:m>:z&sQn4IYC>c:G?|3Cr?G!Hig=b~0V' );
define( 'LOGGED_IN_SALT',   'Z0Ck.q1Rf@P.h(q<uTpx*4ip2?4wpYUGX)$9+*r66^[8ivw!JRMqPr.vaO,i/D)R' );
define( 'NONCE_SALT',       'm!?#JIH4,h?N|gy>VzB3|30jm;RnThH*/c>gxaP?i`iPTz0@Kw`{o]S+BbTPSF<*' );

/**#@-*/

/**
 * Awalan Tabel Basis Data WordPress.
 *
 * Anda dapat memiliki beberapa instalasi di dalam satu basis data jika Anda memberikan awalan unik
 * kepada masing-masing tabel. Harap hanya masukkan angka, huruf, dan garis bawah!
 */
$table_prefix = 'wp_';

/**
 * Untuk pengembang: Moda pengawakutuan WordPress.
 *
 * Ubah ini menjadi "true" untuk mengaktifkan tampilan peringatan selama pengembangan.
 * Sangat disarankan agar pengembang plugin dan tema menggunakan WP_DEBUG
 * di lingkungan pengembangan mereka.
 */
define('WP_DEBUG', false);

/* Cukup, berhenti menyunting! Selamat ngeblog. */

/** Lokasi absolut direktori WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Menentukan variabel-variabel WordPress berkas-berkas yang disertakan. */
require_once(ABSPATH . 'wp-settings.php');
