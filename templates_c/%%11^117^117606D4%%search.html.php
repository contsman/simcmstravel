<?php /* Smarty version 2.6.18, created on 2016-08-03 14:44:22
         compiled from default/default/search.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $this->_tpl_vars['setting']['keywords']; ?>
-<?php echo $this->_tpl_vars['setting']['sitename']; ?>
</title>
		<meta content="<?php echo $this->_tpl_vars['setting']['keywords']; ?>
" name="keywords" />
		<meta content="<?php echo $this->_tpl_vars['setting']['description']; ?>
" name="description" />
		<link href="<?php echo $this->_tpl_vars['weburl']; ?>
/templates/default/<?php echo $this->_tpl_vars['setting']['templates']; ?>
/css/page_search.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery.lazyload-1.9.3.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery.cookie.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery.timers.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/productCompare.js"></script>
		<script language="JavaScript">
			$(function() {
				$(".datemore").toggle(
					function () {
						 $(this).parent().next().show();
					},
					function () {
						 $(this).parent().next().hide();
					}
				);
				$(".arrival_cid").click(function(){
					$.get("<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=ajax&ajax=1", { 
						catid :  $(this).attr("value") 
					}, function (data, textStatus){
						$("#arrival_city").show(); 
						$("#arrival_city").html(data); // 把返回的数据添加到页面上
					});
				});
				$("img.lazy").lazyload({
					effect : "fadeIn",
					threshold : 0,
					placeholder : "<?php echo $this->_tpl_vars['weburl']; ?>
/static/pic/loading_def.jpg"

				});
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
<div class="nav">
	<ul class="clearfix">
		<li><a href="<?php echo $this->_tpl_vars['weburl']; ?>
">首页</a></li>
		<li class="li01">>></li>
		<li>搜索结果</li>
	</ul>
</div>
<div class="main clearfix">
	<div class="main_left">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/block_promise.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/block_hotline.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/block_news.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<div class="main_right">
		<div class="searchbox">
			<h3 class="clearfix">
				<span class="title fl pr10">当前搜索条件</span>
				<?php if ($_COOKIE['catid'] == 58): ?><span><a href="index.php?mod=search&ac=search&catid=0" class="notice"><span>类型</span>国内游</a></span><?php endif; ?>
				<?php if ($_COOKIE['catid'] == 55): ?><span><a href="index.php?mod=search&ac=search&catid=0" class="notice"><span>类型</span>出境游
				</a></span><?php endif; ?>
				<?php if ($_COOKIE['departure_city'] <> ''): ?><span><a href="index.php?mod=search&ac=search&departure_city=" class="notice"><span>出发地</span><?php echo $_COOKIE['departure_city']; ?>
</a></span><?php endif; ?>
				<?php if ($_COOKIE['arrival_city'] <> ''): ?><span><a href="index.php?mod=search&ac=search&arrival_city=" class="notice"><span>目的地</span><?php echo $_COOKIE['arrival_city']; ?>
</a></span><?php endif; ?>
				<?php if ($_COOKIE['keywords'] <> ''): ?><span><a href="index.php?mod=search&ac=search&keywords=" class="notice"><span>关键词</span><?php echo $_COOKIE['keywords']; ?>
</a></span><?php endif; ?>
				<?php if ($_COOKIE['endprice'] <> 0): ?><span><a href="index.php?mod=search&ac=search&startprice=0&endprice=0" class="notice"><span>价格</span><?php echo $_COOKIE['startprice']; ?>
-<?php echo $_COOKIE['endprice']; ?>
元</a></span><?php endif; ?>
				<?php if ($_COOKIE['startday'] <> 0 || $_COOKIE['endday'] <> 0): ?><span><a href="index.php?mod=search&ac=search&startday=0&endday=0" class="notice"><span>天数</span><?php echo $_COOKIE['startday']; ?>
-<?php echo $_COOKIE['endday']; ?>
天</a></span><?php endif; ?>
				<span><a href="index.php?mod=search&ac=search&s_type=1" class="fl pl10 orange01">清空</a></span>
			</h3>
			<div class="box">
				<ul class="conditionlist">
					<li class="clearfix">
						<span>类&nbsp;&nbsp;&nbsp;型：</span> 
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&catid=0" <?php if ($_COOKIE['catid'] == 0): ?>class="here"<?php endif; ?>>不限</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&catid=58"  <?php if ($_COOKIE['catid'] == 58): ?>class="here"<?php endif; ?>>国内游</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&catid=55"  <?php if ($_COOKIE['catid'] == 55): ?>class="here"<?php endif; ?>>出境游</a>
					</li>
					<li class="clearfix">
						<span>天&nbsp;&nbsp;&nbsp;数：</span>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startday=0&endday=0"  <?php if ($_COOKIE['startday'] == 0 && $_COOKIE['endday'] == 0): ?>class="here"<?php endif; ?>>不限</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startday=0&endday=5" <?php if ($_COOKIE['startday'] == 0 && $_COOKIE['endday'] == 5): ?>class="here"<?php endif; ?>>5天以内</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startday=6&endday=8" <?php if ($_COOKIE['startday'] == 6 && $_COOKIE['endday'] == 8): ?>class="here"<?php endif; ?>>6-8天</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startday=9&endday=10" <?php if ($_COOKIE['startday'] == 9 && $_COOKIE['endday'] == 10): ?>class="here"<?php endif; ?>>9-10天</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startday=10&endday=100" <?php if ($_COOKIE['startday'] == 10 && $_COOKIE['endday'] == 100): ?>class="here"<?php endif; ?>>10天以上</a>
					</li>
					<li class="clearfix">
						<span>价&nbsp;&nbsp;&nbsp;格：</span> 
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=0&endprice=0" <?php if ($_COOKIE['startprice'] == 0 && $_COOKIE['endprice'] == 0): ?>class="here"<?php endif; ?>>不限</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=0&endprice=2000" <?php if ($_COOKIE['startprice'] == 0 && $_COOKIE['endprice'] == 2000): ?>class="here"<?php endif; ?>>2000以内</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=2001&endprice=5000" <?php if ($_COOKIE['startprice'] == 2001 && $_COOKIE['endprice'] == 5000): ?>class="here"<?php endif; ?>>2001-5000</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=5001&endprice=9999" <?php if ($_COOKIE['startprice'] == 5001 && $_COOKIE['endprice'] == 9999): ?>class="here"<?php endif; ?>>5001-9999</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=10000&endprice=20000" <?php if ($_COOKIE['startprice'] == 10000 && $_COOKIE['endprice'] == 20000): ?>class="here"<?php endif; ?>>10000-20000</a>
						<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&startprice=20000&endprice=1000000" <?php if ($_COOKIE['startprice'] == 20000 && $_COOKIE['endprice'] == 1000000): ?>class="here"<?php endif; ?>>20000以上</a>
					</li>
					<li class="clearfix"><span>目的地：</span> <a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&departure_city=" <?php if ($_COOKIE['arrival_city'] == ''): ?>class="here"<?php endif; ?>>不限</a> 
					<?php if ($_COOKIE['catid'] == 2): ?>
						<?php $_from = $this->_tpl_vars['common_cache']['arrival_foreign']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['foreign_arrival']):
?><span class="arrival_cid aspan" value="<?php echo $this->_tpl_vars['foreign_arrival']['catid']; ?>
"><?php echo $this->_tpl_vars['foreign_arrival']['catname']; ?>
</span>
						<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
						<?php $_from = $this->_tpl_vars['common_cache']['arrival_china']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['china_arrival']):
?><span class="arrival_cid aspan" value="<?php echo $this->_tpl_vars['china_arrival']['catid']; ?>
"><?php echo $this->_tpl_vars['china_arrival']['catname']; ?>
</span>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					</li>
				</ul>
				<div class="hide" id="arrival_city"></div>
			</div>
		</div>
		<div class="search clearfix mt10">
			<div class="order">
				<ul class="clearfix">
					<li class="clearfix"><span>排序方式：</span><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&order=<?php if ($_COOKIE['order'] == 1): ?>2<?php elseif ($_COOKIE['order'] == 2): ?>1<?php else: ?>2<?php endif; ?>" <?php if ($_COOKIE['order'] == 1): ?>class="orderbox02"<?php elseif ($_COOKIE['order'] == 2): ?>class="orderbox01"<?php else: ?>class="orderbox03"<?php endif; ?>>时间</a> <a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&order=<?php if ($_COOKIE['order'] == 3): ?>4<?php elseif ($_COOKIE['order'] == 4): ?>3<?php else: ?>3<?php endif; ?>" <?php if ($_COOKIE['order'] == 3): ?>class="orderbox01"<?php elseif ($_COOKIE['order'] == 4): ?>class="orderbox02"<?php else: ?>class="orderbox03"<?php endif; ?>>价格</a></li>
					<li>
						<select name="order"  onchange='if(this.options[this.selectedIndex].value!="") location.href=this.options[this.selectedIndex].value;'>
							<option value="0" selected>选择排列显示方式</option>
							<option value="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&order=1" <?php if ($_COOKIE['order'] == 1): ?>selected<?php endif; ?>>按发布时间倒序</option>
							<option value="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&order=2" <?php if ($_COOKIE['order'] == 2): ?>selected<?php endif; ?>>按发布时间正序</option>
							<option value="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&order=4" <?php if ($_COOKIE['order'] == 4): ?>selected<?php endif; ?>>按价格倒序</option>
							<option value="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&order=3" <?php if ($_COOKIE['order'] == 3): ?>selected<?php endif; ?>>按价格正序</option>
						</select>
					</li>
				</ul>
			</div>
			<div class="searchlist">
				<div class="box">
					<?php $_from = $this->_tpl_vars['line_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['linelist']):
?>
					<dl class="pwlist clearfix">
						<div class="linebutbox">
							<p><a href="<?php echo $this->_tpl_vars['linelist']['p_url']; ?>
" target="_blank" class="but01">查看详情</a></p>
							<p class="mt5"><a link="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=compare" name="<?php echo $this->_tpl_vars['linelist']['p_short_title']; ?>
" value="<?php echo $this->_tpl_vars['linelist']['p_id']; ?>
" id="<?php echo $this->_tpl_vars['linelist']['p_id']; ?>
" class="addCompare but02">加入对比</a></p>
						</div>
						<dt><span class="price">￥<?php echo $this->_tpl_vars['linelist']['p_price']; ?>
元起</span><a href="<?php echo $this->_tpl_vars['linelist']['p_url']; ?>
" target="_blank" class="title"><?php echo $this->_tpl_vars['linelist']['p_title']; ?>
</a> <a href="<?php echo $this->_tpl_vars['linelist']['p_url']; ?>
" target="_blank" class="title2"><?php echo $this->_tpl_vars['linelist']['p_short_title2']; ?>
</a></dt>
						<dd class="img"><a href="<?php echo $this->_tpl_vars['linelist']['p_url']; ?>
" target="_blank"><?php if ($this->_tpl_vars['linelist']['p_pics'] <> ""): ?><img class="lazy" data-original="<?php echo $this->_tpl_vars['linelist']['smallpic']; ?>
" /><?php else: ?><img src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/pic/snopic.jpg" /><?php endif; ?></a></dd>
						<dd class="info">
							<p>特色：<?php echo $this->_tpl_vars['linelist']['p_detail']; ?>
</p>
							<p><span class="orange01">编号：<?php echo $this->_tpl_vars['linelist']['p_no']; ?>
</span> &nbsp;&nbsp;&nbsp;出发城市：<?php echo $this->_tpl_vars['linelist']['city']; ?>
&nbsp;&nbsp;&nbsp;天数：<?php echo $this->_tpl_vars['linelist']['p_travel_days']; ?>
天</p>
							<p>出发日期：<?php $_from = $this->_tpl_vars['linelist']['datelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['datelist']):
?> <?php if ($this->_tpl_vars['skey'] < 3): ?><?php echo $this->_tpl_vars['datelist']['departure_time']; ?>
&nbsp;&nbsp;<?php endif; ?><?php endforeach; endif; unset($_from); ?> <span class="datemore">团期</span></p>
							<p class="hide"><?php $_from = $this->_tpl_vars['linelist']['datelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['datelist02']):
?> <?php if ($this->_tpl_vars['skey'] >= 3): ?><?php echo $this->_tpl_vars['datelist02']['departure_time']; ?>
&nbsp;&nbsp;<?php endif; ?><?php endforeach; endif; unset($_from); ?></p>
						</dd>
					</dl>
					<?php endforeach; endif; unset($_from); ?>
				</div>
				<div class="pagelist"><?php echo $this->_tpl_vars['button_basic']; ?>
<?php echo $this->_tpl_vars['button_select']; ?>
</div>
			</div>
		</div>
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