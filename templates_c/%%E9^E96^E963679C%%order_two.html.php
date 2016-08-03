<?php /* Smarty version 2.6.18, created on 2014-02-04 20:50:34
         compiled from default/default/order_two.html */ ?>
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
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['weburl']; ?>
/static/js/skygqcheckajaxform.1.5/jquery.skygqcheckajaxform.1.5.js"></script>
		<script type="text/javascript">
				var base_url="";
				$(function(){
					var items_array = [
						{ name:"turename",type:"",simple:"真实姓名",focusMsg:'请填写真实姓名'},
						{ name:"tel",type:"telephone",simple:"手机",focusMsg:'请填写手机'}
					];
					$("#upinfoform").skygqCheckAjaxForm({
						items			: items_array
					});
				});
		</script>
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
					<p class="ordertitle">您的订单详情为：</p>
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
									<?php echo $this->_tpl_vars['departure_date']['departure_date']; ?>

									<input type="hidden" name="departure_date" value="<?php echo $this->_tpl_vars['departure_date']['departure_date']; ?>
">
								</td>
							</tr>
							<tr>
								<th>人数：</th>
								<td>成人：<span class="orange01"><?php echo $this->_tpl_vars['adult_nums']; ?>
</span> + 儿童：<span class="orange01"><?php echo $this->_tpl_vars['children_nums']; ?>
</span> = 总人数：<span class="orange01"><?php echo $this->_tpl_vars['all_nums']; ?>
</span>
								<input type="hidden" name="adult_nums" value="<?php echo $this->_tpl_vars['adult_nums']; ?>
">
								<input type="hidden" name="children_nums" value="<?php echo $this->_tpl_vars['children_nums']; ?>
">
								</td>
							</tr>
							<tr>
								<th>价格：</th>
								<td>成人：<span class="orange01">￥<?php echo $this->_tpl_vars['adult_price']; ?>
元</span> + 儿童：<span class="orange01">￥<?php echo $this->_tpl_vars['children_price']; ?>
元</span> = 总价格：<span class="orange01">￥<?php echo $this->_tpl_vars['all_price']; ?>
元</span>
								<input type="hidden" name="price" value="<?php echo $this->_tpl_vars['all_price']; ?>
">
								</td>
							</tr>
							<tr>
								<th><span class="red">*</span> 真实姓名：</th>
								<td>
								<input type="text" name="turename" value="<?php echo $this->_tpl_vars['turename']; ?>
" size="30">
								</td>
							</tr>
							<tr>
								<th><span class="red">*</span> 手机号：</th>
								<td>
								<input type="text" name="tel" value="<?php echo $this->_tpl_vars['tel']; ?>
" size="30">
								</td>
							</tr>
							<tr>
								<th></td>
								<td><input type="submit" value="" class="orderbut"/>
								<input type="button" value="" class="close" onclick="javascript:window.close();"/>
								<input type="hidden" name="action" value="order"/>
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