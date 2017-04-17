<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'reinup');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jLfcel{/uz,r6RuxWW$,CG/sfbI[ym.J*g`LoF?,{B:_PP8P:xs/e~RcKCK0c+Q$');
define('SECURE_AUTH_KEY',  'X{/BOL8w4`Lj8$IX)w!v&{m 9`OO1qWhp0].;7@yk+}y9A<x<-29~V_lL-P)o`]4');
define('LOGGED_IN_KEY',    'dE0x>.3?S4J^5I.R#|38?TKe@zT|Wu V.Ox(8_.#RbF9F44Wa-ckY3lq0&MNMpgs');
define('NONCE_KEY',        ',.;Q3aXhNq(XjoHu7*)=@K?.JW%b%33i)(6+kuan_*Tn(]KPg/:9<$5&3FC]F[L-');
define('AUTH_SALT',        'wgqzj<H .m%fY(JRb<J+mRAt|y%xx2X6IV!6a:_!nUD?s~0,E3[_xy]H}Rhg$ftL');
define('SECURE_AUTH_SALT', ' og:t Woo]H~bUGu<u[/}k[OgtNk;mx*<M]-I,MNm~m#`<y>XU,)kB9^mwfq}WH?');
define('LOGGED_IN_SALT',   ';PK,:|fZzfv9RdG3.74csLc*Lc&h%l%4jP!=YE/)RIk4sW srSUppS8QMg&j!4Sb');
define('NONCE_SALT',       '/SVN{0=_f]cAhpf4t=N57wA7ou)Gqq6`gZgQeq?/|yW;o[4fnX96Ye{)%9Jjv0]T');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'rp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
