<?php
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '行程管理';
//允许操作
$ac_arr = array('list'=>'行程列表','add'=>'添加行程','edit'=>'编辑行程','del'=>'删除行程','bulkdel'=>'批量删除','bulksort'=>'更新排序');
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
	$Page = new Page($db->tb_prefix.'trip','pid='.$pid,'*','20','id,orderid');
    $list = $Page->get_data();
	foreach($list as $key => $value){
		$viewlist = $db -> row_select('viewpoint', "tid=".$value['id'], 'id,title', 0, 'orderid asc');
		$list[$key]['viewpointlist'] = $viewlist;
	}
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
	$tpl->assign( 'pid', $_GET['pid'] );
	$tpl->assign( 'triplist', $list );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/trip_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $c_id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('trip',"id=$c_id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('trip',"id in($str_id)");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('trip',array('orderid'=>$_POST['orderid'][$v]),"id=".intval($v));
    }
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('title'=>'行程名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
		foreach (array('info','scenicinfo') as $v)
        {
            $_POST[$v] = htmlspecialchars($_POST[$v]);
        }
        $post = post('pid','title','info','scenictitle','scenicinfo');
        if ($ac == 'add')
        {
			$post['orderid'] = 0;
            $rs = $db->row_insert('trip',$post);
			html_products( $post['pid']);
        }
        else
		{ 	
			$rs = $db->row_update('trip',$post,"id=".intval($_POST['id']));
			html_products($post['pid']);
		}
    }
    //转向添加或修改页面
    else 
    {
		$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
		if (empty($_GET['id'])) $data = array('title'=>'','info'=>'','scenictitle'=>'','scenicinfo'=>'',);
        else $data = $db->row_select_one('trip',"id=".intval($_GET['id']));
		$tpl->assign( 'pid', $pid );
		$tpl->assign( 'trip', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/add_trip.html' );
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