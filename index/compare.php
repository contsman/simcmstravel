<?php
/*
*/
if (!defined('APP_IN')) exit('Access Denied');

if(empty($_GET['id'])) showmsg('没有选中任何项',-1);

$ids = explode(",",$_GET['id']);

$lines = array();

foreach($ids as $k => $v){
	$line = $db -> row_select_one('products','p_id='.$v,'p_id,p_title,p_price,p_travel_days,p_characteristic,p_departure_city,p_addtime,p_page');
	if(!empty($line['p_departure_city'])){
		$city = $db -> row_select_one('area', "id=" . $line['p_departure_city'], 'name');
		//出发城市
		$line['p_departure_city'] = $city['name'];
	}

	$line['time_dir'] = date('Ym', $line['p_addtime']);
	
	//url
	$time_dir = date('Ym', $line['p_addtime']);
	$line['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $line['p_page']; 
	//行程天数
	$line['p_travel_days'] = $line['p_travel_days']."天";
	//价格
	$line['p_price'] = "<span class='f14 orange01 fb'>￥".$line['p_price']."元</span>";
	//行程特色
	$line['p_characteristic'] = htmlspecialchars_decode($line['p_characteristic']);
	// 出发日期
	$datelist = $db -> row_select('departure_time', "pid=" . $line['p_id'], 'id,departure_time');
	$line['datelist'] = "";
	foreach($datelist as $k => $v) {
		$datelist[$k]['departure_time'] = date('Y-m-d', $v['departure_time']);
		$line['datelist'] .= date('Y-m-d', $v['departure_time'])."&nbsp;&nbsp;";
	} 
	//详细行程
	$trip_list = $db -> row_select('trip','pid='.$line['p_id'],'*',0,'orderid');
	foreach($trip_list as $key => $value){
		$trip_list[$key]['info'] = htmlspecialchars_decode($value['info']);
		$trip_list[$key]['scenicinfo'] = htmlspecialchars_decode($value['scenicinfo']);
	}
	$line['p_trip'] = $trip_list;
	$lines[] = $line;
}
$linelist = array();
foreach($lines as $key => $value){
	$linelist['p_title'][0] = "线路名称";
	$linelist['p_title'][] = "<p><a href='".WEB_PATH."/line/".$value['time_dir']."/".$value['p_page']."' target='_blank' class='blue'>".$value['p_title']."</a></p><p><a href='".WEB_PATH."/line/".$value['time_dir']."/".$value['p_page']."' target='_blank' class='selectmenu'>我选择此线路</a></p>";
	$linelist['p_price'][0] = "价格";
	$linelist['p_price'][] = $value['p_price'];
	$linelist['p_travel_days'][0] = "行程天数";
	$linelist['p_travel_days'][] = $value['p_travel_days'];
	$linelist['p_departure_city'][0] = "出发城市";
	$linelist['p_departure_city'][] = $value['p_departure_city'];
	$linelist['p_departure_date'][0] = "出发日期";
	$linelist['p_departure_date'][] = $value['datelist'];
	$linelist['p_characteristic'][0] = "路线特色";
	$linelist['p_characteristic'][] = $value['p_characteristic'];
	foreach($value['p_trip'] as $k => $v){
		$linelist['p_trip'.$k][0] = "详细行程<br>（第".($k+1)."天）";
		$linelist['p_trip'.$k][]  = "<p><span class='blue'>".$v['title']."</span></p><p>".$v['info']."</p><p>今日游览景点：".$v['scenictitle']."</p><p>".$v['scenicinfo']."</p>";
	}
}
$tpl -> assign('linelist', $linelist);
$tpl -> display('default/'.$settings['templates'].'/compare.html');
?>