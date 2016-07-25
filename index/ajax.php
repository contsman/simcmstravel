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

//登录
if (!empty($_GET['ajax']) && isset($_GET['login']))
{	header('Content-Type:text/plain; charset=utf-8');
	if(!empty($_SESSION['USER_ID']) || !empty($_SESSION['USER_NAME'])){
		$loginstr=$_SESSION['USER_NAME'].",欢迎来到首都国旅网！<a href='".WEB_PATH."/index.php?mod=user'>[会员中心]</a> <a href='".WEB_PATH."/index.php?mod=user&ac=logout'>[退出]</a>";
	}
	else{
		$loginstr = "欢迎来到首都国旅网！&nbsp;&nbsp;<a href='".WEB_PATH."/index.php?mod=login' target='_blank'>[请登录]</a>&nbsp;&nbsp; 新用户？&nbsp;&nbsp;<a href='".WEB_PATH."/index.php?mod=register' target='_blank'>[请注册]</a>";
	}
	echo $loginstr;
	exit;
}


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

//国内城市选择
if (!empty($_GET['ajax']) && isset($_GET['china_cid']))
{	header('Content-Type:text/plain; charset=utf-8');
	$citylist = "<option value='' selected>请选择城市</option>";
	$list = $db->row_select('area',"parentid='".$_GET['china_cid']."'");
	if($list){
		foreach($list as $key => $value){
			$citylist .= "<option value='".$value['id']."' name='cid'>".$value['name']."</option>";
		}
	}
	echo $citylist;
	exit;
}

//国内城市选择(多选)
if (!empty($_GET['ajax']) && isset($_GET['china_pid']))
{	header('Content-Type:text/plain; charset=utf-8');
	$citylist = "<span class='cc".$_GET['china_pid']."'>";
	$list = $db->row_select('area',"parentid='".$_GET['china_pid']."'");
	if($list){
		foreach($list as $key => $value){
			$citylist .= "<input type=\"checkbox\" name=\"p_arrival_two[]\" value=".$value['id']."> ".$value['name']."&nbsp;&nbsp;";
		}
	}
	$citylist .= "</span>";
	echo $citylist;
	exit;
}

//国外国家选择(多选)
if (!empty($_GET['ajax']) && isset($_GET['foreign_cid']))
{	header('Content-Type:text/plain; charset=utf-8');
	if(isset($_GET['del']) and $_GET['del']==1){
		$ids = "";
		$list = $db->row_select('country',"parentid='".$_GET['foreign_cid']."'");
		foreach($list as $key => $value){
			$ids .= $value['id']."|";
		}
		echo $ids;
	}
	else{
		$citylist = "<span class='fc".$_GET['foreign_cid']."'>";
		$list = $db->row_select('country',"parentid='".$_GET['foreign_cid']."'");
		if($list){
			foreach($list as $key => $value){
				$citylist .= "<input type=\"checkbox\" name=\"p_arrival_two[]\" value=".$value['id']."> ".$value['name']."&nbsp;&nbsp;";
			}
		}
		$citylist .= "</span>";
		echo $citylist;
	}
	exit;
}

//国外城市选择(多选)
if (!empty($_GET['ajax']) && isset($_GET['foreign_ccid']))
{	header('Content-Type:text/plain; charset=utf-8');
	$citylist = "<span class='fcc".$_GET['foreign_ccid']."'>";
	$list = $db->row_select('country',"parentid='".$_GET['foreign_ccid']."'");
	if($list){
		foreach($list as $key => $value){
			$citylist .= "<input type=\"checkbox\" name=\"p_arrival_three[]\" value=".$value['id']."> ".$value['name']."&nbsp;&nbsp;";
		}
	}
	$citylist .= "</span>";
	echo $citylist;
	exit;
}

// 删除图片ajax
if (!empty($_GET['ajax']) && isset($_GET['p_id'])) {
	$str = $_GET['p_pic'];
	$arr_picid = explode("/",$str);
	$arr_length = count($arr_picid);
	$picstr = explode(".",$arr_picid[$arr_length-1]);
	if(!empty($_GET['p_id'])){
		$picpath = substr($str, 1);
		if (file_exists($picpath)) unlink($picpath);
		$delstr = $str;
		$arr = $db -> row_select_one('products', "p_id=" . intval($_GET['p_id']));
		if (!empty($arr['p_pics'])) {
			$pic_list = array_flip(explode("|", $arr['p_pics']));
			unset($pic_list[$delstr]);
			$post['p_pics'] = implode("|", array_flip($pic_list));
			$rs = $db -> row_update('products', $post, "p_id=" . intval($_GET['p_id']));
		} 
	}
	echo $picstr[0];
	exit;
} 

//目的地
if (!empty($_GET['ajax']) && isset($_GET['catid']))
{	header('Content-Type:text/plain; charset=utf-8');
	$citylist = "";
	$list = $db->row_select('products_category',"parentid='".intval($_GET['catid'])."'");
	if($list){
		foreach($list as $key => $value){
			$value['keyword'] = urlencode($value['catname']);
			$citylist .= "<a href='".WEB_PATH."/index.php?mod=search&ac=search&arrival_city=".$value['keyword']."'>".$value['catname']."</a>";
		}
	}
	echo $citylist;
	exit;
}

?>