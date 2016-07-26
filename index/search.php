<?php
/*
*/
if (!defined('APP_IN')) exit('Access Denied');
include('page.php');

$where = "is_show=1";
// 清除cookie
if (isset($_GET['s_type']) and $_GET['s_type'] == 1) {
	setMyCookie("catid", '', time() - COOKIETIME);
	setMyCookie("startprice", '', time() - COOKIETIME);
	setMyCookie("endprice", '', time() - COOKIETIME);
	setMyCookie("startday", '', time() - COOKIETIME);
	setMyCookie("endday", '', time() - COOKIETIME);
	setMyCookie("keywords", '', time() - COOKIETIME);
	setMyCookie("order", '', time() - COOKIETIME);
	setMyCookie("departure_cid", '', time() - COOKIETIME);
	setMyCookie("departure_city", '', time() - COOKIETIME);
	setMyCookie("departure_date", '', time() - COOKIETIME);
	setMyCookie("arrival_city", '', time() - COOKIETIME);
} 
// 出发地
if (isset($_GET['departure_city']) and $_GET['departure_city'] != "" and $_GET['departure_city'] != "出发地") {
	$array_city = arr_city();
	$departure_cid = $array_city[$_GET['departure_city']];
	setMyCookie("departure_cid", $departure_cid, time() + COOKIETIME);
	setMyCookie("departure_city", $_GET['departure_city'], time() + COOKIETIME);
} elseif (isset($_GET['departure_city']) and $_GET['departure_city'] == "") {
	setMyCookie("departure_cid", '', time() - COOKIETIME);
	setMyCookie("departure_city", '', time() - COOKIETIME);
} 
if (!empty($_COOKIE['departure_cid'])) {
	$where .= " AND p_departure_city=" . $_COOKIE['departure_cid'];
} 
// 出发日期
if (isset($_GET['departure_date']) and $_GET['departure_date'] != "" and $_GET['departure_city'] != "出发日期") {
	$departure_date = strtotime($_GET['departure_date']);
	setMyCookie("departure_date", $departure_date, time() + COOKIETIME);
} elseif (isset($_GET['departure_date']) and $_GET['departure_date'] == "") {
	setMyCookie("departure_date", '', time() - COOKIETIME);
} 
if (!empty($_COOKIE['departure_date'])) {
	$where .= " AND p_id in (select pid from travel_departure_time where departure_time =" . $_COOKIE['departure_date'] . ")";
} 
// 目的地
if (isset($_GET['arrival_city_en']) and $_GET['arrival_city_en'] != "" and $_GET['arrival_city_en'] != "目的地") {
	setMyCookie("arrival_city", $_GET['arrival_city_en'], time() + COOKIETIME);
} elseif (isset($_GET['arrival_city']) and $_GET['arrival_city'] != "" and $_GET['arrival_city'] != "目的地") {
	setMyCookie("arrival_city", $_GET['arrival_city'], time() + COOKIETIME);
} elseif ((isset($_GET['arrival_city']) and $_GET['arrival_city'] == "") or (isset($_GET['arrival_city_en']) and $_GET['arrival_city_en'] == "")) {
	setMyCookie("arrival_city", '', time() - COOKIETIME);
} 
if (!empty($_COOKIE['arrival_city'])) {
	$where .= " AND (`p_keywords` like '%" . $_COOKIE['arrival_city'] . "%')";
} 

// 关键字
if (isset($_GET['keywords']) and $_GET['keywords'] != "" and $_GET['keywords'] != "关键词") {
	setMyCookie("keywords", $_GET['keywords'], time() + COOKIETIME);
} elseif (isset($_GET['keywords']) and $_GET['keywords'] == "") {
	setMyCookie("keywords", '', time() - COOKIETIME);
} 
if (!empty($_COOKIE['keywords'])){
	$where .= " AND (`p_keywords` like '%" . $_COOKIE['keywords'] . "%' or p_title like '%" . $_COOKIE['keywords'] . "%')";
} 
// 价格
if (isset($_GET['price']) and $_GET['price'] != "" and $_GET['price'] != "价格区间"){
	if($_GET['price']=="2000以内"){
		$_GET['startprice'] = 0;
		$_GET['endprice'] = 2000;
	}
	elseif($_GET['price']=="20000以上"){
		$_GET['startprice'] = 20000;
		$_GET['endprice'] = 10000000;
	}
	else{
		$price = explode('-', $_GET['price']);
		$_GET['startprice'] = $price[0];
		$_GET['endprice'] = $price[1];
	}
} 

if (isset($_GET['startprice'])) {
	setMyCookie("startprice", intval($_GET['startprice']), time() + 3600);
} 
if (isset($_GET['endprice'])) {
	setMyCookie("endprice", intval($_GET['endprice']), time() + 3600);
} 

