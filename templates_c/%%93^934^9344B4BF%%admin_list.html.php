<?php /* Smarty version 2.6.18, created on 2014-01-24 11:57:50
         compiled from admin/admin_list.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/js/common.js"></script>
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
?mod=admin&ac=add" class="combutton">+添加管理员</a>
	</div>
</div>
<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
" method="post" name="form">
<table cellspacing="0" cellpadding="0" width="100%"  class="listtable">
<tr>
	<th>选择</th>
	<th>管理ID</th>
	<th>用户名</th>
	<th>管理员类型</th>
	<th>上次登陆时间</th>
	<th>上次登陆IP</th>
	<th>登陆次数</th>
	<th>状态</th>
	<th>描述</th><th>操作</th></tr>
<?php $_from = $this->_tpl_vars['adminlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
<tr>
<td align="center" width="30"><input type="checkbox" name="bulkid[]" value="<?php echo $this->_tpl_vars['user']['adminid']; ?>
"></td>
<td align="center"><?php echo $this->_tpl_vars['user']['adminid']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['user']['username']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['user']['admin_type']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['user']['last_login_time']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['user']['last_login_ip']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['user']['login_count']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['user']['statusname']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['user']['description']; ?>
</td>
<td align="center" width="80">[<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=admin&ac=edit&id=<?php echo $this->_tpl_vars['user']['adminid']; ?>
">编辑</a>][<a href="javascript:if(confirm('确实要删除吗?'))location='<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=admin&ac=del&id=<?php echo $this->_tpl_vars['user']['adminid']; ?>
'">删除</a>]
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
	<td align="center">
	<input type="checkbox" onclick="javascript:selectAll();">
	</td>
	<td colspan="7" class="buttontd">
	<a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=admin&ac=bulkdel','删除');" title="请选择后操作">删除</a>
	</td>
</tr>
</table>
</form>
<div class="listpage"><?php echo $this->_tpl_vars['button_basic']; ?>
<?php echo $this->_tpl_vars['button_select']; ?>
</div>
</div>
</body>
</html>