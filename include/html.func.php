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
/**
 * 生成静态函数库
 */
// 生成首页
function html_index() {
	global $db, $tpl,$settings;
	$tpl->assign( 'menustate', '1');

	//城市数组
	$tpl->assign( 'citylist_zh', arr_city());

	//国外城市数组
	$tpl->assign( 'citylist_en', arr_country());
	
	//首页推荐出境游
	$cj_linelist = get_line("is_show=1 and catid=2 and recommend_home=1",'7');
	$tpl->assign( 'linelist_cj', $cj_linelist);

	//出境游特别推荐
	$sp_linelist01 = get_home_comline("catid=2");
	$tpl->assign( 'splinelist01', $sp_linelist01);

	//首页推荐国内游
	$gn_linelist = get_line("is_show=1 and catid=1 and recommend_home=1",'7');
	$tpl->assign( 'linelist_gn', $gn_linelist);

	//国内游特别推荐
	$sp_linelist02 = get_home_comline("catid=1");
	$tpl->assign( 'splinelist02', $sp_linelist02);

	//首页推荐自由行
	$zyx_linelist = get_line("is_show=1 and p_extension like '%自由行%'",'7');
	$tpl->assign( 'linelist_zyx', $zyx_linelist);

	//自由行特别推荐
	$sp_linelist03 = get_home_comline("p_extension like '%自由行%'");
	$tpl->assign( 'splinelist03', $sp_linelist03);

	
	//首页推荐签证
	$tpl->assign( 'comvisalist', recom_visa());

	//幻灯片
	$tpl->assign( 'filmlist', get_filmstrip());
	//新闻
	$tpl->assign( 'newslist01', get_comnews(61,6));
	$tpl->assign( 'newslist02', get_comnews(53,6));

	//友情链接
	$tpl->assign( 'flinklist', get_flink());
	
	$indexhtml = $tpl -> fetch('default/'.$settings['templates'].'/index.html');
	$fp = fopen("index.html", "w");
	fwrite($fp, $indexhtml);
	fclose($fp);
	return true;
} 
// 生成频道页
function html_channel($catid) {
	global $db, $tpl , $settings;

	$tpl->assign( 'catid', $catid);

	if($catid==1){
		$tpl->assign( 'menustate', '2');
		$tpl->assign( 'catname', '出境游');
		//当季热卖
		$tpl->assign( 'hotlist', get_hotline('catid=2'));
		//分类列表
		$sortlist = $db -> row_select('products_category', "isshow=1 and parentid=55", 'catid,catname', 0, 'listorder asc');
		foreach($sortlist as $key => $value){
			$linelist = get_line("is_show=1 and p_keywords like '%".$value['catname']."%'",0);
			foreach($linelist as $k => $v){
				$linelist[$k]['keywords'] = $v['p_title'];
				// 出发日期
				$datelist = $db -> row_select('departure_time', "pid=" . $v['p_id'], 'id,departure_time');
				foreach($datelist as $sk => $sv) {
					$datelist[$sk]['departure_time'] = date('Y-m-d', $sv['departure_time']);
				} 
				$linelist[$k]['datelist'] = $datelist;
			}
			$sortlist[$key]['keywords'] = urlencode($value['catname']);
			$sortlist[$key]['linelist'] = $linelist;
		}
		$tpl->assign( 'sort_list', $sortlist);
		$indexhtml = $tpl -> fetch('default/'.$settings['templates'].'/channel_01.html');
		if (!is_dir(HTML_DIR."outbound")) createFolder(HTML_DIR.'outbound');
		$fp = fopen("outbound/index.html", "w");
		fwrite($fp, $indexhtml);
		fclose($fp);
	}
	elseif($catid==2){
		$tpl->assign( 'menustate', '3');
		$tpl->assign( 'catname', '国内游');
		//当季热卖
		$tpl->assign( 'hotlist', get_hotline('catid=1'));
		//分类列表
		$sortlist = $db -> row_select('products_category', "isshow=1 and parentid=58", 'catid,catname', 0, 'listorder asc');
		foreach($sortlist as $key => $value){
			$linelist = get_line("is_show=1 and p_keywords like '%".$value['catname']."%'",0);
			foreach($linelist as $k => $v){
				$linelist[$k]['keywords'] = $v['p_title'];
				// 出发日期
				$datelist = $db -> row_select('departure_time', "pid=" . $v['p_id'], 'id,departure_time');
				foreach($datelist as $sk => $sv) {
					$datelist[$sk]['departure_time'] = date('Y-m-d', $sv['departure_time']);
				} 
				$linelist[$k]['datelist'] = $datelist;
			}
			$sortlist[$key]['keywords'] = urlencode($value['catname']);
			$sortlist[$key]['linelist'] = $linelist;
		}
		$tpl->assign( 'sort_list', $sortlist);
		$indexhtml = $tpl -> fetch('default/'.$settings['templates'].'/channel_01.html');
		if (!is_dir(HTML_DIR."domestic")) createFolder(HTML_DIR.'domestic');
		$fp = fopen("domestic/index.html", "w");
		fwrite($fp, $indexhtml);
		fclose($fp);
	}
	elseif($catid==3){
		$tpl->assign( 'menustate', '4');
		$tpl->assign( 'catname', '游轮旅游');
		$tpl->assign( 'morekeywords', urlencode("游轮"));
		//当季热卖
		$tpl->assign( 'hotlist', get_hotline("p_transport like '%游轮%'"));
		//线路列表
		$linelist = get_line("is_show=1 and p_transport like '%游轮%'",0);
		foreach($linelist as $key => $value){
			$linelist[$key]['keywords'] = urlencode("游轮");
			// 出发日期
			$datelist = $db -> row_select('departure_time', "pid=" . $value['p_id'], 'id,departure_time');
			foreach($datelist as $sk => $sv) {
				$datelist[$sk]['departure_time'] = date('Y-m-d', $sv['departure_time']);
			} 
			$linelist[$key]['datelist'] = $datelist;
		}
		$tpl->assign( 'line_list', $linelist);
		$indexhtml = $tpl -> fetch('default/'.$settings['templates'].'/channel_02.html');
		if (!is_dir(HTML_DIR."cruise")) createFolder(HTML_DIR.'cruise');
		$fp = fopen("cruise/index.html", "w");
		fwrite($fp, $indexhtml);
		fclose($fp);
	}
	elseif($catid==4){
		$tpl->assign( 'menustate', '6');
		$tpl->assign( 'catname', '夕阳红');
		$tpl->assign( 'morekeywords', urlencode("夕阳红"));
		//当季热卖
		$tpl->assign( 'hotlist', get_hotline("p_extension like '%夕阳红%'"));
		//线路列表
		$linelist = get_line("is_show=1 and p_extension like '%夕阳红%'",0);
		foreach($linelist as $key => $value){
			$linelist[$key]['keywords'] = urlencode("夕阳红");
			// 出发日期
			$datelist = $db -> row_select('departure_time', "pid=" . $value['p_id'], 'id,departure_time');
			foreach($datelist as $sk => $sv) {
				$datelist[$sk]['departure_time'] = date('Y-m-d', $sv['departure_time']);
			} 
			$linelist[$key]['datelist'] = $datelist;
		}
		$tpl->assign( 'line_list', $linelist);
		$indexhtml = $tpl -> fetch('default/'.$settings['templates'].'/channel_02.html');
		if (!is_dir(HTML_DIR."sunset")) createFolder(HTML_DIR.'sunset');
		$fp = fopen("sunset/index.html", "w");
		fwrite($fp, $indexhtml);
		fclose($fp);
	}
	elseif($catid==5){
		$tpl->assign( 'menustate', '5');
		$tpl->assign( 'catname', '学生专题');
		$tpl->assign( 'morekeywords', urlencode("学生"));
		//当季热卖
		$tpl->assign( 'hotlist', get_hotline("p_extension like '%学生%'"));
		//线路列表
		$linelist = get_line("is_show=1 and p_extension like '%学生%'",0);
		foreach($linelist as $key => $value){
			$linelist[$key]['keywords'] = urlencode("学生");
			// 出发日期
			$datelist = $db -> row_select('departure_time', "pid=" . $value['p_id'], 'id,departure_time');
			foreach($datelist as $sk => $sv) {
				$datelist[$sk]['departure_time'] = date('Y-m-d', $sv['departure_time']);
			} 
			$linelist[$key]['datelist'] = $datelist;
		}
		$tpl->assign( 'line_list', $linelist);
		$indexhtml = $tpl -> fetch('default/'.$settings['templates'].'/channel_02.html');
		if (!is_dir(HTML_DIR."students")) createFolder(HTML_DIR.'students');
		$fp = fopen("students/index.html", "w");
		fwrite($fp, $indexhtml);
		fclose($fp);
	}
	elseif($catid==6){
		$tpl->assign( 'menustate', '6');
		$tpl->assign( 'catname', '各国签证');
		
		$array_country = arr_country();
		$array_visa_category = arr_visa_category();

		//签证首页
		$continentlist = $db -> row_select('country', "parentid=-1", 'id,name', 0, 'orderid');
		foreach($continentlist as $key => $value){
			$visalist = $db -> row_select('visa', "zid=".$value['id'], 'id,title,price,cid', 0, 'orderid','cid');
			foreach($visalist as $k => $v){
				$visalist[$k]['country'] = $array_country[$v['cid']];
			}
			$continentlist[$key]['visalist'] = $visalist;
		}
		$tpl->assign( 'continent_list', $continentlist);
		if (!is_dir(HTML_DIR."visa")) createFolder(HTML_DIR.'visa');
		$indexhtml = $tpl -> fetch('default/'.$settings['templates'].'/visaindex.html');
		$fp = fopen(HTML_DIR."visa/index.html", "w");
		fwrite($fp, $indexhtml);
		fclose($fp);
		
		//签证列表
		$counytrylist = $db -> row_select('visa', "1=1", 'id,cid', 0, 'orderid','cid');
		$visalist = array();
		foreach($counytrylist as $key => $value){
			$visalist = $db -> row_select('visa', "cid=".$value['cid'], '*', 0, 'orderid');
			foreach($visalist as $k => $v){
				$visalist[$k]['catname'] = $array_visa_category[$v['catid']];
			}
			$tpl->assign( 'visalist', $visalist);
			if (!is_dir(HTML_DIR."visa/")) createFolder(HTML_DIR.'visa/');
			$visahtml = $tpl -> fetch('default/'.$settings['templates'].'/visalist.html');
			$fp = fopen(HTML_DIR."visa/list_".$value['cid'].".html", "w");
			fwrite($fp, $visahtml);
			fclose($fp);
		}
	}
	return true;
} 
// 生成签证详细页
function html_visa($id) {
	global $db, $tpl, $settings;
	$array_visa_category = arr_visa_category();
	$data = $db -> row_select_one('visa', "id=" . intval($id));
	$data['info'] = htmlspecialchars_decode($data['info']);
	$data['catname'] = $array_visa_category[$data['catid']];
	$tpl -> assign('visa', $data);
	$visahtml = $tpl -> fetch('default/'.$settings['templates'].'/visa.html');
	if (!is_dir(HTML_DIR."visa")) createFolder(HTML_DIR.'visa');
	$fp = fopen(HTML_DIR."visa/" . $data['id'] . ".html", "w");
	fwrite($fp, $visahtml);
	fclose($fp);
	return true;
} 
// 生成新闻详细页
function html_news($id) {
	global $db, $tpl, $settings;
	$data = $db -> row_select_one('news', "n_id=" . intval($id));
	$data['addtime'] = date('Y-m-d', $data['n_addtime']);
	$category = $db -> row_select_one('news_category', 'catid=' . $data['catid']);
	$data['catname'] = $category['catname'];
	$data['n_info'] = htmlspecialchars_decode($data['n_info']);
	$tpl -> assign('news', $data); 
	// 相关新闻
	$aboutnews['pre'] = $db -> row_select('news', "catid=" . $data['catid'] . " and n_id<" . $data['n_id'], 'n_id,n_title', '3', 'n_id desc');
	$aboutnews['next'] = $db -> row_select('news', "catid=" . $data['catid'] . " and n_id>" . $data['n_id'], 'n_id,n_title', '3', 'n_id asc');
	foreach($aboutnews as $key => $value) {
		foreach($value as $k => $v) {
			$aboutnews[$key][$k]['n_title'] = _substr($v['n_title'], 0, 70);
		} 
	} 
	$tpl -> assign('aboutnewslist', $aboutnews);
	$newshtml = $tpl -> fetch('default/'.$settings['templates'].'/news.html');
	
	$time_dir = date('Ym', $data['n_addtime']);
	$dir =  HTML_DIR."news/" . $time_dir . "/";
	if (!is_dir($dir)) createFolder($dir);

	$fp = fopen($dir.$data['n_id'] . ".html", "w");
	fwrite($fp, $newshtml);
	fclose($fp);
	return true;
} 
// 生成线路详细页
function html_products($id) {
	global $db, $tpl , $settings;
	$data = $db -> row_select_one('products', "p_id=" . intval($id));

	//出发日期
	$departure_date_list = $db -> row_select('departure_time','pid='.$data['p_id'],'*',0,'departure_time asc');
	foreach($departure_date_list as $key => $value){
		$departure_date_list[$key]['departure_date'] = date('Y-m-d', $value['departure_time']);
		$weekarray = array("日","一","二","三","四","五","六");
		$departure_date_list[$key]['week'] = "星期".$weekarray[date("w",$value['departure_time'])];
	}
	$tpl -> assign('datelist', $departure_date_list);

	//详细行程
	$trip_list = $db -> row_select('trip','pid='.$data['p_id'],'*',0,'id,orderid');
	foreach($trip_list as $key => $value){
		$trip_list[$key]['info'] = htmlspecialchars_decode($value['info']);
		$trip_list[$key]['scenicinfo'] = htmlspecialchars_decode($value['scenicinfo']);
		$viewpoint_list = $db -> row_select('viewpoint','tid='.$value['id'],'*',0,'id,orderid');
		$trip_list[$key]['viewpoint'] = $viewpoint_list;
	}
	$tpl -> assign('triplist', $trip_list);
	

	//旅游顾问
	$consultant_list = $db -> row_select('consultant','1=1','*',0,'orderid');
	$tpl -> assign('consultantlist', $consultant_list);

	//帮助信息
	$help_list = array();
	$helplist = $db -> row_select('page','s_id=7','p_id,p_info');
	foreach($helplist as $key => $value){
		$help_list[$value['p_id']]['p_info'] = htmlspecialchars_decode($value['p_info']);
	}
	$tpl -> assign('helplist', $help_list);

	//相关线路
	$aboutlist = array();
	$arr_keywords = explode('|',$data['p_keywords']);
	array_pop($arr_keywords);
	$keyword = end($arr_keywords);
	$aboutlist = get_line("p_keywords like '%".$keyword."%' and p_id!=".$id,'10');
	$tpl -> assign('aboutlinelist', $aboutlist);

	$data['p_characteristic'] = htmlspecialchars_decode($data['p_characteristic']);
	$data['p_visa'] = htmlspecialchars_decode($data['p_visa']);
	$data['p_fees'] = htmlspecialchars_decode($data['p_fees']);
	$data['p_tips'] = htmlspecialchars_decode($data['p_tips']);
	if(!empty($data['p_departure_city'])){
		$city = $db -> row_select_one('area',"id=".$data['p_departure_city'],'name');
		$data['city'] = $city['name'];
	}
	$data['p_page'] = !empty($data['p_page']) ? $data['p_page'] : $data['p_id'] . ".html";

	//图片
	if (!empty($data['p_pics'])) {
		$pic_list = explode('|', $data['p_pics']);
		$tpl -> assign('piclist', $pic_list);
	} else {
		$tpl -> assign('piclist', "");
	} 

	$tpl -> assign('line', $data);


	$time_dir = date('Ym', $data['p_addtime']);
	$dir =  HTML_DIR."line/" . $time_dir . "/";
	if (!is_dir($dir)) createFolder($dir);
	
	$linehtml = $tpl -> fetch('default/'.$settings['templates'].'/line.html');
	$fp = fopen($dir.$data['p_page'], "w");
	fwrite($fp, $linehtml);
	fclose($fp);
	return true;
} 
// 生成单页
function html_page($id) {
	global $db, $tpl, $settings;
	$data = $db -> row_select_one('page', "p_id=" . intval($id));
	if($data['s_id']==6){
		$tpl->assign( 'menustate', '8');
	}

	$list = $db -> row_select('page', 's_id=' . $data['s_id'], '*', 0);
	$sort = $db -> row_select_one('page_sorts', 's_id=' . $data['s_id']);
	$data['sortname'] = $sort['s_name'];
	$data['sorturl'] = $sort['s_dir'] . "/" . $list[0]['p_page'];
	$data['p_page'] = !empty($data['p_page']) ? $data['p_page'] : $data['p_id'] . ".html";
	$data['p_info'] = htmlspecialchars_decode($data['p_info']);
	$data['s_dir'] = $sort['s_dir'];
	$tpl -> assign('pagelist', $list);
	$tpl -> assign('page', $data);

	if (!is_dir(HTML_DIR.$sort['s_dir'])) createFolder( HTML_DIR.$sort['s_dir']);

	$pagehtml = $tpl -> fetch('default/'.$settings['templates'].'/'.$data['p_tql']);
	$fp = fopen(HTML_DIR.$sort['s_dir'] . "/" . $data['p_page'], "w");
	fwrite($fp, $pagehtml);
	fclose($fp);
	return true;
}

// 生成服务页
function html_service($id) {
	global $db, $tpl, $settings;
	$sortlist = $db -> row_select('service_sorts', '1=1');
	foreach($sortlist as $key => $value){
		$servicelist = $db -> row_select('service', "s_id=" . $value['s_id']);
		$sortlist[$key]['pagelist'] = $servicelist;
	}
	$tpl -> assign('sort_list', $sortlist);

	$data = $db -> row_select_one('service', "p_id=" . intval($id));
	$data['p_info'] = htmlspecialchars_decode($data['p_info']);

	$tpl -> assign('service', $data);
	$pagehtml = $tpl -> fetch('default/'.$settings['templates'].'/service.html');
	$fp = fopen(HTML_DIR."service/" . $data['p_page'], "w");
	fwrite($fp, $pagehtml);
	fclose($fp);
	return true;
}
?>