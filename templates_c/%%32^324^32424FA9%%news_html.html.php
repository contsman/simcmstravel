<?php /* Smarty version 2.6.18, created on 2014-01-24 11:56:58
         compiled from admin/news_html.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/lhgcalendar/lhgcalendar.min.js"></script>
<script type="text/javascript">
function submithtml(action)
{
    document.form.action = action;
    document.form.submit();
}
$(function() {
	//日期选择
	$('#start_time').calendar();
	$('#end_time').calendar();
})
</script>
</head>
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
				<td align="center"><?php echo $this->_tpl_vars['selectcategory']; ?>
</td>
				<td valign="top">
					<div class="htmlmenu">
						<p>更新所有信息
							<input type="button" class="button" value="开始更新" onclick="submithtml('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=create_html&ac=news&op=1');"/>
						</p>
						<p>更新最新发布的
							<input type="text" name="newsnum" size="5" value="20">
							条信息
							<input type="button" class="button" value="开始更新" onclick="submithtml('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=create_html&ac=news&op=2');"/>
						</p>
						<p>更新发布时间从
							<input id="start_time" class="date input-text" type="text" readonly="" size="10"  name="startdate" value="<?php echo $this->_tpl_vars['starttimevalue']; ?>
">
							 到
							<input type="text" name="enddate" id="end_time" size="10" class="date" readonly value="<?php echo $this->_tpl_vars['endtimevalue']; ?>
">
							&nbsp; 
							的信息
							<input type="button" class="button" value="开始更新" onclick="submithtml('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=create_html&ac=news&op=3');"/>
						</p>
						<p>更新ID从
							<input type="text" name="startid" size="5">
							到
							<input type="text" name="endid" size="5">
							的信息
							<input type="button" class="button" value="开始更新" onclick="submithtml('<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=create_html&ac=news&op=4');"/>
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