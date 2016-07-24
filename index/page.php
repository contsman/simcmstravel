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

//国家选择
if (!empty($_GET['ajax']) && isset($_GET['zid']))
{	header('Content-Type:text/plain; charset=utf-8');
	$countrylist = "<option value='' selected>请选择国家</option>";
	$list = $db->row_select('country',"parentid='".$_GET['zid']."'");
	if($list){
		foreach($list as $key => $value){
			$countrylist .= "<option value=".$value['id'].">".$value['name']."</option>";
		}
	}
	echo $countrylist;
	exit;
}

//国家选择(多选)
if (!empty($_GET['ajax']) && isset($_GET['zcid']))
{	header('Content-Type:text/plain; charset=utf-8');
	$countrylist = "";
	$list = $db->row_select('country',"parentid='".$_GET['zcid']."'");
	if($list){
		foreach($list as $key => $value){
			$countrylist .= "<input type=\"checkbox\" name=\"cid\" value=".$value['id']."> ".$value['name']."&nbsp;&nbsp;";
		}
	}
	echo $countrylist;
	exit;
}

//城市选择
if (!empty($_GET['ajax']) && isset($_GET['cityid']))
{	header('Content-Type:text/plain; charset=utf-8');
	$citylist = "<option value='' selected>请选择城市</option>";
	$list = $db->row_select('area',"parentid='".$_GET['cityid']."'");
	if($list){
		foreach($list as $key => $value){
			$citylist .= "<option value=".$value['id'].">".$value['name']."</option>";
		}
	}
	echo $citylist;
	exit;
}

$settings  = settings();

$tpl->assign( 'weburl', WEB_PATH );
$tpl->assign( 'htmldir', HTML_DIR );
$tpl->assign( 'adminpage', ADMIN_PAGE );
$tpl->assign( 'setting', $settings );
$tpl->assign( 'partlist', get_channel());


//读取缓存
$fzz = new fzz_cache;
if( !($fzz->_isset( "common_cache" )) ){
	$fzz->set("common_cache",display_common_cache(),CACHETIME);
}
$commoncache = $fzz->get("common_cache");

$tpl->assign( 'common_cache', $commoncache);
?>