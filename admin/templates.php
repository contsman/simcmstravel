<?php
if (!defined('APP_IN')) exit('Access Denied');
// 当前模块
$mod_name = '模版管理';
// 允许操作
$ac_arr = array('list' => '模版列表', 'add' => '添加模版', 'edit' => '编辑模版', 'del' => '删除模版', 'bulkdel' => '批量删除', 'bulkedit' => '批量修改');
// 当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl -> assign('mod_name', $mod_name);
$tpl -> assign('ac_arr', $ac_arr);
$tpl -> assign('ac', $ac);
// 列表
if ($ac == 'list') {
	$dirname = isset($_GET['dir']) ? $_GET['dir'] : '';
	if (!empty($dirname)) {
		$dir = "templates/default/" . $dirname . "/";
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				$i = 0;
				while (($file = readdir($dh)) !== false) {
					$filetype = filetype($dir . $file);
					if ($filetype != "dir" and $file != "config.php") {
						$list[$i]['name'] = $file;
						$configflie = $dir . "config.php";
						if (file_exists($configflie)) {
							$config = require($configflie);
							if (!empty($config['file_explan'][$file])) {
								$list[$i]['detail'] = $config['file_explan'][$file];
							} 
						} 
					} 
					$i++;
				} 
				closedir($dh);
			} 
		} 

		$tpl -> assign('templateslist', $list);
		$tpl -> assign('dir', $dirname);
		$tpl -> display('admin/templates_list.html');
	} 
	exit;
}
// 批量修改
elseif ($ac == 'bulkedit') {
	if (empty($_POST['bulkid'])) showmsg('没有选中任何项', -1);
	foreach ($_POST['bulkid'] as $k => $v) {
		$rs = $db -> row_update('templates', array('name' => $_POST['name'][$v]), "id=" . intval($v));
	} 
} 
// 添加
elseif ($ac == 'add' || $ac == 'edit') {
	// 添加或修改
	if (submitcheck('ac')) {
		if ($ac == 'add') {
			$rs = $db -> row_insert('templates', $post);
		} else {
			$file = "templates/default/default/" . $_POST['filename'];
			$code =stripslashes($_POST['code']);
			$fp = fopen($file, "w");
			fwrite($fp, $code);
			fclose($fp);
			showmsg('修改成功', ADMIN_PAGE."?mod=$mod&ac=list&dir=".$_POST['dir']);
			exit;
		} 
	} 
	// 转向添加或修改页面
	else {
		if (empty($_GET['filename'])) {
			$data = array('name'=>'','code'=>'');
		}
		else{
			$file = "templates/default/default/" . $_GET['filename'];
			if(!file_exists($file)){showmsg('文件不存在',-1);}
			$data['code'] = file_get_contents($file);
			$data['filename'] = $_GET['filename'];
			
		}
		$tpl -> assign('dir', $_GET['dir']);
		$tpl -> assign('templates', $data);
		$tpl -> assign('ac', $ac);
		$tpl -> display('admin/add_templates.html');
		exit;
	} 
} 
// 默认操作
else {
	showmsg('非法操作', -1);
} 

showmsg($ac_arr[$ac] . ($rs ? '成功' : '失败'), ADMIN_PAGE."?mod=$mod&ac=list&dir=".$dir);

?>