<?php /* Smarty version 2.6.18, created on 2014-01-24 11:57:43
         compiled from admin/ad_list.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css"/>
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
?mod=ad&ac=list">广告管理</a></li>
			<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=ad&ac=add">添加广告</a></li>
		</ul>
	</div>
</div>
<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=ad" method="post" name="form">
<table cellspacing="0" cellpadding="0" width="100%"  class="listtable">
<tr><th width="30">选择</th><th width="30">ID</th><th align="left">广告位名称</th><th>类型</th><th>状态</th><th>过期时间</th><th width="130">操作</th></tr>
<?php $_from = $this->_tpl_vars['adlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adlist']):
?>
<tr>
<td align="center"><input type="checkbox" name="bulkid[]" value="<?php echo $this->_tpl_vars['adlist']['id']; ?>
"></td>
<td align="center"><?php echo $this->_tpl_vars['adlist']['id']; ?>
</td>
<td align="left"><?php echo $this->_tpl_vars['adlist']['name']; ?>
</td>
<td align="center"><?php if ($this->_tpl_vars['adlist']['adtype'] == 1): ?>图片<?php else: ?>文字<?php endif; ?></td>
<td align="center"><?php echo $this->_tpl_vars['adlist']['status']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['adlist']['endtime']; ?>
</td>
<td align="center"> <a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=ad&ac=code&id=<?php echo $this->_tpl_vars['adlist']['id']; ?>
">调用代码</a> | <a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=ad&ac=edit&id=<?php echo $this->_tpl_vars['adlist']['id']; ?>
">编辑</a> | <a href="javascript:if(confirm('确实要删除吗?'))location='<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=ad&ac=del&id=<?php echo $this->_tpl_vars['adlist']['id']; ?>
'">删除</a>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
	<td align="center">
	<input type="checkbox" onclick="javascript:selectAll();">
	</td>
	<td colspan="5" class="buttontd">
	<a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=ad&ac=bulkdel','删除');" title="请选择后操作">删除</a>
	</td>
</tr>
</table>
</form>
<div class="listpage"><?php echo $this->_tpl_vars['button_basic']; ?>
<?php echo $this->_tpl_vars['button_select']; ?>
</div>
</div>
</body>
</html>