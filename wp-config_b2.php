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
define('AUTH_KEY',         'q_`JR*uu<V8}Ec= a3|sXX4`;]enx5,01E7J+b%t_qQm/m{4%sP9tI/Z3 JJvi-%');
define('SECURE_AUTH_KEY',  '4Jxc*lBuB|(oT.Db:ToglMs2E||K,YMaO6/u51@AVCc!Y_WCK1XOv54@QaGkZN/+');
define('LOGGED_IN_KEY',    'G#Zxvd5=IC)O<#u|{% Ds0PLE@`D^Jx,]f(Zl9zQ8?A|dIoLvxh>dyl?,f!a!4!&');
define('NONCE_KEY',        'Qg0[pie >V1CO<%T-B;(U{>(`>R3yCVqrHBNh@8U|~Ve=[i?c]=1wQjvDPtloZ++');
define('AUTH_SALT',        'os;.$y)vO<vtngYjkc$c>3e}[ ($w%f|5aX]`DRKWv72vDED8s*VX5}5ddi N4lJ');
define('SECURE_AUTH_SALT', '}b!0W,0B/9V<=?=RU83}c)IaKX^Bn ^g-5wZNXCQ7NOi?0K 9[/[C>)jA48&4RQy');
define('LOGGED_IN_SALT',   '.D9(~Pte9o<4v1=2Ukj S&81<cQ0Yi^7/t3IGYmC=LM1b4_RpPFR%CkB.=sS?.*)');
define('NONCE_SALT',       ',2JOw>%8ndQ()g}J?U(u5nNC?WAuiA40<i/dYJd PWgA,A1)zcq&N#f:zcRy|-c7');

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
