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
$mod_name = '景点管理';
//允许操作
$ac_arr = array('list'=>'景点列表','add'=>'添加景点','edit'=>'编辑景点','del'=>'删除景点','bulkdel'=>'批量删除','bulksort'=>'更新排序');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

//列表
if ($ac == 'list')
{
	$tid = isset($_GET['tid']) ? intval($_GET['tid']) : showmsg('缺少ID',-1);
	$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
    include(INC_DIR.'Page.class.php');
	$Page = new Page($db->tb_prefix.'viewpoint','tid='.$tid,'*','20','id');
    $list = $Page->get_data();
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
	$tpl->assign( 'pid', $_GET['pid'] );
	$tpl->assign( 'tid', $_GET['tid'] );
	$tpl->assign( 'viewpointlist', $list );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/viewpoint_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('viewpoint',"id=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('viewpoint',"id in($str_id)");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('viewpoint',array('orderid'=>$_POST['orderid'][$v]),"id=".intval($v));
    }
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('title'=>'景点名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
		foreach (array('info','scenicinfo') as $v)
        {
            $_POST[$v] = htmlspecialchars($_POST[$v]);
        }
        $post = post('tid','pid','title','info01','info02');
	

		if(!empty($_FILES['pic1']['name'])){
			$targetPath = 'upload/upload/' . date("Y") . '/' . date("m") . '/';
			if (!is_dir($targetPath)) createFolder($targetPath);
			$targetPaths = 'upload/' . date("Y") . '/' . date("m") . '/';
            $newname = md5(time()+1);
			$post['pic01'] = upload_photo($newname, 0 , $targetPaths ,'pic1');
        }

		if(!empty($_FILES['pic2']['name'])){
			$targetPath = 'upload/upload/' . date("Y") . '/' . date("m") . '/';
			if (!is_dir($targetPath)) createFolder($targetPath);
			$targetPaths = 'upload/' . date("Y") . '/' . date("m") . '/';
            $newname = md5(time()+2);
			$post['pic02'] = upload_photo($newname, 0 , $targetPaths ,'pic2');
        }

        if ($ac == 'add')
        {
			$post['orderid'] = 0;
            $rs = $db->row_insert('viewpoint',$post);
			html_products( $post['pid']);
        }
        else
		{ 	
			$rs = $db->row_update('viewpoint',$post,"id=".intval($_POST['id']));
			html_products($post['pid']);
		}
    }
    //转向添加或修改页面
    else 
    {
		$tid = isset($_GET['tid']) ? intval($_GET['tid']) : 0;
		$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
		if (empty($_GET['id'])) $data = array('title'=>'','pic01'=>'','pic02'=>'','info01'=>'','info02'=>'');
        else $data = $db->row_select_one('viewpoint',"id=".intval($_GET['id']));
		$tpl->assign( 'tid', $tid );
		$tpl->assign( 'pid', $pid );
		$tpl->assign( 'viewpoint', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/add_viewpoint.html' );
        exit;
    }
}
//默认操作
else
{
    showmsg('非法操作',-1);
}
if(isset($_REQUEST['tid'])){
	$getpid = "&tid=".intval($_REQUEST['tid']);
}
else{
	$getpid = "";
}
showmsg($ac_arr[$ac].($rs ? '成功' : '失败'),ADMIN_PAGE."?mod=$mod&ac=list".$getpid);
?>