<?php /* Smarty version 2.6.18, created on 2014-01-24 11:56:57
         compiled from default/default/block_service.html */ ?>
<div class="main mt10">
	<div class="service clearfix">
		<?php $_from = $this->_tpl_vars['common_cache']['bottom_service']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['bottom_service_list']):
?>
		<div class="servicebox <?php if ($this->_tpl_vars['key'] <= 3): ?>bbr<?php endif; ?>">
			<h3><?php echo $this->_tpl_vars['bottom_service_list']['s_name']; ?>
</h3>
			<ul>
				<?php $_from = $this->_tpl_vars['bottom_service_list']['pagelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['page_list']):
?>
				<li><a href="<?php echo $this->_tpl_vars['weburl']; ?>
/service/<?php echo $this->_tpl_vars['page_list']['p_page']; ?>
"><?php echo $this->_tpl_vars['page_list']['p_title']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<?php endforeach; endif; unset($_from); ?>
	</div>
</div>