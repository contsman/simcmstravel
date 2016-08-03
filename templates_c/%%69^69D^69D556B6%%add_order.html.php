<?php /* Smarty version 2.6.18, created on 2014-02-04 20:51:06
         compiled from admin/add_order.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>订单编号：</th>
<td><?php echo $this->_tpl_vars['order']['adult_nums']; ?>
</td>
</tr>
<tr>
<th>线路编码：</th>
<td><?php echo $this->_tpl_vars['order']['p_no']; ?>
</td>
</tr>
<tr>
<th>线路名称：</th>
<td><?php echo $this->_tpl_vars['order']['p_title']; ?>
</td>
</tr>
<tr>
<th>人数：</th>
<td>成人：<?php echo $this->_tpl_vars['order']['adult_nums']; ?>
 + 儿童：<?php echo $this->_tpl_vars['order']['children_nums']; ?>
 = 总人数：<?php echo $this->_tpl_vars['order']['all_nums']; ?>
 </td>
</tr>
<tr>
<th>价格：</th>
<td class="fb orange01"><?php echo $this->_tpl_vars['order']['price']; ?>
元</td>
</tr>
<tr>
<th>订购会员：</th>
<td><?php echo $this->_tpl_vars['order']['email']; ?>
 ( <?php echo $this->_tpl_vars['order']['turename']; ?>
 )</td>
</tr>
<tr>
<th>联系电话：</th>
<td><?php echo $this->_tpl_vars['order']['tel']; ?>
</td>
</tr>
</table>
</div>
 </body>
</html>