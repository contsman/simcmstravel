<?php
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '旅游顾问管理';
//允许操作
$ac_arr = array('list'=>'旅游顾问列表','add'=>'添加旅游顾问','edit'=>'编辑旅游顾问','del'=>'删除旅游顾问','bulkdel'=>'批量删除');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

//列表
if ($ac == 'list')
{
    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'consultant');
    $list = $Page->get_data();
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
	$tpl->assign( 'consultant', $list );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/consultant_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('consultant',"id=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('consultant',"id in($str_id)");
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('name'=>'姓名不能为空');
        can_not_be_empty($arr_not_empty,$_POST);

        $post = post('name','zhicheng','scope');
        if(!empty($_FILES['upload']['name'])){
			$newname = time();
			$post['pic'] = upload_pic($newname,1,'common/');
		}
		if ($ac == 'add')
        {
            $rs = $db->row_insert('consultant',$post);
        }
        else
		{ 	
			$rs = $db->row_update('consultant',$post,"id=".intval($_POST['id']));
		}
    }
    //转向添加或修改页面
    else 
    {	 	 	 	 	 	
		if (empty($_GET['id'])) $data = array('id'=>'','name'=>'','zhicheng'=>'','scope'=>'','pic'=>'');
        else $data = $db->row_select_one('consultant',"id=".intval($_GET['id']));

		$tpl->assign( 'consultant', $data );
        $tpl->display( 'admin/add_consultant.html' );
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