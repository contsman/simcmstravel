<?php /* Smarty version 2.6.18, created on 2016-07-25 13:18:11
         compiled from admin/channel_html.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="static/js/common.js"></script>
<script type="text/javascript" src="static/js/ajax.js"></script>
<link rel="stylesheet" type="text/css" href="static/js/calendar/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="static/js/calendar/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="static/js/calendar/win2k.css"/>
<script type="text/javascript" src="static/js/calendar/calendar.js"></script>
<script type="text/javascript" src="static/js/calendar/lang/en.js"></script>
<script type="text/javascript">
function submithtml(action)
{
    document.form.action = action;
    document.form.submit();
}
</script>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload() 
">刷新</a></span></div>
<div class="colorarea01">
	<form name="form" method="post" action="<?php echo $this->_tpl_vars['adminpage']; ?>
" target="report_iframe2">
		<table cellspacing="0" cellpadding="0" width="100%"  class="listtable">
			<tr>
				<th align="center" width="200">选择分类：</th>
				<th></th>
			</tr>
			<tr>
				<td align="center">
					<select style="height:200px;" multiple="multiple" id="catids" name="catids[]">
						<option value='1'>出境旅游</option>
						<option value='2'>国内旅游</option>
						<option value='3'>国际游轮</option>
						<option value='5'>学生专题</option>
						<option value='6'>全球签证</option>
					<select>
				</td>
				<td valign="top">
					<div class="">
						<p>
						<input type="button" class="button" value="开始更新" onclick="submithtml('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=create_html&ac=channel&op=1');"/>
						</p>
					</div>
				</td>
			</tr>
		</table>
	</form>
	<table cellspacing="0" cellpadding="0" width="100%"  class="listtable" style="border-top:none;">
		<tr>
			<th> 进行状态： </th>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['loading']; ?>

				<iframe id="report_iframe2" frameborder="0" name="report_iframe2" src="" scrolling="no" width="100%" height="500" ></iframe></td>
		</tr>
	</table>
</div>
</body>
</html>