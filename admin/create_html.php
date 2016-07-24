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
header("Content-type: text/html; charset=utf-8");
if (!defined('APP_IN')) exit('Access Denied');
// 当前模块
$mod_name = '生成静态';
// 允许操作
$ac_arr = array('index' => '更新首页HTML', 'channel' => '更新频道页HTML', 'products' => '更新线路页HTML', 'news' => '更新新闻页HTML', 'page' => '更新单页HTML', 'flink' => '更新友情链接', 'sitemap' => '更新网站地图');
// 当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl -> assign('mod_name', $mod_name);
$tpl -> assign('ac_arr', $ac_arr);
$tpl -> assign('ac', $ac);

$array_page = arr_page();

// 更新首页
if ($ac == 'index') {
	html_index();
	htmlshowmsg('更新首页成功');
	exit;
} 
// 更新频道页
if ($ac == 'channel') {
	if (isset($_GET['op']) and !empty($_GET['op'])){
		$catids = isset($_REQUEST['catids']) ? $_REQUEST['catids'] : '';
		if(empty($catids)){ 
			htmlshowmsg('请选择频道');
			exit;
		}
		foreach($catids as $value){
			html_channel($value);
		}
		htmlshowmsg('更新频道页成功');
		exit;
	}
	else{
		$tpl -> display("admin/channel_html.html");	
	}
} 
// 更新线路
elseif ($ac == 'products') {
	$catids = isset($_REQUEST['catids']) ? $_REQUEST['catids'] : 0;
	if($catids!=0){
		$catidstr = implode(',',$catids);
		$where = "catid in (".$catidstr.")";
	}
	else{
		$where = "1=1";
	}
	if (isset($_GET['op']) and !empty($_GET['op'])){
		if($_GET['op']==1){
			$list = $db -> row_select('products', $where, 'p_id', 0, 'p_id');
			$productscounts = count($list);
			$productskey = isset($_GET['productskey']) ? intval($_GET['productskey']) : 0;
			if($productskey>=$productscounts){
				htmlshowmsg('更新线路页完成！');
				exit;
			}
			$productslist = $db -> row_select('products', $where, 'p_id', $productskey.',20', 'p_id');
			foreach($productslist as $key => $value){
				html_products($value['p_id']);
			}
			$productskey = $productskey + 20;
			showmsg2('更新'.($productskey-20)."到".$productskey.'条线路成功', ADMIN_PAGE.'?mod=create_html&ac=products&op=1&productskey='.$productskey.'&catids='.$catids);
		}
		elseif($_GET['op']==2){
			$productsnum = isset($_REQUEST['productsnum']) ? intval($_REQUEST['productsnum']) : 20;
			$list = $db -> row_select('products', $where, 'p_id', $productsnum, 'p_id');
			$productscounts = count($list);
			$productskey = isset($_GET['productskey']) ? intval($_GET['productskey']) : 0;
			if($productskey>=$productscounts){
				htmlshowmsg('更新线路页完成！');
				exit;
			}
			$productslist = $db -> row_select('products', $where, 'p_id', $productskey.',20', 'p_id');
			foreach($productslist as $key => $value){
				html_products($value['p_id']);
			}
			$productskey = $productskey + 20;
			showmsg2('更新'.($productskey-20)."到".$productskey.'条线路成功', ADMIN_PAGE.'?mod=create_html&ac=products&op=2&productskey='.$productskey.'&productsnum='.$productsnum.'&catids='.$catids);
		}
		elseif($_GET['op']==3){
			$startdate = isset($_REQUEST['startdate']) ? $_REQUEST['startdate'] : '0-0-0';
			$enddate = isset($_REQUEST['enddate']) ? $_REQUEST['enddate'] : '0-0-0';
			$starttimearr = explode('-',$startdate);
			$starttime = mktime(0,0,0,$starttimearr[1],$starttimearr[2],$starttimearr[0]);
			$endtimearr = explode('-',$enddate);
			$endtime = mktime(0,0,0,$endtimearr[1],$endtimearr[2],$endtimearr[0]);	
			if(!empty($starttime) and !empty($endtime)){
				$where .= " and p_addtime > ".$starttime." and p_addtime < ".$endtime;
			}
			$productsnum = isset($_REQUEST['productsnum']) ? intval($_REQUEST['productsnum']) : 20;
			$list = $db -> row_select('products', $where, 'p_id', '', 'p_id');
			$productscounts = count($list);
			$productskey = isset($_GET['productskey']) ? intval($_GET['productskey']) : 0;
			if($productskey>=$productscounts){
				htmlshowmsg('更新线路页完成！');
				exit;
			}
			$productslist = $db -> row_select('products', $where, 'p_id', $productskey.',20', 'p_id');
			foreach($productslist as $key => $value){
				html_products($value['p_id']);
			}
			$productskey = $productskey + 20;
			showmsg2('更新'.($productskey-20)."到".$productskey.'条线路成功', ADMIN_PAGE.'?mod=create_html&ac=products&op=3&productskey='.$productskey.'&startdate='.$startdate.'&enddate='.$enddate.'&catids='.$catids);
		}
		elseif($_GET['op']==4){
			$startid = isset($_REQUEST['startid']) ? intval($_REQUEST['startid']) : 0;
			$endid = isset($_REQUEST['endid']) ? intval($_REQUEST['endid']) : 0;
			$where .= " and p_id > ".$startid." and p_id < ".$endid;
			$productsnum = isset($_REQUEST['productsnum']) ? intval($_REQUEST['productsnum']) : 20;
			$list = $db -> row_select('products', $where, 'p_id', '', 'p_id');
			$productscounts = count($list);
			$productskey = isset($_GET['productskey']) ? intval($_GET['productskey']) : 0;
			if($productskey>=$productscounts){
				htmlshowmsg('更新线路页完成！');
				exit;
			}
			$productslist = $db -> row_select('products', $where, 'p_id', $productskey.',20', 'p_id');
			foreach($productslist as $key => $value){
				html_products($value['p_id']);
			}
			$productskey = $productskey + 20;
			showmsg2('更新'.($productskey-20)."到".$productskey.'条线路成功', ADMIN_PAGE.'?mod=create_html&ac=products&op=4&productskey='.$productskey.'&startid='.$startid.'&endid='.$endid.'&catids='.$catids);
		}
		exit;
	}
	else{
		$starttimevalue = date("Y-m-d",time()-3600*24*5);
		$endtimevalue = date("Y-m-d",time());
		$tpl -> assign('starttimevalue', $starttimevalue);
		$tpl -> assign('endtimevalue', $endtimevalue);
		$tpl -> display("admin/products_html.html");
	}
} 
// 更新新闻
elseif ($ac == 'news') {
	$catids = isset($_REQUEST['catids']) ? $_REQUEST['catids'] : 0;
	if($catids!=0){
		$catidstr = implode(',',$catids);
		$where = "catid in (".$catidstr.")";
	}
	else{
		$where = "1=1";
	}
	if (isset($_GET['op']) and !empty($_GET['op'])){
		if($_GET['op']==1){
			$list = $db -> row_select('news', $where, 'n_id', 0, 'n_id');
			$newscounts = count($list);
			$newskey = isset($_GET['newskey']) ? intval($_GET['newskey']) : 0;
			if($newskey>=$newscounts){
				htmlshowmsg('更新新闻页完成！');
				exit;
			}
			$newslist = $db -> row_select('news', $where, 'n_id', $newskey.',20', 'n_id');
			foreach($newslist as $key => $value){
				html_news($value['n_id']);
			}
			$newskey = $newskey + 20;
			showmsg2('更新'.($newskey-20)."到".$newskey.'条新闻成功', ADMIN_PAGE.'?mod=create_html&ac=news&op=1&newskey='.$newskey.'&catids='.$catids);
		}
		elseif($_GET['op']==2){
			$newsnum = isset($_REQUEST['newsnum']) ? intval($_REQUEST['newsnum']) : 20;
			$list = $db -> row_select('news', $where, 'n_id', $newsnum, 'n_id');
			$newscounts = count($list);
			$newskey = isset($_GET['newskey']) ? intval($_GET['newskey']) : 0;
			if($newskey>=$newscounts){
				htmlshowmsg('更新新闻页完成！');
				exit;
			}
			$newslist = $db -> row_select('news', $where, 'n_id', $newskey.',20', 'n_id');
			foreach($newslist as $key => $value){
				html_news($value['n_id']);
			}
			$newskey = $newskey + 20;
			showmsg2('更新'.($newskey-20)."到".$newskey.'条新闻成功', ADMIN_PAGE.'?mod=create_html&ac=news&op=2&newskey='.$newskey.'&newsnum='.$newsnum.'&catids='.$catids);
		}
		elseif($_GET['op']==3){
			$startdate = isset($_REQUEST['startdate']) ? $_REQUEST['startdate'] : '0-0-0';
			$enddate = isset($_REQUEST['enddate']) ? $_REQUEST['enddate'] : '0-0-0';
			$starttimearr = explode('-',$startdate);
			$starttime = mktime(0,0,0,$starttimearr[1],$starttimearr[2],$starttimearr[0]);
			$endtimearr = explode('-',$enddate);
			$endtime = mktime(0,0,0,$endtimearr[1],$endtimearr[2],$endtimearr[0]);
			if(!empty($starttime) and !empty($endtime)){
				$where .= " and n_addtime > ".$starttime." and n_addtime < ".$endtime;
			}
			$newsnum = isset($_REQUEST['newsnum']) ? intval($_REQUEST['newsnum']) : 20;
			$list = $db -> row_select('news', $where, 'n_id', '', 'n_id');
			$newscounts = count($list);
			$newskey = isset($_GET['newskey']) ? intval($_GET['newskey']) : 0;
			if($newskey>=$newscounts){
				htmlshowmsg('更新新闻页完成！');
				exit;
			}
			$newslist = $db -> row_select('news', $where, 'n_id', $newskey.',20', 'n_id');
			foreach($newslist as $key => $value){
				html_news($value['n_id']);
			}
			$newskey = $newskey + 20;
			showmsg2('更新'.($newskey-20)."到".$newskey.'条新闻成功', ADMIN_PAGE.'?mod=create_html&ac=news&op=3&newskey='.$newskey.'&startdate='.$startdate.'&enddate='.$enddate.'&catids='.$catids);
		}
		elseif($_GET['op']==4){
			$startid = isset($_REQUEST['startid']) ? intval($_REQUEST['startid']) : 0;
			$endid = isset($_REQUEST['endid']) ? intval($_REQUEST['endid']) : 0;
			$where .= " and n_id > ".$startid." and n_id < ".$endid;
			$newsnum = isset($_REQUEST['newsnum']) ? intval($_REQUEST['newsnum']) : 20;
			$list = $db -> row_select('news', $where, 'n_id', '', 'n_id');
			$newscounts = count($list);
			$newskey = isset($_GET['newskey']) ? intval($_GET['newskey']) : 0;
			if($newskey>=$newscounts){
				htmlshowmsg('更新新闻页完成！');
				exit;
			}
			$newslist = $db -> row_select('news', $where, 'n_id', $newskey.',20', 'n_id');
			foreach($newslist as $key => $value){
				html_news($value['n_id']);
			}
			$newskey = $newskey + 20;
			showmsg2('更新'.($newskey-20)."到".$newskey.'条新闻成功', ADMIN_PAGE.'?mod=create_html&ac=news&op=4&newskey='.$newskey.'&startid='.$startid.'&endid='.$endid.'&catids='.$catids);
		}
		exit;
	}
	else{
		$select_category = select_category('news_category', '', 'style="height:200px;" multiple="multiple" id="catids" name="catids[]"', '', '');
		$tpl -> assign('selectcategory', $select_category);
		$starttimevalue = date("Y-m-d",time()-3600*24*5);
		$endtimevalue = date("Y-m-d",time());
		$tpl -> assign('starttimevalue', $starttimevalue);
		$tpl -> assign('endtimevalue', $endtimevalue);
		$tpl -> display("admin/news_html.html");
	}
} 
// 更新单页
elseif ($ac == 'page') {
	$list = $db -> row_select('page', '1=1', '*', 0, 'orderid');
	foreach($list as $key => $value) {
		html_page($value['p_id']);
	} 
	htmlshowmsg('更新单页成功');
	exit;
} 
?>