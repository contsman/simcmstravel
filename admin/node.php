<?php
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '节点管理';

//允许操作
$ac_arr = array('list'=>'节点列表','add'=>'添加节点','edit'=>'编辑节点','del'=>'删除节点','bulkdel'=>'批量删除','bulksort'=>'更新排序');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

//列表
if ($ac == 'list')
{
    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'node');
    $list = $Page->get_data();
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
	$tpl->assign( 'nodelist', $list );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/node_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('node',"id=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('node',"id in($str_id)");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('node',array('orderid'=>$_POST['orderid'][$v]),"id=".intval($v));
    }
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('name'=>'节点名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        $post = post('name','url','startpage','endpage','list_list_tagname','list_list_classname','list_list_idname','list_title_tagname','list_title_classname','list_title_idname','news_news_tagname','news_news_classname','news_news_idname','news_title_tagname','news_title_classname','news_title_idname','news_content_tagname','news_content_classname','news_content_idname','title_filter','content_filter','ispic');
        if ($ac == 'add')
        {
            $rs = $db->row_insert('node',$post);
        }
        else
		{ 	
			$rs = $db->row_update('node',$post,"id=".intval($_POST['id']));
		}
    }
    //转向添加或修改页面
    else 
    {
		if (empty($_GET['id']))
		{
            $data = array('id'=>'','name'=>'','url'=>'','startpage'=>'','endpage'=>'','list_list_tagname'=>'','list_list_classname'=>'','list_list_idname'=>'','list_title_tagname'=>'','list_title_classname'=>'','list_title_idname'=>'','news_news_tagname'=>'','news_news_classname'=>'','news_news_idname'=>'','news_title_tagname'=>'','news_title_classname'=>'','news_title_idname'=>'','news_content_tagname'=>'','news_content_classname'=>'','news_content_idname'=>'','title_filter'=>'','content_filter'=>'','ispic'=>'');
        }
        else
		{
            $data = $db->row_select_one('node',"id=".intval($_GET['id']));
        }
		$tpl->assign( 'node', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/add_node.html' );
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