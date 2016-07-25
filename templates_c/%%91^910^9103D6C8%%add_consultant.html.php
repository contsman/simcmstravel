<?php /* Smarty version 2.6.18, created on 2016-07-25 17:48:17
         compiled from admin/add_consultant.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<form name="form1" method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=consultant">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>姓名：</th>
<td><input name="name" type="text"  size="30" value="<?php echo $this->_tpl_vars['consultant']['name']; ?>
" /></td>
</tr>
<?php if ($this->_tpl_vars['consultant']['pic'] != ""): ?>
<Tr>
<th>原图例：</th>
<td><img src="upload/common/<?php echo $this->_tpl_vars['consultant']['pic']; ?>
" width="100px" height="100px"/></td>
</tr>
<?php endif; ?>
<tr>
<th>图例：</th>
<td><input name="upload" type="file"/>
</td>
<tr>
<tr>
<th>职称：</th>
<td><input name="zhicheng" type="text"  size="30" value="<?php echo $this->_tpl_vars['consultant']['zhicheng']; ?>
" /></td>
</tr>
<tr>
<th>业务范围：</th>
<td><input name="scope" type="text"  size="30" value="<?php echo $this->_tpl_vars['consultant']['scope']; ?>
" /></td>
</tr>
<tr>
<th></th>
<td>
	<div class="buttons"><input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
	<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['consultant']['id']; ?>
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