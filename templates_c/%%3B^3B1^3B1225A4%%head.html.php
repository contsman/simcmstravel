<?php /* Smarty version 2.6.18, created on 2014-01-24 11:56:57
         compiled from default/default/head.html */ ?>
<script language="JavaScript">
$(function() {
	$('div.left').hover(function(){
		$(this).children('div').stop(true,true).show();
	},function(){
		$(this).children('div').stop(true,true).hide();
	});
	$('.leftmenubox').hover(function(){
		$(this).addClass("leftmenubox_hover");
		$(this).children("div").show();
	},function(){
		$(this).removeClass("leftmenubox_hover");
		$(this).children("div").hide();
	});
})
</script>
<!--头部end -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/".($this->_tpl_vars['setting']['templates'])."/top.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="topmenubox">
<div class="topmenu">
	<ul class="topmenulist">
		<li class="allsort">全部旅游产品分类</li>
		<?php $_from = $this->_tpl_vars['partlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skey'] => $this->_tpl_vars['part']):
?>
		<li>
		<a href="<?php echo $this->_tpl_vars['weburl']; ?>
/<?php echo $this->_tpl_vars['part']['c_url']; ?>
" title="<?php echo $this->_tpl_vars['part']['c_name']; ?>
" <?php if ($this->_tpl_vars['menustate'] == ( $this->_tpl_vars['skey']+1 )): ?>class="here"<?php endif; ?> <?php if ($this->_tpl_vars['part']['c_target'] == 2): ?>target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['part']['c_name']; ?>
</a>
		</li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>
</div>
<!--头部end -->