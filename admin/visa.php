<?php
if (!defined('APP_IN')) exit('Access Denied');

//当前模块
$mod_name = '签证管理';
//允许操作
$ac_arr = array('list'=>'签证列表','add'=>'添加签证','edit'=>'编辑签证','del'=>'删除签证','bulkdel'=>'批量删除','bulksort'=>'更新排序','html'=>'生成静态','bulkhtml'=>'批量生成静态');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

$array_visa_category = arr_visa_category();
$array_continent = arr_continent();
$array_country = arr_country();

//列表
if ($ac == 'list')
{
	$where = '1=1';
    //搜索条件
    if (!empty($_GET['keywords']))
    {
        $keywords = $_GET['keywords'];
        $where .= " AND title LIKE '%{$keywords}%'";
    }

	if (!empty($_GET['zid']))
    {
        $where .= " AND zid =".$_GET['zid'];
    }

	$select_continent = select_make($_GET['zid'],$array_continent,'请选择大洲');

    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'visa',$where,'*','20','orderid');
    $list = $Page->get_data();
	foreach($list as $key => $value){
		$list[$key]['catname'] = $array_visa_category[$value['catid']];
	}
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
    $tpl->assign( 'visalist', $list );
	$tpl->assign( 'selectcontinent', $select_continent );
    $tpl->assign( 'button_basic', $button_basic );
    $tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/visa_list.html' );
    exit;
}
//单条生成静态
elseif ($ac == 'html')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = html_visa($id);
}
//批量生成静态
elseif ($ac == 'bulkhtml')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
	foreach($_POST['bulkid'] as $key => $value) {
		$rs = html_visa($value);
	} 
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('visa',"id=$id");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('visa',array('orderid'=>$_POST['orderid'][$v]),"id=".intval($v));
    }
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('visa',"id in($str_id)");
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {
        $arr_not_empty = array('title'=>'名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
		foreach (array('info') as $v)
        {
            $_POST[$v] = htmlspecialchars($_POST[$v]);
        }
        $post = post('id','catid','title','info','zid','cid','oldprice','price','orderid','ishome','fee','processtime','crowd');
		if(empty($post['ishome'])) $post['ishome']=0;
		if(!empty($_FILES['upload']['name'])){
           $newname = time();
          echo  $post['pic'] = upload_pic($newname,1,'common');
        }
        if ($ac == 'add')
        {
			$post['orderid'] = 0;
            $rs = $db->row_insert('visa',$post);
			$insertid = $db -> insert_id();
			html_visa(intval($insertid));
        }
        else
        {
            $rs = $db->row_update('visa',$post,"id=".intval($_POST['id']));
			html_visa(intval($_POST['id']));
        }
    }
    //转向添加或修改页面
    else
    {
        if (empty($_GET['id'])) $data = array('id'=>'','catid'=>'','title'=>'','info'=>'','oldprice'=>'','price'=>'','zid'=>'','cid'=>'','orderid'=>'','fee'=>'','processtime'=>'','crowd'=>'');
        else $data = $db->row_select_one('visa',"id=".intval($_GET['id']));
		$select_continent = select_make($data['zid'],$array_continent,'请选择大洲');
		$select_country = select_make($data['cid'],$array_country,'请选择国家');
		$select_visa_category = select_make($data['catid'],$array_visa_category,'请选择分类');
		$tpl->assign( 'selectvisacategory', $select_visa_category );
		$tpl->assign( 'selectcontinent', $select_continent );
		$tpl->assign( 'selectcountry', $select_country );
        $tpl->assign( 'visa', $data );
        $tpl->display( 'admin/add_visa.html' );
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