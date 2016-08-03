<?php /* Smarty version 2.6.18, created on 2014-02-04 20:50:31
         compiled from default/default/order.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $this->_tpl_vars['page']['p_title']; ?>
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
		<div class="main mt10 clearfix">
			<div class="commonbox">
				<h3>在线订购</h3>
				<div class="aboutbox">
					<form name="form1" id="upinfoform" method="post" action="index.php?mod=order">
						<table cellspacing="0" cellpadding="0" border="0" class="ordertable">
							<tr>
								<th>线路编码：</th>
								<td><?php echo $this->_tpl_vars['line']['p_no']; ?>
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['line']['p_id']; ?>
"></td>
							</tr>
							<tr>
								<th>线路名称：</th>
								<td><?php echo $this->_tpl_vars['line']['p_title']; ?>
</td>
							</tr>
							<tr>
								<th>出发日期：</th>
								<td>
									<select name="departure_date">
										<?php echo $this->_tpl_vars['select_departure_date']; ?>

									</select>
								</td>
							</tr>
							<tr>
								<th>人数：</th>
								<td><span>成人：<span>
									<span>
										<select name="adult_nums">
											<option value="1" <?php if ($this->_tpl_vars['adult_nums'] == 1): ?>selected<?php endif; ?>>1</option>
											<option value="2" <?php if ($this->_tpl_vars['adult_nums'] == 2): ?>selected<?php endif; ?>>2</option>
											<option value="3" <?php if ($this->_tpl_vars['adult_nums'] == 3): ?>selected<?php endif; ?>>3</option>
											<option value="4" <?php if ($this->_tpl_vars['adult_nums'] == 4): ?>selected<?php endif; ?>>4</option>
											<option value="5" <?php if ($this->_tpl_vars['adult_nums'] == 5): ?>selected<?php endif; ?>>5</option>
											<option value="6" <?php if ($this->_tpl_vars['adult_nums'] == 6): ?>selected<?php endif; ?>>6</option>
											<option value="7" <?php if ($this->_tpl_vars['adult_nums'] == 7): ?>selected<?php endif; ?>>7</option>
											<option value="8" <?php if ($this->_tpl_vars['adult_nums'] == 8): ?>selected<?php endif; ?>>8</option>
											<option value="9" <?php if ($this->_tpl_vars['adult_nums'] == 9): ?>selected<?php endif; ?>>9</option>
											<option value="10" <?php if ($this->_tpl_vars['adult_nums'] == 10): ?>selected<?php endif; ?>>10</option>
										</select>
									</span>
									<span>儿童：</span>
									<span>
										<select name="children_nums">
											<option value="0" <?php if ($this->_tpl_vars['children_nums'] == 0): ?>selected<?php endif; ?>>0</option>
											<option value="1" <?php if ($this->_tpl_vars['children_nums'] == 1): ?>selected<?php endif; ?>>1</option>
											<option value="2" <?php if ($this->_tpl_vars['children_nums'] == 2): ?>selected<?php endif; ?>>2</option>
											<option value="3" <?php if ($this->_tpl_vars['children_nums'] == 3): ?>selected<?php endif; ?>>3</option>
											<option value="4" <?php if ($this->_tpl_vars['children_nums'] == 4): ?>selected<?php endif; ?>>4</option>
											<option value="5" <?php if ($this->_tpl_vars['children_nums'] == 5): ?>selected<?php endif; ?>>5</option>
											<option value="6" <?php if ($this->_tpl_vars['children_nums'] == 6): ?>selected<?php endif; ?>>6</option>
											<option value="7" <?php if ($this->_tpl_vars['children_nums'] == 7): ?>selected<?php endif; ?>>7</option>
											<option value="8" <?php if ($this->_tpl_vars['children_nums'] == 8): ?>selected<?php endif; ?>>8</option>
											<option value="9" <?php if ($this->_tpl_vars['children_nums'] == 9): ?>selected<?php endif; ?>>9</option>
											<option value="10" <?php if ($this->_tpl_vars['children_nums'] == 10): ?>selected<?php endif; ?>>10</option>
										</select>
									</span>
								</td>
							</tr>
							<tr>
								<th></td>
								<td><input type="submit" value="" class="orderbut"/>
								<input type="button" value="" class="close"  onclick="javascript:window.close();"/>
								<input type="hidden" name="ac" value="order"/>
								</td>
							</tr>
						</table>
					</form>
				</div>
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