if (isset($_COOKIE['startprice']) and $_COOKIE['startprice'] == 0 and isset($_COOKIE['endprice']) and $_COOKIE['endprice'] == 0) {
	setMyCookie("startprice", '', time()-3600);
	setMyCookie("endprice", '', time()-3600);
} 

if (isset($_GET['startprice']) and isset($_GET['endprice']) and ($_COOKIE['startprice'] + $_COOKIE['endprice'] != 0)) {
	$where .= " and p_price >= " . $_COOKIE['startprice'] . " and p_price < " . $_COOKIE['endprice'];
} 

// 类型
if (isset($_GET['catid']) and $_GET['catid'] != 0) {
	setMyCookie("catid", intval($_GET['catid']), time() + COOKIETIME);
} elseif (isset($_GET['catid']) and $_GET['catid'] == 0) {
	setMyCookie("catid", '', time() - COOKIETIME);
} 
if (!empty($_COOKIE['catid'])) {
	$where .= " and catid = " . $_COOKIE['catid'];
} 
// 价格
if (isset($_GET['startprice'])) {
	setMyCookie("startprice", intval($_GET['startprice']), time() + COOKIETIME);
} 
if (isset($_GET['endprice'])) {
	setMyCookie("endprice", intval($_GET['endprice']), time() + COOKIETIME);
} 
if (isset($_COOKIE['startprice']) and $_COOKIE['startprice'] == 0 and isset($_COOKIE['endprice']) and $_COOKIE['endprice'] == 0) {
	setMyCookie("startprice", '', time() - COOKIETIME);
	setMyCookie("endprice", '', time() - COOKIETIME);
} 

if (isset($_COOKIE['startprice']) and isset($_COOKIE['endprice']) and ($_COOKIE['startprice'] + $_COOKIE['endprice'] != 0)) {
	$where .= " and p_price > " . $_COOKIE['startprice'] . " and p_price <= " . $_COOKIE['endprice'];
} 
// 天数
if (isset($_GET['startday'])) {
	setMyCookie("startday", intval($_GET['startday']), time() + COOKIETIME);
} 
if (isset($_GET['endday'])) {
	setMyCookie("endday", intval($_GET['endday']), time() + COOKIETIME);
} 
if (isset($_COOKIE['startday']) and $_COOKIE['startday'] == 0 and isset($_COOKIE['endday']) and $_COOKIE['endday'] == 0) {
	setMyCookie("startday", '', time() - COOKIETIME);
	setMyCookie("endday", '', time() - COOKIETIME);
} 

if (isset($_COOKIE['startday']) and isset($_COOKIE['endday']) and ($_COOKIE['startday'] + $_COOKIE['endday'] != 0)) {
	$where .= " and p_travel_days > " . $_COOKIE['startday'] . " and p_travel_days <= " . $_COOKIE['endday'];
} 
// 排序
if (isset($_GET['order'])) {
	setMyCookie("order", $_GET['order'], time() + COOKIETIME);
} else {
	setMyCookie("order", 1, time() + COOKIETIME);
} 
$orderby = "";
if (!empty($_COOKIE['order'])) {
	switch ($_COOKIE['order']) {
		case 1:
			$orderby = "p_addtime desc";
			break;
		case 2:
			$orderby = "p_addtime";
			break;
		case 3:
			$orderby = "p_price desc";
			break;
		case 4:
			$orderby = "p_price";
			break;
	} 
} 

include(INC_DIR . 'Page.class.php');
$Page = new Page($db -> tb_prefix . 'products', $where, '*', '16' , $orderby);
$list = $Page -> get_data();
$datelist = array();
foreach($list as $key => $value) {
	if (!empty($value['p_pics'])) {
		$pic = explode('.', $value['p_pics']);
		$list[$key]['smallpic'] = str_replace('upload/upload', 'upload/small', $pic[0]) . ".jpg";
	} 
	$list[$key]['p_short_title'] = _substr($value['p_title'], 0, 36);
	$list[$key]['p_short_title2'] = _substr($value['p_title2'], 0, 36);
	$list[$key]['p_detail'] = _substr($value['p_detail'], 0, 100);
	if(!empty($value['p_departure_city'])){
		$city = $db -> row_select_one('area', "id=" . $value['p_departure_city'], 'name');
		$list[$key]['city'] = $city['name'];
	}
	$time_dir = date('Ym', $value['p_addtime']);
	$list[$key]['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $value['p_page']; 
	// 出发日期
	$datelist = $db -> row_select('departure_time', "pid=" . $value['p_id'], 'id,departure_time');
	foreach($datelist as $k => $v) {
		$datelist[$k]['departure_time'] = date('Y-m-d', $v['departure_time']);
	} 
	$list[$key]['datelist'] = $datelist;
} 
$button_basic = $Page -> button_basic();
$button_select = $Page -> button_select();
$tpl -> assign('button_basic', $button_basic);
$tpl -> assign('button_select', $button_select);
$tpl -> assign('line_list', $list);
$tpl -> display('default/' . $settings['templates'] . '/search.html');

?>