<?php
//==================================================== 
// FileName:GDImage.inc.php 
// Summary: ͼƬ������� 
// Author: ice_berg16(Ѱ�εĵ�����) 
// CreateTime: 2004-10-12 
// LastModifed:2004-10-12 
// copyright (c)2004 ice_berg16@163.com 
//==================================================== 

class GDImage 
{ 
	var $sourcePath; //ͼƬ�洢·�� 
	var $galleryPath; //ͼƬ����ͼ�洢·�� 
	var $toFile = false; //�Ƿ������ļ� 
	var $fontName; //ʹ�õ�TTF�������� 
	var $maxWidth = 500; //ͼƬ����� 
	var $maxHeight = 600; //ͼƬ���߶� 

	//========================================== 
	// ����: GDImage($sourcePath ,$galleryPath, $fontPath) 
	// ����: constructor 
	// ����: $sourcePath ͼƬԴ·��(�������һ��"/") 
	// ����: $galleryPath ����ͼƬ��·�� 
	// ����: $fontPath ����·�� 
	//========================================== 
	function GDImage($sourcePath, $galleryPath, $fontPath) 
	{ 
		$this->sourcePath = $sourcePath; 
		$this->galleryPath = $galleryPath; 
		$this->fontName2 = $fontPath ; 
		$this->fontName1 = $fontPath ; 
	} 

	//========================================== 
	// ����: makeThumb($sourFile,$width=128,$height=128) 
	// ����: ��������ͼ(����������) 
	// ����: $sourFile ͼƬԴ�ļ� 
	// ����: $width ��������ͼ�Ŀ�� 
	// ����: $height ��������ͼ�ĸ߶� 
	// ����: 0 ʧ�� �ɹ�ʱ�������ɵ�ͼƬ·�� 
	//========================================== 
	function makeThumb($sourFile,$width=128,$height=128,$imgtype='.jpg') 
	{ 
		$imageInfo = $this->getInfo($sourFile); 
		$sourFile = $this->sourcePath . $sourFile; 
		$newName = substr($imageInfo["name"], 0, strrpos($imageInfo["name"], ".")) . $imgtype; 
		switch ($imageInfo["type"]) 
		{ 
			case 1: //gif 
			$img = imagecreatefromgif($sourFile); 
			break; 
			case 2: //jpg 
			$img = imagecreatefromjpeg($sourFile); 
			break; 
			case 3: //png 
			$img = imagecreatefrompng($sourFile); 
			break; 
			default: 
			return 0; 
			break; 
		} 
		if (!$img) 
			return 0; 
		$width = ($width > $imageInfo["width"]) ? $imageInfo["width"] : $width; 
		$height = ($height > $imageInfo["height"]) ? $imageInfo["height"] : $height; 
		$srcW = $imageInfo["width"]; 
		$srcH = $imageInfo["height"]; 
		if ($srcW * $width > $srcH * $height) 
			$height = round($srcH * $width / $srcW); 
		else 
			$width = round($srcW * $height / $srcH); 
		//* 
		if (function_exists("imagecreatetruecolor")) //GD2.0.1 
		{ 
			$new = imagecreatetruecolor($width, $height); 
			ImageCopyResampled($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]); 
		} 
		else 
		{ 
			$new = imagecreate($width, $height); 
			ImageCopyResized($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]); 
		} 
		//*/ 
		if ($this->toFile) 
		{ 
			if (file_exists($this->galleryPath . $newName)) 
				unlink($this->galleryPath . $newName); 
			ImageJPEG($new, $this->galleryPath . $newName); 
			return $this->galleryPath . $newName; 
		} 
		else 
		{ 
			ImageJPEG($new); 
		} 
		ImageDestroy($new); 
		ImageDestroy($img); 
		return true;
	} 
//========================================== 
// ����: waterMark($sourFile, $text) 
// ����: ��ͼƬ��ˮӡ 
// ����: $sourFile ͼƬ�ļ��� 
// ����: $text �ı�����(���������ַ���) 
// ����: 1 �ɹ� �ɹ�ʱ�������ɵ�ͼƬ·�� 
//========================================== 
function waterMark($sourFile, $text) 
{ 
$imageInfo = $this->getInfo($sourFile); 
$sourFile = $this->sourcePath . $sourFile; 
$newName = substr($imageInfo["name"], 0, strrpos($imageInfo["name"], ".")) . "_mark.jpg"; 
switch ($imageInfo["type"]) 
{ 
case 1: //gif 
$img = imagecreatefromgif($sourFile); 
break; 
case 2: //jpg 
$img = imagecreatefromjpeg($sourFile); 
break; 
case 3: //png 
$img = imagecreatefrompng($sourFile); 
break; 
default: 
return 0; 
break; 
} 
if (!$img) 
return 0; 

$width = ($this->maxWidth > $imageInfo["width"]) ? $imageInfo["width"] : $this->maxWidth; 
$height = ($this->maxHeight > $imageInfo["height"]) ? $imageInfo["height"] : $this->maxHeight; 
$srcW = $imageInfo["width"]; 
$srcH = $imageInfo["height"]; 
if ($srcW * $width > $srcH * $height) 
$height = round($srcH * $width / $srcW); 
else 
$width = round($srcW * $height / $srcH); 
//* 
if (function_exists("imagecreatetruecolor")) //GD2.0.1 
{ 
$new = imagecreatetruecolor($width, $height); 
ImageCopyResampled($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]); 
} 
else 
{ 
$new = imagecreate($width, $height); 
ImageCopyResized($new, $img, 0, 0, 0, 0, $width, $height, $imageInfo["width"], $imageInfo["height"]); 
} 
$text1 = $text[text1];
$text2 = $text[text2];
$text3 = $text[text3];

