<?php /* Smarty version 2.6.18, created on 2014-01-24 11:57:50
         compiled from admin/permission_list.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/js/common.js"></script>
<script type="text/javascript" src="static/js/Calendar.js"></script>
</head>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
<div class="search clearfix">
	<div class="searchL">
		<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=permission&ac=add" class="combutton">添加权限模块</a>
	</div>
</div>
<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=permission" method="post" name="form">
<table cellspacing="0" cellpadding="0" width="100%" class="listtable">
<tr>
	<th>ID</th>
	<th width="40%" align='left'>权限模块/权限名称/具体操作</th>
	<th>执行文件</th>
	<th>执行操作</th>
	<th width="170">操作</th>
</tr>
<?php echo $this->_tpl_vars['permissionlist']; ?>

</table>
</form>
</div>
</body>
</html>