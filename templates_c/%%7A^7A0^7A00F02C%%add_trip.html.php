<?php /* Smarty version 2.6.18, created on 2014-02-04 20:05:20
         compiled from admin/add_trip.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="admin/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="static/js/jquery-1.4.2.min.js"></script>
</head>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
<form name="form1" id="channelform" method="post" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=trip">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>行程标题：</th>
<td><input name="title" type="text"  size="30" value="<?php echo $this->_tpl_vars['trip']['title']; ?>
" /></td>
</tr>
<tr>
<tr>
<th>行程内容：</th>
<td><textarea class="ckeditor" cols="80" id="editor1" name="info" rows="20"><?php echo $this->_tpl_vars['trip']['info']; ?>
</textarea></td>
</tr>
<tr>
<tr>
<th>今日游览景点：</th>
<td><input name="scenictitle" type="text"  size="100" value="<?php echo $this->_tpl_vars['trip']['scenictitle']; ?>
" /></td>
</tr>
<tr>
<th>景点描述：</th>
<td><textarea class="ckeditor" cols="80" id="editor2" name="scenicinfo" rows="20"><?php echo $this->_tpl_vars['trip']['scenicinfo']; ?>
</textarea></td>
</tr>
<tr>
<th></th>
<td>
	<div class="buttons">
	<input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
	<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['trip']['id']; ?>
">
	<input type="hidden" name="pid" value="<?php if ($this->_tpl_vars['trip']['pid'] == ''): ?><?php echo $this->_tpl_vars['pid']; ?>
<?php else: ?><?php echo $this->_tpl_vars['trip']['pid']; ?>
<?php endif; ?>">
	<input type="reset" name="thevaluereset" value="重置">
	</div>
</td>
</tr>
</table>
</div>
</form>
 </body>
</html>