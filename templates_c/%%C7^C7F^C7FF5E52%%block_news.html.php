<?php /* Smarty version 2.6.18, created on 2014-01-24 11:56:58
         compiled from default/default/block_news.html */ ?>
<div class="commonbox mt10">
	<h3><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/news/list_53.html" target="_blank">旅游资讯</a></h3>
	<div class="box">
		<ul class="newslist">
			<?php $_from = $this->_tpl_vars['common_cache']['newslist01']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news01']):
?>
				<li><a href="<?php echo $this->_tpl_vars['news01']['n_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['news01']['shorttitle']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
</div>
<div class="commonbox mt10">
	<h3><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/news/list_55.html" target="_blank">旅游攻略</a></h3>
	<div class="box">
		<ul class="newslist">
		<?php $_from = $this->_tpl_vars['common_cache']['newslist02']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news02']):
?>
			<li><a href="<?php echo $this->_tpl_vars['news02']['n_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['news02']['shorttitle']; ?>
</a></li>
		<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
</div>