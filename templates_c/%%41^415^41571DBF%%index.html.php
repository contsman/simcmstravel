<?php /* Smarty version 2.6.18, created on 2016-07-25 17:59:35
         compiled from admin/index.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<link href="static/css/base.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/js/common.js"></script>
</head>
<body>
<div class="tablenav"><span class="title">您的位置：我的面板 </span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
	<div class="commombox">
		<h3>个人信息</h3>
		<div class="box">
			<p>您好，<?php echo $this->_tpl_vars['admin']['username']; ?>
</p>
			<p>所属角色：<?php echo $this->_tpl_vars['admin']['admintype']; ?>
</p>
			<p class="line"></p>
			<p>上次登录时间：<?php echo $this->_tpl_vars['admin']['last_login_time']; ?>
</p>
			<p>上次登录IP：<?php echo $this->_tpl_vars['admin']['last_login_ip']; ?>
</p>
		</div>
	</div>
	<div class="commombox mt10">
		<h3>系统信息</h3>
		<div class="box">
			<p>程序版本：1.0</p>
			<p>操作系统：<?php echo $this->_tpl_vars['sysinfo']['system']; ?>
 </p>
			<p>服务器软件：<?php echo $this->_tpl_vars['sysinfo']['software']; ?>
 </p>
			<p>MySQL 版本：<?php echo $this->_tpl_vars['sysinfo']['mysql']; ?>
</p>
			<p>技术支持：wtc0913@163.com </p>
		</div>
	</div>
 </div>
 </body>
</html>