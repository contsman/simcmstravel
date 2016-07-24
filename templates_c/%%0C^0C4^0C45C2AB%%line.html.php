<?php /* Smarty version 2.6.18, created on 2014-02-04 21:30:31
         compiled from default/default/line.html */ ?>
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
/css/page_line.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/templates/default/<?php echo $this->_tpl_vars['setting']['templates']; ?>
/js/jcarousellite_1.0.1.min.js"></script>
		<script language="JavaScript">
			$(function() {
				$(".linepic").jCarouselLite({
					btnNext: ".premenu",
					btnPrev: ".nextmenu",
					scroll: 1,
					visible: 1,
					auto: 5000
				});
				//导航固定
				var ie6 = /msie 6/i.test(navigator.userAgent),dv = $('#fixedMenu'),st;
				dv.attr('otop', dv.offset().top); //存储原来的距离顶部的距离
				$(window).scroll(function(){
					st = Math.max(document.body.scrollTop || document.documentElement.scrollTop);
					if (st >= parseInt(dv.attr('otop'))) {
						if (ie6) {//IE6不支持fixed属性，所以只能靠设置position为absolute和top实现此效果
							dv.css({ position: 'absolute', top: st });
						}
						else if (dv.css('position') != 'fixed') dv.css({ 'position': 'fixed', top: 0 });
					} 
					else if (dv.css('position') != 'static') dv.css({ 'position': 'static' });
				});
				var $div_li = $("div.detail ul li");
				$div_li.click(function() {
				   $(this).addClass("here").siblings().removeClass("here"); //去掉其它同辈<li>元素的高亮
				   var index = $div_li.index(this); // 获取当前点击的<li>元素 在 全部li元素中的索引。
				   $("div.tab_box > div").eq(index).show().siblings().hide(); //隐藏其它几个同辈的<div>元素
				});

				//旅游顾问
				var $consultant_li = $("ul.adviserlist li");
				$consultant_li.hover(function() {
				   $(this).addClass("here").siblings().removeClass("here"); //去掉其它同辈<li>元素的高亮
				   var index = $consultant_li.index(this); // 获取当前点击的<li>元素 在 全部li元素中的索引。
				   $("div.adviserbox > div").eq(index).show().siblings().hide(); //隐藏其它几个同辈的<div>元素
				});
				
				$(".but01").hover(function(){
					$(".help01").show();
				},function () {
					$(".help01").hide();
				});

				$(".but02").hover(function(){
					$(".help02").show();
				},function () {
					$(".help02").hide();
				});
			})
			function doPrint() { 
				bdhtml=window.document.body.innerHTML; 
				sprnstr="<!--startprint-->"; 
				eprnstr="<!--endprint-->"; 
				prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
				prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
				window.document.body.innerHTML=prnhtml; 
				window.print(); 
			}
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
		<li><?php echo $this->_tpl_vars['line']['p_title']; ?>
</li>
	</ul>
</div>
<div class="linetitle"><span class="lineno">线路编码：<?php echo $this->_tpl_vars['line']['p_no']; ?>
</span><?php echo $this->_tpl_vars['line']['p_title']; ?>
</div>
<div class="linebox clearfix">
	<div class="linebox_left">
		<div class="linepicbox">
			<div class="premenu"> <a href="#"> </a> </div>
			<div class="nextmenu"> <a href="#"> </a> </div>
			<div class="linepic">
				<ul>
					<?php $_from = $this->_tpl_vars['piclist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pic']):
?>
					<li><?php if ($this->_tpl_vars['pic'] <> ''): ?><img src="<?php echo $this->_tpl_vars['weburl']; ?>
/<?php echo $this->_tpl_vars['pic']; ?>
"/><?php else: ?><img src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/pic/nopic.jpg" /><?php endif; ?></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
		</div>
		<div class="mt10">
			<iframe id="report_iframe" frameborder="0" scrolling="no" name="report_iframe" height="490" src="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=calendar&id=<?php echo $this->_tpl_vars['line']['p_id']; ?>
" width="100%"></iframe>
		</div>
	</div>
	<div class="linebox_right">
		<div class="helpbox help01 hide"><?php echo $this->_tpl_vars['helplist']['84']['p_info']; ?>
</div>
		<div class="helpbox help02 hide"><?php echo $this->_tpl_vars['helplist']['85']['p_info']; ?>
