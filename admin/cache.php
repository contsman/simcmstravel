<?php
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '缓存管理';
//允许操作
$ac_arr = array('del'=>'清除缓存');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

if ($ac == 'del')
{
    $fzz = new fzz_cache;
	$fzz->clear_all();
}
else
{
    showmsg('非法操作',-1);
}
showmsg($ac_arr[$ac].('成功'),ADMIN_PAGE."?mod=main");
?>