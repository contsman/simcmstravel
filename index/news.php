<?php
/*
 本软件版权归作者所有,在投入使用之前注意获取许可
 作者：北京市普艾斯科技有限公司
 项目：simcms_锐游1.0
 电话：010-58480317
 网址：http://www.simcms.net
 simcms.net保留全部权力，受相关法律和国际		  		
 公约保护，请勿非法修改、转载、散播，或用于其他赢利行为，并请勿删除版权声明。
*/
if (!defined('APP_IN')) exit('Access Denied');

$catid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;

$tree -> init($commoncache['news_category']);

$where = "1=1";
$childs = $tree -> get_allchild($catid);
if ($childs) {
	$child_ids = implode(',', $childs);
	$where = "catid in (" . $child_ids . ")";
} else {
	$where = "catid =" . $catid;
} 
if (!empty($_GET['keywords'])) {
	$where .= " AND `p_title` like '%" . urldecode($_GET['keywords']) . "%'";
} 

$array_category = array_category('news_category');
$tpl -> assign('catname', $array_category[$catid]);


include(INC_DIR . 'Page.class.php');
$Page = new Page($db -> tb_prefix . 'news', $where, '*', '30','n_addtime desc');
$list = $Page -> get_data();
foreach($list as $key => $value) {
	$list[$key]['n_addtime'] = date('Y-m-d H:i:s', $value['n_addtime']);
	$time_dir = date('Ym', $value['n_addtime']);
	$list[$key]['n_url'] = WEB_URL . "/" . HTML_DIR . "news/" . $time_dir . "/" . $value['n_id'].".html";
} 
$button_basic = $Page -> button_basic_html('list_' . $catid . '_{page}.html');
$tpl -> assign('newslist', $list);
$tpl -> assign('page_list', $button_basic);
$tpl -> display('default/'.$settings['templates'].'/news_list.html');

?>