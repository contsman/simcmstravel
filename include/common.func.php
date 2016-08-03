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
 * 后台管理函数库
 */
// 判断管理员登陆
function is_admin_login() {
	if (empty($_SESSION['ADMIN_UID'])) return false;
	return true;
} 
// 判断会员登陆
function is_user_login() {
	if (empty($_SESSION['USER_ID']) || empty($_SESSION['USER_NAME'])) return false;
	return true;
} 
// 获得系统配置
function settings() {
	global $db;
	$rs_settings = $db -> row_select('settings');
	$arr_settings = array();
	foreach ($rs_settings as $v) {
		$arr_settings[$v['k']] = $v['v'];
	} 
	return $arr_settings;
} 
// 上传图片
function upload_pic($fileName = '', $onlyName = 0, $upPath = '') {
	$allowType = array('.gif', '.jpg', '.png', '.bmp');
	return upload($fileName, $onlyName, $upPath , $allowType);
} 
// 上传图片
function upload_photo($fileName = '', $onlyName = 0, $upPath = '',$soucefile = '') {
	$allowType = array('.gif', '.jpg', '.png', '.bmp');
	return upload($fileName, $onlyName, $upPath , $allowType , $soucefile);
} 
// 上传文件
function upload($fileName = '', $onlyName = 0, $upPath = '', $allowType = array(), $soucefile = 'upload') {
	include_once(INC_DIR . 'UpFile.class.php');
	$UpFile = new UpFile('upload/' . $upPath, 1024, $allowType);
	$UpFile -> upload($soucefile, $fileName);
	$upload_info = $UpFile -> getSaveInfo();

	if (!empty($upload_info['error'])) showmsg($upload_info['error'], -1);
	if ($onlyName) return $upload_info['saveName'];
	return $upload_info['savePath'];
} 
// 获得key=>value数组
function get_array($arr, $key, $val) {
	$arr_type = array();
	foreach ($arr as $v) {
		$arr_type[$v[$key]] = $v[$val];
	} 
	return $arr_type;
} 
// 从表中获得 key=>value 数组
function get_array_from_table($tbname, $key, $val, $where = '1=1') {
	global $db;
	$arr = $db -> row_select($tbname, $where, "$key,$val");
	$arr_type = array();
	foreach ($arr as $v) {
		$arr_type[$v[$key]] = $v[$val];
	} 
	return $arr_type;
} 
// 栏目数组
function get_channel() {
	global $db;
	$channellist = $db -> row_select('channel', "1=1", 'c_id,c_name,c_url,c_target', 0, 'c_orderid asc');
	return $channellist;
} 

/**
 * 目的地分类
 */
function get_leftmenu() {
	global $db,$tree;
	$tree -> init(get_category('products_category'));
	$leftmenulist = $db -> row_select('products_category', "isshow=1 and parentid=0", 'catid,catname', 0, 'listorder asc');
	foreach($leftmenulist as $key => $value) {
		$leftmenulist[$key]['keywords'] = urlencode($value['catname']);
		$tree -> childs = array();
		$childs = $tree -> get_allchild($value['catid']);
		if($childs){
			$child_ids = implode(',', $childs);
			$recommendlist = $db -> row_select('products_category', "isshow=1 and recommend=1 and catid in(".$child_ids.")", 'catid,catname', 0, 'listorder asc');
			foreach($recommendlist as $subk => $subv) {
				$recommendlist[$subk]['keywords'] = urlencode($subv['catname']);
			} 
			$leftmenulist[$key]['recommend'] = $recommendlist;
		}

		$subleftmenulist = $db -> row_select('products_category', "isshow=1 and parentid=" . $value['catid'], 'catid,catname', 0, 'listorder asc');
		foreach($subleftmenulist as $k => $v) {
			$subleftmenulist[$k]['keywords'] = urlencode($v['catname']);
			$subsubleftmenulist = $db -> row_select('products_category', "isshow=1 and parentid=" . $v['catid'], 'catid,catname', 0, 'listorder asc');
			foreach($subsubleftmenulist as $subk => $subv) {
				$subsubleftmenulist[$subk]['keywords'] = urlencode($subv['catname']);
			} 
			$subleftmenulist[$k]['sub'] = $subsubleftmenulist;
		} 
		$leftmenulist[$key]['sub'] = $subleftmenulist;
	} 
	return $leftmenulist;
} 

