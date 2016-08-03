<?php /* Smarty version 2.6.18, created on 2014-01-24 11:57:48
         compiled from admin/add_setting.html */ ?>
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
<div class="search clearfix">
	<div class="searchL">
		<ul class="menulist">
			<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=settings&ac=web">系统基本设置</a></li>
			<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=settings&ac=contact">联系方式设置</a></li>
		</ul>
	</div>
</div>
<form action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=settings" method="post" name="form" onsubmit="return chksubmit();">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<?php if ($this->_tpl_vars['ac'] == 'web'): ?>
<tr>
<th>网站名称：</th>
<td><input name="sitename" type="text" size="30" id="sitename" value="<?php echo $this->_tpl_vars['setting']['sitename']; ?>
" /></td>
</tr>
<tr>
<th>网站title：</th>
<td><input name="title" type="text" size="50" id="title" value="<?php echo $this->_tpl_vars['setting']['title']; ?>
" /></td>
</tr>
<tr>
<th>网站keywords：</th>
<td><input name="keywords" type="text" size="50"  value="<?php echo $this->_tpl_vars['setting']['keywords']; ?>
" /></td>
</tr>
<tr>
<th>网站版权信息：</th>
<td><input name="copyright" type="text" size="50"  value="<?php echo $this->_tpl_vars['setting']['copyright']; ?>
" /></td>
</tr>
<tr>
<th>网站备案号：</th>
<td><input name="icp" type="text" size="30"  value="<?php echo $this->_tpl_vars['setting']['icp']; ?>
" /></td>
</tr>
<tr>
<th>网站description：</th>
<td><textarea name="description" rows="5" cols="90" class="textarea01"><?php echo $this->_tpl_vars['setting']['description']; ?>
</textarea></td>
</tr>
<tr>
<th>开启水印：</th>
<td><input type="radio" name="water" value="1" <?php if ($this->_tpl_vars['setting']['water'] == 1): ?>checked<?php endif; ?>> 是 <input type="radio" name="water" value="0" <?php if ($this->_tpl_vars['setting']['water'] == 0): ?>checked<?php endif; ?>> 否</td>
</tr>
<tr>
<th>是否生成缩略图：</th>
<td><input type="radio" name="isdstimg" value="1" <?php if ($this->_tpl_vars['setting']['isdstimg'] == 1): ?>checked<?php endif; ?>> 是 <input type="radio" name="isdstimg" value="0" <?php if ($this->_tpl_vars['setting']['isdstimg'] == 0): ?>checked<?php endif; ?>> 否</td>
</tr>
<tr>
<th>缩略图尺寸：</th>
<td>宽：<input type="text" name="imgwidth" size="5" value="<?php echo $this->_tpl_vars['setting']['imgwidth']; ?>
">  高：<input type="text" size="5" name="imgheight"value="<?php echo $this->_tpl_vars['setting']['imgheight']; ?>
"> </td>
</tr>
<tr>
<th>模版选择：</th>
<td><select name="templates">
	<?php echo $this->_tpl_vars['selecttemplates']; ?>

	</select>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['ac'] == 'contact'): ?>
<tr>
<th>地址：</th>
<td><input name="address" type="text" size="60"  value="<?php echo $this->_tpl_vars['setting']['address']; ?>
" /></td>
</tr>
<tr>
<th>邮编：</th>
<td><input name="postcode" type="text" size="30"  value="<?php echo $this->_tpl_vars['setting']['postcode']; ?>
" /></td>
</tr>
<tr>
<th>电话：</th>
<td><input name="tel" type="text" size="30"  value="<?php echo $this->_tpl_vars['setting']['tel']; ?>
" /></td>
</tr>
<tr>
<th>传真：</th>
<td><input name="fax" type="text" size="30"  value="<?php echo $this->_tpl_vars['setting']['fax']; ?>
" /></td>
</tr>
<tr>
<th>邮箱：</th>
<td><input name="email" type="text" size="30"  value="<?php echo $this->_tpl_vars['setting']['email']; ?>
" /></td>
</tr>
<?php endif; ?>
<tr>
<th></th>
<td><div class="buttons">
<input type="submit" value="修改设置" class="submit">
<input type="reset" value="重置">
<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
</div></td>
</tr>
</table>
</div>
</body>
</html>