<?php /* Smarty version 2.6.18, created on 2014-01-28 14:16:50
         compiled from admin/feedback_list.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/js/common.js"></script>
</head>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
<form action="feedback.php" method="post" name="form">
<table cellspacing="0" cellpadding="0" width="100%"  class="listtable">
<tr><th>选择</th><th>联系人</th><th>电话</th><th>内容</th><th>提交时间</th><!-- <th>显示</th> --><th>操作</th></tr>
<?php $_from = $this->_tpl_vars['feedback']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Key'] => $this->_tpl_vars['feedbacklist']):
?>
<tr>
<td align="center"><input type="checkbox" name="bulkid[]" value="<?php echo $this->_tpl_vars['feedbacklist']['f_id']; ?>
"></td>
<td align="center"><?php echo $this->_tpl_vars['feedbacklist']['f_username']; ?>
</td>
<td align="center"><?php echo $this->_tpl_vars['feedbacklist']['f_tel']; ?>
</td>
<td align="left" width="200" style="line-height:22px;">
	<?php echo $this->_tpl_vars['feedbacklist']['f_detail']; ?>

</td>
<td align="center"><?php echo $this->_tpl_vars['feedbacklist']['f_addtime']; ?>
</td>
<!-- <td align="center"><?php if ($this->_tpl_vars['feedbacklist']['is_show'] == 1): ?>是<?php else: ?>否<?php endif; ?></td> -->
<td align="center"><!-- [<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=feedback&ac=check&id=<?php echo $this->_tpl_vars['feedbacklist']['f_id']; ?>
&isshow=<?php echo $this->_tpl_vars['feedbacklist']['is_show']; ?>
'">显示</a>][<a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=feedback&ac=edit&id=<?php echo $this->_tpl_vars['feedbacklist']['f_id']; ?>
'">回复</a>] -->[<a href="javascript:if(confirm('确实要删除吗?'))location='<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=feedback&ac=del&id=<?php echo $this->_tpl_vars['feedbacklist']['f_id']; ?>
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
?mod=feedback&ac=bulkdel','删除');" title="请选择后操作">删除</a>
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