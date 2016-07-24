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
$dir = "templates/default/default/";

if (is_dir($dir)) {
	if ($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			$filetype = filetype($dir . $file);
			$post['filename'] = $file;
			if($filetype!="dir"){
				$rs = $db -> row_insert('templates', $post);
			}
		} 
		closedir($dh);
	} 
} 
?>