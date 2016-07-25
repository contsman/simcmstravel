<?php /* Smarty version 2.6.18, created on 2016-07-25 17:50:32
         compiled from admin/add_products_category.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="static/js/skygqcheckajaxform.1.5/jquery.skygqcheckajaxform.1.5.js"></script>
<script type="text/javascript">
	$(function() {
		var items_array = [
			{ name:"catname",type:"",simple:"分类名称",focusMsg:'请填写分类名称'}
		];
		$("#sortform").skygqCheckAjaxForm({
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
?mod=products_category&ac=list">管理分类</a></li>
				<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products_category&ac=add">添加分类</a></li>
			</ul>
		</div>
	</div>
	<form name="form" id="sortform" method="post" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products_category">
	<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
	<tr>
	<th>上级分类</th>
	<td>
		<?php echo $this->_tpl_vars['selectcategory']; ?>

	</td>
	</tr>
	<tr>
	<th>分类名称</th>
	<td><input name="catname" type="text"  size="30" value="<?php echo $this->_tpl_vars['category']['catname']; ?>
" /></td>
	</tr>
	<tr>
	<th>链接地址</th>
	<td><input name="url" type="text"  size="60" value="<?php echo $this->_tpl_vars['category']['url']; ?>
" /></td>
	</tr>
	<tr>
	<th>是否推荐</th>
	<td><input type="checkbox" name="recommend" value="1" <?php if ($this->_tpl_vars['category']['recommend'] == 1): ?>checked<?php endif; ?>> 推荐</td>
	</tr>
	<tr>
	<th>是否显示</th>
	<td><input type="radio" name="isshow" value="1" <?php if ($this->_tpl_vars['category']['isshow'] == 1 || $this->_tpl_vars['category']['isshow'] == ''): ?>checked<?php endif; ?>> 是  <input type="radio" name="isshow" value="0" <?php if ($this->_tpl_vars['category']['isshow'] == 0 && $this->_tpl_vars['ac'] == 'edit'): ?>checked<?php endif; ?>> 否</td>
	</tr>
	<tr>
	<th></th>
	<td>
		<div class="buttons"><input type="submit" name="thevaluesubmit" value="提交保存"/>
		<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['category']['catid']; ?>
">
		<input type="reset" name="thevaluereset" value="重置">
		<input name="valuesubmit" type="hidden" value="yes" />
		<input type="hidden" name="type" value="<?php echo $this->_tpl_vars['cattype']; ?>
">
		</div>
	</td>
	</tr>
	</table>
	</form>
</div>
</body>
</html>