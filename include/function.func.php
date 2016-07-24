<?php
/*
www.admminn.cn  
*/
/**
 * 公共函数库 
 */
// GPC过滤
error_reporting(0);    
function _addslashes($value) {
	if (is_array($value)) {
		foreach ($value as $key => $val) {
			$value[$key] = _addslashes($val);
		} 
		return $value;
	} 
	return addslashes($value);
} 
// 去掉addslashes加的\
function _stripslashes($value) {
	if (is_array($value)) {
		foreach ($value as $k => $v) {
			$value[$k] = _stripslashes($v);
		} 
		return $value;
	} 
	return stripslashes($value);
} 
// 返回模板地址
function tpl($tpl_name = '', $index_file = FILE) {
	global $mod;
	if (empty($tpl_name)) $tpl_name = $mod;
	return TPL_DIR . $index_file . '/' . $tpl_name . TPL_SUFFIX;
} 
// 检查是否为合法post提交
function submitcheck($var) {
	if (empty($_POST[$var]) || $_SERVER['REQUEST_METHOD'] != 'POST') return false;
	if ((!empty($_SERVER['HTTP_REFERER']) || preg_replace("/https?:\/\/([^\:\/]+).*/i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("/([^\:]+).*/", "\\1", $_SERVER['HTTP_HOST'])))
		return true;
	else alert('错误的请求', -1);
} 

function showmsg($msg, $url = -1, $is_frame = 0, $time = 2) {
	$addslashes = $is_frame ? '\\' : '';
	$parent = (empty($msg) && $is_frame) ? 'parent.' : '';
	if ($url == '-1') {
		$url = "javascript:history.go(-1);";
		$func = "history.go(-1)";
	} elseif ($url == 1) {
		$url = "javascript:location.href=location.href;";
		$func = "{$parent}window.location.href=location.href;";
	} else {
		$url = str_replace(array("\n", "\r"), '', $url);
		$func = "{$parent}window.location.href=\'$url\';";
	} 
	if (empty($msg)) {
		$func = str_replace('\\', '', $func);
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <script language='javascript'>$func</script>";
		exit;
	} 
	$str = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta http-equiv=\"cache-control\" content=\"no-cache\">
    <title>提示信息</title>
    <style type=\"text/css\">
    <!--
    * {margin:0;padding:0;}
    body {text-align:center;font-family:Arial, Helvetica, sans-serif,\"宋体\";margin:0;paddig:0;}
    p {font-size: 12px;line-height:150%;background-color:#fff;padding:8px;}
    h1 {height:36px;line-height:36px;text-align:left;padding-left:15px;font-size:14px;font-weight:bold;color:#333;}
    .noticebox{margin:0 auto;margin-top:80px;width:420px;padding:0;background:#919798;}
	.box_border {border:1px solid #c8dde9;background:#fff url(static/img/msg_img/notice_h1.gif) repeat-x}
    a:link {color: #0000FF;text-decoration: none;}
    a:visited {text-decoration: none;color: #003399;}
    a:hover {text-decoration: none;color: #0066FF;}
    a:active {text-decoration: none;color: #0066FF;}
	.msg{padding:20px 0;font-size:14px;}
	.msgp{padding:50px 0;}
	.notice{font-szie:12px;background:#e4ecf7;color:#0068a6;}
    -->
    </style>
    </head>
    <body>
	<div class=\"noticebox\">
    <div class=\"box_border\">
    <h1>提示信息</h1>
    <p class=\"msgp\"><span class=\"msg\"> {$msg}</span> </p>
    <p class=\"notice\"><a href=\"{$url}\">如果{$time}秒后您的浏览器没有自动跳转，请点击这里</a></p>
	<script language=\"javascript\">setTimeout(\"{$func}\",{$time}*1000);<{$addslashes}/script>
    </div>
	</div>
    </body>";
	$str = str_replace(array("\r", "\n"), '', $str);
	if ($is_frame) {
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <script language='javascript'>parent.document.write('$str');</script>";
	} else echo $str;
	exit;
} 

function showmsg2($msg, $url = -1, $is_frame = 0, $time = 2) {
	$addslashes = $is_frame ? '\\' : '';
	$parent = (empty($msg) && $is_frame) ? 'parent.' : '';
	if ($url == '-1') {
		$url = "javascript:history.go(-1);";
		$func = "history.go(-1)";
	} elseif ($url == 1) {
		$url = "javascript:location.href=location.href;";
		$func = "{$parent}window.location.href=location.href;";
	} else {
		$url = str_replace(array("\n", "\r"), '', $url);
		$func = "{$parent}window.location.href=\'$url\';";
	} 
	if (empty($msg)) {
		$func = str_replace('\\', '', $func);
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <script language='javascript'>$func</script>";
		exit;
	} 
	$str = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta http-equiv=\"cache-control\" content=\"no-cache\">
    <title>提示信息</title>
    <style type=\"text/css\">
    <!--
    * {margin:0;padding:0;}
    body {text-align:center;font-family:Arial, Helvetica, sans-serif,\"宋体\";margin:0;paddig:0;}
    p {font-size: 12px;line-height:150%;background-color:#fff;padding:8px;}
    h1 {height:36px;line-height:36px;text-align:left;padding-left:15px;font-size:14px;font-weight:bold;color:#333;}
    .noticebox{margin:0 auto;margin-top:80px;width:420px;padding:0;background:#919798;}
	.box_border {border:1px solid #c8dde9;background:#fff url(static/img/msg_img/notice_h1.gif) repeat-x}
    a:link {color: #0000FF;text-decoration: none;}
    a:visited {text-decoration: none;color: #003399;}
    a:hover {text-decoration: none;color: #0066FF;}
    a:active {text-decoration: none;color: #0066FF;}
	.msg{padding:20px 0;font-size:14px;}
	.msgp{padding:50px 0;}
	.notice{font-szie:12px;background:#e4ecf7;color:#0068a6;}
    -->
    </style>
    </head>
    <body>
	<div class=\"noticebox\">
    <div class=\"box_border\">
    <h1>提示信息</h1>
    <p class=\"msgp\"><span class=\"msg\"> {$msg}</span> </p>
    <p class=\"notice\"><a href=\"{$url}\">如果{$time}秒后您的浏览器没有自动跳转，请点击这里</a></p>
	<script language=\"javascript\">setTimeout(\"{$func}\",{$time}*100);<{$addslashes}/script>
    </div>
	</div>
    </body>";
	$str = str_replace(array("\r", "\n"), '', $str);
	if ($is_frame) {
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <script language='javascript'>parent.document.write('$str');</script>";
	} else echo $str;
	exit;
} 

function htmlshowmsg($msg) {
	$str = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta http-equiv=\"cache-control\" content=\"no-cache\">
    <title>提示信息</title>
    <style type=\"text/css\">
    <!--
    * {margin:0;padding:0;}
    body {text-align:center;font-family:Arial, Helvetica, sans-serif,\"宋体\";margin:0;paddig:0;}
    p {font-size: 12px;line-height:150%;background-color:#fff;padding:8px;}
    h1 {height:36px;line-height:36px;text-align:left;padding-left:15px;font-size:14px;font-weight:bold;color:#333;}
    .noticebox{margin:0 auto;margin-top:80px;width:420px;padding:0;background:#919798;}
	.box_border {border:1px solid #c8dde9;background:#fff url(static/img/msg_img/notice_h1.gif) repeat-x}
    a:link {color: #0000FF;text-decoration: none;}
    a:visited {text-decoration: none;color: #003399;}
    a:hover {text-decoration: none;color: #0066FF;}
    a:active {text-decoration: none;color: #0066FF;}
	.msg{padding:20px 0;font-size:14px;}
	.msgp{padding:50px 0;}
	.notice{font-szie:12px;background:#e4ecf7;color:#0068a6;}
    -->
    </style>
    </head>
    <body>
	<div class=\"noticebox\">
    <div class=\"box_border\">
    <h1>提示信息</h1>
    <p class=\"msgp\"><span class=\"msg\"> {$msg}</span> </p>
    </div>
	</div>
    </body>";
	$str = str_replace(array("\r", "\n"), '', $str);
	echo $str;
} 
// 使用JS弹出消息框
function alert($msg, $url = '', $window = 'window', $display = 1) {
	$str = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	$str .= "<script language='javascript'>";
	if ($msg != '') $str .= "alert('$msg');";
	if ($url == '') $str .= '';
	elseif (is_numeric($url) && $url <= 0) $str .= "history.go($url);";
	elseif (is_numeric($url) && $url == 1) $str .= "{$window}.location.href=location.href";
	else $str .= "{$window}.location.href='$url';";
	$str .= '</script>';
	if (!$display) return $str;
	exit($str);
} 
// 消息提示框
function redirect($msg, $url = '', $window = 'window', $display = 1) {
	$str = "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	$str .= "<script language='javascript'>";
	if ($msg != '') $str .= "alert('$msg');";
	if ($url == '') $str .= '';
	elseif (is_numeric($url) && $url <= 0) $str .= "history.go($url);";
	elseif (is_numeric($url) && $url == 1) $str .= "{$window}.location.href=location.href";
	else $str .= "{$window}.location.href='$url';";
	$str .= '</script>';
	if (!$display) return $str;
	exit($str);
} 
// 字符串截取
function _substr($str, $start = 0, $length, $charset = "utf-8", $suffix = '.') {
	$string = substr($str, $start, $length);
	$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	preg_match_all($re[$charset], $string, $match);
	$slice = join('', array_slice($match[0], 0, $length));
	return strlen($str) > strlen($slice) ? $slice . $suffix : $slice;
} 
// 获取post过来的值
function post() {
	$args = func_get_args();
	$value = array();
	while (list(, $key) = each ($args)) {
		if (isset($_POST[$key])) $value[$key] = $_POST[$key];
	} 
	if (count($args) === 1) return empty($value) ? '' : array_shift($value);
	return $value;
} 
// 获取get过来的值
function get() {
	$args = func_get_args();
	$value = array();
	while (list(, $key) = each ($args)) {
		if (isset($_GET[$key])) $value[$key] = $_GET[$key];
	} 
	if (count($args) === 1) return empty($value) ? '' : array_shift($value);
	return $value;
} 
// 不能为空
function can_not_be_empty($arr_not_empty, $arr_value) {
	foreach ($arr_not_empty as $k => $v) {
		if (empty($arr_value[$k])) showmsg($v, -1);
	} 
} 
// 获取客户端IP
function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
		$ip = getenv("REMOTE_ADDR");
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
		$ip = $_SERVER['REMOTE_ADDR'];
	else $ip = "unknown";
	if (!preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/", $ip)) return 'unknown';
	return($ip);
} 
// 返回ID字符串
function return_str_id($id) {
	$str_id = '';
	if (is_array($id)) {
		foreach ($id as $v) {
			$str_id .= intval($v) . ',';
		} 
		$str_id = substr($str_id, 0, -1);
	} else $str_id = $id;
	return $str_id;
} 
// 建立目录
function createFolder($pFolder) {
	if (preg_match ("/win/i", PHP_OS)) {
		$pFolder = str_replace('/', '\\', $pFolder);
		$RootFolder = str_replace('/', '\\', $_SERVER['DOCUMENT_ROOT']); 
		// 判断要生成目录是否为根目
		if (substr($pFolder, 0, 1) == DIRECTORY_SEPARATOR) {
			$pFolder = $RootFolder . $pFolder;
		} 
	} else {
		// 判断要生成目录是否为根目
		if (substr($pFolder, 0, 1) != DIRECTORY_SEPARATOR) {
			$pFolder = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $pFolder;
		} else {
			$pFolder = DIRECTORY_SEPARATOR . $pFolder;
		} 
	} 

	$folder = explode(DIRECTORY_SEPARATOR, $pFolder);
	$mkfolder = '';
	for($i = 0; isset($folder[$i]); $i++) {
		$mkfolder .= $folder[$i];
		if (!is_dir($mkfolder))
			mkdir("$mkfolder", 0777);
		$mkfolder .= DIRECTORY_SEPARATOR;
	} 
} 
// 删除目录（包括目录下所有子目录和文件）
function _rmdir($path) {
	if (is_array($path)) {
		$arr = array_map('_rmdir', $path);
		if (in_array(false, $arr)) return false;
	} elseif (is_string($path)) {
		if (is_file($path)) return unlink($path);
		elseif (is_dir($path)) {
			if (!$op = opendir($path)) return false;
			if (substr($path, -1) != '/') $path .= '/';
			while (($file = readdir($op)) !== false) {
				if (!in_array($file, array('.', '..'))) _rmdir($path . $file);
			} 
			closedir($op);
			rmdir($path);
		} 
	} else return false;
	return true;
} 
// 构造select
function select_make($id, $arr, $default_str = '', $default_val = '') {
	$option = $default_str ? "<option value='$default_val'>$default_str</option>\r\n" : '';
	foreach ($arr as $k => $v) {
		$selected = '';
		if ($k == $id) $selected = 'selected';
		$option .= "<option value='{$k}' $selected>{$v}</option>\r\n";
	} 
	return $option;
} 
// 占用空间大小格式化
function byte_format($size, $unit = 'B', $dec = 2) {
	$arr_unit = array("B", "KB", "MB", "GB", "TB", "PB");
	$arr_rev_unit = array_flip($arr_unit);
	if (!isset($arr_rev_unit[$unit])) return round($size, $dec) . ' ' . $unit;
	$pos = $arr_rev_unit[$unit];
	while ($size >= 1024) {
		$size /= 1024;
		$pos++;
	} while ($size < 1) {
		$size *= 1024;
		$pos--;
	} 
	return round($size, $dec) . ' ' . $arr_unit[$pos];
} 
// 是否邮件地址
function is_email($email) {
	return preg_match('/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/', $email);
} 
// 获取字符串首字母
function getinitial($str) {
	$strstr = substr($str, 0, 1);
	$asc = ord($strstr);
	if ($asc > 47 && $asc < 58) { // 非中文
		return $strstr; //其他
	} else if ($asc > 160) { // 中文
		$asc = $asc * 1000 + ord(substr($str, 1, 1)); 
		// 获取拼音首字母A--Z
		if ($asc >= 176161 && $asc < 176197) {
			return 'A';
		} elseif ($asc >= 176197 && $asc < 178193) {
			return 'B';
		} elseif ($asc >= 178193 && $asc < 180238) {
			return 'C';
		} elseif ($asc >= 180238 && $asc < 182234) {
			return 'D';
		} elseif ($asc >= 182234 && $asc < 183162) {
			return 'E';
		} elseif ($asc >= 183162 && $asc < 184193) {
			return 'F';
		} elseif ($asc >= 184193 && $asc < 185254) {
			return 'G';
		} elseif ($asc >= 185254 && $asc < 187247) {
			return 'H';
		} elseif ($asc >= 187247 && $asc < 191166) {
			return 'J';
		} elseif ($asc >= 191166 && $asc < 192172) {
			return 'K';
		} elseif ($asc >= 192172 && $asc < 194232) {
			return 'L';
		} elseif ($asc >= 194232 && $asc < 196195) {
			return 'M';
		} elseif ($asc >= 196195 && $asc < 197182) {
			return 'N';
		} elseif ($asc >= 197182 && $asc < 197190) {
			return 'O';
		} elseif ($asc >= 197190 && $asc < 198218) {
			return 'P';
		} elseif ($asc >= 198218 && $asc < 200187) {
			return 'Q';
		} elseif ($asc >= 200187 && $asc < 200246) {
			return 'R';
		} elseif ($asc >= 200246 && $asc < 203250) {
			return 'S';
		} elseif ($asc >= 203250 && $asc < 205218) {
			return 'T';
		} elseif ($asc >= 205218 && $asc < 206244) {
			return 'W';
		} elseif ($asc >= 206244 && $asc < 209185) {
			return 'X';
		} elseif ($asc >= 209185 && $asc < 212209) {
			return 'y';
		} elseif ($asc >= 212209) {
			return 'Z';
		} else {
			return '~';
		} 
	} else { // 非中文
		if ($asc >= 48 && $asc <= 57) {
			return '1'; //数字
		} elseif ($asc >= 65 && $asc <= 90) {
			return chr($asc); // A--Z
		} elseif ($asc >= 97 && $asc <= 122) {
			return chr($asc-32); // a--z
		} else {
			return '~'; //其他
		} 
	} 
} 

/**
 * 生成静态分页函数
 */
function getpagelist($action, $pagecount, $page, $result_num, $page_size) {
	$pagelist = $pagecountlist = "";
	$pagelist .= "<div class=\"page_list\">";
	if ($pagecount > 1) {
		$start = (ceil($page / 10)-1) * 10;
		$end = ceil($page / 10) * 10 + 1;
		if ($start <= 0) $start = 1;
		if ($end >= $pagecount) $end = $pagecount;
		for($i = $start;$i <= $end;$i++) {
			if ($page == $i)
				$pagecountlist .= "<span class=\"xspace-current\">" . $i . "</span>";
			else
				$pagecountlist .= "<a href=" . $action . "_" . sprintf("%02d", $i) . ".html>" . $i . "</a>";
		} 
	} else {
		$pagecountlist .= "<span class=\"xspace-current\">1</span>";
	} 
	$pagelist .= "Page：";
	if ($page > 1) {
		$pagelist .= "<a href=" . $action . "_" . sprintf("%02d", ($page-1)) . ".html class='prepage'></a>";
	} 

	$pagelist .= $pagecountlist . "";

	if ($page < $pagecount) {
		$pagelist .= "<a href=" . $action . "_" . sprintf("%02d", ($page + 1)) . ".html class='nextpage'></a>";
	} 
	$pagelist .= "</div>";
	return $pagelist;
} 
// PHP COOKIE设置函数立即生效，支持数组
function setMyCookie($var, $value = '', $time = 0, $path = '', $domain = '') {
	$_COOKIE[$var] = $value;
	if (is_array($value)) {
		foreach($value as $k => $v) {
			setcookie($var . '[' . $k . ']', $v, $time, $path, $domain);
		} 
	} else {
		setcookie($var, $value, $time, $path, $domain);
	} 
} 

?>