//$white = imageColorAllocate($new, 255, 255, 255); 
//$black = imageColorAllocate($new, 0, 0,0); 
//$alpha = imageColorAllocateAlpha($new, 230, 230, 230, 100); 
//$rectW = max(strlen($text[0]),strlen($text[1]))*7; 
//ImageFilledRectangle($new, 0, $height-26, $width, $height, $alpha); 
//ImageFilledRectangle($new, 13, $height-20, 15, $height-7, $black); 

 
for($i=0;$i<=2;$i++)
	{
		$color1array[] = hexdec(substr($text1[color],$i*2,($i*2+2)));
	}
if( count($color1array) > 0 )
$color1 = imageColorAllocate($new, $color1array[0],$color1array[1],$color1array[2]); 
for($i=0;$i<=2;$i++)
	{
		$color2array[] = hexdec(substr($text2[color],$i*2,($i*2+2)));
	}
if( count($color2array) > 0 )
$color2 = imageColorAllocate($new, $color2array[0],$color2array[1],$color2array[2]); 
for($i=0;$i<=2;$i++)
	{
		$color3array[] = hexdec(substr($text3[color],$i*2,($i*2+2)));
	}
if( count($text1) > 0 )
$color3 = imageColorAllocate($new, $color3array[0],$color3array[1],$color3array[2]); 
if( count($color1array) > 0 )
ImageTTFText($new, $text1[fontsize], 0, $text1[x], $text1[y], $color1, $this->fontName1.$text1[font], $text1[text]); 
if( count($text2) > 0 )
ImageTTFText($new, $text2[fontsize], 0, $text2[x], $text2[y], $color2, $this->fontName1.$text2[font], $text2[text]); 
if( count($text3) > 0 )
ImageTTFText($new, $text3[fontsize], 0, $text3[x], $text3[y], $color3, $this->fontName1.$text3[font], $text3[text]); 

//ImageTTFText($new, 6, 0, 40, $height-24, $black, $this->fontName2, $text3[2]); 
//*/ 
if ($this->toFile) 
{ 
if (file_exists($this->galleryPath . $newName)) 
unlink($this->galleryPath . $newName); 
ImageJPEG($new, $this->galleryPath . $newName); 
return $this->galleryPath . $newName; 
} 
else 
{ 
ImageJPEG($new); 
} 
ImageDestroy($new); 
ImageDestroy($img); 

} 
//========================================== 
// ����: displayThumb($file) 
// ����: ��ʾָ��ͼƬ������ͼ 
// ����: $file �ļ��� 
// ����: 0 ͼƬ������ 
//========================================== 
function displayThumb($file) 
{ 
$thumbName = substr($file, 0, strrpos($file, ".")) . "_thumb.jpg"; 
$file = $this->galleryPath . $thumbName; 
if (!file_exists($file)) 
return 0; 
$html = "<img src='$file' style='border:1px solid #000'/>"; 
echo $html; 
} 
//========================================== 
// ����: displayMark($file) 
// ����: ��ʾָ��ͼƬ��ˮӡͼ 
// ����: $file �ļ��� 
// ����: 0 ͼƬ������ 
//========================================== 
function displayMark($file) 
{ 
$markName = substr($file, 0, strrpos($file, ".")) . "_mark.jpg"; 
$file = $this->galleryPath . $markName; 
if (!file_exists($file)) 
return 0; 
$html = "<img src='$file' style='border:1px solid #000'/>"; 
echo $html; 
} 
//========================================== 
// ����: getInfo($file) 
// ����: ����ͼ����Ϣ 
// ����: $file �ļ�·�� 
// ����: ͼƬ��Ϣ���� 
//========================================== 
function getInfo($file) 
{ 
$file = $this->sourcePath . $file; 
$data = getimagesize($file); 
$imageInfo["width"] = $data[0]; 
$imageInfo["height"]= $data[1]; 
$imageInfo["type"] = $data[2]; 
$imageInfo["name"] = basename($file); 
return $imageInfo; 
}
} 
?>