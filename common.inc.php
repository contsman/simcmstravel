<?php
session_start();
define('APP_IN', true);
//error_reporting(E_ALL);
@set_magic_quotes_runtime(0);

if (isset($_REQUEST['GLOBALS']))
	exit('Request tainting attempted.'); 
// 程序目录(有/)
define('WEB_ROOT', str_replace(array('\\', '//'), array('/', '/'), dirname(__FILE__) . DIRECTORY_SEPARATOR));
// 网站URL(无/)
//define('WEB_URL', 'http://' . $_SERVER['HTTP_HOST'] . ($_SERVER['SERVER_PORT'] == 80 ? '' : ':' . $_SERVER['SERVER_PORT']) . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')));
define('WEB_URL', 'http://' . $_SERVER['SERVER_NAME'] . ($_SERVER['SERVER_PORT'] == 80 ? '' : ':' . $_SERVER['SERVER_PORT']) . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')));

//输出页面字符集
header('Content-type: text/html; charset=utf-8');

// 当前文件名(无后缀)
define('FILE', basename($_SERVER['PHP_SELF'], '.php'));

// 网站访问路径，相对于域名
$PHP_SELF = explode("/", $_SERVER['PHP_SELF']);
unset($PHP_SELF[count($PHP_SELF)-1]);
define('WEB_PATH', implode("/", $PHP_SELF));

// 包含配置文件
include (WEB_ROOT . 'config.php');
// 时区设置
date_default_timezone_set('ETC/GMT' . TIMEZONE);
// 包含模版配置文件
include (INC_DIR . 'tql.inc.php');
include (INC_DIR . 'function.func.php');
include (INC_DIR.'common.func.php');
include (INC_DIR . 'simplehtmldom/simple_html_dom.php');
include (INC_DIR . 'calendar.php');

// 数据库连接
include (INC_DIR . 'Mysql.class.php');
$db = new Mysql($db_config);

include (INC_DIR . 'cache_class.php');

//初始化分类
include(INC_DIR.'tree.class.php');
$tree = new tree;

// 时间
$mtime = explode(' ', microtime());
define('TIMESTAMP', $mtime[1]);
define('MICROTIME', (float) $mtime[1] + (float) $mtime[0]);
// GPC过滤
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
if (! MAGIC_QUOTES_GPC) {
	$_GET = _addslashes($_GET);
	$_POST = _addslashes($_POST);
	$_REQUEST = _addslashes($_REQUEST);
	$_COOKIE = _addslashes($_COOKIE);
}
?>