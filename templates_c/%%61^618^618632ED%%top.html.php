<?php /* Smarty version 2.6.18, created on 2016-07-25 14:22:49
         compiled from default/default/top.html */ ?>
<script language="JavaScript">
$(function(){
	$("#login").load("<?php echo $this->_tpl_vars['weburl']; ?>
/index.php?mod=ajax&ajax=1&login=1");
})
function set_favorite(title, url) {
	try {
		window.external.AddFavorite(url, title);
	} catch (e) {
		if (window.sidebar) {
			window.sidebar.addPanel(title, url, '');
		} else {
			alert('请用ctrl+d收藏网址');
			return false;
		}
	}
}
</script>

<!--头部end-->
<div class="topbox">
	<div class="top">
		<div class="topleft" id="login"></div>
		<div class="topright">
			<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/about/91.html" class="topaboutus blue" target="_blank">经营资质</a><span>|</span> 
			<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/about/93.html" class="topaboutus blue" target="_blank">员工风采</a><span>|</span> 
			<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/about/92.html" class="topaboutus blue" target="_blank">办公场所</a><span>|</span> 
			<a href="#" class="topaboutus blue" onclick="set_favorite()">加入收藏</a> 
		</div>
	</div>
</div>
<div class="head">
	<div class="logo"><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/"><img class="logo_pic" src="<?php echo $this->_tpl_vars['weburl']; ?>
/templates/default/<?php echo $this->_tpl_vars['setting']['templates']; ?>
/img/logo.jpg"/></a></div>
	<div class="headright">
		<div class="topsearch">
			<form method="get" action="<?php echo $this->_tpl_vars['weburl']; ?>
/index.php">
				<input type="text" name="keywords" class="keywords"><input type="submit" value="" class="button"/>
				<input type="hidden" name="mod" value="search">
			</form>
		</div>
	</div>
	<div id="header_ad">
		<a target="_blank" href="/"><img src="/templates/default/default/img/head_bandad03.jpg"></a>
	</div>
</div>
<!--头部end-->