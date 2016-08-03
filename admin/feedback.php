<?php
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '留言管理';
//允许操作
$ac_arr = array('list'=>'留言列表','check'=>'审核留言','edit'=>'回复留言','del'=>'删除留言','bulkdel'=>'批量删除');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

/*车源评估列表*/
 if( $ac=="list"){

	include(INC_DIR.'Page.class.php');
	$Page = new Page($db->tb_prefix.'feedback','1=1', '*', '20', 'f_addtime desc');
	$list = $Page->get_data();
	foreach($list as $k=>$v){
	   $list[$k]['f_addtime']  = date('Y-m-d H:i:s',$v['f_addtime']);
	}
	$button_basic = $Page->button_basic();
	$button_select = $Page->button_select();
	$tpl->assign( 'feedback', $list );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
	$tpl->display( 'admin/feedback_list.html' );
	exit;
}
//单条审核
elseif ($ac == 'check')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
	$status = intval($_GET['isshow'])==1 ? 0 : 1;
    $rs = $db->row_update('feedback',array('is_show'=>$status),"f_id=".$id);
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('feedback',"f_id=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('feedback',"f_id in($str_id)");
}
//添加
elseif ( $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        foreach (array('f_reply') as $v)
        {
            $_POST[$v] = htmlspecialchars($_POST[$v]);
        }
		$post['is_show'] = post('is_show');
		$post['f_reply'] = post('f_reply');
		$rs = $db->row_update('feedback',$post,"f_id=".intval($_POST['id']));
    }
    //转向添加或修改页面
    else 
    {
		if (empty($_GET['id'])) $data = array('feedback'=>'');
        else $data = $db->row_select_one('feedback',"f_id=".intval($_GET['id']));
		$tpl->assign( 'feedback', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/reply_feedback.html' );
        exit;
    }
}
else
{
    showmsg('非法操作',-1);
}

showmsg($ac_arr[$ac].($rs ? '成功' : '失败'),ADMIN_PAGE."?mod=$mod&ac=list");
?>