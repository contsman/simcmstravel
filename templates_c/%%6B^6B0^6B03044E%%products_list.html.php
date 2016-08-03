<?php /* Smarty version 2.6.18, created on 2016-08-02 17:49:42
         compiled from admin/products_list.html */ ?>
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
?mod=products&ac=list&s_type=1">线路列表</a></li>
				<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products&ac=add">添加线路</a></li>
			</ul>
		</div>
		<div class="searchR">
		<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
" method="get" name="form2">
		<table cellspacing="0" cellpadding="0" class="toptable">
			<tr>
				<td>
					<select name="state">
						<option value="" selected>全部</option>
						<option value="1">推荐</option>
						<option value="2">首页推荐</option>
						<option value="3">首页推荐</option>
						<option value="4">促销线路</option>
						<option value="5">当季热卖</option>
					</select> <input type="text" name="keywords" id="searchkey" value="" class="inp01"> &nbsp;<input type="submit" name="filtersubmit" value="查询" class="combutton02"><input type="hidden" name="mod" value="products">
					<input type="hidden" name="ac" value="list">
				</td>
			</tr>
		</table>
		</form>
		</div>
	</div>
	<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products" method="POST" name="form">
	<table cellspacing="0" cellpadding="0" class="listtable">
	<tr>
		<th width="30">选择</th>
		<th width="30">ID</th>
		<th>线路名称</th>
		<th>线路分类</th>
		<th>添加时间</th>
		<th>是否显示</th>
		<th width="230">操作</th>
	</tr>
	<?php $_from = $this->_tpl_vars['productslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['products']):
?>
	<tr>
		<td align="center"><input type="checkbox" name="bulkid[]" value="<?php echo $this->_tpl_vars['products']['p_id']; ?>
"></td>
		<td align="center" width="50"><?php echo $this->_tpl_vars['products']['p_id']; ?>
</td>
		<td><a href="<?php echo $this->_tpl_vars['products']['p_url']; ?>
" target="_blank"/><?php echo $this->_tpl_vars['products']['p_title']; ?>
</a> <?php if ($this->_tpl_vars['products']['p_pics'] <> ""): ?>[图]<?php endif; ?>  <?php if ($this->_tpl_vars['products']['recommend'] == 1): ?><span class="red">推荐</span><?php endif; ?> <?php if ($this->_tpl_vars['products']['recommend_home'] == 1): ?><span class="red">首页推荐</span><?php endif; ?> <?php if ($this->_tpl_vars['products']['sp_recommend_home'] == 1): ?><span class="red">首页特别推荐</span><?php endif; ?> <?php if ($this->_tpl_vars['products']['promotions'] == 1): ?><span class="red">促销线路</span><?php endif; ?> <?php if ($this->_tpl_vars['products']['ishot'] == 1): ?><span class="red">当季热卖</span><?php endif; ?></td>
		<td align="center"><?php echo $this->_tpl_vars['products']['catname']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['products']['p_addtime']; ?>
</td>
		<td align="center"><?php if ($this->_tpl_vars['products']['is_show'] == 1): ?>是<?php else: ?><span class="orange01">否</span><?php endif; ?></td>
		<td align="center"> <a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products&ac=show&isshow=<?php if ($this->_tpl_vars['products']['is_show'] == 1): ?>2<?php else: ?>1<?php endif; ?>&id=<?php echo $this->_tpl_vars['products']['p_id']; ?>
"><?php if ($this->_tpl_vars['products']['is_show'] == 1): ?>不显示<?php else: ?>显示<?php endif; ?></a> | <a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products&ac=html&id=<?php echo $this->_tpl_vars['products']['p_id']; ?>
">生成静态</a> | <a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=departure_time&ac=list&pid=<?php echo $this->_tpl_vars['products']['p_id']; ?>
">出发日期</a> <br/> <a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=trip&ac=list&pid=<?php echo $this->_tpl_vars['products']['p_id']; ?>
">行程列表</a> | <a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products&ac=edit&id=<?php echo $this->_tpl_vars['products']['p_id']; ?>
">编辑</a> | <a href="javascript:if(confirm('确实要删除吗?'))location='<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products&ac=del&id=<?php echo $this->_tpl_vars['products']['p_id']; ?>
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
?mod=products&ac=bulkdel','删除');" title="请选择后操作">删除</a> <a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products&ac=bulkhtml','生成静态');" title="请选择后操作">生成静态</a> <a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products&ac=bulksort','更新排序');" title="请选择后操作">更新排序</a>
	</td>
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