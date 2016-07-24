<?php /* Smarty version 2.6.18, created on 2014-01-24 11:56:57
         compiled from default/default/block_hotline.html */ ?>
<script language="JavaScript">
$(function(){
	var $hotline_li = $("div.h3_tab ul li");
    $hotline_li.mouseover(function() {
       $(this).addClass("here").siblings().removeClass("here");
       var index = $hotline_li.index(this);
       $("div.hotlinebox > ul").eq(index).show().siblings().hide();
    })
});
</script>
<div class="commonbox mt10">
	<div class="h3_tab">
		<div class="line">
		</div>
		<ul>
			<li class="here">出境游TOP</li>
			<li>国内游TOP</li>
		</ul>
	</div>
	<div class="box hotlinebox">
		<ul class="ranklist">
			<?php $_from = $this->_tpl_vars['common_cache']['hotline02']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotline02']):
?>
			<li><span class="fr orange01">￥<?php echo $this->_tpl_vars['hotline02']['p_price']; ?>
起</span><a href="<?php echo $this->_tpl_vars['hotline02']['p_url']; ?>
"><?php echo $this->_tpl_vars['hotline02']['p_title']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
		<ul class="ranklist hide">
			<?php $_from = $this->_tpl_vars['common_cache']['hotline01']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotline01']):
?>
			<li><span class="fr orange01">￥<?php echo $this->_tpl_vars['hotline01']['p_price']; ?>
起</span><a href="<?php echo $this->_tpl_vars['hotline01']['p_url']; ?>
"><?php echo $this->_tpl_vars['hotline01']['p_title']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
</div>