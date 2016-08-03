<?php
if (!defined('APP_IN')) exit('Access Denied');
// 当前模块
$mod_name = '订单管理';
// 允许操作
$ac_arr = array('list' => '订单列表', 'add' => '添加订单', 'edit' => '编辑订单', 'del' => '删除订单', 'bulkdel' => '批量删除');
// 当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl -> assign('mod_name', $mod_name);
$tpl -> assign('ac_arr', $ac_arr);
$tpl -> assign('ac', $ac);
// 列表
if ($ac == 'list') {
	include(INC_DIR . 'Page.class.php');
	$Page = new Page($db -> tb_prefix . 'order', '1=1', '*', '20', 'id desc');
	$list = $Page -> get_data();
	foreach($list as $key => $value) {
		$line = $db -> row_select_one('products', "p_id=" . $value['pid']);
		if(!empty($value['uid'])){
			$member = $db -> row_select_one('member', "id=" . $value['uid']);
			$list[$key]['turename'] = $member['turename'];
			$list[$key]['tel'] = $member['tel'];
		}

		$list[$key]['p_no'] = $line['p_no'];
		$list[$key]['p_title'] = $line['p_title'];
		$time_dir = date('Ym', $line['p_addtime']);
		$list[$key]['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $line['p_page'];
		$list[$key]['addtime'] = date('Y-m-d H:i:s', $value['addtime']);
		$list[$key]['departure_date'] = date('Y-m-d', $value['departure_date']);
	} 
	$button_basic = $Page -> button_basic();
	$button_select = $Page -> button_select();
	$tpl -> assign('orderlist', $list);
	$tpl -> assign('button_basic', $button_basic);
	$tpl -> assign('button_select', $button_select);
	$tpl -> display('admin/order_list.html');
	exit;
} 
// 单条删除
elseif ($ac == 'del') {
	$id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID', -1);
	$rs = $db -> row_delete('order', "id=$id");
} 
// 批量删除
elseif ($ac == 'bulkdel') {
	if (empty($_POST['bulkid'])) showmsg('没有选中任何项', -1);
	$str_id = return_str_id($_POST['bulkid']);
	$rs = $db -> row_delete('order', "id in($str_id)");
} 
// 添加
elseif ($ac == 'edit') {
	$data = $db -> row_select_one('order', "id=" . intval($_GET['id']));
	$line = $db -> row_select_one('products', "p_id=" . $data['pid']);
	$member = $db -> row_select_one('member', "id=" . $data['uid']);
	$data['all_nums'] = $data['adult_nums'] + $data['children_nums'];
	$data['p_no'] = $line['p_no'];
	$data['p_title'] = $line['p_title'];
	$data['email'] = $member['email'];
	$data['turename'] = $member['turename'];
	$data['tel'] = $member['tel'];
	$time_dir = date('Ym', $line['p_addtime']);
	$data['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $line['p_page'];
	$tpl -> assign('order', $data);
	$tpl -> display('admin/add_order.html');
	exit;
} 
// 默认操作
else {
	showmsg('非法操作', -1);
} 

showmsg($ac_arr[$ac] . ($rs ? '成功' : '失败'), ADMIN_PAGE."?mod=$mod&ac=list");

?>