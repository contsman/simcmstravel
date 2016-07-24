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

include ('page.php');

if (!is_user_login()) showmsg('请先登陆', 'index.php?mod=login');

// 允许操作
$ac_arr = array('index' => '欢迎登陆', 'logout' => '退出登录', 'upinfo' => '修改资料', 'uppwd' => '修改密码', 'orderlist' =>'我的订单', 'detail' =>'订单详情');

// 当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'index';

$tpl -> assign('ac_arr', $ac_arr);
$tpl -> assign('ac', $ac);

$userinfo = $db -> row_select_one('member', "id={$_SESSION['USER_ID']}");
$tpl -> assign('user', $userinfo);

// 检验密码
if (!empty($_GET['ajax']) && isset($_GET['oldpassword'])) {
	if($userinfo['password'] == md5($_GET['oldpassword'])) {
		echo 1;
	} else {
		echo 0;
	} 
	exit;
} 

// 欢迎登录
if ($ac == 'index') {

	$userinfo['last_login_time'] = date("Y-m-d H:i:s", $userinfo['last_login_time']);
	$tpl -> assign('user', $userinfo);
	$tpl -> display('default/' . $settings['templates'] . '/user_center.html');
	exit;
} 
// 退出登录
elseif (is_user_login() && $ac == 'logout') {
	session_unset();
	session_destroy();
	showmsg($ac_arr[$ac] . ('成功'), "index.php?mod=login");
} 
// 修改密码
elseif ($ac == 'uppwd') {
	if (submitcheck('ac')) {
		$arr_not_empty = array('oldpassword' => '原始密码不可为空', 'password' => '请填写新密码', 'repassword' => '请再次输入新密码');
		can_not_be_empty($arr_not_empty, $_POST);
		if ($_POST['password'] != $_POST['repassword']) showmsg('两次密码输入不一致', -1);
		$rs = $db -> row_select_one('member', "id='{$_SESSION['USER_ID']}'");
		if (!$rs || $rs['password'] != md5($_POST['oldpassword'])) showmsg('原密码输入错误', -1);
		$rs = $db -> row_update('member', array('password' => md5(trim($_POST['password']))), "id={$_SESSION['USER_ID']}");
		showmsg($ac_arr[$ac] . ($rs ? '成功' : '失败'), "index.php?mod=user&ac=index");
	} else {
		$tpl -> display('default/' . $settings['templates'] . '/user_center.html');
		exit;
	} 
} 
// 修改个人资料
elseif ($ac == 'upinfo') {
	if (submitcheck('ac')) {
		$arr_not_empty = array('turename' => '真实姓名不能为空','tel' => '手机号码不能为空');
		$post = post('turename', 'tel');
		can_not_be_empty($arr_not_empty, $_POST);
		$rs = $db -> row_update('member', $post, "id={$_SESSION['USER_ID']}");
		showmsg($ac_arr[$ac] . ($rs ? '成功' : '失败'), "index.php?mod=user&ac=upinfo");
	} else {
		$tpl -> assign('user', $userinfo);
		$tpl -> display('default/' . $settings['templates'] . '/user_center.html');
		exit;
	} 
} elseif ($ac == 'orderlist') {
	$where = 'uid ='.$_SESSION['USER_ID'];
	include(INC_DIR . 'Page.class.php');
	$Page = new Page($db->tb_prefix.'order',$where,'*','20','addtime desc');
	$list = $Page -> get_data();
	foreach($list as $key => $value) {
		$list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']); 
		$line = $db -> row_select_one('products', "p_id=".$value['pid'],'p_title,p_page,p_addtime');
		$list[$key]['p_title'] = _substr($line['p_title'],0,100);
		$time_dir = date('Ym', $line['p_addtime']);
		$list[$key]['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $line['p_page']; 
	} 
	$button_basic = $Page -> button_basic();
	$button_select = $Page -> button_select(); 
	$tpl -> assign('orderlist', $list);
	$tpl -> assign('button_basic', $button_basic);
	$tpl -> assign('button_select', $button_select);
	$tpl -> display('default/' . $settings['templates'] . '/user_center.html');
	exit;
} 
//订单详情
elseif ($ac == 'detail') {
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$order = $db -> row_select_one('order', "id=".$id." and uid =".$_SESSION['USER_ID'],'*');
	$order['addtime'] = date('Y-m-d H:i:s', $order['addtime']); 
	$order['departure_date'] = date('Y-m-d', $order['departure_date']);
	$line = $db -> row_select_one('products', "p_id=".$order['pid'],'p_title,p_page,p_addtime');
	$order['p_title'] = _substr($line['p_title'],0,100);
	$time_dir = date('Ym', $line['p_addtime']);
	$order['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $line['p_page']; 

	$tpl -> assign('order', $order);
	$tpl -> display('default/' . $settings['templates'] . '/user_center.html');
	exit;
} 
 else {
	showmsg('非法操作', -1);
} 
?>