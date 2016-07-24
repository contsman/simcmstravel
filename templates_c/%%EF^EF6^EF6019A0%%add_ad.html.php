<?php /* Smarty version 2.6.18, created on 2014-01-28 14:18:05
         compiled from admin/add_ad.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="static/js/calendar/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="static/js/calendar/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="static/js/calendar/win2k.css"/>
<script type="text/javascript" src="static/js/calendar/calendar.js"></script>
<script type="text/javascript" src="static/js/calendar/lang/en.js"></script>
<script type="text/javascript">
	$(function() {
		$('#adtype').change(function(){
			if($("#adtype").val()==1){
				$('#pic').show();
			}
			else{
				$('#pic').hide();
			}
		});
	});
</script>
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
?mod=ad&ac=list">广告管理</a></li>
			<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=ad&ac=add">添加广告</a></li>
		</ul>
	</div>
</div>
<form name="form1" id="channelform" method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=ad">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>广告名称：</th>
<td>
	<select name="adtype" id="adtype">
		<?php echo $this->_tpl_vars['selectadtype']; ?>

	</select>
</td>
</tr>
<tr>
<th>广告名称：</th>
<td><input name="name" type="text"  size="30" value="<?php echo $this->_tpl_vars['ad']['name']; ?>
" /></td>
</tr>
<tr>
<tr>
<th>链接地址：</th>
<td><input name="url" type="text"  size="30" value="<?php echo $this->_tpl_vars['ad']['url']; ?>
" /></td>
</tr>
<tr>
<th>链接说明：</th>
<td><input name="url_note" type="text" size="30" value="<?php echo $this->_tpl_vars['ad']['url_note']; ?>
" /></td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable" id="pic" <?php if ($this->_tpl_vars['ad']['adtype'] == 1): ?><?php else: ?>style="display:none;"<?php endif; ?>>
<?php if ($this->_tpl_vars['ad']['pic'] <> ''): ?>
<tr>
<th>原图：</th>
<td><img src="<?php echo $this->_tpl_vars['weburl']; ?>
/upload/common/<?php echo $this->_tpl_vars['ad']['pic']; ?>
" width="100" height="60"/>
</td>
</tr>
<?php endif; ?>
<tr>
<th>图例：</th>
<td><input type="file" name="upload"/> 
</td>
</tr>
<tr>
<th>尺寸：</th>
<td>宽 <input type="text" name="picwidth" size="5" value="<?php echo $this->_tpl_vars['ad']['picwidth']; ?>
"> px * 高 <input type="text" name="picheight" size="5" value="<?php echo $this->_tpl_vars['ad']['picheight']; ?>
"> px
</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>开始时间：</th>
<td><input id="start_time" class="date input-text" type="text" readonly="" size="20" value="<?php echo $this->_tpl_vars['ad']['starttime']; ?>
" name="starttime" style="padding-right:18px;">
	<script type="text/javascript">
		Calendar.setup({
			weekNumbers: false,
			inputField : "start_time",
			trigger    : "start_time",
			dateFormat: "%Y-%m-%d %H:%M:%S",
			showTime: false,
			minuteStep: 1,
			onSelect   : function() {this.hide();}
		});
	</script>
</td>
</tr>
<tr>
<th>结束时间：</th>
<td><input type="text" name="endtime" id="end_time" value="<?php echo $this->_tpl_vars['ad']['endtime']; ?>
" size="20" class="date" readonly='' style="padding-right:18px;">
	<script type="text/javascript">
		Calendar.setup({
		weekNumbers: false,
		inputField : "end_time",
		trigger    : "end_time",
		dateFormat: "%Y-%m-%d %H:%M:%S",
		showTime: false,
		minuteStep: 1,
		onSelect   : function() {this.hide();}
		});
	</script>
</td>
</tr>
<tr>
<th>状态：</th>
<td> <input type="checkbox" name="isshow" value="1" <?php if ($this->_tpl_vars['ad']['isshow'] == 1 || $this->_tpl_vars['ac'] == 'add'): ?>checked<?php endif; ?>> 启用 
</td>
</tr>
<tr>
<th></th>
<td>
	<div class="buttons">
	<input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
	<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['ad']['id']; ?>
">
	<input type="reset" name="thevaluereset" value="重置">
	</div>
</td>
</tr>
</table>
</div>
</form>
 </body>
</html>