/**
 * 分类数组
 * 
 * @param string $tablename 表名
 */
function get_category($tablename) {
	global $db;
	$list = $db -> row_select($tablename, 'isshow=1');
	foreach($list as $key => $value) {
		$value['recommendname'] = "";
		if($value['recommend']==1){
			$value['recommendname'] = "<span class='red'>推荐</span>";
		}
		$categorys[$value['catid']] = $value;
	} 
	return $categorys;
} 

/**
 * 分类选择
 * 
 * @param string $tablename 表名
 * @param intval $catid 别选中的ID，多选是可以是数组
 * @param string $str 属性
 * @param string $default_option 默认选项
 * @param intval $modelid 按所属模型筛选
 */
function select_category($tablename, $catid = 0, $str = '', $default_option = '', $sid, $modelid = 0) {
	global $db, $tree;
	$list = $db -> row_select($tablename, 'isshow=1');
	foreach($list as $key => $value) {
		if ($value['catid'] == $catid) $value['selected'] = 'selected';
		$categorys[$value['catid']] = $value;
	} 
	$string = '<select ' . $str . '>';
	if ($default_option) $string .= "<option value='0'>$default_option</option>";
	$str = "<option value='\$catid' \$selected>\$spacer \$catname</option>;";
	$tree -> init($categorys);
	$string .= $tree -> get_tree_category(0, $str, '', $sid);
	$string .= '</select>';
	return $string;
} 

/**
 * 分类数组
 * 
 * @param string $tablename 表名
 */
function array_category($tablename) {
	global $db;
	$data = $db -> row_select($tablename, "isshow=1", 'catid,catname', 0, 'listorder asc');
	return get_array($data, 'catid', 'catname');
} 
// 洲数组
function arr_continent() {
	global $db;
	$data = $db -> row_select('country', "parentid=-1", 'id,name', 0, 'orderid asc');
	return get_array($data, 'id', 'name');
} 
// 国家数组
function arr_country() {
	global $db;
	$data = $db -> row_select('country', "parentid!=-1", 'id,name', 0, 'orderid asc');
	return get_array($data, 'id', 'name');
} 
// 地区数组
function arr_area() {
	global $db;
	$data = $db -> row_select('area', "1=1", 'id,name', 0, 'orderid asc');
	return get_array($data, 'id', 'name');
} 

// 地区数组名称下标
function arr_area_desc() {
	global $db;
	$data = $db -> row_select('area', "1=1", 'id,name', 0, 'orderid asc');
	return get_array($data, 'name', 'id');
} 

// 省份数组
function arr_province() {
	global $db;
	$data = $db -> row_select('area', "parentid = 0", 'id,name', 0, 'orderid asc');
	return get_array($data, 'id', 'name');
}

//线路分类
function arr_category(){
    global $db;
    $data = $db -> row_select('products_category', "parentid = 0 and isshow = 1", 'catid,catname', 0, 'listorder asc');
    return get_array($data, 'catid', 'catname');
}
//子分类
function arr_sub_category($subcatid){
    global $db;
    $where = " 1=1 ";
    $data = array();
    if(!empty($subcatid)){
        $parentid_data = $db->row_select_one_product('products b',"b.p_id=".intval($subcatid),"*,(SELECT parentid FROM travel_products_category a where a.catid = b.catid) p_catid");
        $where.="and parentid = ".intval($parentid_data['p_catid']);
        $data = $db -> row_select('products_category', $where." and parentid != 0 and isshow = 1 and parentid in(select catid from travel_products_category where parentid = 0 and isshow = 1)", 'catid,catname', 0, 'listorder asc');
    }else{
        $data = $db -> row_select('products_category', $where." and parentid != 0 and isshow = 1 and parentid in(select catid from travel_products_category where parentid = 0 and isshow = 1)", 'catid,catname', 0, 'listorder asc');
    }
    return get_array($data, 'catid', 'catname');
}
// 地区数组
function arr_city() {
	global $db;
	$data = $db -> row_select('area', "parentid in(110000,120000,310000) or id like '__0100' ", 'id,name', 0, 'orderid asc');//and name like '%市'
	return get_array($data, 'id', 'name');
}

