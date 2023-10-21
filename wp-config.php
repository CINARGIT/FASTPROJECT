<?php
define( 'WP_CACHE', true );

/** Enable W3 Total Cache */
 // Added by WP Rocket
define('FORCE_SSL_ADMIN', false);

/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'tt');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', '127.0.0.1');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');
 
define('WP_HOME','http://tat.local/');
define('WP_SITEURL','http://tat.local/');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G>}|iiTJap9*b7SxdW_3J:`TFSEEV}-l%}8Q=O^UDNW*DQ7&LiUS=W:h.VX@oX!N');
define('SECURE_AUTH_KEY',  '<-{L J5V8[[cS3q9wlS93^>`>$=M-+2[WyC#DIcA-`dQ#abM$e7((DjpNz%3Q`+`');
define('LOGGED_IN_KEY',    'kX:HHIA: :q|QNH:/KW:KE!`lsopWn1o[;b*2F_=O)9D ZH!t(UuQ*(.K$|x{5r+');
define('NONCE_KEY',        'Uo%)Z[]E)&YzBQzX7m_OG=E[bRK#Qc(1|7SZp$oLzzoZ05a9,wY(r}}?K}J$}#9B');
define('AUTH_SALT',        '1|kF6J|x![5|75#?^VU}g1g[QSds?c(N?<pX%7}M1E~X`i_]P]vQL?;9.O`^-~Yw');
define('SECURE_AUTH_SALT', 'P/t^c,Zwt=8W.5-s?x)Bwb>Il9YMc7R+9lp][eE62n}xag`H#bqbK+Ow]6HPtQ=d');
define('LOGGED_IN_SALT',   'qj{tOTw$22H[:{NLHJrdHI^P*YwAPV|-[|%uJ| HGTP]<@YzDETt2{$0G-9a%<yr');
define('NONCE_SALT',       'csF[+avNJ-xu/KfXoR#ubLvY+n<U<-NMx0UZ|^baT>s!I?+mp_c}@!ej_03N_{ X');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
