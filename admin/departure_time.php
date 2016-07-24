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

//当前模块
$mod_name = '线路出发日期管理';
//允许操作
$ac_arr = array('list'=>'出发日期列表','add'=>'添加出发日期','edit'=>'编辑出发日期','del'=>'删除出发日期','bulkdel'=>'批量删除','bulksort'=>'更新排序');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

//列表
if ($ac == 'list')
{
	$pid = isset($_GET['pid']) ? intval($_GET['pid']) : showmsg('缺少ID',-1);
    include(INC_DIR.'Page.class.php');
	$Page = new Page($db->tb_prefix.'departure_time','pid='.$pid,'*','20','departure_time');
    $list = $Page->get_data();
	foreach($list as $key => $value){
		$list[$key]['departure_time'] = date('Y-m-d', $value['departure_time']);
	}
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
	$tpl->assign( 'pid', $_GET['pid'] );
	$tpl->assign( 'departure_timelist', $list );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/departure_time_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('departure_time',"id=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('departure_time',"id in($str_id)");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('departure_time',array('orderid'=>$_POST['orderid'][$v]),"id=".intval($v));
    }
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $post = post('pid','price','child_price');
		$departure_time = explode('-', $_POST['departure_time']);
		$post['departure_time'] = mktime(0,0,0,$departure_time[1],$departure_time[2],$departure_time[0]);
        if ($ac == 'add')
        {
			$post['orderid'] = 0;
            $rs = $db->row_insert('departure_time',$post);
			html_products($post['pid']);
        }
        else
		{ 	
			$rs = $db->row_update('departure_time',$post,"id=".intval($_POST['id']));
			html_products($post['pid']);
		}
    }
    //转向添加或修改页面
    else 
    {
		$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
		if (empty($_GET['id'])){
			$data = array('departure_time'=>'','price'=>'','child_price'=>'');
		}
        else{ 
			$data = $db->row_select_one('departure_time',"id=".intval($_GET['id']));
			$data['departure_time'] = date('Y-m-d', $data['departure_time']);
		}
		$tpl->assign( 'pid', $pid );
		$tpl->assign( 'departure_time', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/add_departure_time.html' );
        exit;
    }
}
//默认操作
else
{
    showmsg('非法操作',-1);
}
if(isset($_REQUEST['pid'])){
	$getpid = "&pid=".intval($_REQUEST['pid']);
}
else{
	$getpid = "";
}
showmsg($ac_arr[$ac].($rs ? '成功' : '失败'),ADMIN_PAGE."?mod=$mod&ac=list".$getpid);
?>