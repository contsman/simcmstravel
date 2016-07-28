<?php
/**
 * @copyright littlemao
 * @author littlemao
 * @邮箱:littlemao2007@126.com
 * @qq:61815441
 */
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '关键字管理';
//允许操作
$ac_arr = array('list'=>'关键字列表','add'=>'添加关键字','edit'=>'编辑关键字','del'=>'删除关键字','bulkdel'=>'批量删除');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';
//类型
//$k_type = array('0'=>'出境游','1'=>'国内游','2'=>'自由行');
$k_type = arr_category();

$tpl->assign( 'k_type',$k_type);
$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

/*关键字列表*/
 if( $ac=="list"){
	
	$where = "1=1";
	include(INC_DIR.'Page.class.php');
	$Page = new Page($db->tb_prefix.'keyword',$where,'*','20','k_type');
	$list = $Page->get_data();
	$kw = array();
	foreach($list as $k=>$v)
	{
		$v['k_keyword'] = (strlen($v['k_keyword'])>20) ? _substr($v['k_keyword'],0,20) : $v['k_keyword'];
		$kw[$k] = $v;
	}
	$button_basic = $Page->button_basic();
	$button_select = $Page->button_select();
	$tpl->assign( 'keyword', $kw );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
	$tpl->display( 'admin/keyword_list.html' );
	exit;
}
//单条删除
elseif ($ac == 'del')
{
    $l_id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('keyword',"k_id=$l_id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('keyword',"k_id in($str_id)");
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('k_keyword'=>'关键字不能为空');
        can_not_be_empty($arr_not_empty,$_POST);
        foreach (array('k_keyword') as $v)
        {
            $_POST[$v] = htmlspecialchars($_POST[$v]);
        }
        $post = post('k_id','k_keyword','k_type');
		$post['k_type'] = intval($post['k_type']);
		$post['k_id'] = intval($post['k_id']);
		if ($ac == 'add')
        {
            $rs = $db->row_insert('keyword',$post);
        }
        else
		{ 	
			$rs = $db->row_update('keyword',$post,"k_id=".intval($_POST['k_id']));
		}
    }
    //转向添加或修改页面
    else 
    {	 	 	 	 	 	
		if (empty($_GET['id'])) $data = array('k_id'=>'','k_keyword'=>'','k_type'=>'');
        else $data = $db->row_select_one('keyword',"k_id=".intval($_GET['id']));

		$tpl->assign( 'keyword', $data );
        $tpl->display( 'admin/add_keyword.html' );
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