function arr_city_home(){
    global $db;
    $data = $db -> row_select('area', "id in(110000,120000,310000) or id like '__0100' and name like '%市' ", 'id,name', 0, 'orderid asc');//and name like '%市'
    return get_array($data, 'id', 'name');
}

// arrival_city
function arr_sub_city($subcatid) {
    global $db;
    $data = array();
    if(!empty($subcatid)){
        $one_product = $db -> row_select_one("products","p_id=".intval($subcatid));
        $data = $db -> row_select('area', " parentid=".intval($one_product['p_departure_province']), 'id,name', 0, 'orderid asc');//and name like '%市'
    }else{
        $data = $db -> row_select('area', " parentid in(110000,120000,310000) or id like '__0100' ", 'id,name', 0, 'orderid asc');//and name like '%市'
    }

    return get_array($data, 'id', 'name');
}
// 签证分类数组
function arr_visa_category() {
	global $db;
	$data = $db -> row_select('visa_category', "1=1", 'catid,catname', 0, 'orderid asc');
	return get_array($data, 'catid', 'catname');
} 
// 单页分类数组
function arr_pagesort() {
	global $db;
	$pagesort = $db -> row_select('page_sorts', "1=1", 's_id,s_name', 0, 'orderid asc');
	return get_array($pagesort, 's_id', 's_name');
} 
// 单页数组
function arr_page() {
	global $db;
	$pagelist = $db -> row_select('page', "1=1", 'p_id,p_title', 0, 'p_id asc');
	return get_array($pagelist, 'p_id', 'p_title');
} 
// 服务分类数组
function arr_servicesort() {
	global $db;
	$pagesort = $db -> row_select('service_sorts', "1=1", 's_id,s_name', 0, 'orderid asc');
	return get_array($pagesort, 's_id', 's_name');
} 
// 验证日期的合法性
function chk_date($value, $str = '-') {
	$date = explode($str, $value);
	if (count($date) != 3 || !checkdate($date[1], $date[2], $date[0])) return false;
	return true;
} 
// 底部服务列表
function bottom_service() {
	global $db;
	$sortlist = $db -> row_select('service_sorts', '1=1', 's_id,s_name');
	foreach($sortlist as $key => $value) {
		$servicelist = $db -> row_select('service', "s_id=" . $value['s_id'], 'p_id,p_title,p_page');
		$sortlist[$key]['pagelist'] = $servicelist;
	} 
	return $sortlist;
} 
// 首页推荐签证
function recom_visa() {
	global $db;
	$continentlist = $db -> row_select('country', "parentid=-1", 'id,name', 0, 'orderid');
	foreach($continentlist as $key => $value) {
		$visalist = $db -> row_select('visa', "zid=" . $value['id']." and ishome=1", 'id,title,pic,price', 0, 'orderid,cid');
		foreach($visalist as $k => $v){
			$visalist[$k]['title'] = _substr($v['title'],0,18);
		}
		$continentlist[$key]['visalist'] = $visalist;
	} 
	return $continentlist;
} 
// 线路列表
function get_line($where, $num) {
	global $db;
	$commonwhere = "1 = 1";
	if (!empty($where)) {
		$where = $commonwhere . " and " . $where;
	} 
	$list = $db -> row_select('products', $where, 'p_id,p_no,p_title,p_title2,p_market_price,p_price,p_travel_days,p_addtime,p_page,p_pics', $num, 'p_addtime desc');
	foreach($list as $key => $value) {
		if (!empty($value['p_pics'])) {
			$pic = explode('.', $value['p_pics']);
			$list[$key]['smallpic'] = str_replace('upload/upload','upload/small',$pic[0]) . ".jpg";
		} 
		if(!empty($value['p_market_price']) and !empty($value['p_price'])){
			$list[$key]['zhekou'] = sprintf('%.1f',($value['p_price']/$value['p_market_price'])*10);
		}
		$list[$key]['p_short_title'] = _substr($value['p_title'], 0, 44);
		$list[$key]['p_short_title2'] = _substr($value['p_title2'], 0, 44);
		$time_dir = date('Ym', $value['p_addtime']);
		$list[$key]['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $value['p_page'];
	} 
	return $list;
}
//get line by catid
function warea_line($catid){
    global $db;
    $world_area_list = $db -> row_select('products_category', '1=1 and parentid = '.$catid.' and isshow  = 1 ', 'catid,parentid,catname', '0', 'listorder asc');
    $keywordrslist = array();
    $list = array();
    foreach($world_area_list as $key => $value) {
        if(!empty($value['catid']) && !empty($value['parentid']) && !empty($value['catname'])) {
            $keywordrslist['catid'] = $value['catid'];
            $keywordrslist['parentid'] = $value['parentid'];
            $keywordrslist['catname'] = $value['catname'];
            array_push($list,$keywordrslist);
        }
    }
    return $list;
}

//出境游热门国家
function get_chujing_hotcountry(){
    global $db;
    $where = " ishot = 1 and parentid in (select id from travel_country where parentid = -1 ) ";
    $china_hot_city = $db -> row_select('country', $where, 'id,name', 0);
    return $china_hot_city;
}

//出境游热门城市
function get_chujing_hotcity(){
    global $db;
    $where = " ishot = 1 and parentid in (select id from travel_country where parentid in(select id from travel_country where parentid = -1 )) ";
    $china_hot_city = $db -> row_select('country', $where, 'id,name', 0);
    return $china_hot_city;
}

//国内游热门城市
function get_china_hotcity(){
    global $db;
    $where = " ishot = 1 ";
    $china_hot_city = $db -> row_select('area', $where, 'id,name', 0);
    return $china_hot_city;
}
//首页所有线路数据组装
function get_all_line() {
    global $db;
    $commonwhere = "1 = 1";

    $where = $commonwhere." and parentid = 0 and isshow = 1";

    $list = array();

    $all_category_list = $db -> row_select('products_category', $where, 'catid,catname', 0, 'listorder asc');
    foreach ($all_category_list as $key=>$value){
        $area_list = array();
        $where = $commonwhere." and parentid = ".$value['catid'];
        $sub_category_list = $db -> row_select('products_category', $where, 'catid,catname', 0, 'listorder asc');
        foreach($sub_category_list as $sub_key => $sub_value){
            $warea_list = get_world_area($value['catid']);
            array_push($area_list,$warea_list);
        }
        $arr = array('catid' => $value['catid'], 'catname' => $value['catname'],'warea' => $warea_list,'area_hot_country' =>$value['catid']==55?get_chujing_hotcountry():'','area_hot_city' =>$value['catid']==55?get_chujing_hotcity():get_china_hotcity());
        array_push($list,$arr);
    }
//    echo json_encode($list);

//    if (!empty($where)) {
//        $where = $commonwhere . " and " . $where;
//    }
//    $list = $db -> row_select('products', $where, 'p_id,p_no,p_title,p_title2,p_market_price,p_price,p_travel_days,p_addtime,p_page,p_pics', $num, 'p_addtime desc');
//    foreach($list as $key => $value) {
//        if (!empty($value['p_pics'])) {
//            $pic = explode('.', $value['p_pics']);
//            $list[$key]['smallpic'] = str_replace('upload/upload','upload/small',$pic[0]) . ".jpg";
//        }
//        if(!empty($value['p_market_price']) and !empty($value['p_price'])){
//            $list[$key]['zhekou'] = sprintf('%.1f',($value['p_price']/$value['p_market_price'])*10);
//        }
//        $list[$key]['p_short_title'] = _substr($value['p_title'], 0, 44);
//        $list[$key]['p_short_title2'] = _substr($value['p_title2'], 0, 44);
//        $time_dir = date('Ym', $value['p_addtime']);
//        $list[$key]['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $value['p_page'];
//    }
    return $list;
}

/**
 * 热门线路TOP10
 */
function get_comline($catid = '') {
	global $db;
	$where = "ishot = 1";
	if (!empty($catid)) {
		$where .= " and catid =" . $catid;
	} 
	$list = $db -> row_select('products', $where, 'p_id,p_title,p_price,p_addtime,p_page', '10', 'p_addtime desc');
	foreach($list as $key => $value) {
		$list[$key]['p_title'] = _substr($value['p_title'], 0, 20);
		$time_dir = date('Ym', $value['p_addtime']);
		$list[$key]['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $value['p_page'];
	} 
	return $list;
} 

/**
 * 首页特别推荐线路
 */
function get_home_comline($where) {
	global $db;
	$cwhere = "is_show = 1 and sp_recommend_home = 1";
	if (!empty($where)) {
		$cwhere .= " and " . $where;
	} 
	$list = get_line($cwhere, '1');
	return $list;
}

// 当季热卖
function get_hotline($where) {
	global $db;
	$cwhere = "ishot = 1";
	if (!empty($where)) {
		$cwhere .= " and " . $where;
	} 
	$list = $db -> row_select('products', $cwhere, '*', '4', 'p_addtime desc');
	foreach($list as $key => $value) {
		if (!empty($value['p_pics'])) {
			$pic = explode('.', $value['p_pics']);
			$list[$key]['smallpic'] = str_replace('upload/upload','upload/small',$pic[0]) . ".jpg";
		} 
		$list[$key]['p_title'] = _substr($value['p_title'], 0, 26);
		$list[$key]['p_detail'] = _substr(strip_tags($value['p_detail']), 0, 130);
		$time_dir = date('Ym', $value['p_addtime']);
		$list[$key]['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $value['p_page'];
	} 
	return $list;
} 

/**
 * 推荐新闻
 */
function get_comnews($sid, $num) {
	global $db;
	$list = $db -> row_select('news', "catid=" . $sid, '*', $num, 'n_addtime desc');
	foreach($list as $key => $value) {
		$list[$key]['shorttitle'] = _substr($value['n_title'], 0, 38);
		$time_dir = date('Ym', $value['n_addtime']);
		$list[$key]['n_url'] = WEB_URL . "/" . HTML_DIR . "news/" . $time_dir . "/" . $value['n_id'].".html";
	} 
	return $list;
} 

/**
 * 单页
 */
function get_page($id = 0) {
	global $db;
	$data = $db -> row_select_one('page', "p_id=" . $id);
	$data['p_info'] = htmlspecialchars_decode($data['p_info']);
	$data['detail'] = _substr(strip_tags($data['p_info']), 0, 200);
	return $data;
} 

/**
 * 幻灯片
 */
function get_filmstrip() {
	global $db;
	$filmlist = $db -> row_select('filmstrip', '1=1', 'id,pic,url', 0, 'orderid asc');
	return $filmlist;
} 
// 广告
function arr_ad() {
	global $db;
	$ads = $db -> row_select('ad', '', '*', 0, 'id');
	foreach($ads as $k => $v) {
		$adlist[$v['id']] = $v;
	} 
	return $adlist;
} 
// 友情链接
function get_flink() {
	global $db;
	$flinklist = $db -> row_select('friendlink', 'is_show=1', 'l_address,l_name,l_pic', 0, 'l_id desc');
	return $flinklist;
} 

// 关键字
function get_keywords()
{
	global $db;
	$keywordrs = $db -> row_select('keyword', '1=1', 'k_keyword', '20', 'k_type asc');
	$keywordrslist = array();
	foreach($keywordrs as $key => $value) {
		if(!empty($value['k_keyword'])) {
			$k_keyword = explode('|', $value['k_keyword']);
			foreach($k_keyword as $k => $v) {
				$keywordrslist[$key]['keyword'][$k]['keyword'] = $v;
				$keywordrslist[$key]['keyword'][$k]['keywords'] = urlencode($v);
			} 
		} 
	} 
	return $keywordrslist;
}
// 关键字
function get_keywordsbycatid($catid)
{
    global $db;//travel_products_category where parentid = 55 and isshow  = 1 order by listorder asc
    $keywordrs = $db -> row_select('travel_products_category', '1=1 and parentid = '.$catid.' and isshow  = 1 ', 'catid,parentid,catname', '0', 'listorder asc');
    $keywordrslist = array();
    foreach($keywordrs as $key => $value) {
        if(!empty($value['k_keyword'])) {
            $k_keyword = explode('|', $value['k_keyword']);
            foreach($k_keyword as $k => $v) {
                $keywordrslist[$key]['keyword'][$k]['keyword'] = $v;
                $keywordrslist[$key]['keyword'][$k]['keywords'] = urlencode($v);
            }
        }
    }
    return $keywordrslist;
}

// 关键字
function get_world_area($catid)
{
    global $db;
    $world_area_list = $db -> row_select('products_category', '1=1 and parentid = '.$catid.' and isshow  = 1 ', 'catid,parentid,catname', '0', 'listorder asc');
    $area_line_data_list = array();
    $list = array();
    foreach($world_area_list as $key => $value) {
        if(!empty($value['catid']) && !empty($value['parentid']) && !empty($value['catname'])) {
            $area_line_data_list['catid'] = $value['catid'];
            $area_line_data_list['parentid'] = $value['parentid'];
            $area_line_data_list['catname'] = $value['catname'];
            $area_line_list = $db -> row_select('products', '1=1 and catid = '.$value['catid'].' and is_show  = 1 ', '*,concat(\'/line/\',FROM_UNIXTIME(p_addtime,\'%Y%m\')) p_url,(select name from travel_area where id = p_departure_province) departure_province_name', '10', 'recommend_home,recommend desc');
            foreach($area_line_list as $pic_key => $pic_value) {
                if (!empty($pic_value['p_pics'])) {
                    $pic = explode('|', $pic_value['p_pics']);
                    $area_line_list[$pic_key]['p_smallpic'] = str_replace('upload/upload', 'upload/small', $pic[0]);
                }
            }
            $area_line_data_list['area_line'] = $area_line_list;
            array_push($list,$area_line_data_list);
        }
    }
    return $list;
}

//搜索页目的地
function get_arrival($catid) {
	global $db;
	$arrivallist = $db -> row_select('products_category', 'parentid='.$catid,'catid,catname',0,'listorder asc');
	return $arrivallist;
} 

// 缓存函数
function display_common_cache() {
	$commoncache = array();
	$commoncache['leftmenulist'] = get_leftmenu();
	$commoncache['news_category'] = get_category('news_category');
	$commoncache['products_category'] = get_category('products_category');
	$commoncache['newslist01'] = get_comnews(53, 10);
	$commoncache['newslist02'] = get_comnews(55, 10);
	$commoncache['hotline01'] = get_comline(55);
	$commoncache['hotline02'] = get_comline(58);
	$commoncache['bottom_service'] = bottom_service();
	$commoncache['keywords'] = get_keywords();
	$commoncache['continent'] = arr_continent();
	$commoncache['arrival_foreign'] = get_arrival(55);
	$commoncache['arrival_china'] = get_arrival(58);
	return $commoncache;
} 

?>