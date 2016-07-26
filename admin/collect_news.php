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
$mod_name = '临时信息管理';
//允许操作
$ac_arr = array('list'=>'信息列表','add'=>'添加信息','edit'=>'编辑信息','del'=>'删除信息','bulkdel'=>'批量删除','import'=>'导入','bulkimport'=>'批量导入');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name);
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

//列表
if ($ac == 'list')
{	
	$where = '1=1';

    if (!empty($_GET['keywords']))
    {
        $keywords = $_GET['keywords'];
        $where .= " AND n_title LIKE '%{$keywords}%'";
    }
	
    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'collect',$where,'*','20','n_id desc');
    $list = $Page->get_data();
	foreach($list as $key => $value){
		$list[$key]['n_addtime'] = date('Y-m-d H:i:s',$value['n_addtime']);
	}
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
	$tpl->assign( 'newslist', $list );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/collect_news_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('collect',"n_id=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('collect',"n_id in($str_id)");
}
//单条导入
elseif ($ac == 'import')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
		$id = isset($_POST['id']) ? intval($_POST['id']) : showmsg('缺少ID',-1);
		$catid = isset($_POST['catid']) ? intval($_POST['catid']) : showmsg('缺少分类ID',-1);;
		$data = $db->row_select_one('collect',"n_id=".$id);
        $post['n_addtime'] = time();
		$post['n_title'] = $data['n_title'];
		$post['n_info'] = $data['n_info'];
		$post['catid'] = $catid;
		$post['n_hits'] = 0;
        $rs = $db->row_insert('news',$post);
		$insertid = $db -> insert_id();
		html_news(intval($insertid));

    }
    //转向添加或修改页面
    else 
    {	
		$id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
		$select_category = select_category('news_category','', 'name="catid" id="catid"', '-全部分类-', '');
        $tpl->assign( 'selectcategory', $select_category );
		$tpl->assign( 'id', $id );
		$tpl->display( 'admin/import.html' );
        exit;
    }
}
//批量导入
elseif ($ac == 'bulkimport')
{	//添加或修改
    if (submitcheck('ac'))
    {	
		$ids = isset($_POST['ids']) ? $_POST['ids'] : showmsg('缺少ID',-1);
		$catid = isset($_POST['catid']) ? intval($_POST['catid']) : showmsg('缺少分类ID',-1);
		$array_ids = explode(',',$ids);
		foreach($array_ids as $value){
			$data = $db->row_select_one('collect',"n_id=".$value);
			$post['n_addtime'] = time();
			$post['n_title'] = $data['n_title'];
			$post['n_info'] = $data['n_info'];
			$post['catid'] = $catid;
			$post['n_hits'] = 0;
			$rs = $db->row_insert('news',$post);
		}

    }
    //转向添加或修改页面
    else 
    {	
		if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
		$str_id = return_str_id($_POST['bulkid']);
		$select_category = select_category('news_category','', 'name="catid" id="catid"', '-全部分类-', '');
        $tpl->assign( 'selectcategory', $select_category );
		$tpl->assign( 'ids', $str_id );
		$tpl->display( 'admin/import.html' );
        exit;
    }
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {	
        $arr_not_empty = array('n_title'=>'信息标题不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        foreach (array('n_info') as $v)
        {
            $_POST[$v] = htmlspecialchars($_POST[$v]);
        }
        $post = post('n_title','n_info');
		if(!empty($_FILES['upload']['name'])){
            $newname = time();
            $post['n_pic'] = upload_pic($newname,1);
        }
        if ($ac == 'add')
        {
			$post['n_addtime'] = time();
			$post['n_hits'] = 0;
            $rs = $db->row_insert('collect',$post);
			$insertid = $db -> insert_id();
        }
        else
		{ 	
			$rs = $db->row_update('collect',$post,"n_id=".intval($_POST['id']));
		}

    }
    //转向添加或修改页面
    else 
    {
		if (empty($_GET['id'])) $data = array('n_id'=>'','n_title'=>'','n_info'=>'');
        else $data = $db->row_select_one('collect',"n_id=".intval($_GET['id']));
		$tpl->assign( 'news', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/add_collect_news.html' );
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