<?php /* Smarty version 2.6.18, created on 2016-07-25 14:15:22
         compiled from admin/add_filmstrip.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
<form name="form1" method="post" enctype="multipart/form-data"  action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=filmstrip">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>图例：</th>
<td><input name="upload" type="file"/>
</td>
<tr>
<tr>
<th>url路径：</th>
<td><input name="url" type="text" size="50" value="<?php echo $this->_tpl_vars['filmstrip']['url']; ?>
" /></td>
</tr>
<th>详细说明：</th>
<td><input name="detail" type="text" size="100" value="<?php echo $this->_tpl_vars['filmstrip']['detail']; ?>
" /></td>
</tr>
<tr>
<th>排序：</th>
<td><input name="orderid" type="text" size="10" value="<?php echo $this->_tpl_vars['filmstrip']['orderid']; ?>
" /></td>
</tr>
<tr>
<th></th>
<td>
	<div class="buttons">
		<input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
		<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['filmstrip']['id']; ?>
">
		<input type="reset" name="thevaluereset" value="重置">
	</div>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>