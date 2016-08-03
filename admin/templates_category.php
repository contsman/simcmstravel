<?php
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '模版管理';
//允许操作
$ac_arr = array('list'=>'模版列表','add'=>'添加模版','edit'=>'编辑模版','del'=>'删除模版','bulkdel'=>'批量删除','bulksort'=>'更新排序');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

//列表
if ($ac == 'list')
{	
	$dir = "templates/default/";

	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				$filetype = filetype($dir . $file);
				$post['filename'] = $file;
				if($filetype=="dir" and $file!="." and $file!=".."){
					$configflie = "templates/default/".$file."/config.php";
					if(file_exists($configflie)){
						 $config = require($configflie);
						 $list[] = $config;
					}
				}
			} 
			closedir($dh);
		} 
	} 
	
	//print_r($list);

	$tpl->assign( 'templates_category_list', $list );
    $tpl->display( 'admin/templates_category_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('templates_category',"id=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('templates_category',"id in($str_id)");
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('c_name'=>'模版名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        $post = post('c_name','c_url','c_target');
        if ($ac == 'add')
        {
			$post['c_orderid'] = 0;
            $rs = $db->row_insert('templates_category',$post);
        }
        else
		{ 	
			$rs = $db->row_update('templates_category',$post,"id=".intval($_POST['id']));
		}
    }
    //转向添加或修改页面
    else 
    {
		if (empty($_GET['id'])) $data = array('c_name'=>'','c_url'=>'','c_target'=>'');
        else $data = $db->row_select_one('templates_category',"id=".intval($_GET['id']));

		$tpl->assign( 'templates_category', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/add_templates_category.html' );
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