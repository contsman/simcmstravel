<?php
$db_config['DB_HOST'] = '10.211.55.8';
$db_config['DB_USER'] = 'root';
$db_config['DB_PASS'] = '123456';
$db_config['DB_NAME'] = 'simcms_lv';
$db_config['DB_CHARSET'] = 'utf8';
$db_config['DB_ERROR'] = true;
$db_config['TB_PREFIX'] = 'travel_';

define('CHARSET', 'utf-8'); //文件编码
define('TIMEZONE', '-8'); //时区设置
define('INC_DIR', 'include/'); //包含目录
define('TPL_DIR', 'templates/'); //模板目录
define('CACHE_DIR', 'cache/'); //缓存目录
define('ADMIN_PAGE', 'adm.php'); //后台入口文件
define('HTML_DIR', ''); //静态文件目录
define('CACHETIME',0);       //缓存时间
define('COOKIETIME','3600');  //COOKIE生存时间
?>