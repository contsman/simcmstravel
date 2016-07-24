<?php /* Smarty version 2.6.18, created on 2014-01-24 11:57:40
         compiled from admin/member_list.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/js/common.js"></script>
</head>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 >> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colormember01">
<div class="search clearfix">
	<div class="searchL">
		<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=member&ac=add" class="combutton">+添加会员</a>
	</div>
	<div class="searchR">
		<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
" method="get" name="form2">
		<table cellspacing="0" cellpadding="0" class="toptable">
			<tr>
				<td>
					 <input type="text" name="keywords" id="searchkey" value="" class="inp01"> &nbsp;<input type="submit" name="filtersubmit" value="查询" class="combutton02"><input type="hidden" name="mod" value="member">
					<input type="hidden" name="ac" value="list">
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>
<form action="index.php" method="post" name="form">
<table cellspacing="0" cellpadding="0" width="100%"  class="listtable">
<tr><th>选择</th><th>ID</th><th align="left">用户名</th><th>真实姓名</th><th>手机号</th><th>注册时间</th><th>最后登陆时间</th><th>状态</th><th align="right">操作</th></tr>
<?php $_from = $this->_tpl_vars['memberlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['memberlist']):
?>
<tr>
<td align="center" width="30"><input type="checkbox" name="bulkid[]" value="<?php echo $this->_tpl_vars['memberlist']['id']; ?>
"></td>
<td align="center" width="30"><?php echo $this->_tpl_vars['memberlist']['id']; ?>
</td>
<td align="left"><?php echo $this->_tpl_vars['memberlist']['email']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['memberlist']['turename']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['memberlist']['tel']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['memberlist']['regtime']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['memberlist']['last_login_time']; ?>
</td>
<td align="center"><?php if ($this->_tpl_vars['memberlist']['status'] == 1): ?>正常<?php else: ?><span class="red">锁定</span><?php endif; ?></td>
<td align="right" width="130"><?php if ($this->_tpl_vars['memberlist']['status'] == 1): ?>[<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=member&ac=lock&id=<?php echo $this->_tpl_vars['memberlist']['id']; ?>
">锁定</a>]<?php else: ?>[<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=member&ac=unlock&id=<?php echo $this->_tpl_vars['memberlist']['id']; ?>
">解锁</a>]<?php endif; ?> [<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=member&ac=edit&id=<?php echo $this->_tpl_vars['memberlist']['id']; ?>
">编辑</a>] [<a href="javascript:if(confirm('确实要删除吗?'))location='<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=member&ac=del&id=<?php echo $this->_tpl_vars['memberlist']['id']; ?>
'">删除</a>]
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
	<td align="center">
	<input type="checkbox" onclick="javascript:selectAll();">
	</td>
	<td colspan="7" class="buttontd">
	<a href="javascript:submitForm('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=member&ac=bulkdel','删除');" title="请选择后操作">删除</a>
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