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
define('AUTH_KEY',         'xxfBD#Vusvxb{(OI$O5TPO<.?ZVdL;~G62+U%vD0ne,:;7Xy1JHVYrjlD>+}e/5u');
define('SECURE_AUTH_KEY',  '8oM*5*Lrp7~wrNlX2s&zsr7AwJGVJ=)FOb0fHZ3Ee;2@we9kv&w8*J@e40EX_Pw7');
define('LOGGED_IN_KEY',    'SvkdoW>)|7T6$0Rz*S*:tu_f1R-|A,4d3-m~3f(}9DUUUl$ECYM#M;j+G.<5LY[`');
define('NONCE_KEY',        '1)Y|tqzm5jPz#Hn:Wcv4ha6k`PyC9K&QuW@7WAMpr/2K0D{UP{{]+cU<`I)}[8$)');
define('AUTH_SALT',        '%qa.2SE+5?e+?7/q.#I7dzA8S2GaL=rd<{D|d9)z[H4?Xyb .s.cePX9Hv|V)f,P');
define('SECURE_AUTH_SALT', 'k+NETH([cK]OY*Qd-!2}1R YlDFmCr;sU=Uw]ONtGe0Nx(q|7[HrDL :[eU~^x=^');
define('LOGGED_IN_SALT',   '8T~R>t(iY`@`Iy#5<Kc#%j4C2a-rKB;J*gMpNj&aBm<i2|vD*6,+m41AsC,St;>Z');
define('NONCE_SALT',       '^?#@(.yH#xoOPR0$y)oxnv`kmzh*Sb~$tphD_0+;uJG7z%<Ja?<T(& }Un~t=l#K');

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
