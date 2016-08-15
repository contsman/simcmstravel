<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `travel_news_category`;");
E_C("CREATE TABLE `travel_news_category` (
  `catid` smallint(5) unsigned NOT NULL auto_increment,
  `parentid` smallint(5) unsigned NOT NULL default '0',
  `catname` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `url` varchar(100) NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL default '0',
  `isshow` tinyint(1) unsigned NOT NULL default '1',
  `recommend` int(11) NOT NULL,
  PRIMARY KEY  (`catid`),
  KEY `module` (`parentid`,`listorder`,`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8");
E_D("replace into `travel_news_category` values('53','0','旅游资讯','','','','0','1','0');");
E_D("replace into `travel_news_category` values('55','0','旅游攻略','','','','0','1','0');");
E_D("replace into `travel_news_category` values('61','0','网站公告','','','','0','1','0');");

require("../../inc/footer.php");
?>