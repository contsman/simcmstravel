<?php /* Smarty version 2.6.18, created on 2014-02-04 20:05:19
         compiled from admin/trip_list.html */ ?>
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
		<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=trip&ac=add&pid=<?php echo $this->_tpl_vars['pid']; ?>
" class="combutton">+添加行程</a>
	</div>
</div>
<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=trip" method="post" name="form">
<table cellspacing="0" cellpadding="0" width="100%"  class="listtable">
<tr><th>选择</th><th>ID</th><th>排序</th><th align="left">行程名称</th><th  width='150'>操作</th></tr>
<?php $_from = $this->_tpl_vars['triplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trip']):
?>
<tr>
<td align="center" width="30"><input type="checkbox" name="bulkid[]" value="<?php echo $this->_tpl_vars['trip']['id']; ?>
"></td>
<td align="center" width="30"><?php echo $this->_tpl_vars['trip']['id']; ?>
</td>
<td align="center" width="50"><input type="text" size="5" name="orderid[<?php echo $this->_tpl_vars['trip']['id']; ?>
]" value="<?php echo $this->_tpl_vars['trip']['orderid']; ?>
" class="ip01"/></td>
<td align="left"><?php echo $this->_tpl_vars['trip']['title']; ?>
</td>
<td align="center">[<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=viewpoint&ac=list&tid=<?php echo $this->_tpl_vars['trip']['id']; ?>
&pid=<?php echo $this->_tpl_vars['trip']['pid']; ?>
" target="_blank">景点列表</a>] [<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=trip&ac=edit&id=<?php echo $this->_tpl_vars['trip']['id']; ?>
">编辑</a>] [<a href="javascript:if(confirm('确实要删除吗?'))location='<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=trip&ac=del&id=<?php echo $this->_tpl_vars['trip']['id']; ?>
'">删除</a>]
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
	<td align="center">
	<input type="checkbox" onclick="javascript:selectAll();">
	</td>
	<td colspan="4" class="buttontd">
	<a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=trip&ac=bulkdel&pid=<?php echo $this->_tpl_vars['pid']; ?>
','删除');" title="请选择后操作">删除</a> <a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=trip&ac=bulksort&pid=<?php echo $this->_tpl_vars['pid']; ?>
','更新排序');" title="请选择后操作">更新排序</a>
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