<?php /* Smarty version 2.6.18, created on 2014-02-04 21:17:22
         compiled from default/default/visalist.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>各国签证 - <?php echo $this->_tpl_vars['page']['p_title']; ?>
 - <?php echo $this->_tpl_vars['setting']['sitename']; ?>
</title>
		<meta content="<?php echo $this->_tpl_vars['setting']['keywords']; ?>
"  name="keywords"/>
		<meta content="<?php echo $this->_tpl_vars['setting']['description']; ?>
" name="description"/>
		<link href="<?php echo $this->_tpl_vars['weburl']; ?>
/templates/default/<?php echo $this->_tpl_vars['setting']['templates']; ?>
/css/page_page.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery-1.4.2.min.js"></script>
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
				<li><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/visa/">各国签证</a></li>
				<li class="li01">>></li>
				<li><?php echo $this->_tpl_vars['continentname']; ?>
签证</li>
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
				<?php $_from = $this->_tpl_vars['visalist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['visa_list']):
?>
				<div class="commonbox3 <?php if ($this->_tpl_vars['key'] <> 0): ?>mt10<?php endif; ?>">
					<h3><span class="title"><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/visa/<?php echo $this->_tpl_vars['visa_list']['id']; ?>
.html"><?php echo $this->_tpl_vars['visa_list']['title']; ?>
</a></span></h3>
					<div>
						<ul class="visalist clearfix">
							<li><span class="fb gray02">签证类型：</span><?php echo $this->_tpl_vars['visa_list']['catname']; ?>
</li>
							<li><span class="fb gray02">签证费用：</span><span class="orange01 fb">￥<?php echo $this->_tpl_vars['visa_list']['price']; ?>
元/人</span></li>
							<li><span class="fb gray02">受理时间：</span><?php echo $this->_tpl_vars['visa_list']['processtime']; ?>
</li>
							<li><span class="fb gray02">费用说明：</span><?php echo $this->_tpl_vars['visa_list']['fee']; ?>
</li>
							<li><span class="fb gray02">受理人群：</span><?php echo $this->_tpl_vars['visa_list']['crowd']; ?>
</li>
							<li></li>
							<li></li>
							<li class="tr"><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/visa/<?php echo $this->_tpl_vars['visa_list']['id']; ?>
.html" target="_blank">查看<?php echo $this->_tpl_vars['visa_list']['title']; ?>
办理资料</a></li>
						</ul>
					</div>
				</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
		<!--版权-->
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