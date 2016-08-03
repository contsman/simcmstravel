<?php
if (!defined('APP_IN')) exit('Access Denied');
// 当前模块
$mod_name = '权限管理';
// 允许操作
$ac_arr = array('list' => '权限列表', 'add' => '添加权限', 'edit' => '编辑权限', 'del' => '删除权限');
// 当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

// 列表
if ($ac == 'list') {
	$permission = $db -> row_select('permission');
	$permissionlist = "";
	foreach ($permission as $value) {
		if ($value['pid'] != 0) continue;
		$permissionlist .= "<tr>";
		$permissionlist .= "<td align='center'>{$value['id']}</td>";
		$permissionlist .= "<td align='left'>{$value['name']}</td>";
		$permissionlist .= "<td>&nbsp;</td>";
		$permissionlist .= "<td>&nbsp;</td>";
		$permissionlist .= "<td style='text-align:left;padding-left:20px;'><a href=".ADMIN_PAGE."?mod=permission&ac=edit&id={$value['id']}'>修改</a>&nbsp;&nbsp;&nbsp;&nbsp;";
		$permissionlist .= "<a href=".ADMIN_PAGE."?mod=permission&ac=del&id={$value['id']}' onclick=\"return confirm('确定要删除吗？');\">删除</a>&nbsp;&nbsp;&nbsp;&nbsp";
		$permissionlist .= "<a href=".ADMIN_PAGE."?mod=permission&ac=add&pid={$value['id']}'>添加子项</a></td></tr>";
		foreach ($permission as $val) {
			if ($value['id'] != $val['pid']) continue;
			$permissionlist .= "<tr>";
			$permissionlist .= "<td align='center'>{$val['id']}</td>";
			$permissionlist .= "<td align='left'> ├─ {$val['name']}</td>";
			$permissionlist .= "<td>&nbsp;</td>";
			$permissionlist .= "<td>&nbsp;</td>";
			$permissionlist .= "<td style='text-align:left;padding-left:20px;'><a href=".ADMIN_PAGE."?mod=permission&ac=edit&id={$val['id']}'>修改</a>&nbsp;&nbsp;&nbsp;&nbsp;";
			$permissionlist .= "<a href=".ADMIN_PAGE."?mod=permission&ac=del&id={$val['id']}' onclick=\"return confirm('确定要删除吗？');\">删除</a>&nbsp;&nbsp;&nbsp;&nbsp;";
			$permissionlist .= "<a href=".ADMIN_PAGE."?mod=permission&ac=add&pid={$val['id']}'>添加子项</a></td></tr>";
			foreach ($permission as $v) {
				if ($val['id'] != $v['pid']) continue;
				if ($v['ac'] == '') $v['ac'] = '&nbsp;';
				$permissionlist .= "<tr>";
				$permissionlist .= "<td align='center'>{$v['id']}</td>";
				$permissionlist .= "<td align='left'> ├─  ├─ {$v['name']}</td>";
				$permissionlist .= "<td align='center'>{$v['mod']}</td>";
				$permissionlist .= "<td align='center'>{$v['ac']}</td>";
				$permissionlist .= "<td style='text-align:left;padding-left:20px;'><a href=".ADMIN_PAGE."?mod=permission&ac=edit&id={$v['id']}'>修改</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				$permissionlist .= "<a href=".ADMIN_PAGE."?mod=permission&ac=del&id={$v['id']}' onclick=\"return confirm('确定要删除吗？');\">删除</a></td></tr>";
			} 
		} 
	} 
	$tpl -> assign('permissionlist', $permissionlist);
	$tpl -> display('admin/permission_list.html');
	exit;
} 
// 单条删除
elseif ($ac == 'del') {
	$id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID', -1);
	$count = $db -> row_count('permission', "pid=$id");
	if ($count) showmsg('请删除此项下所有子项后再尝试', -1);
	$rs = $db -> row_delete('permission', "id=$id");
} 
// 添加
elseif ($ac == 'add' || $ac == 'edit') {
	// 添加或修改
	if (submitcheck('ac')) {
		$post['name'] = post('name');
		if (isset($_POST['mod_v'])) $post['mod'] = post('mod_v');
		if (isset($_POST['ac_v'])) $post['ac'] = post('ac_v');
		if (!empty($_POST['pid'])) $post['pid'] = intval($_POST['pid']);

		if ($ac == 'add') $rs = $db -> row_insert('permission', $post);
		else $rs = $db -> row_update('permission', $post, "id=" . intval($_POST['id']));
	} 
	// 转向添加或修改页面
	else {
		if (!empty($_GET['pid'])) {
			$pid = intval($_GET['pid']);
			if ($pid == 0) $type = 1;
			else {
				$rs = $db -> row_select_one('permission', "id=$pid");
				if (!$rs) showmsg('错误的PID', -1);
				if ($rs['pid'] == 0) $type = 1;
				else $type = 2;
			} 
			$data = array('id' => '', 'pid' => $pid, 'name' => '', 'mod' => '', 'ac' => '');
		} elseif (!empty($_GET['id'])) {
			$id = intval($_GET['id']);
			$data = $db -> row_select_one('permission', "id=$id");
			if (!$data) showmsg('错误的ID', -1);
			if ($data['pid'] == 0) $type = 1;
			else {
				$rs = $db -> row_select_one('permission', "id={$data['pid']}");
				if (!$rs) showmsg('错误的PID', -1);
				if ($rs['pid'] == 0) $type = 1;
				else $type = 2;
			} 
		} else {
			$type = 1;
			$data = array('id' => '', 'pid' => '', 'name' => '', 'mod' => '', 'ac' => '');
		} 
		$tpl -> assign('type', $type);
		$tpl -> assign('permission', $data);
		$tpl -> display('admin/add_permission.html');
		exit;
	} 
} 
// 默认操作
else {
	showmsg('非法操作', -1);
} 

showmsg($ac_arr[$ac] . ($rs ? '成功' : '失败'), ADMIN_PAGE."?mod=$mod&ac=list");

?>