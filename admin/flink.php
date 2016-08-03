<?php
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '友情链接管理';
//允许操作
$ac_arr = array('list'=>'链接列表','add'=>'添加链接','edit'=>'编辑链接','del'=>'删除链接','bulkdel'=>'批量删除','bulksort'=>'更新排序');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );


//列表
if ($ac == 'list')
{
    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'friendlink','1=1','*','20','l_orderid');
    $list = $Page->get_data();
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
    $tpl->assign( 'flinklist', $list );
    $tpl->assign( 'button_basic', $button_basic );
    $tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/flink_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $l_id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('friendlink',"l_id=$l_id");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('friendlink',array('l_orderid'=>$_POST['orderid'][$v]),"l_id=".intval($v));
    }
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('friendlink',"l_id in($str_id)");
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {
        $arr_not_empty = array('l_name'=>'链接名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        foreach (array('l_address','l_name','l_note','is_show') as $v)
        {
            $_POST[$v] = htmlspecialchars($_POST[$v]);
        }
        $post = post('l_address','l_name','l_note','is_show');
        $post['s_id'] = intval($post['s_id']);
        $post['is_show'] = intval($post['is_show']);
        if(!empty($_FILES['upload']['name'])){
            $newname = time();
            $post['l_pic'] = upload_pic($newname,1);
        }
        if ($ac == 'add')
        {
			$post['l_orderid'] = 0;
            $rs = $db->row_insert('friendlink',$post);
        }
        else
        {
            $rs = $db->row_update('friendlink',$post,"l_id=".intval($_POST['l_id']));
        }
    }
    //转向添加或修改页面
    else
    {
        if (empty($_GET['id'])) $data = array('l_address'=>'','l_name'=>'','l_note'=>'','is_show'=>'','l_pic'=>'','l_orderid'=>'');
        else $data = $db->row_select_one('friendlink',"l_id=".intval($_GET['id']));
        $select_show = select_make($data['is_show'],array('1'=>'是','0'=>'否'));
		$tpl->assign( 'selectshow', $select_show );
        $tpl->assign( 'link', $data );
        $tpl->display( 'admin/add_flink.html' );
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