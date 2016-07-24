<?php
/*
 本软件版权归作者所有,在投入使用之前注意获取许可
 作者：北京市普艾斯科技有限公司
 项目：simcms_锐游1.0
 电话：010-58480317
 网址：http://www.simcms.net
 simcms.net保留全部权力，受相关法律和国际		  		
 公约保护，请勿非法修改、转载、散播，或用于其他赢利行为，并请勿删除版权声明。
*/
if (!defined('APP_IN')) exit('Access Denied');
include('index/page.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>网站后台管理</title>
<link rel="stylesheet" type="text/css" id="css" href="static/css/admin/main.css">
<script type="text/javascript" src="static/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">  
            $(function(){  
                var pagestyle = function() {
					var rframe = $("#report_iframe");
					//ie7默认情况下会有上下滚动条，去掉上下15像素
					var h = $(window).height() - rframe.offset().top - 20;
					rframe.height(h);
				}
				//注册加载事件
				$("#report_iframe").load(pagestyle);
				//注册窗体改变大小事件   
				$(window).resize(pagestyle);
				var $div_li = $("div.top_bottom ul li");
				$div_li.click(function() {
					$(this).addClass("here") //当前<li>元素高亮
					.siblings().removeClass("here"); //去掉其它同辈<li>元素的高亮
					var index = $div_li.index(this); // 获取当前点击的<li>元素 在 全部li元素中的索引。
					$("div.sidebox > div") //选取子节点。不选取子节点的话，会引起错误。如果里面还有div 
					.eq(index).show() //显示 <li>元素对应的<div>元素
					.siblings().hide(); //隐藏其它几个同辈的<div>元素
				});
				$(".sidebox h3").click(function(){
					var $ul = $(this).next("ul");
					if($ul.is(":visible")){
						$(this).removeClass("selected");
						$ul.hide();
					}else{
						$(this).addClass("selected");
						$ul.show();
					}
					return false;
				 });
				$(".sidebox ul li a").click(function(){
					$(".sidebox ul li a").removeClass("selected");
					$(this).addClass("selected");
				 });
            });  
</script>
</head>
<body>
<div class="top">
	<div class="top_bottom">
		<ul class="topmenu">
			<li class="here">常用操作</li>
			<li>内容管理</li>
			<li>生成静态</li>
			<li>模块管理</li>
			<li>会员管理</li>
			<!-- <li>采集管理</li> -->
			<li>系统设置</li>
		</ul>
		<div class="top_top fr"><span class="fl">欢迎您，<?=$_SESSION['ADMIN_NAME']?></span><span class="fl pl10 pt5"><a href="<?php echo ADMIN_PAGE?>?mod=login&ac=logout" class="optionmenu black">安全退出</a></span><span class="fl pl10 pt5"><a href="<?php echo ADMIN_PAGE?>?mod=cache&ac=del" class="optionmenu black">清除缓存</a></span><span class="fl pl10 pt5"><a href="http://bbs.52jscn.com" class="optionmenu black" target="_blank">源码论坛</a></span></div>
	</div>
</div>
<div class="mainw">
<div class="main">
	<div class="mainleft">
		<div class="sidetop tc"><a href="index.html" target="_blank">网站首页</a>  <a href="<?php echo ADMIN_PAGE?>?mod=main">后台首页</a></div>
		<div id="side" class="sidebox">
			<div>
				<h3><span class="title">线路管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=products_category&ac=list" target="report_iframe">分类管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=products&ac=list" target="report_iframe">线路列表 </a></li>
				</ul>
				<h3><span class="title">新闻管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=news_category&ac=list" target="report_iframe">分类管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=news&ac=list" target="report_iframe">新闻管理 </a></li>
				</ul>
			</div>
			<div style="display:none;">
				<h3><span class="title">栏目管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=channel&ac=list" target="report_iframe">栏目管理</a></li>
				</ul>
				<h3><span class="title">新闻管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=news_category&ac=list" target="report_iframe">分类管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=news&ac=list" target="report_iframe">新闻管理 </a></li>
				</ul>
				<h3><span class="title">单页管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=page_sort&ac=list" target="report_iframe">分类管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=page&ac=list" target="report_iframe">单页管理</a></li>
				</ul>
				<h3><span class="title">线路管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=products_category&ac=list" target="report_iframe">分类管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=products&ac=list" target="report_iframe">线路列表 </a></li>
				</ul>
				<h3><span class="title">签证管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=visa_category&ac=list" target="report_iframe">分类管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=visa&ac=list" target="report_iframe">签证列表 </a></li>
				</ul>
			</div>
			<div style="display:none;">
				<h3><span class="title">生成静态</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=create_html&ac=index" target="report_iframe">更新主页</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=create_html&ac=channel" target="report_iframe">更新频道页</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=create_html&ac=products" target="report_iframe">更新线路</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=create_html&ac=news" target="report_iframe">更新新闻</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=create_html&ac=page" target="report_iframe">更新单页</a></li>
				</ul>
			</div>
			<div style="display:none;">
				<h3><span class="title">辅助插件</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=country&ac=list" target="report_iframe">出境游目的地管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=area&ac=list" target="report_iframe">国内游目的地管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=feedback&ac=list" target="report_iframe">留言管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=ad&ac=list" target="report_iframe">广告管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=filmstrip&ac=list" target="report_iframe">幻灯片管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=flink&ac=list" target="report_iframe">友情链接管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=keyword&ac=list" target="report_iframe">关键字管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=service&ac=list" target="report_iframe">帮助信息管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=consultant&ac=list" target="report_iframe">旅游顾问管理</a></li>
				</ul>
			</div>
			<div style="display:none;">
				<h3><span class="title">会员管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=member&ac=list" target="report_iframe">会员管理</a></li>
				</ul>
				<h3><span class="title">订单管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=order&ac=list" target="report_iframe">订单管理</a></li>
				</ul>
			</div>
			<!-- <div style="display:none;">
				<h3><span class="title">采集管理</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=node&ac=list" target="report_iframe">节点管理</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=collect_news&ac=list" target="report_iframe">临时内容</a></li>
				</ul>
			</div> -->
			<div style="display:none;">
				<h3><span class="title">相关设置</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=settings&ac=web" target="report_iframe">系统基本设置</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=settings&ac=contact" target="report_iframe">联系方式设置</a></li>
				</ul>
				<h3><span class="title">管理员设置</span></h3>
				<ul>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=admin&ac=list" target="report_iframe">管理员选项</a></li>
					<li><a href="<?php echo ADMIN_PAGE?>?mod=permission&ac=list" target="report_iframe">系统权限管理</a></li>	
				</ul>
			</div>
		</div>
	</div>
	<div class="mainright">
		<iframe id="report_iframe" frameborder="0" name="report_iframe" src="<?php echo ADMIN_PAGE?>?mod=index" width="100%"></iframe>
	</div>
</div>
</div>
</body>
</html>
