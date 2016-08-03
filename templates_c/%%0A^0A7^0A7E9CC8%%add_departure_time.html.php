<?php /* Smarty version 2.6.18, created on 2014-02-04 19:58:25
         compiled from admin/add_departure_time.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="admin/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="static/js/jquery-1.4.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="static/js/calendar/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="static/js/calendar/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="static/js/calendar/win2k.css"/>
<script type="text/javascript" src="static/js/calendar/calendar.js"></script>
<script type="text/javascript" src="static/js/calendar/lang/en.js"></script>
</head>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
<form name="form1" id="channelform" method="post" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=departure_time">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>日期选择：</th>
<td><input id="departure_time" class="date input-text" type="text" readonly="" size="10" value="<?php echo $this->_tpl_vars['departure_time']['departure_time']; ?>
" name="departure_time">
	<script type="text/javascript">
		Calendar.setup({
			weekNumbers: false,
			inputField : "departure_time",
			trigger    : "departure_time",
			dateFormat: "%Y-%m-%d",
			showTime: false,
			minuteStep: 1,
			onSelect   : function() {this.hide();}
		});
	</script>
</td>
</tr>
<tr>
<th>成人价格：</th>
<td><input name="price" type="text"  size="10" value="<?php echo $this->_tpl_vars['departure_time']['price']; ?>
" /> 元</td>
</tr>
<tr>
<th>儿童价格：</th>
<td><input name="child_price" type="text"  size="10" value="<?php echo $this->_tpl_vars['departure_time']['child_price']; ?>
" /> 元</td>
</tr>
<tr>
<th></th>
<td>
	<div class="buttons">
	<input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
	<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['departure_time']['id']; ?>
">
	<input type="hidden" name="pid" value="<?php if ($this->_tpl_vars['departure_time']['pid'] == ''): ?><?php echo $this->_tpl_vars['pid']; ?>
<?php else: ?><?php echo $this->_tpl_vars['departure_time']['pid']; ?>
<?php endif; ?>">
	<input type="reset" name="thevaluereset" value="重置">
	</div>
</td>
</tr>
</table>
</div>
</form>
 </body>
</html>