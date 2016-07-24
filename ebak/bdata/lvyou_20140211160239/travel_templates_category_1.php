<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `travel_templates_category`;");
E_C("CREATE TABLE `travel_templates_category` (
  `catid` int(11) NOT NULL auto_increment,
  `catname` varchar(50) NOT NULL,
  `catname_zh` varchar(50) NOT NULL,
  `addtime` int(11) NOT NULL,
  `isshow` tinyint(1) NOT NULL,
  PRIMARY KEY  (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `travel_templates_category` values('1','default','д╛хо╥Г╦Я','0','1');");

require("../../inc/footer.php");
?>