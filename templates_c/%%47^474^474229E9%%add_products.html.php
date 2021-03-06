<?php /* Smarty version 2.6.18, created on 2016-07-26 14:33:16
         compiled from admin/add_products.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link href="static/css/admin/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="admin/editor/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="static/js/jquery-1.4.2.min.js"></script>
	<link href="static/js/uploadify/uploadify.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="static/js/uploadify/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="static/js/uploadify/swfobject.js"></script>
	<script type="text/javascript" src="static/js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#file_upload').uploadify({
				'uploader'  : 'static/js/uploadify/uploadify.swf?v='+new Date(),
				'script'    : 'admin/upload.php',
				'cancelImg' : 'static/js/uploadify/cancel.png',
				'folder'    : '/upload/',
				'auto'      : true,
				'multi'     : true,
				'fileExt'    : '*.jpg;*.gif;*.png;',
				'onComplete':function(event,queueId,fileObj,response,data){
					var picurl = response.substring(1);//remove the special character [%EF%BB%BF]
					var arr_picid = response.split("/");
					var arr_length = arr_picid.length;
					var arr_picids = arr_picid[arr_length-1].split(".");
					$('#piclist').append('<li id="'+arr_picids[0]+'"><img src="'+picurl+'"><p><span style="cursor:pointer">删除</span><input type="hidden" name="p_pics[]" value="'+picurl+'"></p></li>');//在页面上显示文件相对路径
				},
				'scriptData': {"session_id":"<?php echo $this->_tpl_vars['sessionid']; ?>
"}
			});

			//图片删除
			$("#piclist li span").live('click', function(){
				$.get("index.php?mod=ajax&ajax=1&p_id=<?php echo $this->_tpl_vars['products']['p_id']; ?>
",{
					p_pic :  $(this).next().val()
				}, function (data, textStatus){
					alert(data);
					$("li").remove("#"+data);
				});
			});

			//分类选择
			$("#catid").change(function(){
				if( $("#catid").val() == 2 ){
					$("#china").hide().siblings().show();
				}
				else{
					$("#china").show().siblings().hide();
				}
			});

			//国内城市选择
			$("#chinaprovince").change(function(){
				$.get("index.php?mod=ajax&ajax=1", {
							china_cid :  $("#chinaprovince").val()
						}, function (data, textStatus){
							$("#chinacity").html(data); // 把返回的数据添加到页面上
						}
				);
			});

			//国内城市选择(多选)
			var $china_city =$("p#departure_china_province input[type='checkbox']");
			$china_city.click(
					function(){
						if (!!$(this).attr("checked")) {
							$.get("index.php?mod=ajax&ajax=1", {
								china_pid: $(this).val()
							}, function(data,textStatus){
								$("#departure_china_city").append(data);
							});
						}
						else{
							$("span").remove(".cc"+$(this).val());
						}
					}

			);

			//国家选择(多选)
			var $foreign_country =$("p#departure_foreign_continent input[type='checkbox']");
			$foreign_country.click(
					function(){
						if (!!$(this).attr("checked")) {
							$.get("index.php?mod=ajax&ajax=1", {
								foreign_cid : $(this).val()
							}, function(data,textStatus){
								$("#departure_foreign_country").append(data);
							});
						}
						else{
							$.get("index.php?mod=ajax&ajax=1&del=1", {
								foreign_cid : $(this).val()
							}, function(data,textStatus){
								var words = data.split('|');
								for(var i=0;i<words.length;i++){
									$("span").remove(".fcc"+words[i]);
								}
							});
							$("span").remove(".fc"+$(this).val());
						}
					}

			);

			//国外城市选择(多选)
			var $foreign_city =$("p#departure_foreign_country input[type='checkbox']");
			$foreign_city.live('click', function() {
						if (!!$(this).attr("checked")) {
							$.get("index.php?mod=ajax&ajax=1", {
								foreign_ccid : $(this).val()
							}, function(data,textStatus){
								$("#departure_foreign_city").append(data);
							});
						}
						else{
							$("span").remove(".fcc"+$(this).val());
						}
					}
			);
		});
	</script>
</head>
<body>
<div class="tablenav"><span class="title">您的位置：<?php echo $this->_tpl_vars['mod_name']; ?>
 <span class="navfont">>></span> <?php echo $this->_tpl_vars['ac_arr'][$this->_tpl_vars['ac']]; ?>
</span><span class="refresh"><a href="javascript:location.reload()
">刷新</a></span></div>
<div class="colorarea01">
	<div class="search clearfix">
		<div class="searchL">
			<ul class="menulist">
				<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products&ac=list">线路管理</a></li>
				<li><a href="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products&ac=add">添加线路</a></li>
			</ul>
		</div>
		<div class="searchR">
		</div>
	</div>
	<form name="form" id="proform" method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['adminpage']; ?>
?mod=products">
		<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
			<tr>
				<th>分类：</th>
				<td>
					<select name="catid" id="catid">
						<?php echo $this->_tpl_vars['selectcategory']; ?>

					</select>
				</td>
			</tr>
			<tr>
				<th>线路编号：</th>
				<td><input name="p_no" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_no']; ?>
" /></td>
			</tr>
			<tr>
				<th>线路名称：</th>
				<td><input name="p_title" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_title']; ?>
" /></td>
			</tr>
			<tr>
				<th>扩展名称：</th>
				<td><input name="p_title2" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_title2']; ?>
" /></td>
			</tr>
			<tr>
				<th>出发地：</th>
				<td>
					<select name="p_departure_province" id="chinaprovince">
						<?php echo $this->_tpl_vars['selectprovince']; ?>

					</select>
					<select name="p_departure_city"  id="chinacity">
						<?php echo $this->_tpl_vars['selectcity']; ?>

					</select>
				</td>
			</tr>
			<tr>
				<th>目的地：</th>
				<td>
					<?php if ($this->_tpl_vars['ac'] == 'edit'): ?>
					<?php if ($this->_tpl_vars['products']['catid'] == 1): ?>
					<?php echo $this->_tpl_vars['arrivallist']; ?>

					<div id="foreign" style="display:none;">
						<p id="departure_foreign_continent">
							<?php $_from = $this->_tpl_vars['continentlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['continent']):
?>
							<input type="checkbox" name="p_arrival_one[]" value="<?php echo $this->_tpl_vars['key']; ?>
"> <?php echo $this->_tpl_vars['continent']; ?>
 &nbsp;&nbsp;
							<?php endforeach; endif; unset($_from); ?>
						</p>
						<p id="departure_foreign_country" class="mt10"></p>
						<p id="departure_foreign_city" class="mt10"></p>
					</div>
					<?php else: ?>
					<?php echo $this->_tpl_vars['arrivallist']; ?>

					<div id="china" style="display:none;">
						<p id="departure_china_province">
							<?php $_from = $this->_tpl_vars['provincelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['province']):
?>
							<input type="checkbox" name="p_arrival_one[]" value="<?php echo $this->_tpl_vars['key']; ?>
"> <?php echo $this->_tpl_vars['province']; ?>
 &nbsp;&nbsp;
							<?php endforeach; endif; unset($_from); ?>
						</p>
						<p id="departure_china_city" class="mt10"></p>
					</div>
					<?php endif; ?>
					<?php else: ?>
					<div id="china">
						<p id="departure_china_province">
							<?php $_from = $this->_tpl_vars['provincelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['province']):
?>
							<input type="checkbox" name="p_arrival_one[]" value="<?php echo $this->_tpl_vars['key']; ?>
"> <?php echo $this->_tpl_vars['province']; ?>
 &nbsp;&nbsp;
							<?php endforeach; endif; unset($_from); ?>
						</p>
						<p id="departure_china_city" class="mt10"></p>
					</div>
					<div id="foreign" style="display:none;">
						<p id="departure_foreign_continent">
							<?php $_from = $this->_tpl_vars['continentlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['continent']):
?>
							<input type="checkbox" name="p_arrival_one[]" value="<?php echo $this->_tpl_vars['key']; ?>
"> <?php echo $this->_tpl_vars['continent']; ?>
 &nbsp;&nbsp;
							<?php endforeach; endif; unset($_from); ?>
						</p>
						<p id="departure_foreign_country" class="mt10"></p>
						<p id="departure_foreign_city" class="mt10"></p>
					</div>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th>扩展属性：</th>
				<td><input name="p_extension" type="text" size="50" value="<?php echo $this->_tpl_vars['products']['p_extension']; ?>
" /></td>
			</tr>
			<tr>
				<th>截止日期：</th>
				<td><input name="p_enddate" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_enddate']; ?>
" /></td>
			</tr>
			<tr>
				<th>发团时间：</th>
				<td><input name="p_departure_time" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_departure_time']; ?>
" /></td>
			</tr>
			<tr>
				<th>电话：</th>
				<td><input name="p_tel" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_tel']; ?>
" /></td>
			</tr>
			<tr>
				<th>旅游天数：</th>
				<td><input name="p_travel_days" type="text" size="10" value="<?php echo $this->_tpl_vars['products']['p_travel_days']; ?>
" /> 天</td>
			</tr>
			<tr>
				<th>市场价：</th>
				<td><input name="p_market_price" type="text" size="10" value="<?php echo $this->_tpl_vars['products']['p_market_price']; ?>
" /> 元</td>
			</tr>
			<tr>
				<th>参考价：</th>
				<td><input name="p_price" type="text" size="10" value="<?php echo $this->_tpl_vars['products']['p_price']; ?>
" /> 元</td>
			</tr>
			<tr>
				<th>关注度：</th>
				<td><input name="p_hot" type="text" size="10" value="<?php echo $this->_tpl_vars['products']['p_hot']; ?>
" /></td>
			</tr>
			<tr>
				<th>住宿标准：</th>
				<td><input name="p_stay" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_stay']; ?>
" /></td>
			</tr>
			<tr>
				<th>提前报名：</th>
				<td><input name="p_signup" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_signup']; ?>
" /></td>
			</tr>
			<tr>
				<th>往返交通：</th>
				<td><input name="p_transport" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_transport']; ?>
" /></td>
			</tr>
			<tr>
				<th>摘要：</th>
				<td><textarea name="p_detail" rows="5" cols="60"><?php echo $this->_tpl_vars['products']['p_detail']; ?>
</textarea></td>
			</tr>
			<tr>
				<th>图例：</th>
				<td colspan="3">
					<input id="file_upload" name="file_upload" type="file"/>
					<ul id="piclist" class="clearfix">
						<?php $_from = $this->_tpl_vars['pic_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['pic_list']):
?>
						<li id="<?php echo $this->_tpl_vars['pic_list']['picid']; ?>
"><img src="<?php echo $this->_tpl_vars['pic_list']['pic']; ?>
"/><p><span style="cursor:pointer">删除</span><input type="hidden" name="p_pics[]" value="<?php echo $this->_tpl_vars['pic_list']['pic']; ?>
"></p></li>
						<?php endforeach; endif; unset($_from); ?><!--img src="http://www.simcms.net/count/simcms.php" width="0" height="0"/-->
					</ul>
				</td>
			</tr>
			<tr>
				<th>线路属性：</th>
				<td><input type="checkbox" name="recommend" value="1" <?php if ($this->_tpl_vars['products']['recommend'] == 1): ?>checked<?php endif; ?>> 推荐 &nbsp;&nbsp;<input type="checkbox" name="recommend_home" value="1" <?php if ($this->_tpl_vars['products']['recommend_home'] == 1): ?>checked<?php endif; ?>> 首页推荐 &nbsp;&nbsp;<input type="checkbox" name="sp_recommend_home" value="1" <?php if ($this->_tpl_vars['products']['sp_recommend_home'] == 1): ?>checked<?php endif; ?>> 首页特别推荐 &nbsp;&nbsp;<input type="checkbox" name="promotions" value="1" <?php if ($this->_tpl_vars['products']['promotions'] == 1): ?>checked<?php endif; ?>> 促销线路 &nbsp;&nbsp;<input type="checkbox" name="ishot" value="1" <?php if ($this->_tpl_vars['products']['ishot'] == 1): ?>checked<?php endif; ?>> 当季热卖
				</td>
			</tr>
			<tr>
				<th>是否显示：</th>
				<td><input type="radio" name="is_show" value="1" <?php if ($this->_tpl_vars['products']['is_show'] == 1 || $this->_tpl_vars['products']['is_show'] == 0): ?>checked<?php endif; ?>/> 是 &nbsp;&nbsp;<input type="radio" name="is_show" value="2" <?php if ($this->_tpl_vars['products']['is_show'] == 2): ?>checked<?php endif; ?>/> 否
				</td>
			</tr>
			<tr>
				<th>行程特色：</th>
				<td height="350"><textarea class="ckeditor" cols="80" id="editor1" name="p_characteristic" rows="10"><?php echo $this->_tpl_vars['products']['p_characteristic']; ?>
</textarea></td>
			</tr>
			<tr>
				<th>费用说明：</th>
				<td height="350"><textarea class="ckeditor" cols="80" id="editor3" name="p_fees" rows="10"><?php echo $this->_tpl_vars['products']['p_fees']; ?>
</textarea></td>
			</tr>
			<tr>
				<th>签证须知：</th>
				<td height="350"><textarea class="ckeditor" cols="80" id="editor2" name="p_visa" rows="10"><?php echo $this->_tpl_vars['products']['p_visa']; ?>
</textarea></td>
			</tr>
			<tr>
				<th>温馨提示：</th>
				<td height="350"><textarea class="ckeditor" cols="80" id="editor6" name="p_tips" rows="10"><?php echo $this->_tpl_vars['products']['p_tips']; ?>
</textarea></td>
			</tr>
			<tr>
				<th>模版：</th>
				<td><input name="p_tpl" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_tpl']; ?>
" /></td>
			</tr>
			<tr>
				<th>静态页面名称：</th>
				<td><input name="p_page" type="text" size="30" value="<?php echo $this->_tpl_vars['products']['p_page']; ?>
" /> <span class="gray">可不填写</span></td>
			</tr>
			<tr>
				<th></th>
				<td>
					<div class="buttons">
						<input type="submit" name="thevaluesubmit" value="提交保存" class="submit">
						<input type="hidden" name="ac" value="<?php echo $this->_tpl_vars['ac']; ?>
">
						<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['products']['p_id']; ?>
">
						<input type="reset" name="thevaluereset" value="重置">
					</div>
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>