<?php /* Smarty version 2.6.18, created on 2014-02-04 01:25:00
         compiled from admin/add_viewpoint.html */ ?>
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
<form name="form1" id="channelform"  enctype="multipart/form-data" method="post" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=viewpoint">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>景点标题：</th>
<td><input name="title" type="text"  size="30" value="<?php echo $this->_tpl_vars['viewpoint']['title']; ?>
"/></td>
</tr>
<tr>
<th>图片1：</th>
<td><input name="pic1" type="file"/>  <?php if ($this->_tpl_vars['viewpoint']['pic01'] <> ''): ?>[<a href="<?php echo $this->_tpl_vars['viewpoint']['pic01']; ?>
" target="_blank">查看图片</a>]<?php endif; ?></td>
</tr>
<tr>
<th>图片1描述：</th>
<td><textarea name="info01" rows="5" cols="50"><?php echo $this->_tpl_vars['viewpoint']['info01']; ?>
</textarea></td>
</tr>
<tr>
<th>图片2：</th>
<td><input name="pic2" type="file"/> <?php if ($this->_tpl_vars['viewpoint']['pic01'] <> ''): ?>[<a href="<?php echo $this->_tpl_vars['viewpoint']['pic02']; ?>
" target="_blank">查看图片</a>]<?php endif; ?></td>
</tr>
<tr>
<th>图片2描述：</th>
<td><textarea name="info02" rows="5" cols="50"><?php echo $this->_tpl_vars['viewpoint']['info02']; ?>
</textarea></td>
</tr>
<tr>
<th></th>
<td>
	<div class="buttons">
	<input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
	<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['viewpoint']['id']; ?>
">
	<input type="hidden" name="tid" value="<?php if ($this->_tpl_vars['viewpoint']['tid'] == ''): ?><?php echo $this->_tpl_vars['tid']; ?>
<?php else: ?><?php echo $this->_tpl_vars['viewpoint']['tid']; ?>
<?php endif; ?>">
	<input type="hidden" name="pid" value="<?php if ($this->_tpl_vars['viewpoint']['pid'] == ''): ?><?php echo $this->_tpl_vars['pid']; ?>
<?php else: ?><?php echo $this->_tpl_vars['viewpoint']['pid']; ?>
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