</div>
		<p class="price01">市场价：<span class="fb f16 pr10"><?php echo $this->_tpl_vars['line']['p_market_price']; ?>
元</span><span class="but01">起价说明</span></p>
		<p class="price02">优惠价：<span class="orange01 fb f16 pr10"><?php echo $this->_tpl_vars['line']['p_price']; ?>
元起</span><span class="but02">网订优惠</span></p>
		<div class="detail01 mt10">
			<ul class="clearfix">
				<li class="li01">推荐指数：<span class="orange01"><?php echo $this->_tpl_vars['line']['p_hot']; ?>
</span></li>
				<li>出发城市：<?php echo $this->_tpl_vars['line']['city']; ?>
</li>
				<li>行程天数：<?php echo $this->_tpl_vars['line']['p_travel_days']; ?>
天</li>
				<li class="li01">往返交通：<?php echo $this->_tpl_vars['line']['p_transport']; ?>
</li>
				<li class="li01">住宿标准：<?php echo $this->_tpl_vars['line']['p_stay']; ?>
</li>
			</ul>
		</div>
		<form method="get" action="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=order">
		<div class="detail02 mt10">
			<p>
				<span>出发日期：</span>
				<span>
					<select name="departure_date">
						<?php $_from = $this->_tpl_vars['datelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['date_list']):
?>
						<option value="<?php echo $this->_tpl_vars['date_list']['id']; ?>
"><?php echo $this->_tpl_vars['date_list']['departure_date']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['date_list']['week']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['date_list']['price']; ?>
元</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</span>
			</p>
			<p>
				<span>出游人数：</span>
				<span>成人</span>
				<span>
					<select name="adult_nums">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				</span>
				<span>儿童</span>
				<span>
					<select name="children_nums">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				</span>
			</p>
			<p><span class="orange01">出发日期不对价格会有差异，请仔细阅读</span> <a href="<?php echo $this->_tpl_vars['weburl']; ?>
/help/83.html" target="_blank">计算出游总价</a></p>
		</div>
		<div class="mt10">
			<input type="submit" value="" class="orderbut">
			<input type="hidden" name="mod" value="order">
			<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['line']['p_id']; ?>
">
		</div>
		</form>
		<div class="adviser mt10">
			<h3>资深旅游顾问</h3>
			<div class="box">
				<ul class="adviserlist clearfix">
					<?php $_from = $this->_tpl_vars['consultantlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['consultantpic']):
?>
					<li><img src="<?php echo $this->_tpl_vars['weburl']; ?>
/upload/common/<?php echo $this->_tpl_vars['consultantpic']['pic']; ?>
"></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
			<div class="tel adviserbox">
				<?php $_from = $this->_tpl_vars['consultantlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['consultant_list']):
?>
					<div <?php if ($this->_tpl_vars['skey'] <> 0): ?>class="hide"<?php endif; ?>>
					<p><?php echo $this->_tpl_vars['consultant_list']['name']; ?>
(<?php echo $this->_tpl_vars['consultant_list']['zhicheng']; ?>
)</p>
					<p>业务范围：<?php echo $this->_tpl_vars['consultant_list']['scope']; ?>
</p>
					</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="featurebox mt10">
	<h3>行程特色</h3>
	<div class="box">
		<?php echo $this->_tpl_vars['line']['p_characteristic']; ?>

	</div>
</div>
<div class="detail mt10">
	<div id="fixedMenu">
		<h3>
		<ul class="detail_title_tab clearfix">
			<li class="here">详细行程</li>
			<li>费用说明</li>
			<li>签证须知</li>
			<li>温馨提示</li>
			<li>如何预定</li>
			<li>付款方式</li>
			<li>相关线路</li>
		</ul>
		<div class="printmenu" onclick="doPrint();"></div>
		</h3>
	</div>
	<div class="tab_box">
		<div class="detailbox">
			<!--startprint-->
			<div class="p10">
				<!--详细行程-->
				<div>
					<ul class="daylist">
						<?php $_from = $this->_tpl_vars['triplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['trip']):
?>
							<li><a href="#day<?php echo $this->_tpl_vars['key']+1; ?>
">第<?php echo $this->_tpl_vars['key']+1; ?>
天</a></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
					<div class="tripbox">
						<?php $_from = $this->_tpl_vars['triplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['trip_list']):
?>
						<div class="commonday mt20" id="day<?php echo $this->_tpl_vars['key']+1; ?>
">
							<div class="title">
								<span class="f14 white">第<?php echo $this->_tpl_vars['key']+1; ?>
天</span>
								<span class="pl20"><?php echo $this->_tpl_vars['trip_list']['title']; ?>
</span>
							</div>
							<div class="box">
								<?php echo $this->_tpl_vars['trip_list']['info']; ?>

							</div>
							<?php if ($this->_tpl_vars['trip_list']['scenictitle'] <> ''): ?>
							<div class="todaytrip mt20">
								今日游览景点：<?php echo $this->_tpl_vars['trip_list']['scenictitle']; ?>

							</div>
							<?php endif; ?>
							<div class="box">
							<?php $_from = $this->_tpl_vars['trip_list']['viewpoint']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['viewpointlist']):
?>
								<div class="viewpoint mt10">
									<div class="viewpointtitle"><?php echo $this->_tpl_vars['viewpointlist']['title']; ?>
</div>
									<div class="clearfix mt10">
										<?php if ($this->_tpl_vars['viewpointlist']['pic01'] <> ''): ?><div class="fl viewpointpic"><img src="<?php echo $this->_tpl_vars['weburl']; ?>
/<?php echo $this->_tpl_vars['viewpointlist']['pic01']; ?>
" width="435"><p><?php echo $this->_tpl_vars['viewpointlist']['info01']; ?>
</p></div><?php endif; ?>
										<?php if ($this->_tpl_vars['viewpointlist']['pic02'] <> ''): ?><div class="fl pl10 viewpointpic"><img src="<?php echo $this->_tpl_vars['weburl']; ?>
/<?php echo $this->_tpl_vars['viewpointlist']['pic02']; ?>
" width="435"><p><?php echo $this->_tpl_vars['viewpointlist']['info02']; ?>
</p></div><?php endif; ?>
									</div>
								</div>
							<?php endforeach; endif; unset($_from); ?>
							</div>
							<!-- <div class="box">
								<?php echo $this->_tpl_vars['trip_list']['scenicinfo']; ?>

							</div> -->
						</div>
						<?php endforeach; endif; unset($_from); ?>
					</div>
				</div>
				<!--详细行程-->
			</div>
			<!--endprint-->
		</div>
		<!--费用说明-->
		<div class="feesbox mt10">
			<h3>费用说明</h3>
			<div class="box">
				<?php echo $this->_tpl_vars['line']['p_fees']; ?>

			</div>
		</div>
		<!--费用说明-->
		<!--签证须知-->
		<div class="feesbox mt10">
			<h3>签证须知</h3>
			<div class="box">
				<?php echo $this->_tpl_vars['line']['p_visa']; ?>

			</div>
		</div>
		<!--签证须知-->
		<!--温馨提示-->
		<div class="feesbox mt10">
			<h3>温馨提示</h3>
			<div class="box">
				<?php echo $this->_tpl_vars['line']['p_tips']; ?>

			</div>
		</div>
		<!--温馨提示-->
		<!--如何预定-->
		<div class="feesbox mt10">
			<h3>如何预定</h3>
			<div class="box">
				<?php echo $this->_tpl_vars['helplist']['86']['p_info']; ?>

			</div>
		</div>
		<!--如何预定-->
		<!--付款方式-->
		<div class="feesbox mt10">
			<h3>付款方式</h3>
			<div class="box">
				<?php echo $this->_tpl_vars['helplist']['87']['p_info']; ?>

			</div>
		</div>
		<!--付款方式-->
		<div class="correlativeline mt10">
			<h3><span class="title">相关线路</span></h3>
			<div class="box">
				<ul class="aboutlinelist clearfix">
				<?php $_from = $this->_tpl_vars['aboutlinelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aboutlist']):
?>
					<li><span class="price">￥<?php echo $this->_tpl_vars['aboutlist']['p_price']; ?>
元</span><a href="<?php echo $this->_tpl_vars['aboutlist']['p_url']; ?>
" target="_blank" class="title1"><?php echo $this->_tpl_vars['aboutlist']['p_short_title']; ?>
</a><a href="<?php echo $this->_tpl_vars['aboutlist']['p_url']; ?>
" target="_blank" class="title2"><?php echo $this->_tpl_vars['aboutlist']['p_short_title2']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
				</ul>
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