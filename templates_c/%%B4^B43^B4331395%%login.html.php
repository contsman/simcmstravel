<?php /* Smarty version 2.6.18, created on 2016-07-25 13:20:53
         compiled from default/default/login.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $this->_tpl_vars['setting']['keywords']; ?>
-<?php echo $this->_tpl_vars['setting']['sitename']; ?>
</title>
		<meta content="<?php echo $this->_tpl_vars['setting']['keywords']; ?>
" name="keywords" />
		<meta content="<?php echo $this->_tpl_vars['setting']['description']; ?>
" name="description" />
		<link href="<?php echo $this->_tpl_vars['weburl']; ?>
/templates/default/<?php echo $this->_tpl_vars['setting']['templates']; ?>
/css/page_user.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery-1.4.2.min.js"></script>
		</head>
	<body>
<!--内容--> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/top.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="topline"></div>
<div class="register">
	<div class="register_box clearfix login">
		<h3>会员登录 <span class="english">LOGIN</span></h3>
        	<form method="post" id="loginfrom_01" action="index.php?mod=login">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                	<td colspan="2" class="td_2"></td>
                </tr>
                <tr>
                	<td class="td_1">邮箱：</td>
                    <td><input class="input_180" type="text" name="email"/></td>
                </tr>
                <tr>
                	<td class="td_1">密码：</td>
                    <td><input class="input_180" type="password" name="password"/></td>
                </tr>
				<tr>
                	<td class="td_1">验证码：</td>
                    <td><input type="text" name="authcode" class="input_60"> <img src="<?php echo $this->_tpl_vars['weburl']; ?>
/include/kcaptcha/" width="80" height="30" onclick="this.src='<?php echo $this->_tpl_vars['weburl']; ?>
/include/kcaptcha/?'+Math.random();" title="点击刷新验证码" align="absmiddle" style="cursor:pointer"/ id="checkcode"> <a href="#" onclick="document.getElementById('checkcode').src='<?php echo $this->_tpl_vars['weburl']; ?>
/include/kcaptcha/?'+Math.random();" class="td_a f14 unl">看不清楚？换一张</a></td>
                </tr>
                <tr>
                	<td class="td_1"></td>
                    <td><input type="submit" value="" class="loginbut"><input type="hidden" name="ac" value="login"/><!-- <a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=forgetpwd" class="td_a f14 unl">忘记密码？</a> --></td>
                </tr>
            </table>
           </form>
		 <div class="register_box_bottom mt20">
			<span class="title">还不是<?php echo $this->_tpl_vars['setting']['sitename']; ?>
会员？</span> 一分钟轻松注册！<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=register" target="_blank" class="unl f14">免费注册</a>
		</div>
    </div>
</div>

<!--版权-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/foot.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>