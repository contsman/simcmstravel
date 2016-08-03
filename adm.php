<?php

include('common.inc.php');
include(INC_DIR . 'html.func.php');
include ('index/page.php');
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'main';

if (!is_admin_login() and $mod!="link") $mod = 'login';

if (!file_exists('admin/' . $mod . '.php')) exit('error url');

include('admin/' . $mod . '.php');
?>