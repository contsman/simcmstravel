<?php
if (!defined('APP_IN')) exit('Access Denied');
// 当前模块
$mod_name = '系统设置';
// 允许操作
$ac_arr = array('web' => '系统基本设置', 'contact' => '联系方式设置');
// 当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl -> assign('mod_name', $mod_name);
$tpl -> assign('ac_arr', $ac_arr);
$tpl -> assign('ac', $ac);

if (submitcheck('ac')) {
	$post = post('sitename', 'title', 'keywords', 'description', 'copyright', 'icp', 'address', 'postcode', 'fax', 'tel', 'email','htmldir','templates','water','isdstimg','imgwidth','imgheight');

	foreach ($post as $k => $v) {
		if (!in_array($k, array('smtp_port', 'smtp_password'))) {
			$post[$k] = htmlspecialchars($v);
		} elseif ($k == 'smtp_port') $post[$k] = intval($v);
		$rs = $db -> row_update('settings', array('v' => $v), "k='{$k}'");
		if (!$rs) showmsg("更新系统配置 {$k} 失败", -1);
	} 
	showmsg("更新" . $ac_arr[$ac] . "成功", ADMIN_PAGE."?mod=$mod&ac=$ac");
} 

$data = settings();

$dir = "./templates/default/";
$array_temdir = array();
if (is_dir($dir)) {
     if ($dh = opendir($dir)) {
         while (($file = readdir($dh)) !== false) {
             if(is_dir($dir . $file)) {
              $array_temdir[] = $file;
            }
         }
        closedir($dh);
     }
}
$arr_tem = array();

foreach($array_temdir as $key => $value){
	$pos = strpos($value,".");
	if($pos === false){
		$arr_tem[$value] = $value;
	}
}

$select_templates = select_make($data['templates'],$arr_tem);
$tpl -> assign('selecttemplates', $select_templates);

$tpl -> assign('setting', $data);

$tpl -> display('admin/add_setting.html');

?>