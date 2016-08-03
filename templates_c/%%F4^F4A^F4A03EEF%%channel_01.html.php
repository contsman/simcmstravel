<?php /* Smarty version 2.6.18, created on 2016-08-03 14:42:00
         compiled from default/default/channel_01.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $this->_tpl_vars['catname']; ?>
-<?php echo $this->_tpl_vars['setting']['title']; ?>
 - <?php echo $this->_tpl_vars['setting']['sitename']; ?>
</title>
		<meta content="<?php echo $this->_tpl_vars['setting']['keywords']; ?>
" name="keywords" />
		<meta content="<?php echo $this->_tpl_vars['setting']['description']; ?>
" name="description" />
		<link href="<?php echo $this->_tpl_vars['weburl']; ?>
/templates/default/<?php echo $this->_tpl_vars['setting']['templates']; ?>
/css/page_channel.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery-1.4.2.min.js"></script>
		<script language="JavaScript">
			$(function(){
				$("td.datatd").toggle(
					function () {
						 $(this).parent().next().show();
					},
					function () {
						 $(this).parent().next().hide();
					}
				);

			})
		</script>
		</head>
	<body>
<!--内容--> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- <div class="nav">
	<ul class="clearfix">
		<li><a href="<?php echo $this->_tpl_vars['weburl']; ?>
">首页</a></li>
		<li class="li01">>></li>
		<li><?php echo $this->_tpl_vars['catname']; ?>
</li>
	</ul>
</div> -->
<div class="main clearfix mt10">
	<div class="main_left2">
		<div class="guidebox">
			<h3><?php echo $this->_tpl_vars['catname']; ?>
</h3>
			<div class="box">
				<ul class="guidelist">
					<li>
						<h4>类型</h4>
						<div>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&catid=58">国内游</a>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&catid=55">出境游</a>
						</div>
					</li>
					<li>
						<h4>天数</h4>
						<div>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startday=0&endday=5&catid=<?php echo $this->_tpl_vars['search_catid']; ?>
">5天以内</a>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startday=6&endday=8&catid=<?php echo $this->_tpl_vars['search_catid']; ?>
">6-8天</a>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startday=9&endday=10&catid=<?php echo $this->_tpl_vars['search_catid']; ?>
">9-10天</a>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startday=10&endday=100&catid=<?php echo $this->_tpl_vars['search_catid']; ?>
">10天以上</a>
						</div>
					</li>
					<li>
						<h4>价格</h4>
						<div>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=0&endprice=2000&catid=<?php echo $this->_tpl_vars['search_catid']; ?>
">2000以内</a>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=2001&endprice=5000&catid=<?php echo $this->_tpl_vars['search_catid']; ?>
">2001-5000</a>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=5001&endprice=9999&catid=<?php echo $this->_tpl_vars['search_catid']; ?>
">5001-9999</a>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=10000&endprice=20000&catid=<?php echo $this->_tpl_vars['search_catid']; ?>
">10000-20000</a>
							<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=20000&endprice=1000000&catid=<?php echo $this->_tpl_vars['search_catid']; ?>
">20000以上</a>
						</div>
					</li>
					<li>
						<h4>目的地</h4>
						<div>
							<?php $_from = $this->_tpl_vars['sort_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sortlist']):
?><a href="#"><?php echo $this->_tpl_vars['sortlist']['catname']; ?>
</a>&nbsp;&nbsp;<?php endforeach; endif; unset($_from); ?>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/block_news.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<div class="main_right2">
		<div class="hotbox">
			<h3>当季热卖</h3>
			<div class="box clearfix">
				<?php $_from = $this->_tpl_vars['hotlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hot_list']):
?>
				<dl class="hotline">
					<dt><a href="<?php echo $this->_tpl_vars['hot_list']['p_url']; ?>
"><?php echo $this->_tpl_vars['hot_list']['p_title']; ?>
</a></dt>
					<dd class="img"><a href="<?php echo $this->_tpl_vars['hot_list']['p_url']; ?>
"><?php if ($this->_tpl_vars['hot_list']['smallpic'] <> ''): ?><img src="<?php echo $this->_tpl_vars['hot_list']['smallpic']; ?>
"><?php else: ?><img src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/pic/snopic.jpg" /><?php endif; ?></a></dd>
					<dd>
						<p><?php echo $this->_tpl_vars['hot_list']['p_detail']; ?>
</p>
						<p class="orange01 fb f16 mt5">￥<?php echo $this->_tpl_vars['hot_list']['p_price']; ?>
起</p>
					</dd>
					
				</dl>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
		<?php $_from = $this->_tpl_vars['sort_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sortlist']):
?>
		<div class="commonbox4 mt10 clearfix mt10">
			<div class="leftbox">
				<h3><span class="more"><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&keywords=<?php echo $this->_tpl_vars['sortlist']['keywords']; ?>
&s_type=1" target="_blank">更多+</a></span><span class="title"><?php echo $this->_tpl_vars['sortlist']['catname']; ?>
</span></h3>
				<table class="linetable">
					<tr>
						<th width="100">编号</th>
						<th align="left">线路</th>
						<th width="60">天数</th>
						<th width="60">团期</th>
						<th>价格</th>
					</tr>
					<?php $_from = $this->_tpl_vars['sortlist']['linelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['linelist']):
?>
					<tr>
						<td align="center"><?php echo $this->_tpl_vars['linelist']['p_no']; ?>
</td>
						<td><a href="<?php echo $this->_tpl_vars['linelist']['p_url']; ?>
" class="title1" target="blank"><?php echo $this->_tpl_vars['linelist']['p_short_title']; ?>
</a> <a href="<?php echo $this->_tpl_vars['linelist']['p_url']; ?>
" class="title2" target="blank"><?php echo $this->_tpl_vars['linelist']['p_short_title2']; ?>
</a></td>
						<td align="center"><?php echo $this->_tpl_vars['linelist']['p_travel_days']; ?>
天</td>
						<td align="center" class="datatd"><span class="title1">团期</span></td>
						<td align="center" class="fb orange01">￥<?php echo $this->_tpl_vars['linelist']['p_price']; ?>
起</td>
					</tr>
					<tr class="hide">
						<td colspan="5" class="pl20"><?php $_from = $this->_tpl_vars['linelist']['datelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['date']):
?><span class="f12"><?php echo $this->_tpl_vars['date']['departure_time']; ?>
&nbsp;&nbsp;</span><?php endforeach; endif; unset($_from); ?></td>
					</tr>
					<?php endforeach; endif; unset($_from); ?>
				</table>
			</div>
		</div>
		<?php endforeach; endif; unset($_from); ?>
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/block_service.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/foot.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>