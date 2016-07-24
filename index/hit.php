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

$id = isset($_GET['id']) ? intval($_GET['id']) : showmsg('缺少ID',-1);
$rs = $db->query_unbuffered("update ".$db->tb_prefix."news set n_hits = n_hits+1 where n_id=".$id);
$data = $db->row_select_one('news',"n_id=".$id,"n_hits");
echo "document.write('".$data['n_hits']."');";
?>