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
    $friendlink = new page($db->tb_prefix.'visa_category','1=1','*','20','orderid');
    $list = $friendlink->get_data();
    $button_basic = $friendlink->button_basic();
    $button_select = $friendlink->button_select();
	$tpl->assign( 'categorylist', $list );
    $tpl->display( 'admin/visa_category_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $catid = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('visa_category',"catid=$catid");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('visa_category',"catid in($str_id)");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('visa_category',array('orderid'=>$_POST['orderid'][$v]),"catid=".intval($v));
    }
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('catname'=>'分类名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        $post = post('catname','orderid','orderid');
        $post['orderid'] = !empty($post['orderid']) ? intval($post['orderid']) : 0;
        if ($ac == 'add')
        {
            $rs = $db->row_insert('visa_category',$post);
        }
        else
		{ 	
			$rs = $db->row_update('visa_category',$post,"catid=".intval($_POST['catid']));
		}
    }
    //转向添加或修改页面
    else 
    {
		if (empty($_GET['id']))
		{
            $data = array('catid'=>'','catname'=>'','orderid'=>'');
        }
        else
		{
            $data = $db->row_select_one('visa_category',"catid=".intval($_GET['id']));
        }
		$tpl->assign( 'category', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/add_visa_category.html' );
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