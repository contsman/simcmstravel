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
$tpl->assign( 'weburl', WEB_PATH );

include('page.php');

//验证邮箱
if (!empty($_GET['ajax']) and !empty($_GET['email']))
{	
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

	if($id!=0){
		$data = $db->row_count('member',"email='".$_GET['email']."' and id!=".$id);
	}
	else{
		$data = $db->row_count('member',"email='".$_GET['email']."'");
	}
    if($data==0){
		echo 1;
	}
	else{
		echo 0;
	}
	exit;
}

//验证验证码
if (!empty($_GET['ajax']) && isset($_GET['authcode'])) {
	if (trim($_GET['authcode']) == $_SESSION['authcode']) {
		echo 1;
	} else {
		echo 0;
	} 
	exit;
} 

if (submitcheck('ac'))
{
    $arr_not_empty = array('email'=>'用户名不能为空','password'=>'密码不能为空','repassword'=>'请再次输入密码', 'tel'=>'手机号不能为空', 'turename'=>'真实姓名不能为空','authcode'=>'验证码不能为空');
	if (!is_email($_POST['email'])) showmsg('错误的邮箱格式',-1);
	if ($db->row_count('member',"email='{$_POST['email']}'")) showmsg('邮箱已被注册，请换一个邮箱注册',-1);
    if ($_POST['authcode'] != $_SESSION['authcode']) showmsg('验证码不正确',-1);
    $_POST['password'] = trim($_POST['password']);
    $_POST['repassword'] = trim($_POST['repassword']);
    if ($_POST['password'] != $_POST['repassword']) showmsg('两次密码输入不一致',-1);
    
	$post = post('email','turename','tel');

	$post['status'] = 1;
    $post['password'] = md5($_POST['password']);
    $post['regtime'] = TIMESTAMP;

    $rs = $db->row_insert('member',$post);
    if (!$rs) {
		showmsg('注册失败，请稍后重新尝试',-1);
	}
	else{
		$insertid = $db->insert_id();
		$_SESSION['USER_ID'] = $insertid;
		$_SESSION['USER_NAME'] = $_POST['email'];
		showmsg('注册成功','index.php?mod=user');
	}
}
$tpl -> display('default/' . $settings['templates'] . '/register.html');
?>