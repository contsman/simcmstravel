<?php
include('common.inc.php');
include('index/page.php');
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'index';
//if($mod=="index") header("location:index.html");
if (!file_exists('index/'.$mod.'.php')) exit('error url');
include('index/'.$mod.'.php');
?>