<?php /* Smarty version 2.6.18, created on 2016-08-03 10:17:26
         compiled from admin/add_page.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="admin/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="static/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="static/js/skygqcheckajaxform.1.5/jquery.skygqcheckajaxform.1.5.js"></script>
<script type="text/javascript">
	$(function() {
		var items_array = [
			{ name:"s_id",type:"",simple:"分类",focusMsg:'请选分类'},
			{ name:"p_title",type:"",simple:"页面标题",focusMsg:'请填写页面标题'}
		];
		$("#pageform").skygqCheckAjaxForm({
			items			: items_array
		});
	});
</script>
</head>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
<div class="search clearfix">
	<div class="searchL">
		<ul class="menulist">
			<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=page_sort&ac=list">单页分类</a></li>
			<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=page&ac=add">添加单页</a></li>
		</ul>
	</div>
</div>
<form name="form1" id="pageform" method="post" enctype="multipart/form-data"  action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=page">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>分类：</th>
<td>
	<select name="s_id">
	<?php echo $this->_tpl_vars['selectpagesort']; ?>

	</select>
</td>
</tr>
<tr>
<th>页面标题：</th>
<td><input name="p_title" type="text" size="30" value="<?php echo $this->_tpl_vars['page']['p_title']; ?>
" /></td>
</tr>
<tr>
<th>排序</th>
<td><input name="orderid" type="text" size="10" value="<?php echo $this->_tpl_vars['page']['orderid']; ?>
" /></td>
</tr>
<tr>
<th>页面内容：</th>
<td height="350"><textarea class="ckeditor" cols="80" id="editor1" name="p_info" rows="10"><?php echo $this->_tpl_vars['page']['p_info']; ?>
</textarea>
</td>
</tr>
<tr>
<th>静态文件名：</th>
<td><input name="p_page" type="text" size="30" value="<?php echo $this->_tpl_vars['page']['p_page']; ?>
" /> <span class="gray">可不填写</span></td>
</tr>
<tr>
<th>引用模版：</th>
<td>
	<select name="p_tql">
		<option value="about.html" <?php if ($this->_tpl_vars['page']['p_tql'] == "about.html"): ?>selected<?php endif; ?>>about.html(关于我们类)</option>
		<option value="enterprise.html" <?php if ($this->_tpl_vars['page']['p_tql'] == "enterprise.html"): ?>selected<?php endif; ?>>enterprise.html(企业客户)</option>
	</select>
</tr>
<tr>
<th></th>
<td>
	<div class="buttons"><input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
	<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['page']['p_id']; ?>
">
	<input type="hidden" name="p_list" value="<?php echo $this->_tpl_vars['page']['p_list']; ?>
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