<?php /* Smarty version 2.6.18, created on 2016-08-03 11:42:06
         compiled from admin/add_visa_category.html */ ?>
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
<div class="tablenav"><span class="title">您的位置：信息管理 <span class="navfont">>></span> 添加分类</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
<form name="form" id="sortform" method="post" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=visa_category">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>分类名称：</th>
<td><input name="catname" type="text"  size="30" value="<?php echo $this->_tpl_vars['category']['catname']; ?>
" /></td>
</tr>
<tr>
<th></th>
<td>
	<div class="buttons"><input type="submit" name="thevaluesubmit" value="提交保存"/>
	<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
	<input type="hidden" name="catid" value="<?php echo $this->_tpl_vars['category']['catid']; ?>
">
	<input type="reset" name="thevaluereset" value="重置">
	<input name="valuesubmit" type="hidden" value="yes" /></div>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>