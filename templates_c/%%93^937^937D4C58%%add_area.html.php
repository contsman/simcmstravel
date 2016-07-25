<?php /* Smarty version 2.6.18, created on 2016-07-25 17:54:21
         compiled from admin/add_area.html */ ?>
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
			{ name:"name",type:"",simple:"地区名称",focusMsg:'请填写地区名称'}
		];
		$("#areaform").skygqCheckAjaxForm({
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
<form name="form1" id="areaform" method="post" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=area">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>名称：</th>
<td><input name="name" type="text"  size="30" value="<?php echo $this->_tpl_vars['area']['name']; ?>
" /></td>
</tr>
<tr>
<th>排序：</th>
<td>
	<input type="text" name="orderid" size="5" value="<?php echo $this->_tpl_vars['area']['l_orderid']; ?>
">
</td>
</tr>
<tr>
<th></th>
<td>
	<div class="buttons"><input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
	<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['area']['id']; ?>
">
	<input type="hidden" name="parentid" value="<?php echo $this->_tpl_vars['area']['parentid']; ?>
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