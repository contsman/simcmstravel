<?php
/*
锦尚中国站长分享圈子 bbs.52jscn.com
*/
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '分类管理';

//允许操作
$ac_arr = array('list'=>'分类列表','add'=>'添加分类','edit'=>'编辑分类','del'=>'删除分类','bulkdel'=>'批量删除','bulksort'=>'更新排序');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

//列表
if ($ac == 'list')
{
    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'service_sorts','1=1','*','20','orderid');
    $list = $Page->get_data();
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
	$tpl->assign( 'sortlist', $list );
    $tpl->display( 'admin/servicesort_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $s_id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('service_sorts',"s_id=$s_id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('service_sorts',"s_id in($str_id)");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('service_sorts',array('orderid'=>$_POST['orderid'][$v]),"s_id=".intval($v));
    }
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('s_name'=>'分类名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        $post = post('s_name','s_dir','orderid','orderid');
		if(!is_dir("service")) createFolder("service");
        $post['orderid'] = !empty($post['orderid']) ? intval($post['orderid']) : 0;
        if ($ac == 'add')
        {
            $rs = $db->row_insert('service_sorts',$post);
        }
        else
		{ 	
			$rs = $db->row_update('service_sorts',$post,"s_id=".intval($_POST['s_id']));
		}
    }
    //转向添加或修改页面
    else 
    {
		if (empty($_GET['id']))
		{
            $data = array('s_id'=>'','s_name'=>'','orderid'=>'');
        }
        else
		{
            $data = $db->row_select_one('service_sorts',"s_id=".intval($_GET['id']));
        }
		$tpl->assign( 'sort', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/add_servicesort.html' );
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