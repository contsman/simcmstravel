<?php
/*
 wtc0913@163.com
*/

include('../common.inc.php');

if(@$_REQUEST['session_id'] && ($session_id=$_REQUEST['session_id']) !=session_id()){
    session_destroy();
    session_id($session_id);
    @session_start();
}

if(empty($_SESSION['ADMIN_UID'])){
	exit("未登录");
}

$settings = settings();

function new_name($filename) {
	$ext = pathinfo($filename);
	$ext = $ext['extension'];
	if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'gif' || $ext == 'GIF' || $ext == 'png') {
		if ($ext == 'JPG') $ext = 'jpg';
		if ($ext == 'GIF') $ext = 'gif';
		$name = basename($filename, $ext);
		$name = md5($name . time()) . '.' . $ext;
		return $name;
	} else {
		return;
	}
}
// 上传图片
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/upload/' . date("Y") . '/' . date("m") . '/';
	if (!is_dir($targetPath)) createFolder($targetPath);
	$targetPaths = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/small/' . date("Y") . '/' . date("m") . '/';
	if (!is_dir($targetPaths)) createFolder($targetPaths);
	$new_file_name = new_name($_FILES['Filedata']['name']);
	$targetFile = str_replace('//', '/', $targetPath) . $new_file_name;
	$targetFiles = str_replace('//', '/', $targetPaths) . $new_file_name;

	move_uploaded_file($tempFile, $targetFile);
	copy($targetFile, $targetFiles);

	require_once dirname(dirname(__FILE__)) . '/include/img.class.php';

	// 生成缩略图
	if ($settings['isdstimg'] == 1) {
		$ts = new ThumbHandler();
		$ts -> setSrcImg($targetFiles);
		$ts -> setDstImg($targetFiles);
		$settings['imgwidth'] = !empty($settings['imgwidth']) ? $settings['imgwidth'] : 150;
		$settings['imgheight'] = !empty($settings['imgheight']) ? $settings['imgheight'] : 150;
		$ts -> createImg($settings['imgwidth'], $settings['imgheight']);
		$t = new ThumbHandler();
		$t -> setSrcImg($targetFile);
		$t -> setDstImg($targetFile);
		$t -> createImg('600', '600');
	}

	// 加水印
	/*if ($settings['water'] == 1) {
		$t = new ThumbHandler();
		$t -> setSrcImg($targetFile);
		$t -> setDstImg($targetFile);
		$t -> setMaskImg(dirname(dirname(__FILE__)) . "/static/img/watermark.png");
		$t -> createImg(100);
	} */

	echo str_replace($_SERVER['DOCUMENT_ROOT'], '', $targetFile);
}

?>