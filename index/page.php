<?php
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