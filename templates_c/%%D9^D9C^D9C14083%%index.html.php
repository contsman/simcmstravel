<?php /* Smarty version 2.6.18, created on 2016-08-03 09:43:04
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

				//area show control
				$(".product_tab li").unbind().mouseenter(function () {
					var e = $(this);
					if (!e.hasClass("on")) {
						e.addClass("on").siblings().removeClass("on");
						var t = e.parent().parent().parent().find(".product_area");
						t.find(".product_left").hide(),
								t.find(".product_left").eq(e.index()).fadeIn()
					}
				})

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
//			function lihover(obj){
//				var parobj = obj.parentNode;
//				parobj.getElementsByTagName("li")[0].className="";
//				var firstLi = parobj.getElementsByTagName("li")[0];
//				$("[data-cate$='"+firstLi.innerText+"']").hide();
//				$(firstLi).addClass("on");
//				$("[data-cate$='"+$(obj).text()+"']").fadeIn();
//			}
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
	</div>
</div>

<?php $_from = $this->_tpl_vars['allline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['area']):
?>
<div class="main_body products j_product_row">
	<div class="head">
		<img class="ico" src="http://i1.cctcdn.com/up/i/1605/06/8a12eb1e0c12.png" title="<?php echo $this->_tpl_vars['area']['catname']; ?>
" alt="首都国旅网出境游">
		<span class="title">
											<?php echo $this->_tpl_vars['area']['catname']; ?>
                                    </span>
	</div>
	<div id="recommendLocations" class="product_sugest_dest j_dest">
		<div class="j_group">
			<div class="title j_title" data-cate="出境游">热门国家</div>
			<div class="content">
				<a target="_blank" href="http://www.cct.cn/bourne/taiguo/all/">泰国</a>
				<a target="_blank" href="http://www.cct.cn/bourne/hanguo/all/">韩国</a>
				<a target="_blank" href="http://www.cct.cn/bourne/riben/all/">日本</a>
				<a target="_blank" href="http://www.cct.cn/bourne/meiguo/all/">美国</a>
				<a target="_blank" href="http://www.cct.cn/bourne/xinjiapo/all/">新加坡</a>
				<a target="_blank" href="http://www.cct.cn/bourne/faguo/all/">法国</a>
				<a target="_blank" href="http://www.cct.cn/bourne/ruishi/all/">瑞士</a>
				<a target="_blank" href="http://www.cct.cn/bourne/maerdaifu/all/">马尔代夫</a>
				<a target="_blank" href="http://www.cct.cn/bourne/deguo/all/">德国</a>
				<a target="_blank" href="http://www.cct.cn/bourne/eluosi/all/">俄罗斯</a>
				<a target="_blank" href="http://www.cct.cn/bourne/yidali/all/">意大利</a>
			</div>
		</div>
		<div class="j_group">
			<div class="title j_title" data-cate="出境游">热门城市</div>
			<div class="content">
				<a target="_blank" href="http://www.cct.cn/bourne/xianggang/all/">香港</a>
				<a target="_blank" href="http://www.cct.cn/bourne/dongjing/all/">东京</a>
				<a target="_blank" href="http://www.cct.cn/bourne/shouer/all/">首尔</a>
				<a target="_blank" href="http://www.cct.cn/bourne/luoma/all/">罗马</a>
				<a target="_blank" href="http://www.cct.cn/bourne/pujidao/all/">普吉岛</a>
				<a target="_blank" href="http://www.cct.cn/bourne/okinawa-nahachongsheng-naba/all/">冲绳</a>
				<a target="_blank" href="http://www.cct.cn/bourne/shaba/all/">沙巴</a>
				<a target="_blank" href="http://www.cct.cn/bourne/taibei/all/">台北</a>
				<a target="_blank" href="http://www.cct.cn/bourne/balidao/all/">巴厘岛</a>
				<a target="_blank" href="http://www.cct.cn/bourne/da/all/">大阪</a>
				<a target="_blank" href="http://www.cct.cn/bourne/sumeidao/all/">苏梅岛</a>
				<a target="_blank" href="http://www.cct.cn/bourne/jingdu/all/">京都</a>
				<a target="_blank" href="http://www.cct.cn/bourne/jizhoudao/all/">济州岛</a>
				<a target="_blank" href="http://www.cct.cn/bourne/qingmai/all/">清迈</a>
				<a target="_blank" href="http://www.cct.cn/bourne/basailuona/all/">巴塞罗那</a>
				<a target="_blank" href="http://www.cct.cn/bourne/changtandao/all/">长滩岛</a>
				<a target="_blank" href="http://www.cct.cn/bourne/saibandao/all/">塞班</a>
				<a target="_blank" href="http://www.cct.cn/bourne/xini/all/">悉尼</a>
			</div>
		</div>
	</div>
	<div class="product_tab">
		<ul id="chujing_tab">
			<?php $_from = $this->_tpl_vars['area']['warea']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['worldarea']):
?>
			<!--<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&keywords=<?php echo $this->_tpl_vars['keyword0']['keywords']; ?>
&s_type=1" target="_blank"><?php echo $this->_tpl_vars['keyword0']['keyword']; ?>
</a>-->
			<li <?php if ($this->_tpl_vars['skey'] == 0): ?>class="on"<?php endif; ?> ><a href="javascript:void(0);"><?php echo $this->_tpl_vars['worldarea']['catname']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
		<a target="_blank" href="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=search&ac=search&catid=<?php echo $this->_tpl_vars['area']['catid']; ?>
&s_type=1" class="product_more">全部<?php echo $this->_tpl_vars['area']['catname']; ?>
线路</a>
	</div>
	<div class="product_area j_product_list">
		<?php $_from = $this->_tpl_vars['area']['warea']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['countryarea']):
?>
			<div class="product_left j_group " data-cate="<?php echo $this->_tpl_vars['worldarea']['catname']; ?>
-<?php echo $this->_tpl_vars['countryarea']['catname']; ?>
" <?php if ($this->_tpl_vars['ckey'] == 0): ?>style="display: block;"<?php endif; ?> >
				<?php $_from = $this->_tpl_vars['countryarea']['area_line']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lkey'] => $this->_tpl_vars['countryline']):
?>
					<div class="product j_item">
						<a target="_blank" href="<?php echo $this->_tpl_vars['countryline']['p_url']; ?>
/<?php echo $this->_tpl_vars['countryline']['p_page']; ?>
" title="<?php echo $this->_tpl_vars['countryline']['p_title']; ?>
">
							<?php if ($this->_tpl_vars['countryline']['p_pics'] <> ""): ?><img src="<?php echo $this->_tpl_vars['countryline']['p_smallpic']; ?>
" alt="暂无图片"/><?php else: ?><img src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/pic/snopic.jpg" /><?php endif; ?>
							<div class="title"><?php echo $this->_tpl_vars['countryline']['p_title']; ?>
</div>
							<div class="product_price">
								<span>￥<?php echo $this->_tpl_vars['countryline']['p_price']; ?>
起</span>
								<span class="product_origin"><?php echo $this->_tpl_vars['countryline']['departure_province_name']; ?>
</span>
							</div>
						</a>
					</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		<?php endforeach; endif; unset($_from); ?>
	</div>
</div>
<?php endforeach; endif; unset($_from); ?>

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