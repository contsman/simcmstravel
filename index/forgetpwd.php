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

if (submitcheck('email'))
{
    $arr_not_empty = array('email'=>'邮箱不能为空');
    if (!is_email($_POST['email'])) showmsg('错误的邮箱格式',-1);
    $rs = $db->row_select_one('member',"email='{$_POST['email']}'",'id,email,username');
    if (!$rs) showmsg('此用户不存在',-1);
    if ($rs['email'] != $_POST['email']) showmsg('输入邮箱不正确',-1);
    $authkey = md5($rs['id'].mt_rand());
    if (!$db->row_update('member',array('authkey'=>$authkey),"id={$rs['id']}")) showmsg('服务器繁忙，请稍后再试',-1);
    $url = WEB_URL."/index.php?mod=forgetpwd&u={$rs['email']}&key={$authkey}";
    if (!mail_replace_send('loss_password_mail',array('$email'=>$rs['email'],'$name'=>$rs['username'],'$url'=>$url)))
        showmsg('发送邮件失败，请稍事再次尝试',-1);
    showmsg('一封邮件已发往你的邮箱，请登陆邮箱继续重设密码','index.php?mod=login');
}

if (submitcheck('password'))
{
    $arr_not_empty = array('password'=>'请输入新密码','pwdagain'=>'请再次输入新密码');
    can_not_be_empty($arr_not_empty,$_POST);
    $_POST['password'] = trim($_POST['password']);
    if ($_POST['password'] != trim($_POST['pwdagain'])) showmsg('两次密码输入不一致',-1);
    
    //$rs = $db->row_select_one('member',"email='{$_SESSION['RESET_NAME']}'",'salt');
    
    //if (!$rs) showmsg('非法提交','index.php');
    
    //uc格式的密码
    //$password = md5(md5($_POST['password']).$rs['salt']);
	$password = md5($_POST['password']);
    if (!$db->row_update('member',array('password'=>$password,'authkey'=>''),"email='{$_SESSION['RESET_NAME']}'"))
        showmsg('重设密码失改，请稍后再试',-1);
    
    unset($_SESSION['RESET_NAME']);
    showmsg('重设密码成功','index.php?mod=login');
}

//验证信息
if (!empty($_GET['u']) && !empty($_GET['key']))
{
    if (!$db->row_count('member',"email='{$_GET['u']}' AND authkey='{$_GET['key']}'"))
        showmsg('验证信息不正确，请使用正确的验证信息','index.php?mod=login');
    
    $_SESSION['RESET_NAME'] = $_GET['u'];
        
    $ac = 'resetpwd';
	$tpl -> assign('ac', $ac);
}

$tpl->display( 'default/forgetpwd.html' );
?>