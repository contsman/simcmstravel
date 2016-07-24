/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{	
	config.font_names='宋体/宋体;黑体/黑体;仿宋/仿宋_GB2312;楷体/楷体_GB2312;隶书/隶书;幼圆/幼圆;微软雅黑/微软雅黑;'+ config.font_names;
	// Define changes to default configuration here. For example:
	config.language = 'zh-cn';
	config.skin = 'v2';
	//config.uiColor = '#AADC6E';
	config.toolbar_Full = [
		['Source','-','Save','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Link','Unlink','Anchor'],
		['Image','Flash','Attachments','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		'/',
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor']
	];


	config.filebrowserBrowseUrl = 'admin/editor/kcfinder/browse.php?type=files';   
	config.filebrowserImageBrowseUrl = 'admin/editor/kcfinder/browse.php?type=images';   
	config.filebrowserFlashBrowseUrl = 'admin/editor/kcfinder/browse.php?type=flash';   
	config.filebrowserUploadUrl = 'admin/editor/kcfinder/upload.php?type=files';   
	config.filebrowserImageUploadUrl = 'admin/editor/kcfinder/upload.php?type=images';   
	config.filebrowserFlashUploadUrl = 'admin/editor/kcfinder/upload.php?type=flash';  
	

};
