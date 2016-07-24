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
$mod_name = '信息管理';
//允许操作
$ac_arr = array('list'=>'信息列表','add'=>'添加信息','edit'=>'编辑信息','del'=>'删除信息','bulkdel'=>'批量删除','html'=>'生成静态','bulkhtml'=>'批量生成静态');
//当前操作
$ac = isset($_REQUEST['ac']) && isset($ac_arr[$_REQUEST['ac']]) ? $_REQUEST['ac'] : 'default';

$tpl->assign( 'mod_name', $mod_name );
$tpl->assign( 'ac_arr', $ac_arr );
$tpl->assign( 'ac', $ac );

//列表
if ($ac == 'list')
{	
	$where = '1=1';
    //搜索条件
	$newssort = '';
    if (!empty($_GET['catid']))
    {
        $catid = intval($_GET['catid']);
        $where .= " AND catid = $catid";
    }
	else{
		$catid = "";
	}
    if (!empty($_GET['keywords']))
    {
        $keywords = $_GET['keywords'];
        $where .= " AND n_title LIKE '%{$keywords}%'";
    }
	
	$select_category = select_category('news_category',$catid, 'name="catid" id="catid"', '-全部分类-', $catid);

    include(INC_DIR.'Page.class.php');
    $Page = new Page($db->tb_prefix.'news',$where,'*','20','n_id desc');
    $list = $Page->get_data();
	foreach($list as $key => $value){
		$arr_news_category = array_category('news_category');
		$list[$key]['n_category'] = $arr_news_category[$value['catid']];
		$list[$key]['n_addtime'] = date('Y-m-d H:i:s',$value['n_addtime']);
		$list[$key]['n_typename'] = $value['n_type']==1?"<span class='orange01'>推荐信息</span>":"普通信息";
		$time_dir = date('Ym', $value['n_addtime']);
		$list[$key]['n_url'] = WEB_URL . "/" . HTML_DIR . "news/" . $time_dir . "/" . $value['n_id'].".html";
	}
    $button_basic = $Page->button_basic();
    $button_select = $Page->button_select();
	$tpl->assign( 'selectcategory', $select_category );
	$tpl->assign( 'newslist', $list );
	$tpl->assign( 'button_basic', $button_basic );
	$tpl->assign( 'button_select', $button_select );
    $tpl->display( 'admin/news_list.html' );
    exit;
}
//单条删除
elseif ($ac == 'del')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = $db->row_delete('news',"n_id=$id");
}
//批量删除
elseif ($ac == 'bulkdel')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
    $str_id = return_str_id($_POST['bulkid']);
    $rs = $db->row_delete('news',"n_id in($str_id)");
}
//单条生成静态
elseif ($ac == 'html')
{
    $id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
    $rs = html_news($id);
}
//批量生成静态
elseif ($ac == 'bulkhtml')
{
    if (empty($_POST['bulkid'])) showmsg('没有选中任何项',-1);
	foreach($_POST['bulkid'] as $key => $value) {
		$rs = html_news($value);
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
        $post = post('n_title','n_info','n_author','n_keywords','catid','n_type');
        $post['catid'] = intval($post['catid']);
		$post['n_type'] = intval($post['n_type']);
		if(!empty($_FILES['upload']['name'])){
            $newname = time();
            $post['n_pic'] = upload_pic($newname,1,'upload/');
			$bsrc = "upload/upload/".$post['n_pic'];
			$ssrc = "upload/small/".$post['n_pic'];
			include(INC_DIR.'img.class.php');

			//生成缩略图
			if($settings['isdstimg']==1){
				copy($bsrc,$ssrc);
				$ts = new ThumbHandler();
				$ts->setSrcImg($ssrc);
				$ts->setDstImg($ssrc);
				$settings['imgwidth'] = !empty($settings['imgwidth']) ? $settings['imgwidth'] : 150;
				$settings['imgheight'] = !empty($settings['imgheight']) ? $settings['imgheight'] : 150;
				$ts->createImg($settings['imgwidth'],$settings['imgheight']);
			}
			//加水印
			if($settings['water']==1){
				$t = new ThumbHandler();
				$t->setSrcImg($bsrc);
				$t->setDstImg($bsrc);
				$t->setMaskImg("static/img/watermark.png");
				$t->createImg(100);
			}
        }
		//信息分类
        $rs_category = $db->row_select_one('news_category',"catid=".intval($post['catid']));
        if (!$rs_category) showmsg('错语的分类',-1);
        $post['catid'] = intval($rs_category['catid']);
        if ($ac == 'add')
        {
			$post['n_addtime'] = time();
			$post['n_hits'] = 0;
            $rs = $db->row_insert('news',$post);
			$insertid = $db -> insert_id();
			html_news(intval($insertid));
        }
        else
		{ 	
			$rs = $db->row_update('news',$post,"n_id=".intval($_POST['id']));
			html_news(intval($_POST['id']));
		}

    }
    //转向添加或修改页面
    else 
    {
		if (empty($_GET['id'])) $data = array('n_id'=>'','n_title'=>'','n_info'=>'','n_author'=>'','n_keywords'=>'','n_pic'=>'','n_url'=>'','catid'=>'','n_type'=>'');
        else $data = $db->row_select_one('news',"n_id=".intval($_GET['id']));
		
		$select_category = select_category('news_category',$data['catid'], 'name="catid" id="catid"', '-全部分类-', $data['catid']);
		$select_newstype = select_make($data['n_type'],array('普通信息','推荐信息'));
		$tpl->assign( 'selectcategory', $select_category );
		$tpl->assign( 'select_newstype', $select_newstype );
		$tpl->assign( 'news', $data );
		$tpl->assign( 'ac', $ac );
        $tpl->display( 'admin/add_news.html' );
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