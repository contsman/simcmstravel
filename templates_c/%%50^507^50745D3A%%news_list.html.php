<?php /* Smarty version 2.6.18, created on 2014-01-24 11:58:00
         compiled from admin/news_list.html */ ?>
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
?mod=products&ac=list">新闻管理</a></li>
				<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=news&ac=add">添加新闻</a></li>
			</ul>	
		</div>
		<div class="searchR">
		<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
" method="get" name="form2">
		<table cellspacing="0" cellpadding="0" class="toptable">
			<tr>
				<td>
					<?php echo $this->_tpl_vars['selectcategory']; ?>
 <input type="text" name="keywords" id="searchkey" value="" class="inp01"> &nbsp;<input type="submit" name="filtersubmit" value="查询" class="combutton02"><input type="hidden" name="mod" value="news">
					<input type="hidden" name="ac" value="list">
				</td>
			</tr>
		</table>
		</form>
		</div>
	</div>
	<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=news" method="POST" name="form">
	<table cellspacing="0" cellpadding="0" class="listtable">
	<tr>
		<th width="30">选择</th>
		<th width="30">ID</th>
		<th>新闻标题</th>
		<th>添加时间</th>
		<th>新闻状态</th>
		<th>新闻分类</th>
		<th>点击</th>
		<th width="120">操作</th>
	</tr>
	<?php $_from = $this->_tpl_vars['newslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
	<tr>
		<td align="center"><input type="checkbox" name="bulkid[]" value="<?php echo $this->_tpl_vars['news']['n_id']; ?>
"></td>
		<td align="center"><?php echo $this->_tpl_vars['news']['n_id']; ?>
</td>
		<td><a href="<?php echo $this->_tpl_vars['news']['n_url']; ?>
" target="_blank"/><?php echo $this->_tpl_vars['news']['n_title']; ?>
</a></td>
		<td align="center"><?php echo $this->_tpl_vars['news']['n_addtime']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['news']['n_category']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['news']['n_typename']; ?>
</td>
		<td align="center" class="orange01"><?php echo $this->_tpl_vars['news']['n_hits']; ?>
</td>
		<td align="center"> <a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=news&ac=html&id=<?php echo $this->_tpl_vars['news']['n_id']; ?>
">生成静态</a> | <a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=news&ac=edit&id=<?php echo $this->_tpl_vars['news']['n_id']; ?>
">编辑</a> | <a href="javascript:if(confirm('确实要删除吗?'))location='<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=news&ac=del&id=<?php echo $this->_tpl_vars['news']['n_id']; ?>
'">删除</a>
	</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td align="center">
			<input type="checkbox" onclick="javascript:selectAll();">
		</td>
		<td colspan="8" class="buttontd" style="text-align:left;">
			<a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=news&ac=bulkdel','删除');" title="请选择后操作">删除</a> <a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=news&ac=bulkhtml','生成静态');" title="请选择后操作">生成静态</a>
		</td>
	</tr>
	</table>
	</form>
	<div class="page"><?php echo $this->_tpl_vars['button_basic']; ?>
<?php echo $this->_tpl_vars['button_select']; ?>
</div>
</div>
</body>
</html>