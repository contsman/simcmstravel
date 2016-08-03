<?php /* Smarty version 2.6.18, created on 2016-07-25 17:54:51
         compiled from admin/add_keyword.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="tablenav"><span class="title">您现在的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
<form name="form1" method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=keyword">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>类型：</th>
<td>
<select name="k_type">
<?php $_from = $this->_tpl_vars['k_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Key'] => $this->_tpl_vars['ktype']):
?>
<?php if ($this->_tpl_vars['keyword'] && $this->_tpl_vars['keyword']['k_type'] == $this->_tpl_vars['Key']): ?>
<option value="<?php echo $this->_tpl_vars['Key']; ?>
" selected><?php echo $this->_tpl_vars['ktype']; ?>
</option>
<?php else: ?>
<option value="<?php echo $this->_tpl_vars['Key']; ?>
"><?php echo $this->_tpl_vars['ktype']; ?>
</option>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</select>
</td>
</tr>
<tr>
<th>关键字：</th>
<td><textarea style="width:500px; height:200px" name="k_keyword" class="textarea01"><?php echo $this->_tpl_vars['keyword']['k_keyword']; ?>
</textarea>
<p class="help">请用“|”把关键字隔开</p></td>
</tr>
<th></th>
<td>
	<div class="buttons"><input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
	<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
	<input type="hidden" name="k_id" value="<?php echo $this->_tpl_vars['keyword']['k_id']; ?>
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