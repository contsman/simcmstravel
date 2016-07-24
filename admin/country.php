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
$mod_name = '出境游目的地管理';
//允许操作
$ac_arr = array('list'=>'目的地列表','add'=>'添加目的地','edit'=>'编辑目的地','del'=>'删除目的地','bulkdel'=>'批量删除','bulksort'=>'更新排序');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );


//列表
if ($ac == 'list')
{
    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'country','parentid=-1','*','20','orderid');
    $list = $Page->get_data();
	foreach($list as $key => $value ){
		$countrylist = $db -> row_select('country', "parentid=".$value['id'], 'id,name', 0, 'orderid asc');
		foreach($countrylist as $k => $v){
			$citylist = $db -> row_select('country', "parentid=".$v['id'], 'id,name', 0, 'orderid asc');
			$countrylist[$k]['city'] = $citylist;
		}
		$list[$key]['country'] = $countrylist;
	}
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
    $tpl->assign( 'list', $list );
    $tpl->assign( 'button_basic', $button_basic );
    $tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/country_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('country',"id=$id");
}
//批量排序
elseif ($ac == 'bulksort')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    foreach ($_POST['bulkid'] as $k => $v)
    {
        $rs = $db->row_update('country',array('orderid'=>$_POST['orderid'][$v]),"id=".intval($v));
    }
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('country',"id in($str_id)");
}
//添加
elseif ($ac == 'add' || $ac == 'edit')
{
    //添加或修改
    if (submitcheck('ac'))
    {
        $arr_not_empty = array('name'=>'名称不可为空');
        can_not_be_empty($arr_not_empty,$_POST);
        $post = post('id','name','orderid','parentid');
        if ($ac == 'add')
        {
			$post['orderid'] = 0;
            $rs = $db->row_insert('country',$post);
        }
        else
        {
            $rs = $db->row_update('country',$post,"id=".intval($_POST['id']));
        }
    }
    //转向添加或修改页面
    else
    {
        if (empty($_GET['id'])) {
			$data = array('id'=>'','name'=>'','orderid'=>'');
			if(empty($_GET['parentid'])){
				$data['parentid'] = -1;
			}
			else{
				$data['parentid'] = $_GET['parentid'];
			}
		}
		else{
			$data = $db->row_select_one('country',"id=".intval($_GET['id']));
		}
        $tpl->assign( 'country', $data );
        $tpl->display( 'admin/add_country.html' );
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