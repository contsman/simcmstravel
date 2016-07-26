<?php
//    phpinfo();
$teststr = $_SERVER['DOCUMENT_ROOT']."/test";
echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$teststr);
echo '%EF%BB%BF';
?>