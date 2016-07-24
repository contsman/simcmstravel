<?php
	include('gdimage.inc.php');
	function new_name($filename){
		$ext = pathinfo($filename);
		$ext = $ext['extension'];
		if ($ext=='jpg'||$ext=='gif'||$ext=='png') 
		{
			$name = basename($filename,$ext); 
			$name = md5($name.time()).'.'.$ext;
			return $name;
		}
		else
		{
			return;
		}
	}

	if (!empty($_FILES)) {
		$tempFile = $_FILES['Filedata']['tmp_name'];
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/upload/';
		$targetPaths = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/small/';
		$new_file_name = new_name( $_FILES['Filedata']['name']);
		$targetFile =  str_replace('//','/',$targetPath) . $new_file_name;
	
		// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
		// $fileTypes  = str_replace(';','|',$fileTypes);
		// $typesArray = split('\|',$fileTypes);
		// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
		// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		move_uploaded_file($tempFile,$targetFile);	
		echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
		$smallimg = new GDImage($targetPath,$targetPaths, '../fonts/');
		$smallimg->maxWidth  = 120;
		$smallimg->maxHeight = 110; 
		$smallimg->toFile = true; 
		$smallimg->makeThumb($new_file_name,120,110);

	// } else {
	// 	echo 'Invalid file type.';
	// }
	}
?>