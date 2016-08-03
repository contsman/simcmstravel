<?php
/*
*/
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '国内游目的地管理';
//允许操作
$ac_arr = array('list'=>'目的地列表','add'=>'添加目的地','edit'=>'编辑目的地','show'=>'改变状态','del'=>'删除目的地','bulkdel'=>'批量删除','bulksort'=>'更新排序');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );


//列表
if ($ac == 'list')
{
    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'area','parentid=0','*','20','orderid');
    $list = $Page->get_data();
	foreach($list as $key => $value ){
		$citylist = $db -> row_select('area', "parentid=".$value['id'], 'id,name,actived,ishot', 0, 'orderid asc');
		$list[$key]['city'] = $citylist;
	}
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
    $tpl->assign( 'arealist', $list );
    $tpl->assign( 'button_basic', $button_basic );
    $tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/area_list.html' );
    exit;
}
//显示
elseif ($ac == 'show')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $status = intval($_GET['actived']);
    $rs = $db->row_update('area',array('actived'=>$status),"id=".$id);
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('area',"id=$id");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('area',array('orderid'=>$_POST['orderid'][$v]),"id=".intval($v));
    }
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('area',"id in($str_id)");
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {
        $arr_not_empty = array('name'=>'名称不可为空','id'=>'代码不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        $post = post('id','name','orderid','parentid','ishot');
        if ($ac == 'add')
        {
			$post['orderid'] = 0;
            $rs = $db->row_insert('area',$post);
        }
        else
        {
            $rs = $db->row_update('area',$post,"id=".intval($_POST['id']));
        }
    }
    //转向添加或修改页面
    else
    {
        if (empty($_GET['id'])) {
			$data = array('id'=>'','name'=>'','orderid'=>'');
			if(empty($_GET['parentid'])){
				$data['parentid'] = 0;
			}
			else{
				$data['parentid'] = $_GET['parentid'];
			}
		}
		else{
			$data = $db->row_select_one('area',"id=".intval($_GET['id']));
		}
        $tpl->assign( 'area', $data );
        $tpl->display( 'admin/add_area.html' );
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