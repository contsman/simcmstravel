<?php
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '会员管理';
//允许操作
$ac_arr = array('list'=>'会员列表','add'=>'添加会员','edit'=>'编辑会员','lock'=>'锁定会员','unlock'=>'解锁会员','del'=>'删除会员','bulkdel'=>'批量删除');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

if (!empty($_GET['ajax']) and !empty($_GET['email']))
{	
	$data = $db->row_count('member',"email='".$_GET['email']." and '");
    if($data==0){
		echo 1;
	}
	else{
		echo 0;
	}
	exit;
}

//列表
if ($ac == 'list')
{	
	$where = "1=1";
	if(!empty($_GET['keywords'])){
		$where = "email like '%".$_GET['keywords']."%' or turename like '%".$_GET['keywords']."%'";
	}
    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'member',$where,'*','20','id desc');
    $list = $Page->get_data();
	foreach($list as $key => $value){
		$list[$key]['regtime'] = date('Y-m-d H:i:s',$value['regtime']);
		$list[$key]['last_login_time'] = date('Y-m-d H:i:s',$value['last_login_time']);	
	}
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
    $tpl->assign( 'memberlist', $list );
    $tpl->assign( 'button_basic', $button_basic );
    $tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/member_list.html' );
    exit;
}
//锁定
elseif ($ac == 'lock')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_update('member',array('status' => '0'),"id=".$id);
}
//解锁
elseif ($ac == 'unlock')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_update('member',array('status' => '1'),"id=".$id);
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('member',"id=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('member',"id in($str_id)");
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {
        $arr_not_empty = array('email'=>'邮箱不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        $post = post('email','turename','tel');
		if(!empty($_POST['password'])){
			$post['password'] = md5($_POST['password']);
		}
        if ($ac == 'add')
        {
            $rs = $db->row_insert('member',$post);
        }
        else
        {
            $rs = $db->row_update('member',$post,"id=".intval($_POST['id']));
        }
    }
    //转向添加或修改页面
    else
    {
        if (empty($_GET['id'])) {
			$data = array('id'=>'','email'=>'','turename'=>'','tel'=>'');
		}
		else{
			$data = $db->row_select_one('member',"id=".intval($_GET['id']));
		}
        $tpl->assign( 'member', $data );
        $tpl->display( 'admin/add_member.html' );
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