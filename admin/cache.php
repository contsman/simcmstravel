<?php
/*
 本软件版权归作者所有,在投入使用之前注意获取许可
 作者：北京市普艾斯科技有限公司
 项目：simcms_锐游1.0
 电话：010-58480317
 网址：http://www.simcms.net
 simcms.net保留全部权力，受相关法律和国际		  		
 公约保护，请勿非法修改、转载、散播，或用于其他赢利行为，并请勿删除版权声明。
*/
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