<?php /* Smarty version 2.6.18, created on 2014-01-24 11:56:53
         compiled from admin/products_category_list.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
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
			<ul class="menulist">
				<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products_category&ac=list">管理分类</a></li>
				<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products_category&ac=add">添加分类</a></li>
			</ul>
		</div>
	</div>
	<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products_category" method="post" name="form">
	<table cellspacing="0" cellpadding="0" width="100%"  class="listtable">
	<tr><th width="30">选择</th><th width="60">显示顺序</th><th align="left">分类名称</th><th align="center">操作</th></tr>
	<?php echo $this->_tpl_vars['sortlist']; ?>

	<tr>
		<td align="center">
			<input type="checkbox" onclick="javascript:selectAll();">
		</td>
		<td colspan="3" class="buttontd">
			<a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products_category&ac=bulksort','更新排序');" title="请选择后操作">更新排序</a>
		</td>
	</tr>
	</table>
	</form>
</div>
</body>
</html>