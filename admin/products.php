<?php
error_reporting(0);
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '线路管理';
//允许操作
$ac_arr = array('list'=>'线路列表','add'=>'添加线路','edit'=>'编辑线路','show'=>'改变显示状态','del'=>'删除线路','bulkdel'=>'批量删除','html'=>'生成静态','bulkhtml'=>'批量生成静态','bulksort'=>'更新排序','bulkshow'=>'批量显示');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

$tree -> init($commoncache['products_category']);
$childs = $tree -> get_allchild(6);

$array_province = arr_province();
$array_category = arr_category();
$array_sub_category = arr_sub_category($_GET['id']);
$array_city = arr_sub_city($_GET['id']);
$array_continent = arr_continent();
$array_country = arr_country();

$tpl->assign( 'provincelist', $array_province );
$tpl->assign( 'continentlist', $array_continent );

//列表
if ($ac == 'list')
{	
	// 搜索条件
	if(isset($_GET['s_type']) and $_GET['s_type'] == 1) {
		setMyCookie("state", '', time()-COOKIETIME);
		setMyCookie("keywords", '', time()-COOKIETIME);
	} 

	$where = '1=1';

	if(isset($_GET['state']) and intval($_GET['state']) != 0) {
		setMyCookie("state", intval($_GET['state']), time()+3600);
	} elseif(isset($_GET['state']) and intval($_GET['state']) == 0) {
		setMyCookie("state", '', time()-COOKIETIME);
	}

	if (!empty($_COOKIE['state']))
    {
        $state = intval($_COOKIE['state']);
		if($state==1){
			$where .= " and recommend=1";
		}elseif($state==2){
			$where .= " and recommend_home=1";
		}elseif($state==3){
			$where .= " and sp_recommend_home=1";
		}elseif($state==4){
			$where .= " and promotions=1";
		}elseif($state==5){
			$where .= " and ishot=1";
		}
        
    }

	if(isset($_GET['keywords']) and $_GET['keywords'] != "") {
		setMyCookie("keywords", $_GET['keywords'], time()+3600);
	} elseif(isset($_GET['keywords']) and $_GET['keywords'] == "") {
		setMyCookie("keywords", '', time()-COOKIETIME);
	} 

    if (!empty($_COOKIE['keywords']))
    {
        $keywords = $_COOKIE['keywords'];
        $where .= " AND (p_title LIKE '%{$keywords}%' or `p_keywords` LIKE '%{$keywords}%' or `p_no` LIKE '%{$keywords}%')";
    }
	$select_category = select_category('products_category',$catid, 'name="catid" id="catid"', '-选择分类-', $catid);

    include(INC_DIR.'Page.class.php');
	$Page = new Page($db->tb_prefix.'products',$where,'*','20','p_id desc');
    $list = $Page->get_data();
	foreach($list as $key => $value){
		$list[$key]['p_addtime'] = date('Y-m-d H:i:s',$value['p_addtime']);
		$arr_products_category = array_category('products_category');
		$time_dir = date('Ym', $value['p_addtime']);
		$list[$key]['p_url'] = WEB_URL . "/" . HTML_DIR . "line/" . $time_dir . "/" . $value['p_id'].".html";
	}
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
	$tpl->assign( 'selectcategory', $select_category );
	$tpl->assign( 'productslist', $list );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/products_list.html' );
    exit;
}
//显示
elseif ($ac == 'show')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
	$status = intval($_GET['isshow']);
    $rs = $db->row_update('products',array('is_show'=>$status),"p_id=".$id);
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('products',"p_id=$id");
	$rs = $db->row_delete('departure_time',"pid=$id");
	$rs = $db->row_delete('trip',"pid=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('products',"p_id in($str_id)");
	$rs = $db->row_delete('departure_time',"pid in($str_id)");
	$rs = $db->row_delete('trip',"pid in($str_id)");
}
//单条生成静态
elseif ($ac == 'html')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = html_products($id);
}
//批量生成静态
elseif ($ac == 'bulkhtml')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
	foreach($_POST['bulkid'] as $key => $value) {
		$rs = html_products($value);
	} 
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('products',array('orderid'=>$_POST['orderid'][$v]),"p_id=".intval($v));
    }
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('catid'=>'线路类别不可为空','p_title'=>'线路名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        foreach (array('p_characteristic','p_visa','p_fees','p_tips') as $v)
        {
            $_POST[$v] = htmlspecialchars($_POST[$v]);
        }
        $post = post('p_id','p_title','p_title2','p_no','p_detail','p_aid','p_departure_province','p_departure_city','p_enddate','p_departure_time','p_tel','p_travel_days','p_market_price','p_price','p_hot','p_signup','p_stay','p_transport','p_characteristic','p_visa','p_fees','p_tips','p_smallpic','p_pics','catid','p_type','p_page','p_tpl','is_show','recommend','recommend_home','sp_recommend_home','promotions','ishot','p_extension');
        $post['catid'] = intval($post['catid']);
		$post['is_show'] = intval($post['is_show']);
		
		$post['p_keywords'] = "|";
		if(isset($_POST['p_arrival_one'])){
			 foreach($_POST['p_arrival_one'] as $value){
				if($post['catid']==1){
					$post['p_keywords'].= $array_province[$value]."|";
				}
				else{
					$post['p_keywords'].= $array_continent[$value]."|";
				}
			 }
			 $post['p_arrival_one'] = implode('|',$_POST['p_arrival_one']);
			 
		}

		if(isset($_POST['p_arrival_two'])){
			 foreach($_POST['p_arrival_two'] as $value){
				if($post['catid']==1){
					$post['p_keywords'].= $array_city[$value]."|";
				}
				else{
					$post['p_keywords'].= $array_country[$value]."|";
				}
			 }
			 $post['p_arrival_two'] = implode('|',$_POST['p_arrival_two']);
		}

		if(isset($_POST['p_arrival_three'])){
			foreach($_POST['p_arrival_three'] as $value){
				$post['p_keywords'].= $array_country[$value]."|";
			}
			$post['p_arrival_three'] = implode('|',$_POST['p_arrival_three']);

		}

		if(empty($post['recommend'])) $post['recommend']=0;
		if(empty($post['recommend_home'])) $post['recommend_home']=0;
		if(empty($post['sp_recommend_home'])) $post['sp_recommend_home']=0;
		if(empty($post['promotions'])) $post['promotions']=0;
		if(empty($post['ishot'])) $post['ishot']=0;
		
		//图片
		if (isset($_POST['p_pics'])) {
			$post['p_pics'] = implode("|", $_POST['p_pics']);
            $post['p_smallpic'] = str_replace('upload/upload', 'upload/small', $post['p_pics']);
		} else {
			$post['p_pics'] = "";
		}

        if ($ac == 'add')
        {
			$post['p_addtime'] = time();
			$post['p_hits'] = 0;
            $rs = $db->row_insert('products',$post);
			$insertid = $db->insert_id();
			if(empty($post['p_page'])){
				$rs = $db->row_update('products',array('p_page'=>$insertid.'.html'),"p_id=".$insertid);
			}
			html_products(intval($insertid));
        }
        else
		{ 	
			if(empty($post['p_page'])){
				$post['p_page'] = intval($_POST['id']).".html";
			}
			$rs = $db->row_update('products',$post,"p_id=".intval($_POST['id']));
			html_products(intval($_POST['id']));
		}
    }
    //转向添加或修改页面
    else 
    {
		if (empty($_GET['id'])) {
			$data = array('p_id'=>'','p_title'=>'','p_title2'=>'','p_no'=>'','p_detail'=>'','p_aid'=>'','p_departure_province'=>'','p_departure_city'=>'','p_enddate'=>'','p_departure_time'=>'','p_tel'=>'','p_travel_days'=>'','p_market_price'=>'','p_price'=>'','p_hot'=>'','p_signup'=>'','p_stay'=>'','p_transport'=>'','p_characteristic'=>'','p_visa'=>'','p_fees'=>'','p_tips'=>'','p_keywords'=>'','p_smallpic'=>'','p_pics'=>'','catid'=>'','p_type'=>'','p_page'=>'','p_tpl'=>'products.html','is_show'=>'','recommend'=>'','recommend_home'=>'','sp_recommend_home'=>'','promotions'=>'','ishot'=>'','p_extension'=>'');
		}
        else {
			$data = $db->row_select_one_product('products b',"b.p_id=".intval($_GET['id']),"*,(SELECT parentid FROM travel_products_category a where a.catid = b.catid) p_catid,(select parentid from travel_products_category where catid = b.catid) rootcatid");
			if (!empty($data['p_pics'])) {
				$pic_list = explode('|', $data['p_pics']);
				$piclist = array();
				foreach($pic_list as $key => $value){
					$piclist[$key]['pic'] = $value;
					$arr_picid = explode("/",$value);
					$arr_length = count($arr_picid);
					$arr_picids = explode(".",$arr_picid[$arr_length-1]);
					$piclist[$key]['picid'] = $arr_picids[0];
				}
				$tpl -> assign('pic_list', $piclist);
			} 
			$arrival_list = "";
			if($data['rootcatid']!=55){
				$arrival_list = "<div id='china'>";
				$arrival_one = explode("|",$data['p_arrival_one']);
				$arrival_two = explode("|",$data['p_arrival_two']);
				$arrival_list .= "<p id='departure_china_province'>";
				foreach($array_province as $key => $value){
					if(in_array($key,$arrival_one)){
						$check = "checked";
					}
					else{
						$check = "";
					}
					$arrival_list .= "<input type='checkbox' name='p_arrival_one[]' value='".$key."' ".$check."> ".$value." ";
				}
				$arrival_list .="</p>";
				$arrival_list .= "<p id='departure_china_city' class='mt10'>";
				foreach($array_province as $key => $value){
					if(in_array($key,$arrival_one)){
						$citylist = $db->row_select('area',"parentid=".$key);
						$array_arrival_city = get_array($citylist, 'id', 'name');
						$arrival_list .= "<span class='cc".$key."'>";
						foreach($array_arrival_city as $key => $value){
							if(in_array($key,$arrival_two)){
								$check = "checked";
							}
							else{
								$check = "";
							}
							$arrival_list .= "<input type='checkbox' name='p_arrival_two[]' value='".$key."' ".$check."> ".$value." ";
						}
						$arrival_list .= "</span>";
					}
				}
				$arrival_list .="</p></div>";
			}
			else{
				$arrival_list = "<div id='foreign'>";
				$arrival_one = explode("|",$data['p_arrival_one']);
				$arrival_two = explode("|",$data['p_arrival_two']);
				$arrival_three = explode("|",$data['p_arrival_three']);
				$arrival_list .= "<p id='departure_foreign_continent'>";
				foreach($array_continent as $key => $value){
					if(in_array($key,$arrival_one)){
						$check = "checked";
					}
					else{
						$check = "";
					}
					$arrival_list .= "<input type='checkbox' name='p_arrival_one[]' value='".$key."' ".$check."> ".$value." ";
				}
				$arrival_list .="</p>";
				$arrival_list .= "<p id='departure_foreign_country' class='mt10'>";
				foreach($array_continent as $key => $value){
					if(in_array($key,$arrival_one)){
						$countrylist = $db->row_select('country',"parentid=".$key);
						$array_arrival_country = get_array($countrylist, 'id', 'name');
						$arrival_list .= "<span class='fc".$key."'>";
						foreach($array_arrival_country as $key => $value){
							if(in_array($key,$arrival_two)){
								$check = "checked";
							}
							else{
								$check = "";
							}
							$arrival_list .= "<input type='checkbox' name='p_arrival_two[]' value='".$key."' ".$check."> ".$value." ";
						}
						$arrival_list .= "</span>";
					}
				}
				$arrival_list .="</p>";
				$arrival_list .= "<p id='departure_foreign_city' class='mt10'>";
				foreach($array_continent as $key => $value){
					if(in_array($key,$arrival_one)){
						$countrylist = $db->row_select('country',"parentid=".$key);
						$array_arrival_country = get_array($countrylist, 'id', 'name');
						foreach($array_arrival_country as $k => $v){
							if(in_array($k,$arrival_two)){
								$citylist = $db->row_select('country',"parentid=".$k);
								$array_arrival_city = get_array($citylist, 'id', 'name');
								$arrival_list .= "<span class='fcc".$k."'>";
								foreach($array_arrival_city as $ck => $cv){
									if(in_array($ck,$arrival_three)){
										$check = "checked";
									}
									else{
										$check = "";
									}
									$arrival_list .= "<input type='checkbox' name='p_arrival_three[]' value='".$ck."' ".$check."> ".$cv." ";
								}
								$arrival_list .= "</span>";
							}
						}
					}
				}
				$arrival_list .="</p></div>";

			}
			$tpl->assign( 'arrivallist', $arrival_list );
		}
		$select_category = select_make($data['p_catid'], $array_category, '-请选择分类-');
        $sub_select_category = select_make($data['catid'], $array_sub_category, '-请选择分类-');
		$select_province = select_make($data['p_departure_province'],$array_province,"请选择省份");
		$select_city = select_make($data['p_departure_city'],$array_city,"请选择城市");

		$select_productstype = select_make($data['p_type'],array('普通线路','推荐线路'));
		$tpl->assign( 'selectcategory', $select_category );
		$tpl->assign( 'subselectcategory', $sub_select_category );
		$tpl->assign( 'select_productstype', $select_productstype );
		$tpl->assign( 'selectprovince', $select_province );
		$tpl->assign( 'selectcity', $select_city );
		$tpl->assign( 'products', $data );
		$tpl->assign( 'ac', $ac );
		$tpl->assign( 'sessionname', session_name() );
		$tpl->assign( 'sessionid', session_id() );
        $tpl->display( 'admin/add_products.html' );
        exit;
    }
}
//默认操作
else
{
    showmsg('非法操作',-1);
}

showmsg($ac_arr[$ac].($rs ? '成功' : '失败'),ADMIN_PAGE."?mod=$mod&ac=list");
?>