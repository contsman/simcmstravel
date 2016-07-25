<?php /* Smarty version 2.6.18, created on 2016-07-25 13:24:54
         compiled from default/default/index.html */ ?>
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
/css/page_index.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery.textRemindAuto-1.0.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/lhgcalendar/lhgcalendar.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/templates/default/<?php echo $this->_tpl_vars['setting']['templates']; ?>
/js/jcarousellite_1.0.1.min.js"></script>
		<script language="JavaScript">
			$(function() {
				$(".flashpic").jCarouselLite({
					btnNext: ".premenu",
					btnPrev: ".nextmenu",
					scroll: 1,
					visible: 1,
					auto: 5000
				});
				$('.leftmenubox').hover(function(){
					$(this).addClass("leftmenubox_hover");
					$(this).children("div").show();
				},function(){
					$(this).removeClass("leftmenubox_hover");
					$(this).children("div").hide();
				});

				//签证
				var $visa_li = $("ul.visa_tab li");
				$visa_li.hover(function() {
				   $(this).addClass("here").siblings().removeClass("here"); //去掉其它同辈<li>元素的高亮
				   var index = $visa_li.index(this); // 获取当前点击的<li>元素 在 全部li元素中的索引。
				   $("div.visabox > div").eq(index).show().siblings().hide(); //隐藏其它几个同辈的<div>元素
				});

				//搜索
				var $search_li = $("ul.indexsearch_tab li");
				$search_li.click(function() {
				   $(this).addClass("here").siblings().removeClass("here"); //去掉其它同辈<li>元素的高亮
				   var index = $search_li.index(this); // 获取当前点击的<li>元素 在 全部li元素中的索引。
				   $("div.searchboxbox > p").eq(index).show().siblings().hide(); //隐藏其它几个同辈的<div>元素
				});
				
				//城市选择
				$("input[name='departure_city']").click(function(event){
					event.stopPropagation();
					$(".citylist01").show();
				});

				$('.city01').click(function() {
					$("input[name='departure_city']").val($(this).text());
					$(".citylist01").hide();
				});

				$("input[name='arrival_city']").click(function(event) {
					event.stopPropagation();
					$(".citylist02").show();
				});
				$('.city02').click(function() {
					$("input[name='arrival_city']").val($(this).text());
					$(".citylist02").hide();
				});

				$("input[name='arrival_city_en']").click(function(event) {
					event.stopPropagation();
					$(".citylist03").show();
				});
				$('.city03').click(function() {
					$("input[name='arrival_city_en']").val($(this).text());
					$(".citylist03").hide();
				});

				$(document).click(function(event){
					$(".citylist01").hide();
					$(".citylist02").hide();
					$(".citylist03").hide();
					$(".pricelist").hide();
				});  

				$('.close').click(function() {
					$(".citylist01").hide();
					$(".citylist02").hide();
					$(".citylist03").hide();
					$(".pricelist").hide();
				});
				
				//价格区间
				$("input[name='price']").click(function(event){
					event.stopPropagation();
					$(".pricelist").show();
				});

				$('.price_span').click(function() {
					$("input[name='price']").val($(this).text());
					$(".pricelist").hide();
				});

				//日期选择
				$('#demo_inp1').calendar();
				
				//输入框提示
				$(".remindAuto").textRemindAuto();
				$(".borderChange").textRemindAuto({chgClass: "border"});
				$("#textColorChg").textRemindAuto({
					focusColor: "red"							  
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
<div class="main clearfix">
	<div class="main_left">
		<div class="leftmenu">
			<?php $_from = $this->_tpl_vars['common_cache']['leftmenulist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['leftmenu']):
?>
			<div class="leftmenubox">
				<div class="leftmenubigbox hide">
					<?php $_from = $this->_tpl_vars['leftmenu']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subleftmenu']):
?>
						<div class="subleftmenu clearfix">
							<h4 class="fl"><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&keywords=<?php echo $this->_tpl_vars['subleftmenu']['keywords']; ?>
"><?php echo $this->_tpl_vars['subleftmenu']['catname']; ?>
</a></h4>
							<div class="fl">
							<?php $_from = $this->_tpl_vars['subleftmenu']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subsubleftmenu']):
?>
								<span class="fl"><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&keywords=<?php echo $this->_tpl_vars['subsubleftmenu']['keywords']; ?>
"><?php echo $this->_tpl_vars['subsubleftmenu']['catname']; ?>
</a></span>
							<?php endforeach; endif; unset($_from); ?>
							</div>
						</div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
				<h3><?php echo $this->_tpl_vars['leftmenu']['catname']; ?>
</h3>
				<p class="com"><?php $_from = $this->_tpl_vars['leftmenu']['recommend']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['recommendmenu']):
?><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&keywords=<?php echo $this->_tpl_vars['recommendmenu']['keywords']; ?>
"><?php echo $this->_tpl_vars['recommendmenu']['catname']; ?>
</a>&nbsp;&nbsp;<?php endforeach; endif; unset($_from); ?></p>
			</div>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<!--div class="commonbox mt10">
			<h3><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/news/list_53.html" target="_blank">旅行社推荐</a></h3>
			<div class="box2">
				<ul class="lxslist">
					<li>
						<p class="p01"><a href="#">北京神舟国旅</a></p>
						<p class="p02">北京神舟国旅集团5A级旅行社，专业出境、国内旅游，电话010-51651898</p>
					</li>
					<li>
						<p class="p01"><a href="#">北京神舟国旅</a></p>
						<p class="p02">北京神舟国旅集团5A级旅行社，专业出境、国内旅游，电话010-51651898</p>
					</li>
					<li>
						<p class="p01"><a href="#">北京神舟国旅</a></p>
						<p class="p02">北京神舟国旅集团5A级旅行社，专业出境、国内旅游，电话010-51651898</p>
					</li>
					<li>
						<p class="p01"><a href="#">北京神舟国旅</a></p>
						<p class="p02">北京神舟国旅集团5A级旅行社，专业出境、国内旅游，电话010-51651898</p>
					</li>
				</ul>
			</div>
		</div-->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/block_hotline.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div class="toolbox mt10">
			<h3>工具箱</h3>
			<div class="box">
				<a href="#"></a>
				<a href="#"></a>
				<a href="#"></a>
				<a href="#"></a>
			</div>
		</div>

	</div>
	<div class="main_right">
		<div class="clearfix mt10">
			<!--幻灯片-->
			<div class="flashpicbox">
				<div class="premenu"> <a href="#"> </a> </div>
				<div class="nextmenu"> <a href="#"> </a> </div>
				<div class="flashpic">
					<ul>
						<?php $_from = $this->_tpl_vars['filmlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['film']):
?>
						<li> <img src="<?php echo $this->_tpl_vars['weburl']; ?>
/upload/common/<?php echo $this->_tpl_vars['film']['pic']; ?>
"> </li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div>
			<!--幻灯片-->
			<div class="rightsearch">
				<div class="rightregister">
					<a href="#" class="a01">游览注册</a>
					<a href="#" class="a02 ml5">旅行社入驻</a>
				</div>
				<!--搜索-->
				<div class="indexsearchbox mt10">
					<h3></h3>
					<ul class="indexsearch_tab clearfix">
						<li class="here">出境游</li>
						<li>国内游</li>	
					</ul>
					<div class="box">
						<div class="citylist citylist03 hide">
							<h3><span class="close"></span>请从以下列表中选择</h3>
							<div class="box">
								<?php $_from = $this->_tpl_vars['citylist_en']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city_en']):
?>
									<span class="city03"><?php echo $this->_tpl_vars['city_en']; ?>
</span>
								<?php endforeach; endif; unset($_from); ?>
							</div>
						</div>
						<div class="pricelist hide">
							<h3><span class="close"></span>请从以下列表中选择</h3>
							<div class="box">
								<span class="price_span">2000以内</span> <span class="price_span">2001-5000</span> <span class="price_span">5001-9999</span> <span class="price_span">10000-20000</span> <span class="price_span">20000以上</span>
							</div>
						</div>
						<div class="citylist citylist01 hide">
							<h3><span class="close"></span>请从以下列表中选择</h3>
							<div class="box">
								<?php $_from = $this->_tpl_vars['citylist_zh']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city_zh']):
?>
									<span class="city01"><?php echo $this->_tpl_vars['city_zh']; ?>
</span>
								<?php endforeach; endif; unset($_from); ?>
							</div>
						</div>
						<div class="citylist citylist02 hide">
							<h3><span class="close"></span>请从以下列表中选择</h3>
							<div class="box">
								<?php $_from = $this->_tpl_vars['citylist_zh']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city_zh']):
?>
									<span class="city02"><?php echo $this->_tpl_vars['city_zh']; ?>
</span>
								<?php endforeach; endif; unset($_from); ?>
							</div>
						</div>
						<form method="get" action="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search">
							<div class="searchboxbox">
								<p class="clearfix"><span class="fl"><input type="text" value="出发地" name="departure_city" class="inp01 remindAuto"></span><span class="fl pl10"><input type="text" value="目的地" value="" name="arrival_city_en" class="inp01 remindAuto"></span></p>
								<p class="clearfix hide"><span class="fl"><input type="text" name="departure_city" value="出发地" class="inp01 remindAuto"></span><span class="fl pl10"><input type="text" value="目的地" name="arrival_city" class="inp01 remindAuto"></span></p>
							</div>
							<p><input id="demo_inp1" type="text" name="departure_date" value="出发日期" class="inp02 remindAuto"></p>
							<p><input type="text" name="price" value="价格区间" class="inp03 remindAuto" readonly="readonly"></p>
							<p><input type="text" name="keywords" value="关键词" class="inp04 remindAuto"></p>
							<p><input type="submit" value="搜 索" class="searchbut"/></p>
							<input type="hidden" name="mod" value="search"/>
							<input type="hidden" name="ac" value="search"/>
						</form>
					</div>
				</div>
				<!--搜索-->
			</div>
		</div>
		<div class="commonbox2 mt10 clearfix">
			<div class="leftbox">
				<h3>
					<span class="more">
					<?php $_from = $this->_tpl_vars['common_cache']['keywords']['0']['keyword']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyword0']):
?> <a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&keywords=<?php echo $this->_tpl_vars['keyword0']['keywords']; ?>
&s_type=1" target="_blank"><?php echo $this->_tpl_vars['keyword0']['keyword']; ?>
</a> | 
					<?php endforeach; endif; unset($_from); ?> 
					<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&catid=2&s_type=1">更多+</a></span><span class="title">出境游</span><span class="english">OVERSEAS TOUR</span></h3>
				<div class="box">
					<ul class="travellist">
						<?php $_from = $this->_tpl_vars['linelist_cj']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['line_cj']):
?>
						<li><span class="price">￥<?php echo $this->_tpl_vars['line_cj']['p_price']; ?>
起</span><div class="title"><a href="<?php echo $this->_tpl_vars['line_cj']['p_url']; ?>
" class="title1" target="_blank"><?php echo $this->_tpl_vars['line_cj']['p_title']; ?>
</a> <a href="<?php echo $this->_tpl_vars['line_cj']['p_url']; ?>
" class="title2" target="_blank"><?php echo $this->_tpl_vars['line_cj']['p_short_title2']; ?>
</a></div></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div>
			<div class="rightbox">
				<?php $_from = $this->_tpl_vars['splinelist01']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sp_linelist01']):
?>
					<p><a href="<?php echo $this->_tpl_vars['sp_linelist01']['p_url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['sp_linelist01']['smallpic']; ?>
" class="img"></a></p>
					<p class="title"><a href="<?php echo $this->_tpl_vars['sp_linelist01']['p_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['sp_linelist01']['p_short_title']; ?>
 <?php echo $this->_tpl_vars['sp_linelist01']['p_short_title2']; ?>
</a></p>
					<p class="price01"><span class="fr">折扣：<?php echo $this->_tpl_vars['sp_linelist01']['zhekou']; ?>
折</span>原价：￥<?php echo $this->_tpl_vars['sp_linelist01']['p_market_price']; ?>
起</p>
					<p class="price02">
						<a href="<?php echo $this->_tpl_vars['sp_linelist01']['p_url']; ?>
" class="moredetail fr">去抢购</a><span class="f16 fb orange01">￥<?php echo $this->_tpl_vars['sp_linelist01']['p_price']; ?>
起</span>
					</p>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
		<div class="commonbox2 mt10 clearfix">
			<div class="leftbox">
				<h3><span class="more">
					<?php $_from = $this->_tpl_vars['common_cache']['keywords']['1']['keyword']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyword1']):
?> <a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&keywords=<?php echo $this->_tpl_vars['keyword1']['keywords']; ?>
&s_type=1" target="_blank"><?php echo $this->_tpl_vars['keyword1']['keyword']; ?>
</a> | 
					<?php endforeach; endif; unset($_from); ?> 
				<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&catid=1&s_type=1">更多+</a></span><span class="title">国内游</span><span class="english">DOMESTIC TOUR</span></h3>
				<div class="box">
					<ul class="travellist">
						<?php $_from = $this->_tpl_vars['linelist_gn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['line_gn']):
?>
						<li><span class="price">￥<?php echo $this->_tpl_vars['line_gn']['p_price']; ?>
起</span><div class="title"><a href="<?php echo $this->_tpl_vars['line_gn']['p_url']; ?>
" class="title1" target="_blank"><?php echo $this->_tpl_vars['line_gn']['p_title']; ?>
</a> <a href="<?php echo $this->_tpl_vars['line_gn']['p_url']; ?>
" class="title2" target="_blank"><?php echo $this->_tpl_vars['line_gn']['p_short_title2']; ?>
</a></div></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div>
			<div class="rightbox">
				<?php $_from = $this->_tpl_vars['splinelist02']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sp_linelist02']):
?>
					<p><a href="<?php echo $this->_tpl_vars['sp_linelist02']['p_url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['sp_linelist02']['smallpic']; ?>
" class="img"></a></p>
					<p class="title"><a href="<?php echo $this->_tpl_vars['sp_linelist02']['p_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['sp_linelist02']['p_short_title']; ?>
 <?php echo $this->_tpl_vars['sp_linelist02']['p_short_title2']; ?>
</a></p>
					<p class="price01"><span class="fr">折扣：<?php echo $this->_tpl_vars['sp_linelist02']['zhekou']; ?>
折</span>原价：￥<?php echo $this->_tpl_vars['sp_linelist02']['p_market_price']; ?>
起</p>
					<p class="price02">
						<a href="<?php echo $this->_tpl_vars['sp_linelist02']['p_url']; ?>
" class="moredetail fr">去抢购</a><span class="f16 fb orange01">￥<?php echo $this->_tpl_vars['sp_linelist02']['p_price']; ?>
起</span>
					</p>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
		<div class="commonbox2 mt10 clearfix">
			<div class="leftbox">
				<h3><span class="more">
					<?php $_from = $this->_tpl_vars['common_cache']['keywords']['2']['keyword']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyword2']):
?> <a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&keywords=<?php echo $this->_tpl_vars['keyword2']['keywords']; ?>
&s_type=1" target="_blank"><?php echo $this->_tpl_vars['keyword2']['keyword']; ?>
</a> | 
					<?php endforeach; endif; unset($_from); ?>
				<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&catid=1&s_type=1">更多+</a></span><span class="title">自由行</span><span class="english">SEFL-GUIDED TOUR</span></h3>
				<div class="box">
					<ul class="travellist">
						<?php $_from = $this->_tpl_vars['linelist_zyx']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['line_zyx']):
?>
						<li><span class="price">￥<?php echo $this->_tpl_vars['line_zyx']['p_price']; ?>
起</span><div class="title"><a href="<?php echo $this->_tpl_vars['line_zyx']['p_url']; ?>
" class="title1" target="_blank"><?php echo $this->_tpl_vars['line_zyx']['p_title']; ?>
</a> <a href="<?php echo $this->_tpl_vars['line_zyx']['p_url']; ?>
" class="title2" target="_blank"><?php echo $this->_tpl_vars['line_zyx']['p_short_title2']; ?>
</a></div></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div>
			<div class="rightbox">
				<?php $_from = $this->_tpl_vars['splinelist03']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sp_linelist03']):
?>
					<p><a href="<?php echo $this->_tpl_vars['sp_linelist03']['p_url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['sp_linelist03']['smallpic']; ?>
" class="img"></a></p>
					<p class="title"><a href="<?php echo $this->_tpl_vars['sp_linelist03']['p_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['sp_linelist03']['p_short_title']; ?>
 <?php echo $this->_tpl_vars['sp_linelist03']['p_short_title2']; ?>
</a></p>
					<p class="price01"><span class="fr">折扣：<?php echo $this->_tpl_vars['sp_linelist03']['zhekou']; ?>
折</span>原价：￥<?php echo $this->_tpl_vars['sp_linelist03']['p_market_price']; ?>
起</p>
					<p class="price02">
						<a href="<?php echo $this->_tpl_vars['sp_linelist03']['p_url']; ?>
" class="moredetail fr">去抢购</a><span class="f16 fb orange01">￥<?php echo $this->_tpl_vars['sp_linelist03']['p_price']; ?>
起</span>
					</p>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
	</div>
</div>
<!--友情链接-->
<div class="main mt10">
	<div class="flinkbox">
		<h3>友情链接</h3>
		<div class="box">
			<ul class="flinklist clearfix">
				<?php $_from = $this->_tpl_vars['flinklist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['flink']):
?>
				<li><a href="<?php echo $this->_tpl_vars['flink']['l_address']; ?>
" target="_blank"><?php echo $this->_tpl_vars['flink']['l_name']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
	</div>
</div>
<!--友情链接-->
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