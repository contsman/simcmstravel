<?php
if (!defined('APP_IN')) exit('Access Denied');
// 当前模块
$mod_name = '线路分类管理';
// 允许操作
$ac_arr = array('list' => '分类列表', 'add' => '添加分类', 'edit' => '编辑分类', 'del' => '删除分类', 'bulkdel' => '批量删除', 'bulksort' => '更新排序');
// 当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

/**
 * 递归删除栏目
 * @param  $catid 要删除的栏目id
 */
function delete_child($catid) {
	global $db;
	$catid = intval($catid);
	if (empty($catid)) return false;
	$list = $db -> row_select('products_category', "parentid=" . $catid);
	if ($list) {
		foreach($list as $key => $value){
			delete_child($value['catid']);
			$db -> row_delete('products_category', "catid=".$value['catid']);
		}
	} 
	return true;
} 

// 列表
if ($ac == 'list') { 
	$str = "<tr>
				<td align='center'><input type='checkbox' name='bulkid[]' value='\$catid'></td>
				<td align='center'><input type='text' size='5' name='listorder[\$catid]' value='\$listorder' class='ip01'></td>
				<td align='left'>\$spacer \$catname \$recommendname</td>
				<td align='center' width='150'><a href='".ADMIN_PAGE."?mod=products_category&ac=add&parentid=\$catid'>添加子分类</a> | <a href='".ADMIN_PAGE."?mod=products_category&ac=edit&id=\$catid'>编辑</a> | <a href='".ADMIN_PAGE."?mod=products_category&ac=del&id=\$catid'>删除</a></td>
			</tr>";
	$tree -> init($commoncache['products_category']);
	$tree -> icon = array('│', '├─ ', '└─ ');
	$tree -> nbsp = '&nbsp;&nbsp;&nbsp;';
	$categorys = $tree -> get_tree(0, $str);
	$tpl -> assign('sortlist', $categorys);
	$tpl -> display('admin/products_category_list.html');
	exit;
} 
// 单条删除
elseif ($ac == 'del') {
	$catid = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID', -1);
	delete_child($catid);
	$rs = $db -> row_delete('products_category', "catid=$catid");
	$fzz = new fzz_cache;
	$fzz->clear_all();
}
// 批量排序
elseif ($ac == 'bulksort') {
	if (empty($_POST['bulkid'])) showmsg('没有选中任何项', -1);
	foreach ($_POST['bulkid'] as $k => $v) {
		$rs = $db -> row_update('products_category', array('listorder' => $_POST['listorder'][$v]), "catid=" . intval($v));
	} 
} 
// 添加
elseif ($ac == 'add' || $ac == 'edit') {
	// 添加或修改
	if (submitcheck('ac')) {
		$arr_not_empty = array('catname' => '分类名称不可为空');
		can_not_be_empty($arr_not_empty, $_POST);
		$post = post('catname', 'parentid', 'url', 'isshow','recommend');

		if(empty($post['recommend'])) $post['recommend']=0;

		if ($ac == 'add') {
			$post['listorder'] = !empty($post['listorder']) ? intval($post['listorder']) : 0;
			$rs = $db -> row_insert('products_category', $post);
		} else {
			$rs = $db -> row_update('products_category', $post, "catid=" . intval($_POST['id']));
		} 
		$fzz = new fzz_cache;
		$fzz->clear_all();
	} 
	// 转向添加或修改页面
	else {
		if (empty($_GET['id'])) {
			$data = array('catid' => '', 'parentid' => '', 'catname' => '', 'isshow' => '', 'url' => '','recommend'=>'');
		} else {
			$data = $db -> row_select_one('products_category', "catid=" . intval($_GET['id']));
		} 
		$parentid = isset($_GET['parentid']) ? $_GET['parentid'] : $data['parentid'];

		$select_category = select_category('products_category',$parentid, 'name="parentid" id="parentid"', '-作为一级分类-', $data['parentid']);

		$tpl -> assign('selectcategory', $select_category);

		$tpl -> assign('category', $data);
		$tpl -> assign('ac', $ac);
		$tpl -> display('admin/add_products_category.html');
		exit;
	} 
} 
// 默认操作
else {
	showmsg('非法操作', -1);
} 

showmsg($ac_arr[$ac] . ($rs ? '成功' : '失败'), ADMIN_PAGE."?mod=$mod&ac=list");

?>