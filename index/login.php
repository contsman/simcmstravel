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

//退出登陆
if (is_user_login() && get('ac') == 'logout')
{
    session_unset();
    session_destroy();
}

//已登陆转向
if (is_user_login()) redirect('',WEB_PATH.'/index.php?mod=user&ac=index');

//登陆
if (submitcheck('ac'))
{
    //不可为空
    $arr_not_empty = array('email'=>'请输入您的邮箱','password'=>'请输入您的密码');
    can_not_be_empty($arr_not_empty,$_POST);
    
	//if (trim($_POST['authcode']) != $_SESSION['authcode']) showmsg('验证码不正确',-1);
    $rs_user = $db->row_select_one('member',"email='".trim($_POST['email'])."' AND password='".md5(trim($_POST['password']))."'");
    if (!$rs_user) showmsg('用户不存在或密码错误',-1);
    if (!$rs_user['status']) showmsg('此账户已被禁用',-1);
    $db->row_update('member',array('last_login_time'=>TIMESTAMP,'last_login_ip'=>get_client_ip(),'login_count'=>$rs_user['login_count']+1),"id={$rs_user['id']}");
    $_SESSION['USER_ID'] = $rs_user['id'];
	$_SESSION['USER_NAME'] = $rs_user['email'];
    showmsg('登陆成功',WEB_PATH.'/index.php?mod=user&ac=index');
}

//未登陆转到登陆页面
$tpl -> display('default/' . $settings['templates'] . '/login.html');
?>