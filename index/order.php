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

//if (!is_user_login()) showmsg('请先登陆', 'index.php?mod=login');

$id = isset($_GET['id'])? intval($_GET['id']) : 0;

if (submitcheck('action')) {
	
	$arr_not_empty = array('turename'=>'请输入您的真实姓名','tel'=>'请输入您的手机号');
    can_not_be_empty($arr_not_empty,$_POST);
	$post = array();
	$post['adult_nums'] = intval($_POST['adult_nums']);
	$post['children_nums'] = intval($_POST['children_nums']);
	$post['price'] = intval($_POST['price']);
	$post['pid'] = intval($_POST['id']);
	$departure_time = explode('-', $_POST['departure_date']);
	$post['departure_date'] = mktime(0,0,0,$departure_time[1],$departure_time[2],$departure_time[0]);
	if(!empty($_SESSION['USER_ID'])){
		$post['uid'] = $_SESSION['USER_ID'];
	}
	$post['turename'] = trim($_POST['turename']);
	$post['tel'] = trim($_POST['tel']);
	$post['addtime'] = time();

	$line = $db -> row_select_one('products', "p_id=" . intval($_POST['id']),'p_addtime');
	$time_dir = date('Ym', $line['p_addtime']);
	$dir =  HTML_DIR."line/" . $time_dir ;

    $db->row_insert('order',$post);
	showmsg('您的订单已提交成功！我们会尽快和您联系！', $dir."/".intval($_POST['id']).".html");
	
} 
elseif (submitcheck('ac')) {

	//人数
	$adult_nums = intval($_POST['adult_nums']);
	$children_nums = intval($_POST['children_nums']);
	$all_nums =  intval($adult_nums + $children_nums);
	$tpl -> assign('all_nums', $all_nums);
	$tpl -> assign('adult_nums', $adult_nums);
	$tpl -> assign('children_nums', $children_nums);
	
	$data = $db -> row_select_one('products', "p_id=" . intval($_POST['id']));
	if($data){
		// 出发日期
		$departure_date_id = intval($_POST['departure_date']);
		$departure_date_rs = $db -> row_select_one('departure_time', 'id=' . $departure_date_id);
		$departure_date_rs['departure_date'] = date('Y-m-d', $departure_date_rs['departure_time']);
		$tpl -> assign('departure_date', $departure_date_rs);

		//价格
		$adult_price =  $adult_nums*$departure_date_rs['price'];
		$children_price =  $children_nums*$departure_date_rs['child_price'];
		$all_price = $adult_price + $children_price;

		$tpl -> assign('adult_price', $adult_price);
		$tpl -> assign('children_price', $children_price);
		$tpl -> assign('all_price', $all_price);

		$tpl -> assign('line', $data);
		if(!empty($_SESSION['USER_ID'])){
			$userinfo = $db -> row_select_one('member', "id={$_SESSION['USER_ID']}",'turename,tel');
			$tpl -> assign('turename', $userinfo['turename']);
			$tpl -> assign('tel', $userinfo['tel']);
		}
		$tpl -> display('default/' . $settings['templates'] . '/order_two.html');
	}

} 
else {
	//线路详情
	$data = $db -> row_select_one('products', "p_id=" . intval($id));
	$departure_date = intval($_GET['departure_date']);
	
	if($data){
		//出发日期
		$departuredatelist = array();
		$departure_date_list = $db -> row_select('departure_time','pid='.$data['p_id'],'*',0,'orderid');
		foreach($departure_date_list as $key => $value){
			$value['departure_date'] = date('Y-m-d', $value['departure_time']);
			$weekarray = array("日","一","二","三","四","五","六");
			$value['week'] = "星期".$weekarray[date("w",$value['departure_time'])];
			$departuredatelist[$key]['id'] = $value['id'];
			$departuredatelist[$key]['name'] = $value['departure_date']."&nbsp;&nbsp;".$value['week']."&nbsp;&nbsp;".$value['price']."元";
		}
		$arr_departure_date = get_array($departuredatelist, 'id', 'name');
		$select_departure_date = select_make($departure_date, $arr_departure_date, '请选择出发日期');
		$tpl -> assign('select_departure_date', $select_departure_date);
		
		//人数
		$adult_nums = intval($_GET['adult_nums']);
		$children_nums = intval($_GET['children_nums']);
		$tpl -> assign('adult_nums', $adult_nums);
		$tpl -> assign('children_nums', $children_nums);


		$tpl -> assign('line', $data);
		$tpl -> display('default/' . $settings['templates'] . '/order.html');
	}
} 

?>